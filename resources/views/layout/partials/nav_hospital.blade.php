<!-- Page Content -->
<div class="content">
    <div class="container-fluid">
<div class="row">
    <div class="col-md-5 col-lg-4 col-xl-3 theiaStickySidebar">
        <!-- Profile Sidebar -->
    <div class="profile-sidebar">
    <div class="dashboard-widget">
        <nav class="dashboard-menu">
            <ul>
                <li class="{{ Request::is('home') ? 'active' : '' }}">
                    <a href="{{ route('home') }}">
                        <i class="fas fa-columns"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li class="{{ Request::routeIs('doctor.*') ? 'active' : '' }}">
                    <a href="{{ route('doctor.index') }}">
                        <i class="fas fa-calendar-check"></i>
                        <span>My Doctors</span>
                    </a>
                </li>
{{--                <li>--}}
{{--                    <a href="{{url('appointments')}}">--}}
{{--                        <i class="fas fa-calendar-check"></i>--}}
{{--                        <span>Appointments</span>--}}
{{--                    </a>--}}
{{--                </li>--}}
                <li class="{{ Request::routeIs('patient.*') ? 'active' : '' }}">
                    <a href="{{ route('patient.index') }}">
                        <i class="fas fa-user-injured"></i>
                        <span>My Patients</span>
                    </a>
                </li>
                <li>
                    <a href="{{url('schedule-timings')}}">
                        <i class="fas fa-hourglass-start"></i>
                        <span>Schedule Timings</span>
                    </a>
                </li>
                <li>
                    <a href="{{url('available-timings')}}">
                        <i class="fas fa-clock"></i>
                        <span>Available Timings</span>
                    </a>
                </li>
                <li>
                    <a href="{{url('invoices')}}">
                        <i class="fas fa-file-invoice"></i>
                        <span>Invoices</span>
                    </a>
                </li>
                <li>
                    <a href="{{url('accounts')}}">
                        <i class="fas fa-file-invoice-dollar"></i>
                        <span>Accounts</span>
                    </a>
                </li>
                <li>
                    <a href="{{url('reviews')}}">
                        <i class="fas fa-star"></i>
                        <span>Reviews</span>
                    </a>
                </li>
                <li>
                    <a href="{{url('chat-doctor')}}">
                        <i class="fas fa-comments"></i>
                        <span>Message</span>
                        <small class="unread-msg">23</small>
                    </a>
                </li>
                <li>
                    <a href="{{url('doctor-profile-settings')}}">
                        <i class="fas fa-user-cog"></i>
                        <span>Profile Settings</span>
                    </a>
                </li>
                <li>
                    <a href="{{url('social-media')}}">
                        <i class="fas fa-share-alt"></i>
                        <span>Social Media</span>
                    </a>
                </li>
                <li>
                    <a href="{{url('doctor-change-password')}}">
                        <i class="fas fa-lock"></i>
                        <span>Change Password</span>
                    </a>
                </li>
                <li>
                    <a href="{{url('index')}}">
                        <i class="fas fa-sign-out-alt"></i>
                        <span>Logout</span>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</div>
        <!-- /Profile Sidebar -->
    </div>
