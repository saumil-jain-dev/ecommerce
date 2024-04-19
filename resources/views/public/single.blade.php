@extends('public.layout')
@section('title',$page->page_title)
@section('content')
<section class="section-breadcrumb">
    <div class="cr-breadcrumb-image">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="cr-breadcrumb-title">
                        <h2>{{$page->page_title}}</h2>
                        <span> <a href="index.html">Home</a> - {{$page->page_title}}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="section-about padding-tb-100">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="cr-about aos-init aos-animate" data-aos="fade-up" data-aos-duration="2000" data-aos-delay="400">
                    <h4 class="heading">About The Carrot</h4>
                    <div class="cr-about-content">
                        <p> {!!htmlspecialchars_decode($page->description)!!}</p>
                        <div class="elementor-counter">
                            <div class="row">
                                <div class="col-sm-4 col-12 margin-575">
                                    <h4 class="elementor">
                                        <span class="elementor-counter-number">1.2</span>
                                        <span class="elementor-suffix">k</span>
                                    </h4>
                                    <div class="elementor-counter-title">
                                        <span>Vendors</span>
                                    </div>
                                </div>
                                <div class="col-sm-4 col-12 margin-575">
                                    <h4 class="elementor">
                                        <span class="elementor-counter-number">410</span>
                                        <span class="elementor-suffix">k</span>
                                    </h4>
                                    <div class="elementor-counter-title">
                                        <span>Customers</span>
                                    </div>
                                </div>
                                <div class="col-sm-4 col-12 margin-575">
                                    <h4 class="elementor">
                                        <span class="elementor-counter-number">34</span>
                                        <span class="elementor-suffix">k</span>
                                    </h4>
                                    <div class="elementor-counter-title">
                                        <span>Products</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="cr-about-image aos-init aos-animate" data-aos="fade-up" data-aos-duration="2000" data-aos-delay="800">
                    <img src="assets/img/about/1.jpg" alt="side-view">
                </div>
            </div>
        </div>
    </div>
</section>
<section class="section-services padding-b-100">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="cr-services-border aos-init aos-animate" data-aos="fade-up" data-aos-duration="2000">
                    <div class="cr-service-slider swiper-container swiper-container-initialized swiper-container-horizontal">
                        <div class="swiper-wrapper" id="swiper-wrapper-db68abbc279c6662" aria-live="polite" style="transition: all 0ms ease 0s; transform: translate3d(-960px, 0px, 0px);"><div class="swiper-slide swiper-slide-duplicate swiper-slide-duplicate-next" role="group" aria-label="6 / 12" style="width: 296px; margin-right: 24px;" data-swiper-slide-index="1">
                                <div class="cr-services">
                                    <div class="cr-services-image">
                                        <i class="ri-customer-service-2-line"></i>
                                    </div>
                                    <div class="cr-services-contain">
                                        <h4>24X7 Support</h4>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing.</p>
                                    </div>
                                </div>
                            </div><div class="swiper-slide swiper-slide-duplicate" role="group" aria-label="7 / 12" style="width: 296px; margin-right: 24px;" data-swiper-slide-index="2">
                                <div class="cr-services">
                                    <div class="cr-services-image">
                                        <i class="ri-truck-line"></i>
                                    </div>
                                    <div class="cr-services-contain">
                                        <h4>Delivery in 5 Days</h4>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing.</p>
                                    </div>
                                </div>
                            </div><div class="swiper-slide swiper-slide-duplicate swiper-slide-prev" role="group" aria-label="8 / 12" style="width: 296px; margin-right: 24px;" data-swiper-slide-index="3">
                                <div class="cr-services">
                                    <div class="cr-services-image">
                                        <i class="ri-money-dollar-box-line"></i>
                                    </div>
                                    <div class="cr-services-contain">
                                        <h4>Payment Secure</h4>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide swiper-slide-active" role="group" aria-label="5 / 12" style="width: 296px; margin-right: 24px;" data-swiper-slide-index="0">
                                <div class="cr-services">
                                    <div class="cr-services-image">
                                        <i class="ri-red-packet-line"></i>
                                    </div>
                                    <div class="cr-services-contain">
                                        <h4>Product Packing</h4>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide swiper-slide-next" role="group" aria-label="6 / 12" style="width: 296px; margin-right: 24px;" data-swiper-slide-index="1">
                                <div class="cr-services">
                                    <div class="cr-services-image">
                                        <i class="ri-customer-service-2-line"></i>
                                    </div>
                                    <div class="cr-services-contain">
                                        <h4>24X7 Support</h4>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide" role="group" aria-label="7 / 12" style="width: 296px; margin-right: 24px;" data-swiper-slide-index="2">
                                <div class="cr-services">
                                    <div class="cr-services-image">
                                        <i class="ri-truck-line"></i>
                                    </div>
                                    <div class="cr-services-contain">
                                        <h4>Delivery in 5 Days</h4>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide swiper-slide-duplicate-prev" role="group" aria-label="8 / 12" style="width: 296px; margin-right: 24px;" data-swiper-slide-index="3">
                                <div class="cr-services">
                                    <div class="cr-services-image">
                                        <i class="ri-money-dollar-box-line"></i>
                                    </div>
                                    <div class="cr-services-contain">
                                        <h4>Payment Secure</h4>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing.</p>
                                    </div>
                                </div>
                            </div>
                        <div class="swiper-slide swiper-slide-duplicate swiper-slide-duplicate-active" role="group" aria-label="5 / 12" style="width: 296px; margin-right: 24px;" data-swiper-slide-index="0">
                                <div class="cr-services">
                                    <div class="cr-services-image">
                                        <i class="ri-red-packet-line"></i>
                                    </div>
                                    <div class="cr-services-contain">
                                        <h4>Product Packing</h4>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing.</p>
                                    </div>
                                </div>
                            </div><div class="swiper-slide swiper-slide-duplicate swiper-slide-duplicate-next" role="group" aria-label="6 / 12" style="width: 296px; margin-right: 24px;" data-swiper-slide-index="1">
                                <div class="cr-services">
                                    <div class="cr-services-image">
                                        <i class="ri-customer-service-2-line"></i>
                                    </div>
                                    <div class="cr-services-contain">
                                        <h4>24X7 Support</h4>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing.</p>
                                    </div>
                                </div>
                            </div><div class="swiper-slide swiper-slide-duplicate" role="group" aria-label="7 / 12" style="width: 296px; margin-right: 24px;" data-swiper-slide-index="2">
                                <div class="cr-services">
                                    <div class="cr-services-image">
                                        <i class="ri-truck-line"></i>
                                    </div>
                                    <div class="cr-services-contain">
                                        <h4>Delivery in 5 Days</h4>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing.</p>
                                    </div>
                                </div>
                            </div></div>
                    <span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span></div>
                </div>
            </div>
        </div>
    </div>
</section>
@stop
