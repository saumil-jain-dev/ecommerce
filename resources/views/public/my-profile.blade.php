@extends('public.layout')
@section('title','My Profile')
@section('content')
<section class="section-breadcrumb">
    <div class="cr-breadcrumb-image">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="cr-breadcrumb-title">
                        <h2>Product</h2>
                        <span> <a href="{{url('/')}}">Home</a> - My Profile</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="section-login padding-tb-100">
    <div class="container">
        <div class="row">
            <div class="col-3">
                <div class="cr-login aos-init aos-animate" data-aos="fade-up" data-aos-duration="2000" data-aos-delay="400">

                    <form class="cr-content-form">
                        <div class="form-group">
                            <label>Email Address*</label>
                            <input type="email" placeholder="Enter Your Email" class="cr-form-control">
                        </div>
                        <div class="form-group">
                            <label>Password*</label>
                            <input type="password" placeholder="Enter Your password" class="cr-form-control">
                        </div>
                        <div class="remember">
                            <span class="form-group custom">
                                <input type="checkbox" id="html">
                                <label for="html">Remember Me</label>
                            </span>
                            <a class="link" href="forgot.html">Forgot Password?</a>
                        </div><br>
                        <div class="login-buttons">
                            <button type="button" class="cr-button">Login</button>
                            <a href="register.html" class="link">
                                 Signup?
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<div id="site-content">
    <div class="container">
            <form class="row" id="EditProfile" method="POST" style="width:100%;">
                @csrf
                <div class="col-md-3">
                    <div class="content-box">
                        @if($user->user_img != '')
                            <img id="image" class="mb-2 w-100" src="{{asset('public/users/'.$user->user_img)}}" alt="" >
                        @else
                            <img id="image" class="mb-2 w-100" src="{{asset('public/users/default.png')}}" alt="" width="100%">
                        @endif
                        <div>
                            <input type="hidden" name="old_img" value="{{$user->user_img}}" />
                            <input type="file" class="form-control" name="img" onChange="readURL(this);" width="100%">
                        </div>
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="content-box">
                        <div class="form-group row mb-3">
                            <label class="col-lg-3 col-sm-5 col-form-label">Full Name : </label>
                            <div class="col-lg-5 col-sm-7">
                                <input type="text" class="form-control" name="name" value="{{$user->name}}">
                            </div>
                        </div>
                        <div class="form-group row mb-3">
                            <label class="col-lg-3 col-sm-5 col-form-label">Email / Username : </label>
                            <div class="col-lg-5 col-sm-7">
                                <input type="email" class="form-control" name="email" value="{{$user->email}}" disabled>
                            </div>
                        </div>
                        <div class="form-group row mb-3">
                            <label for="staticphone" class="col-lg-3 col-sm-5 col-form-label">Phone No : </label>
                            <div class="col-lg-5 col-sm-7">
                                <input type="number" class="form-control" name="phone" value="{{$user->phone}}">
                            </div>
                        </div>
                        <div class="form-group row mb-3">
                            <label for="staticphone" class="col-lg-3 col-sm-5 col-form-label">Country : </label>
                            <div class="col-lg-5 col-sm-7">
                                <select class="form-control select-country" name="country" id="">
                                    <option value="">Select Country</option>
                                    @if(!empty($country))
                                        @foreach($country as $countries)
                                            @php $selected = ($countries->id == $user->country) ? 'selected' : ''; @endphp
                                            <option value="{{$countries->id}}" data-country="{{$countries->id}}" {{$selected}}>{{$countries->country_name}}</option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>
                        </div>
                        <div class="form-group row mb-3">
                            <label for="staticphone" class="col-lg-3 col-sm-5 col-form-label">State : </label>
                            <div class="col-lg-5 col-sm-7">
                                <select class="form-control select-state" name="state" id="state">
                                    <option value="">First Select Country</option>
                                    @if(!empty($state))
                                        @foreach($state as $states)
                                            @php $selected = ($states->id == $user->state) ? 'selected' : ''; @endphp
                                            <option value="{{$states->id}}" data-state="{{$states->id}}" {{$selected}}>{{$states->state_name}}</option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>
                        </div>
                        <div class="form-group row mb-3">
                            <label for="staticphone" class="col-lg-3 col-sm-5 col-form-label">City : </label>
                            <div class="col-lg-5 col-sm-7">
                                <select class="form-control" name="city" id="city">
                                    <option value="">First Select State</option>
                                    @if(!empty($city))
                                        @foreach($city as $cities)
                                            @php $selected = ($cities->id == $user->city) ? 'selected' : ''; @endphp
                                            <option value="{{$cities->id}}" {{$selected}}>{{$cities->city_name}}</option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>
                        </div>
                        <div class="form-group row mb-3">
                            <label for="staticphone" class="col-lg-3 col-sm-5 col-form-label">Address : </label>
                            <div class="col-lg-5 col-sm-7">
                                @if($user->address != '')
                                    <input type="text" class="form-control" name="address" value="{{$user->address}}">
                                @else
                                    <input type="text" class="form-control" name="address" value="">
                                @endif
                            </div>
                        </div>
                        <div class="form-group row mb-3">
                            <label for="staticphone" class="col-lg-3 col-sm-5 col-form-label">Pin Code : </label>
                            <div class="col-lg-5 col-sm-7">
                                @if($user->pin_code != '')
                                    <input type="number" class="form-control" name="code" value="{{$user->pin_code}}">
                                @else
                                    <input type="number" class="form-control" name="code" value="">
                                @endif
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary mb-2">UPDATE</button>
                    </div>
                    <div class="message"></div>
                </div>
            </form>
    </div>
</div>



<script type="text/javascript">
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#image').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]); // convert to base64 string
        }
    }
</script>
@stop
