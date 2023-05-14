<?php use App\Models\Product;
use App\Models\OrderLogs; ?>

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
                <div class="col-md-6 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">{{ __('messages.order-detail.order-detail') }}</h4>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group" style="height: 15px;">
                                        <label style="font-weight: 550;"><strong>{{ __('messages.order-detail.id-order') }}:</strong></label>
                                        <label>#{{ $orderDetails['id'] }}</label>
                                    </div>
                                    <div class="form-group" style="height: 15px;">
                                        <label style="font-weight: 550;"><strong>{{ __('messages.order-detail.date-order') }}:</strong></label>
                                        <label>{{ date('d/m/Y H:i:s', strtotime($orderDetails['created_at'])) }}</label>
                                    </div>
                                    <div class="form-group" style="height: 15px;">
                                        <label
                                            style="font-weight: 550;"><strong>{{ __('messages.order-detail.status-order') }}</strong></label>
                                        <label>
                                            @if ($orderDetails['order_status'] == 'Van Chuyen')
                                                <span class="badge bg-secondary color-white"
                                                    style="color: #fff; background: #0633ED !important;">{{ __('messages.order-status.transport') }}</span>
                                            @elseif($orderDetails['order_status'] == 'Moi')
                                                <span class="badge bg-danger"
                                                    style="color: #fff; background: #E6B912 !important">{{ __('messages.order-status.new') }}</span>
                                            @elseif($orderDetails['order_status'] == 'Da Huy')
                                                <span class="badge bg-danger"
                                                    style="color: #fff;">{{ __('messages.order-status.cancelled') }}</span>
                                            @elseif($orderDetails['order_status'] == 'Dang Tien Hanh')
                                                <span class="badge bg-success"
                                                    style="color: #fff;">{{ __('messages.order-status.in-process') }}</span>
                                            @elseif($orderDetails['order_status'] == 'Da Giao Hang')
                                                <span class="badge bg-primary"
                                                    style="color: #fff;">{{ __('messages.order-status.delivered') }}</span>
                                            @else
                                                <span class="badge bg-info"
                                                    style="color: #fff;">{{ __('messages.order-status.pending') }}</span>
                                            @endif

                                        </label>
                                    </div>
                                    <div class="form-group" style="height: 15px;">
                                        <label
                                            style="font-weight: 550;"><strong>{{ __('messages.order-detail.total-price-order') }}:</strong></label>
                                        <label>
                                            {{ number_format($orderDetails['grand_total'], 0, '.', '.') }} VNĐ

                                            {{-- {{ $orderDetails['grand_total'] }}.VNĐ --}}

                                        </label>
                                    </div>
                                    <div class="form-group" style="height: 15px;">
                                        <label
                                            style="font-weight: 550;"><strong>{{ __('messages.order-detail.price-shipping') }}:</strong></label>
                                        <label>
                                            {{ number_format($orderDetails['shipping_charges'], 0, '.', '.') }} VNĐ

                                            {{-- {{ $orderDetails['shipping_charges'] }}.VNĐ --}}
                                        </label>
                                    </div>
                                    @if (!empty($orderDetails['coupon_code']))
                                        <div class="form-group" style="height: 15px;">
                                            <label
                                                style="font-weight: 550;"><strong>{{ __('messages.order-detail.code-coupons') }}:</strong></label>
                                            <label>{{ $orderDetails['coupon_code'] }}</label>
                                        </div>
                                        <div class="form-group" style="height: 15px;">
                                            <label
                                                style="font-weight: 550;"><strong>{{ __('messages.order-detail.amount-reduced') }}:</strong></label>
                                            <label>{{ $orderDetails['coupon_amount'] }}</label>
                                        </div>
                                    @endif
                                    <div class="form-group" style="height: 15px;">
                                        <label
                                            style="font-weight: 550;"><strong>{{ __('messages.order-detail.payment-method') }}:</strong></label>

                                        <label>

                                            @if ($orderDetails['payment_method'] == 'COD')
                                                <span class="badge bg-info color-white"
                                                    style="color: #fff;">{{ __('messages.table.cod') }}</span>
                                                {{-- @elseif($orderDetails['payment_method'] == 'Paypal')
                                                <span class="badge bg-warning"
                                                    style="color: #fff;">{{ __('Paypal') }}</span> --}}
                                            @else
                                                <span class="badge bg-success"
                                                    style="color: #fff;">{{ __('messages.table.credit_card') }}</span>
                                            @endif
                                        </label>

                                    </div>
                                    <div class="form-group" style="height: 15px;">
                                        <label
                                            style="font-weight: 550;"><strong>{{ __('messages.order-detail.payment-gateway') }}:</strong></label>

                                        <label>

                                            @if ($orderDetails['payment_gateway'] == 'COD')
                                                <span class="badge bg-info color-white"
                                                    style="color: #fff;">{{ __('messages.table.cod') }}</span>
                                                {{-- @elseif($orderDetails['payment_gateway'] == 'Paypal')
                                                <span class="badge bg-warning"
                                                    style="color: #fff;">{{ __('Paypal') }}</span> --}}
                                            @else
                                                <span class="badge bg-success"
                                                    style="color: #fff;">{{ __('messages.table.credit_card') }}</span>
                                            @endif
                                        </label>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">{{ __('messages.delivery-address.customer-detail') }}</h4>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group" style="height: 15px;">
                                        <label style="font-weight: 550;"><strong>{{ __('messages.delivery-address.name-customer') }}:</strong></label>
                                        <label>{{ $userDetails['name'] }}</label>
                                    </div>
                                    @if (!empty($userDetails['address']))
                                        <div class="form-group" style="height: 15px;">
                                            <label style="font-weight: 550;"><strong>{{ __('messages.delivery-address.address') }}:</strong></label>
                                            <label>{{ $userDetails['address'] }}</label>
                                        </div>
                                    @endif
                                    @if (!empty($userDetails['city']))
                                        <div class="form-group" style="height: 15px;">
                                            <label
                                                style="font-weight: 550;"><strong>{{ __('messages.delivery-address.city') }}:</strong></label>
                                            <label>{{ $userDetails['city'] }}</label>
                                        </div>
                                    @endif
                                    @if (!empty($userDetails['state']))
                                        <div class="form-group" style="height: 15px;">
                                            <label style="font-weight: 550;"><strong>{{ __('messages.delivery-address.province') }}:</strong></label>
                                            <label>{{ $userDetails['state'] }}</label>
                                        </div>
                                    @endif
                                    {{-- @if (!empty($userDetails['country']))
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
                                    @endif --}}
                                    <div class="form-group" style="height: 15px;">
                                        <label
                                            style="font-weight: 550;"><strong>{{ __('messages.delivery-address.phone') }}:</strong></label>
                                        <label>{{ $userDetails['phone'] }}</label>
                                    </div>
                                    <div class="form-group" style="height: 15px;">
                                        <label style="font-weight: 550;"><strong>{{ __('messages.delivery-address.email') }}:</strong></label>
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
                            <h4 class="card-title">{{ __('messages.delivery-address.delivery-address') }}</h4>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group" style="height: 15px;">
                                        <label style="font-weight: 550;"><strong>{{ __('messages.delivery-address.name') }}:</strong></label>
                                        <label>{{ $orderDetails['name'] }}</label>
                                    </div>
                                    @if (!empty($orderDetails['address']))
                                        <div class="form-group" style="height: 15px;">
                                            <label style="font-weight: 550;"><strong>{{ __('messages.delivery-address.address') }}:</strong></label>
                                            <label>{{ $orderDetails['address'] }}</label>
                                        </div>
                                    @endif
                                    @if (!empty($orderDetails['city']))
                                        <div class="form-group" style="height: 15px;">
                                            <label
                                                style="font-weight: 550;"><strong>{{ __('messages.delivery-address.city') }}:</strong></label>
                                            <label>{{ $orderDetails['city'] }}</label>
                                        </div>
                                    @endif
                                    @if (!empty($orderDetails['state']))
                                        <div class="form-group" style="height: 15px;">
                                            <label
                                                style="font-weight: 550;"><strong>{{ __('messages.delivery-address.province') }}:</strong></label>
                                            <label>{{ $orderDetails['state'] }}</label>
                                        </div>
                                    @endif
                                    {{-- @if (!empty($orderDetails['country']))
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
                                    @endif --}}
                                    <div class="form-group" style="height: 15px;">
                                        <label
                                            style="font-weight: 550;"><strong>{{ __('messages.delivery-address.phone') }}:</strong></label>
                                        <label>{{ $orderDetails['phone'] }}</label>
                                    </div>
                                    <div class="form-group" style="height: 15px;">
                                        <label style="font-weight: 550;"><strong>{{ __('messages.delivery-address.email') }}:</strong></label>
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
                            <h4 class="card-title">{{ __('messages.order-status.update') }}</h4>
                            @if (Auth::guard('admin')->user()->type != 'vendor')
                                <form action="{{ url('admin/update-order-status') }}" method="post">
                                    @csrf
                                    <input type="hidden" name="order_id" value="{{ $orderDetails['id'] }}">
                                    <select class="form-control text-dark" name="order_status" id="order_status"
                                        required>
                                        <option value="" selected="">{{ __('Chọn') }}</option>
                                        @foreach ($orderStatus as $status)
                                            <option value="{{ $status['name'] }}"
                                                @if (!empty($orderDetails['order_status']) && $orderDetails['order_status'] == $status['name']) selected="" @endif>{{ $status['name'] }}
                                            </option>
                                        @endforeach
                                    </select>

                                    <input class="form-group" type="text" name="courier_name" id="courier_name"
                                        placeholder="Tên chuyển phát nhanh">
                                    <input type="text" name="tracking_number" id="tracking_number"
                                        placeholder="Số Vận Chuyển">
                                    <button type="submit" class="btn btn-success mt-3">{{ __('messages.update') }}</button>
                                </form>
                                <br>
                                @foreach ($orderLog as $key => $log)
                                {{-- <?php var_dump($orderLog); ?> --}}
                                    {{-- <strong>{{ $log['order_status'] }}</strong> --}}
                                    @if($log['order_status'] == "Van Chuyen")
                                    <strong> {{ __('messages.order-status.transport') }}:</strong>
                                    @elseif($log['order_status'] == "Moi")
                                    <strong> {{ __('messages.order-status.new') }}:</strong>
                                    @elseif($log['order_status'] == "Chua Giai Quyet")
                                    <strong> {{ __('messages.order-status.pending') }}:</strong>
                                    @elseif($log['order_status'] == "Da Huy")
                                    <strong> {{ __('messages.order-status.cancelled') }}:</strong>
                                    @elseif($log['order_status'] == "Dang Tien Hanh")
                                    <strong> {{ __('messages.order-status.in-process') }}:</strong>
                                    @elseif($log['order_status'] == "Da Giao Hang")
                                    <strong> {{ __('messages.order-status.delivered') }}:</strong>
                                    @endif

                                    @if (isset($log['order_item_id']) && $log['order_item_id'] > 0)
                                        @php $getItemDetails = OrderLogs::getItemDetails($log['order_item_id']) @endphp
                                    <?php var_dump($getItemDetails); ?>

                                        {{ __('- Đối với mặt hàng') }}
                                        {{ $getItemDetails['product_code'] }}<br>
                                        @if (!empty($getItemDetails['courier_name']))
                                            <br><strong>{{ __('Tên đơn vị chuyển phát nhanh:') }}</strong><span>
                                                {{ $getItemDetails['courier_name'] }}</span><br>
                                        @endif
                                        @if (!empty($getItemDetails['tracking_number']))
                                            <strong>{{ __('Số Vận Chuyển:') }}</strong><span>
                                                {{ $getItemDetails['tracking_number'] }}</span><br>
                                        @endif
                                        {{-- @else
                                            @if (!empty($orderDetails['courier_name']))
                                                <br><strong>{{ __('Tên chuyển phát nhanh:') }}</strong><span>
                                                    {{ $orderDetails['courier_name'] }}</span><br>
                                            @endif
                                            @if (!empty($orderDetails['tracking_number']))
                                                <strong>{{ __('Số Vận Chuyển:') }}</strong><span>
                                                    {{ $orderDetails['tracking_number'] }}</span><br>
                                            @endif
                                        @endif --}}
                                    @endif
                                    {{-- @endif --}}

                                    {{ date('d/m/Y H:i:s', strtotime($log['created_at'])) }}<br>
                                    <hr>
                                @endforeach
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
                            <h4 class="card-title">{{ __('messages.order-product.order_product') }}</h4>
                            <table class="table table-striped table-borderless">
                                <tr>
                                    <td>{{ __('messages.order-product.product_image') }}</td>
                                    <td>{{ __('messages.order-product.code') }}</td>
                                    <td>{{ __('messages.order-product.name') }}</td>
                                    <td>{{ __('messages.order-product.size') }}</td>
                                    <td>{{ __('messages.order-product.color') }}</td>
                                    <td>{{ __('messages.order-product.quantity') }}</td>
                                    {{-- <td>{{ __('Trạng Thái Mặt Hàng') }}</td> --}}
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
                                        {{-- <td>
                                            <form action="{{ url('admin/update-order-item-status') }}" method="post">
                                                @csrf
                                                <input type="hidden" name="order_item_id" value="{{ $product['id'] }}">
                                                <select class="py-2" name="order_item_status" id="order_item_status"
                                                    required>
                                                    <option value="" selected="">{{ __('Chọn') }}</option>
                                                    @foreach ($orderItemStatus as $statusItem)
                                                        <option value="{{ $statusItem['name'] }}"
                                                            @if (!empty($product['item_status']) && $product['item_status'] == $statusItem['name']) selected="" @endif>
                                                            {{ $statusItem['name'] }}</option>
                                                    @endforeach
                                                </select>
                                                <input style="width:110px;" class="form-group" type="text"
                                                    name="item_courier_name" id="item_courier_name"
                                                    placeholder="Tên chuyển phát nhanh"
                                                    @if (!empty($product['courier_name'])) value="{{ $product['courier_name'] }}" @endif>
                                                <input style="width:110px;" class="form-group" type="text"
                                                    name="item_tracking_number" id="item_tracking_number"
                                                    placeholder="Số theo dõi"
                                                    @if (!empty($product['tracking_number'])) value="{{ $product['tracking_number'] }}" @endif>
                                                <button type="submit"
                                                    class="btn btn-success">{{ __('Cập Nhật') }}</button>
                                            </form>
                                        </td> --}}

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
