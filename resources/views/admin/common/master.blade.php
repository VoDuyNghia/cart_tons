<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/xhtml">

<head>
    @include('admin.common.head')
</head>

<body>
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-NKDMSK6" height="0" width="0"
            style="display:none;visibility:hidden"></iframe></noscript>
    @include('admin.common.header')
    <div class="main-content" id="panel">
        <nav class="navbar navbar-top navbar-expand navbar-dark bg-primary border-bottom">
            <div class="container-fluid">
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav align-items-center ml-md-auto">
                        <li class="nav-item d-xl-none">
                            <!-- Sidenav toggler -->
                            <div class="pr-3 sidenav-toggler sidenav-toggler-dark" data-action="sidenav-pin"
                                data-target="#sidenav-main">
                                <div class="sidenav-toggler-inner">
                                    <em class="sidenav-toggler-line"></em>
                                    <em class="sidenav-toggler-line"></em>
                                    <em class="sidenav-toggler-line"></em>
                                </div>
                            </div>
                        </li>
                    </ul>
                    <ul class="navbar-nav align-items-center ml-auto ml-md-0">
                        <li class="nav-item dropdown">
                            <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true"
                                aria-expanded="false">
                                <div class="media align-items-center">
                                    <span class="avatar avatar-sm rounded-circle">
                                        <img alt="Image placeholder"
                                            src="{{ asset('templates/admin/') }}/assets/img/brand/logo.png">
                                    </span>
                                    <div class="media-body ml-2 d-none d-lg-block">
                                        <span
                                            class="mb-0 text-sm  font-weight-bold">{{ Auth::user()['name'] }}</span>
                                    </div>
                                </div>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <div class="dropdown-header noti-title">
                                    <h6 class="text-overflow m-0">Xin chào!</h6>
                                </div>
                                <a href="{{ route('admin.dashboard.account') }}" class="dropdown-item">
                                    <em class="ni ni-single-02"></em>
                                    <span>Cập nhật tài khoản</span>
                                </a>
                                <div class="dropdown-divider"></div>
                                <a href="{{ route('admin.auth.logout') }}" class="dropdown-item">
                                    <em class="ni ni-user-run"></em>
                                    <span>Đăng xuất</span>
                                </a>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        @yield('content')
    </div>
    @include('admin.common.script')
</body>

</html>
