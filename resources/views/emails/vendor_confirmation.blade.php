<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ __('Email') }} </title>
</head>
<body>
<tr><td>{{ __('Chào') }} {{ $first_name.$last_name }}!</td></tr>
<tr><td>&nbsp;</td></tr>
<tr><td>{{ __('Email nhà cung cấp của bạn đã được xác nhận. Vui lòng đăng nhập và thêm thông tin cá nhân của bạn. chi tiết kinh doanh và ngân hàng để tài khoản của bạn sẽ được phê duyệt') }}</td></tr>
{{-- <tr><td><a href="{{ url('vendor/confirm/'.$code) }}">{{ url('vendor/confirm/'.$code) }}</a></td></tr> --}}
<tr><td>&nbsp;</td></tr>
<tr><td>{{ __('Your account vendor details are as below:-') }}</td></tr>
<tr><td>&nbsp;</td></tr>
<tr><td>{{ __('Chào') }} {{ $first_name.$last_name }}</td></tr>
<tr><td>&nbsp;</td></tr>

<tr><td>{{ __('Số điện thoại') }} {{ $phone }}</td></tr>
<tr><td>&nbsp;</td></tr>

<tr><td>{{ __('Email') }} {{ $email }}</td></tr>
<tr><td>&nbsp;</td></tr>

<tr><td>{{ __('Mật Khẩu') }} {{ $first_name.$last_name }}</td></tr>

<tr><td>&nbsp;</td></tr>

<tr><td>{{ __('Thank') }}</td></tr>
<tr><td>{{ __('Đức') }}</td></tr>


</body>
</html>
