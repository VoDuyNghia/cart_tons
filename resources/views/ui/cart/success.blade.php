<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en" class="flexbox">

<head>
    <title>Thanh toán thành công | Quang Vinh - Coffee</title>
    <meta name="description" content="Thanh toán thành công | Quang Vinh - Coffee" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=2, user-scalable=no">
    <link href='{{ asset('templates/ui/') }}/assets/global/css/checkouts.css' rel='stylesheet' type='text/css'
        media='all' />
    <link rel="icon" href="{{ asset('templates/admin/') }}/assets/img/brand/logo.png" type="image/png">
    <link rel="stylesheet" href="http://127.0.0.1:8000/templates/ui/assets/styles/bootstrap.min.css" />    <style>
        .summary-media .para-procedure {
            margin-bottom: 3px;
            font-family: open_sansbold;
            font-size: 16px;
            color: #6f5138;
            font-weight: bold;
        }
        .summary-media .summary-avatar {
            margin-right: 28px;
            float: left;
            width: 95px;
        }
    </style>
</head>

<body>
    <div class="banner">
        <div class="wrap text-center">
            <a href="#" class="logo">
                <img width="200px" src="{{ getImage(getImageDatabase(12)['image'], 'banners') }}" alt="">
            </a>
        </div>
    </div>
    <div class="content">
        <div class="wrap">
            <div class="main">
                <div class="main-header">
                    <a href="#" class="logo text-center">
                        <img width="200px" src="{{ getImage(getImageDatabase(12)['image'], 'banners') }}" alt="">
                    </a>
                </div>
                <div class="main-content">
                    <div class="inner-content">
                        <div class="summary-media">
                          <div class="summary-avatar">
                            <img src="{{ asset('templates/ui/assets/images/img-avatar.png') }}" alt="" height="283" width="94">
                          </div>
                          <div class="summary-main">
                            <p class="para-procedure text-uppercase">Chân thành cảm ơn quý khách đã sử dụng dịch vụ của chúng tôi.</p>
                            <p class="para-ckout">Đơn hàng đã được chuyển qua cho bộ phận phụ trách. Chúng tôi sẽ liên lạc lại bạn trong thời giam sớm nhất.</p>
                            <p class="para-ckout">Sự ủng hộ của quý khách là nguồn động viên vô cùng lớn lao cho chúng tôi trong quá trình phát triển. Xin an tâm rằng đơn hàng quý khách vừa đặt sẽ được thực hiện với tiêu chuẩn tốt nhất.</p>
                            <p class="para-ckout"><span class="text-emphasis">Mọi thắc mắc, yêu cầu,... xin vui lòng gọi 0898.987.567 hoặc liên hệ trực tiêp qua <a href="https://www.facebook.com/quangvinh.coffee/" target="_blank">FANPAGE</a></span></p>
                            <a class="para-ckout" href="{{ route('ui.index.index') }}">QUAY VỀ TRANG CHỦ</a>
                          </div>
                        </div>
                      </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
