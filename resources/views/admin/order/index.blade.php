@section('title', 'Quản Lý Đơn Hàng')
    @extends('admin.common.master')
@section('content')
    <div class="header bg-primary pb-6">
        <div class="container-fluid">
            <div class="header-body">
                <div class="row align-items-center py-4">
                    <div class="col-lg-12 col-7">
                        <h6 class="h2 text-white d-inline-block mb-0">QUẢN LÝ ĐƠN HÀNG</h6>
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
            <div class="col">
                <div class="card">
                    <!-- Card header -->
                    <div class="card-header border-0">
                        <h3 class="mb-0">Danh Sách Đơn Hàng</h3>
                    </div>
                    <!-- Light table -->
                    <div class="table-responsive">
                        <table aria-hidden="true" class="table align-items-center table-flush" id="datatable">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">Mã đơn hàng</th>
                                    <th scope="col">Họ tên</th>
                                    <th scope="col">Điện thoại</th>
                                    <th scope="col">Tiền sản phẩm</th>
                                    <th scope="col">Tiền shipping</th>
                                    <th scope="col">Tổng</th>
                                    <th scope="col">Trạng thái</th>
                                    <th scope="col">Ngày tạo</th>
                                    <th scope="col">Hành động</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        @include('admin.common.footer')
        <input id="data_datatable" type="hidden" value="{{ route('orders.data') }}">
    </div>
@endsection
@section('myjavascript')
    <script>
        $('#datatable').DataTable({
            processing: true,
            serverSide: true,
            ajax: $('#data_datatable').val(),
            columns: [
                {
                    data: 'id',
                    name: 'id',
                },
                {
                    data: 'profile.username',
                    name: 'profile.username',
                },
                {
                    data: 'profile.phone',
                    name: 'profile.phone',
                },
                {
                    data: 'price',
                    name: 'price',
                },
                {
                    data: 'shipping_price',
                    name: 'shipping_price',
                },
                {
                    data: 'total',
                    name: 'total',
                },
                {
                    data: 'status',
                    name: 'status',
                },
                {
                    data: 'created_at',
                    name: 'created_at',
                },
                {
                    data: 'action',
                    name: 'action'
                },
            ],
            columnDefs: [{
                targets: -1,
                className: 'dt-body-center'
            }],
            "order": [[ 7, "desc" ]]
        });

    </script>
@endsection
