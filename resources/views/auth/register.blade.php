<?php $page="register1";?>
@extends('layout.mainlayout')
@section('content')
    <!-- Page Content -->
    <div class="content" style="min-height:205px;">
        <div class="container-fluid">

            <div class="row">
                <div class="col-md-8 offset-md-2">

                    <!-- Register Content -->
                    <div class="account-content">
                        <div class="row align-items-center justify-content-center">
                            <div class="col-md-7 col-lg-6 login-left">
                                <img src="{{ URL::asset('/assets/img/login-banner.png')}}" class="img-fluid" alt="Doccure Register">
                            </div>
                            <div class="col-md-12 col-lg-6 login-right">
                                <div class="login-header">
                                    <h3>Patient Register</h3>
                                </div>

                                <!-- Register Form -->
                                <form action="{{ route('register') }}" method="POST">
                                    @csrf
                                    <div class="form-group form-focus">
                                        <input type="text" class="form-control floating" id="name" name="name" value="{{old('name')}}" required>
                                        <label class="focus-label">Name</label>
                                        @error('name')
                                        <div class="text-danger pt-2">
                                            {{$message}}
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="form-group form-focus">
                                        <input type="email" id="email_address" class="form-control floating" name="email" required>
                                        <label class="focus-label"> Email</label>
                                        @error('email')
                                        <div class="text-danger pt-2">
                                            {{$message}}
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="form-group form-focus">
                                        <label for="hospital_id" class="focus-label">Hospital</label>
                                        <div class="text-danger pt-1">
                                            <select id="hospital_id" name="hospital_id" class="form-select form-control floating" required>
                                                <option>-- Select Hospital --</option>
                                                @foreach($hospitals as $hospital)
                                                    <option value="{{ $hospital->id }}">{{ $hospital->hospital_name }}</option>
                                                @endforeach
                                            </select>
                                            @error('hospital_id')
                                            <div class="text-danger pt-2">
                                                {{$message}}
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group form-focus">
                                        <input type="password" id="password" class="form-control floating pass-input" name="password" value="{{old('password')}}" required>
                                        <label class="focus-label">Enter Password</label><span class="fa fa-eye-slash toggle-password pt-4"></span>
                                        @error('password')
                                        <div class="text-danger pt-2">
                                            {{$message}}
                                        </div>
                                        @enderror
                                    </div>

                                    <!-- Confirm Password -->
                                    <div class="form-group form-focus">
                                        <input type="password" id="password_confirmation" class="form-control floating pass-input" name="password_confirmation" required>
                                        <label class="focus-label">Confirm Password</label><span class="fa toggle-password pt-4"></span>
                                        <div class="text-danger pt-2">
                                            @error('password')
                                            {{$message}}
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-12">
                                                <label class="custom_check mr-2 mb-0"> I agree to the <a href="#" class="text-primary"> terms of service</a> and <a href="#" class="text-primary">privacy policy</a>
                                                    <input type="checkbox" name="radio">
                                                    <span class="checkmark"></span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="d-grid">
                                        <button class="btn btn-primary" type="submit">Register</button>
                                    </div>
                                    <div class="dont-have">Already have an account? <a href="{{ route('login') }}">Login</a></div>
                                    <div class="login-or">
                                        <span class="or-line"></span>
                                        <p class="span-or">or login with </p>
                                    </div>
                                    <!-- Social Login -->
                                    <div class="social-login">
                                        <a href="#"><img src="{{ URL::asset('/assets_admin/img/icon/google.png')}}" class="img-fluid" alt="Logo"></a>
                                        <a href="#"><img src="{{ URL::asset('/assets_admin/img/icon/facebook.png')}}" class="img-fluid" alt="Logo"></a>
                                        <a href="#"><img src="{{ URL::asset('/assets_admin/img/icon/twitter.png')}}" class="img-fluid" alt="Logo"></a>
                                    </div>
                                    <!-- /Social Login -->
                                </form>
                                <!-- /Register Form -->

                            </div>
                        </div>
                    </div>
                    <!-- /Register Content -->

                </div>
            </div>

        </div>

    </div>
    <!-- /Page Content -->
    </div>
@endsection
{{--@extends('layout.mainlayout_admin')--}}
{{--@section('content')--}}
{{--    @component('admin/components.header-menu')--}}
{{--    @endcomponent--}}
{{--        <div class="row">--}}

{{--            <!-- Login Banner -->--}}
{{--            <div class="col-md-7 col-lg-6 login-left pt-5 mt-4">--}}
{{--                <img src="{{ URL::asset('/assets/img/login-banner.png')}}" class="img-fluid" alt="Doccure Login">--}}
{{--            </div>--}}
{{--            <!-- /Login Banner -->--}}

{{--            <div class="col-md-6 login-wrap-bg">--}}

