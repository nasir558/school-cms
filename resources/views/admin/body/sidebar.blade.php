@php
    $prefix = Request::route()->getprefix();
    $route = Route::current()->getName();
@endphp

<aside class="main-sidebar">
    <!-- sidebar-->
    <section class="sidebar">
        <div class="user-profile">
            <div class="ulogo">
                <a href="index.html">
                    <!-- logo for regular state and mobile devices -->
                    <div class="d-flex align-items-center justify-content-center">
                        <img src="{{ asset('backend/images/logo-dark.png') }}" alt="" />
                        @php
                            $userName = explode(' ', Auth::user()->name);
                            $fName = $userName[0];
                            $sName = $userName[1];
                        @endphp
                        <h3><b>{{ $fName }}</b> {{ $sName }}</h3>
                    </div>
                </a>
            </div>
        </div>

        <!-- sidebar menu-->
        <ul class="sidebar-menu" data-widget="tree">
            <li class="{{ $route == 'dashboard' ? 'active' : '' }}">
                <a href="{{ route('dashboard') }}">
                    <i data-feather="pie-chart"></i>
                    <span>Dashboard</span>
                </a>
            </li>

            <li class="treeview {{ $prefix == '/users' ? 'active' : '' }}">
                <a href="#">
                    <i data-feather="message-circle"></i>
                    <span>Manage User</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-right pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{ $route == 'user.view' ? 'active' : '' }}">
                        <a href="{{ route('user.view') }}"><i class="ti-more"></i>View User</a>
                    </li>
                    <li class="{{ $route == 'user.add' ? 'active' : '' }}">
                        <a href="{{ route('user.add') }}"><i class="ti-more"></i>Add User</a>
                    </li>
                </ul>
            </li>

            <li class="treeview {{ $prefix == '/profile' ? 'active' : '' }}">
                <a href="#">
                    <i data-feather="mail"></i> <span>Manage Profile</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-right pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{ $route == 'profile.view' ? 'active' : '' }}">
                        <a href="{{ route('profile.view') }}"><i class="ti-more"></i>My Profile</a>
                    </li>
                    <li class="{{ $route == 'password.view' ? 'active' : '' }}">
                        <a href="{{ route('password.view') }}"><i class="ti-more"></i>Change Password</a>
                    </li>
                </ul>
            </li>

            <li class="treeview {{ $prefix == '/setup' ? 'active' : '' }}">
                <a href="#">
                    <i data-feather="mail"></i> <span>Setup Management</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-right pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{ $route == 'student.class.view' ? 'active' : '' }}">
                        <a href="{{ route('student.class.view') }}"><i class="ti-more"></i>Student Class</a>
                    </li>
                    <li class="{{ $route == 'student.year.view' ? 'active' : '' }}">
                        <a href="{{ route('student.year.view') }}"><i class="ti-more"></i>Student Year</a>
                    </li>
                    <li class="{{ $route == 'student.group.view' ? 'active' : '' }}">
                        <a href="{{ route('student.group.view') }}"><i class="ti-more"></i>Student Group</a>
                    </li>
                    <li class="{{ $route == 'student.shift.view' ? 'active' : '' }}">
                        <a href="{{ route('student.shift.view') }}"><i class="ti-more"></i>Student Shift</a>
                    </li>
                    <li class="{{ $route == 'feeCategory.view' ? 'active' : '' }}">
                        <a href="{{ route('feeCategory.view') }}"><i class="ti-more"></i>Fee Category</a>
                    </li>
                    <li class="{{ $route == 'feeAmount.view' ? 'active' : '' }}">
                        <a href="{{ route('feeAmount.view') }}"><i class="ti-more"></i>Fee Category Amount</a>
                    </li>
                </ul>
            </li>

            <li class="header nav-small-cap">User Interface</li>

            <li class="treeview">
                <a href="#">
                    <i data-feather="grid"></i>
                    <span>Components</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-right pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li>
                        <a href="components_alerts.html"><i class="ti-more"></i>Alerts</a>
                    </li>
                    <li>
                        <a href="components_badges.html"><i class="ti-more"></i>Badge</a>
                    </li>
                </ul>
            </li>
        </ul>
    </section>

    <div class="sidebar-footer">
        <!-- item-->
        <a href="javascript:void(0)" class="link" data-toggle="tooltip" title="" data-original-title="Settings"
            aria-describedby="tooltip92529"><i class="ti-settings"></i></a>
        <!-- item-->
        <a href="mailbox_inbox.html" class="link" data-toggle="tooltip" title="" data-original-title="Email"><i
                class="ti-email"></i></a>
        <!-- item-->
        <a href="{{ route('admin.logout') }}" class="link" data-toggle="tooltip" title=""
            data-original-title="Logout"><i class="ti-lock"></i></a>
    </div>
</aside>
