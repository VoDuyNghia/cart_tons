<!DOCTYPE html>
<html lang="en">

<head>
    @include('ui.common.head')

</head>

<body>
    @include('ui.common.header')
    <main style="position: relative;">
        <div id="button-cart">
            <a class="menu-bar__icon-cart" href="{{ route('ui.cart.index') }}">
                <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                <span class="menu-bar__cart-amount" id="cart-total-button">{{ Cart::content()->count() }}</span>
            </a>
        </div>
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
