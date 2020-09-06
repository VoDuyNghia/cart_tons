$(document).ready(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $('body').on('keyup', 'input[data-role="check"]', function () {
        $('.error-' + $(this).attr('name')).text('');
    })

    $('body').on('keyup', 'textarea[data-role="check"]', function () {
        $('.error-' + $(this).attr('name')).text('');
    })

    $('body').on('change', 'select[data-role="check"]', function () {
        $('.error-' + $(this).attr('name')).text('');
    });

    $('body').on('click', '#selectCustomer', function () {
        $('#error_user_id').text('');
    });

    $('body').on('submit', 'form#formAjax', function (e) {
        e.preventDefault();
        actionURL = $(this).data('url');
        actionEvent = $(this).data('event');
        actionURLLoad = $(this).data('load');
        formData = new FormData(this);

        if (actionEvent == 'earning_rule') {
            result = checkFormEarningRule(formData.get('limit_active'), formData.get('limit_limit'), formData.get('all_time_active'), formData.get('start_at'), formData.get('end_at'));

            if (result != true) {
                result;
                return false;
            }
        }

        if (actionEvent == 'campaign') {
            result = checkFormCampaign(formData.get('campaign_activity_all_time_active'), formData.get('campaign_activity_active_from'), formData.get('campaign_activity_active_to'));

            if (result != true) {
                result;
                return false;
            }
        }

        Swal.fire({
            title: "Bạn có chắc chắn muốn thực hiện thao tác này không? ",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Xác nhận',
            cancelButtonText: 'Hủy bỏ',
            text: "Mọi sai lầm đều phải trả giá. Hãy cân nhắc trước khi bấm xác nhận!",
        }).then((result) => {
            if (result.value) {
                $.ajax({
                    type: 'POST',
                    url: actionURL,
                    data: formData,
                    beforeSend: function () {
                        Swal.showLoading();
                    },
                    success: function (data) {
                        $("#formAjax").load(location.href + " #formAjax>*", "");
                        $('#datatable').DataTable().ajax.reload();
                        $("#modal-form").modal("hide");
                        $("#myModal").modal("hide");

                        // setTimeout(function () { window.location.replace(actionURLLoad); }, 1500);
                    },
                    error: function (reject) {
                        if (reject.status == 422) {
                            var error = $.parseJSON(reject.responseText);
                            $.each(error.errors, function (key, value) {
                                $('.error-' + key).text(value[0]);
                            })

                        }
                    },
                    complete: function ($data) {
                        var message = checkStatus($data.status, $data.responseJSON.message);
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
    });

    $('body').on('click', 'a[data-role="remove"]', function () {
        Swal.fire({
            title: $(this).data('text') + ' ' + $(this).data('name') + " ?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Xác nhận',
            cancelButtonText: 'Hủy bỏ',
            text: "Mọi sai lầm đều phải trả giá. Hãy cân nhắc trước khi bấm xác nhận!",
        }).then((result) => {
            if (result.value) {
                $.ajax({
                    url: $(this).data('url'),
                    type: 'DELETE',
                    success: function (result) {
                        $('#datatable').DataTable().ajax.reload();
                    },
                    error: function (result) {
                    },
                    complete: function ($data) {
                        var message = checkStatus($data.status);
                        Swal.disableLoading();
                        Swal.fire(
                            message['notice'],
                            message['content'],
                            message['status']
                        );
                        Swal.hideLoading();
                    },
                });
            }
        })
    });

    $('body').on('click', 'a[data-role="remove-transaction"]', function () {
        Swal.fire({
            title: 'Nhập lý do hủy giao dịch',
            input: 'textarea',
            inputAttributes: {
                autocapitalize: 'off'
            },
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Xác nhận',
            cancelButtonText: 'Hủy bỏ',
            showLoaderOnConfirm: true,
            text: "Giao dịch sau khi hủy bỏ sẽ không thể khôi phục. Cân nhắc trước khi bấm xác nhận!",
            preConfirm: (message) => {
                if (message == '') {
                    return Swal.showValidationMessage(
                        "Vui lòng nhập nội dung hủy bỏ"
                    )
                }

                $.ajax({
                    url: $(this).data('url') + `?msg=${message}`,
                    type: 'DELETE',
                    success: function (result) {
                        $('#datatable').DataTable().ajax.reload();
                    },
                    error: function (result) {
                    },
                    complete: function ($data) {
                        var message = checkStatus($data.status);
                        Swal.disableLoading();
                        Swal.fire(
                            message['notice'],
                            message['content'],
                            message['status']
                        );
                        Swal.hideLoading();
                    },
                });
            },
        })
    });

    $('body').on('click', 'a[data-role="transaction"]', function () {
        $.ajax({
            url: $(this).data('url'),
            type: 'get',
            beforeSend: function (jqXHR, options) {
            },
            success: function (result) {
                var html = '';
                for (var index in result) {
                    html += '<tr><td>' + index + '</td><td>' + result[index] + '</td></tr>';
                };

                $('#table_transaction tbody').html(html);
            },
            error: function (result) {
            },
            complete: function ($data) {
            },
        });
    });

    $('body').on('submit', 'form#uploadFile', function (e) {
        e.preventDefault();
        var file_data = $("#file")[0].files[0];

        if (file_data == undefined) {
            Swal.fire(
                "Thất bại",
                "Vui lòng không được để trống file",
                "error"
            );
            return false;
        }
        actionURL = $(this).data('url');
        formData = new FormData(this);
        $.ajax({
            url: actionURL,
            type: 'POST',
            data: formData,
            async: true,
            cache: false,
            contentType: false,
            processData: false,
            beforeSend: function () {
                Swal.showLoading();
            },
            success: function (result) {
                $('#datatable').DataTable().ajax.reload();
                $("#modal-form").modal("hide");
                $("#show_error").html('');
            },
            error: function (result) {
                $('#show_error').empty();
                var message = JSON.parse(result.responseText);

                if (Array.isArray(message.message) == true) {
                    message.message.forEach(showError);
                } else {
                    document.getElementById("show_error").innerHTML = "Những tài khoản kể từ hàng " + message.email + " đã được thêm thành công. Vui lòng kiểm tra lại những hàng kể từ " + message.email + " trở về dưới. (Chú ý: Hãy chắc rằng khi trước khi thêm tài khoản, các email và số điện thoại chuẩn bị thêm chưa tồn tại trong hệ thống)";
                }
            },
            complete: function ($data) {
                var message = checkStatus($data.status);
                Swal.disableLoading();
                Swal.fire(
                    message['notice'],
                    message['content'],
                    message['status']
                );
                Swal.hideLoading();
            },
        });
    });

    $("#select2").select2({
        dropdownParent: $("#myModal"),
        multiple: true,
        tags: true,
        placeholder: "Chọn nhân viên",
        allowClear: true,
        ajax: {
            url: '/admin/customers/search',
            dataType: 'json',
            data: function (params) {
                return {
                    q: $.trim(params.term)
                };
            },
            processResults: function (data) {
                return {
                    results: $.map(data, function (item) {
                        return {
                            text: item.email,
                            id: item.id
                        }
                    })
                };
            },
            cache: true
        },
    });

    $('.group-multiple').select2();

    $('body').on('submit', 'form#formExport', function (e) {
        e.preventDefault();
        actionURL = $(this).data('url');

        var type = $("#type_transaction :selected").val();
        var is_active = $("#active_transaction :selected").val();
        var start_date = $("#formExport input[name=start_date]").val();
        var end_date = $("#formExport input[name=end_date]").val();

        if (checkDate(start_date, end_date) != true) {
            checkDate(start_date, end_date);

            return false;
        }

        $.ajax({
            type: 'GET',
            url: $(this).data('url') + '?type=' + type + '&is_active=' + is_active + '&start_date=' + start_date + '&end_date=' + end_date,
            beforeSend: function () {
                Swal.showLoading();
            },
            success: function (response) {
                window.open('/admin/transactions/export?type=' + type + '&is_active=' + is_active + '&start_date=' + start_date + '&end_date=' + end_date, '_blank');
            },
            error: function (reject) {
            },
            complete: function ($data) {
                var message = checkStatus($data.status);
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
    });

    //Check condition of Earning Rule
    handleFormEarningRule();

    activaTab('a1');

    $('#reset').click(function () {
        $("#formSearch").load(location.href + " #formSearch>*", "");
        $('#datatable').DataTable().destroy();
        fill_datatable();
    });
});

function checkFormEarningRule(limit_active, limit_limit, all_time_active, start_at, end_at) {
    if (limit_active == true && limit_limit != '') {
        return Swal.fire(
            "Thất bại",
            "Không thể vừa tích không giới hạn sử dụng và chọn số lần giới hạn cùng 1 lúc",
            "error"
        );
    }

    if (all_time_active == true) {
        if (start_at != '' || end_at != '') {
            return Swal.fire(
                "Thất bại",
                "Không thể vừa chọn ngày vừa tích thời gian hoạt động",
                "error"
            );
        }
    }

    if (checkDate(start_at, end_at) != true) {
        return checkDate(start_at, end_at);
    }

    return true;
}

function checkFormCampaign(campaign_activity_all_time_active, campaign_activity_active_from, campaign_activity_active_to) {
    if (campaign_activity_all_time_active == true) {
        if (campaign_activity_active_from != '' || campaign_activity_active_to != '') {
            return Swal.fire(
                "Thất bại",
                "Không thể vừa chọn ngày vừa tích thời gian hoạt động",
                "error"
            );
        }
    }

    if (checkDate(campaign_activity_active_from, campaign_activity_active_to) != true) {
        return checkDate(campaign_activity_active_from, campaign_activity_active_to);
    }

    return true;
}


function showError(item, index) {
    document.getElementById("show_error").innerHTML += "<p>" + parseInt(index + 1) + ": " + item + "</p>";
}

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

function activaTab(tab) {
    $('.nav-tabs a[href="#' + tab + '"]').tab('show');
};

function checkfile(sender) {
    var validExts = new Array(".xlsx", ".xls");
    var fileExt = sender.value;
    fileExt = fileExt.substring(fileExt.lastIndexOf('.'));
    if (validExts.indexOf(fileExt) < 0) {
        alert("Không đúng định dạng File, File bắt buộc có đuôi " + validExts.toString());

        $("#show_error").html('');
        $("#text-file").html('Thêm File');

        return false;
    }

    $("#text-file").html(sender.value);

    return true;
}


function checkDate(start_date, end_date) {
    if (start_date == '' && end_date != '') {
        return Swal.fire(
            "Thất bại",
            "Vui lòng chọn thêm ngày bắt đầu",
            "error"
        );
    }

    if (start_date != '' && end_date == '') {
        return Swal.fire(
            "Thất bại",
            "Vui lòng chọn thêm ngày kết thúc",
            "error"
        );
    }

    if (new Date(start_date) > new Date(end_date)) {
        return Swal.fire(
            "Thất bại",
            "Ngày kết thúc phải lớn hơn ngày bắt đầu",
            "error"
        );
    }

    return true;
}

function handleFormEarningRule() {
    $('#limit_active').click(function () {
        if ($(this).is(':checked')) {
            document.getElementById('limit_limit').value = ''
            document.getElementById('limit_period').value = ''
            $('.error-limit_limit').text('');
            $(".time-recevice").hide();
        } else {
            $(".time-recevice").show();
        }
    });

    $('#all_time_active').click(function () {
        if ($(this).is(':checked')) {
            $('.error-start_at').text('');
            $('.error-end_at').text('');
            document.getElementById('start_at').value = ''
            document.getElementById('end_at').value = ''
            $(".time-takes-place").hide();
        } else {
            $(".time-takes-place").show();
        }
    });

    $("#segment").change(function () {
        $('#error_group_id').text('');
        if ($("#segment").val() == 'group-user') {
            $('.user').css('display', 'none');
        } else {
            $('.group-user').css('display', 'none');
        }

        $('.' + $("#segment").val()).css('display', 'flex');
    });

    $('.' + $("#segment :selected").val()).css('display', 'flex');
}


function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#preview_image')
                .attr('src', e.target.result);
        };

        reader.readAsDataURL(input.files[0]);
    }

    if (!input.value.length) {
        $('#preview_image').attr('src', '');
    }
}

function saveImage(code, name, type) {
    var fileUrl = "https://chart.googleapis.com/chart?chs=300x300&cht=qr&chl=data%3D" + code + "%26type%3D" + type + "&choe=UTF-8"
    var xhr = new XMLHttpRequest();
    xhr.responseType = 'blob';
    xhr.onload = function () {
        var a = document.createElement('a');
        a.href = window.URL.createObjectURL(xhr.response);
        a.download = name + ".png";
        a.style.display = 'none';
        document.body.appendChild(a);
        a.click();
        a.remove()
    };
    xhr.open('GET', fileUrl);
    xhr.send();
}

window.onload = function () {
    limit_active = document.getElementById("limit_active")
    if (limit_active != null && limit_active.checked == true) {
        $(".time-recevice").hide();
    }

    all_time_active = document.getElementById("all_time_active")
    if (all_time_active != null && all_time_active.checked == true) {
        $(".time-takes-place").hide();
    }
}
