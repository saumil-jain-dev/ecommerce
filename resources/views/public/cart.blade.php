@extends('public.layout')
@section('title', 'My Cart')
@section('content')
<main class="main">
    <div class="page-header breadcrumb-wrap">
        <div class="container">
            <div class="breadcrumb">
                <a href='{{ route("home") }}' rel='nofollow'><i class="fi-rs-home mr-5"></i>Home</a>
                <span></span> Shop
                <span></span> Cart
            </div>
        </div>
    </div>
    <div class="container mb-80 mt-50">
        <div class="row">
            <div class="col-lg-8 mb-40">
                <h1 class="heading-2 mb-10">Your Cart</h1>
                <div class="d-flex justify-content-between">
                    @if($products->isNotEmpty())
                    <h6 class="text-body">There are <span class="text-brand">@if($products->isNotEmpty()) {{ count($products) }} @else 0 @endif</span> products in your cart</h6>
                    @endif
                </div>
            </div>
        </div>
        <form action="{{url('/checkout')}}">
        @csrf
        <div class="row">
            <div class="col-lg-8">
                <div class="table-responsive shopping-summery">
                    @if($products->isNotEmpty())
                    
                    <table class="table table-wishlist">
                        <thead>
                            <tr class="main-heading">
                                <th scope="col" colspan="2">Product</th>
                                <th scope="col">Unit Price</th>
                                <th scope="col">Quantity</th>
                                <th scope="col">Subtotal</th>
                                <th scope="col" class="end">Remove</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($products as $product)
                            <input type="hidden" name="product_id[]" value="{{$product->id}}">
                                <input type="hidden" name="product_attr[{{$product->id}}]" value="{{$product->attrvalues}}">
                                <input type="hidden" name="product_color[{{$product->id}}]" value="{{$product->color}}">
                                 @if($product->shipping_charges == 'free')
                                    @php $shipping =0; @endphp
                                @else
                                    @php
                                        $shipping = \App\Models\City::where('id',session()->get('user_city'))->pluck('cost_city')->first();
                                    @endphp
                                @endif
                            <tr class="pt-30">
                                
                                <td class="image product-thumbnail pt-40"><img src="{{asset('public/products/'.$product->thumbnail_img)}}" alt="#" width="70px"></td>
                                <td class="product-des product-name">
                                    <h6 class="mb-5"><a class='product-name mb-10 text-heading' href="{{url('/product/'.$product->slug)}}">{{$product->product_name}}</a></h6><br>
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
                                <td class="price" data-title="Price">
                                    <h4 class="text-body">{{site_settings()->currency}}{{get_product_price($product->id)->new_price}} </h4>
                                </td>
                                <td class="text-center detail-info" data-title="Stock">
                                    <div class="detail-extralink mr-15">
                                        <div class="detail-qty border radius">
                                            
                                           <input type="number" class="form-control item-qty " min='1' name="qty[{{$product->id}}]" style="width: 80px;" value="1">
                                            <input type="number" class="product-price" name="price[{{$product->id}}]" value="{{get_product_price($product->id)->new_price}}" hidden>
                                            <input type="hidden" name="cart_id" value="{{ $product->id}}" class="cart_id">
                                            <input type="number" class="product-shipping" value="{{$shipping}}" hidden>
                                            
                                        </div>
                                    </div>
                                </td>
                                <td class="price" data-title="Price">
                                    <h4 class="text-brand"> {{site_settings()->currency}}<span class="product-total {{$product->id}}_total">{{get_product_price($product->id)->new_price + $shipping}} </span></h4>
                                </td>
                                <td class="action text-center" data-title="Remove">
                                <button type="button" class="btn btn-danger remove-cart" data-id="{{$product->cart_id}}"><i class="fi-rs-trash"></i></button></td>
                            </tr>
                               @endforeach
                        </tbody>
                    </table>
                    @else
                <div class="content-box text-center">
                        <p class="">No Cart Found</p>
                        <a href="{{url('/')}}" class="btn btn-primary">Shop Now</a>
                    </div>
                @endif
                
                </div>
                <div class="divider-2 mb-30"></div>
                

                <div class="row mt-50">
                    <div class="col-lg-7">
                        <div class="p-40">
                            <h4 class="mb-10">Apply Coupon</h4>
                            <p class="mb-30"><span class="font-lg text-muted">Using A Promo Code?</p>
                            <form action="#">
                                <div class="d-flex justify-content-between">
                                    <input class="font-medium mr-15 coupon" name="Coupon" placeholder="Enter Your Coupon">
                                    <button class="btn"><i class="fi-rs-label mr-10"></i>Apply</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="border p-md-4 cart-totals ml-30">
                    <div class="table-responsive">
                        <table class="table no-border">
                            <tbody>
                                <tr>
                                    <td class="cart_total_label">
                                        <h6 class="text-muted">Subtotal</h6>
                                    </td>
                                    <td class="cart_total_amount">
                                        <h4 class="text-brand text-end">{{site_settings()->currency}}<span class="total-amount"></span></h4>
                                    </td>
                                </tr>
                                <tr>
                                    <td scope="col" colspan="2">
                                        <div class="divider-2 mt-10 mb-10"></div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="cart_total_label">
                                        <h6 class="text-muted">Shipping</h6>
                                    </td>
                                    <td class="cart_total_amount">
                                        <h5 class="text-heading text-end">Free</h4></td> </tr> <tr>
                                     </tr> <tr>
                                    <td scope="col" colspan="2">
                                        <div class="divider-2 mt-10 mb-10"></div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="cart_total_label">
                                        <h6 class="text-muted">Total</h6>
                                    </td>
                                    <td class="cart_total_amount">
                                        <h4 class="text-brand text-end">{{site_settings()->currency}}<span class="total-amount"></span></h4>
                                    </td>
                                </tr>
                            </tbody>
                        </table>

                    </div>
                    
                    <input type="submit" class="btn mb-20 w-100" name="checkout" value="Proceed to Checkout">
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>
@stop