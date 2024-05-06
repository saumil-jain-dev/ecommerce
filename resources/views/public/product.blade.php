@extends('public.layout')
@section('title', $product->product_name)
@section('content')
<main class="main">
    <div class="page-header breadcrumb-wrap">
        <div class="container">
            <div class="breadcrumb">
                <a href='{{ route("home") }}' rel='nofollow'><i class="fi-rs-home mr-5"></i>Home</a><span></span>{{ $text }}
                
                 
            </div>
        </div>
    </div>
    <div class="container mb-30">
        <div class="row">
            <div class="col-xl-11 col-lg-12 m-auto">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="product-detail accordion-detail">
                            <div class="row mb-50 mt-30">
                                <div class="col-md-6 col-sm-12 col-xs-12 mb-md-0 mb-sm-5">
                                    <div class="detail-gallery">
                                        <span class="zoom-icon"><i class="fi-rs-search"></i></span>
                                        <!-- MAIN SLIDES -->
                                        <div class="product-image-slider">
                                            @php 
                                                $images = array_filter(explode(',',$product->gallery_img));
                                            @endphp
                                            @for($i=0; $i < count($images); $i++)
                                            <figure class="border-radius-10">
                                                <img src="{{asset('public/products/'.$images[$i])}}" alt="product image" />
                                            </figure>
                                            @endfor
                                        </div>
                                        <!-- THUMBNAILS -->
                                        <div class="slider-nav-thumbnails">
                                             @php 
                                                $images = array_filter(explode(',',$product->gallery_img));
                                            @endphp
                                            @for($i=0; $i < count($images); $i++)
                                            <div><img src="{{asset('public/products/'.$images[$i])}}" alt="product image" /></div>
                                            @endfor
                                        </div>
                                    </div>
                                    <!-- End Gallery -->
                                </div>
                                <div class="col-md-6 col-sm-12 col-xs-12">
                                    <div class="detail-info pr-30 pl-30">
                                        <h2 class="title-detail">{{ $product->product_name }}</h2>
                                        <div class="product-detail-rating">
                                            
                                        </div>
                                        <div class="clearfix product-price-cover">
                                            <div class="product-price primary-color float-left">
                                                @php $product_price = get_product_price($product->id); @endphp
                                                <span class="current-price text-brand">{{site_settings()->currency}}{{$product_price->new_price}}</span>
                                                <span>
                                                    @if($product_price->discount != '')
                                                    <span class="save-price font-md color3 ml-15">{{$product_price->discount}} Off</span>
                                                    <span class="old-price font-md ml-15">{{site_settings()->currency}}{{$product_price->old_price}}</span>
                                                    @endif
                                                </span>
                                            </div>
                                        </div>
                                        <div class="short-desc mb-30">
                                            <p class="font-lg"></p>
                                        </div>
                                        <div class="attr-detail attr-size mb-30">
                                            @foreach($attributes as $row)
                                            @php
                                                $value = array_filter(explode(',',$row->attrvalues));
                                            @endphp
                                            <strong class="mr-10">{{$row->title}}: </strong>
                                            @php $j=0;  @endphp
                                            <ul class="list-filter size-filter font-small">
                                                @foreach($attrvalues as $item1)
                                                    @if(in_array($item1->id,$value))
                                                    @php $attr_check = ($j==0) ? 'active' : '';  @endphp
                                                    <input type="hidden" name="product_attrvalues"  value="{{$item1->id}}" data-id="{{$row->product_id}}">
                                                
                                                <li class="{{$attr_check}}"><a href="#">{{$item1->value}}</a></li>
                                                @php $j++;  @endphp
                                                @endif
                                                @endforeach
                                            </ul>
                                            @endforeach
                                        </div>
                                        <div class="detail-extralink mb-50">
                                            <div class="detail-qty border radius">
                                                <a href="#" class="qty-down"><i class="fi-rs-angle-small-down"></i></a>
                                                <input type="text" name="quantity" class="qty-val" value="1" min="1">
                                                <a href="#" class="qty-up"><i class="fi-rs-angle-small-up"></i></a>
                                            </div>
                                            <div class="product-extra-link2">
                                                <button type="submit" class="button button-add-to-cart custom-add-to-cart" id="addcart" data-user="{{session()->get('user_id')}}" data-id="{{$product->id}}"><i class="fi-rs-shopping-cart"></i>Add to cart</button>
                                                <a aria-label='Add To Wishlist' class='action-btn hover-up' href='shop-wishlist.html'><i class="fi-rs-heart"></i></a>
                                                
                                            </div>
                                        </div>
                                        
                                    </div>
                                    <!-- Detail Info -->
                                </div>
                            </div>
                            <div class="product-info">
                                <div class="tab-style3">
                                    <ul class="nav nav-tabs text-uppercase">
                                        <li class="nav-item">
                                            <a class="nav-link active" id="Description-tab" data-bs-toggle="tab" href="#Description">Description</a>
                                        </li>
                                        
                                    </ul>
                                    <div class="tab-content shop_info_tab entry-main-content">
                                        <div class="tab-pane fade show active" id="Description">
                                            <div class="">
                                                {!!htmlspecialchars_decode($product->description)!!}
                                            </div>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                            @if($related->isNotEmpty($related))
                            <div class="row mt-60">
                                <div class="col-12">
                                    <h2 class="section-title style-1 mb-30">Related products</h2>
                                </div>
                                <div class="col-12">
                                    <div class="row related-products">
                                        @foreach($related as $item)
                                        <div class="col-lg-3 col-md-4 col-12 col-sm-6">
                                            <div class="product-cart-wrap hover-up">
                                                <div class="product-img-action-wrap">
                                                    <div class="product-img product-img-zoom">
                                                        <a href="{{url('/product/'.$item->slug)}}" tabindex='0'>
                                                            <img class="default-img" src="{{asset('public/products/'.$item->thumbnail_img)}}" alt="" height="200px" width="50px" />
                                                            
                                                        </a>
                                                    </div>
                                                    
                                                    <div class="product-badges product-badges-position product-badges-mrg">
                                                        <span class="hot">Hot</span>
                                                    </div>
                                                </div>
                                                <div class="product-content-wrap">
                                                    <h2><a href="{{url('/product/'.$item->slug)}}">{{substr($item->product_name,0,25).'...'}}</a></h2>
                                                    
                                                    @php $product_price = get_product_price($item->id); @endphp
                                                    <div class="product-price">
                                                        
                                                        <span>{{site_settings()->currency}}{{$product_price->new_price}}</span>
                                                        @if($product_price->discount != '')
                                                        <span class="old-price">{{site_settings()->currency}}{{$product_price->old_price}}</span>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            @endif
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</main>
@stop

