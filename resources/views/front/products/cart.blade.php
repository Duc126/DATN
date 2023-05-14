<?php use App\Models\Product; ?>

@extends('front.layout.layout')
@section('content')
    <!-- Page Introduction Wrapper -->
    <div class="page-style-a">
        <div class="container">
            <div class="page-intro">
                <h2>{{ __('messages.cart.cart') }}</h2>
                <ul class="bread-crumb">
                    <li class="has-separator">
                        <i class="ion ion-md-home"></i>
                        <a href="#">{{ __('messages.front.home') }}</a>
                    </li>
                    <li class="is-marked">
                        <a href="#">{{ __('messages.cart.cart') }}</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <!-- Page Introduction Wrapper /- -->
    <!-- Cart-Page -->
    <div class="page-cart u-s-p-t-80">
        <div class="container">
            @if (Session::has('error_message'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>{{ __('messages.error') }}:</strong> {{ Session::get('error_message') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
            @if (Session::has('success_message'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>{{ __('messages.success') }}:</strong> {{ Session::get('success_message') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
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
                                    <input id="code" name="code" type="text" class="text-field"
                                        placeholder="Coupon Code">
                                    <button type="submit" class="button">{{ __('Áp dụng phiếu giảm giá') }}</button>
                                </form>
                            </div>
                        </div>
                        <div class="button-area">
                            <a href="{{ url('/') }}" class="continue">{{ __('messages.cart.coutinue_shopping') }}</a>
                            <a href="{{ url('/checkout') }}" class="checkout">{{ __('messages.cart.switch_to_payment') }}</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Cart-Page /- -->
@endsection
