@extends('public.layout')
@section('title', 'Search')
@section('content')
    <section class="section-breadcrumb">
        <div class="cr-breadcrumb-image">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="cr-breadcrumb-title">
                            <h2>All Products</h2>
                            <span> <a href="index.html">Home</a> - All Products</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="section-shop padding-tb-100">
        <div class="container">
            <div class="row d-none">
                <div class="col-lg-12">
                    <div class="mb-30 aos-init aos-animate" data-aos="fade-up" data-aos-duration="2000"
                        data-aos-delay="400">
                        <div class="cr-banner">
                            <h2>Categories</h2>
                        </div>
                        <div class="cr-banner-sub-title">
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt
                                ut labore lacus vel facilisis. </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">

                <div class="col-lg-3 col-12 md-30 aos-init aos-animate" data-aos="fade-up" data-aos-duration="2000"
                    data-aos-delay="400">
                    <form action="{{ url(Request::url()) }}">
                        @if (request()->get('keyword') && request()->get('keyword') != '')
                            <input type="text" hidden name="keyword" value="{{ request()->get('keyword') }}">
                        @endif
                        <div class="cr-shop-sideview">
                            <div class="cr-shop-categories">
                                <h4 class="cr-shop-sub-title">Category</h4>
                                @if ($cat_detail)
                                    <li class="category_name">
                                        <a href="{{ url('c/' . $cat_array->category_slug) }}">
                                            @if ($cat_detail->id == $cat_array->id)
                                                <i class="fas fa-angle-right"></i>
                                            @endif
                                            {{ $cat_array->category_name }}
                                        </a>
                                    </li>
                                    @if ($cat_array->sub_category)
                                        @include('public.partials.child-category', [
                                            'category' => $cat_array->sub_category,
                                            'cat_detail' => $cat_detail,
                                        ])
                                    @endif
                                @else
                                @endif
                                <div class="cr-checkbox">
                                    {{-- @foreach ($cat_array as $row)
                                        <div class="checkbox-group">
                                            <input type="checkbox" id="drinks">
                                            <a for="drinks" href="{{ url('c/' . $row->category_slug) }}">
                                                {{ $row->category_name }}
                                            </a>

                                        </div>
                                    @endforeach --}}

                                </div>
                            </div>
                            <div class="cr-shop-price">
                                <h4 class="cr-shop-sub-title">Price</h4>
                                <div class="price-range-slider">
                                    <div id="slider-range"
                                        class="range-bar ui-slider ui-corner-all ui-slider-horizontal ui-widget ui-widget-content">
                                        <div class="ui-slider-range ui-corner-all ui-widget-header"
                                            style="left: 0%; width: 82.1429%;">
                                        </div>
                                        <span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default"
                                            style="left: 0%;"></span>
                                        <span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default"
                                            style="left: 82.1429%;"></span>
                                    </div>
                                    <p class="range-value">
                                        <label>Price :</label>
                                        <input type="text" id="amount" placeholder="'" readonly="">
                                    </p>
                                    <button type="button" class="cr-button">Filter</button>
                                </div>
                            </div>
                            <div class="cr-shop-color">
                                <h4 class="cr-shop-sub-title">Colors</h4>
                                <div class="cr-checkbox">
                                    <div class="checkbox-group">
                                        <input type="checkbox" id="blue">
                                        <label for="blue">Blue</label>
                                        <span class="blue"></span>
                                    </div>
                                    <div class="checkbox-group">
                                        <input type="checkbox" id="yellow">
                                        <label for="yellow">Yellow</label>
                                        <span class="yellow"></span>
                                    </div>
                                    <div class="checkbox-group">
                                        <input type="checkbox" id="red">
                                        <label for="red">Red</label>
                                        <span class="red"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="cr-shop-weight">
                                <h4 class="cr-shop-sub-title">Weight</h4>
                                <div class="cr-checkbox">
                                    <div class="checkbox-group">
                                        <input type="checkbox" id="2kg">
                                        <label for="2kg">2kg Pack</label>
                                    </div>
                                    <div class="checkbox-group">
                                        <input type="checkbox" id="20kg">
                                        <label for="20kg">20kg Pack</label>
                                    </div>
                                    <div class="checkbox-group">
                                        <input type="checkbox" id="30kg">
                                        <label for="30kg">30kg pack</label>
                                    </div>
                                </div>
                            </div>
                            <div class="cr-shop-tags">
                                <h4 class="cr-shop-sub-title">Tages</h4>
                                <div class="cr-shop-tags-inner">
                                    <ul class="cr-tags">
                                        <li><a href="javascript:void(0)">Vegetables</a></li>
                                        <li><a href="javascript:void(0)">juice</a></li>
                                        <li><a href="javascript:void(0)">Food</a></li>
                                        <li><a href="javascript:void(0)">Dry Fruits</a></li>
                                        <li><a href="javascript:void(0)">Vegetables</a></li>
                                        <li><a href="javascript:void(0)">juice</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-lg-9 col-12 md-30 aos-init aos-animate" data-aos="fade-up" data-aos-duration="2000"
                    data-aos-delay="600">
                    <div class="row">
                        <div class="col-12">
                            <div class="cr-shop-bredekamp">
                                <div class="cr-toggle">
                                    <a href="javascript:void(0)" class="gridCol active-grid">
                                        <i class="ri-grid-line"></i>
                                    </a>
                                    <a href="javascript:void(0)" class="gridRow">
                                        <i class="ri-list-check-2"></i>
                                    </a>
                                </div>
                                <div class="center-content">
                                    <span>We found 29 items for you!</span>
                                </div>
                                <div class="cr-select">
                                    <label>Sort By :</label>
                                    <select class="form-select" aria-label="Default select example">
                                        <option selected="">Featured</option>
                                        <option value="1">One</option>
                                        <option value="2">Two</option>
                                        <option value="3">Three</option>
                                        <option value="4">Four</option>
                                        <option value="5">Five</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row col-100 mb-minus-24">
                        <div class="col-xxl-3 col-xl-4 col-6 cr-product-box mb-24">
                            <div class="cr-product-card">
                                <div class="cr-product-image">
                                    <div class="cr-image-inner zoom-image-hover"
                                        style="position: relative; overflow: hidden;">
                                        <img src="assets/img/product/1.jpg" alt="product-1">
                                        <img role="presentation" alt=""
                                            src="file:///C:/Users/yaksh/Desktop/new%20log/carrot-html/assets/img/product/1.jpg"
                                            class="zoomImg"
                                            style="position: absolute; top: -25.6011px; left: -346.631px; opacity: 0; width: 600px; height: 600px; border: none; max-width: none; max-height: none;">
                                    </div>
                                    <div class="cr-side-view">
                                        <a href="javascript:void(0)" class="wishlist">
                                            <i class="ri-heart-line"></i>
                                        </a>
                                        <a class="model-oraganic-product" data-bs-toggle="modal" href="#quickview"
                                            role="button">
                                            <i class="ri-eye-line"></i>
                                        </a>
                                    </div>
                                    <a class="cr-shopping-bag" href="javascript:void(0)">
                                        <i class="ri-shopping-bag-line"></i>
                                    </a>
                                </div>
                                <div class="cr-product-details">
                                    <div class="cr-brand">
                                        <a href="shop-left-sidebar.html">Vegetables</a>
                                        <div class="cr-star">
                                            <i class="ri-star-fill"></i>
                                            <i class="ri-star-fill"></i>
                                            <i class="ri-star-fill"></i>
                                            <i class="ri-star-fill"></i>
                                            <i class="ri-star-line"></i>
                                            <p>(4.5)</p>
                                        </div>
                                    </div>
                                    <a href="product-left-sidebar.html" class="title">Fresh organic villa farm lomon
                                        500gm pack</a>
                                    <p class="text">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
                                        eiusmod tempor incididunt
                                        ut labore lacus vel facilisis.</p>
                                    <ul class="list">
                                        <li><label>Brand :</label>ESTA BETTERU CO</li>
                                        <li><label>Diet Type :</label>Vegetarian</li>
                                        <li><label>Speciality :</label>Gluten Free, Sugar Free</li>
                                    </ul>
                                    <p class="cr-price"><span class="new-price">$120.25</span> <span
                                            class="old-price">$123.25</span></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-xxl-3 col-xl-4 col-6 cr-product-box mb-24">
                            <div class="cr-product-card">
                                <div class="cr-product-image">
                                    <div class="cr-image-inner zoom-image-hover"
                                        style="position: relative; overflow: hidden;">
                                        <img src="assets/img/product/9.jpg" alt="product-1">
                                        <img role="presentation" alt=""
                                            src="file:///C:/Users/yaksh/Desktop/new%20log/carrot-html/assets/img/product/9.jpg"
                                            class="zoomImg"
                                            style="position: absolute; top: -27.6329px; left: -18.4896px; opacity: 0; width: 600px; height: 600px; border: none; max-width: none; max-height: none;">
                                    </div>
                                    <div class="cr-side-view">
                                        <a href="javascript:void(0)" class="wishlist">
                                            <i class="ri-heart-line"></i>
                                        </a>
                                        <a class="model-oraganic-product" data-bs-toggle="modal" href="#quickview"
                                            role="button">
                                            <i class="ri-eye-line"></i>
                                        </a>
                                    </div>
                                    <a class="cr-shopping-bag" href="javascript:void(0)">
                                        <i class="ri-shopping-bag-line"></i>
                                    </a>
                                </div>
                                <div class="cr-product-details">
                                    <div class="cr-brand">
                                        <a href="shop-left-sidebar.html">Snacks</a>
                                        <div class="cr-star">
                                            <i class="ri-star-fill"></i>
                                            <i class="ri-star-fill"></i>
                                            <i class="ri-star-fill"></i>
                                            <i class="ri-star-fill"></i>
                                            <i class="ri-star-fill"></i>
                                            <p>(5.0)</p>
                                        </div>
                                    </div>
                                    <a href="product-left-sidebar.html" class="title">Best snakes with hazel nut pack
                                        200gm</a>
                                    <p class="text">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
                                        eiusmod tempor incididunt
                                        ut labore lacus vel facilisis.</p>
                                    <ul class="list">
                                        <li><label>Brand :</label>ESTA BETTERU CO</li>
                                        <li><label>Diet Type :</label>Vegetarian</li>
                                        <li><label>Speciality :</label>Gluten Free, Sugar Free</li>
                                    </ul>
                                    <p class="cr-price"><span class="new-price">$145</span> <span
                                            class="old-price">$150</span></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-xxl-3 col-xl-4 col-6 cr-product-box mb-24">
                            <div class="cr-product-card">
                                <div class="cr-product-image">
                                    <div class="cr-image-inner zoom-image-hover"
                                        style="position: relative; overflow: hidden;">
                                        <img src="assets/img/product/2.jpg" alt="product-1">
                                        <img role="presentation" alt=""
                                            src="file:///C:/Users/yaksh/Desktop/new%20log/carrot-html/assets/img/product/2.jpg"
                                            class="zoomImg"
                                            style="position: absolute; top: 0px; left: 0px; opacity: 0; width: 600px; height: 600px; border: none; max-width: none; max-height: none;">
                                    </div>
                                    <div class="cr-side-view">
                                        <a href="javascript:void(0)" class="wishlist">
                                            <i class="ri-heart-line"></i>
                                        </a>
                                        <a class="model-oraganic-product" data-bs-toggle="modal" href="#quickview"
                                            role="button">
                                            <i class="ri-eye-line"></i>
                                        </a>
                                    </div>
                                    <a class="cr-shopping-bag" href="javascript:void(0)">
                                        <i class="ri-shopping-bag-line"></i>
                                    </a>
                                </div>
                                <div class="cr-product-details">
                                    <div class="cr-brand">
                                        <a href="shop-left-sidebar.html">Fruits</a>
                                        <div class="cr-star">
                                            <i class="ri-star-fill"></i>
                                            <i class="ri-star-fill"></i>
                                            <i class="ri-star-fill"></i>
                                            <i class="ri-star-fill"></i>
                                            <i class="ri-star-line"></i>
                                            <p>(4.5)</p>
                                        </div>
                                    </div>
                                    <a href="product-left-sidebar.html" class="title">Fresh organic apple 1kg simla
                                        marming</a>
                                    <p class="text">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
                                        eiusmod tempor incididunt
                                        ut labore lacus vel facilisis.</p>
                                    <ul class="list">
                                        <li><label>Brand :</label>ESTA BETTERU CO</li>
                                        <li><label>Diet Type :</label>Vegetarian</li>
                                        <li><label>Speciality :</label>Gluten Free, Sugar Free</li>
                                    </ul>
                                    <p class="cr-price"><span class="new-price">$120.25</span> <span
                                            class="old-price">$123.25</span></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-xxl-3 col-xl-4 col-6 cr-product-box mb-24">
                            <div class="cr-product-card">
                                <div class="cr-product-image">
                                    <div class="cr-image-inner zoom-image-hover"
                                        style="position: relative; overflow: hidden;">
                                        <img src="assets/img/product/3.jpg" alt="product-1">
                                        <img role="presentation" alt=""
                                            src="file:///C:/Users/yaksh/Desktop/new%20log/carrot-html/assets/img/product/3.jpg"
                                            class="zoomImg"
                                            style="position: absolute; top: 0px; left: 0px; opacity: 0; width: 600px; height: 600px; border: none; max-width: none; max-height: none;">
                                    </div>
                                    <div class="cr-side-view">
                                        <a href="javascript:void(0)" class="wishlist">
                                            <i class="ri-heart-line"></i>
                                        </a>
                                        <a class="model-oraganic-product" data-bs-toggle="modal" href="#quickview"
                                            role="button">
                                            <i class="ri-eye-line"></i>
                                        </a>
                                    </div>
                                    <a class="cr-shopping-bag" href="javascript:void(0)">
                                        <i class="ri-shopping-bag-line"></i>
                                    </a>
                                </div>
                                <div class="cr-product-details">
                                    <div class="cr-brand">
                                        <a href="shop-left-sidebar.html">Fruits</a>
                                        <div class="cr-star">
                                            <i class="ri-star-fill"></i>
                                            <i class="ri-star-fill"></i>
                                            <i class="ri-star-fill"></i>
                                            <i class="ri-star-line"></i>
                                            <i class="ri-star-line"></i>
                                            <p>(3.2)</p>
                                        </div>
                                    </div>
                                    <a href="product-left-sidebar.html" class="title">Organic fresh venila farm
                                        watermelon 5kg</a>
                                    <p class="text">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
                                        eiusmod tempor incididunt
                                        ut labore lacus vel facilisis.</p>
                                    <ul class="list">
                                        <li><label>Brand :</label>ESTA BETTERU CO</li>
                                        <li><label>Diet Type :</label>Vegetarian</li>
                                        <li><label>Speciality :</label>Gluten Free, Sugar Free</li>
                                    </ul>
                                    <p class="cr-price"><span class="new-price">$50.30</span> <span
                                            class="old-price">$72.60</span></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-xxl-3 col-xl-4 col-6 cr-product-box mb-24">
                            <div class="cr-product-card">
                                <div class="cr-product-image">
                                    <div class="cr-image-inner zoom-image-hover"
                                        style="position: relative; overflow: hidden;">
                                        <img src="assets/img/product/10.jpg" alt="product-1">
                                        <img role="presentation" alt=""
                                            src="file:///C:/Users/yaksh/Desktop/new%20log/carrot-html/assets/img/product/10.jpg"
                                            class="zoomImg"
                                            style="position: absolute; top: -378.124px; left: -100.779px; opacity: 0; width: 600px; height: 600px; border: none; max-width: none; max-height: none;">
                                    </div>
                                    <div class="cr-side-view">
                                        <a href="javascript:void(0)" class="wishlist">
                                            <i class="ri-heart-line"></i>
                                        </a>
                                        <a class="model-oraganic-product" data-bs-toggle="modal" href="#quickview"
                                            role="button">
                                            <i class="ri-eye-line"></i>
                                        </a>
                                    </div>
                                    <a class="cr-shopping-bag" href="javascript:void(0)">
                                        <i class="ri-shopping-bag-line"></i>
                                    </a>
                                </div>
                                <div class="cr-product-details">
                                    <div class="cr-brand">
                                        <a href="shop-left-sidebar.html">Snacks</a>
                                        <div class="cr-star">
                                            <i class="ri-star-fill"></i>
                                            <i class="ri-star-fill"></i>
                                            <i class="ri-star-fill"></i>
                                            <i class="ri-star-fill"></i>
                                            <i class="ri-star-fill"></i>
                                            <p>(5.0)</p>
                                        </div>
                                    </div>
                                    <a href="product-left-sidebar.html" class="title">Sweet crunchy nut mix 250gm
                                        pack</a>
                                    <p class="text">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
                                        eiusmod tempor incididunt
                                        ut labore lacus vel facilisis.</p>
                                    <ul class="list">
                                        <li><label>Brand :</label>ESTA BETTERU CO</li>
                                        <li><label>Diet Type :</label>Vegetarian</li>
                                        <li><label>Speciality :</label>Gluten Free, Sugar Free</li>
                                    </ul>
                                    <p class="cr-price"><span class="new-price">$120.25</span> <span
                                            class="old-price">$123.25</span></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-xxl-3 col-xl-4 col-6 cr-product-box mb-24">
                            <div class="cr-product-card">
                                <div class="cr-product-image">
                                    <div class="cr-image-inner zoom-image-hover"
                                        style="position: relative; overflow: hidden;">
                                        <img src="assets/img/product/17.jpg" alt="product-1">
                                        <img role="presentation" alt=""
                                            src="file:///C:/Users/yaksh/Desktop/new%20log/carrot-html/assets/img/product/17.jpg"
                                            class="zoomImg"
                                            style="position: absolute; top: 0px; left: 0px; opacity: 0; width: 600px; height: 600px; border: none; max-width: none; max-height: none;">
                                    </div>
                                    <div class="cr-side-view">
                                        <a href="javascript:void(0)" class="wishlist">
                                            <i class="ri-heart-line"></i>
                                        </a>
                                        <a class="model-oraganic-product" data-bs-toggle="modal" href="#quickview"
                                            role="button">
                                            <i class="ri-eye-line"></i>
                                        </a>
                                    </div>
                                    <a class="cr-shopping-bag" href="javascript:void(0)">
                                        <i class="ri-shopping-bag-line"></i>
                                    </a>
                                </div>
                                <div class="cr-product-details">
                                    <div class="cr-brand">
                                        <a href="shop-left-sidebar.html">Bakery</a>
                                        <div class="cr-star">
                                            <i class="ri-star-fill"></i>
                                            <i class="ri-star-fill"></i>
                                            <i class="ri-star-fill"></i>
                                            <i class="ri-star-fill"></i>
                                            <i class="ri-star-fill"></i>
                                            <p>(5.0)</p>
                                        </div>
                                    </div>
                                    <a href="product-left-sidebar.html" class="title">Delicious white baked fresh bread
                                        and toast</a>
                                    <p class="text">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
                                        eiusmod tempor incididunt
                                        ut labore lacus vel facilisis.</p>
                                    <ul class="list">
                                        <li><label>Brand :</label>ESTA BETTERU CO</li>
                                        <li><label>Diet Type :</label>Vegetarian</li>
                                        <li><label>Speciality :</label>Gluten Free, Sugar Free</li>
                                    </ul>
                                    <p class="cr-price"><span class="new-price">$20</span> <span
                                            class="old-price">$22.10</span></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-xxl-3 col-xl-4 col-6 cr-product-box mb-24">
                            <div class="cr-product-card">
                                <div class="cr-product-image">
                                    <div class="cr-image-inner zoom-image-hover"
                                        style="position: relative; overflow: hidden;">
                                        <img src="assets/img/product/13.jpg" alt="product-1">
                                        <img role="presentation" alt=""
                                            src="file:///C:/Users/yaksh/Desktop/new%20log/carrot-html/assets/img/product/13.jpg"
                                            class="zoomImg"
                                            style="position: absolute; top: 0px; left: 0px; opacity: 0; width: 600px; height: 600px; border: none; max-width: none; max-height: none;">
                                    </div>
                                    <div class="cr-side-view">
                                        <a href="javascript:void(0)" class="wishlist">
                                            <i class="ri-heart-line"></i>
                                        </a>
                                        <a class="model-oraganic-product" data-bs-toggle="modal" href="#quickview"
                                            role="button">
                                            <i class="ri-eye-line"></i>
                                        </a>
                                    </div>
                                    <a class="cr-shopping-bag" href="javascript:void(0)">
                                        <i class="ri-shopping-bag-line"></i>
                                    </a>
                                </div>
                                <div class="cr-product-details">
                                    <div class="cr-brand">
                                        <a href="shop-left-sidebar.html">Bakery</a>
                                        <div class="cr-star">
                                            <i class="ri-star-fill"></i>
                                            <i class="ri-star-fill"></i>
                                            <i class="ri-star-fill"></i>
                                            <i class="ri-star-fill"></i>
                                            <i class="ri-star-fill"></i>
                                            <p>(5.0)</p>
                                        </div>
                                    </div>
                                    <a href="product-left-sidebar.html" class="title">Delicious white baked fresh bread
                                        and toast</a>
                                    <p class="text">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
                                        eiusmod tempor incididunt
                                        ut labore lacus vel facilisis.</p>
                                    <ul class="list">
                                        <li><label>Brand :</label>ESTA BETTERU CO</li>
                                        <li><label>Diet Type :</label>Vegetarian</li>
                                        <li><label>Speciality :</label>Gluten Free, Sugar Free</li>
                                    </ul>
                                    <p class="cr-price"><span class="new-price">$20</span> <span
                                            class="old-price">$22.10</span></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-xxl-3 col-xl-4 col-6 cr-product-box mb-24">
                            <div class="cr-product-card">
                                <div class="cr-product-image">
                                    <div class="cr-image-inner zoom-image-hover"
                                        style="position: relative; overflow: hidden;">
                                        <img src="assets/img/product/11.jpg" alt="product-1">
                                        <img role="presentation" alt=""
                                            src="file:///C:/Users/yaksh/Desktop/new%20log/carrot-html/assets/img/product/11.jpg"
                                            class="zoomImg"
                                            style="position: absolute; top: 0px; left: 0px; opacity: 0; width: 600px; height: 600px; border: none; max-width: none; max-height: none;">
                                    </div>
                                    <div class="cr-side-view">
                                        <a href="javascript:void(0)" class="wishlist">
                                            <i class="ri-heart-line"></i>
                                        </a>
                                        <a class="model-oraganic-product" data-bs-toggle="modal" href="#quickview"
                                            role="button">
                                            <i class="ri-eye-line"></i>
                                        </a>
                                    </div>
                                    <a class="cr-shopping-bag" href="javascript:void(0)">
                                        <i class="ri-shopping-bag-line"></i>
                                    </a>
                                </div>
                                <div class="cr-product-details">
                                    <div class="cr-brand">
                                        <a href="shop-left-sidebar.html">Bakery</a>
                                        <div class="cr-star">
                                            <i class="ri-star-fill"></i>
                                            <i class="ri-star-fill"></i>
                                            <i class="ri-star-fill"></i>
                                            <i class="ri-star-fill"></i>
                                            <i class="ri-star-fill"></i>
                                            <p>(5.0)</p>
                                        </div>
                                    </div>
                                    <a href="product-left-sidebar.html" class="title">Delicious white baked fresh bread
                                        and toast</a>
                                    <p class="text">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
                                        eiusmod tempor incididunt
                                        ut labore lacus vel facilisis.</p>
                                    <ul class="list">
                                        <li><label>Brand :</label>ESTA BETTERU CO</li>
                                        <li><label>Diet Type :</label>Vegetarian</li>
                                        <li><label>Speciality :</label>Gluten Free, Sugar Free</li>
                                    </ul>
                                    <p class="cr-price"><span class="new-price">$20</span> <span
                                            class="old-price">$22.10</span></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-xxl-3 col-xl-4 col-6 cr-product-box mb-24">
                            <div class="cr-product-card">
                                <div class="cr-product-image">
                                    <div class="cr-image-inner zoom-image-hover"
                                        style="position: relative; overflow: hidden;">
                                        <img src="assets/img/product/12.jpg" alt="product-1">
                                        <img role="presentation" alt=""
                                            src="file:///C:/Users/yaksh/Desktop/new%20log/carrot-html/assets/img/product/12.jpg"
                                            class="zoomImg"
                                            style="position: absolute; top: 0px; left: 0px; opacity: 0; width: 600px; height: 600px; border: none; max-width: none; max-height: none;">
                                    </div>
                                    <div class="cr-side-view">
                                        <a href="javascript:void(0)" class="wishlist">
                                            <i class="ri-heart-line"></i>
                                        </a>
                                        <a class="model-oraganic-product" data-bs-toggle="modal" href="#quickview"
                                            role="button">
                                            <i class="ri-eye-line"></i>
                                        </a>
                                    </div>
                                    <a class="cr-shopping-bag" href="javascript:void(0)">
                                        <i class="ri-shopping-bag-line"></i>
                                    </a>
                                </div>
                                <div class="cr-product-details">
                                    <div class="cr-brand">
                                        <a href="shop-left-sidebar.html">Bakery</a>
                                        <div class="cr-star">
                                            <i class="ri-star-fill"></i>
                                            <i class="ri-star-fill"></i>
                                            <i class="ri-star-fill"></i>
                                            <i class="ri-star-fill"></i>
                                            <i class="ri-star-fill"></i>
                                            <p>(5.0)</p>
                                        </div>
                                    </div>
                                    <a href="product-left-sidebar.html" class="title">Delicious white baked fresh bread
                                        and toast</a>
                                    <p class="text">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
                                        eiusmod tempor incididunt
                                        ut labore lacus vel facilisis.</p>
                                    <ul class="list">
                                        <li><label>Brand :</label>ESTA BETTERU CO</li>
                                        <li><label>Diet Type :</label>Vegetarian</li>
                                        <li><label>Speciality :</label>Gluten Free, Sugar Free</li>
                                    </ul>
                                    <p class="cr-price"><span class="new-price">$20</span> <span
                                            class="old-price">$22.10</span></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-xxl-3 col-xl-4 col-6 cr-product-box mb-24">
                            <div class="cr-product-card">
                                <div class="cr-product-image">
                                    <div class="cr-image-inner zoom-image-hover"
                                        style="position: relative; overflow: hidden;">
                                        <img src="assets/img/product/1.jpg" alt="product-1">
                                        <img role="presentation" alt=""
                                            src="file:///C:/Users/yaksh/Desktop/new%20log/carrot-html/assets/img/product/1.jpg"
                                            class="zoomImg"
                                            style="position: absolute; top: 0px; left: 0px; opacity: 0; width: 600px; height: 600px; border: none; max-width: none; max-height: none;">
                                    </div>
                                    <div class="cr-side-view">
                                        <a href="javascript:void(0)" class="wishlist">
                                            <i class="ri-heart-line"></i>
                                        </a>
                                        <a class="model-oraganic-product" data-bs-toggle="modal" href="#quickview"
                                            role="button">
                                            <i class="ri-eye-line"></i>
                                        </a>
                                    </div>
                                    <a class="cr-shopping-bag" href="javascript:void(0)">
                                        <i class="ri-shopping-bag-line"></i>
                                    </a>
                                </div>
                                <div class="cr-product-details">
                                    <div class="cr-brand">
                                        <a href="shop-left-sidebar.html">Vegetables</a>
                                        <div class="cr-star">
                                            <i class="ri-star-fill"></i>
                                            <i class="ri-star-fill"></i>
                                            <i class="ri-star-fill"></i>
                                            <i class="ri-star-fill"></i>
                                            <i class="ri-star-line"></i>
                                            <p>(4.5)</p>
                                        </div>
                                    </div>
                                    <a href="product-left-sidebar.html" class="title">Fresh organic villa farm lomon
                                        500gm pack</a>
                                    <p class="text">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
                                        eiusmod tempor incididunt
                                        ut labore lacus vel facilisis.</p>
                                    <ul class="list">
                                        <li><label>Brand :</label>ESTA BETTERU CO</li>
                                        <li><label>Diet Type :</label>Vegetarian</li>
                                        <li><label>Speciality :</label>Gluten Free, Sugar Free</li>
                                    </ul>
                                    <p class="cr-price"><span class="new-price">$120.25</span> <span
                                            class="old-price">$123.25</span></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-xxl-3 col-xl-4 col-6 cr-product-box mb-24">
                            <div class="cr-product-card">
                                <div class="cr-product-image">
                                    <div class="cr-image-inner zoom-image-hover"
                                        style="position: relative; overflow: hidden;">
                                        <img src="assets/img/product/9.jpg" alt="product-1">
                                        <img role="presentation" alt=""
                                            src="file:///C:/Users/yaksh/Desktop/new%20log/carrot-html/assets/img/product/9.jpg"
                                            class="zoomImg"
                                            style="position: absolute; top: 0px; left: 0px; opacity: 0; width: 600px; height: 600px; border: none; max-width: none; max-height: none;">
                                    </div>
                                    <div class="cr-side-view">
                                        <a href="javascript:void(0)" class="wishlist">
                                            <i class="ri-heart-line"></i>
                                        </a>
                                        <a class="model-oraganic-product" data-bs-toggle="modal" href="#quickview"
                                            role="button">
                                            <i class="ri-eye-line"></i>
                                        </a>
                                    </div>
                                    <a class="cr-shopping-bag" href="javascript:void(0)">
                                        <i class="ri-shopping-bag-line"></i>
                                    </a>
                                </div>
                                <div class="cr-product-details">
                                    <div class="cr-brand">
                                        <a href="shop-left-sidebar.html">Snacks</a>
                                        <div class="cr-star">
                                            <i class="ri-star-fill"></i>
                                            <i class="ri-star-fill"></i>
                                            <i class="ri-star-fill"></i>
                                            <i class="ri-star-fill"></i>
                                            <i class="ri-star-fill"></i>
                                            <p>(5.0)</p>
                                        </div>
                                    </div>
                                    <a href="product-left-sidebar.html" class="title">Best snakes with hazel nut pack
                                        200gm</a>
                                    <p class="text">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
                                        eiusmod tempor incididunt
                                        ut labore lacus vel facilisis.</p>
                                    <ul class="list">
                                        <li><label>Brand :</label>ESTA BETTERU CO</li>
                                        <li><label>Diet Type :</label>Vegetarian</li>
                                        <li><label>Speciality :</label>Gluten Free, Sugar Free</li>
                                    </ul>
                                    <p class="cr-price"><span class="new-price">$145</span> <span
                                            class="old-price">$150</span></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-xxl-3 col-xl-4 col-6 cr-product-box mb-24">
                            <div class="cr-product-card">
                                <div class="cr-product-image">
                                    <div class="cr-image-inner zoom-image-hover"
                                        style="position: relative; overflow: hidden;">
                                        <img src="assets/img/product/2.jpg" alt="product-1">
                                        <img role="presentation" alt=""
                                            src="file:///C:/Users/yaksh/Desktop/new%20log/carrot-html/assets/img/product/2.jpg"
                                            class="zoomImg"
                                            style="position: absolute; top: 0px; left: 0px; opacity: 0; width: 600px; height: 600px; border: none; max-width: none; max-height: none;">
                                    </div>
                                    <div class="cr-side-view">
                                        <a href="javascript:void(0)" class="wishlist">
                                            <i class="ri-heart-line"></i>
                                        </a>
                                        <a class="model-oraganic-product" data-bs-toggle="modal" href="#quickview"
                                            role="button">
                                            <i class="ri-eye-line"></i>
                                        </a>
                                    </div>
                                    <a class="cr-shopping-bag" href="javascript:void(0)">
                                        <i class="ri-shopping-bag-line"></i>
                                    </a>
                                </div>
                                <div class="cr-product-details">
                                    <div class="cr-brand">
                                        <a href="shop-left-sidebar.html">Fruits</a>
                                        <div class="cr-star">
                                            <i class="ri-star-fill"></i>
                                            <i class="ri-star-fill"></i>
                                            <i class="ri-star-fill"></i>
                                            <i class="ri-star-fill"></i>
                                            <i class="ri-star-line"></i>
                                            <p>(4.5)</p>
                                        </div>
                                    </div>
                                    <a href="product-left-sidebar.html" class="title">Fresh organic apple 1kg simla
                                        marming</a>
                                    <p class="text">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
                                        eiusmod tempor incididunt
                                        ut labore lacus vel facilisis.</p>
                                    <ul class="list">
                                        <li><label>Brand :</label>ESTA BETTERU CO</li>
                                        <li><label>Diet Type :</label>Vegetarian</li>
                                        <li><label>Speciality :</label>Gluten Free, Sugar Free</li>
                                    </ul>
                                    <p class="cr-price"><span class="new-price">$120.25</span> <span
                                            class="old-price">$123.25</span></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <nav aria-label="..." class="cr-pagination">
                        <ul class="pagination">
                            <li class="page-item disabled">
                                <span class="page-link">Previous</span>
                            </li>
                            <li class="page-item active" aria-current="page">
                                <span class="page-link">1</span>
                            </li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item">
                                <a class="page-link" href="#">Next</a>
                            </li>
                        </ul>
                    </nav>
                </div>

            </div>
        </div>
    </section>
    <div id="site-content">
        <div class="container">
            <form class="row" action="{{ url(Request::url()) }}">
                <div class="col-md-3">
                    <!-- <form action=""> -->
                    <div class="filter">
                        <div class="filter-header">
                            <h4 class="title">Filter</h4>
                        </div>
                        <div class="filter-item">
                            @if (request()->get('keyword') && request()->get('keyword') != '')
                                <input type="text" hidden name="keyword" value="{{ request()->get('keyword') }}">
                            @endif
                            <h5 class="title">Categories</h5>
                            <div class="dropdown">
                                <ul>
                                    <li class="category_name">
                                        <a href="{{ url('search') }}">
                                            @if ((!request()->get('keyword') || request()->get('keyword') == '') && !$cat_detail)
                                                <i class="fas fa-angle-right"></i>
                                            @endif
                                            All Categories
                                        </a>
                                    </li>

                                </ul>
                            </div>
                        </div>
                        <div class="filter-item">
                            <h5 class="title">Price</h5>
                            <div id="slider-range" class="price-filter-range" name="rangeInput" style="display:none;">
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <span class="d-block">Min</span>
                                    @php
                                        $min_price = 0;
                                        if (request()->get('min_price') && request()->get('min_price') != '') {
                                            $min_price = request()->get('min_price');
                                        }
                                    @endphp
                                    <input type="number" name="min_price" min=0 max="1000000"
                                        oninput="validity.valid||(value='0');" class="price-range-field"
                                        value="{{ $min_price }}" />
                                </div>
                                <div class="col-md-6">
                                    <span class="d-block">Max</span>
                                    @php
                                        $max_price = 1000000;
                                        if (request()->get('max_price') && request()->get('max_price') != '') {
                                            $max_price = request()->get('max_price');
                                        }
                                    @endphp
                                    <input type="number" name="max_price" min=0 max=1000000 class="price-range-field"
                                        value="{{ $max_price }}" />
                                </div>
                                <div class="col-md-12">
                                    <button type="button" class="btn btn-primary btn-sm mt-2"
                                        onclick="form.submit()">Apply</button>
                                </div>
                            </div>
                        </div>
                        @if ($brands)
                            <div class="filter-item">
                                <h5 class="title">Brands</h5>
                                @foreach ($brands as $item)
                                    <div class="radio-button">
                                        @php
                                            $select_brand = '';
                                            if (request()->get('brand') && request()->get('brand') != '') {
                                                $select_brand = $item->id == request()->get('brand') ? 'checked' : '';
                                            }
                                        @endphp
                                        <input type="checkbox" class="brand" id="{{ $item->id }}" name="brand"
                                            value="{{ $item->id }}" {{ $select_brand }} onchange="form.submit()">
                                        <label for="{{ $item->id }}">{{ $item->brand_name }}</label>
                                    </div>
                                @endforeach
                            </div>
                        @endif
                    </div>
                    <!-- </form> -->
                </div>
                <div class="col-md-9">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                            @if (!empty($cat_detail))
                                @php
                                    $breadcrumb_ids = get_category_breadcrumb($cat_detail->id);
                                    $breadcrumb = \App\Models\Category::select(['id', 'category_name', 'category_slug'])
                                        ->whereIn('id', $breadcrumb_ids)
                                        ->orderBy('id', 'ASC')
                                        ->get();
                                @endphp
                                @foreach ($breadcrumb as $b_row)
                                    @if ($b_row->id == $cat_detail->id)
                                        <li class="breadcrumb-item active">
                                            {{ $b_row->category_name }}
                                        </li>
                                    @else
                                        <li class="breadcrumb-item">
                                            <a
                                                href="{{ url('c/' . $b_row->category_slug) }}">{{ $b_row->category_name }}</a>
                                        </li>
                                    @endif
                                @endforeach
                            @else
                                <li class="breadcrumb-item"><a href="{{ url('all-products') }}">All Products</a></li>
                            @endif
                        </ol>
                    </nav>
                    <div class="content-box d-flex flex-row justify-content-between align-items-center">
                        <h5 class="title">
                            @if ($cat_detail)
                                {{ $cat_detail->category_name }}
                            @elseif(request()->get('keyword') && request()->get('keyword') != '')
                                {{ request()->get('keyword') }}
                            @else
                                All Products
                            @endif
                        </h5>
                        <div class="d-flex flex-row">
                            <label for="" class="text-nowrap my-auto mr-2">Sort By</label>
                            @php $sort = ''; @endphp
                            @if (request()->sort && request()->sort != '')
                                @php $sort = request()->sort; @endphp
                            @endif

                            <select name="sort" class="form-control" onChange="form.submit()">
                                <option value="latest" {{ $sort == 'latest' ? 'selected' : '' }}>Latest</option>
                                <option value="oldest" {{ $sort == 'oldest' ? 'selected' : '' }}>Oldest</option>
                                <option value="l-h" {{ $sort == 'l-h' ? 'selected' : '' }}>Price:Low to High
                                </option>
                                <option value="h-l" {{ $sort == 'h-l' ? 'selected' : '' }}>Price:High to Low
                                </option>
                            </select>
                        </div>
                    </div>
                    <div class="row search-res-list">
                        @if (!empty($products) && $products->isNotEmpty())
                            @foreach ($products as $item)
                                <div class="col-md-4">
                                    @include('public.product-grid', $item)
                                </div>
                            @endforeach
                        @else
                            <div class="col-12">
                                <div class="content-box text-center">
                                    <p class="m-0">No Products Found</p>
                                </div>
                            </div>
                        @endif
                        @if (!empty($products))
                            <div class="col-md-12">
                                {{ $products->appends(request()->query())->links() }}
                            </div>
                        @endif
                    </div>
                </div>
            </form>
        </div>
    </div>

@stop
