@extends('public.layout')
@section('title', 'Sign Up')
@section('content')
    <!-- Breadcrumb -->
    <section class="section-breadcrumb">
        <div class="cr-breadcrumb-image">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="cr-breadcrumb-title">
                            <h2>Register</h2>
                            <span> <a href="index.html">Home</a> - Register</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Register -->
    <section class="section-register padding-tb-100">
        <div class="container">
            <div class="row d-none">
                <div class="col-lg-12">
                    <div class="mb-30 aos-init aos-animate" data-aos="fade-up" data-aos-duration="2000"
                        data-aos-delay="400">
                        <div class="cr-banner">
                            <h2>Register</h2>
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
                    <div class="cr-register aos-init aos-animate" data-aos="fade-up" data-aos-duration="2000"
                        data-aos-delay="400">
                        <div class="form-logo">
                            <img src="assets/img/logo/logo.png" alt="logo">
                        </div>
                        <form class="cr-content-form" id="signup_form" method ="POST" autocomplete="off">
                            @csrf
                            <input type="hidden" class="url" value="{{ url('/signup') }}">
                            <input type="hidden" class="url-login" value="{{ url('/user_login') }}">
                            <div class="row">
                                <div class="col-12 ">
                                    <div class="form-group">
                                        <label>Firast Name*</label>
                                        <input type="text" name="name" placeholder="Enter Your First Name" class="cr-form-control" required>
                                    </div>
                                </div>

                                <div class="col-12 ">
                                    <div class="form-group">
                                        <label>Email*</label>
                                        <input type="email" name="email" placeholder="Enter Your email" class="cr-form-control" required>
                                    </div>
                                </div>
                                <div class="col-12 ">
                                    <div class="form-group">
                                        <label>Phone Number*</label>
                                        <input type="number" name="phone" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" placeholder="Enter Your phone number" class="cr-form-control" required>
                                    </div>
                                </div>
                                <div class="col-12 ">
                                    <div class="form-group">
                                        <label>Password*</label>
                                        <input type="password" name="password" id="password" placeholder="Enter Your password" class="cr-form-control" required>
                                    </div>
                                </div>
                                <div class="col-12 ">
                                    <div class="form-group">
                                        <label>Confirm Password*</label>
                                        <input type="password" name="con_password" placeholder="Enter Your password" class="cr-form-control" required>
                                    </div>
                                </div>
                                <div class="cr-register-buttons">
                                    <input type="submit" name="save" class="cr-button" value="Signup" required>
                                    <a href="{{ url('user_login') }}" class="link">
                                        Have an account?
                                    </a>

                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

@stop
