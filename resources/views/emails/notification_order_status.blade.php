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
                {{ __('Trạng Thái Đơn Hàng')}} #{{ $order_id }} {{ ('Của Bạn Đã Được Cập Nhật Thành') }} @if($order_status == 'Dang Tien Hanh')
                                                                                                        {{ __('Đang Tiến Hành') }}
                                                                                                        @elseif($order_status == 'Da Huy')
                                                                                                        {{ __('Đã Hủy') }}
                                                                                                        @elseif($order_status == 'Chua Giai Quyet')
                                                                                                        {{ __('Chưa Giải Quyết') }}
                                                                                                        @elseif($order_status == 'Da Giao Hang')
                                                                                                        {{ __('Đã Giao Hàng') }}
                                                                                                        @elseif($order_status == 'Da Huy')
                                                                                                        {{ __('Đã Hủy') }}
                                                                                                        @elseif($order_status == 'Van Chuyen')
                                                                                                        {{ __('Vận Chuyển') }}
                                                                                                        @endif
            </td>
        </tr>
        <tr>
            <td>
                &nbsp;
            </td>
        </tr>
        @if(!empty($courier_name) && !empty($tracking_number))
        <tr>
            <td>
                {{ __('Tên Đơn Vị Vận Chuyển là') }} {{$courier_name}} {{ __('và Số Vận CHuyển là') }} {{$tracking_number}}
            </td>
        </tr>
        <tr>
            <td>
                &nbsp;
            </td>
        </tr>
        @endif
        <tr>
            <td>
                {{ __('Đơn đặt hàng chi tiết như dưới đây: -') }}
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
                                {{ number_format($order['product_price'], 0, '.', '.') }} VNĐ
                            </td>
                        </tr>
                    @endforeach
                    <tr>
                        <td colspan="5" align="right">{{ __('Chi phí vận chuyển') }}</td>
                        <td>  {{ $orderDetails['shipping_charges'] }}.VNĐ</td>
                    </tr>
                    <tr>
                        <td colspan="5" align="right">{{ __('Số tiền khi áp dụng phiếu giảm giá') }}</td>
                        <td>
                            @if($orderDetails['coupon_amount'] > 0)
                             {{ $orderDetails['coupon_amount'] }}
                             @else
                            0
                             @endif
                             .VNĐ</td>
                    </tr>
                    <tr>
                        <td colspan="5" align="right">{{ __('Tổng cộng') }}</td>
                        <td>  {{ $orderDetails['grand_total'] }}.VNĐ</td>
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
                     <tr>
                        <td>
                         {{ $orderDetails['pincode'] }}
                        </td>
                     </tr>
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
            <td>
               {{ __('Đối với bất kỳ truy vấn, bạn có thể liên hệ với chúng tôi tại') }} <a href="mailto:ducbui1211@gmail.com">
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
                {{ __('Trân Trọng') }}, {{ __('Trung Tâm Thương Mại') }} <br>
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
