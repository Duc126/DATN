<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ __('Email') }} </title>
</head>
<body>
<tr><td>{{ __('Chào') }} {{ $name }}!</td></tr>
<tr><td>&nbsp;</td></tr>
<tr><td>{{ __('Chào mừng bạn đến với trang web. Tài khoản của bạn đã được tạo thành công với thông tin bên dưới:') }}</td></tr>
{{-- <tr><td><a href="{{ url('vendor/confirm/'.$code) }}">{{ url('vendor/confirm/'.$code) }}</a></td></tr> --}}
<tr><td>&nbsp;</td></tr>
<tr><td>{{ __('Chào') }} {{ $name }}</td></tr>
<tr><td>&nbsp;</td></tr>

<tr><td>{{ __('Số điện thoại') }} {{ $phone }}</td></tr>
<tr><td>&nbsp;</td></tr>

<tr><td>{{ __('Email') }} {{ $email }}</td></tr>
<tr><td>&nbsp;</td></tr>

<tr><td>{{ __('Mật Khẩu: ***** (như bạn đã chọn)') }}</td></tr>

<tr><td>&nbsp;</td></tr>

<tr><td>{{ __('Cảm Ơn') }}</td></tr>
<tr><td>{{ __('Đức') }}</td></tr>


</body>
</html>
