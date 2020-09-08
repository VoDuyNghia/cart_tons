@section('title', 'DashBoard')
@section('content')
<div class="header bg-primary pb--6">
    <div class="container-fluid">
        <div class="header-body">
            <div class="row align-items-center py-4">
                <div class="col-lg-6 col-7">
                    <h6 class="h2 text-white d-inline-block mb-0">THỐNG KÊ</h6>
                </div>
            </div>
            <!-- Card stats -->
            <div class="row">
                @foreach ($data as $key => $value)
                    <div class="col-xl-3 col-md-6">
                        <div class="card card-stats">
                            <!-- Card body -->
                            <div class="card-body">
                                <div class="row">
                                    <div class="col">
                                        <h5 class="card-title text-uppercase text-muted mb-0">{{ $value['text'] }}</h5>
                                        <span class="h2 font-weight-bold mb-0">{{ $value['total'] }}</span>
                                    </div>
                                    <div class="col-auto">
                                        <div
                                            class="icon icon-shape bg-gradient-{{ $value['color'] }} text-white rounded-circle shadow">
                                            <em class="{{ $value['icon'] }}"></em>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
<div class="container-fluid mt-5">
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card bg-default">
                    <div id="chartContainer"></div>
                </div>
            </div>
        </div>
    </div>
    <div class="row" style="padding-top:450px">
        <div class="col-xl-12">
            <div class="card">
                <select style="width:100px" class="form-control" id="year"></select>
                <div class="card bg-default">
                    <div id="chartContainerMonth"></div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@extends('admin.common.master')
@section('myjavascript')
    <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
    <script src="{{ asset('templates/admin/') }}/assets/js/chart.js"></script>
@endsection