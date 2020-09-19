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
                    '<option selected="selected" value="">Chọn Quận/Huyện</option>';

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

    $('select[id="customer_shipping_district"]').on('change', function (e) {
        if (this.value == '') {
            district_id = 0;
        } else {
            district_id = this.value;
        }

        $.ajax({
            url: 'wards?id=' + district_id,
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
                    '<option selected="selected" value="">Chọn Phường xã/Thị trấn</option>';

                for (i = 0; i < json.length; i++) {
                    html += '<option value="' + json[i]['id'] + '"';
                    html += '>' + json[i]['name'] + '</option>';
                }

                $('select[name=\'ward_id\']').html(html);
            },
            error: function (xhr, ajaxOptions, thrownError) {
                alert("Xảy ra lỗi. Vui lòng liên hệ bộ phận trực tuyến để được hỗ trợ")
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
    $('body').on('click', '.order-summary-toggle', function () {
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

    $().ready(function () {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $("#form_discount_add").validate({
            onfocusout: false,
            onkeyup: false,
            onclick: false,
            rules: {
                "username": {
                    required: true,
                    minlength: 5,
                    maxlength: 100
                },
                "email": {
                    email: true,
                    maxlength: 100
                },
                "phone": {
                    required: true,
                    minlength: 10,
                    maxlength: 10,
                    number: true
                },
                "address": {
                    required: true,
                    minlength: 10,
                    maxlength: 255
                },
                'customer_shipping_province': {
                    required: true,
                },
                'district_id': {
                    required: true
                },
                'ward_id': {
                    required: true
                }
            },
            messages: {
                "username": {
                    required: "Bắt buộc nhập họ và tên",
                    minlength: "Hãy nhập ít nhất 5 ký tự",
                    maxlength: "Hãy nhập tối thiểu 100 ký tự"
                },
                "email": {
                    email: "Hãy nhập đúng định dạng email",
                    maxlength: "Hãy nhập tối thiểu 100 ký tự"
                },
                "phone": {
                    required: "Bắt buộc nhập số điện thoại",
                    minlength: "Số điện thoại bao gồm 10 chữ số",
                    maxlength: "Số điện thoại bao gồm 10 chữ số",
                    number: "Hãy nhập định dạng số",
                },
                "customer_shipping_province": {
                    required: "Hãy chọn ít nhất 1 tỉnh thành",
                },
                "district_id": {
                    required: "Hãy chọn ít nhất 1 Quận/Huyện",
                },
                "ward_id": {
                    required: "Hãy chọn ít nhất 1 Phường xã/Thị trấn",
                },
                "address": {
                    required: "Bắt buộc nhập địa chỉ",
                    minlength: "Hãy nhập ít nhất 10 ký tự",
                    maxlength: "Hãy nhập tối đa 255 ký tự",
                }
            },
            submitHandler: function (form) {
                Swal.fire({
                    title: 'Hãy kiểm tra thật kỹ trước khi bấm xác nhận!',
                    text: "Bạn sẽ không thể hoàn tác tác vụ này sau khi bấm xác nhận!",
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Xác nhận',
                    cancelButtonText: 'Hủy bỏ'
                }).then((result) => {
                    actionURL = $(this).data('url');
                    formData = new FormData(form);

                    if (result.value) {
                        $.ajax({
                            type: 'POST',
                            url: '/checkout',
                            data: formData,
                            beforeSend: function () {
                                Swal.showLoading();
                            },
                            success: function (data) {
                                $("#form_discount_add").load(location.href + " #form_discount_add>*", "");
                                setTimeout(function () { window.location.href = "/success.html";}, 2000);
                            },
                            error: function (reject) {
                            },
                            complete: function ($data) {
                                var message = checkStatus($data.status,
                                    $data.responseJSON.message);
                                Swal.disableLoading();
                                Swal.fire(
                                    message['notice'],
                                    message['content'],
                                    message['status']
                                );
                                Swal.hideLoading();
                            },
                            cache: false,
                            contentType: false,
                            processData: false,
                        });
                    }
                });
            }
        });
    });


    function checkStatus(httpCode, message = '') {
        var data = [];
        switch (httpCode) {
            case 400:
                data['notice'] = "Thất bại";
                data['status'] = "error";
                data['content'] = message;
                break;
            case 422:
                data['notice'] = "Thất bại";
                data['status'] = "error";
                data['content'] = "Vui lòng kiểm tra dữ liệu đầu vào!";
                break;
            case 500:
                data['notice'] = "Thất bại";
                data['status'] = "error";
                data['content'] = "Lỗi máy chủ!";
                break;
            case 200:
                data['notice'] = "Thành công";
                data['status'] = "success";
                data['content'] = "Thao tác thự hiện thành công";
                break;
            default:
                break;
        }
    
        return data;
    }
    
})