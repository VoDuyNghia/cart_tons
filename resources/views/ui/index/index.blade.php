@extends('ui.common.master')
@section('seo')
    <title>Quang Vinh - Coffee</title>
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
    <meta property="og:image" itemprop="thumbnailUrl" content="{{ asset('images/') }}/logo.png" />
    <meta property="og:image:width" content="800" />
    <meta property="og:image:height" content="500" />
    <meta content="Quang Vinh - Coffee" itemprop="headline" property="og:title" />
    <meta content="Rang xay nguyên chất. Không tẩm ướt, không hóa chất. Nguồn nguyên liệu có xuất xứ rõ ràng, chất lượng. Đặt hàng mới bắt đầu rang giữ được hương vị thơm ngon đặc trưng. Đảm bảo chế biến sạch, đạt vệ sịnh an toàn thực phẩm" itemprop="description" property="og:description" />
    <meta property="og:url" content="{{ url()->full() }}">
    <meta property="twitter:title" content="Quang Vinh - Coffee">
    <meta property="twitter:description" content="Rang xay nguyên chất. Không tẩm ướt, không hóa chất. Nguồn nguyên liệu có xuất xứ rõ ràng, chất lượng. Đặt hàng mới bắt đầu rang giữ được hương vị thơm ngon đặc trưng. Đảm bảo chế biến sạch, đạt vệ sịnh an toàn thực phẩm">
    <meta property="twitter:image" content="{{ asset('images/') }}/logo.png">
@endsection
@section('content')
    @include('ui.common.info')
    <section>
        <div class="single-item">
            <div>
                <div class="banner-slider" style="
                        background-image: url(https://barista.qodeinteractive.com/wp-content/uploads/2017/01/home-5-slider-img-1.jpg);
                    "></div>
            </div>
            <div>
                <div class="banner-slider" style="
                        background-image: url(https://barista.qodeinteractive.com/wp-content/uploads/2017/02/home-5-slider-img-4.jpg);
                    "></div>
            </div>
            <div>
                <div class="banner-slider" style="
                        background-image: url(https://barista.qodeinteractive.com/wp-content/uploads/2017/01/home-5-slider-img-3.jpg);
                    "></div>
            </div>
        </div>
    </section>

    <div class="wrapper">
        <div class="banner">
            <div href="#" class="banner__item">
                <a href="#">
                    <img width="100%"
                        src="https://barista.qodeinteractive.com/wp-content/uploads/2017/01/h-5-baner-img-1.jpg" alt="dd" />
                </a>
                <a href="#" class="banner__read-more">
                    <span>READ MORE</span>
                    <i class="fal fa-long-arrow-right"></i>
                </a>
            </div>
            <div href="#" class="banner__item">
                <a href="#">
                    <img width="100%"
                        src="https://barista.qodeinteractive.com/wp-content/uploads/2017/01/home-5-baner-img-2.jpg"
                        alt="dd" />
                </a>
                <a href="#" class="banner__read-more">
                    <span>READ MORE</span>
                    <i class="fal fa-long-arrow-right"></i>
                </a>
            </div>
        </div>
    </div>

    <div id="products"  class="wrapper">
        <div class="title">
            <p class="title-sub">What Happens Here</p>
            <h4 class="title-main">COFFEE HOUSE MERCHANDISE</h4>
            <div class="title-separator"></div>
        </div>
        @include('ui.index.product')
    </div>

    <div class="wrapper">
        <div class="banner-sale">
            <div>
                <button>READ MORE</button>
            </div>
        </div>
    </div>

    <div id="news" class="wrapper">
        <div class="title">
            <p class="title-sub">What Happens Here</p>
            <h4 class="title-main">MERCHANDISE NEWS</h4>
            <div class="title-separator"></div>
        </div>

        @include('ui.index.news')
    </div>

    <button class="back-to-top">
        <i class="fal fa-long-arrow-right"></i>
    </button>
@endsection
