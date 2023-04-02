<?php use App\Models\Product; ?>

@extends('front.layout.layout')
@section('content')
    <!-- Page Introduction Wrapper -->
    <div class="page-style-a">
        <div class="container">
            <div class="page-intro">
                <h2>{{ __('Thanh Toán') }}</h2>
                <ul class="bread-crumb">
                    <li class="has-separator">
                        <i class="ion ion-md-home"></i>
                        <a href="{{ url('/') }}">{{ __('Trang Chủ') }}</a>
                    </li>
                    <li class="is-marked">
                        <a href="#">{{ __('Thanh Toán') }}</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <!-- Page Introduction Wrapper /- -->
    <!-- Checkout-Page -->
    <div class="page-checkout u-s-p-t-80">
        <div class="container">
            @if (Session::has('error_message'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>{{ __('Lỗi') }}:</strong><?php echo Session::get('error_message'); ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
            <form name="checkoutForm" id="checkoutForm" action="{{ url('/checkout') }}" method="post">
                @csrf
                <div class="row">
                    <div class="col-lg-12 col-md-12">

                        <!-- Second Accordion /- -->
                        <div class="row">
                            <!-- Billing-&-Shipping-Details -->
                            <div class="col-lg-6" id="deliveryAddress">
                                @include('front.products.delivery_address')
                            </div>
                            <!-- Billing-&-Shipping-Details /- -->
                            <!-- Checkout -->
                            <div class="col-lg-6">
                                <h4 class="section-h4">{{ __('Đơn Đặt Hàng') }}</h4>
                                <div class="order-table">
                                    <table class="u-s-m-b-13">
                                        <thead>
                                            <tr>
                                                <th>{{ __('Sản Phẩm') }}</th>
                                                <th>{{ __('Tổng Tiền') }}</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php $total_price = 0 @endphp
                                            @foreach ($getCartItems as $item)
                                                <?php $getDiscountAttributePrice = Product::getDiscountAttributePrice($item['product_id'], $item['size']);
                                                // echo "<pre>"; print_r($getDiscountAttributePrice);die;
                                                ?>
                                                <tr>
                                                    <td>
                                                        <a href="{{ url('product/' . $item['product_id']) }}">
                                                            <img width="40"
                                                                src="{{ asset('front/images/product_images/small/' . $item['product']['product_image']) }}"
                                                                alt="Product">
                                                            <h6 class="order-h6">{{ $item['product']['product_name'] }}<br>
                                                                {{ $item['size'] }}/{{ $item['product']['product_color'] }}
                                                            </h6>
                                                        </a>
                                                        <span class="order-span-quantity">x {{ $item['quantity'] }}</span>
                                                    </td>
                                                    <td>
                                                        <h6 class="order-h6">
                                                            {{ $getDiscountAttributePrice['final_price'] * $item['quantity'] }}đ
                                                        </h6>
                                                    </td>
                                                </tr>
                                                @php $total_price = $total_price + ($getDiscountAttributePrice['final_price'] * $item['quantity']) @endphp
                                            @endforeach
                                            <tr>
                                                <td>
                                                    <h3 class="order-h3">{{ __('Tổng Tiền') }}</h3>
                                                </td>
                                                <td>
                                                    <h3 class="order-h3">{{ $total_price }}.Đ</h3>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <h6 class="order-h6">{{ __('Chi phí vận chuyển') }}</h6>
                                                </td>
                                                <td>
                                                    <h6 class="order-h6">$0.00</h6>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <h6 class="order-h6">{{ __('Giảm Giá') }}</h6>
                                                </td>
                                                <td>
                                                    <span class="calc-text couponAmount">
                                                        @if (Session::has('couponAmount'))
                                                            {{ Session::get('couponAmount') }}.Đ
                                                        @else
                                                            0.Đ
                                                        @endif
                                                    </span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <h3 class="order-h3">{{ _('Tổng cộng') }}</h3>
                                                </td>
                                                <td>
                                                    <h3 class="order-h3">
                                                        {{ $total_price - Session::get('couponAmount') }}.Đ</h3>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <div class="u-s-m-b-13">
                                        <input type="radio" class="radio-box" name="payment_gateway" id="cash-on-delivery"
                                            value="COD">
                                        <label class="label-text" for="cash-on-delivery">{{ __('Thanh Toán Khi Giao Hàng') }}</label>
                                    </div>
                                    <div class="u-s-m-b-13">
                                        <input type="radio" class="radio-box" name="payment_gateway" id="paypal"
                                            value="Paypal">
                                        <label class="label-text" for="paypal">{{ __('Credit Card') }}</label>
                                    </div>
                                    <div class="u-s-m-b-13">
                                        <input type="checkbox" class="check-box" id="accept" name="accept"value="Yes"
                                              title="Vui lòng đồng ý với T&C">
                                        <label class="label-text no-color" for="accept">{{ __('Tôi Đã Đọc Và Chấp Nhận Các') }}
                                            <a href="#" class="u-c-brand">{{ __('Điều Khoản Và Điều Kiện') }}</a>
                                        </label>
                                    </div>
                                    <button type="submit" class="button button-outline-secondary">{{ __('Đặt Hàng') }}</button>
                                </div>
                            </div>
                            <!-- Checkout /- -->
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- Checkout-Page /- -->
@endsection
