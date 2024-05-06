@extends('public.layout')
@section('title','User Login')
@section('content')
<main class="main pages">
    <div class="page-header breadcrumb-wrap">
        <div class="container">
            <div class="breadcrumb">
                <a href='{{ route("home") }}' rel='nofollow'><i class="fi-rs-home mr-5"></i>Home</a>
                 <span></span> My Account
            </div>
        </div>
    </div>
    <div class="page-content pt-150 pb-150">
        <div class="container">
            <div class="row">
                <div class="col-xl-8 col-lg-10 col-md-12 m-auto">
                    <div class="row">
                        <div class="col-lg-6 pr-30 d-none d-lg-block">
                            <img class="border-radius-15" src="{{ asset('public/asset/imgs/page/login-1.png') }} " alt="" />
                        </div>
                        <div class="col-lg-6 col-md-8">
                            <div class="login_wrap widget-taber-content background-white">
                                <div class="padding_eight_all bg-white">
                                    <div class="heading_s1">
                                        <h1 class="mb-5">Login</h1>
                                        <p class="mb-30">Don't have an account? <a href='{{ route("signup") }}'>Create here</a></p>
                                    </div>
                                    @if (Session::has('message'))
                                     <div class="alert alert-success" role="alert">
                                     {{ Session::get('message') }}
                                     </div>
                                    @endif
                                    <form method="post" id="user_login">
                                        @csrf
                                        <div class="form-group">
                                            <input type="text" required="" name="email" placeholder=" Email *" />
                                        </div>
                                        <div class="form-group">
                                            <input required="" type="password" name="password" placeholder="Your password *" />
                                        </div>
                                        <div class="login_footer form-group mb-50">
                                            <div class="chek-form">
                                                <a class="text-muted" href="#">Forgot password?</a>
                                            </div>
                                            
                                        </div>
                                        <div class="form-group">
                                            <input type="submit" name="" value="Login" class="btn btn-heading btn-block hover-up">
                                        </div>
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
