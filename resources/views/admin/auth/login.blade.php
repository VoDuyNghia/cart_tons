<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta charset="utf-8">
    <title>Shopping Cafe | Đăng nhập</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" href="{{ asset('templates/admin/') }}/assets/img/brand/hepie.png" type="image/png">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
    <link rel="stylesheet" href="{{ asset('templates/admin') }}/assets/vendor/nucleo/css/nucleo.css" type="text/css">
    <link rel="stylesheet"
        href="{{ asset('templates/admin') }}/assets/vendor/@fortawesome/fontawesome-free/css/all.min.css"
        type="text/css">
    <link rel="stylesheet" href="{{ asset('templates/admin') }}/assets/css/argon.min.css?v=1.1.0" type="text/css">
</head>

<body class="bg-default">
    <div class="main-content">
        <div class="header bg-gradient-primary py-7 py-lg-8 pt-lg-9"
            style="padding-top: 2rem!important;padding-bottom: 2em !important;">
            <div class="container">
                <div class="header-body text-center mb-7">
                    <div class="row justify-content-center">
                        <div class="col-xl-5 col-lg-6 col-md-8 px-5">
                            <h1 class="text-white">Xin chào!</h1>
                            <span class="avatar avatar-sm rounded-circle">
                                <img alt="Image placeholder"
                                    src="{{ asset('templates/admin/') }}/assets/img/brand/logo.png">
                            </span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="separator separator-bottom separator-skew zindex-100">
                <svg x="0" y="0" viewBox="0 0 2560 100" preserveAspectRatio="none" version="1.1"
                    xmlns="http://www.w3.org/2000/svg">
                    <polygon class="fill-default" points="2560 0 2560 100 0 100"></polygon>
                </svg>
            </div>
        </div>
        <div class="container mt--8 pb-5">
            <div class="row justify-content-center">
                <div class="col-lg-5 col-md-7">
                    <div class="card bg-secondary border-0 mb-0">
                        <div class="card-body px-lg-5 py-lg-5">
                            <form id="login" role="form" method="POST" action="{{ route('admin.auth.login') }}">
                                <div class="form-group mb-3">
                                    <div class="input-group input-group-merge input-group-alternative">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><em class="ni ni-email-83"></em></span>
                                        </div>
                                        <input required class="form-control" name="email" placeholder="Email"
                                            type="email">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group input-group-merge input-group-alternative">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><em class="ni ni-lock-circle-open"></em></span>
                                        </div>
                                        <input required class="form-control" name="password" placeholder="Password"
                                            type="password">
                                    </div>
                                </div>
                                <div class="text-center">
                                    <button type="submit" class="btn btn-primary my-4">ĐĂNG NHẬP</button>
                                </div>
                                <div id="message">
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-6">
                            <a href="{{ route('admin.auth.forgot') }}" class="text-light"><small>Quên mật
                                    khẩu?</small></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('templates/admin') }}/assets/vendor/jquery/dist/jquery.min.js"></script>
    <script src="{{ asset('templates/admin') }}/assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('templates/admin') }}/assets/vendor/js-cookie/js.cookie.js"></script>
    <script src="{{ asset('templates/admin') }}/assets/vendor/jquery.scrollbar/jquery.scrollbar.min.js"></script>
    <script src="{{ asset('templates/admin') }}/assets/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js">
    </script>
    <script src="{{ asset('templates/admin') }}/assets/js/argon.min.js?v=1.1.0"></script>
    <script src="{{ asset('templates/admin') }}/assets/js/demo.min.js"></script>
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $('form#login').on('submit', function(e) {
            e.preventDefault();
            url = $(this).attr('action')
            var formData = new FormData(this);
            $.ajax({
                url: $(this).attr('action'),
                method: "POST",
                data: formData,
                beforeSend: function(data) {
                    $('.btn-primary').html('<img alt="image" src="http://' + window.location.hostname +
                        '/templates/admin/assets/img/brand/loading.svg" width="20px">');
                },
                success: function(data) {
                    if (data.type === 'success') {
                        window.location.href = url;
                    } else {
                        dataText = `
                          <div class="alert alert-danger">
                            ${data.notice}
                          </div>
                      `;
                        $('.btn-primary').text('Đăng Nhập');
                        $('#message').html('');
                        $('#message').append(dataText);
                    }
                },
                error: function() {
                    dataText = `
                          <div class="alert alert-danger">
                            Đã xảy ra lỗi !
                          </div>
                      `;
                    $('.btn-primary').text('Đăng Nhập');
                    $('#message').html('');
                    $('#message').append(dataText);
                },
                cache: false,
                contentType: false,
                processData: false
            });
            return false;
        });

    </script>
</body>

</html>
