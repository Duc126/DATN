<?php use App\Models\Product; ?>

<!-- Products-List-Wrapper -->
<div class="table-wrapper u-s-m-b-60">
    <table>
        <thead>
            <tr>
                <th>{{ __('messages.cart.product') }}</th>
                <th>{{ __('messages.cart.price') }}</th>
                <th>{{ __('messages.cart.quantity') }}</th>
                <th>{{ __('messages.cart.total_price') }}</th>
                <th>{{ __('messages.table.action') }}</th>


            </tr>
        </thead>
        <tbody>
            @php $total_price = 0 @endphp
            @foreach ($getCartItems as $item)
                <?php $getDiscountAttributePrice = Product::getDiscountAttributePrice($item['product_id'], $item['size']);
                // echo "<pre>"; print_r($getDiscountAttributePrice);die;
                ?>
                <tr>
                    <td>
                        <div class="cart-anchor-image">
                            <a href="{{ url('product/' . $item['product_id']) }}">
                                <img src="{{ asset('front/images/product_images/small/' . $item['product']['product_image']) }}"
                                    alt="Product">
                                <h6>
                                    {{ $item['product']['product_name'] }}
                                    ({{ $item['product']['product_code'] }})
                                    -
                                    {{ $item['size'] }}<br>
                                    {{ __('messages.cart.color') }}: {{ $item['product']['product_color'] }}

                                </h6>
                            </a>
                        </div>
                    </td>
                    <td>
                        <div class="cart-price">
                            @if ($getDiscountAttributePrice['discount'] > 0)
                                <div class="price-template">
                                    <div class="item-new-price">
                                        {{-- {{ $getDiscountAttributePrice['final_price'] }}đ --}}
                                        {{ number_format($getDiscountAttributePrice['final_price'], 0, '.', '.') }} VNĐ

                                    </div>
                                    <div class="item-old-price" style="margin-left:-40px;">
                                        {{ $getDiscountAttributePrice['product_price'] }}đ
                                        {{ number_format($getDiscountAttributePrice['product_price'], 0, '.', '.') }} VNĐ

                                    </div>
                                </div>
                            @else
                                <div class="price-template">
                                    <div class="item-new-price">
                                        {{-- {{ $getDiscountAttributePrice['final_price'] }}đ --}}
                                        {{ number_format($getDiscountAttributePrice['final_price'], 0, '.', '.') }} VNĐ

                                    </div>
                                </div>
                            @endif
                        </div>
                    </td>
                    <td>
                        <div class="cart-quantity">
                            <div class="quantity">
                                <input type="text" class="quantity-text-field" value="{{ $item['quantity'] }}">
                                <a class="plus-a updateCartItem" data-cartid="{{ $item['id'] }}"
                                    data-qty="{{ $item['quantity'] }}" data-max="1000">&#43;</a>
                                <a class="minus-a updateCartItem" data-cartid="{{ $item['id'] }}"
                                    data-qty="{{ $item['quantity'] }}" data-min="1">&#45;</a>
                            </div>
                        </div>
                    </td>
                    <td>
                        <div class="cart-price">
                            {{-- {{ $getDiscountAttributePrice['final_price'] * $item['quantity'] }}đ --}}
                            {{ number_format($getDiscountAttributePrice['final_price'] * $item['quantity'], 0, '.', '.') }} VNĐ

                        </div>
                    </td>
                    <td>
                        <div class="action-wrapper">
                            {{-- <button class="button button-outline-secondary fas fa-sync"></button> --}}
                            <button class="button button-outline-secondary fas fa-trash deleteCartItem"
                                data-cartid="{{ $item['id'] }}"></button>
                        </div>
                    </td>
                </tr>
                @php $total_price = $total_price + ($getDiscountAttributePrice['final_price'] * $item['quantity']) @endphp
            @endforeach

        </tbody>
    </table>
</div>


<!-- Billing -->
<div class="calculation u-s-m-b-60">
    <div class="table-wrapper-2">
        <table>
            <thead>
                <tr>
                    <th colspan="2">{{ __('messages.cart.total_shoppig_cart') }}</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>
                        <h3 class="calc-h3 u-s-m-b-0">{{ __('messages.cart.total_amount_decreased') }}</h3>
                        {{-- {{ number_format($getDiscountPrice, 0, '.', '.') }} VNĐ --}}

                    </td>
                    <td>
                        <span class="calc-text">{{ number_format($total_price, 0, '.', '.') }} VNĐ</span>
                    </td>
                </tr>
                <tr>
                    <td>
                        <h3 class="calc-h3 u-s-m-b-0">{{ __('messages.cart.coupon') }}</h3>
                    </td>
                    <td>
                        <span class="calc-text couponAmount">
                            @if (Session::has('couponAmount'))
                                {{-- {{ Session::get('couponAmount') }}.VNĐ --}}
                                {{ number_format(Session::get('couponAmount'), 0, '.', '.') }} VNĐ

                            @else
                                0.VNĐ

                            @endif
                        </span>
                    </td>
                </tr>
                <tr>
                    <td>
                        <h3 class="calc-h3 u-s-m-b-0">{{ __('messages.cart.total') }}</h3>
                    </td>
                    <td>
                        <span class="calc-text grand_total">

                            {{ number_format($total_price - Session::get('couponAmount'), 0, '.', '.') }} VNĐ
                            {{-- {{ $total_price - Session::get('couponAmount') }}.VNĐ --}}
                        </span>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
<!-- Billing /- -->
