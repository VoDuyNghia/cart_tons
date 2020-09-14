<header>
    <div class="menu menu-wrapper">
        <button class="menu-icon__left" id="openMenuBarMobile">
            <i class="fa fa-bars" aria-hidden="true"></i>
        </button>
        <a href="{{ route('ui.index.index') }}" class="menu-logo">
            <img height="100%" src="https://barista.qodeinteractive.com/wp-content/uploads/2017/02/logo-1.png" alt="Quang Vinh - Coffee" />
        </a>
        <nav class="menu-bar">
            <ul class="menu-links">
                <li><a href="{{ route('ui.index.index') }}" class="{{ url()->full() == route('ui.index.index') ? 'active' : ''}}">Trang chủ</a></li>
                <li><a href="{{ url()->full() == route('ui.index.index') ? '#news' : route('ui.index.index')}}" class="{{ request()->is('products/*') ? 'active' : '' }}">Tin tức</a></li>
                <li><a href="{{ url()->full() == route('ui.index.index') ? '#products' : route('ui.index.index')}}" class="{{ request()->is('news/*') ? 'active' : '' }}">Sản phẩm</a></li>
                <li><a href="{{ route('ui.index.about_us') }}" class="{{ url()->full() == route('ui.index.about_us') ? 'active' : ''}}">Về chúng tôi</a></li>
                <li><a href="{{ route('ui.index.contact_us') }}" class="{{ url()->full() == route('ui.index.contact_us') ? 'active' : ''}}">Liên hệ</a></li>
                <li><a href="#">Shopee</a></li>
            </ul>
            <div>
                <div class="menu-bar__cart">
                    <a class="menu-bar__icon-cart" href="javascript:void(0)" class="icon__cart">
                        <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                        <span class="menu-bar__cart-amount" id="cart-total">{{ Cart::content()->count() }}</span>
                    </a>
                    <div class="menu-bar__cart-dropdown">
                        <div id="cart">
                            @include('ui.common.cart')
                        </div>
                        <p class="menu-bar__cart-total">
                            Tổng tiền: <span id="cart-amount" class="amount">{{ Cart::priceTotal('0', '0', ',') }} đ</span>
                        </p>
                        <div class="menu-bar__cart-btn">
                            <a href="{{ route('ui.cart.index') }}">XEM GIỎ HÀNG</a>
                            <a href="{{ route('ui.cart.checkout') }}">THANH TOÁN</a>
                        </div>
                    </div>
                </div>
                <span class="menu-bar__icon-menu" id="openMenuRight">
                    <i class="fa fa-bars" aria-hidden="true"></i>
                </span>
            </div>
        </nav>
    </div>

    <div class="menu-bar-mobile-wrapper">
        <nav class="menu-wrapper menu-bar-mobile">
            <ul>
                <li><a href="#">Trang chủ</a></li>
                <li><a href="{{ url()->full() == route('ui.index.index') ? '#news' : route('ui.index.index')}}">Tin tức</a></li>
                <li><a href="{{ url()->full() == route('ui.index.index') ? '#products' : route('ui.index.index')}}">Sản phẩm</a></li>
                <li><a href="{{ route('ui.index.about_us') }}">Về chúng tôi</a></li>
                <li><a href="{{ route('ui.index.contact_us') }}">Liên hệ</a></li>
                <li><a href="{{ route('ui.cart.index') }}">Giỏ hàng</a></li>
                <li><a href="#">Shopee</a></li>
            </ul>
        </nav>
    </div>
</header>
