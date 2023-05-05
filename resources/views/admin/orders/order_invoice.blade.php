<link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<div class="container">
    <div class="row">
        <div class="col-xs-12">
            <div class="invoice-title">
                <h2>{{ __('Hóa Đơn') }}</h2>
                <h3 class="pull-right">{{ __('Hóa Đơn') }} #{{ $orderDetails['id'] }}
                    <?php echo DNS1D::getBarcodeHTML($orderDetails['id'], 'C39'); ?>
                </h3>
            </div>
            <hr>
            <div class="row">
                <div class="col-xs-6">
                    <address>
                        <strong>{{ __('Hóa đơn cho') }}</strong><br>
                        {{ $userDetails['name'] }}<br>
                        @if (!empty($userDetails['address']))
                            {{ $userDetails['address'] }}-
                        @endif
                        @if (!empty($userDetails['city']))
                            {{ $userDetails['city'] }}-
                        @endif
                        @if (!empty($userDetails['state']))
                            {{ $userDetails['state'] }}-
                        @endif
                        @if (!empty($userDetails['country']))
                            {{ $userDetails['country'] }}<br>
                        @endif
                        @if (!empty($userDetails['pincode']))
                            {{ $userDetails['pincode'] }}<br>
                        @endif
                        {{ $userDetails['phone'] }}<br>

                    </address>
                </div>
                <div class="col-xs-6 text-right">
                    <address>
                        <strong>{{ __('Vận chuyển đến:') }}</strong><br>
                        {{ $orderDetails['name'] }}<br>
                        @if (!empty($orderDetails['address']))
                            {{ $orderDetails['address'] }}-
                        @endif
                        @if (!empty($orderDetails['city']))
                            {{ $orderDetails['city'] }}-
                        @endif
                        @if (!empty($orderDetails['state']))
                            {{ $orderDetails['state'] }}-
                        @endif
                        @if (!empty($orderDetails['country']))
                            {{ $orderDetails['country'] }}<br>
                        @endif
                        @if (!empty($orderDetails['pincode']))
                            {{ $orderDetails['pincode'] }}<br>
                        @endif
                        {{ $orderDetails['phone'] }}<br>
                    </address>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-6">
                    <address>
                        <strong>{{ __('Phương thức thanh toán:') }}</strong><br>
                        @if($orderDetails['payment_method'] == "Credit Card")
                        <span class="badge"
                        style="color: #fff; background: green;">{{ __('Thanh Toán Thẻ') }}</span>
                        @else
                        <span class="badge "
                        style="color: #fff; background: cadetblue;">{{ __('Tiền Mặt') }}</span>
                        @endif

                        {{-- {{ $orderDetails['payment_method'] == "Credit Card" }} --}}
                    </address>
                </div>
                <div class="col-xs-6 text-right">
                    <address>
                        <strong>{{ __('Ngày đặt hàng:') }}</strong><br>
                        {{ date('Y-m-d h:i:s', strtotime($orderDetails['created_at'])) }}

                        <br><br>
                    </address>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title"><strong>{{ __('Danh Sách Sản Phẩm Đã Đặt') }}</strong></h3>
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-condensed">
                            <thead>
                                <tr>
                                    <td><strong>{{ __('Mã Sản Phẩm') }}</strong></td>
                                    <td class="text-center"><strong>{{ __('Kích Thước') }}</strong></td>
                                    <td class="text-center"><strong>{{ __('Màu') }}</strong></td>
                                    <td class="text-right"><strong>{{ __('Giá') }}</strong></td>
                                    <td class="text-center"><strong>{{ __('Số Lượng') }}</strong></td>
                                    <td class="text-right"><strong>{{ __('Tổng Cộng') }}</strong></td>

                                </tr>
                            </thead>
                            <tbody>
                                <!-- foreach ($order->lineItems as $line) or some such thing here -->
                                @php $subTotal = 0 @endphp
                                @foreach ($orderDetails['orders_products'] as $product)
                                    <tr>
                                        <td>{{ $product['product_code'] }}
                                            <?php echo DNS1D::getBarcodeHTML($product['product_code'], 'C39'); ?>
                                        </td>
                                        <td class="text-center">{{ $product['product_size'] }}</td>
                                        <td class="text-center">{{ $product['product_color'] }}</td>
                                        <td class="text-right">
                                            {{ number_format($product['product_price'], 0, '.', '.') }} VNĐ
                                        </td>
                                        <td class="text-center">{{ $product['product_qty'] }}</td>
                                        <td class="text-right">
                                            {{ number_format($product['product_price'] * $product['product_qty'], 0, '.', '.') }} VNĐ

                                            {{-- {{ $product['product_price'] * $product['product_qty'] }}.VNĐ --}}
                                        </td>
                                    </tr>
                                    @php $subTotal = $subTotal + ($product['product_price'] * $product['product_qty']) @endphp
                                @endforeach


                                <tr>
                                    <td class="thick-line"></td>
                                    <td class="thick-line"></td>
                                    <td class="thick-line"></td>
                                    <td class="thick-line"></td>
                                    <td class="thick-line text-right"><strong>{{ __('Tổng chưa áp dụng mã') }}</strong>
                                    </td>
                                    <td class="thick-line text-right">
                                        {{ number_format($subTotal, 0, '.', '.') }} VNĐ

                                        {{-- {{ $subTotal }}.VNĐ --}}
                                    </td>
                                </tr>
                                <tr>
                                    <td class="no-line"></td>
                                    <td class="no-line"></td>
                                    <td class="no-line"></td>
                                    <td class="no-line"></td>
                                    <td class="no-line text-right"><strong>{{ __('Chi phí vận chuyển') }}</strong></td>
                                    <td class="no-line text-right">0.VNĐ</td>
                                </tr>
                                <tr>
                                    <td class="no-line"></td>
                                    <td class="no-line"></td>
                                    <td class="no-line"></td>
                                    <td class="no-line"></td>
                                    <td class="no-line text-right"><strong>{{ __('Tổng Cộng') }}</strong></td>
                                    <td class="no-line text-right">
                                        <strong>
                                        {{ number_format($orderDetails['grand_total'], 0, '.', '.') }} VNĐ

                                            {{-- {{ $orderDetails['grand_total'] }}.VNĐ --}}
                                        </strong>
                                        <br>

                                        @if ($orderDetails['payment_method'] == 'Credit Card')
                                            <font color="red">{{ __('(Đã thanh toán)') }}</font>
                                        @endif
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
