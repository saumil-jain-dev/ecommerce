@extends('public.layout')
@section('title', site_settings()->site_title)
@section('content')

    <!-- Hero slider -->
    <section class="section-hero padding-b-100 next">
        <div class="cr-slider swiper-container">
            <div class="swiper-wrapper">
                @foreach ($banner as $item)
                    @if ($item->status == '1')
                        <div class="swiper-slide">
                            <div class="cr-hero-banner ">
                                <img class="cr-banner-image" src="{{ asset('public/banner/' . $item->banner_img) }}"
                                    alt="Banner Image">
                                <div class="container">

                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="cr-left-side-contain slider-animation">

                                                <h5><span>100%</span> Organic Fruits</h5>
                                                <h1>Explore fresh & juicy fruits.</h1>
                                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Amet reiciendis
                                                    beatae consequuntur.</p>
                                                <div class="cr-last-buttons">
                                                    <a href="{{ url($item->pagelink) }}" class="cr-button">
                                                        shop now
                                                    </a>
                                                    <a href="" target="_blank">

                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
            <div class="swiper-pagination"></div>
        </div>
    </section>
    <!------/BANNER------>
    <section class="section-products padding-t-100">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    @if ($today_deal_products->isNotEmpty())
                        <!------ Today Deal PRODUCTS ------>

                        {{-- <div class="section-heading">
                                    <h3 class="title">Today Deals</h3>
                                    <a href="{{ url('/today-deals') }}" class="btn btn-primary btn-sm">View All</a>
                                </div> --}}
                        <div class="row">
                            @foreach ($today_deal_products as $item)
                                <div class="col-lg-4 col-md-6 col-6 cr-product-box mb-24 aos-init aos-animate"
                                    data-aos="fade-up" data-aos-duration="2000" data-aos-delay="300">
                                    @include('public.product-grid', $item)
                                </div>
                            @endforeach
                        </div>


                </div>
            </div>
        </div>
    </section>
    <section class="section-products padding-t-100">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="mb-30 aos-init aos-animate" data-aos="fade-up" data-aos-duration="2000"
                        data-aos-delay="400">
                        <div class="cr-banner">
                            <h2>Style 2</h2>
                        </div>
                        <div class="cr-banner-sub-title">
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                                incididunt
                                ut labore lacus vel facilisis. </p>
                        </div>
                    </div>
                </div>
            </div>
            @if ($today_deal_products->isNotEmpty())
                <div class="row mb-minus-24">
                    @foreach ($today_deal_products as $item)
                        <div class="col-lg-4 col-md-6 col-6 cr-product-box mb-24 aos-init aos-animate" data-aos="fade-up"
                            data-aos-duration="2000" data-aos-delay="300">
                            @include('public.product-grid', $item)

                        </div>
                    @endforeach
                </div>
            @endif
        </div>
    </section>
    <!------/Today Deal PRODUCTS------>
    @endif
    </section>
    <!------ LATEST PRODUCTS ------>
    {{-- @if ($latest_products->isNotEmpty())
        <div class="product-box">
            <div class="message"></div>
            <div class="container">
                <div class="section-heading">
                    <h3 class="title">Latest Products</h3>
                    <a href="{{ url('/search') }}" class="btn btn-primary btn-sm">View All</a>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class=" latest-carousel owl-carousel owl-theme">
                            @foreach ($latest_products as $item)
                                <div class="item">
                                    @include('public.product-grid', $item)
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif --}}
    <!------/LATEST PRODUCTS------>
    {{-- @if ($flash_deals->isNotEmpty())
        <!------ BANNER GROUP ------>
        <div class="banner-group flash-deals">
            <div class="container">
                <div class="section-heading">
                    <h3 class="title">Flash Deals</h3>
                    <a href="{{ url('/flash-deals') }}" class="btn btn-primary btn-sm">View All</a>
                </div>
                <div class="row">
                    @foreach ($flash_deals as $flash)
                        @php
                            $datetime = explode('-', $flash->flash_date_range);
                            $currentDatetime = date('Y-m-d H:i A');
                            if ($flash->flash_date_range != '') {
                                $startDatetime = date('Y-m-d H:i A', strtotime("$datetime[0]"));
                                $endDatetime = date('Y-m-d H:i A', strtotime("$datetime[1]"));
                            } else {
                                $startDatetime = '';
                                $endDatetime = '';
                            }
                        @endphp
                        @if ($flash->status == '1')
                            @if ($currentDatetime >= $startDatetime && $currentDatetime <= $endDatetime)
                                <div class="col-md-4 flash-deal-box">
                                    <div class="banner-inner">
                                        <a href="{{ url('/flash-products/' . $flash->flash_slug) }}">
                                            <img src="{{ asset('public/flash-deals/' . $flash->flash_image) }}"
                                                alt="">
                                        </a>
                                    </div>
                                </div>
                            @endif
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
    @endif --}}
    <!------/BANNER GROUP------>

    <!------ FLASH SALE PRODUCTS ------>
    {{-- @if ($flash_products->isNotEmpty())
        <div class="product-box flash-products">
            <div class="message"></div>
            <div class="container">
                <div class="section-heading">
                    <h3 class="title">Flash Sale</h3>
                    <a href="{{ url('/flash-products') }}" class="btn btn-primary btn-sm">View All</a>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="flash-carousel owl-carousel owl-theme position-relative">
                            @foreach ($flash_products as $item)
                                @php
                                    date_default_timezone_set('Asia/Kolkata');
                                    $datetimes = explode('-', $item->flash_date_range);
                                    $currentDatetimes = date('Y-m-d H:i A');
                                    if ($item->flash_date_range != '') {
                                        $startDatetimes = date('Y-m-d H:i A', strtotime("$datetimes[0]"));
                                        $endDatetimes = date('Y-m-d H:i A', strtotime("$datetimes[1]"));
                                    } else {
                                        $startDatetimes = '';
                                        $endDatetimes = '';
                                    }
                                @endphp
                                @if ($currentDatetimes >= $startDatetimes && $currentDatetimes <= $endDatetimes)
                                    <div class="item flash-product">
                                        @include('public.product-grid', $item)
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif --}}
    <!------/FLASH SALE PRODUCTS------>
@stop

@section('pageJsScripts')
    {{-- <script src="{{ asset('public/assets/js/owl.carousel.js') }}"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            if ($('.flash-deal-box').length < 1) {
                $('.banner-group.flash-deals').hide();
            }
            if ($('.flash-product').length < 1) {
                $('.flash-products').hide();
            }


            var owl = $('.latest-carousel');
            owl.owlCarousel({
                margin: 30,
                loop: true,
                nav: true,
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

            $('.flash-carousel').owlCarousel({
                margin: 30,
                nav: true,
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
            $('.today-carousel').owlCarousel({
                margin: 30,
                loop: false,
                nav: true,
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
        }); --}}
    </script>

@stop
