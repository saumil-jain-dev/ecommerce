@extends('public.layout')
@section('title','Today Deals')
@section('content')
<section class="section-breadcrumb">
    <div class="cr-breadcrumb-image">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="cr-breadcrumb-title">
                        <h2>Today Deals</h2>
                        <span> <a href="{{ url('/') }}">Home</a> - Today Deals</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<div id="site-content" class="py-5">
    <div class="container">

        @foreach($today_products as $item)
            <div class="col-md-3 col-sm-6">
            @include('public.product-grid',$item)
            </div>
        @endforeach
        <div class="col-md-12">
            {{$today_products->links()}}
        </div>
        </div>
    </div>
</div>
@stop
