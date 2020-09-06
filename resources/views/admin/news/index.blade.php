@section('title', 'Quản Lý Tin Tức')
    @extends('admin.common.master')
@section('content')
    <div class="header bg-primary pb-6">
        <div class="container-fluid">
            <div class="header-body">
                <div class="row align-items-center py-4">
                    <div class="col-lg-12 col-7">
                        <h6 class="h2 text-white d-inline-block mb-0">QUẢN LÝ TIN TỨC</h6>
                        <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                            <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                                <a href="{{ route('news.create') }}" class="btn btn-secondary">THÊM TIN TỨC</a>
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
                        <h3 class="mb-0">Danh Sách Tin Tức</h3>
                    </div>
                    <!-- Light table -->
                    <div class="table-responsive">
                        <table aria-hidden="true" class="table align-items-center table-flush" id="datatable">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">Tiêu đề</th>
                                    <th scope="col">Hình Ảnh</th>
                                    <th scope="col">Trạng thái</th>
                                    <th scope="col">Vị trí</th>
                                    <th scope="col">Hành động</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        @include('admin.common.footer')
        <input id="data_datatable" type="hidden" value="{{ route('news.data') }}">
    </div>
@endsection
@section('myjavascript')
    <script>
        $('#datatable').DataTable({
            processing: true,
            serverSide: true,
            ajax: $('#data_datatable').val(),
            columns: [{
                    data: 'name',
                    name: 'name',
                },
                {
                    data: 'image',
                    name: 'image',
                },
                {
                    data: 'status',
                    name: 'status',
                },
                {
                    data: 'order',
                    name: 'order',
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
            "order": [[ 1, "desc" ]]
        });

    </script>
@endsection
