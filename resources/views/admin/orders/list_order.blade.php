@extends('admin/layout/layout')
@section('css')
    <!--datatable css-->
    <link href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css" rel="stylesheet" type="text/css" />
    <!--datatable responsive css-->
    <link href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.bootstrap.min.css" rel="stylesheet"
        type="text/css" />
    <link href="https://cdn.datatables.net/buttons/2.2.2/css/buttons.dataTables.min.css" rel="stylesheet" type="text/css" />
@endsection
@section('content')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-md-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">{{ __('Danh Sách Đơn Đặt Hàng') }}</h4>
                            <div class="table-responsive">
                                <table id="orders" class="table table-striped display">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>{{ __('Ngày Đặt Hàng') }}</th>
                                            <th>{{ __('Tên khách hàng') }}</th>
                                            <th>{{ __('Email khách hàng') }}</th>
                                            <th>{{ __('Sản phẩm khách hàng đặt') }}</th>
                                            <th>{{ __('	Số tiền đơn đặt hàng') }}</th>
                                            <th>{{ __('Tình trạng đặt hàng') }}</th>
                                            <th>{{ __('Phương thức thanh toán') }}</th>
                                            <th>{{ __('Hành Động') }}</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($orders as $orderList)
                                            <tr>
                                                <td>{{ $orderList['id'] }}</td>
                                                <td>{{ date('Y-m-d h:i:s', strtotime($orderList['created_at'])) }} </td>
                                                <td>{{ $orderList['name'] }} </td>
                                                <td>{{ $orderList['email'] }} </td>

                                                <td>
                                                    @foreach ($orderList['orders_products'] as $product)
                                                        {{ $product['product_code'] }} ({{ $product['product_qty'] }})<br>
                                                    @endforeach()
                                                </td>
                                                <td>{{ $orderList['grand_total'] }}.đ </td>
                                                <td>{{ $orderList['order_status'] }} </td>
                                                <td>{{ $orderList['payment_method'] }} </td>
                                                <td>
                                                    <a title="{{ __('Xem chi tiết đơn đặt hàng') }}"
                                                    href="{{ url('admin/order/'.$orderList['id']) }}"><i style="font-size:25px;" class="mdi mdi-file-document"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    {{-- <script src="{{ url('admin/js/section.js') }}"></script> --}}
@endsection