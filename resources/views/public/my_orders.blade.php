@extends('public.layout')
@section('title', 'My Orders')
@section('content')
    <section class="section-breadcrumb">
        <div class="cr-breadcrumb-image">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="cr-breadcrumb-title">
                            <h2>My Orders</h2>
                            <span> <a href="{{ url('/') }}">Home</a> - My Orders</span>
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
                <div class="col-md-8">
                    @if (!$my_orders->isEmpty())
                        <table class="table table-bordered table-striped">
                            <thead>
                                <th>Order No</th>
                                <th>Products</th>
                                <th>Order Placed</th>
                                <th>View</th>
                            </thead>
                            <tbody class="cart-data">
                                @foreach ($my_orders as $row)
                                    <tr class="active">
                                        <td><a href="javascript:void(0)" class="show-product"
                                                data-id="{{ $row->id }}">{{ 'ODR00' . $row->id }}</a></td>
                                        <td>
                                            @php $products = array_filter(explode('|||',$row->names)); @endphp
                                            <ul>
                                                @for ($i = 0; $i < count($products); $i++)
                                                    <li class="mb-2">{{ substr($products[$i], 0, 25) . '...' }}</li>
                                                @endfor
                                            </ul>
                                        </td>
                                        <td>{{ date('d M, Y', strtotime($row->created_at)) }}</td>
                                        <td><button class="btn btn-primary show-product" data-id="{{ $row->id }}"><i
                                                    class="fa fa-eye"></i></button></td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @else
                </div>
                <div class="section-about padding-tb-50">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="mb-30 aos-init aos-animate" data-aos="fade-up" data-aos-duration="2000"
                                data-aos-delay="400">
                                <div class="cr-banner">
                                    <h2>No Orders Found</h2>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                @endif
            </div>


        </div>
    </div>
@stop
