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
<tr><td><a href="{{ url('vendor/confirm/'.$code) }}">{{ url('vendor/confirm/'.$code) }}</a></td></tr>
<tr><td>&nbsp;</td></tr>

<tr><td>{{ __('Cảm Ơn') }}</td></tr>
<tr><td>{{ __('Đức') }}</td></tr>


</body>
</html>
