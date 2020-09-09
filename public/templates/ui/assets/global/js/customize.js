$('document').ready(function () {
    $('select[id="customer_shipping_province"]').on('change', function (e) {
        if (this.value == '') {
            city_id = 0;
        } else {
            city_id = this.value;
        }

        let price = $(this).find('option:selected').data("price");

        $.ajax({
            url: 'districts?id=' + city_id,
            method: 'get',
            dataType: 'JSON',
            beforeSend: function () {
                $('.order-checkout__loading--box').addClass('show')
            },
            complete: function () {
                $('.order-checkout__loading--box').removeClass('show')
            },
            success: function (json) {
                html =
                    '<option selected="selected" value="">Chọn quận / huyện</option>';

                for (i = 0; i < json.length; i++) {
                    html += '<option value="' + json[i]['id'] + '"';
                    html += '>' + json[i]['name'] + '</option>';
                }

                $('#shipping-price-hide').val(price);
                $('select[name=\'district_id\']').html(html);

                handleCurrency($('#weight-total-hide').val(), $(
                    '#shipping-price-hide').val(), $('#total-hide').val());
            },
            error: function (xhr, ajaxOptions, thrownError) {
                alert(
                    "Xảy ra lỗi. Vui lòng liên hệ bộ phận trực tuyến để được hỗ trợ")
            }
        });
    });

    function handleCurrency(weight_total, shipping_price, temporary_amount) {
        if (weight_total >= 3000) {
            shipping_price = 0
        } else {
            shipping_price = shipping_price;
        }

        document.getElementById("shipping-price").innerHTML =
            `${new Intl.NumberFormat('de-DE', { style: 'currency', currency: 'VND' }).format(shipping_price)}`;
        document.getElementById("shipping-price-2").innerHTML =
            `${new Intl.NumberFormat('de-DE', { style: 'currency', currency: 'VND' }).format(shipping_price)}`;
        total = parseInt(shipping_price) + parseInt(temporary_amount);
        document.getElementById("total-order").innerHTML =
            `${new Intl.NumberFormat('de-DE', { style: 'currency', currency: 'VND' }).format(total)}`;
    }

    handleCurrency($('#weight-total-hide').val(), $('#shipping-price-hide').val(), $('#total-hide').val());

    var toggleShowOrderSummary = false;
    $('body')
        .on('click', '.order-summary-toggle', function () {
            toggleShowOrderSummary = !toggleShowOrderSummary;

            if (toggleShowOrderSummary) {
                $('.order-summary-toggle')
                    .removeClass('order-summary-toggle-hide')
                    .addClass('order-summary-toggle-show');

                $('.sidebar:not(".sidebar-second") .sidebar-content .order-summary')
                    .removeClass('order-summary-is-collapsed')
                    .addClass('order-summary-is-expanded');

                $('.sidebar.sidebar-second .sidebar-content .order-summary')
                    .removeClass('order-summary-is-expanded')
                    .addClass('order-summary-is-collapsed');
            } else {
                $('.order-summary-toggle')
                    .removeClass('order-summary-toggle-show')
                    .addClass('order-summary-toggle-hide');

                $('.sidebar:not(".sidebar-second") .sidebar-content .order-summary')
                    .removeClass('order-summary-is-expanded')
                    .addClass('order-summary-is-collapsed');

                $('.sidebar.sidebar-second .sidebar-content .order-summary')
                    .removeClass('order-summary-is-collapsed')
                    .addClass('order-summary-is-expanded');
            }
        });
})