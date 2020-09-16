@section('title', 'Thêm Mới Tin Tức')
    @extends('admin.common.master')
@section('content')
    <div class="header bg-primary pb-6">
        <div class="container-fluid">
            <div class="header-body">
                <div class="row align-items-center py-4">
                    <div class="col-lg-12 col-7">
                        <h6 class="h2 text-white d-inline-block mb-0">THÊM MỚI TIN TỨC</h6>
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
                            <h3 class="mb-0">Thông Tin Tin Tức</h3>
                        </div>
                        <!-- Card body -->
                        <div class="card-body">
                            <form id="formAjax" data-load="{{ route('news.index') }}" data-url="{{ route('news.store') }}">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <div class="input-group input-group-merge">
                                                <input maxlength="255" required class="form-control" data-role="check"
                                                    placeholder="Tiêu đề" name="name" type="text">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <div class="input-group input-group-merge">
                                                <input required class="form-control" data-role="check"
                                                    placeholder="Vị trí xuất hiện" name="order" type="number">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">Hình ảnh</label>
                                                <div class="col-sm-4">
                                                    <input type="file" accept="image/*" name="image" onchange="readURL(this);"
                                                        class="filestyle" data-buttontext="Find file" data-buttonname="btn-danger"
                                                        data-iconname="fa fa-plus" id="filestyle-0" tabindex="-1"
                                                        style="position: absolute; clip: rect(0px, 0px, 0px, 0px);">
                                                    <div class="bootstrap-filestyle input-group"><input type="file" accept="image/*"
                                                            class="form-control " disabled=""> <span
                                                            class="group-span-filestyle input-group-btn" tabindex="0"><label
                                                                for="filestyle-0" class="btn btn-danger "><span
                                                                    class="filestyleicon fa fa-plus"></span>Thêm Ảnh</label></span>
                                                    </div>
                                                    <div class="error error-image"></div>
                                                    <div class="col-lg-2 col-mt-3 ">
                                                        <img class="preview_image" id="preview_image" src="" alt="">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <div class="input-group input-group-merge">
                                                <textarea required class="form-control" placeholder="Chi tiết"
                                                    id="detail" name="detail" cols="30" rows="5"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <div class="input-group input-group-merge">
                                                <textarea required class="form-control" placeholder="Nội dung"
                                                    id="description" name="description" cols="30" rows="5"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <span>Trạng thái</span>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="custom-toggle custom-toggle-default">
                                                <input type="checkbox" checked="" name="is_status">
                                                <span class="custom-toggle-slider rounded-circle" data-label-off="Tắt"
                                                    data-label-on="Bật"></span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <button class="btn btn-primary" type="submit">TẠO MỚI</button>
                                <a href="{{ route('news.index') }}" class="btn btn-secondary">HỦY BỎ</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @include('admin.common.footer')
    </div>
@endsection
@section('myjavascript')
    <script src={{ url('ckeditor/ckeditor.js') }}></script>
    <script>
    CKEDITOR.replace( 'description', {
        filebrowserBrowseUrl: '{{ route('ckfinder_browser') }}',

    } );
    </script>
    @include('ckfinder::setup')
@endsection
