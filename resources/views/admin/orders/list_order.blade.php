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
                            <h4 class="card-title">{{ __('messages.order') }}</h4>
                            {{-- <button type="button" class="btn btn-primary" data-toggle="modal"
                                data-target="#employeeModal">Gán Đơn Hàng Cho Nhân Viên</button>

                            <div class="modal fade" id="employeeModal" tabindex="-1" role="dialog"
                                aria-labelledby="employeeModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <form method="POST" action="{{ route('assignStaff') }}">
                                            @csrf
                                            <input type="hidden" name="order_id" id="order-id-input">

                                            <div class="modal-header">
                                                <h5 class="modal-title" id="employeeModalLabel">Nhân Viên</h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body" >
                                                <table class="table">
                                                    <thead>
                                                        <tr>
                                                            <th>#</th>
                                                            <th>Name</th>
                                                            <th>Email</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($listStaff as $staff)
                                                            <tr>
                                                                <td><input type="checkbox" name="order_ids[]"
                                                                        value="{{ $staff['id'] }}"></td>
                                                                <td>{{ $staff['name'] }}</td>
                                                                <td>{{ $staff['email'] }}</td>
                                                            </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-primary" data-toggle="modal"
                                                data-target="#employeeModal" onclick="setSelectedOrderId()">Gán Đơn Hàng Cho Nhân Viên</button>

                                                <button type="button" class="btn btn-secondary"
                                                    data-dismiss="modal">Đóng</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div> --}}
                            <div class="table-responsive">
                                <table id="orders" class="table table-striped display">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>{{ __('messages.list-user.name') }}</th>
                                            <th>{{ __('Email') }}</th>
                                            <th>{{ __('messages.order-detail.date-order') }}</th>
                                            <th>{{ __('messages.product.code') }}</th>
                                            <th>{{ __('messages.order-detail.total-price-order') }}</th>
                                            <th>{{ __('messages.order-detail.status-order') }}</th>
                                            <th>{{ __('messages.order-detail.payment-method') }}</th>
                                            <th data-orderable="false">{{ __('messages.table.action') }}</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($orders as $orderList)
                                            <tr>
                                                <td>
                                                    <a href="{{ url('admin/order/' . $orderList['id']) }}">{{ $orderList['id'] }}</a>
                                                </td>

                                                <td>{{ $orderList['name'] }} </td>
                                                <td>{{ $orderList['email'] }} </td>

                                                <td>{{ date('d/m/Y H:i:s', strtotime($orderList['created_at'])) }}
                                                </td>

                                                <td>
                                                    @foreach ($orderList['orders_products'] as $product)
                                                        {{ $product['product_code'] }}
                                                        ({{ $product['product_qty'] }})
                                                        <br>
                                                    @endforeach()
                                                </td>
                                                <td>
                                                    {{ number_format($orderList['grand_total'], 0, '.', '.') }} VNĐ
                                                 </td>
                                                <td>
                                                    <label>
                                                        @if ($orderList['order_status'] == 'Van Chuyen')
                                                            <span class="badge bg-secondary color-white"
                                                                style="color: #fff; background: #0633ED !important;">{{ __('Vận Chuyển') }}</span>
                                                        @elseif($orderList['order_status'] == 'Moi')
                                                            <span class="badge bg-danger"
                                                                style="color: #fff; background: #E6B912 !important">{{ __('Mới') }}</span>
                                                        @elseif($orderList['order_status'] == 'Da Huy')
                                                            <span class="badge bg-danger"
                                                                style="color: #fff;">{{ __('Đã Hủy') }}</span>
                                                        @elseif($orderList['order_status'] == 'Dang Tien Hanh')
                                                            <span class="badge bg-success"
                                                                style="color: #fff;">{{ __('Đang Tiến Hành') }}</span>
                                                        @elseif($orderList['order_status'] == 'Da Giao Hang')
                                                            <span class="badge bg-primary"
                                                                style="color: #fff;">{{ __('Đã Giao Hàng') }}</span>
                                                        @else
                                                            <span class="badge bg-info"
                                                                style="color: #fff;">{{ __('Chưa Giải Quyết') }}</span>
                                                        @endif
                                                    </label>
                                                </td>
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
                                                    <a title="{{ __('Xem chi tiết đơn đặt hàng') }}"
                                                        href="{{ url('admin/order/' . $orderList['id']) }}"><i
                                                            style="font-size:25px;" class="mdi mdi-file-document"></i>
                                                    </a>
                                                    &nbsp;&nbsp;
                                                    <a target="_blank" title="{{ __('Xem chi tiết hóa đơn') }}"
                                                        href="{{ url('admin/order/invoice/' . $orderList['id']) }}"><i
                                                            style="font-size:25px;" class="mdi mdi-printer"></i>
                                                    </a>
                                                    &nbsp;&nbsp;
                                                    <a target="_blank" title="{{ __('In hóa đơn') }}"
                                                        href="{{ url('admin/order/invoice/pdf/' . $orderList['id']) }}"><i
                                                            style="font-size:25px;" class="mdi mdi-file-pdf"></i>
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
