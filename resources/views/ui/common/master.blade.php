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
    }(document, 'script', 'facebook-jssdk'));
    </script>
    <!-- Your Chat Plugin code -->
    <div class="fb-customerchat"
    attribution=setup_tool
    page_id="101832394966734"
    theme_color="#d4a88c"
    logged_in_greeting="Xin chào ! Cảm ơn bạn đã liên hệ. Chúng tôi sẽ sớm trả lời sua ít phút nữa."
    logged_out_greeting="Xin chào ! Cảm ơn bạn đã liên hệ. Chúng tôi sẽ sớm trả lời sua ít phút nữa.">
    </div>

    @include('ui.common.header')
    <main>
    @yield("content")

    </main>

    @include('ui.common.footer')
    @include('ui.common.script')

    <div id="message-purchased" class="bounceInUp">
        <img id="message-purchased-img" src="">
        <p>
            <a style="text-u" id="message-purchased-link" href=""></a> 
            <span id="message-purchased-info"><strong></strong></span><small></small></p>
        <div id="notify-close"></div>
    </div>
</body>

</html>
