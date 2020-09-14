<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en" class="flexbox">

<head>
    <title>Thanh toán đơn hàng | Quang Vinh - Coffee</title>
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <meta name="description" content="Thanh toán đơn hàng | Quang Vinh - Coffee" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=2, user-scalable=no">
    <link href='{{ asset('templates/ui/') }}/assets/global/css/checkouts.css' rel='stylesheet' type='text/css'
        media='all' />
    <link rel="icon" href="{{ asset('templates/admin/') }}/assets/img/brand/logo.png" type="image/png">
    <link href='{{ asset('templates/ui/') }}/assets/global/css/customize.css' rel='stylesheet' type='text/css'
        media='all' />
    <link rel="stylesheet" href="{{ asset('templates/admin/') }}/assets/vendor/sweetalert2/dist/sweetalert2.min.css">

    <script src='{{ asset('templates/ui/') }}/assets/global/js/jquery.min.js' type='text/javascript'></script>
    <script src='{{ asset('templates/ui/') }}/assets/global/js/jquery.validate.js' type='text/javascript'></script>
    <script src="{{ asset('templates/ui/') }}/assets/global/js/jquery-3.2.1.min.js"></script>
    <script src="{{ asset('templates/ui/') }}/assets/global/js/jquery.validate.min.js" type="text/javascript">
    </script>
</head>

