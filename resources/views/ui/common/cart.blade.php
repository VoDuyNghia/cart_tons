<ul class="cart-info">
    @forelse(Cart::content()->toArray() as $key => $value)
    <li class="menu-bar__cart-item">
        <a class="menu-bar__cart-img" href="#">
            <img width="100%" src="{{ getImage($value['options']['image'], 'products') }}" alt="{{ $value['name'] }}" />
        </a>
        <div class="menu-bar__cart-info">
            <div>
                <a href="#" class="menu-bar__cart-name">{{ $value['name'] }}</a>
                <p class="menu-bar__cart-quantity">
                    Số lượng: <span>{{ $value['qty'] }}</span> <br/><br/>
                    Loại: {{ $value['options']['shape'] == 1 ? "Bột" : "Hạt" }}
                </p>
                <a href="#" class="menu-bar__cart-price">{{ number_format($value['price']) }} đ</a>
            </div>
            <button type="button" class="menu-bar__cart-close" onclick="cart.delete('{{ $key }}')">
                <i class="fal fa-times"></i>
            </button>
        </div>
    </li>
    @empty
    <li style="justify-content: center;" i class="menu-bar__cart-item">
        <p> Giỏ hàng đang trống ! </p>
    </li>
    @endforelse
</ul>