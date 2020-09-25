@extends('ui.common.master')
@section('seo')
    <title>Trang Chủ | Quang Vinh - Coffee</title>
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
    <meta content="Trang Chủ | Quang Vinh - Coffee" itemprop="headline" property="og:title" />
    <meta content="Rang xay nguyên chất. Không tẩm ướt, không hóa chất. Nguồn nguyên liệu có xuất xứ rõ ràng, chất lượng. Đặt hàng mới bắt đầu rang giữ được hương vị thơm ngon đặc trưng. Đảm bảo chế biến sạch, đạt vệ sịnh an toàn thực phẩm" itemprop="description" property="og:description" />
    <meta property="og:url" content="{{ url()->full() }}">
    <meta property="twitter:title" content="Trang Chủ | Quang Vinh - Coffee">
    <meta property="twitter:description" content="Rang xay nguyên chất. Không tẩm ướt, không hóa chất. Nguồn nguyên liệu có xuất xứ rõ ràng, chất lượng. Đặt hàng mới bắt đầu rang giữ được hương vị thơm ngon đặc trưng. Đảm bảo chế biến sạch, đạt vệ sịnh an toàn thực phẩm">
    <meta property="twitter:image" content="{{ getImage(getImageDatabase(12)['image'], 'banners') }}">
@endsection
@section('content')
    @include('ui.common.info')
    <section>
        <div class="single-item">
            @if($agent->isMobile())
            <div>
                <div class="banner-slider" style="background-image: url({{ getImage(getImageDatabase(15)['image'], 'banners') }});"></div>
            </div>
            @elseif($agent->isTablet())
            <div>
                <div class="banner-slider" style="background-image: url({{ getImage(getImageDatabase(16)['image'], 'banners') }});"></div>
            </div>
            @else
            <div>
                <div class="banner-slider" style="background-image: url({{ getImage(getImageDatabase(1)['image'], 'banners') }});"></div>
            </div>
            @endif

            @if($agent->isMobile())
            <div>
                <div class="banner-slider" style="background-image: url({{ getImage(getImageDatabase(17)['image'], 'banners') }});"></div>
            </div>
            @elseif($agent->isTablet())
            <div>
                <div class="banner-slider" style="background-image: url({{ getImage(getImageDatabase(18)['image'], 'banners') }});"></div>
            </div>
            @else
            <div>
                <div class="banner-slider" style="background-image: url({{ getImage(getImageDatabase(2)['image'], 'banners') }});"></div>
            </div>
            @endif

            @if($agent->isMobile())
            <div>
                <div class="banner-slider" style="background-image: url({{ getImage(getImageDatabase(19)['image'], 'banners') }});"></div>
            </div>
            @elseif($agent->isTablet())
            <div>
                <div class="banner-slider" style="background-image: url({{ getImage(getImageDatabase(20)['image'], 'banners') }});"></div>
            </div>
            @else
            <div>
                <div class="banner-slider" style="background-image: url({{ getImage(getImageDatabase(3)['image'], 'banners') }});"></div>
            </div>
            @endif
        </div>
    </section>

    <div id="products"  class="wrapper">
        <div class="title">
            <h4 class="title-main">SẢN PHẨM MỚI NHẤT</h4>
            <div class="title-separator"></div>
        </div>
        @include('ui.index.product')
    </div>

    <div class="background-home">
        <div class="background-image"  style="background-image: url({{ getImage(getImageDatabase(6)['image'], 'banners') }});"></div>
    </div>

    <div id="news" class="wrapper">
        <div class="title">
            <h4 class="title-main">TIN MỚI NHẤT</h4>
            <div class="title-separator"></div>
        </div>

        @include('ui.index.news')
    </div>

    @include('ui.common.plugin')
@endsection
