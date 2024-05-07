<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use PayPal\Rest\ApiContext;
use PayPal\Auth\OAuthTokenCredential;
use PayPal\Api\Agreement;
use PayPal\Api\Payer;
use PayPal\Api\Plan;
use PayPal\Api\PaymentDefinition;
use PayPal\Api\PayerInfo;
use PayPal\Api\Item;
use PayPal\Api\ItemList;
use PayPal\Api\Amount;
use PayPal\Api\Transaction;
use PayPal\Api\RedirectUrls;
use PayPal\Api\Payment;
use PayPal\Api\PaymentExecution;
use Illuminate\Support\Facades\Input;
use Redirect;
use URL;
use App\Models\UserWallet;
use App\Models\Wallet_Transactions;
use App\Models\Order;
use App\Models\OrderProducts;
use App\Models\PaymentData;
use App\Models\Users;
use Yajra\DataTables\DataTables;
use Razorpay\Api\Api;
use Exception;

class PaymentController extends Controller
{
    public function __construct()
    {
         /** PayPal api context **/
         $paypal_conf = \Config::get('paypal');
         $this->_api_context = new ApiContext(new OAuthTokenCredential(
             $paypal_conf['client_id'],
             $paypal_conf['secret'])
         );
         $this->_api_context->setConfig($paypal_conf['settings']);
    }
    public function payWithpaypal($amt,Request $request)
    {
      // return implode('&'.$request->input());
      Session::put('order',$request->input());

      $amountToBePaid = $amt;
      $payer = new Payer();
      $payer->setPaymentMethod('paypal');
  
      $item_1 = new Item();
      $item_1->setName('Wallet Top Up') /** item name **/
              ->setCurrency('USD')
              ->setQuantity(1)
              ->setPrice($amountToBePaid); /** unit price **/
  
      $item_list = new ItemList();
      $item_list->setItems(array($item_1));
  
      $amount = new Amount();
      $amount->setCurrency('USD')
             ->setTotal($amountToBePaid);
      $redirect_urls = new RedirectUrls();
      /** Specify return URL **/
      $redirect_urls->setReturnUrl(URL::route('paypal-status'))
                ->setCancelUrl(URL::route('paypal-status'));
      
      $transaction = new Transaction();
      $transaction->setAmount($amount)
              ->setItemList($item_list)
              ->setDescription('Wallet Top Up');   
   
      $payment = new Payment();
      $payment->setIntent('Sale')
              ->setPayer($payer)
              ->setRedirectUrls($redirect_urls)
              ->setTransactions(array($transaction));
      try {
           $payment->create($this->_api_context);
      } catch (\PayPal\Exception\PPConnectionException $ex) {
           if (\Config::get('app.debug')) {
              \Session::put('error', 'Connection timeout');
            //   return Redirect::route('my-wallet');
              return redirect()->back();
           } else {
              \Session::put('error', 'Some error occur, sorry for inconvenient');
              // return Redirect::route('my-wallet');
              return redirect()->back('/cart');
           }
      }
    foreach ($payment->getLinks() as $link) {
        if ($link->getRel() == 'approval_url') {
           $redirect_url = $link->getHref();
           break;
        }
      }
      // return $payment;
      /** add payment ID to session **/
      Session::put('paypal_payment_id', $payment->getId());
      Session::put('amount', $amt);
    if (isset($redirect_url)) {
         /** redirect to paypal **/
         return Redirect::away($redirect_url);
      }
  
      Session::put('error', 'Unknown error occurred');
      return redirect()->back();
    //   return Redirect::route('my-wallet');
    }
    