<body>
    <div class="banner">
        <div class="wrap">
            <a href="/" class="logo">
                <h1 class="logo-text">Quang Vinh - Coffee</h1>
            </a>
        </div>
    </div>
    <button class="order-summary-toggle order-summary-toggle-hide">
        <div class="wrap">
            <div class="order-summary-toggle-inner">
                <div class="order-summary-toggle-icon-wrapper">
                    <svg width="20" height="19" xmlns="http://www.w3.org/2000/svg" class="order-summary-toggle-icon">
                        <path
                            d="M17.178 13.088H5.453c-.454 0-.91-.364-.91-.818L3.727 1.818H0V0h4.544c.455 0 .91.364.91.818l.09 1.272h13.45c.274 0 .547.09.73.364.18.182.27.454.18.727l-1.817 9.18c-.09.455-.455.728-.91.728zM6.27 11.27h10.09l1.454-7.362H5.634l.637 7.362zm.092 7.715c1.004 0 1.818-.813 1.818-1.817s-.814-1.818-1.818-1.818-1.818.814-1.818 1.818.814 1.817 1.818 1.817zm9.18 0c1.004 0 1.817-.813 1.817-1.817s-.814-1.818-1.818-1.818-1.818.814-1.818 1.818.814 1.817 1.818 1.817z">
                        </path>
                    </svg>
                </div>
                <div class="order-summary-toggle-text order-summary-toggle-text-show">
                    <span>Hiển thị thông tin đơn hàng</span>
                    <svg width="11" height="6" xmlns="http://www.w3.org/2000/svg" class="order-summary-toggle-dropdown"
                        fill="#000">
                        <path
                            d="M.504 1.813l4.358 3.845.496.438.496-.438 4.642-4.096L9.504.438 4.862 4.534h.992L1.496.69.504 1.812z">
                        </path>
                    </svg>
                </div>
                <div class="order-summary-toggle-text order-summary-toggle-text-hide">
                    <span>Ẩn thông tin đơn hàng</span>
                    <svg width="11" height="7" xmlns="http://www.w3.org/2000/svg" class="order-summary-toggle-dropdown"
                        fill="#000">
                        <path
                            d="M6.138.876L5.642.438l-.496.438L.504 4.972l.992 1.124L6.138 2l-.496.436 3.862 3.408.992-1.122L6.138.876z">
                        </path>
                    </svg>
                </div>
                <div class="order-summary-toggle-total-recap" data-checkout-payment-due-target="53800000">
                    <span class="total-recap-final-price">538,000₫</span>
                </div>
            </div>
        </div>
    </button>
    <div class="content">
        <div class="wrap">
            <div class="sidebar">
                <div class="sidebar-content">
                    <div class="order-summary order-summary-is-collapsed">
                        <div class="order-summary-sections">
                            <div class="order-summary-section order-summary-section-product-list"
                                data-order-summary-section="line-items">
                                <table class="product-table">
                                    <tbody>
                                        @foreach (Cart::content()->toArray() as $key => $value)
                                            <tr class="product" data-product-id="{{ $value['id'] }}"
                                                data-variant-id="{{ $key }}">
                                                <td class="product-image">
                                                    <div class="product-thumbnail">
                                                        <div class="product-thumbnail-wrapper">
                                                            <img class="product-thumbnail-image"
                                                                alt="{{ mb_strtoupper($value['name']) }}"
                                                                src="{{ getImage($value['options']['image'], 'products') }}" />
                                                        </div>
                                                        <span class="product-thumbnail-quantity"
                                                            aria-hidden="true">{{ $value['qty'] }}</span>
                                                    </div>
                                                </td>
                                                <td class="product-description">
                                                    <span
                                                        class="product-description-name order-summary-emphasis">{{ mb_strtoupper($value['name']) }}</span>
                                                    <span
                                                        class="product-description-variant order-summary-small-text">{{ $value['options']['shape'] == 1 ? 'Bột' : 'Hạt' }}</span>
                                                </td>
                                                <td class="product-price">
                                                    <span
                                                        class="order-summary-emphasis">{{ number_format($value['subtotal']) }}
                                                        ₫</span>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div class="order-summary-section order-summary-section-total-lines payment-lines"
                                data-order-summary-section="payment-lines">
                                <table class="total-line-table">
                                    <thead>
                                        <tr>
                                            <th scope="col"><span class="visually">Mô tả</span></th>
                                            <th scope="col"><span class="visually">Giá</span></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr class="total-line total-line-subtotal">
                                            <td class="total-line-name">Tổng trọng lượng (<span
                                                    class="total-line-name-weight">Trên 3kg FreeShip</span>)</td>
                                            <td class="total-line-weight">
                                                <span
                                                    class="order-summary-emphasis">{{ Cart::weight(0, null, '') / 1000 }}
                                                    kg</span>
                                            </td>
                                        </tr>
                                        <tr class="total-line total-line-subtotal">
                                            <td class="total-line-name">Tạm tính</td>
                                            <td class="total-line-price">
                                                <span class="order-summary-emphasis"
                                                    data-checkout-subtotal-price-target="{{ Cart::priceTotal(0, '', ',') }}">{{ Cart::priceTotal(0, '', ',') }}
                                                    ₫</span>
                                                <input type="hidden" id="total-hide"
                                                    value="{{ Cart::priceTotal(0, '', '') }}">
                                            </td>
                                        </tr>
                                        <tr class="total-line total-line-shipping">
                                            <td class="total-line-name">Phí vận chuyển</td>
                                            <td class="total-line-price">
                                                <span class="order-summary-emphasis" id="shipping-price"></span>
                                                <input type="hidden" id="shipping-price-hide" value="0">
                                                <input type="hidden" id="weight-total-hide"
                                                    value="{{ Cart::weight(0, null, '') }}">
                                            </td>
                                        </tr>
                                    </tbody>
                                    <tfoot class="total-line-table-footer">
                                        <tr class="total-line">
                                            <td class="total-line-name payment-due-label">
                                                <span class="payment-due-label-total">Tổng cộng</span>
                                            </td>
                                            <td class="total-line-name payment-due">
                                                <span class="payment-due-currency">VND</span>
                                                <span class="payment-due-price" id="total-order"></span>
                                            </td>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="main">
                <div class="main-header">
                    <a href="/" class="logo">
                        <h1 class="logo-text">Quang Vinh - Coffee</h1>
                    </a>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="{{ route('ui.cart.index') }}">Giỏ hàng</a>
                        </li>
                        <li class="breadcrumb-item breadcrumb-item-current">
                            Thông tin giao hàng
                        </li>
                    </ul>
                </div>
                <div class="main-content">
                    <div class="step">
                        <form data-url="{{route('ui.cart.checkout')}}" id="form_discount_add" accept-charset="UTF-8">
                            <div class="step-sections steps-onepage" step="1">
                                <div class="section">
                                    <div class="section-header">
                                        <h2 class="section-title">Thông tin giao hàng</h2>
                                    </div>
                                    <div class="section-content section-customer-information ">
                                        <div class="fieldset">
                                            <div class="field ">
                                                <div class="field-input-wrapper">
                                                    <label class="field-label" for="username">Họ và
                                                        tên</label>
                                                    <input autocomplete="off" placeholder="Họ và tên" autocapitalize="off"
                                                        spellcheck="false" class="field-input" size="30" type="text"
                                                        id="username" name="username" />
                                                </div>
                                            </div>
                                            <div class="field  field-two-thirds">
                                                <div class="field-input-wrapper">
                                                    <label class="field-label" for="email">Email</label>
                                                    <input autocomplete="off" placeholder="Email" autocapitalize="off" spellcheck="false"
                                                        class="field-input" size="30" type="email" id="email"
                                                        name="email" />
                                                </div>
                                            </div>
                                            <div class="field field-required field-third">
                                                <div class="field-input-wrapper">
                                                    <label class="field-label" for="phone">Số điện
                                                        thoại</label>
                                                    <input autocomplete="off" placeholder="Số điện thoại" autocapitalize="off"
                                                        spellcheck="false" class="field-input" size="30" maxlength="11"
                                                        type="tel" id="phone" name="phone" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="section-content">
                                        <div class="fieldset">
                                            <div class="content-box mt0">
                                                <div class="radio-wrapper content-box-row">
                                                    <label class="radio-label">
                                                        <div class="radio-input">
                                                            <input type="radio" id="customer_pick_at_location_false"
                                                                class="input-radio" value="false" checked>
                                                        </div>
                                                        <span class="radio-label-primary">Giao tận nơi</span>
                                                    </label>
                                                </div>
                                                <div id="form_update_location_customer_shipping"
                                                    class="order-checkout__loading radio-wrapper content-box-row content-box-row-padding content-box-row-secondary "
                                                    for="customer_pick_at_location_false">
                                                    <div class="order-checkout__loading--box">
                                                        <div class="order-checkout__loading--circle"></div>
                                                    </div>
                                                    <div class="field field-show-floating-label  field-half ">
                                                        <div class="field-input-wrapper field-input-wrapper-select">
                                                            <label class="field-label"
                                                                for="customer_shipping_province">Tỉnh / thành </label>
                                                            <select class="field-input" id="customer_shipping_province"
                                                                name="customer_shipping_province" size='1'>
                                                                <option data-price="0" value=""> Chọn tỉnh / thành
                                                                </option>
                                                                @foreach ($dataCity as $value)
                                                                    <option data-price="{{ $value['price'] }}"
                                                                        value="{{ $value['id'] }}">{{ $value['name'] }}
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="field field-show-floating-label  field-half ">
                                                        <div class="field-input-wrapper field-input-wrapper-select">
                                                            <label class="field-label"
                                                                for="customer_shipping_district">Quận
                                                                / huyện</label>
                                                            <select class="field-input" id="customer_shipping_district"
                                                                name="district_id">
                                                                <option data-code="" value="">Chọn quận / huyện
                                                                </option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div id="div_location_country_not_vietnam"
                                                        class="section-customer-information ">
                                                        <div class="field field-two-thirds"
                                                            style="width: 100% !important;">
                                                            <div class="field-input-wrapper">
                                                                <label class="field-label" for="address">Địa
                                                                    chỉ</label>
                                                                <input placeholder="Địa chỉ" autocapitalize="off"
                                                                    spellcheck="false" class="field-input" size="30"
                                                                    type="text" id="address" name="address" value="" />
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="change_pick_location_or_shipping">
                                        <div class="inventory_location">
                                        </div>
                                        <div id="section-shipping-rate">
                                            <div class="section-header">
                                                <h2 class="section-title">Phương thức vận chuyển</h2>
                                            </div>
                                            <div class="section-content">
                                                <div class="content-box">
                                                    <div class="content-box-row">
                                                        <div class="radio-wrapper">
                                                            <label class="radio-label">
                                                                <div class="radio-input">
                                                                    <input class="input-radio" type="radio" checked />
                                                                </div>
                                                                <span class="radio-label-primary">Giao hàng tận
                                                                    nơi</span>
                                                                <span class="radio-accessory content-box-emphasis"
                                                                    id="shipping-price-2"></span>
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div id="section-payment-method" class="section">
                                            <div class="section-header">
                                                <h2 class="section-title">Phương thức thanh toán</h2>
                                            </div>
                                            <div class="section-content">
                                                <div class="content-box">
                                                    <div class="radio-wrapper content-box-row">
                                                        <label class="radio-label">
                                                            <div class="radio-input">
                                                                <input class="input-radio" type="radio" checked />
                                                            </div>
                                                            <span class="radio-label-primary">Thanh toán khi giao hàng
                                                                (COD)</span>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div id="section-notes" class="section">
                                            <div class="section-header">
                                                <h2 class="section-title">Ghi chú (nếu có)</h2>
                                            </div>
                                            <div class="section-content">
                                                <div class="field   ">
                                                    <div class="field-input-wrapper">
                                                        <textarea style="width: 100%; box-shadow: rgb(217, 217, 217) 0px 0px 0px 1px; transition: all 0.2s ease-out 0s; border-radius: 5px;" name="message_user" id="message_user" cols="60" rows="5"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="step-footer">
                                <button type="submit" class="step-footer-continue-btn btn">
                                    <span class="btn-content">Hoàn tất đơn hàng</span>
                                    <i class="btn-spinner icon icon-button-spinner"></i>
                                </button>
                                <a class="step-footer-previous-link" href="{{ route('ui.cart.index') }}">
                                    <svg class="previous-link-icon icon-chevron icon" xmlns="http://www.w3.org/2000/svg"
                                        width="6.7" height="11.3" viewBox="0 0 6.7 11.3">
                                        <path d="M6.7 1.1l-1-1.1-4.6 4.6-1.1 1.1 1.1 1 4.6 4.6 1-1-4.6-4.6z"></path>
                                    </svg>
                                    Giỏ hàng
                                </a>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="main-footer">
                </div>
            </div>
        </div>
    </div>
    <script src='{{ asset('templates/ui/') }}/assets/global/js/customize.js' type='text/javascript'></script>
    <script src="{{ asset('templates/admin/') }}/assets/vendor/sweetalert2/dist/sweetalert2.min.js"></script>
</body>

</html>
