@section('title', 'Thêm Mới Sản Phẩm')
    @extends('admin.common.master')
@section('content')
    <div class="header bg-primary pb-6">
        <div class="container-fluid">
            <div class="header-body">
                <div class="row align-items-center py-4">
                    <div class="col-lg-12 col-7">
                        <h6 class="h2 text-white d-inline-block mb-0">THÊM MỚI SẢN PHẨM</h6>
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
                            <h3 class="mb-0">Thông Tin Sản Phẩm</h3>
                        </div>
                        <!-- Card body -->
                        <div class="card-body">
                            <form id="formAjax" data-load="{{ route('products.index') }}"
                                data-url="{{ route('products.store') }}">
                                <div class="card-body">
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Tên sản phẩm</label>
                                        <div class="col-sm-6">
                                            <input required data-role="check" class="form-control" placeholder="Tên sản phẩm"
                                                name="name" type="text">
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="error error-name"></div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Chi tiết</label>
                                        <div class="col-sm-6">
                                            <textarea required data-role="check" class="form-control" placeholder="Chi tiết"
                                                name="detail" cols="30" rows="5"></textarea>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="error error-description"></div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Rate</label>
                                        <div class="col-sm-6">
                                            <input required data-role="check" min="1" max="5" class="form-control" placeholder="Đánh giá"
                                                name="rate" type="number">
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="error error-order"></div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Vị trí</label>
                                        <div class="col-sm-6">
                                            <input data-role="check" min="0" class="form-control" placeholder="Vị trí sắp xếp"
                                                name="order" type="number">
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="error error-order"></div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Giá gốc</label>
                                        <div class="col-sm-6">
                                            <input required data-role="check" class="form-control" placeholder="Giá gốc" name="price"
                                                type="number">
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="error error-price"></div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Giá sale</label>
                                        <div class="col-sm-6">
                                            <input required data-role="check" min="1" class="form-control" placeholder="Giá sale"
                                                name="sale_price" type="number">
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="error error-sale_price"></div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Trạng thái</label>
                                        <div class="col-sm-6">
                                            <label class="custom-toggle custom-toggle-default">
                                                <input data-role="check" type="checkbox" checked="" name="is_status">
                                                <span class="custom-toggle-slider rounded-circle" data-label-off="Tắt"
                                                    data-label-on="Bật"></span>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Hình ảnh</label>
                                        <div class="col-sm-6">
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
                                        <label class="col-sm-2 col-form-label">Hình mô tả</label>
                                        <div class="col-sm-8" id="content">
                                            <input type="hidden" value="1" name="count_image" class="form-control">
                                            <div class="bootstrap-filestyle input-group">
                                                <a onclick="addImage()" href="javascript:void(0)" class="btn btn-warning">THÊM ẢNH</a>
                                            </div>
                                            <br/>
                                            <div class="row" id="row_0" style="margin-top: 15px;">
                                                <div class="col-lg-10 col-md-3"><input required type="file" accept="image/*" name="image_detail[]"class="form-control"> </div>
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
                                <div class="card-body">
                                    <button class="btn btn-primary" type="submit">TẠO MỚI</button>
                                    <a href="{{ route('products.index') }}" class="btn btn-secondary">HỦY BỎ</a>
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
@section('myjavascript')
    <script src="https://cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
    <script>
        var textarea = document.getElementById('description');
        CKEDITOR.replace(textarea);

    </script>
@endsection
