<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title></title>
</head>

@php
    use Carbon\Carbon;
@endphp
<body bgcolor="#f9f9f9" width="100%" style="Margin: 0;">
    <p>Có đơn hàn mới số: {{ $content['id'] }}</p>
    <p>Tổng tiền: {{ number_format($content['total']) }} VNĐ</p>
    <p>Ghi chú: {{ $content['message_user'] }}</p>
    <p>Ngày tạo: {{ Carbon::parse($content['created_at'])->setTimezone('Asia/Ho_Chi_Minh') }} </p>
</body>

</html>
