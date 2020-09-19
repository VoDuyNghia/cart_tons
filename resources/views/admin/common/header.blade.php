<nav class="sidenav navbar navbar-vertical fixed-left navbar-expand-xs navbar-light bg-white" id="sidenav-main">
    <div class="scrollbar-inner">
        <div class="sidenav-header d-flex align-items-center">
            <a class="navbar-brand" href="{{ route('admin.dashboard.index') }}">
                <img alt="Heppi" src="{{ asset('templates/admin/') }}/assets/img/brand/logo.png" class="navbar-brand-img"
                    alt="Heppi">
                <span>QUẢN LÝ</span>
            </a>
            <div class="ml-auto">
                <div class="sidenav-toggler d-none d-xl-block" data-action="sidenav-unpin" data-target="#sidenav-main">
                    <div class="sidenav-toggler-inner">
                        <em class="sidenav-toggler-line"></em>
                        <em class="sidenav-toggler-line"></em>
                        <em class="sidenav-toggler-line"></em>
                    </div>
                </div>
            </div>
        </div>
        <div class="navbar-inner">
            <div class="collapse navbar-collapse" id="sidenav-collapse-main">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('admin') ? 'active' : '' }}"
                            href="{{ route('admin.dashboard.index') }}">
                            <em class="ni ni-shop text-primary"></em>
                            <span class="nav-link-text">Thống kê</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('admin/cities*') ? 'active' : '' }}"
                            href="{{ route('cities.index') }}">
                            <em class="ni ni-user-run text-orange"></em>
                            <span class="nav-link-text">Quản lý Tỉnh/Thành</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('admin/news*') ? 'active' : '' }}"
                            href="#navbar-news" data-toggle="collapse" role="button" aria-expanded="false"
                            aria-controls="navbar-news">
                            <em class="fas fa-plus-square text-green"></em>
                            <span class="nav-link-text">Quản lý tin tức</span>
                        </a>
                        <div class="collapse {{ request()->is('admin/news*') ? 'show' : '' }}"
                            id="navbar-news">
                            <ul class="nav nav-sm flex-column">
                                <li class="nav-item">
                                    <a href="{{ route('news.index') }}" class="nav-link">Danh sách</a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('news.create') }}" class="nav-link">Thêm mới</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('admin/products*') ? 'active' : '' }}" href="#navbar-products"
                            data-toggle="collapse" role="button" aria-expanded="false" aria-controls="navbar-products">
                            <em class="fa fa-object-group text-yellow"></em>
                            <span class="nav-link-text">Quản lý sản phẩm</span>
                        </a>
                        <div class="collapse {{ request()->is('admin/products*') ? 'show' : '' }}" id="navbar-products">
                            <ul class="nav nav-sm flex-column">
                                <li class="nav-item">
                                    <a href="{{ route('products.index') }}" class="nav-link">Danh sách</a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('products.create') }}" class="nav-link">Thêm mới</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('admin/orders*') ? 'active' : '' }}" href="#navbar-orders"
                            data-toggle="collapse" role="button" aria-expanded="false" aria-controls="navbar-orders">
                            <em class="far fa-address-book text-red"></em>
                            <span class="nav-link-text">Quản lý đơn hàng</span>
                        </a>
                        <div class="collapse {{ request()->is('admin/orders*') ? 'show' : '' }}" id="navbar-orders">
                            <ul class="nav nav-sm flex-column">
                                <li class="nav-item">
                                    <a href="{{ route('orders.index') }}" class="nav-link ">Danh sách</a>
                                </li>
                                <li class="nav-item">
                                    <a href="" class="nav-link">Thêm mới</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('admin/banners*') ? 'active' : '' }}" href="#navbar-banners"
                            data-toggle="collapse" role="button" aria-expanded="false" aria-controls="navbar-banners">
                            <em class="ni ni-collection"></em>
                            <span class="nav-link-text">Quản lý hình ảnh</span>
                        </a>
                        <div class="collapse {{ request()->is('admin/banners*') ? 'show' : '' }}" id="navbar-banners">
                            <ul class="nav nav-sm flex-column">
                                <li class="nav-item">
                                    <a href="{{ route('banners.index') }}" class="nav-link ">Danh sách</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>
