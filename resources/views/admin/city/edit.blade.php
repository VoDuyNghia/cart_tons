@section('title', 'Chỉnh Sửa Tỉnh Thành')
    @extends('admin.common.master')
@section('content')
    <div class="header bg-primary pb-6">
        <div class="container-fluid">
            <div class="header-body">
                <div class="row align-items-center py-4">
                    <div class="col-lg-12 col-7">
                        <h6 class="h2 text-white d-inline-block mb-0">CHỈNH SỬA TỈNH THÀNH</h6>
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
                            <h3 class="mb-0">Thông Tin Tỉnh Thành</h3>
                        </div>
                        <!-- Card body -->
                        <div class="card-body">
                            <form id="formAjax" data-load="{{ route('cities.index') }}" data-url="{{ route('cities.update', $data['id']) }}">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <div class="input-group input-group-merge">
                                                <input class="form-control" readonly value="{{ $data['name'] }}" required
                                                    data-role="check" placeholder="Tên tỉnh thành" name="name"
                                                    type="text">
                                            </div>
                                            <div class="error error-name"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <div class="input-group input-group-merge">
                                                <input class="form-control" value="{{ $data['price'] }}" required
                                                    data-role="check" placeholder="Giá Shipping" name="price"
                                                    type="text">
                                            </div>
                                            <div class="error error-name"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <div class="input-group input-group-merge">
                                                <input class="form-control" value="{{ $data['order'] }}"
                                                    data-role="check" placeholder="Ví trí xuất hiện" name="order"
                                                    type="number">
                                            </div>
                                            <div class="error error-name"></div>
                                        </div>
                                    </div>
                                </div>
                                <button class="btn btn-primary" type="submit">CHỈNH SỬA</button>
                                <a href="{{ route('cities.index') }}" class="btn btn-secondary">HỦY BỎ</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @include('admin.common.footer')
    </div>
@endsection
