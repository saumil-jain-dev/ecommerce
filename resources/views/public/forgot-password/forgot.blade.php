@extends('public.layout')
@section('title', 'Forgot Password')
@section('content')
    <section class="section-login padding-tb-100" id="site-content">
        <div class="container">
            <div class="row d-none">
                <div class="col-lg-12">
                    <div class="mb-30 aos-init aos-animate" data-aos="fade-up" data-aos-duration="2000" data-aos-delay="400">
                        <div class="cr-banner">
                            <h2>Forgot Password</h2>
                        </div>
                        <div class="cr-banner-sub-title">
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt
                                ut labore lacus vel facilisis. </p>
                        </div>
                    </div>
                </div>
            </div>
            @if (Session::has('message'))
                <div class="alert alert-success" role="alert">
                    {{ Session::get('message') }}
                </div>
            @endif
            <div class="row">
                <div class="col-12">
                    <div class="cr-login aos-init aos-animate" data-aos="fade-up" data-aos-duration="2000"
                        data-aos-delay="400">
                        <h2>Forgot Password</h2>
                        <!-- Form Start -->
                        <form class="cr-content-form" action="{{ url('forgot-password') }}"method="POST"
                            autocomplete="off">
                            @csrf

                            <div class="form-group">
                                <label>Email Address*</label>
                                <input type="email" name="email" placeholder="Enter Your Email"
                                    class="cr-form-control" required>
                            </div>


                            <div class="login-buttons">
                                <input type="submit" name="save" class="cr-button" required="" value="Send Password Reset Link">
                            </div>
                        </form>
                        <span class="login-link">
                            <a href="{{ url('user_login') }}">Back to Login</a></span>
                    </div>
                </div>
            </div>
        </div>
    </section>
    {{-- <div id="site-content" class="py-5">
        <div class="container">
            <div class="row">
                <div class="offset-md-4 col-md-4">

                    <div class="signup-form">
                        <!-- Form Start -->
                        <form class="form-horizontal mb-3"  method ="POST"
                            autocomplete="off">
                            <h4 class="user-heading mb-4"></h4>

                            <input type="hidden" class="url" value="{{ url('/') }}">
                            <div class="form-group mb-4">
                          <input  class="form-control" placeholder="Email Address">
                            </div>
                            <input type="submit" name="save" class="btn btn-primary" value=""
                                required />
                        </form>

                        <!-- Form End-->
                    </div>
                </div>
            </div>
        </div> --}}
    </div>
@stop
