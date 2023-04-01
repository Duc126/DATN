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
                        <td colspan="2" style="color: #fff; background: red;"><strong>{{ __('Chi tiết đơn hàng') }}</strong></td>
                    </tr>
                    <tr>
                        <td>{{ __('Ngày đặt hàng') }}</td>
                        <td>{{ date('Y-m-d h:i:s', strtotime($orderDetails['created_at'])) }}</td>

                    </tr>
                    <tr>
                        <td>{{ __('Tình Trạng Đơn') }}
                        <td>{{ $orderDetails['order_status'] }}</td>
                        </td>
                    </tr>
                    <tr>
                        <td>{{ __('Order Total') }}
                        <td>{{ $orderDetails['grand_total'] }}</td>
                        </td>
                    </tr>
                    <tr>
                        <td>{{ __('Shipping Charges') }}
                        <td>{{ $orderDetails['shipping_charges'] }}</td>
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
                    <tr>
                        <td>{{ __('Payment Method') }}
                        <td>{{ $orderDetails['payment_method'] }}</td>
                        </td>
                    </tr>

                </table>
                <table class="table table-striped table-borderless" >
                    <tr>
                        <td colspan="6" style="color: #fff; background: red;"><strong>{{ __('Chi tiết sản phẩm') }}</strong></td>
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
                            <a href="{{ url('product/'.$product['product_id']) }}">
                            <img style="width:50px;" src="{{ asset('front/images/product_images/small/'.$getProductImage) }}"></a>
                        </td>
                        <td>{{ $product['product_code'] }}</td>
                        <td>{{ $product['product_name'] }}</td>
                        <td>{{ $product['product_size'] }}</td>
                        <td>{{ $product['product_color'] }}</td>
                        <td>{{ $product['product_qty'] }}</td>
                        </tr>
                    @endforeach
                </table>
                <table class="table table-striped table-borderless">
                    <tr>
                        <td colspan="2" style="color: #fff; background: red;"><strong>{{ __('Địa chỉ giao hàng') }}</strong></td>
                    </tr>
                    <tr>
                        <td>{{ __('Tên') }}<td>{{ $orderDetails['name'] }}</td></td>
                    </tr>
                    <tr>
                        <td>{{ __('Địa Chỉ') }}<td>{{ $orderDetails['address'] }}</td></td>
                    </tr>
                    <tr>
                        <td>{{ __('Thành Phô') }}<td>{{ $orderDetails['city'] }}</td></td>
                    </tr>
                    <tr>
                        <td>{{ __('Tình Trạng') }}<td>{{ $orderDetails['state'] }}</td></td>
                    </tr>
                    <tr>
                        <td>{{ __('Quốc Gia') }}<td>{{ $orderDetails['country'] }}</td></td>
                    </tr>
                    <tr>
                        <td>{{ __('Mã Pin') }}<td>{{ $orderDetails['pincode'] }}</td></td>
                    </tr>
                    <tr>
                        <td>{{ __('Số Điện Thoại') }}<td>{{ $orderDetails['phone'] }}</td></td>
                    </tr>


                </table>
            </div>
        </div>
    </div>
    <!-- Cart-Page /- -->
@endsection
