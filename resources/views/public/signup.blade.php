@extends('public.layout')
@section('title', 'Sign Up')
@section('content')
   <main class="main pages">
        <div class="page-header breadcrumb-wrap">
            <div class="container">
                <div class="breadcrumb">
                    <a href='{{ route("home") }}' rel='nofollow'><i class="fi-rs-home mr-5"></i>Home</a>
                    <span></span> Pages <span></span> My Account
                </div>
            </div>
        </div>
        <div class="page-content pt-150 pb-150">
            <div class="container">
                <div class="row">
                    <div class="col-xl-8 col-lg-10 col-md-12 m-auto">
                        <div class="row">
                            <div class="col-lg-6 col-md-8">
                                <div class="login_wrap widget-taber-content background-white">
                                    <div class="padding_eight_all bg-white">
                                        <div class="heading_s1">
                                            <h1 class="mb-5">Create an Account</h1>
                                            <p class="mb-30">Already have an account? <a href='{{ route("user_login") }}'>Login</a></p>
                                        </div>
                                        <form method="post" id="signup_form">
                                            @csrf
                                            <input type="hidden" class="url" value="{{ url('/signup') }}">
                                            <input type="hidden" class="url-login" value="{{ url('/user_login') }}">
                                            <div class="form-group">
                                                <input type="text"  name="name" placeholder="Username" />
                                            </div>
                                            <div class="form-group">
                                                <input type="text" name="phone" placeholder="Phone Number" />
                                            </div>
                                            <div class="form-group">
                                                <input type="text"  name="email" placeholder="Email" />
                                            </div>
                                            <div class="form-group">
                                                <input  type="password" name="password" id="password" placeholder="Password" />
                                            </div>
                                            <div class="form-group">
                                                <input  type="password" name="con_password" placeholder="Confirm password" />
                                            </div>
                                            
                                            <div class="login_footer form-group mb-50">
                                                <div class="chek-form">
                                                    <div class="custome-checkbox">
                                                        
                                                    </div>
                                                </div>
                                                
                                            </div>
                                            <div class="form-group mb-30">
                                                <input type="submit" name="" value="register">
                                            </div>
                                            <p class="font-xs text-muted"><strong>Note:</strong>Your personal data will be used to support your experience throughout this website, to manage access to your account, and for other purposes described in our privacy policy</p>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@stop
