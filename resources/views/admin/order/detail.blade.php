@section('title', 'Chi Tiết Đơn Hàng')
    @extends('admin.common.master')
@section('content')
    <div class="header bg-primary pb-6">
        <div class="container-fluid">
            <div class="header-body">
                <div class="row align-items-center py-4">
                    <div class="col-lg-12 col-7">
                        <h6 class="h2 text-white d-inline-block mb-0">CHI TIẾT ĐƠN HÀNG</h6>
                        <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                            <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                                <a href="{{ route('news.create') }}" class="btn btn-secondary">THÊM ĐƠN HÀNG</a>
                            </ol>
                        </nav>
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
                            <h3 class="mb-0">Thông Tin Hóa Đơn</h3>
                        </div>
                        <!-- Card body -->
                        <div class="card-body">
                            <form id="formAjax" data-load="{{ route('orders.show', $data['id']) }}"
                                data-url="{{ route('orders.update', $data['id']) }}">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group row">
                                                    <label class="col-sm-4 col-form-label">Họ tên</label>
                                                    <div class="col-sm-8">
                                                        <input readonly value="{{ $data['profile']['username'] }}" data-role="check" class="form-control" type="text">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group row">
                                                    <label class="col-sm-4 col-form-label">Email</label>
                                                    <div class="col-sm-8">
                                                        <input readonly value="{{ $data['profile']['email'] }}" data-role="check" class="form-control" type="text">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group row">
                                                    <label class="col-sm-4 col-form-label">Số điện thoại</label>
                                                    <div class="col-sm-8">
                                                        <input readonly value="{{ $data['profile']['phone'] }}" data-role="check" class="form-control" type="text">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group row">
                                                    <label class="col-sm-4 col-form-label">Địa chỉ</label>
                                                    <div class="col-sm-8">
                                                        <input readonly value="{{ $data['profile']['address'] }}" data-role="check" class="form-control" type="text">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group row">
                                                    <label class="col-sm-4 col-form-label">Tỉnh/Thành</label>
                                                    <div class="col-sm-8">
                                                        <input readonly value="{{ $dataDistrict['city']['name'] }}" data-role="check" class="form-control" type="text">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group row">
                                                    <label class="col-sm-4 col-form-label">Quận/Huyện</label>
                                                    <div class="col-sm-8">
                                                        <input readonly value="{{ $dataDistrict['prefix'] .' '. $dataDistrict['name']}}" data-role="check" class="form-control" type="text">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group row">
                                                    <label class="col-sm-4 col-form-label text-danger">Trạng thái đơn hàng</label>
                                                    <div class="col-sm-4">
                                                       <select class="form-control" name="status">
                                                           @foreach ($statusOrder as $key => $value)
                                                                <option {{ $key == $data['status'] ? "selected" :'' }} value="{{ $key }}">{{ $value }}</option>
                                                           @endforeach
                                                       </select>
                                                    </div>
                                                    <div class="col-sm-4">{!! $labelStauts[$data['status']] !!}</div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group row">
                                                    <label class="col-sm-4 col-form-label">Ghi chú của người dùng</label>
                                                    <div class="col-sm-8">
                                                        <textarea name="message_user" class="form-control" rows="6" >{{ $data['message_user'] }}</textarea>
                                                        <span>{{ $data['message_user'] == null ? "Không có ghi chú của người dùng" : ''}}</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group row">
                                                    <label class="col-sm-4 col-form-label">Ghi chú của admin</label>
                                                    <div class="col-sm-8">
                                                        <textarea name="message_admin" class="form-control" rows="6" >{{ $data['message_admin'] }}</textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="border-0">
                                            <small class="text-muted font-weight-bold text-red text-uppercase h3">Danh sách
                                                sản phẩm</small>
                                        </div>
                                        <div class="card-header border-0">
                                            <div class="table-responsive">
                                                <table aria-hidden="true"
                                                    class="table align-items-center table-flush table-hover">
                                                    <thead class="thead-light">
                                                        <tr>
                                                            <th>Sản phẩm</th>
                                                            <th>Giá gốc</th>
                                                            <th>Giá sale</th>
                                                            <th>Số lượng</th>
                                                            <th>Tổng</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @php
                                                            $total = null;
                                                        @endphp
                                                        @foreach ($data['products'] as $key => $value)
                                                            <tr class="table">
                                                                <th>{{ $value['name'] }}</th>
                                                                <th>{{ number_format($value['price']) }}</th>
                                                                <th>{{ number_format($value['sale_price']) }}</th>
                                                                <th>{{ $value['pivot']['quantity'] }}</th>
                                                                <th>{{ number_format($value['sale_price'] * $value['pivot']['quantity']) }}</th>
                                                            </tr>
                                                            @php
                                                                $total += $value['sale_price'] * $value['pivot']['quantity'];
                                                            @endphp
                                                        @endforeach
                                                    </tbody>
                                                    <tfoot>
                                                        <tr>
                                                            <td></td>
                                                            <td colspan="2">
                                                                <h3>Phí shipping</h3>
                                                            </td>
                                                            <td>{{ number_format($data['shipping_price']) }} VNĐ</td>
                                                        </tr>
                                                        <tr>
                                                            <td></td>
                                                            <td colspan="2">
                                                                <h3>Tổng thanh toán</h3>
                                                            </td>
                                                            <td>{{ number_format($data['shipping_price'] + $total) }} VNĐ</td>
                                                        </tr>
                                                    </tfoot>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    @if(!($data['status'] == 4 || $data['status'] == 5))
                                    <button class="btn btn-primary" type="submit">CẬP NHẬT</button>
                                    @endif
                                    <a href="{{ route('orders.index') }}" class="btn btn-secondary">HỦY BỎ</a>
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
