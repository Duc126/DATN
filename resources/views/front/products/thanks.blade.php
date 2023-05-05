<?php use App\Models\Product; ?>

@extends('front.layout.layout')
@section('content')
    <!-- Page Introduction Wrapper -->
    <div class="page-style-a">
        <div class="container">
            <div class="page-intro">
                <h2>{{ __('Cảm ơn') }}</h2>
                <ul class="bread-crumb">
                    <li class="has-separator">
                        <i class="ion ion-md-home"></i>
                        <a href="{{ __('/') }}">{{ __('Trang Chủ') }}</a>
                    </li>
                    <li class="is-marked">
                        <a href="#">{{ __('Cảm Ơn') }}</a>
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
                    <h3 style="color:green;">{{ __('ĐƠN HÀNG CỦA BẠN ĐÃ ĐƯỢC ĐẶT THÀNH CÔNG') }}</h3>
                    <p>{{ __('Số đơn đặt hàng của bạn có id là') }} {{Session::get('order_id')}} {{ __('và Tổng cộng là') }} {{ number_format(Session::get('grand_total'), 0, '.', '.') }} VNĐ
                    </p>
                </div>
            </div>
        </div>
    </div>
    <!-- Cart-Page /- -->
@endsection
