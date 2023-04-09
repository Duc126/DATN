<?php use App\Models\Product; ?>

@extends('front.layout.layout')
@section('content')
    <!-- Page Introduction Wrapper -->
    <div class="page-style-a">
        <div class="container">
            <div class="page-intro">
                <h2>{{ __('Chi tiết đơn hàng số') }} #{{ $orderDetails['id'] }} </h2>
                <ul class="bread-crumb">
                    <li class="has-separator">
                        <i class="ion ion-md-home"></i>
                        <a href="{{ __('/') }}">{{ __('Trang Chủ') }}</a>
                    </li>
                    <li class="is-marked">
                        <a href="{{ url('user/order') }}">{{ __('Đơn đặt hàng của tôi') }}</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <!-- Page Introduction Wrapper /- -->
    <!-- Cart-Page -->
    <div class="page-cart u-s-p-t-80">
        <div class="container">
            <div class="row">
                <table class="table table-striped table-borderless">
                    <tr>
                        <td colspan="2" style="color: #fff; background: red;">
                            <strong>{{ __('Chi tiết đơn hàng') }}</strong>
                        </td>
                    </tr>
                    <tr>
                        <td>{{ __('Ngày đặt hàng') }}</td>
                        <td>{{ date('Y-m-d h:i:s', strtotime($orderDetails['created_at'])) }}</td>

                    </tr>
                    <tr>
                        <td>{{ __('Tình Trạng Đơn') }}
                        <td>
                            {{-- {{ $orderDetails['order_status'] }} --}}
                            @if ($orderDetails['order_status'] == 'Shipped')
                                <span class="badge bg-info" style="color: #fff;">{{ __('Vận Chuyển:') }}</span>
                            @elseif($orderDetails['order_status'] == 'New')
                                <span class="badge bg-danger" style="color: #fff;">{{ __('Mới') }}</span>
                            @elseif($orderDetails['order_status'] == 'Cancelled')
                                <span class="badge bg-warning" style="color: #fff;">{{ __('Đã Hủy') }}</span>
                            @elseif($orderDetails['order_status'] == 'In Process')
                                <span class="badge bg-success" style="color: #fff;">{{ __('Đang Tiến Hành') }}</span>
                            @elseif($orderDetails['order_status'] == 'Pending')
                                <span class="badge bg-info" style="color: #fff;">{{ __('Chưa Giải Quyết') }}</span>
                            @elseif($orderDetails['order_status'] == 'Delivered')
                                <span class="badge bg-primary" style="color: #fff;">{{ __('Đã Giao Hàng') }}</span>
                            @else
                                <span class="badge bg-info" style="color: #fff;">{{ __('Trả') }}</span>
                            @endif

                        </td>
                        </td>
                    </tr>
                    <tr>
                        <td>{{ __('Tổng số  tiền đơn đặt hàng') }}
                        <td>{{ $orderDetails['grand_total'] }}.VNĐ</td>
                        </td>
                    </tr>
                    <tr>
                        <td>{{ __('Chi phí vận chuyển') }}
                        <td>{{ $orderDetails['shipping_charges'] }}.VNĐ</td>
                        </td>
                    </tr>
                    @if ($orderDetails['coupon_code'] != '')
                        <tr>
                            <td>{{ __('Coupon Code') }}
                            <td>{{ $orderDetails['coupon_code'] }}</td>
                            </td>
                        </tr>
                        <tr>
                            <td>{{ __('Coupon Amount') }}
                            <td>{{ $orderDetails['coupon_amount'] }}</td>
                            </td>
                        </tr>
                    @endif
                    @if ($orderDetails['courier_name'] != '')
                        <tr>
                            <td>{{ __('Tên Chyển Phát Nhanh') }}
                            <td>{{ $orderDetails['courier_name'] }}</td>
                            </td>
                        </tr>
                        <tr>
                            <td>{{ __('Số Theo Dõi') }}
                            <td>{{ $orderDetails['tracking_number'] }}</td>
                            </td>
                        </tr>
                    @endif
                    <tr>
                        <td>{{ __('Hình Thức Thanh Toán') }}
                        <td>

                            @if ($orderDetails['payment_method'] == 'COD')
                                <span class="badge bg-info color-white" style="color: #fff;">{{ __('COD') }}</span>
                            @elseif($orderDetails['payment_method'] == 'Paypal')
                                <span class="badge bg-warning" style="color: #fff;">{{ __('Paypal') }}</span>
                            @else
                                <span class="badge bg-success" style="color: #fff;">{{ __('Credit Card') }}</span>
                            @endif
                        </td>
                        </td>
                    </tr>

                </table>
                <table class="table table-striped table-borderless">
                    <tr>
                        <td colspan="6" style="color: #fff; background: red;">
                            <strong>{{ __('Chi tiết sản phẩm') }}</strong>
                        </td>
                    </tr>
                    <tr>
                        <td>{{ __('Ảnh Sản Phẩm') }}</td>
                        <td>{{ __('Mã Sản Phẩm') }}</td>
                        <td>{{ __('Tên Sản Phẩm') }}</td>
                        <td>{{ __('Kích Thước Sản Phẩm') }}</td>
                        <td>{{ __('Màu Sản Phẩm') }}</td>
                        <td>{{ __('Sô Lượng Sản Phẩm') }}</td>
                    </tr>
                    @foreach ($orderDetails['orders_products'] as $product)
                        <tr>
                            <td>
                                @php $getProductImage = Product::getProductImage($product['product_id'])@endphp
                                <a href="{{ url('product/' . $product['product_id']) }}">
                                    <img style="width:50px;"
                                        src="{{ asset('front/images/product_images/small/' . $getProductImage) }}"></a>
                            </td>
                            <td>{{ $product['product_code'] }}</td>
                            <td>{{ $product['product_name'] }}</td>
                            <td>{{ $product['product_size'] }}</td>
                            <td>{{ $product['product_color'] }}</td>
                            <td>{{ $product['product_qty'] }}</td>
                        </tr>
                        @if ($product['courier_name'] != '')
                            <tr>
                                <td colspan="6">{{ __('Tên Chuyển Phát:') }} {{ $product['courier_name'] }},
                                    {{ __('Số Theo Dõi:') }} {{ $product['tracking_number'] }}</td>
                            </tr>
                        @endif
                    @endforeach
                </table>
                <table class="table table-striped table-borderless">
                    <tr>
                        <td colspan="2" style="color: #fff; background: red;">
                            <strong>{{ __('Địa chỉ giao hàng') }}</strong>
                        </td>
                    </tr>
                    <tr>
                        <td>{{ __('Tên') }}
                        <td>{{ $orderDetails['name'] }}</td>
                        </td>
                    </tr>
                    <tr>
                        <td>{{ __('Địa Chỉ') }}
                        <td>{{ $orderDetails['address'] }}</td>
                        </td>
                    </tr>
                    <tr>
                        <td>{{ __('Thành Phô') }}
                        <td>{{ $orderDetails['city'] }}</td>
                        </td>
                    </tr>
                    <tr>
                        <td>{{ __('Tình Trạng') }}
                        <td>{{ $orderDetails['state'] }}</td>
                        </td>
                    </tr>
                    <tr>
                        <td>{{ __('Quốc Gia') }}
                        <td>{{ $orderDetails['country'] }}</td>
                        </td>
                    </tr>
                    <tr>
                        <td>{{ __('Mã Pin') }}
                        <td>{{ $orderDetails['pincode'] }}</td>
                        </td>
                    </tr>
                    <tr>
                        <td>{{ __('Số Điện Thoại') }}
                        <td>{{ $orderDetails['phone'] }}</td>
                        </td>
                    </tr>


                </table>
            </div>
        </div>
    </div>
    <!-- Cart-Page /- -->
@endsection
