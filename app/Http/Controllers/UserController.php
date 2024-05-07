<?php

namespace App\Http\Controllers;

use Mail;
use Exception;
use Carbon\Carbon;
use App\Models\Cart;
use App\Models\City;
use App\Models\User;
use App\Models\Admin;
use App\Models\Color;
use App\Models\Order;
use App\Models\State;
use App\Models\Users;
use Razorpay\Api\Api;
use App\Models\Banner;
use App\Models\Review;
use App\Models\Country;
use App\Models\Product;
use App\Models\Category;
use App\Models\Attribute;
use App\Models\Attrvalue;
use App\Models\PaymentData;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\OrderProducts;
use App\Models\PaymentMethod;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\URL;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;




class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        if ($request->ajax()) {
            $data = Users::select(['users.*', 'cities.city_name', 'states.state_name', 'countries.country_name'])
                ->leftJoin('cities', 'cities.id', '=', 'users.city')
                ->leftJoin('states', 'states.id', '=', 'users.state')
                ->leftJoin('countries', 'countries.id', '=', 'users.country')
                ->orderBy('user_id', 'desc')->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    if ($row->status == '1') {
                        $btn = '<button class="btn btn-warning btn-sm userBlock" data-status="' . $row->status . '" data-id="' . $row->user_id . '">Block</button>';
                    } else {
                        $btn = '<button class="btn btn-success btn-sm userBlock" data-status="' . $row->status . '" data-id="' . $row->user_id . '">Unblock</button>';
                    }
                    return $btn;
                })
                ->make(true);
        }
        return view('admin.users.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        if (session()->has('user_name')) {
            return redirect('/');
        } else {
            return view('public.signup');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users,email',
            'phone' => 'required|unique:users,phone',
            'password' => 'required',
        ]);

        $user = new Users();
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->phone = $request->input('phone');
        $user->password = Hash::make($request->input('password'));
        $u = $user->save();
        
        return $u;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //
        $id = session()->get('user_id');

        $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users,email,' . $id . ',user_id',
            'phone' => 'required|unique:users,phone,' . $id . ',user_id',
        ]);


        // if ($request->img != '') {
        //     $path = public_path() . '/users/';
        //     //code for remove old file
        //     if ($request->old_img != ''  && $request->old_img != null) {
        //         $file_old = $path . $request->old_img;
        //         if (file_exists($file_old)) {
        //             unlink($file_old);
        //         }
        //     }
        //     //upload new file
        //     $file = $request->img;
        //     $image = $request->img->getClientOriginalName();
        //     $file->move($path, $image);
        // } else {
        //     $image = $request->old_img;
        // }

        $users = Users::where(['user_id' => $id])->update([
            // 'user_img' => $image,
            'name' => $request->input('name'),
            'phone' => $request->input('phone'),
            'email' => $request->input('email'),
            // 'city' => $request->input('city'),
            // 'address' => $request->input('address'),
            // 'state' => $request->input('state'),
            // 'pin_code' => $request->input('code'),
            // 'country' => $request->input('country'),
        ]);
        return $users;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function changeStatus(Request $request)
    {
        if ($request->post()) {
            $id = $request->post('uId');
            $status = $request->post('status');

            $user = Users::where('user_id', $id)->update([
                'status' => $status,
            ]);
            return $user;
        }
    }

    public function login()
    {
        if (Session::has('user_name')) {
            return redirect('/');
        } else {

            return view('public.user_login');
        }
    }

    public function login_form(Request $request)
    {

        if ($request->input()) {

            $request->validate([
                'email' => 'required',
                'password' => 'required',
            ]);

            $login = User::where(['email' => $request->email])->first();

            if (empty($login)) {
                return response()->json(['username' => 'Username Does not Exists.']);
            } else if ($login->status == '0') {
                return response()->json(['username' => 'The Email is Blocked.']);
            } else {
                if (Hash::check($request->password, $login->password)) {
                    $request->session()->put('user', '1');
                    $request->session()->put('user_name', $login->name);
                    $request->session()->put('user_id', $login->user_id);
                    $request->session()->put('user_city', $login->city);
                    return response()->json('1');
                    // dd(Auth::user());
                    // dd(session()->get('user_id'));
                    // return redirect('/');
                } else {

                    return response()->json(['password' => 'Email and Password does not matched.']);
                }
            }
        } else {
            return redirect('user_login');
        }
    }

    public function logout()
    {
        session()->forget('user');
        session()->forget('user_name');
        session()->forget('user_id');
        session()->forget('user_city');
        return redirect('/');
    }

    public function changepassword()
    {
        if (session()->has('user_name')) {
            $banner = Banner::select(['banner.*'])->get();

            return view('public.changepassword', ['banner' => $banner]);
        } else {
            return redirect('user_login');
        }
    }

    public function change_password(Request $request)
    {
        if ($request->input()) {
            $request->validate([
                'password' => 'required',
                'new_pass' => 'required',
                're_pass' => 'required',
            ]);

            $user_id = session()->get('user_id');

            $select = Users::where('user_id', $user_id)->pluck('password')->first();

            if (Hash::check($request->password, $select)) {
                $update = Users::where('user_id', $user_id)->update([
                    'password' => Hash::make($request->new_pass)
                ]);
                return '1';
            } else {
                return response()->json(['password' => 'Please Enter Correct Old Password']);
            }
        }
    }

    public function my_profile()
    {
        if (session()->has('user_name')) {
            $user_id = session()->get('user_id');
            $user = Users::where(['user_id' => $user_id])->first();
            $country = Country::select(['countries.*'])->get();
            $state = State::select(['states.*'])->where('country', $user->country)->get();
            $city = City::select(['cities.*'])->where('state', $user->state)->get();
            return view('public.my-profile', ['user' => $user, 'city' => $city, 'state' => $state, 'country' => $country]);
        } else {
            return redirect('user_login');
        }
    }

    public function add_wishlist(Request $request)
    {
        $id = $request->id;
        $user = Session::get('user_id');
        $wishlist = Users::where('user_id', $user)->pluck('wishlist')->first();
        if (!empty($wishlist)) {
            $w_array = array_filter(explode(',', $wishlist));
        } else {
            $w_array = [];
        }
        if (!in_array($id, $w_array)) {
            array_push($w_array, $id);
        }
        $count = count($w_array);
        $w_array = implode(',', $w_array);
        Users::where('user_id', $user)->update([
            'wishlist' => $w_array
        ]);
        return response()->json(['result' => '1', 'count' => $count]);
    }

    public function remove_wishlist(Request $request)
    {
        $id = $request->id;
        $user = Session::get('user_id');
        $wishlist = Users::where('user_id', $user)->pluck('wishlist')->first();
        if (!empty($wishlist)) {
            $w_array = array_filter(explode(',', $wishlist));
        } else {
            $w_array = [];
        }
        if (($key = array_search($id, $w_array)) !== false) {
            unset($w_array[$key]);
        }
        // array_push($w_array,$id);
        $w_array = implode(',', $w_array);
        Users::where('user_id', $user)->update([
            'wishlist' => $w_array
        ]);
        return '1';
    }

    public function my_wishlist()
    {
        if (Session::has('user_id')) {
            $user = Session::get('user_id');
            $wishlist = Users::where('user_id', $user)->pluck('wishlist')->first();
            $wishlist = array_filter(explode(',', $wishlist));
            $products = Product::select(['products.*', 'brands.brand_name'])
                ->leftjoin('brands', 'brands.id', '=', 'products.brand')
                ->whereIn('products.id', $wishlist)->get();
            return view('public.wishlists', ['products' => $products]);
        } else {
            return redirect('user_login');
        }
    }

    public function my_cart()
    {
        if (session()->has('user_id')) {
            $user_id = session()->get('user_id');
            $cart = Cart::where('product_user', $user_id)->pluck('product_id');
            $attributes = Attribute::select('*')->get();
            $attrvalues = Attrvalue::select(['attrvalues.*', 'attributes.title'])
                ->leftjoin('attributes', 'attributes.id', '=', 'attrvalues.attribute')
                ->get();
            $color = Color::select(['colors.*'])->get();
            if (empty($cart)) {
                $products = [];
            } else {
                $products =  Cart::select(['cart.*', 'cart.id as cart_id', 'products.*', 'colors.color_code'])
                    ->leftjoin('products', 'products.id', '=', 'cart.product_id')
                    ->leftjoin('colors', 'colors.id', '=', 'cart.color')
                    ->where('product_user', $user_id)
                    ->whereIn('cart.product_id', $cart)->get();
            }
            return view('public.cart', ['attrvalues' => $attrvalues, 'attributes' => $attributes, 'products' => $products, 'color' => $color]);
        } else {
            return redirect('user_login');
            // return view('public.local-cart');
        }
    }

    public function show_local_cart(Request $request)
    {
        $attributes = Attribute::select('*')->get();
        $attrvalues = Attrvalue::select(['attrvalues.*', 'attributes.title'])
            ->leftjoin('attributes', 'attributes.id', '=', 'attrvalues.attribute')
            ->get();
        $color = Color::select(['colors.*'])->get();

        $products =  Product::whereIn('id', $request->product_id)->get();
        return view('public.partials.show-local-cart', ['attrvalues' => $attrvalues, 'attributes' => $attributes, 'products' => $products, 'color' => $color]);
    }



    public function save_cart(Request $request)
    {
        if ($request->localstorage != '') {
            $products_id = explode(',', $request->input('products_id'));
            $color_id = json_decode(html_entity_decode(stripslashes($request->color_id)));
            $values = json_decode(html_entity_decode(stripslashes($request->attrvalue)));
            for ($i = 0; $i < count($products_id); $i++) {
                $color_name = '';
                $attrvalue = '';
                foreach ($color_id as $key => $value) {
                    if ($key == $products_id[$i]) {
                        $color_name = $value;
                    }
                }
                foreach ($values as $key => $value) {
                    if ($key == $products_id[$i]) {
                        $attrvalue = $value;
                    }
                }
                $datasave = [
                    'product_id' => $products_id[$i],
                    'product_user' => session('user_id'),
                    'attrvalues' => $attrvalue,
                    'color' => $color_name,
                    'created_at' => date('Y-m-d h:i:s'),
                    'updated_at' => date('Y-m-d h:i:s'),
                ];

                Cart::insert($datasave);

                $city = $request->location;
                $state = City::where('id', $city)->pluck('state')->first();
                $country = State::where('id', $state)->pluck('country')->first();
                $user_id = session()->get('user_id');
                Users::where('user_id', $user_id)->update([
                    'city' => $city,
                    'state' => $state,
                    'country' => $country,
                ]);
            }
            return '1';
        } else {
            $product_id = $request->product_id;
            $color_id = '';
            if ($request->color_id) {
                $color_id = $request->color_id;
            }
            $attrvalues = '';
            if ($request->attr) {
                $attrvalues = $request->attr;
            }
            // return $attrvalues;
            if (session()->has('user_name')) {
                $user_id = session()->get('user_id');
                $city = $request->location;
                $state = City::where('id', $city)->pluck('state')->first();
                $country = State::where('id', $state)->pluck('country')->first();
                Users::where('user_id', $user_id)->update([
                    'state' => $state,
                    'city' => $city,
                    'country' => $country,
                ]);
                Cart::where('product_user',$user_id)->where('product_id',$product_id)->delete();
                $request->session()->put('user_city', $city);
                $result = Cart::updateOrCreate(
                    ['product_user' => $user_id, 'product_id' => $product_id],
                    ['attrvalues' => $attrvalues, 'color' => $color_id]
                );


                $count = Cart::where('product_user', $user_id)->count();

                //remove wishlist item
                $userData = User::where('user_id',$user_id)->first();
                $wishlist_ids = explode(',',$userData->wishlist);
                if(in_array($product_id,$wishlist_ids)){
                    $index = array_search($product_id, $wishlist_ids);
                    unset($wishlist_ids[$index]);

                    $newWishlistIds = implode(",",$wishlist_ids);

                    User::where('user_id',$user_id)->update(['wishlist' => $newWishlistIds]);
                }

                return response()->json(['result' => $result, 'count' => $count]);
            } else {
                return 'false';
            }
        }
    }

    public function remove_cart(Request $request)
    {
        $product_id = $request->product_id;
        if (session()->has('user_name')) {
            $destroy = Cart::where(['id' => $product_id])->delete();
            return $destroy;
        } else {
            return 'false';
        }
    }

    public function checkout(Request $request)
    {
        if (session()->has('user_id')) {
            $user_id = session()->get('user_id');
            $user = Users::select(['users.name', 'users.phone', 'users.city', 'users.address', 'users.state', 'users.pin_code', 'users.country', 'countries.country_name', 'states.state_name', 'cities.city_name'])
                ->leftJoin('countries', 'countries.id', '=', 'users.country')
                ->leftJoin('states', 'states.id', '=', 'users.state')
                ->leftJoin('cities', 'cities.id', '=', 'users.city')
                ->where(['user_id' => $user_id])->first();
            // return $user;
            $attributes = Attribute::select('*')->get();
            $attrvalues = Attrvalue::select(['attrvalues.*', 'attributes.title'])
                ->leftjoin('attributes', 'attributes.id', '=', 'attrvalues.attribute')
                ->get();
            if (is_array($request->product_id)) {
                $products =  Product::select(['products.*'])
                    ->whereIn('products.id', $request->product_id)->get();
            } else {
                $products =  Product::select(['products.*'])
                    ->where('products.id', $request->product_id)->get();
            }
            // return $products;
            $colors = Color::select(['colors.*'])->get();

            $payment_method = PaymentMethod::select(['paymentmethod.*'])->get();

            $country = Country::select(['countries.*'])->get();

            $state = State::select(['states.*'])->where('country', $user->country)->get();

            $city = City::select(['cities.*'])->where('state', $user->state)->get();

            return view('public.checkout', ['user' => $user, 'products' => $products, 'attributes' => $attributes, 'attrvalues' => $attrvalues, 'colors' => $colors, 'payment_method' => $payment_method, 'country' => $country, 'state' => $state, 'city' => $city]);
        } else {
            return redirect('user_login');
        }
    }



    public function my_orders()
    {
        if (session()->has('user_name')) {
            $user = session()->get('user_id');
            $my_orders = Order::select(['orders.*', \DB::raw('GROUP_CONCAT(products.product_name SEPARATOR "|||") as names')])
                ->leftJoin('order_products', 'order_products.order_id', '=', 'orders.id')
                ->leftJoin('products', 'products.id', '=', 'order_products.product_id')
                ->where('user', $user)->orderBy('id', 'DESC')
                ->groupBy('orders.id')
                ->get();

            $attrvalues = Attrvalue::select(['attrvalues.*', 'attributes.title'])
                ->leftjoin('attributes', 'attributes.id', '=', 'attrvalues.attribute')
                ->get();
            $color = Color::select(['colors.*'])->get();
            return view('public.my_orders', ['my_orders' => $my_orders, 'attrvalues' => $attrvalues, 'color' => $color]);
        } else {
            return redirect('user_login');
        }
    }

    public function show_order_products(Request $request)
    {
        $user = session()->get('user_id');
        $products = OrderProducts::select(['order_products.*', 'products.product_name', 'products.thumbnail_img', 'products.shipping_days'])
            ->leftJoin('products', 'products.id', '=', 'order_products.product_id')
            ->where('order_id', $request->id)->get();
        $attributes = Attribute::select('*')->get();
        $attrvalues = Attrvalue::select(['attrvalues.*', 'attributes.title'])
            ->leftjoin('attributes', 'attributes.id', '=', 'attrvalues.attribute')
            ->get();
        $color = Color::select(['colors.*'])->get();

        $order = Order::find($request->id);

        return view('public.partials.order-products', ['products' => $products, 'attributes' => $attributes, 'attrvalues' => $attrvalues, 'colors' => $color, 'order' => $order]);
    }

    public function get_state(Request $request)
    {
        if ($request->input()) {
            $country_id = $request->country_id;

            $states = State::where(['country' => $country_id])->get();

            $output = '<option disabled selected value="">Select State Value</option>';
            if (!empty($states)) {
                foreach ($states as $row) {
                    $output .= '<option value="' . $row['id'] . '" data-state="' . $row['id'] . '">' . $row['state_name'] . '</option>';
                }
            } else {
                $output = '<option disabled selected value=">No State Value Found</option>';
            }
            return $output;
        }
    }

    public function get_city(Request $request)
    {
        if ($request->input()) {
            $state_id = $request->state_id;

            $cities = City::where(['state' => $state_id])->get();

            $output = '<option disabled selected value="">Select State Value</option>';
            if (!empty($cities)) {
                foreach ($cities as $row) {
                    $output .= '<option value="' . $row['id'] . '">' . $row['city_name'] . '</option>';
                }
            } else {
                $output = '<option disabled selected value=">No City Value Found</option>';
            }
            return $output;
        }
    }

    public function change_address(Request $request)
    {
        if (session()->has('user_id')) {
            $user_id = session()->get('user_id');
            Users::where('user_id', $user_id)->update([
                'country' => $request->country,
                'state' => $request->state,
                'city' => $request->city
            ]);
            return '1';
        }
    }

    public function my_reviews()
    {
        if (Session::has('user_id')) {
            $user = session()->get('user_id');
            $reviews = Review::select(['reviews.*', 'products.product_name'])
                ->where('user', $user)
                ->leftJoin('products', 'products.id', '=', 'reviews.product')
                ->get();
            return view('public.my-reviews', ['reviews' => $reviews]);
        } else {
            return redirect('user_login');
        }
    }

    // show forgot password page
    public function forgotPassword_show()
    {
        if (session()->has('user_id')) {
            return redirect('/my-profile');
        } else {
            return view('public.forgot-password.forgot');
        }
    }

    // check email and send email
    public function forgotPassword_submit(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users',
        ]);

        $user = Users::where('email', $request->email)->first();
        if ($user->status == '0') {
            return back()->with('message', 'Your Account is blocked by Site Administrator');
        }

        $token = Str::random(40);
        $domain = URL::to('/');
        $url = $domain . '/reset-password?token=' . $token;

        $data['url'] = $url;
        $data['user_name'] = $user->name;
        $data['user_email'] = $request->email;
        $data['title'] = 'Password Reset';
        $data['body'] = 'Please click on below link to reset you password.';
        try {

            Mail::send('public.email.forgotPassword', ['data' => $data], function ($message) use ($data) {
                $message->to($data['user_email'])->subject($data['title']);
            });
            DB::table('password_resets')->insert([
                'email' => $request->email,
                'token' => $token,
                'created_at' => Carbon::now()
            ]);
            return back()->with('message', 'Please check your email to reset your password');
        } catch (Exception $e) {
            return back()->with('message', $e->getMessage());
        }
    }

    // show reset password page
    public function resetPassword_show(Request $request)
    {
        $token = $request->token;
        if (!Session::has('user_id')) {
            $email = DB::table('password_resets')
                ->where([
                    'token' => $token
                ])
                ->first();
            if ($email) {
                return view('public.forgot-password.reset-password', ['token' => $token, 'email' => $email]);
            } else {
                return abort('404');
            }
        } else {
            return redirect('/');
        }
    }


    // update password
    public function submitResetPasswordForm(Request $request)
    {
        if (!Session::has('user_id')) {
            $request->validate([
                'email' => 'required|email|exists:users',
                'password' => 'required|confirmed',
                'password_confirmation' => 'required'
            ]);

            $updatePassword = DB::table('password_resets')
                ->where([
                    'email' => $request->email,
                    'token' => $request->token
                ])
                ->first();

            if (!$updatePassword) {
                return back()->with('error', 'Invalid token!');
            }

            $user = Users::where('email', $request->email)
                ->update(['password' => Hash::make($request->password)]);

            DB::table('password_resets')->where(['email' => $request->email])->delete();

            return redirect('user_login')->with('message', 'Your password has been changed! Login with new password');
        } else {
            return abort('404');
        }
    }

    public function complete_order(Request $request) {
        $request = $request->all();
        $user_id = session()->get('user_id');
        Users::where('user_id',$user_id)->update([
            'country'=>$request['country'],
            'state'=>$request['state'],
            'city'=>$request['city'],
            'address'=>$request['billing_address'].$request['billing_address2'],
            'pin_code'=>$request['zipcode'],
        ]);
        $total_qty = 0;
        foreach($request['qty'] as $key => $value){
            $total_qty += $value;
        }

        $payment_id = Str::random('8');
        $payment = new PaymentData();
        $payment->amount = $request['amt'];
        $payment->txn_id = $payment_id;
        $payment->pay_method = 'cod';
        $payment->pay_status = 1;
        $payment->save();

        $order = new Order();
        $order->fname = $request['fname'];
        $order->lname = $request['lname'];
        $order->user = $user_id;
        $order->products = count($request['product_id']);
        $order->qty = $total_qty;
        $order->pay_id = $payment->id;
        $order->amount = $request['amt'];
        $order->email = $request['email'];
        $order->phone = $request['phone'];
        $order->additional_info = isset($request['additional_info']) ? $request['additional_info'] : null;
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

        return response()->json(1);
    }

    public function my_account(Request $request) {
        $user_id = session()->get('user_id');
        if(!$user_id){
            return redirect()->route('user_login');
        }
        $userData = User::where('user_id',$user_id)->first();
        $orderData = Order::where('user',$user_id)->get();
        return view('public.my_account',compact('userData','orderData'));
    }
}
