@php use Illuminate\Support\Facades\Route; @endphp
@if(Route::is(['map-grid','map-list']))
    <!-- Loader -->
    <div id="loader">
        <div class="loader">
            <span></span>
            <span></span>
        </div>
    </div>
    <!-- /Loader  -->
@endif

<div class="main-wrapper">

    <!-- Header -->
    <header class="header">
        <nav class="navbar navbar-expand-lg header-nav">
            <div class="navbar-header">
                <a id="mobile_btn" href="javascript:void(0);">
				<span class="bar-icon">
					<span></span>
					<span></span>
					<span></span>
				</span>
                </a>
                @auth
                    <a href="{{ route('home') }}" class="navbar-brand logo">
                        <img src="{{ URL::asset('/assets/img/logo.png')}}" class="img-fluid" alt="Logo">
                    </a>
                @else
                    <a href="/" class="navbar-brand logo">
                        <img src="{{ URL::asset('/assets/img/logo.png')}}" class="img-fluid" alt="Logo">
                    </a>
                @endauth

            </div>
            <div class="main-menu-wrapper">
                <div class="menu-header">
                    <a href="{{url('index')}}" class="menu-logo">
                        <img src="{{ URL::asset('/assets/img/logo.png')}}" class="img-fluid" alt="Logo">
                    </a>
                    <a id="menu_close" class="menu-close" href="javascript:void(0);">
                        <i class="fas fa-times"></i>
                    </a>
                </div>
                <ul class="main-nav">
                    @auth
                        <li class="<?php if($page=="index") { echo 'active'; } ?>">
                            <a href="{{ route('home') }}">Home</a>
                        </li>
                    @else
                        <li class="<?php if($page=="index") { echo 'active'; } ?>">
                            <a href="/">Home</a>
                        </li>
                    @endauth

                    <li class="<?php if($page=="blog-list") { echo 'active'; } ?>">
                        <a href="{{ route('blog-list') }}">Blogs</a>
                    </li>
                    <li class="<?php if($page=="about-us") { echo 'active'; } ?>">
                        <a href="{{ route('about-us') }}">About Us</a>
                    </li>
                    <li class="<?php if($page=="contact-us") { echo 'active'; } ?>">
                        <a href="{{ route('contact-us') }}">Contact Us</a>
                    </li>
                    <li class="<?php if($page=="patient-dashboard") { echo 'active'; } ?>">
                        <a href="{{ route('home') }}">Dashboard</a>
                    </li>
                </ul>
            </div>
            <ul class="nav header-navbar-rht">
                <li class="nav-item contact-item">
                    <div class="header-contact-img">
                        <i class="far fa-hospital"></i>
                    </div>
                    <div class="header-contact-detail">
                        <p class="contact-header">Contact</p>
                        <p class="contact-info-header"> +1 315 369 5943</p>
                    </div>
                </li>
                    @auth
                        <li class="nav-item dropdown has-arrow logged-item">
                            <a href="#" class="dropdown-toggle nav-link" data-bs-toggle="dropdown">
					<span class="user-img">
						<img class="rounded-circle" src="{{ URL::asset('/assets/img/patients/patient.jpg')}}" width="31"
                             alt="Ryan Taylor">
					</span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <div class="user-header">
                                    <div class="avatar avatar-sm">
                                        <img src="{{ URL::asset('/assets/img/patients/patient.jpg')}}" alt="User Image"
                                             class="avatar-img rounded-circle">
                                    </div>
                                    <div class="user-text">
                                        <h6>{{ \Illuminate\Support\Facades\Auth::user()->name }}</h6>
                                        <p class="text-muted mb-0">Patient</p>
                                    </div>
                                </div>
                                <a class="dropdown-item" href="{{url('patient-dashboard')}}">Dashboard</a>
                                <a class="dropdown-item" href="{{ route('profile.index') }}">Profile</a>
                                <a
                                    onclick="document.getElementById('formlogout').submit();"
                                    class="dropdown-item"
                                    href="#"
                                >
                                    Logout
                                </a>
                                <form id="formlogout" method="POST" action="{{ route('logout') }}">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    @else
                        <li class="nav-item">
                            <a class="nav-link header-login" href="{{ route('login') }}">login / Signup </a>
                        </li>
                    @endauth
            </ul>
        </nav>
    </header>
    <!-- /Header -->



