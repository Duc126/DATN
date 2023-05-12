<?php use App\Models\Product; ?>

@extends('front.layout.layout')
@section('content')
    <!-- Page Introduction Wrapper -->
    <div class="page-style-a">
        <div class="container">
            <div class="page-intro">
                <h2>{{ __('Đơn đặt hàng của tôi') }}</h2>
                <ul class="bread-crumb">
                    <li class="has-separator">
                        <i class="ion ion-md-home"></i>
                        <a href="{{ __('/') }}">{{ __('Trang Chủ') }}</a>
                    </li>
                    <li class="is-marked">
                        <a href="#">{{ __('Đơn đặt hàng của tôi') }}</a>
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
                        <th>ID</th>
                        <th>{{ __('Sản phẩm đã đặt hàng') }}</th>
                        <th>{{ __('Phương thức thanh toán') }}</th>
                        <th>{{ __('Tổng cộng') }}</th>
                        <th>{{ __('Ngày Đặt Hàng') }}</th>
                    </tr>
                    @foreach ($orders as $orderList)
                        <tr>

                            <td><a style="text-decoration: revert;
                                color: #007bff;" href="{{ url('user/order/'.$orderList['id']) }}">{{ $orderList['id'] }}</a></td>
                            <td>
                                @foreach ($orderList['orders_products'] as $product)
                                    {{ $product['product_code'] }}<br>
                                @endforeach()
                            </td>

                            {{-- <td>{{ $orderList['payment_method'] }}</td> --}}
                            <td>
                                @if ($orderList['payment_method'] == 'COD')
                                <span class="badge bg-info"
                                    style="color: #fff;">{{ __('Tiền Mặt') }}</span>
                            @else
                                <span class="badge bg-success"
                                    style="color: #fff;">{{ __('Thanh Toán Thẻ') }}</span>
                            @endif
                            </td>
                            <td>
                                {{ number_format($orderList['grand_total'], 0, '.', '.') }} VNĐ

                                {{-- {{ $orderList['grand_total'] }}.VNĐ --}}
                            </td>
                            <td>{{ date('d/m/Y H:i:s', strtotime($orderList['created_at'])) }}</td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
    <!-- Cart-Page /- -->
@endsection
