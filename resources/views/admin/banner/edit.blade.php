@section('title', 'Chỉnh Sửa Hình Ảnh')
    @extends('admin.common.master')
@section('content')
    <div class="header bg-primary pb-6">
        <div class="container-fluid">
            <div class="header-body">
                <div class="row align-items-center py-4">
                    <div class="col-lg-12 col-7">
                        <h6 class="h2 text-white d-inline-block mb-0">CHỈNH SỬA HÌNH ẢNH</h6>
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
                            <h3 class="mb-0">Thông Tin Hình Ảnh</h3>
                        </div>
                        <!-- Card body -->
                        <div class="card-body">
                            <form id="formAjax" data-load="{{ route('banners.index') }}" data-url="{{ route('banners.update', $data['id']) }}">                                <div class="row">
                                    <div class="col-md-12">
                                            <div class="form-group">
                                                <div class="form-group row">
                                                    <label class="col-sm-2 col-form-label">Link</label>
                                                    <div class="col-sm-4">
                                                        <div class="input-group input-group-merge">
                                                            <input class="form-control" value="{{ $data['link'] }}" required
                                                                data-role="check" placeholder="Đường dẫn" name="link"
                                                                type="text">
                                                        </div>
                                                        <div class="error error-link"></div>
                                                    </div>
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
                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">Hình ảnh cũ</label>
                                                <div class="col-sm-4">
                                                    <img class="img-thumbnail" width="200px" src="{{ getImage($data['image'], 'banners') }}" alt="image" > <br/>
                                                    <span>{{ $data['image'] == null ? 'Đây là hình mặc định của hệ thống' : '' }}</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <button class="btn btn-primary" type="submit">CHỈNH SỬA</button>
                                <a href="{{ route('banners.index') }}" class="btn btn-secondary">HỦY BỎ</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @include('admin.common.footer')
    </div>
@endsection
