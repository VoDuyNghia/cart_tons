@extends('ui.common.master')
@section('seo')
    <title>{{ $dataNews['name'] }} | Quang Vinh - Coffee</title>
    <meta name="description" content="{{ $dataNews['detail'] }}">
    <meta name="keywords" content="{{ $dataNews['detail'] }}">
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
    <meta property="og:image" itemprop="thumbnailUrl" content="{{ getImage($dataNews['image'], 'news') }}" />
    <meta property="og:image:width" content="800" />
    <meta property="og:image:height" content="500" />
    <meta content="{{ $dataNews['name'] }} | Quang Vinh - Coffee" itemprop="headline" property="og:title" />
    <meta content="{{ $dataNews['detail'] }}" itemprop="description" property="og:description" />
    <meta property="og:url" content="{{ url()->full() }}">
    <meta property="twitter:title" content="{{ $dataNews['name'] }} | Quang Vinh - Coffee">
    <meta property="twitter:description" content="{{ $dataNews['name'] }}">
    <meta property="twitter:image" content="{{ getImage($dataNews['image'], 'news') }}">
    @section('mycss')
    <link rel="stylesheet" href="{{ asset('templates/ui/') }}/assets/styles/bootstrap.min.css" />
    @endsection
@endsection
@section('content')
    @include('ui.common.info')

    <section>
        <div class="menu-right">
            <div class="menu-right__close">
                <button class="menu-right__close-icon" id="closeMenuRight">
                    <i class="fa fa-times" aria-hidden="true"></i>
                </button>
            </div>
            <div class="menu-right__img">
                <a href="https://barista.qodeinteractive.com/">
                    <img height="100%"
                        src="https://barista.qodeinteractive.com/wp-content/uploads/2017/02/sidearea-logo.png"
                        alt="a" />
                </a>
            </div>
            <div class="menu-right__text">
                Alienum phaedrum torquatos nec eu, vis detraxit periculis ex, nihil
                expetendis in mei. Mei an pericula euripidis, hinc partem.
            </div>
            <div class="menu-right__social">
                <a class="menu-right__social-icon" href="#">
                    <i class="fab fa-instagram"></i>
                </a>
                <a class="menu-right__social-icon" href="#">
                    <i class="fab fa-facebook-f"></i>
                </a>
                <a class="menu-right__social-icon" href="#">
                    <i class="fab fa-twitter"></i>
                </a>
                <a class="menu-right__social-icon" href="#">
                    <i class="fab fa-tumblr"></i>
                </a>
            </div>
        </div>
        <div class="menu-right__backdrop" id="backdropMenuRight"></div>
    </section>

    <section id="banner" class="banner-news"
        style="background-image: url(https://barista.qodeinteractive.com/wp-content/uploads/2016/02/shop-title-area.jpg);">
        <div class="container header-news">
            <div class="banner-inner">
                <h2 class="banner-title">11/9/2020 Giá cà phê tăng trước lo ngại thời tiết cực đoan</h2>
            </div>
        </div>
    </section>

    <div class="wrapper">
        <section class="section-news">
            <div class="news_body">
                {!! $dataNews['description'] !!}
            </div>
        </section>
    </div>

    <button class="back-to-top">
        <i class="fal fa-long-arrow-right"></i>
    </button>
@endsection
