<div class="product-wrapper">
    <div class="multiple-items">
        @foreach($dataProduct as $value)
        <div class="product">
            <div class="product__img-wrapper">
                <a href="javascript:void(0)" class="product__img"><img width="100%"
                        src="{{ getImage($value['image'], 'products') }}"
                        alt="{{ $value['name'] }}" />
                </a>
                <div class="product__add-to-cart">
                    <button id="product-{{ $value['id'] }}" class="product__add-to-cart-button" onclick="cart.add('{{ $value['id']}}', 1)">
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
        @endforeach
    </div>
</div>