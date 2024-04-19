@extends('public.layout')
@section('title', 'My Reviews')
@section('content')
    <section class="section-breadcrumb">
        <div class="cr-breadcrumb-image">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="cr-breadcrumb-title">
                            <h2>My Reviews</h2>
                            <span> <a href="{{ url('/') }}">Home</a> - My Reviews</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="cr-checkout-section padding-tb-100">
        <div class="container">
            <div class="row">
                <!-- Sidebar Area Start -->
                <div class=" col-lg-6 col-md-12">
                    <!-- checkout content Start -->
                    <div class="cr-checkout-content">
                        <div class="cr-checkout-inner">
                            @foreach ($reviews as $row)
                                <div class="cr-checkout-wrap mb-30">
                                    <div class="cr-checkout-block cr-check-new">
                                        <h3 class="cr-checkout-title">{{ $row->product_name }}</h3>
                                        <div class="cr-check-block-content">
                                            <div class="cr-check-subtitle">{{ $row->title }}</div>

                                            <div class="cr-new-desc">{{ $row->desc }}
                                            </div>
                                            <ul class="show-review-rating mb-2">
                                                @for ($i = 1; $i <= 5; $i++)
                                                    @if ($i <= $row->rating)
                                                        <i class="ri-star-fill"></i>
                                                    @else
                                                        <i class="ri-star-fill"></i>
                                                    @endif
                                                @endfor
                                            </ul>
                                            @if ($row->hide_by_admin == '1')
                                                <div class="alert alert-danger p-2 py-0 m-0 d-inline-block">Hidden by Admin
                                                </div>
                                            @endif
                                            @if ($row->approved == '0')
                                                <div class="alert alert-danger p-2 py-0 m-0 d-inline-block">Under Approval
                                                    Process</div>
                                            @endif

                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <!--cart content End -->
                </div>
            </div>
        </div>
    </section>
@stop