{{--                <!-- Login -->--}}
{{--                <div class="login-wrapper">--}}
{{--                    <div class="loginbox">--}}
{{--                        <div class="img-logo">--}}
{{--                            <img src="{{ URL::asset('/assets_admin/img/logo.png')}}" class="img-fluid" alt="Logo">--}}
{{--                        </div>--}}
{{--                        <h3>Getting Started</h3>--}}
{{--                        <p class="account-subtitle">Register with email</p>--}}

{{--                        <form action="{{ route('register') }}" method="POST">--}}
{{--                            @csrf--}}
{{--                            <div class="form-group form-focus">--}}
{{--                                <input type="text" class="form-control floating" id="name" name="name" value="{{old('name')}}">--}}
{{--                                <label class="focus-label">Name</label>--}}
{{--                                <div class="text-danger pt-2">--}}
{{--                                    @error('name')--}}
{{--                                    {{$message}}--}}
{{--                                    @enderror--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="form-group form-focus">--}}
{{--                                <input type="text" id="email_address" class="form-control floating" name="email">--}}
{{--                                <label class="focus-label"> Email</label>--}}
{{--                                <div class="text-danger pt-2">--}}
{{--                                    @error('email')--}}
{{--                                    {{$message}}--}}
{{--                                    @enderror--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="form-group form-focus">--}}
{{--                                <label class="focus-label"> Hospital Name</label>--}}
{{--                                <select type="select" id="email_address" class="form-control floating" name="hospital_id">--}}
{{--                                    <option value="">Select Your hospital name</option>--}}
{{--                                @forelse($hospitals as $hospital)--}}
{{--                                        <option value="{{ $hospital->id }}">{{ $hospital->name }}</option>--}}
{{--                                    @empty--}}
{{--                                        <option value="">No hospital available</option>--}}
{{--                                @endforelse--}}
{{--                                </select>--}}

{{--                                <div class="text-danger pt-2">--}}
{{--                                    @error('email')--}}
{{--                                    {{$message}}--}}
{{--                                    @enderror--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="form-group form-focus">--}}
{{--                                <input type="password" id="password" class="form-control floating pass-input" name="password" value="{{old('password')}}">--}}
{{--                                <label class="focus-label">Enter Password</label><span class="fa fa-eye-slash toggle-password pt-4"></span>--}}
{{--                                <div class="text-danger pt-2">--}}
{{--                                    @error('password')--}}
{{--                                    {{$message}}--}}
{{--                                    @enderror--}}
{{--                                </div>--}}
{{--                            </div>--}}

{{--                            <!-- Confirm Password -->--}}
{{--                            <div class="form-group form-focus">--}}
{{--                                <input type="password" id="password_confirmation" class="form-control floating pass-input" name="password_confirmation">--}}
{{--                                <label class="focus-label">Confirm Password</label><span class="fa toggle-password pt-4"></span>--}}
{{--                                <div class="text-danger pt-2">--}}
{{--                                    @error('password')--}}
{{--                                    {{$message}}--}}
{{--                                    @enderror--}}
{{--                                </div>--}}
{{--                            </div>--}}

{{--                            <div class="form-group">--}}
{{--                                <div class="row">--}}
{{--                                    <div class="col-12">--}}
{{--                                        <label class="custom_check mr-2 mb-0"> I agree to the <a href="#" class="text-primary"> terms of service</a> and <a href="#" class="text-primary">privacy policy</a>--}}
{{--                                            <input type="checkbox" name="radio">--}}
{{--                                            <span class="checkmark"></span>--}}
{{--                                        </label>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="d-grid">--}}
{{--                                <button class="btn btn-primary" type="submit">Register</button>--}}
{{--                            </div>--}}
{{--                            <div class="dont-have">Already have an account? <a href="{{ route('login') }}">Login</a></div>--}}
{{--                            <div class="login-or">--}}
{{--                                <span class="or-line"></span>--}}
{{--                                <p class="span-or">or login with </p>--}}
{{--                            </div>--}}
{{--                            <!-- Social Login -->--}}
{{--                            <div class="social-login">--}}
{{--                                <a href="#"><img src="{{ URL::asset('/assets_admin/img/icon/google.png')}}" class="img-fluid" alt="Logo"></a>--}}
{{--                                <a href="#"><img src="{{ URL::asset('/assets_admin/img/icon/facebook.png')}}" class="img-fluid" alt="Logo"></a>--}}
{{--                                <a href="#"><img src="{{ URL::asset('/assets_admin/img/icon/twitter.png')}}" class="img-fluid" alt="Logo"></a>--}}
{{--                            </div>--}}
{{--                            <!-- /Social Login -->--}}
{{--                        </form>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <!-- /Login -->--}}

{{--            </div>--}}

{{--        </div>--}}
{{--        </div>--}}
{{--        <!-- /Main Wrapper -->--}}
{{--@endsection--}}

