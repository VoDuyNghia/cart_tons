@extends('ui.common.master')
@section('seo')
    <title>{{ $dataProduct['name'] }} | Quang Vinh - Coffee</title>
    <meta name="description" content="{{ $dataProduct['detail'] }}">
    <meta name="keywords" content="{{ $dataProduct['detail'] }}">
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
    <meta property="og:image" itemprop="thumbnailUrl" content="{{ getImage($dataProduct['image'], 'products') }}" />
    <meta property="og:image:width" content="800" />
    <meta property="og:image:height" content="500" />
    <meta content="{{ $dataProduct['name'] }} | Quang Vinh - Coffee" itemprop="headline" property="og:title" />
    <meta content="{{ $dataProduct['detail'] }}" itemprop="description" property="og:description" />
    <meta property="og:url" content="{{ url()->full() }}">
    <meta property="twitter:title" content="{{ $dataProduct['name'] }} | Quang Vinh - Coffee">
    <meta property="twitter:description" content="{{ $dataProduct['name'] }}">
    <meta property="twitter:image" content="{{ getImage($dataProduct['image'], 'products') }}">
    @section('mycss')
    <link rel="stylesheet" href="{{ asset('templates/ui/') }}/assets/styles/bootstrap.min.css" />
    <link rel="stylesheet" href="{{ asset('templates/admin/') }}/assets/vendor/sweetalert2/dist/sweetalert2.min.css">
    @endsection
