<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="site-url" content="{{ url('/') }}">
    <link rel="stylesheet" href="{{ asset('public/assets/css/bootstrap.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    {{-- <link rel="stylesheet" href="{{asset('public/assets/css/owl.carousel.css')}}">
    <link rel="stylesheet" href="{{asset('public/assets/css/owl.theme.default.css')}}">
    <link rel="stylesheet" href="{{asset('public/assets/css/price-range.css')}}">
    <link rel="stylesheet" href="{{asset('public/assets/css/jquery-ui.css')}}">

    <link rel="stylesheet" href="{{asset('public/assets/css/font-awesome.css')}}">
    <link rel="stylesheet" href="{{asset('public/assets/css/flexslider.css')}}">
    <link rel="stylesheet" href="{{asset('public/assets/css/fontawesome-free/css/all.min.css')}}">
    <link rel="stylesheet" href="{{asset('public/assets/css/jquery-smartWizard.min.css')}}">
    <link rel="stylesheet" href="{{asset('public/assets/css/style.css')}}"> --}}
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('public/asset/img/logo/favicon.png') }}">
    <link rel="stylesheet" href="{{ asset('public/assets/css/sweetalert-bootstrap-4.min.css') }}">
    <!-- Icon CSS -->
    <link rel="stylesheet" href="{{ asset('public/asset/css/vendor/materialdesignicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('public/asset/css/vendor/remixicon.css') }}">

    <!-- Vendor -->
    <link rel="stylesheet" href="{{ asset('public/asset/css/vendor/animate.css') }}">
    <link rel="stylesheet" href="{{ asset('public/asset/css/vendor/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('public/asset/css/vendor/aos.min.css') }}">
    <link rel="stylesheet" href="{{ asset('public/asset/css/vendor/range-slider.css') }}">
    <link rel="stylesheet" href="{{ asset('public/asset/css/vendor/swiper-bundle.min.css') }}">
    <link rel="stylesheet" href="{{ asset('public/asset/css/vendor/jquery.slick.css') }}">
    <link rel="stylesheet" href="{{ asset('public/asset/css/vendor/slick-theme.css') }}">

    <!-- Main CSS -->
    <link rel="stylesheet" href="{{ asset('public/asset/css/style.css') }}">

    <style>
        :root {
            --main-color: {{ site_settings()->theme_color }};
        }
    </style>
</head>

