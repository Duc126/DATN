<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{-- <title>Document</title> --}}
</head>

<body>
    <table style="width:700px;">
        <tr>
            <td>
                &nbsp;
            </td>
        </tr>
        <tr>
            <td>
                <img style="width:250px; height: 100px;" src="{{ asset('front/images/main-logo/TechHub.png') }}">
            </td>
        </tr>
        <tr>
            <td>
                {{ __('Xin Chào') }} {{ $name }}
            </td>
        </tr>
        <tr>
            <td>
                &nbsp;
            </td>
        </tr>
        <tr>
            <td>
                {{ __('Cảm ơn đã mua sắm với chúng tôi. Chi tiết đơn hàng của bạn như sau: -') }}
            </td>
        </tr>
        <tr>
            <td>
                &nbsp;
            </td>
        </tr>
        <tr>
            <td>
                {{ __('Đơn Hàng Số') }} {{ $order_id }}
            </td>
        </tr>
        <tr>
            <td>
                &nbsp;
            </td>
        </tr>
        <tr>
            <td>
                <table style="width: 95%;" cellpadding="5" cellspacing="5" bgcolor="#f7f4f4">
                    <tr bgcolor="#cccccc">
                        <td>{{ __('Tên Sản Phẩm') }}</td>
                        <td>{{ __('Mã Sản Phẩm') }}</td>
                        <td>{{ __('Kích Thước Sản Phẩm') }}</td>
                        <td>{{ __('Màu Sản Phẩm') }}</td>
                        <td>{{ __('Số Lượng Sản Phẩm') }}</td>
                        <td>{{ __('Giá Tiền Sản Phẩm') }}</td>
                    </tr>
                    @foreach ($orderDetails['orders_products'] as $order)
                        <tr bgcolor="#f9f9f9">
                            <td>{{ $order['product_name'] }}</td>
                            <td>{{ $order['product_code'] }}</td>
                            <td>{{ $order['product_size'] }}</td>
                            <td>{{ $order['product_color'] }}</td>
                            <td>{{ $order['product_qty'] }}</td>
                            <td>
                                {{-- {{$order['product_price'] }}.VNĐ --}}
                                {{ number_format($order['product_price'], 0, '.', '.') }} VNĐ

                            </td>
                        </tr>
                    @endforeach
                    <tr>
                        <td colspan="5" align="right">{{ __('Chi phí vận chuyển') }}</td>
                        <td>
                            {{ number_format($orderDetails['shipping_charges'], 0, '.', '.') }} VNĐ
                            {{-- {{ $orderDetails['shipping_charges'] }}.VNĐ --}}
                        </td>
                    </tr>
                    <tr>
                        <td colspan="5" align="right">{{ __('Số tiền khi áp dụng phiếu giảm giá') }}</td>
                        <td>
                            @if ($orderDetails['coupon_amount'] > 0)
                                {{ $orderDetails['coupon_amount'] }}
                            @else
                                0
                            @endif
                            .VNĐ
                        </td>
                    </tr>
                    <tr>
                        <td colspan="5" align="right">{{ __('Tổng cộng') }}</td>
                        <td>
                            {{ number_format($orderDetails['grand_total'], 0, '.', '.') }} VNĐ

                            {{-- {{ $orderDetails['grand_total'] }}.VNĐ --}}
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr>
            <td>
                &nbsp;
            </td>
        </tr>
        <tr>
            <td>
                <table>
                    <tr>
                        <td> <strong>{{ __('Địa chỉ giao hàng:') }}
                            </strong></td>
                    </tr>
                    <tr>
                        <td>
                            {{ $orderDetails['name'] }}
                        </td>
                    </tr>
                    <tr>
                        <td>
                            {{ $orderDetails['address'] }}
                        </td>
                    </tr>
                    <tr>
                        <td>
                            {{ $orderDetails['city'] }}
                        </td>
                    </tr>
                    <tr>
                        <td>
                            {{ $orderDetails['state'] }}
                        </td>
                    </tr>
                    <tr>
                        <td>
                            {{ $orderDetails['country'] }}
                        </td>
                    </tr>
                    {{-- <tr>
                        <td>
                            {{ $orderDetails['pincode'] }}
                        </td>
                    </tr> --}}
                    <tr>
                        <td>
                            {{ $orderDetails['phone'] }}
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr>
            <td>
                &nbsp;
            </td>
        </tr>
        <tr>
            <td>{{ __('Tải xuống hóa đơn đặt hàng') }}
                <a
                    href="{{ url('order/invoice/download/' . $orderDetails['id'] . '') }}">{{ url('order/invoice/download/' . $orderDetails['id'] . '') }}</a>
            </td>
        </tr>
        <tr>
            <td>
                &nbsp;
            </td>
        </tr>
        <tr>
            <td>
                {{ __('Đối với bất kỳ truy vấn, bạn có thể liên hệ với chúng tôi tại') }} <a
                    href="mailto:ducbui1211@gmail.com">
                    {{ __('ducbui1211@gmail.com') }}
                </a>
            </td>
        </tr>
        <tr>
            <td>
                &nbsp;
            </td>
        </tr>
        <tr>
            <td>
                {{ __('Trân Trọng') }}, {{ __('TechHub') }} <br>
            </td>
        </tr>
        <tr>
            <td>
                &nbsp;
            </td>
        </tr>
    </table>

</body>

</html>