@endsection
@section('content')
    @include('ui.common.info')

    <section id="banner" class="banner-product" style="background-image: url({{ getImage(getImageDatabase(7)['image'], 'banners') }});">
        <div class="container">
            <div class="banner-inner">
                <h2 class="banner-title-product-detail">THÔNG TIN VỀ SẢN PHẨM</h2>
            </div>
        </div>
    </section>

    <div class="wrapper">
        <div class="row mt-5">
            <div class="col-md-6">
                <div class="col-md-12">
                    <div class="row">
                        <div class="images">
                            <div class="woocommerce-product-gallery__image">
                                <a href="javascript:void(0)" data-rel="prettyPhoto[woo_single_pretty_photo]">
                                    <img width="100%" height="100%" src="{{ getImage($dataProduct['image'], 'products') }}">
                                </a>
                            </div>
                        </div>
                    </div>
    
                    <div class="row mt-2 image-detail">
                        <div class="container">
                            <div class="row">
                                <div class="row">
                                    @foreach($dataProduct->images->toArray() as $key => $value)
                                    <div class="col-lg-3 col-md-4 col-xs-6 thumb">
                                        <a class="thumbnail" href="#" data-image-id="{{ $key }}" data-toggle="modal" data-title="{{ $dataProduct['name'] }}" data-image="{{ getImage($value['path'], 'details') }}" data-target="#image-gallery">
                                            <img class="img-thumbnail" src="{{ getImage($value['path'], 'details') }}" alt="{{ $dataProduct['name'] }}">
                                        </a>
                                    </div>
                                    @endforeach
                                </div>
                        
                                <div class="modal fade" id="image-gallery" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title" id="image-gallery-title"></h4>
                                                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <img id="image-gallery-image" class="img-responsive col-md-12" src="">
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary float-left" id="show-previous-image"><i class="fa fa-arrow-left"></i>
                                                </button>
                        
                                                <button type="button" id="show-next-image" class="btn btn-secondary float-right"><i class="fa fa-arrow-right"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                       
                    </div>
                </div>
             </div>
             <div class="col-md-6 info-product">
                <div class="col-md-12">
                    <div class="edgtf-single-product-summary">
                        <div class="summary entry-summary">
                            <h3 itemprop="name" class="edgtf-single-product-title text-uppercase">{{ $dataProduct['name'] }}</h3>
                            <div class="woocommerce-product-rating">
                                <div class="product__rating" data-rating="{{ $dataProduct['rate'] }}"></div>
                            </div>
                            <p class="price-mobile">
                                <del><span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol"></span>{{number_format($dataProduct['price'])}} đ</span></del>
                                <ins><span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol"></span>{{number_format($dataProduct['sale_price'])}} đ</span></ins>
                            </p>
                            <div class="woocommerce-product-details__short-description">
                                <p>{!! $dataProduct['detail'] !!}</p>
                            </div>
                            <div class="input-group mb-3">
                                <span class="input-group-prepend">
                                    <button type="button" class="btn btn-outline-secondary btn-number" disabled="disabled" data-type="minus" data-field="qty[{{ $dataProduct['id']}}]">
                                        <span class="fa fa-minus"></span>
                                    </button>
                                </span>
                                <input type="text" name="qty[{{ $dataProduct['id']}}]" class="input-number" value="1" min="1" max="10">
                                <span class="input-group-append">
                                    <button type="button" class="btn btn-outline-secondary btn-number" data-type="plus" data-field="qty[{{ $dataProduct['id']}}]">
                                        <span class="fa fa-plus"></span>
                                    </button>
                                </span>
                            </div>
                            <div class="input-group mb-3">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="shape" id="shape1" value="1" checked="">
                                    <label class="form-check-label" for="shape1">Dạng bột</label>
                                </div> &nbsp; &nbsp;
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="shape" id="shape2" value="2">
                                    <label class="form-check-label" for="shape2">Dạng hạt</label>
                                </div>
                            </div>
                            <button onclick="cart.add('{{ $dataProduct['id']}}', 1 , 'detail')" class="edgtf-btn edgtf-btn-medium edgtf-btn-solid single_add_to_cart_button alt">
                                <span class="edgtf-btn-text text-uppercase">Thêm giỏ hàng</span>
                            </button>
                        </div>
                    </div>
                </div>
             </div>
        </div>

        <div class="row mt-3">
            <div class="col-md-12">
                <h4 class="text-uppercase title-cart-total">MÔ TẢ</h4>
            </div>
            <div class="col-md-12">
                <div class="description-product">{!! $dataProduct['description'] !!}</div>
            </div>
        </div>

        <div class="row mt-3">
            <div class="col-md-12">
                <h4 class="text-uppercase title-cart-total">Sản phẩm khác</h4>
            </div>

            <div class="col-md-12">
                <div class="row">
                    @foreach($dataProductRandom as $value)
                    <div class="col-lg-3 col-md-4 col-6">
                        <div class="product-wrapper">
                            <div class="product">
                                <div class="product__img-wrapper">
                                    <a href="{{route('ui.detail.index_product',getUrl($value['name'], $value['id']))}}" class="product__img"><img width="100%"
                                            src="{{ getImage($value['image'], 'products') }}"
                                            alt="{{ $value['name'] }}" />
                                    </a>
                                    <div class="product__add-to-cart">
                                        <button id="product-{{ $value['id'] }}" class="poduct_detail_button product__add-to-cart-button" onclick="cart.add('{{ $value['id']}}', 1)">
                                            <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                                            <input type="hidden" name="qty[{{ $value['id']}}]" readonly value="1">
                                            <span>THÊM GIỎ HÀNG</span>
                                        </button>
                                    </div>
                                    @if($value['price'] > $value ['sale_price'])
                                    <p class="product-sale">SALE</p>
                                    @endif
                                </div>
                                <h4 class="product__name">
                                    <a href="{{route('ui.detail.index_product',getUrl($value['name'], $value['id']))}}">{{ $value['name'] }}</a>
                                </h4>
                                <div class="product__rating" data-rating="{{ $value['rate'] }}"></div>
                                <div class="product__price-wrapper">
                                    <p class="product__price product__price--old">
                                        <span>{{number_format($value['price'])}}</span>
                                        <span>đ</span>
                                    </p>
                                    <p class="product__price product__price--new">
                                        <span>{{number_format($value['sale_price'])}}</span>
                                        <span>đ</span>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>

        @include('ui.common.plugin')

    </div>
@endsection
@section('myscript')
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
@endsection