<body>
    <!-- Header -->
    <header>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="top-header">
                        <a href="{{ url('/') }}" class="cr-logo">
                            @if (site_settings()->site_logo == '')
                                <h5 class="m-0 my-2">{{ site_settings()->site_name }}</h5>
                            @else
                                <img src="{{ asset('public/site/' . site_settings()->site_logo) }}"
                                    alt="{{ site_settings()->site_name }}" class="logo">
                            @endif
                        </a>

                        <nav class="navbar navbar-expand-lg">
                            <a href="javascript:void(0)" class="navbar-toggler shadow-none">
                                <i class="ri-menu-3-line"></i>
                            </a>
                            <div class="cr-header-buttons">
                                <ul class="navbar-nav">
                                    <li class="nav-item dropdown">
                                        <a class="nav-link" href="javascript:void(0)">
                                            <i class="ri-user-3-line"></i>
                                        </a>
                                        <ul class="dropdown-menu">
                                            <li>
                                                <a class="dropdown-item" href="register.html">Register</a>
                                            </li>
                                            <li>
                                                <a class="dropdown-item" href="checkout.html">Checkout</a>
                                            </li>
                                            <li>
                                                <a class="dropdown-item" href="login.html">Login</a>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                                <a href="wishlist.html" class="cr-right-bar-item">
                                    <i class="ri-heart-line"></i>
                                </a>
                                <a href="javascript:void(0)" class="cr-right-bar-item Shopping-toggle">
                                    <i class="ri-shopping-cart-line"></i>
                                </a>
                            </div>
                            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                                <ul class="navbar-nav">
                                    <li class="nav-item">
                                        <a class="nav-link" href="index.html">
                                            Home
                                        </a>
                                    </li>
                                    <li class="nav-item dropdown">
                                        <a class="nav-link dropdown-toggle" href="javascript:void(0)">
                                            Category
                                        </a>
                                        <ul class="dropdown-menu">
                                            <li>
                                                <a class="dropdown-item" href="shop-left-sidebar.html">Shop Left
                                                    sidebar</a>
                                            </li>
                                            <li>
                                                <a class="dropdown-item" href="shop-right-sidebar.html">Shop
                                                    Right
                                                    sidebar</a>
                                            </li>
                                            <li>
                                                <a class="dropdown-item" href="shop-full-width.html">Full
                                                    Width</a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="nav-item dropdown">
                                        <a class="nav-link dropdown-toggle" href="javascript:void(0)">
                                            Products
                                        </a>
                                        <ul class="dropdown-menu">
                                            <li>
                                                <a class="dropdown-item" href="product-left-sidebar.html">product
                                                    Left
                                                    sidebar </a>
                                            </li>
                                            <li>
                                                <a class="dropdown-item" href="product-right-sidebar.html">product
                                                    Right
                                                    sidebar </a>
                                            </li>
                                            <li>
                                                <a class="dropdown-item" href="product-full-width.html">Product
                                                    Full
                                                    Width
                                                </a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="nav-item dropdown">
                                        <a class="nav-link dropdown-toggle" href="javascript:void(0)">
                                            Pages
                                        </a>
                                        <ul class="dropdown-menu">
                                            <li>
                                                <a class="dropdown-item" href="about.html">About Us</a>
                                            </li>
                                            <li>
                                                <a class="dropdown-item" href="contact-us.html">Contact Us</a>
                                            </li>
                                            <li>
                                                <a class="dropdown-item" href="cart.html">Cart</a>
                                            </li>
                                            <li>
                                                <a class="dropdown-item" href="checkout.html">Checkout</a>
                                            </li>
                                            <li>
                                                <a class="dropdown-item" href="track-order.html">Track Order</a>
                                            </li>
                                            <li>
                                                <a class="dropdown-item" href="wishlist.html">Wishlist</a>
                                            </li>
                                            <li>
                                                <a class="dropdown-item" href="faq.html">Faq</a>
                                            </li>
                                            <li>
                                                <a class="dropdown-item" href="login.html">Login</a>
                                            </li>
                                            <li>
                                                <a class="dropdown-item" href="register.html">Register</a>
                                            </li>
                                            <li>
                                                <a class="dropdown-item" href="policy.html">Policy</a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="nav-item dropdown">
                                        <a class="nav-link dropdown-toggle" href="javascript:void(0)">
                                            Blog
                                        </a>
                                        <ul class="dropdown-menu">
                                            <li>
                                                <a class="dropdown-item" href="blog-left-sidebar.html">Left
                                                    Sidebar</a>
                                            </li>
                                            <li>
                                                <a class="dropdown-item" href="blog-right-sidebar.html">Right
                                                    Sidebar</a>
                                            </li>
                                            <li>
                                                <a class="dropdown-item" href="blog-full-width.html">Full
                                                    Width</a>
                                            </li>
                                            <li>
                                                <a class="dropdown-item" href="blog-detail-left-sidebar.html">Detail
                                                    Left
                                                    Sidebar</a>
                                            </li>
                                            <li>
                                                <a class="dropdown-item" href="blog-detail-right-sidebar.html">Detail
                                                    Right
                                                    Sidebar</a>
                                            </li>
                                            <li>
                                                <a class="dropdown-item" href="blog-detail-full-width.html">Detail
                                                    Full
                                                    Width</a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="nav-item dropdown">
                                        <a class="nav-link dropdown-toggle" href="javascript:void(0)">
                                            Elements
                                        </a>
                                        <ul class="dropdown-menu">
                                            <li>
                                                <a class="dropdown-item" href="elements-products.html">Products</a>
                                            </li>
                                            <li>
                                                <a class="dropdown-item"
                                                    href="elements-typography.html">Typography</a>
                                            </li>
                                            <li>
                                                <a class="dropdown-item" href="elements-buttons.html">Buttons</a>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                        </nav>
                        <div class="cr-right-bar">
                            {{-- @if (Session::has('user_name')) --}}

                            <ul class="navbar-nav">
                                {{-- {{ Auth::user()->id }} --}}
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle cr-right-bar-item" href="javascript:void(0)">
                                        <i class="ri-user-3-line"></i>
                                        <span>Account</span>
                                    </a>

                                    <ul class="dropdown-menu">
                                        {{-- @if (!isset(Auth::user()->id)) --}}
                                        @if (!session()->get('user_id'))
                                        <li>
                                            <a class="dropdown-item" href="{{ url('signup') }}">Register</a>
                                        </li>

                                        <li>
                                            <a class="dropdown-item" href="{{ url('user_login') }}">Login</a>
                                        </li>
                                        @else
                                        <li><a class="dropdown-item" href="{{ url('/my-profile') }}">My
                                                Profile</a></li>
                                        <li><a class="dropdown-item" href="{{ url('/cart') }}">My Cart</a></li>
                                        <li><a class="dropdown-item" href="{{ url('/my_orders') }}">My Orders</a>
                                        </li>
                                        <li><a class="dropdown-item" href="{{ url('/my-reviews') }}">My
                                                Reviews</a></li>
                                        <li><a class="dropdown-item" href="{{ url('/changepassword') }}">Change
                                                Password</a></li>
                                        <li>
                                            <a class="dropdown-item" href="{{ url('checkout') }}">Checkout</a>
                                        </li>
                                        <li><a class="dropdown-item logout user-logout" href="{{ url('logout') }}">Log
                                                Out</a></li>
                                        @endif
                                    </ul>
                                </li>
                            </ul>
                            {{-- @if (isset(Auth::user()->id)) --}}
                            @if (session()->get('user_id'))
                                <a href="{{ url('wishlists') }}" class="cr-right-bar-item">
                                    <i class="ri-heart-3-line">{{user_wishlist()}}</i>
                                    <span>Wishlist</span>

                                </a>

                                <a href="{{ url('cart') }}" class="cr-right-bar-item">
                                    <i class="ri-shopping-cart-line">{{user_cart()}}</i>
                                    <span>Cart</span>
                                </a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </header>
