@extends('public.layout')
@section('title','Change Password')
@section('content')

    <section class="section-breadcrumb">
        <div class="cr-breadcrumb-image">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="cr-breadcrumb-title">
                            <h2>Change Password</h2>
                            <span> <a href="{{ url('/') }}">Home</a> - Change Password</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="section-login padding-tb-100">
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

                        <form class="cr-content-form" id="changepassword" method ="POST" autocomplete="off">
                            @csrf
                            <div class="form-group">
                                <label>Old Password*</label>
                                <input type="password" name="password"  placeholder="Old Password" required class="cr-form-control">
                            </div>
                            <div class="form-group">
                                <label>New Password*</label>
                                <input type="password" name="new_pass" id="new-pass" placeholder="New Password" required  class="cr-form-control">
                            </div>
                            <div class="form-group">
                                <label>Re-enter New Password*</label>
                                <input type="password" name="re_pass" placeholder="Re-enter New Password" required class="cr-form-control">
                            </div>
                            <br>
                            <div class="login-buttons">

                                <input type="submit"  name="save" class="cr-button" value="Update" required />

                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

@stop
