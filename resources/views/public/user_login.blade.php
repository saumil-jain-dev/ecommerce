@extends('public.layout')
@section('title','User Login')
@section('content')
<section class="section-breadcrumb">
    <div class="cr-breadcrumb-image">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="cr-breadcrumb-title">
                        <h2>Login</h2>
                        <span> <a href="index.html">Home</a> - Login</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="section-login padding-tb-100" id="site-content">
    <div class="container">
        <div class="row d-none">
            <div class="col-lg-12">
                <div class="mb-30 aos-init aos-animate" data-aos="fade-up" data-aos-duration="2000" data-aos-delay="400">
                    <div class="cr-banner">
                        <h2>Login</h2>
                    </div>
                    <div class="cr-banner-sub-title">
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt
                            ut labore lacus vel facilisis. </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="cr-login aos-init aos-animate" data-aos="fade-up" data-aos-duration="2000" data-aos-delay="400">
                    {{-- <div class="form-logo">
                        <img src="assets/img/logo/logo.png" alt="logo">
                    </div> --}}
                     <!-- Form Start -->
                     @if (Session::has('message'))
                     <div class="alert alert-success" role="alert">
                     {{ Session::get('message') }}
                     </div>
                     @endif
                    <form class="cr-content-form" action="{{ URL('user_login') }}" method ="POST" autocomplete="off">
                        @csrf
                        {{-- <input type="hidden" class="url" value="{{url('/')}}" > --}}
                        <div class="form-group">
                            <label>Email Address*</label>
                            <input type="email" name="username" placeholder="Enter Your Email" class="cr-form-control">
                        </div>
                        <div class="form-group">
                            <label>Password*</label>
                            <input type="password" name="password" placeholder="Enter Your password" class="cr-form-control">
                        </div>
                        <div class="remember">
                            <span class="form-group custom">
                                <input type="checkbox" id="html">
                                <label for="html">Remember Me</label>
                            </span>
                            <a class="link" href="{{url('forgot-password')}}">Forgot Password?</a>

                        </div><br>
                        <div class="login-buttons">
                            <input type="submit" name="save" class="cr-button" required value="Login">
                            <a href="{{url('signup')}}" class="link">
                                 Signup?
                            </a>
                            {{-- <input type="submit"   class="btn btn-primary login-btn" value="Login" /> --}}
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@stop
