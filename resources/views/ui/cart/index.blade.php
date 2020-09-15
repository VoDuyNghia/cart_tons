@extends('ui.common.master')
@section('seo')
    <title>Giỏ hàng | Quang Vinh - Coffee</title>
    <meta name="description" content="Mô tả">
    <meta name="keywords" content="Mô tả">
    <meta name="author" content="Quang Vinh - Coffee">
    <meta charset="utf-8">
    <meta name="googlebot" content="noarchive" />
    <meta name="robots" content="noarchive" />
    <meta name="SKYPE-TOOLBAR" content="SKYPE-TOOLBAR-PARSER-COMPATIBLE">
    <meta name="format-detection" content="telephone=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta property="og:site_name" content="{{ url()->full() }}" />
    <meta property="og:rich_attachment" content="true" />
    <meta property="og:type" content="article" />
    <meta property="article:publisher" content="https://www.facebook.com/stunited.vn/" />
    <meta property="og:url" itemprop="url" content="{{ url()->full() }}" />
    <meta property="og:image" itemprop="thumbnailUrl" content="123" />
    <meta property="og:image:width" content="800" />
    <meta property="og:image:height" content="500" />
    <meta content="Giỏ hàng | Quang Vinh - Coffee" itemprop="headline" property="og:title" />
    <meta content="Mô tả" itemprop="description" property="og:description" />
    <meta property="og:url" content="{{ url()->full() }}">
    <meta property="twitter:title" content="Giỏ hàng | Quang Vinh - Coffee">
    <meta property="twitter:description" content="Mô tả">
    <meta property="twitter:image" content="123">
    @section('mycss')
    <link rel="stylesheet" href="{{ asset('templates/ui/') }}/assets/styles/bootstrap.min.css" />
    <link rel="stylesheet" href="{{ asset('templates/admin/') }}/assets/vendor/sweetalert2/dist/sweetalert2.min.css">
    @endsection
@endsection
@section('content')
    @include('ui.common.info')

    <section id="banner" class="banner-product" style="background-image: url(../templates/ui/assets/images/shop-title-area.jpg);">
        <div class="container">
            <div class="banner-inner">
                <h2 class="banner-title-product">Giỏ hàng</h2>
            </div>
        </div>
    </section>

    <div class="wrapper mt-5">
        @if(Cart::count()> 0)
        <div class="cart-wrapper">
            <div class="table-responsive-sm">
                <table class="table">
                    <thead class="">
                        <tr>
                            <th scope="col" class="text-center">#</th>
                            <th scope="col" class="text-center">Sản phẩm</th>
                            <th scope="col" class="text-center">Hình ảnh</th>
                            <th scope="col" class="text-center">Loại</th>
                            <th scope="col" class="text-center">Giá</th>
                            <th scope="col" class="text-center">Số lượng</th>
                            <th scope="col" class="text-center">Tổng tiền</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse(Cart::content()->toArray() as $key => $value)
                        <tr>
                            <th scope="row" class="text-center">
                                <a href="javascript:void(0)" onclick="cart.delete('{{ $key }}' , 'detail')" class="remove" aria-label="Remove this item" data-product_id="1532" data-product_sku="12">×</a> || <button type="button" onclick="cart.update('{{ $key }}')" class="btn btn-info">CẬP NHẬT</button>
                            </th>
                            <td>{{ $value['name'] }}</td>
                            <td>
                                <img width="100px" class="img-thumbnail" src="{{ getImage($value['options']['image'], 'products') }}" alt="{{ $value['name'] }}">
                            </td>
                            <td>{{ $value['options']['shape'] == 1 ? "Bột" : "Hạt" }}</td>
                            <td>{{ number_format($value['price']) }} đ</td>
                            <td>
                                <div class="input-group" style="justify-content: center;">
                                    <span class="input-group-prepend">
                                        <button type="button" class="btn btn-outline-secondary btn-number" disabled="disabled" data-type="minus" data-field="qty[{{$key}}]">
                                            <span class="fa fa-minus"></span>
                                        </button>
                                    </span>
                                    <input type="text" name="qty[{{$key}}]" class="input-number" value="{{ $value['qty'] }}" min="1" max="20">
                                    <span class="input-group-append">
                                        <button type="button" class="btn btn-outline-secondary btn-number" data-type="plus" data-field="qty[{{$key}}]">
                                            <span class="fa fa-plus"></span>
                                        </button>
                                    </span>
                                </div>
                            </td>
                            <td>{{ number_format($value['subtotal']) }} đ</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="cart-wrapper">
            <div class="edgtf-cart-totals">
                <div class="cart_totals mb-3">
                    <h4 class="text-uppercase title-cart-total">Tổng tiền</h4>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <table class="table table-hover">
                            <tbody>
                                <tr>
                                    <th scope="col">Tạm tính</th>
                                    <td>{{Cart::subtotal(0, 0, ',')}} đ</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="col-md-6 text-right">
                        <a itemprop="url" href="{{ route('ui.cart.checkout') }}" target="_self" class="edgtf-btn edgtf-btn-medium edgtf-btn-solid checkout-button alt wc-forward">
                            <span class="edgtf-btn-text">TIẾN HÀNH THANH TOÁN</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        @else
        Không có sản phẩm nào trong giỏ hàng. Quay lại <a href="{{ route('ui.index.index') }}">TRANG CHỦ</a> để tiếp tục mua sắm.
        @endif
    </div>
@endsection
@section('myscript')
<script src="{{ asset('templates/admin/') }}/assets/vendor/sweetalert2/dist/sweetalert2.min.js"></script>
@endsection