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
<br>
<tr><td>&nbsp;</td></tr>
<tr><td>{{ __('Vui lòng nhấp vào liên kết bên dưới để kích hoạt tài khoản trang web của bạn:') }}</td></tr>
{{-- <tr><td><a href="{{ url('vendor/confirm/'.$code) }}">{{ url('vendor/confirm/'.$code) }}</a></td></tr> --}}
<tr><td>&nbsp;</td></tr><br>
<tr><td><a href="{{ url('/user/confirm/'.$code) }}">{{ __('Xác nhận Tài khoản') }}</a></td></tr>
<tr><td>&nbsp;</td></tr><br><br>

<tr><td>&nbsp;</td></tr>

<tr><td>{{ __('Cảm Ơn') }}</td></tr><br>
<tr><td>{{ __('Đức') }}</td></tr>


</body>
</html>
