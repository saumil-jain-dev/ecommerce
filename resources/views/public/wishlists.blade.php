@extends('public.layout')
@section('title','My Wishlist')
@section('content')
<main class="main">
    <div class="page-header breadcrumb-wrap">
        <div class="container">
            <div class="breadcrumb">
                <a href='{{ url("/") }}' rel='nofollow'><i class="fi-rs-home mr-5"></i>Home</a>
                <span></span> Shop <span></span> WishList
            </div>
        </div>
    </div>
    <div class="container mb-30 mt-50">
        <div class="row">
            <div class="col-xl-10 col-lg-12 m-auto">
                <div class="mb-50">
                    <h1 class="heading-2 mb-10">Your Wishlist</h1>
                    @if($products->isNotEmpty())
                    <h6 class="text-body">There are <span class="text-brand">@if($products->isNotEmpty()) {{ count($products) }} @else 0 @endif</span> products in this list</h6>
                    @endif
                </div>
                <div class="table-responsive shopping-summery">
                    @if($products->isNotEmpty())
                    <table class="table table-wishlist">
                        <thead>
                            <tr class="main-heading">
                                <th scope="col" colspan="2">Product</th>
                                <th scope="col">Price</th>
                                <th scope="col">Action</th>
                                <th scope="col" class="end">Remove</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($products as $item)
                            <tr class="pt-30">
                                <td class="image product-thumbnail pt-40"><img src="{{asset('public/products/'.$item->thumbnail_img)}}" alt="#" /></td>
                                <td class="product-des product-name">
                                    <h6><a class='product-name mb-10' href="{{url('/product/'.$item->slug)}}">{{$item->product_name}}</a></h6>
                                </td>
                                <td class="price" data-title="Price">
                                    <h3 class="text-brand">{{site_settings()->currency}}{{get_product_price($item->id)->new_price}}</h3>
                                </td>
                                <td class="text-right" data-title="Cart">
                                    
                                    <button type="submit" class="button button-add-to-cart custom-add-to-cart" id="addcart" data-user="{{session()->get('user_id')}}" data-id="{{$item->id}}"><i class="fi-rs-shopping-cart"></i>Add to cart</button>
                                </td>
                                <td class="action text-center" data-title="Remove">
                                    <a href="javascript:void(0)" class="text-body remove-wishlist" data-id="{{$item->id}}"><i class="fi-rs-trash"></i></a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    @else
                    <div class="col-md-12 text-center">
                        <h4>Your Wishlist is Empty</h4>
                        <a href="{{url('/')}}" class="btn btn-primary">Add Items to Wishlist</a>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</main>
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