    public function getPaymentStatus(Request $request)
    {
      /** Get the payment ID before session clear **/
      $payment_id = Session::get('paypal_payment_id');
      /** clear the session payment ID **/
      // Session::forget('paypal_payment_id');
      if (empty($request->PayerID) || empty($request->token)) {
         session()->flash('error', 'Payment failed');
        //  return Redirect::route('my-wallet');
         return redirect()->back();
      }
      $payment = Payment::get($payment_id, $this->_api_context);
      $execution = new PaymentExecution();
      $execution->setPayerId($request->PayerID);
      /**Execute the payment **/
      $result = $payment->execute($execution, $this->_api_context);
      // return $result;
      if ($result->getState() == 'approved') {
        $user_id = session()->get('user_id');
        $request = session()->get('order');
        // return (object) $request['qty']['234'];
        Users::where('user_id',$user_id)->update([
                    'phone'=>$request['phone'],
                    'country'=>$request['country'],
                    'state'=>$request['state'],
                    'city'=>$request['city'],
                    'address'=>$request['address'],
                    'pin_code'=>$request['code'],
                ]);
                $total_qty = 0;
                foreach($request['qty'] as $key => $value){
                    $total_qty += $value;
                }
                // return $total_qty;

                $payment = new PaymentData();
                $payment->amount = Session::get('amount');
                $payment->txn_id = $payment_id;
                $payment->pay_method = 'paypal';
                $payment->pay_status = 1;
                $payment->save();

                $order = new Order();
                $order->user = $user_id;
                $order->products = count($request['product_id']);
                $order->qty = $total_qty;
                $order->pay_id = $payment->id;
                $order->amount = Session::get('amount');
                $order->save();

                $product_qty = (array) $request['qty'];
                $product_color = (array) $request['product_color'];
                $product_attr = (array) $request['product_attr'];
                $product_amount = (array) $request['price'];

                for($i=0;$i<count($request['product_id']);$i++){
                    $order_products = new OrderProducts();
                    $order_products->order_id = $order->id;
                    $order_products->product_id = $request['product_id'][$i];
                    $order_products->product_qty = $product_qty[$request['product_id'][$i]];
                    if(!empty($product_color)){
                      $order_products->product_color = $product_color[$request['product_id'][$i]];
                    }
                    if(!empty($product_attr)){
                      $order_products->product_attr = $product_attr[$request['product_id'][$i]];
                    }
                    $order_products->product_amount = $product_amount[$request['product_id'][$i]];
                    $order_products->product_delivery = 0;
                    $order_products->save();

                    DB::table('cart')->where('product_user',$user_id)->where('product_id',$request['product_id'][$i])->delete();
                }
                // if(isset($request['checkout'])){
                //   DB::table('cart')->where('product_user',$user_id)->whereIn('product_id',$request['product_id'])->delete();
                // }

        Session::forget('paypal_payment_id');
        Session::forget('amount');

         session()->flash('success', 'Order Confirmed Successfully');
         return redirect('success');
        //  return Redirect::route('my-wallet');
      }
      session()->flash('error', 'Payment failed');
      return redirect()->back();
    }



    public function yb_payWithRazorpay($amt,$pay_id,Request $request){
      //  return $request->input();
      Session::put('order',$request->input());
       $user_id = session()->get('user_id');
        $api = new Api(env('RAZOR_KEY'),env('RAZOR_SECRET')); 
  
        $payment = $api->payment->fetch($pay_id);

        if(!empty($pay_id)) {
            try {
                $response = $api->payment->fetch($pay_id)->capture(array('amount'=>$payment['amount'])); 
              //  return $request->input();

                Users::where('user_id',$user_id)->update([
                    'phone'=>$request->phone,
                    'country'=>$request->country,
                    'state'=>$request->state,
                    'city'=>$request->city,
                    'address'=>$request->address,
                    'pin_code'=>$request->code,
                ]);
                $total_qty = 0;
                foreach($request->qty as $key => $value){
                    $total_qty += $value;
                }
                // return $total_qty;

                $payment = new PaymentData();
                $payment->amount = $amt;
                $payment->txn_id = $pay_id;
                $payment->pay_method = 'razorpay';
                $payment->pay_status = 1;
                $payment->save();

                $order = new Order();
                $order->user = $user_id;
                $order->products = count($request->product_id);
                $order->qty = $total_qty;
                $order->pay_id = $payment->id;
                $order->amount = $amt;
                $order->save();

                $product_qty = (array) $request->qty;
                $product_color = (array) $request->product_color;
                $product_attr = (array) $request->product_attr;
                $product_amount = (array) $request->price;

                for($i=0;$i<count($request->product_id);$i++){
                    $order_products = new OrderProducts();
                    $order_products->order_id = $order->id;
                    $order_products->product_id = $request->product_id[$i];
                    $order_products->product_qty = $product_qty[$request->product_id[$i]];
                    if(!empty($product_color)){
                      $order_products->product_color = $product_color[$request['product_id'][$i]];
                    }
                    if(!empty($product_attr)){
                      $order_products->product_attr = $product_attr[$request['product_id'][$i]];
                    }
                    $order_products->product_amount = $product_amount[$request->product_id[$i]];
                    $order_products->product_delivery = 0;
                    $order_products->save();

                    DB::table('cart')->where('product_user',$user_id)->where('product_id',$request->product_id[$i])->delete();
                }
                // if($request->checkout){
                //   DB::table('cart')->where('product_user',$user_id)->whereIn('product_id',$request->product_id)->delete();
                // }
                
                session()->flash('success', 'Order Confirmed Successfully');
                return redirect('success');

            } catch (Exception $e) {
               Session::flash('error',$e->getMessage());
               return redirect()->back();
            }
        }
    }


    public function success(){
        return view('public.success');
    }    
}
