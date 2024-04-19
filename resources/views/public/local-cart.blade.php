@extends('public.layout')
@section('title','My Cart')
@section('content')
<section class="section-breadcrumb">
    <div class="cr-breadcrumb-image">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="cr-breadcrumb-title">
                        <h2>My Cart</h2>
                        <span> <a href="{{url('/')}}">Home</a> - My Cart</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<div id="site-content">
    <div class="message"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <form action="{{url('/checkout')}}">
                @csrf
                <div class="cart-data position-relative">
                    <div class="loader-container">
                        <div class="loader">
                            <span class="loader-inner box-1"></span>
                            <span class="loader-inner box-2"></span>
                            <span class="loader-inner box-3"></span>
                            <span class="loader-inner box-4"></span>
                        </div>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>
@stop

@section('pageJsScripts')
<script>
    $(window).on('load', function(){
        function net_amount(){
            var amount = 0;
            $('.product-total').each(function(){
                var val = $(this).html();
                var total = parseInt(amount) + parseInt(val);
                amount = total;
            });
            $('.total-amount').html(amount);
        }
        if(localStorage.getItem('product_id') != null){
            var product_id = localStorage.getItem('product_id').split(',');
            var colors = JSON.parse(localStorage.getItem('color_ids'));
            var values = JSON.parse(localStorage.getItem('attr'));
            var url = $('.demo').val();
            $.ajax({
                url: url + '/show_cart',
                type: 'POST',
                data : {"_token": "{{ csrf_token() }}",product_id:product_id,color_id:colors,attrvalues:values},
                success: function(dataResult){
                    console.log(dataResult);
                    $('.cart-data').html(dataResult);
                    net_amount();
                }
            });
        }else{
            var data = `<div class="content-box text-center">
                        <p class="">No Cart Found</p>
                        <a href="{{url('/')}}" class="btn btn-primary">Shop Now</a>
                    </div>`;
            $('.cart-data').html(data);
        }


    });
</script>

@stop
