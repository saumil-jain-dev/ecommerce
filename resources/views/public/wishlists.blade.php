@extends('public.layout')
@section('title','My Wishlist')
@section('content')
<section class="section-breadcrumb">
    <div class="cr-breadcrumb-image">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="cr-breadcrumb-title">
                        <h2>My Wishlist</h2>
                        <span> <a href="{{url('/')}}">Home</a> - My Wishlist</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="section-products padding-t-100">
    <div class="container">
        <div class="row mb-minus-24">
            @if($products->isNotEmpty())
            @foreach($products as $item)
            <div class="col-lg-4 col-md-6 col-6 cr-product-box mb-24 aos-init aos-animate" data-aos="fade-up" data-aos-duration="2000" data-aos-delay="300">
                <div class="cr-product-csc cr-product-card">
                    <div class="cr-product-image">
                        <div class="cr-image-inner">
                            <a href="{{url('/product/'.$item->slug)}}" class="image">
                                <img src="{{asset('public/products/'.$item->thumbnail_img)}}" alt="product-3">

                            </a>
                            <div class="cr-side-view">
                                @if(Session::has('user_id'))
                                <li><a href="javascript:void(0)" class="wishlist-active" data-tip="Add to Wishlist" data-id="{{$item->id}}"><i class="far fa-heart"></i></a></li>
                                @else
                                <li><a href="{{url('user_login')}}" data-tip="Add to Wishlist" data-id="{{$item->id}}"><i class="far fa-heart"></i></a></li>
                                @endif
                                <a href="javascript:void(0)" class="wishlist">
                                    <i class="ri-heart-line"></i>
                                </a>
                                <a class="model-oraganic-product" data-bs-toggle="modal" href="#quickview" role="button">
                                    <i class="ri-eye-line"></i>
                                </a>
                            </div>
                        </div>
                        <a class="cr-shopping-bag" href="javascript:void(0)">
                            <i class="ri-shopping-bag-line"></i>
                        </a>
                    </div>
                    <div class="cr-product-details">
                        <a class="title" href="{{url('/product/'.$item->slug)}}">{{$item->product_name}}</a>
                        <p><a href="">{{$item->brand_name}}</a></p>
                        <div class="cr-star">
                            <i class="ri-star-fill"></i>
                            <i class="ri-star-fill"></i>
                            <i class="ri-star-fill"></i>
                            <i class="ri-star-fill"></i>
                            <i class="ri-star-fill"></i>
                        </div>
                        <p class="cr-price"><span class="new-price">{{$item->unit_price}}</span> <span class="old-price">$123.25</span></p>
                    </div>
                    <button type="button" class="btn btn-danger btn-sm mt-2 remove-wishlist" data-id="{{$item->id}}">Remove from wishlist</button>
                </div>
            </div>
            @endforeach
            @else
            <div class="section-about padding-tb-50">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="mb-30 aos-init aos-animate" data-aos="fade-up" data-aos-duration="2000" data-aos-delay="400">
                            <div class="cr-banner">
                                <h2>Your Wishlist is Empty</h2>
                            </div>
                            <div class="cr-banner-sub-title">
                                <p>
                <a href="{{url('/')}}" class="btn btn-primary text-center">Add Items to Wishlist</a>

                                </p>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
          @endif
        </div>
    </div>
</section>
@stop

@section('pageJsScripts')
<script src="{{asset('public/assets/js/action.js')}}"></script>
<script type="text/javascript">
    // $(window).on('load', function(){
    //     var items = localStorage.getItem('product_ids');
    //     var url = $('.demo').val();
    //     $.ajax({
    //         url: url + '/show_wishlists',
    //         type: 'POST',
    //         data : {"_token": "{{ csrf_token() }}",wishlist_id:items},
    //         success: function(dataResult){
    //             if(dataResult['data'] != ''){
    //                 $('.wishlist-data').html(dataResult['data']);
    //             }else{
    //                 $('.wishlist-data').html("<div class='col-md-12'><div class='content-box text-center'><p class='m-0'>No wishlist found.</p></div></div>");
    //             }

    //         }
    //     });
    // });

</script>
@stop
