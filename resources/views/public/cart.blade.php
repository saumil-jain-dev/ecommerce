@extends('public.layout')
@section('title', 'My Cart')
@section('content')
    <section class="section-breadcrumb">
        <div class="cr-breadcrumb-image">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="cr-breadcrumb-title">
                            <h2>My Cart</h2>
                            <span> <a href="{{ url('/') }}">Home</a> - My Cart</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="section-cart padding-t-100">
        <div class="container">
            <div class="row d-none">
                <div class="col-lg-12">
                    <div class="mb-30 aos-init aos-animate" data-aos="fade-up" data-aos-duration="2000"
                        data-aos-delay="400">
                        <div class="cr-banner">
                            <h2>Cart</h2>
                        </div>
                        <div class="cr-banner-sub-title">
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt
                                ut labore lacus vel facilisis. </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="cr-cart-content aos-init aos-animate" data-aos="fade-up" data-aos-duration="2000"
                        data-aos-delay="400">
                        <div class="row">
                            @if ($products->isNotEmpty())
                                <form action="{{ url('/checkout') }}">
                                    @csrf
                                    <div class="cr-table-content">
                                        <table>
                                            <thead>
                                                <tr>
                                                    <th>Product</th>
                                                    <th>price</th>
                                                    <th class="text-center">Quantity</th>
                                                    <th>Total</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($products as $product)
                                                    <input type="hidden" name="product_id[]" value="{{ $product->id }}">
                                                    <input type="hidden" name="product_attr[{{ $product->id }}]"
                                                        value="{{ $product->attrvalues }}">
                                                    <input type="hidden" name="product_color[{{ $product->id }}]"
                                                        value="{{ $product->color }}">
                                                    <tr>
                                                        <td class="cr-cart-name">
                                                            <a href="javascript:void(0)">
                                                                <img src="{{ asset('public/products/' . $product->thumbnail_img) }}"
                                                                    alt="product-1" class="cr-cart-img">
                                                                {{ $product->product_name }}
                                                            </a>
                                                        </td>
                                                        <td class="cr-cart-price">
                                                            <span
                                                                class="amount">{{ site_settings()->currency }}{{ get_product_price($product->id)->new_price }}</span>
                                                        </td>
                                                        <td class="cr-cart-qty">
                                                            <div class="cart-qty-plus-minus">
                                                                <button type="button" class="plus">+</button>
                                                                <input type="text" placeholder="." value="1"
                                                                    minlength="1" maxlength="20" class="quantity">
                                                                <button type="button" class="minus">-</button>
                                                            </div>
                                                        </td>
                                                        <td class="cr-cart-subtotal">$56.00</td>
                                                        <td class="cr-cart-remove">
                                                            <a href="javascript:void(0)" class="remove-cart"
                                                                data-id="{{ $product->cart_id }}">
                                                                <i class="ri-delete-bin-line"></i>
                                                            </a>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                                <tr>
                                                    <td colspan="4" align="right"><b>Total Amount</b></td>
                                                    <td class="">{{ site_settings()->currency }}<span
                                                            class="total-amount"></span></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="cr-cart-update-bottom">
                                                <a href="{{ url('/') }}" class="cr-links">Continue Shopping</a>

                                                <input type="submit" class="cr-button" name="checkout"
                                                    value="Proceed to Checkout">
                                            </div>
                                        </div>
                                    </div>
                                @else
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <p class="">No Cart Found</p>
                                            <a href="{{ url('/') }}" class="btn btn-primary">Shop Now</a>
                                        </div>
                                    </div>
                            @endif

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@stop