@section('pageJsScripts')

    <script type="text/javascript">
        $(document).ready(function() {

            $(document).on('click', '#checkout', function() {
                var attr = {};
                var p_id = $('input[name=product_id]').val();

                if ($('input[name=product_color]').length > 0) {
                    var color_id = $('input[name="product_color"]:checked').val();
                    if (color_id == '') {
                        alert('Select Color');
                    }
                }
                if ($('.product-attributes').length > 0) {
                    var attr_val = '';
                    $('.product-attributes').each(function() {
                        var key = $(this).children('input[class=attrvalue]:checked').attr(
                            'data-attr');
                        var val = $(this).children('input[class=attrvalue]:checked').val();
                        attr_val += key + ':' + val + ',';
                    });
                    attr[p_id] = attr_val;
                }

                var base_url = $('.demo').val();
                var location = $('.shipping option:selected').val();
                if (location == '') {
                    Swal.fire({
                        icon: 'warning',
                        title: 'Select Location',
                        showConfirmButton: false,
                        timer: 1000
                    });
                } else {
                    var url = base_url + "/checkout?product_id=" + p_id + "&product_color=" + color_id +
                        "&product_attr=" + encodeURIComponent(JSON.stringify(attr)) + "&location=" +
                        location + "&qty=1";
                    window.location.href = url;
                }

            });

            var owl = $('.related-carousel');
            owl.owlCarousel({
                margin: 30,
                loop: false,
                nav: false,
                responsive: {
                    0: {
                        items: 1
                    },
                    450: {
                        items: 2
                    },
                    600: {
                        items: 3
                    },
                    1000: {
                        items: 4
                    },
                }
            });


        });

        function increment() {
            document.getElementById('demoInput').stepUp();
        }

        function decrement() {
            document.getElementById('demoInput').stepDown();
        }

        function show_shipping_charges() {
            var shipping_charges = $('.shipping').children('option:selected').data('shipping');
            var product_shipping = $('.shipping').children('option:selected').data('p-ship');
            if (product_shipping != 'free') {
                if (shipping_charges != undefined && shipping_charges > -1) {
                    var row = '<p><span><b>Shipping Charges :</b> {{ site_settings()->currency }}' + shipping_charges +
                        '</span></p>';
                }
            } else {
                var row = '<p><span><b>Shipping Charges :</b> Free</span></p>';
            }
            $('.shipping-charges').html(row);
        }
        show_shipping_charges();

        $(document).on('change', '.shipping', function() {
            show_shipping_charges();
        });
    </script>
@stop
