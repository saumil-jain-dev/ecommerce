@extends('public.layout')
@section('title','Checkout')
@section('content')

 <main class="main">
    <div class="page-header breadcrumb-wrap">
        <div class="container">
            <div class="breadcrumb">
                <a href='{{ url("/") }}' rel='nofollow'><i class="fi-rs-home mr-5"></i>Home</a>
                <span></span> Shop
                <span></span> Checkout
            </div>
        </div>
    </div>
    <div class="container mb-80 mt-50">
        <div class="row">
            <div class="col-lg-8 mb-40">
                <h1 class="heading-2 mb-10">Checkout</h1>
                
            </div>
        </div>
        <div class="row">
            <div class="col-lg-7">
                <div class="row mb-50">
                    <div class="col-lg-6 mb-sm-15 mb-lg-0 mb-md-3">
                        
                        
                    </div>
                    <div class="col-lg-6">
                        
                    </div>
                </div>
                <div class="row">
                    <h4 class="mb-30">Billing Details</h4>
                    <form method="post" id="order_checkout_form">
                        @csrf
                        <div class="row">
                            <div class="form-group col-lg-6">
                                <input type="text" required="" name="fname" placeholder="First name *">
                            </div>
                            <div class="form-group col-lg-6">
                                <input type="text" required="" name="lname" placeholder="Last name *">
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-lg-6">
                                <input type="text" name="billing_address" required="" placeholder="Address *">
                            </div>
                            <div class="form-group col-lg-6">
                                <input type="text" name="billing_address2" placeholder="Address line2">
                            </div>
                        </div>
                        <div class="row shipping_calculator">
                            <div class="form-group col-lg-6">
                                <div class="custom_select">
                                    <select class="form-control select-active select-country" name="country">
                                        <option value="" disabled selected>Select Country</option>
                                        @if(!empty($country))
                                            @foreach($country as $countries)
                                                @php $selected = ($countries->id == $user->country) ? 'selected' : ''; @endphp
                                                <option value="{{$countries->id}}" data-country="{{$countries->id}}" {{$selected}}>{{$countries->country_name}}</option>
                                            @endforeach
                                        @endif
                                        
                                    </select>
                                </div>
                            </div>
                            <div class="form-group col-lg-6">
                                <div class="custom_select">
                                    <select class="form-control select-active select-state" name="state" id="state" required>
                                        <option value="" disabled selected>First Select Country</option>
                                        @if(!empty($state))
                                            @foreach($state as $states)
                                                @php $selected = ($states->id == $user->state) ? 'selected' : ''; @endphp
                                                <option value="{{$states->id}}" data-state="{{$states->id}}" {{$selected}}>{{$states->state_name}}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-lg-6">
                                <div class="custom_select">
                                    <select class="form-control select-active checkout-city" name="city" id="city" required>
                                        <option value="" disabled selected>First Select State</option>
                                        @if(!empty($city))
                                            @foreach($city as $cities)
                                                @if($user->city != '')
                                                    @php $selected = ($cities->id == $user->city) ? 'selected' : ''; @endphp
                                                @elseif(request()->get('location') && request()->get('location') != '')
                                                    @php $selected = ($cities->id == request()->get('location')) ? 'selected' : ''; @endphp
                                                @endif
                                                <option value="{{$cities->id}}" {{$selected}}>{{$cities->city_name}}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>
                            </div>
                            <div class="form-group col-lg-6">
                                <input required="" type="text" name="zipcode" placeholder="Postcode / ZIP *">
                            </div>
                        </div>
                        <div class="row">
                            
                            <div class="form-group col-lg-6">
                                <input required="" type="text" name="phone" placeholder="Phone *">
                            </div>
                            <div class="form-group col-lg-6">
                                <input required="" type="text" name="email" placeholder="Email address *">
                            </div>
                        </div>
                        <div class="form-group mb-30">
                            <textarea rows="5" placeholder="Additional information" name="additional_info"></textarea>
                        </div>
                        <div class="form-group">
                            <div class="checkbox">
                                
                            </div>
                        </div>
                </div>
            </div>
            <div class="col-lg-5">
                <div class="border p-40 cart-totals ml-30 mb-50">
                    <div class="d-flex align-items-end justify-content-between mb-30">
                        <h4>Your Order</h4>
                        @php $total = 0; @endphp
                        <h6 class="text-muted">Subtotal:{{site_settings()->currency}}<span class="total-amount">{{$total}}</span></h6>
                    </div>
                    <div class="divider-2 mb-30"></div>
                    <div class="table-responsive order_table checkout">
                        <table class="table no-border">
                            <tbody>
                                @foreach($products as $product)
                                    <input type="hidden" name="product_id[]" value="{{$product->id}}">
                                    @if(count((array) request()->get('product_attr')) > 1)
                                    <input type="hidden" name="product_attr[{{$product->id}}]" value="{{request()->get('product_attr')[$product->id]}}">
                                    @else
                                        @php
                                        if(is_array(request()->get('product_attr'))){
                                            $product_attr = (array) request()->get('product_attr');
                                        }else{
                                            $product_attr = (array) json_decode(request()->get('product_attr'));
                                        }
                                        @endphp
                                        @if($product_attr)
                                        <input type="hidden" name="product_attr[{{$product->id}}]" value="{{$product_attr[$product->id]}}">
                                        @endif
                                    @endif
                                    @if(is_array(request()->get('product_color')))
                                    <input type="hidden" name="product_color[{{$product->id}}]" value="{{request()->get('product_color')[$product->id]}}">
                                    @else
                                    <input type="hidden" name="product_color[{{$product->id}}]" value="{{request()->get('product_color')}}">

                                    @endif
                                    @if($product->shipping_charges == 'free')
                                        @php $shipping =0; @endphp
                                    @else
                                        @php
                                            $city = \App\Models\Users::where('user_id',session()->get('user_id'))->pluck('city')->first();
                                            $shipping = \App\Models\City::where('id',$city)->pluck('cost_city')->first();
                                        @endphp
                                    @endif
                                <tr>
                                    <td class="image product-thumbnail"><img src="{{asset('public/products/'.$product->thumbnail_img)}}" alt="#"></td>
                                    <td>
                                        <h6 class="w-160 mb-5"><a class='text-heading' href="{{url('/product/'.$product->slug)}}">{{$product->product_name}}</a></h6></span>
                                        @if($product->color_code != '')
                                            <span><b>Color : </b> <label for="color{{$product->id}}" style="background-color:{{$product->color_code}};cursor:auto;"></label></span>
                                        @endif
                                        @if($product->attrvalues != '')
                                            @php
                                                echo '<ul>';
                                                $p_attr = array_filter(explode(',',$product->attrvalues));
                                                for($i=0;$i<count($p_attr);$i++){
                                                    $atr_val = array_filter(explode(':',$p_attr[$i]));
                                                    echo '<li>';
                                                    foreach($attributes as $attr_array){
                                                        if($attr_array->id == $atr_val[0]){
                                                            echo '<span><b>'.$attr_array->title.':</b></span>';
                                                        }
                                                    }
                                                    foreach($attrvalues as $attr_vals){
                                                        if($attr_vals->id == $atr_val[1] && $atr_val[0] == $attr_vals->attribute){
                                                            echo ' <span>'.$attr_vals->value.'</span>';
                                                        }
                                                    }
                                                    echo '</li>';
                                                }
                                                echo '</ul>';
                                            @endphp
                                        @endif
                                    </td>
                                    <td>
                                        <h6 class="text-muted pl-20 pr-20">x {{request()->get('qty')[$product->id]}}</h6>
                                        <input type="hidden" class="form-control item-qty" style="width:80px;" min='1' name="qty[{{$product->id}}]"value="{{request()->get('qty')[$product->id]}}">
                                    </td>
                                    <td>
                                        <input type="number" class="product-price" name="price[{{$product->id}}]" value="{{get_product_price($product->id)->new_price}}" hidden>
                                        <input type="number" class="product-shipping" value="{{$shipping}}" hidden>
                                        @if(is_array(request()->get('qty')))
                                            <td>
                                            {{site_settings()->currency}}<span class="product-total">{{(get_product_price($product->id)->new_price*request()->get('qty')[$product->id]) + $shipping}}</span>
                                            </td>
                                            @php $total += (get_product_price($product->id)->new_price*request()->get('qty')[$product->id]) + $shipping;  @endphp
                                            <input type="hidden" name="amt" value="{{ $total }}">
                                        @else
                                        <td>
                                            {{site_settings()->currency}}<span class="product-total">{{(get_product_price($product->id)->new_price*request()->get('qty')) + $shipping}}</span>
                                            @php $total += (get_product_price($product->id)->new_price*request()->get('qty')) + $shipping;  @endphp
                                            <input type="hidden" name="amt" value="{{ $total }}">
                                        @endif
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="payment ml-30">
                    <h4 class="mb-30">Payment</h4>
                    <div class="payment_option">
                        
                        <div class="custome-radio">
                            <input class="form-check-input" required="" type="radio" name="pay_method" id="exampleRadios4" checked="" value="cod">
                            <label class="form-check-label" for="exampleRadios4" data-bs-toggle="collapse" data-target="#checkPayment" aria-controls="checkPayment">Cash on delivery</label>
                        </div>
                        
                    </div>
                    <div class="payment-logo d-flex">
                        <img class="mr-15" src="assets/imgs/theme/icons/payment-paypal.svg" alt="">
                        <img class="mr-15" src="assets/imgs/theme/icons/payment-visa.svg" alt="">
                        <img class="mr-15" src="assets/imgs/theme/icons/payment-master.svg" alt="">
                        <img src="assets/imgs/theme/icons/payment-zapper.svg" alt="">
                    </div>
                    <a href="#" class="btn btn-fill-out btn-block mt-30">Place an Order<i class="fi-rs-sign-out ml-15"></i></a>
                    <input type="submit" value="Place an Order" class="btn btn-fill-out btn-block mt-30">
                </div>
                </form>
            </div>
        </div>
    </div>
