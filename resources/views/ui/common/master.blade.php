<!DOCTYPE html>
<html lang="en">

<head>
    @include('ui.common.head')

</head>

<body>
    <!-- Load Facebook SDK for JavaScript -->
    <div id="fb-root"></div>
    <script>
        window.fbAsyncInit = function() {
        FB.init({
            xfbml            : true,
            version          : 'v8.0'
        });
        };

        (function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = 'https://connect.facebook.net/vi_VN/sdk/xfbml.customerchat.js';
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>

    <!-- Your Chat Plugin code -->
    <div class="fb-customerchat" attribution=setup_tool page_id="101832394966734" theme_color="#956134" logged_in_greeting="Xin chào! Tôi có thể giúp gì cho bạn?" logged_out_greeting="Xin chào! Tôi có thể giúp gì cho bạn?"></div>

    @include('ui.common.header')
    <main style="position: relative;">
        <div id="button-cart">
            <a class="menu-bar__icon-cart" href="{{ route('ui.cart.index') }}">
                <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                <span class="menu-bar__cart-amount" id="cart-total-button">{{ Cart::content()->count() }}</span>
            </a><br/>
            <h4 class="product__name">
                <a href="{{ route('ui.cart.index') }}" tabindex="0">THANH TOÁN</a>
            </h4>
        </div>
    @yield("content")
    </main>

    @include('ui.common.footer')
    @include('ui.common.script')

    <!-- Facebook Pixel Code -->
    <script>
        !function(f,b,e,v,n,t,s)
        {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
        n.callMethod.apply(n,arguments):n.queue.push(arguments)};
        if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
        n.queue=[];t=b.createElement(e);t.async=!0;
        t.src=v;s=b.getElementsByTagName(e)[0];
        s.parentNode.insertBefore(t,s)}(window, document,'script',
        'https://connect.facebook.net/en_US/fbevents.js');
        fbq('init', '162707774959434');
        fbq('track', 'PageView');
    </script>
    <noscript><img height="1" width="1" style="display:none" src="https://www.facebook.com/tr?id=162707774959434&ev=PageView&noscript=1"/></noscript>
    <!-- End Facebook Pixel Code -->
    <div id="message-purchased" class="bounceInUp">
        <img id="message-purchased-img" src="">
        <p>
            <a style="text-u" id="message-purchased-link" href=""></a> 
            <span id="message-purchased-info"><strong></strong></span><small></small></p>
        <div id="notify-close"></div>
    </div>
</body>

</html>
