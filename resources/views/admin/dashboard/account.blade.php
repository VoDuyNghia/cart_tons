@section('title', 'Account')
    @extends('admin.common.master')
@section('content')
    <div class="header bg-primary pb-6">
        <div class="container-fluid">
            <div class="header-body">
                <div class="row align-items-center py-4">
                    <div class="col-lg-12 col-7">
                        <h6 class="h2 text-white d-inline-block mb-0 text-uppercase">Quản lý Administrator</h6>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid mt--6">
        <div class="row">
            <div class="col-lg-12">
                <div class="card-wrapper">
                    <!-- Input groups -->
                    <div class="card">
                        <!-- Card header -->
                        <div class="card-header">
                            <h3 class="mb-0">Thông tin tài khoản</h3>
                        </div>
                        <!-- Card body -->
                        <div class="card-body">
                            <form id="formAjax" data-load="{{ route('admin.dashboard.index') }}" data-url="{{ route('admin.dashboard.account') }}">
                                <input class="form-control" name="id" value="{{ Auth::user()->id }}" type="hidden">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <div class="input-group input-group-merge">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><em class="fas fa-user"></em></span>
                                                </div>
                                                <input class="form-control" required data-role="check" placeholder="Tên"
                                                    name="name" value="{{ Auth::user()->name }}" type="text">
                                            </div>
                                            <div class="error error-name"></div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <div class="input-group input-group-merge">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><em class="fas fa-envelope"></em></span>
                                                </div>
                                                <input class="form-control" required data-role="check"
                                                    placeholder="Địa chỉ email" name="email" value="{{ Auth::user()->email }}" type="email">
                                            </div>
                                            <div class="error error-email"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <div class="input-group input-group-merge">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><em class="fas fa-key"></em></span>
                                                </div>
                                                <input class="form-control" required data-role="check" placeholder="Mật khẩu cũ" name="old_password" type="password">
                                            </div>
                                            <div class="error error-old_password"></div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <div class="input-group input-group-merge">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><em class="fas fa-key"></em></span>
                                                </div>
                                                <input class="form-control" required data-role="check" placeholder="Mật khẩu mới" name="password" type="password">
                                            </div>
                                            <div class="error error-password"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <button class="btn btn-primary" type="submit">CẬP NHẬT</button>
                                    <a href="{{ route('admin.dashboard.index') }}" class="btn btn-secondary">HỦY BỎ</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @include('admin.common.footer')
    </div>
@endsection
