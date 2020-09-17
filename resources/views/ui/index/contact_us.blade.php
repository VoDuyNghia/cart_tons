@extends('ui.common.master')
@section('seo')
    <title>Liên hệ | Quang Vinh - Coffee</title>
    <meta name="description" content="Rang xay nguyên chất. Không tẩm ướt, không hóa chất. Nguồn nguyên liệu có xuất xứ rõ ràng, chất lượng. Đặt hàng mới bắt đầu rang giữ được hương vị thơm ngon đặc trưng. Đảm bảo chế biến sạch, đạt vệ sịnh an toàn thực phẩm">
    <meta name="keywords" content="Coffee, Quang Vinh - Coffee , Rang xay nguyên chất">
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
    <meta property="og:image" itemprop="thumbnailUrl" content="{{ getImage(getImageDatabase(12)['image'], 'banners') }}" />
    <meta property="og:image:width" content="800" />
    <meta property="og:image:height" content="500" />
    <meta content="Liên hệ | Quang Vinh - Coffee" itemprop="headline" property="og:title" />
    <meta content="Rang xay nguyên chất. Không tẩm ướt, không hóa chất. Nguồn nguyên liệu có xuất xứ rõ ràng, chất lượng. Đặt hàng mới bắt đầu rang giữ được hương vị thơm ngon đặc trưng. Đảm bảo chế biến sạch, đạt vệ sịnh an toàn thực phẩm" itemprop="description" property="og:description" />
    <meta property="og:url" content="{{ url()->full() }}">
    <meta property="twitter:title" content="Liên hệ | Quang Vinh - Coffee">
    <meta property="twitter:description" content="Rang xay nguyên chất. Không tẩm ướt, không hóa chất. Nguồn nguyên liệu có xuất xứ rõ ràng, chất lượng. Đặt hàng mới bắt đầu rang giữ được hương vị thơm ngon đặc trưng. Đảm bảo chế biến sạch, đạt vệ sịnh an toàn thực phẩm">
    <meta property="twitter:image" content="{{ getImage(getImageDatabase(12)['image'], 'banners') }}">
    @section('mycss')
    <link rel="stylesheet" href="{{ asset('templates/ui/') }}/assets/styles/bootstrap.min.css" />
    @endsection
@endsection
@section('content')
    @include('ui.common.info')
    <section id="banner" class="banner-product" style="background-image: url({{ getImage(getImageDatabase(11)['image'], 'banners') }});">
        <div class="container">
            <div class="banner-inner">
                <h2 class="banner-title-product">Liên Hệ</h2>
            </div>
        </div>
    </section>
    <div class="wrapper" style="font-family: 'Arial, Helvetica, sans-serif' !important;">
        <section class="mb-4">
            <h2 class="h1-responsive font-weight-bold text-center my-4">Thông tin liên hệ</h2>
            <p class="text-center w-responsive mx-auto mb-5">Cảm ơn bạn đã quan tâm đến hệ thống website của chúng tôi. Nếu bạn có thắc mắc vui lòng liên hệ thông tin được đính kèm ở phía dưới. Trân trọng cảm ơn !</p>
            <div class="row">
                <div class="col-md-9 mb-md-0 mb-5">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3909.2211415435518!2d107.81478801528688!3d11.53598814786698!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3173f7b6aac8462d%3A0xb3836c25bece7b7e!2zMjUwIFRy4bqnbiBQaMO6LCBM4buZYyBTxqFuLCBC4bqjbyBM4buZYywgTMOibSDEkOG7k25nLCBWaeG7h3QgTmFt!5e0!3m2!1svi!2s!4v1600169781139!5m2!1svi!2s" width="100%" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                </div>
                <div class="col-md-3 text-center">
                    <ul class="list-unstyled mb-0">
                        <li><i class="fa-contact fas fa-map-marker-alt fa-2x"></i>
                            <p>250 Trần Phú, P.Lộc Sơn, Thành Phố Bảo Lộc, Tỉnh Lâm Đồng</p>
                        </li>
                        <li><i class="fa-contact fas fa-phone mt-4 fa-2x"></i>
                            <p>0898.987.567 (Zalo)</p>
                        </li>
                        <li><i class="fa-contact fab fa-facebook-f mt-4 fa-2x"></i>
                            <p><a style="color:#212529"href="https://www.facebook.com/quangvinh.coffee/" target="_blank">Quang Vinh - Coffee</a></p>
                        </li>
                    </ul>
                </div>
            </div>
        </section>
    </div>
    <button class="back-to-top">
        <i class="fal fa-long-arrow-right"></i>
    </button>
@endsection