</main>
@stop
@section('pageJsScripts')
<script src="https://checkout.razorpay.com/v1/checkout.js" type="text/javascript"></script>
<script>
    $(function(){
        var uRL = $('meta[name=site-url]').attr('content');

            // Leave step event is used for validating the forms
            $("#smartwizard").on("leaveStep", function(e, anchorObject, currentStepIdx, nextStepIdx, stepDirection) {
                // Validate only on forward movement
                if (stepDirection == 'forward') {
                  let form = document.getElementById('form-' + (currentStepIdx + 1));
                  if (form) {
                    if (!form.checkValidity()) {
                      form.classList.add('was-validated');
                      $('#smartwizard').smartWizard("setState", [currentStepIdx], 'error');
                      $("#smartwizard").smartWizard('fixHeight');
                      return false;
                    }
                    $('#smartwizard').smartWizard("unsetState", [currentStepIdx], 'error');
                  }
                }
            });

            // Step show event
            $("#smartwizard").on("showStep", function(e, anchorObject, stepIndex, stepDirection, stepPosition) {
                $("#prev-btn").removeClass('disabled').prop('disabled', false);
                $("#next-btn").removeClass('disabled').prop('disabled', false);
                if(stepPosition === 'first') {
                    $("#prev-btn").addClass('disabled').prop('disabled', true);
                } else if(stepPosition === 'last') {
                    $("#next-btn").addClass('disabled').prop('disabled', true);
                } else {
                    $("#prev-btn").removeClass('disabled').prop('disabled', false);
                    $("#next-btn").removeClass('disabled').prop('disabled', false);
                }

                // Get step info from Smart Wizard
                let stepInfo = $('#smartwizard').smartWizard("getStepInfo");
                $("#sw-current-step").text(stepInfo.currentStep + 1);
                $("#sw-total-step").text(stepInfo.totalSteps);

                if (stepPosition == 'last') {
                //   showConfirm();
                  $("#btnFinish").prop('disabled', false);
                } else {
                  $("#btnFinish").prop('disabled', true);
                }

                // Focus first name
                if (stepIndex == 1) {
                  setTimeout(() => {
                    $('#first-name').focus();
                  }, 0);
                }
            });

            // Smart Wizard
            $('#smartwizard').smartWizard({
                selected: 0,
                // autoAdjustHeight: false,
                theme: 'round', // basic, arrows, square, round, dots
                transition: {
                  animation:'none'
                },
                toolbar: {
                  showNextButton: true, // show/hide a Next button
                  showPreviousButton: true, // show/hide a Previous button
                  position: 'bottom', // none/ top/ both bottom
                  extraHtml: `<button class="btn btn-success confirm-order" id="btnFinish" disabled>Complete Order</button>`
                },
                anchor: {
                    enableNavigation: true, // Enable/Disable anchor navigation
                    enableNavigationAlways: false, // Activates all anchors clickable always
                    enableDoneState: true, // Add done state on visited steps
                    markPreviousStepsAsDone: true, // When a step selected by url hash, all previous steps are marked done
                    unDoneOnBackNavigation: true, // While navigate back, done state will be cleared
                    enableDoneStateNavigation: true // Enable/Disable the done state navigation
                },
            });

            $("#state_selector").on("change", function() {
                $('#smartwizard').smartWizard("setState", [$('#step_to_style').val()], $(this).val(), !$('#is_reset').prop("checked"));
                return true;
            });

            $("#style_selector").on("change", function() {
                $('#smartwizard').smartWizard("setStyle", [$('#step_to_style').val()], $(this).val(), !$('#is_reset').prop("checked"));
                return true;
            });

            // function onConfirm() {
            $(document).on('click','.confirm-order',function(){
                var amount = $('.total-amount').html();
                var method = $('input[name=pay_method]:checked').val();
                if(method == undefined || method == ''){
                    Swal.fire({
                        icon: 'warning',
                        title: 'Select Payment Method',
                        showConfirmButton: false,
                        timer: 1500
                    })
                }else{
                    if(method == 'paypal'){
                        var formdata = $('#form-1,#form-2,#form-3').serialize();
                        console.log(formdata);
                        window.location.href = uRL+'/pay-with-paypal/'+amount+'?'+formdata;
                    }else{
                        var tr = '';
                        var razorpay = new Razorpay({
                            key: $('input[name=razor_key]').val(),
                            amount: amount*100,
                            name: 'Wallet Top Up',
                            order_id: '',
                            handler: function (transaction) {
                                tr = transaction.razorpay_payment_id;
                                var formdata = $('#form-1,#form-2,#form-3').serialize();
                                window.location.href = uRL+'/pay-with-razorpay/'+amount+'/'+tr+'?'+formdata;
                            }
                        });
                        razorpay.open();
                    }
                }

            })
    });
</script>
@stop
