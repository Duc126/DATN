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
                        <a href="{{ __('/') }}">{{ __('Trang Chủ') }}</a>
                    </li>
                    <li class="is-marked">
                        <a href="#">{{ __('Proceed  to Payment') }}</a>
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
                <div class="col-lg-12 text-center">
                    <h3 style="color: red;">{{ __('VUI LÒNG THANH TOÁN CHO ĐƠN HÀNG CỦA BẠN
                        ') }}</h3>
                    {{-- <p>{{ __('Số đơn đặt hàng của bạn là') }} {{Session::get('order_id')}} {{ __('và Tổng cộng là') }} {{ Session::get('grand_total') }}.VNĐ</p> --}}
                    <form action="#" method="post">
                        @csrf
                        <input type="hidden" name="amount" value="{{ round(Session::get('grand_total')/23,3) }}">
                        <input type="image" src="https://www.paypalobjects.com/webstatic/en_US/i/buttons/checkout-logo-large.png">
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Cart-Page /- -->
@endsection
