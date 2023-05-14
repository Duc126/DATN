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
                            <form name="checkoutForm" id="checkoutForm" action="{{ url('/checkout') }}" method="post">
                                @csrf

                                @if (count($deliveryAddress) > 0)
                                    <h4 class="section-h4">{{ __('messages.checkout.delivery_address') }}</h4>
                                    @foreach ($deliveryAddress as $address)
                                        <div class="control-group" style="float:left; margin-right: 5px;">
                                            <input type="radio" id="address{{ $address['id'] }}" name="address_id"
                                                value="{{ $address['id'] }}"
                                                shipping_charges="{{ $address['shipping_charges'] }}"
                                                total_price="{{ $total_price }}"
                                                coupon_amount={{ Session::get('couponAmount') }}>
                                        </div>
                                        <div>
                                            <label class="control-label">
                                                {{ $address['name'] }}, {{ $address['address'] }},
                                                {{ $address['city'] }},
                                                {{ $address['state'] }},{{ $address['country'] }},
                                                ({{ $address['phone'] }})
                                            </label>
                                                <a style="float:right;margin-left: 5px;" href="javascript:;"
                                                data-addressid="{{ $address['id'] }}" class="removeAddress">
                                                <i class="ion-md-remove-circle" style="font-size: 24px;"></i></a> &nbsp;&nbsp;
                                            <a style="float:right;" href="javascript:;"
                                                data-addressid="{{ $address['id'] }}" class="editAddress">
                                                {{ __('messages.edit') }}</a>

                                        </div>
                                    @endforeach <br>
                                @endif

                                <h4 class="section-h4">{{ __('messages.checkout.the_order') }}</h4>
                                <div class="order-table">
                                    <table class="u-s-m-b-13">
                                        <thead>
                                            <tr>
                                                <th>{{ __('messages.product.product') }}</th>
                                                <th>{{ __('messages.checkout.total_price') }}</th>
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
                                                        {{ number_format($getDiscountAttributePrice['final_price'] * $item['quantity'], 0, '.', '.') }} VNĐ

                                                            {{-- {{ $getDiscountAttributePrice['final_price'] * $item['quantity'] }}đ --}}
                                                        </h6>
                                                    </td>
                                                </tr>
                                                @php $total_price = $total_price + ($getDiscountAttributePrice['final_price'] * $item['quantity']) @endphp
                                            @endforeach
                                            <tr>
                                                <td>
                                                    <h3 class="order-h3">{{ __('messages.checkout.total_price') }}</h3>
                                                </td>
                                                <td>
                                                    <h3 class="order-h3">
                                                        {{ number_format($total_price, 0, '.', '.') }} VNĐ
                                                        {{-- {{ $total_price }}.VNĐ --}}
                                                    </h3>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <h6 class="order-h6">{{ __('messages.shipping.shipping') }}</h6>
                                                </td>
                                                <td>
                                                    <h6 class="order-h6">
                                                        <span class="shipping_charges">
                                                            0.VNĐ</span>
                                                    </h6>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <h6 class="order-h6">{{ __('messages.coupons.percent_discount') }}</h6>
                                                </td>
                                                <td>
                                                    <span class="calc-text couponAmount">
                                                        @if (Session::has('couponAmount'))
                                                            <span class="couponAmount">
                                                                {{-- {{ Session::get('couponAmount') }}.VNĐ --}}
                                                                {{ number_format(Session::get('couponAmount'), 0, '.', '.') }} VNĐ

                                                            </span>
                                                        @else
                                                            0.VNĐ
                                                        @endif
                                                    </span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <h3 class="order-h3">{{ __('messages.cart.total') }}</h3>
                                                </td>
                                                <td>
                                                    <h3 class="order-h3">
                                                        <strong class="grand_total">
                                                            {{ number_format($total_price - Session::get('couponAmount'), 0, '.', '.') }} VNĐ
                                                            {{-- {{ $total_price - Session::get('couponAmount') }}.VNĐ --}}
                                                        </strong>
                                                    </h3>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <div class="u-s-m-b-13">
                                        <input type="radio" class="radio-box" name="payment_gateway" id="cash-on-delivery"
                                            value="COD">
                                        <label class="label-text"
                                            for="cash-on-delivery">{{ __('messages.checkout.payment_delivery') }}</label>
                                    </div>
                                    {{-- <div class="u-s-m-b-13">
                                        <input type="radio" class="radio-box" name="payment_gateway" id="paypal"
                                            value="Paypal">
                                        <label class="label-text" for="paypal">{{ __('Paypal') }}</label>
                                    </div> --}}
                                    <div class="u-s-m-b-13">
                                        <input type="radio" class="radio-box" name="payment_gateway" id="credit_card"
                                            value="Credit_Card">
                                        <label class="label-text" for="credit_card">{{ __('messages.checkout.cart') }}</label>
                                    </div>
                                    <div id="myDiv" style="display:none;">
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label for="name">Tên Chủ Thẻ</label>
                                                <input type="text" class="form-control" id="name" name="name"
                                                    placeholder="Nhập tên chủ thẻ">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="ccd">CCD</label>
                                                <input type="text" class="form-control" id="ccd" name="ccd"
                                                    placeholder="Nhập CCD">
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label for="card_number">Số Thẻ</label>
                                                <input type="text" class="form-control" id="card_number"
                                                    name="card_number" placeholder="Nhập số thẻ">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="expriation_date">Ngày Hết Hạn</label>
                                                <input type="text" class="form-control" id="expriation_date"
                                                    name="expriation_date" placeholder="Nhập ngày hết hạn">
                                            </div>
                                        </div>
                                    </div>


                                    <div class="u-s-m-b-13">
                                        <input type="checkbox" class="check-box" id="accept"
                                            name="accept"value="Yes" title="Vui lòng đồng ý với T&C">
                                        <label class="label-text no-color"
                                            for="accept">{{ __('messages.checkout.accept') }}
                                            <a href="#" class="u-c-brand">{{ __('messages.checkout.t&c') }}</a>
                                        </label>
                                    </div>
                                    <button type="submit" id="placeOrder"
                                        class="button button-outline-secondary">{{ __('messages.checkout.order') }}</button>
                                </div>
                            </form>
                        </div>
                        <!-- Checkout /- -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Checkout-Page /- -->
@endsection
