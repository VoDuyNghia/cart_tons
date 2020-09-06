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
                    {{-- <li class="nav-item">
                        <a class="nav-link {{ request()->is('admin/campaigns*') ? 'active' : '' }}"
                            href="#navbar-campaigns" data-toggle="collapse" role="button" aria-expanded="false"
                            aria-controls="navbar-campaigns">
                            <em class="fas fa-minus-square text-gray"></em>
                            <span class="nav-link-text">Quản lý chiến dịch tiêu điểm</span>
                        </a>
                        <div class="collapse {{ request()->is('admin/campaigns*') ? 'show' : '' }}"
                            id="navbar-campaigns">
                            <ul class="nav nav-sm flex-column">
                                <li class="nav-item">
                                    <a href="{{ route('campaigns.index') }}" class="nav-link">Danh sách</a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('campaigns.create') }}" class="nav-link">Thêm mới</a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('campaign-usages.index') }}" class="nav-link">Danh sách phần thưởng đã nhận</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('admin/transactions*') ? 'active' : '' }}"
                            href="#navbar-transactions" data-toggle="collapse" role="button" aria-expanded="false"
                            aria-controls="navbar-transactions">
                            <em class="fa fa-history text-orange"></em>
                            <span class="nav-link-text">Quản lý giao dịch</span>
                        </a>
                        <div class="collapse {{ request()->is('admin/transactions*') ? 'show' : '' }}"
                            id="navbar-transactions">
                            <ul class="nav nav-sm flex-column">
                                <li class="nav-item">
                                    <a href="{{ route('transactions.index') }}" class="nav-link">Danh sách</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('admin/groups*') ? 'active' : '' }}" href="#navbar-groups"
                            data-toggle="collapse" role="button" aria-expanded="false" aria-controls="navbar-groups">
                            <em class="fa fa-object-group text-yellow"></em>
                            <span class="nav-link-text">Quản lý nhóm người dùng</span>
                        </a>
                        <div class="collapse {{ request()->is('admin/groups*') ? 'show' : '' }}" id="navbar-groups">
                            <ul class="nav nav-sm flex-column">
                                <li class="nav-item">
                                    <a href="{{ route('groups.index') }}" class="nav-link">Danh sách</a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('groups.create') }}" class="nav-link">Thêm mới</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('admin/levels*') ? 'active' : '' }}" href="#navbar-levels"
                            data-toggle="collapse" role="button" aria-expanded="false" aria-controls="navbar-levels">
                            <em class="fas fa-level-up-alt text-pink"></em>
                            <span class="nav-link-text">Quản lý Level</span>
                        </a>
                        <div class="collapse {{ request()->is('admin/levels*') ? 'show' : '' }}" id="navbar-levels">
                            <ul class="nav nav-sm flex-column">
                                <li class="nav-item">
                                    <a href="{{ route('levels.index') }}" class="nav-link">Danh sách</a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('levels.create') }}" class="nav-link">Thêm mới</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('admin/teams*') ? 'active' : '' }}" href="#navbar-teams"
                            data-toggle="collapse" role="button" aria-expanded="false" aria-controls="navbar-teams">
                            <em class="fas fa-users text-blue"></em>
                            <span class="nav-link-text">Quản lý Team</span>
                        </a>
                        <div class="collapse {{ request()->is('admin/teams*') ? 'show' : '' }}" id="navbar-teams">
                            <ul class="nav nav-sm flex-column">
                                <li class="nav-item">
                                    <a href="{{ route('teams.index') }}" class="nav-link ">Danh sách</a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('teams.create') }}" class="nav-link">Thêm mới</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('admin/merchants*') ? 'active' : '' }}"
                            href="#navbar-merchants" data-toggle="collapse" role="button" aria-expanded="false"
                            aria-controls="navbar-merchants">
                            <em class="far fa-address-book text-red"></em>
                            <span class="nav-link-text">Quản lý đối tác</span>
                        </a>
                        <div class="collapse {{ request()->is('admin/merchants*') ? 'show' : '' }}"
                            id="navbar-merchants">
                            <ul class="nav nav-sm flex-column">
                                <li class="nav-item">
                                    <a href="{{ route('merchants.index') }}" class="nav-link">Danh sách</a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('merchants.create') }}" class="nav-link">Thêm mới</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('admin/pages*') ? 'active' : '' }}" href="#navbar-pages"
                            data-toggle="collapse" role="button" aria-expanded="false" aria-controls="navbar-pages">
                            <em class="ni ni-collection"></em>
                            <span class="nav-link-text">Quản lý nội dung</span>
                        </a>
                        <div class="collapse {{ request()->is('admin/pages*') ? 'show' : '' }}" id="navbar-pages">
                            <ul class="nav nav-sm flex-column">
                                <li class="nav-item">
                                    <a href="{{ route('pages.index') }}" class="nav-link ">Danh sách</a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('pages.create') }}" class="nav-link">Thêm mới</a>
                                </li>
                            </ul>
                        </div>
                    </li> --}}
                </ul>
                <hr class="my-3">
                <h6 class="navbar-heading p-0 text-muted">Tài Liệu Hướng Dẫn</h6>
                <ul class="navbar-nav mb-md-3">
                    <li class="nav-item">
                        <a class="nav-link" href="#" target="_blank">
                            <em class="ni ni-spaceship"></em>
                            <span class="nav-link-text">Hướng dẫn sử dụng App</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#" target="_blank">
                            <em class="ni ni-palette"></em>
                            <span class="nav-link-text">Hướng dẫn sử dụng trang quản lý</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#" target="_blank">
                            <em class="ni ni-ui-04"></em>
                            <span class="nav-link-text">Thông tin liên hệ</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>
