<?php use App\Models\Product; ?>

@extends('admin.layout.layout')
@section('content')
    <div class="main-panel">
        <div class="content-wrapper">
            @if (Session::has('success_message'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>{{ __('Thành Công') }}:</strong> {{ Session::get('success_message') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
            <div class="row">
                <div class="col-md-12 grid-margin">
                    <div class="row">
                        <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                            <h3 class="font-weight-bold">{{ __('Chi tiết đơn hàng số') }} #{{ $orderDetails['id'] }} </h3>
                            <h6 class="font-weight-normal mb-0"> <a
                                    href="{{ url('admin/order') }}">{{ __('Quay trở lại bảng danh danh sách đơn đặt hàng') }}
                            </h6>
                        </div>
                        <div class="col-12 col-xl-4">
                            <div class="justify-content-end d-flex">
                                <div class="dropdown flex-md-grow-1 flex-xl-grow-0">
                                    <button class="btn btn-sm btn-light bg-white dropdown-toggle" type="button"
                                        id="dropdownMenuDate2" data-toggle="dropdown" aria-haspopup="true"
                                        aria-expanded="true">
                                        <i class="mdi mdi-calendar"></i> Today (10 Jan 2021)
                                    </button>
                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuDate2">
                                        <a class="dropdown-item" href="#">January - March</a>
                                        <a class="dropdown-item" href="#">March - June</a>
                                        <a class="dropdown-item" href="#">June - August</a>
                                        <a class="dropdown-item" href="#">August - November</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">{{ __('Chi tiết đơn đặt hàng') }}</h4>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group" style="height: 15px;">
                                        <label style="font-weight: 550;"><strong>{{ __('ID Đặt Hàng:') }}</strong></label>
                                        <label>#{{ $orderDetails['id'] }}</label>
                                    </div>
                                    <div class="form-group" style="height: 15px;">
                                        <label style="font-weight: 550;"><strong>{{ __('Ngày Đặt Hàng:') }}</strong></label>
                                        <label>{{ date('Y-m-d h:i:s', strtotime($orderDetails['created_at'])) }}</label>
                                    </div>
                                    <div class="form-group" style="height: 15px;">
                                        <label
                                            style="font-weight: 550;"><strong>{{ __('Tình trạng đặt hàng:') }}</strong></label>
                                        <label>{{ $orderDetails['order_status'] }}</label>
                                    </div>
                                    <div class="form-group" style="height: 15px;">
                                        <label
                                            style="font-weight: 550;"><strong>{{ __('Tổng số tiền đặt hàng:') }}</strong></label>
                                        <label>{{ $orderDetails['grand_total'] }}.đ</label>
                                    </div>
                                    <div class="form-group" style="height: 15px;">
                                        <label
                                            style="font-weight: 550;"><strong>{{ __('Phí vận chuyển:') }}</strong></label>
                                        <label>{{ $orderDetails['shipping_charges'] }}.đ</label>
                                    </div>
                                    @if (!empty($orderDetails['coupon_code']))
                                        <div class="form-group" style="height: 15px;">
                                            <label
                                                style="font-weight: 550;"><strong>{{ __('Mã Giảm Giá:') }}</strong></label>
                                            <label>{{ $orderDetails['coupon_code'] }}</label>
                                        </div>
                                        <div class="form-group" style="height: 15px;">
                                            <label
                                                style="font-weight: 550;"><strong>{{ __('Số tiền được giảm:') }}</strong></label>
                                            <label>{{ $orderDetails['coupon_amount'] }}</label>
                                        </div>
                                    @endif
                                    <div class="form-group" style="height: 15px;">
                                        <label
                                            style="font-weight: 550;"><strong>{{ __('Phương thức thanh toán:') }}</strong></label>
                                        <label>{{ $orderDetails['payment_method'] }}</label>
                                    </div>
                                    <div class="form-group" style="height: 15px;">
                                        <label
                                            style="font-weight: 550;"><strong>{{ __('Cổng thanh toán:') }}</strong></label>
                                        <label>{{ $orderDetails['payment_gateway'] }}</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">{{ __('Chi Tiết Khách Hàng ') }}</h4>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group" style="height: 15px;">
                                        <label style="font-weight: 550;"><strong>{{ __('Tên:') }}</strong></label>
                                        <label>{{ $userDetails['name'] }}</label>
                                    </div>
                                    @if (!empty($userDetails['address']))
                                        <div class="form-group" style="height: 15px;">
                                            <label style="font-weight: 550;"><strong>{{ __('Địa Chỉ:') }}</strong></label>
                                            <label>{{ $userDetails['address'] }}</label>
                                        </div>
                                    @endif
                                    @if (!empty($userDetails['city']))
                                        <div class="form-group" style="height: 15px;">
                                            <label
                                                style="font-weight: 550;"><strong>{{ __('Thành Phố:') }}</strong></label>
                                            <label>{{ $userDetails['city'] }}</label>
                                        </div>
                                    @endif
                                    @if (!empty($userDetails['state']))
                                        <div class="form-group" style="height: 15px;">
                                            <label
                                                style="font-weight: 550;"><strong>{{ __('Tình Trạng:') }}</strong></label>
                                            <label>{{ $userDetails['state'] }}</label>
                                        </div>
                                    @endif
                                    @if (!empty($userDetails['country']))
                                        <div class="form-group" style="height: 15px;">
                                            <label style="font-weight: 550;"><strong>{{ __('Quốc Gia:') }}</strong></label>
                                            <label>{{ $userDetails['country'] }}</label>
                                        </div>
                                    @endif
                                    @if (!empty($userDetails['pincode']))
                                        <div class="form-group" style="height: 15px;">
                                            <label style="font-weight: 550;"><strong>{{ __('Mã Code:') }}</strong></label>
                                            <label>{{ $userDetails['pincode'] }}</label>
                                        </div>
                                    @endif
                                    <div class="form-group" style="height: 15px;">
                                        <label
                                            style="font-weight: 550;"><strong>{{ __('Số Điện Thoại:') }}</strong></label>
                                        <label>{{ $userDetails['phone'] }}</label>
                                    </div>
                                    <div class="form-group" style="height: 15px;">
                                        <label style="font-weight: 550;"><strong>{{ __('Email:') }}</strong></label>
                                        <label>{{ $userDetails['email'] }}</label>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">{{ __('Địa Chỉ Giao Hàng ') }}</h4>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group" style="height: 15px;">
                                        <label style="font-weight: 550;"><strong>{{ __('Tên:') }}</strong></label>
                                        <label>{{ $orderDetails['name'] }}</label>
                                    </div>
                                    @if (!empty($orderDetails['address']))
                                        <div class="form-group" style="height: 15px;">
                                            <label style="font-weight: 550;"><strong>{{ __('Địa Chỉ:') }}</strong></label>
                                            <label>{{ $orderDetails['address'] }}</label>
                                        </div>
                                    @endif
                                    @if (!empty($orderDetails['city']))
                                        <div class="form-group" style="height: 15px;">
                                            <label
                                                style="font-weight: 550;"><strong>{{ __('Thành Phố:') }}</strong></label>
                                            <label>{{ $orderDetails['city'] }}</label>
                                        </div>
                                    @endif
                                    @if (!empty($orderDetails['state']))
                                        <div class="form-group" style="height: 15px;">
                                            <label
                                                style="font-weight: 550;"><strong>{{ __('Tình Trạng:') }}</strong></label>
                                            <label>{{ $orderDetails['state'] }}</label>
                                        </div>
                                    @endif
                                    @if (!empty($orderDetails['country']))
                                        <div class="form-group" style="height: 15px;">
                                            <label
                                                style="font-weight: 550;"><strong>{{ __('Quốc Gia:') }}</strong></label>
                                            <label>{{ $orderDetails['country'] }}</label>
                                        </div>
                                    @endif
                                    @if (!empty($orderDetails['pincode']))
                                        <div class="form-group" style="height: 15px;">
                                            <label style="font-weight: 550;"><strong>{{ __('Mã Code:') }}</strong></label>
                                            <label>{{ $orderDetails['pincode'] }}</label>
                                        </div>
                                    @endif
                                    <div class="form-group" style="height: 15px;">
                                        <label
                                            style="font-weight: 550;"><strong>{{ __('Số Điện Thoại:') }}</strong></label>
                                        <label>{{ $orderDetails['phone'] }}</label>
                                    </div>
                                    <div class="form-group" style="height: 15px;">
                                        <label style="font-weight: 550;"><strong>{{ __('Email:') }}</strong></label>
                                        <label>{{ $orderDetails['email'] }}</label>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">{{ __(' Cập Nhật Trạng Thái Đơn Hàng') }}</h4>
                            @if(Auth::guard('admin')->user()->type!="vendor")
                            <form action="{{ url('admin/update-order-status') }}" method="post">
                                @csrf
                                <input type="hidden" name="order_id" value="{{ $orderDetails['id'] }}">
                                <select class="form-control text-dark" name="order_status" required>
                                    <option value="">{{ __('Chọn') }}</option>
                                    @foreach ($orderStatus as $status)
                                        <option value="{{ $status['name'] }}"
                                            @if (!empty($orderDetails['order_status']) && $orderDetails['order_status'] == $status['name']) selected="" @endif>{{ $status['name'] }}
                                        </option>
                                    @endforeach
                                </select>
                                <button type="submit" class="btn btn-success mt-3">{{ __('Cập Nhật') }}</button>
                            </form>
                            @else
                               <h6>{{ __('Tính năng này bị hạn chế') }}</h6>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">{{ __('Sản Phẩm Đã Đặt ') }}</h4>
                            <table class="table table-striped table-borderless">
                                <tr>
                                    <td>{{ __('Ảnh Sản Phẩm') }}</td>
                                    <td>{{ __('Mã Sản Phẩm') }}</td>
                                    <td>{{ __('Tên Sản Phẩm') }}</td>
                                    <td>{{ __('Kích Thước Sản Phẩm') }}</td>
                                    <td>{{ __('Màu Sản Phẩm') }}</td>
                                    <td>{{ __('Sô Lượng Sản Phẩm') }}</td>
                                    <td>{{ __('Item Status') }}</td>
                                </tr>
                                @foreach ($orderDetails['orders_products'] as $product)
                                    <tr>
                                        <td>
                                            @php $getProductImage = Product::getProductImage($product['product_id'])@endphp
                                            <a href="{{ url('product/' . $product['product_id']) }}">
                                                <img
                                                    src="{{ asset('front/images/product_images/small/' . $getProductImage) }}"></a>
                                        </td>
                                        <td>{{ $product['product_code'] }}</td>
                                        <td>{{ $product['product_name'] }}</td>
                                        <td>{{ $product['product_size'] }}</td>
                                        <td>{{ $product['product_color'] }}</td>
                                        <td>{{ $product['product_qty'] }}</td>
                                        <td>
                                            <form action="{{ url('admin/update-order-item-status') }}" method="post">
                                                @csrf
                                                <input type="hidden" name="order_item_id" value="{{ $product['id'] }}">
                                                <select class="py-2" name="order_item_status" required>
                                                    <option value="">{{ __('Chọn') }}</option>
                                                    @foreach ( $orderItemStatus as $statusItem )
                                                    <option value="{{ $statusItem['name'] }}" @if(!empty($product['item_status'])
                                                    && $product['item_status']== $statusItem['name']) selected="" @endif>{{ $statusItem['name'] }}</option>

                                                    @endforeach
                                                </select>
                                                <button type="submit" class="btn btn-success">{{ __('Cập Nhật') }}</button>
                                            </form>
                                        </td>

                                    </tr>
                                @endforeach
                            </table>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->
        @include('admin.layout.footer')
        <!-- partial -->
    </div>
@endsection
