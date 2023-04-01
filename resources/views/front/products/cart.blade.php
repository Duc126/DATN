<?php use App\Models\Product; ?>

@extends('front.layout.layout')
@section('content')
    <!-- Page Introduction Wrapper -->
    <div class="page-style-a">
        <div class="container">
            <div class="page-intro">
                <h2>{{ __('Giỏ Hàng') }}</h2>
                <ul class="bread-crumb">
                    <li class="has-separator">
                        <i class="ion ion-md-home"></i>
                        <a href="index.html">{{ __('Trang Chủ') }}</a>
                    </li>
                    <li class="is-marked">
                        <a href="cart.html">{{ __('Giỏ Hàng') }}</a>
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
                <div class="col-lg-12">
                    <div id="appendCartItems">
                        @include('front.products.cart_items')
                    </div>
                    <div class="coupon-continue-checkout u-s-m-b-60">
                        <div class="coupon-area">
                            <h6>{{ __('Nhập mã phiếu giảm giá của bạn nếu bạn có') }}</h6>
                            <div class="coupon-field">
                                <form id="applyCoupon" method="post" action="javascript:void(0);"
                                    @if (Auth::check()) user="1" @endif>
                                    @csrf
                                    <label class="sr-only" for="coupon-code">{{ __('Áp dụng phiếu giảm giá') }}</label>
                                    <input id="code" name="code" type="text" class="text-field" placeholder="Coupon Code">
                                    <button type="submit" class="button">{{ __('Áp dụng phiếu giảm giá') }}</button>
                                </form>
                            </div>
                        </div>
                        <div class="button-area">
                            <a href="{{ url('/') }}" class="continue">{{ __('Tiếp tục mua sắm') }}</a>
                            <a href="{{ url('/checkout') }}" class="checkout">{{ __('Chuyển sang thanh toán') }}</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Cart-Page /- -->
@endsection
