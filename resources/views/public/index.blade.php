@extends('public.layout')
@section('title', site_settings()->site_title)
@section('content')
<main class="main">
    <section class="home-slider position-relative mb-30">
        <div class="container">
            <div class="home-slide-cover mt-30">
                <div class="hero-slider-1 style-4 dot-style-1 dot-style-1-position-1">
                    @foreach($banner as $item)
                    @if($item->status == '1')
                    <div class="single-hero-slider single-animation-wrap"
                        style="background-image: url({{ asset('public/banner/'.$item->banner_img) }}">
                        <div class="slider-content">
                            <h1 class="display-2 mb-40">
                                Don’t miss amazing<br />
                                Spices deals
                            </h1>
                           
                        </div>
                    </div>
                    @endif
                    @endforeach
                </div>
                <div class="slider-arrow hero-slider-1-arrow"></div>
            </div>
        </div>
    </section>

    <section class="product-tabs section-padding position-relative">
        <div class="container">
            <div class="section-title style-2 wow animate__animated animate__fadeIn">
                <h3>Latest Products</h3>
                
            </div>
            <!--End nav-tabs-->
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="tab-one" role="tabpanel" aria-labelledby="tab-one">
                    <div class="row product-grid-4">
                        @if($latest_products->isNotEmpty())
                        @foreach($latest_products as $item)
                        <div class="col-lg-1-5 col-md-4 col-12 col-sm-6">
                            <div class="product-cart-wrap mb-30 wow animate__animated animate__fadeIn"
                                data-wow-delay=".1s">
                                <div class="product-img-action-wrap">
                                    <div class="product-img product-img-zoom">
                                        <a href="{{url('/product/'.$item->slug)}}">
                                            <img class="default-img" src="{{asset('public/products/'.$item->thumbnail_img)}}"
                                                alt=""  height="200px" width="150px" />
                                            
                                        </a>
                                    </div>
                                    
                                    <div class="product-badges product-badges-position product-badges-mrg">
                                        <span class="hot">Hot</span>
                                    </div>
                                </div>
                                <div class="product-content-wrap">
                                    <div class="product-category">
                                        <a href='javascript:void(0)'>{{$item->brand_name}}</a>
                                    </div>
                                    <h2><a href="{{url('/product/'.$item->slug)}}">{{ $item->product_name }}</a></h2>
                                    
                                    
                                    <div class="product-card-bottom">
                                        @php $product_price = get_product_price($item->id); @endphp
                                        <div class="product-price">
                                            
                                            <span>{{site_settings()->currency}}{{$product_price->new_price}}</span>
                                            @if($product_price->discount != '')
                                            <span class="old-price">{{site_settings()->currency}}{{$product_price->old_price}}</span>
                                            @endif
                                        </div>
                                        <div class="add-cart">
                                            <a class='add product-add-to-cart' href='javascript:void(0)' data-id="{{ $item->id }}" data-user="{{session()->get('user_id')}}"><i class="fi-rs-shopping-cart mr-5"></i>Add </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        @endif
                        <!--end product card-->

                    </div>
                    <!--End product-grid-4-->
                </div>
                <!--En tab one-->
                
                <!--En tab seven-->
            </div>
            <!--End tab-content-->
        </div>  
    </section>

    @if($latest_products->isNotEmpty())
    <section class="product-tabs section-padding position-relative">
        <div class="container">
            <div class="section-title style-2 wow animate__animated animate__fadeIn">
                <h3>Today Deals</h3>
                
            </div>
            <!--End nav-tabs-->
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="tab-one" role="tabpanel" aria-labelledby="tab-one">
                    <div class="row product-grid-4">
                        
                        @foreach($today_deal_products as $item)
                        <div class="col-lg-1-5 col-md-4 col-12 col-sm-6">
                            <div class="product-cart-wrap mb-30 wow animate__animated animate__fadeIn"
                                data-wow-delay=".1s">
                                <div class="product-img-action-wrap">
                                    <div class="product-img product-img-zoom">
                                        <a href="{{url('/product/'.$item->slug)}}">
                                            <img class="default-img" src="{{asset('public/products/'.$item->thumbnail_img)}}"
                                                alt=""  height="200px" width="150px" />
                                            
                                        </a>
                                    </div>
                                    
                                    <div class="product-badges product-badges-position product-badges-mrg">
                                        <span class="hot">Hot</span>
                                    </div>
                                </div>
                                <div class="product-content-wrap">
                                    <div class="product-category">
                                        <a href='javascript:void(0)'>{{$item->brand_name}}</a>
                                    </div>
                                    <h2><a href="{{url('/product/'.$item->slug)}}">{{ $item->product_name }}</a></h2>
                                    
                                    
                                    <div class="product-card-bottom">
                                        @php $product_price = get_product_price($item->id); @endphp
                                        <div class="product-price">
                                            
                                            <span>{{site_settings()->currency}}{{$product_price->new_price}}</span>
                                            @if($product_price->discount != '')
                                            <span class="old-price">{{site_settings()->currency}}{{$product_price->old_price}}</span>
                                            @endif
                                        </div>
                                        <div class="add-cart">
                                            <a class='add product-add-to-cart' href='javascript:void(0)' data-id="{{ $item->id }}" data-user="{{session()->get('user_id')}}"><i class="fi-rs-shopping-cart mr-5"></i>Add </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        
                        <!--end product card-->

                    </div>
                    <!--End product-grid-4-->
                </div>
                <!--En tab one-->
                
                <!--En tab seven-->
            </div>
            <!--End tab-content-->
        </div>
    </section>
    @endif
    <!--Products Tabs-->
    
    @if($flash_products->isNotEmpty())
    <section class="product-tabs section-padding position-relative">
        <div class="container">
            <div class="section-title style-2 wow animate__animated animate__fadeIn">
                <h3>Flash Sale</h3>
                
            </div>
            <!--End nav-tabs-->
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="tab-one" role="tabpanel" aria-labelledby="tab-one">
                    <div class="row product-grid-4">
                        
                        @foreach($flash_products as $item)
                        @php 
                          date_default_timezone_set('Asia/Kolkata');
                          $datetimes = explode('-',$item->flash_date_range);
                          $currentDatetimes = date('Y-m-d H:i A');
                          if($item->flash_date_range != ''){
                            $startDatetimes = date('Y-m-d H:i A', strtotime("$datetimes[0]"));
                            $endDatetimes = date('Y-m-d H:i A', strtotime("$datetimes[1]"));
                          }else{
                            $startDatetimes = '';
                            $endDatetimes = '';
                          }
                        @endphp
                        @if(($currentDatetimes >= $startDatetimes) && ($currentDatetimes <= $endDatetimes))
                        <div class="col-lg-1-5 col-md-4 col-12 col-sm-6">
                            <div class="product-cart-wrap mb-30 wow animate__animated animate__fadeIn"
                                data-wow-delay=".1s">
                                <div class="product-img-action-wrap">
                                    <div class="product-img product-img-zoom">
                                        <a href="{{url('/product/'.$item->slug)}}">
                                            <img class="default-img" src="{{asset('public/products/'.$item->thumbnail_img)}}"
                                                alt=""  height="200px" width="150px" />
                                            
                                        </a>
                                    </div>
                                    
                                    <div class="product-badges product-badges-position product-badges-mrg">
                                        <span class="hot">Hot</span>
                                    </div>
                                </div>
                                <div class="product-content-wrap">
                                    <div class="product-category">
                                        <a href='javascript:void(0)'>{{$item->brand_name}}</a>
                                    </div>
                                    <h2><a href="{{url('/product/'.$item->slug)}}">{{ $item->product_name }}</a></h2>
                                    
                                    
                                    <div class="product-card-bottom">
                                        @php $product_price = get_product_price($item->id); @endphp
                                        <div class="product-price">
                                            
                                            <span>{{site_settings()->currency}}{{$product_price->new_price}}</span>
                                            @if($product_price->discount != '')
                                            <span class="old-price">{{site_settings()->currency}}{{$product_price->old_price}}</span>
                                            @endif
                                        </div>
                                        <div class="add-cart">
                                            <a class='add product-add-to-cart' href='javascript:void(0)' data-id="{{ $item->id }}" data-user="{{session()->get('user_id')}}"><i class="fi-rs-shopping-cart mr-5"></i>Add </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endif
                        @endforeach
                        
                        <!--end product card-->

                    </div>
                    <!--End product-grid-4-->
                </div>
                <!--En tab one-->
                
                <!--En tab seven-->
            </div>
            <!--End tab-content-->
        </div>
    </section>
    @endif

    <!--End Best Sales-->

</main>
@stop

@section('pageJsScripts')
    

@stop
