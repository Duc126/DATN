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
                                            {{-- <th><input type="checkbox" id="select-all"></th> --}}
                                            <th>#</th>
                                            <th>{{ __('Tên khách hàng') }}</th>
                                            <th>{{ __('Email khách hàng') }}</th>
                                            <th>{{ __('Ngày Đặt Hàng') }}</th>

                                            <th>{{ __('Mã Sản phẩm khách hàng đặt') }}</th>
                                            <th>{{ __('	Số tiền đơn đặt hàng') }}</th>
                                            <th>{{ __('Tình trạng đặt hàng') }}</th>
                                            <th>{{ __('Phương thức thanh toán') }}</th>
                                            <th>{{ __('Hành Động') }}</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($orders as $orderList)
                                            <tr>
                                                {{-- <td><input type="checkbox" name="order_ids[]"
                                                        value="{{ $orderList['id'] }}"></td> --}}
                                                {{-- <td><input type="checkbox" name="order_ids[]"
                                                        value="{{ $orderList['id'] }}" id="order-{{ $orderList['id'] }}"
                                                        onchange="addToSelectedOrders(this)"></td> --}}


                                                <td>{{ $orderList['id'] }}</td>
                                                <td>{{ $orderList['name'] }} </td>
                                                <td>{{ $orderList['email'] }} </td>

                                                <td>{{ date('Y-m-d h:i:s', strtotime($orderList['created_at'])) }}
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
                                                {{-- <td>{{ $orderList['grand_total'] }}.VNĐ </td> --}}
                                                {{-- <td>{{ $orderList['order_status'] }} </td>  --}}
                                                <td>
                                                    <label>
                                                        @if ($orderList['order_status'] == 'Van Chuyen')
                                                            <span class="badge bg-secondary color-white"
                                                                style="color: #fff; background: #CE044E !important;">{{ __('Vận Chuyển') }}</span>
                                                        @elseif($orderList['order_status'] == 'Moi')
                                                            <span class="badge bg-danger"
                                                                style="color: #fff;">{{ __('Mới') }}</span>
                                                        @elseif($orderList['order_status'] == 'Da Huy')
                                                            <span class="badge bg-warning"
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
                                                {{-- <td>{{ $orderList['payment_method'] }} </td> --}}
                                                <td>
                                                    @if ($orderList['payment_method'] == 'COD')
                                                        <span class="badge bg-info"
                                                            style="color: #fff;">{{ __('Tiền Mặt') }}</span>
                                                        {{-- @elseif ($orderList['payment_method'] == 'Paypal')
                                                        <span class="badge bg-warning "
                                                            style="color: #fff;">{{ __('Paypal') }}</span> --}}
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
                                    <tbody id="selected-orders"></tbody>

                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
