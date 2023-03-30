<?php use App\Models\Product; ?>

<!-- Products-List-Wrapper -->
<div class="table-wrapper u-s-m-b-60">
    <table>
        <thead>
            <tr>
                <th>{{ __('Sản Phẩm') }}</th>
                <th>{{ __('Giá Tiền') }}</th>
                <th>{{ __('Số Lượng') }}</th>
                <th>{{ __('Tổng Tiền') }}</th>
                <th>{{ __('Hành Động') }}</th>


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
                                    {{ __('Màu:') }} {{ $item['product']['product_color'] }}

                                </h6>
                            </a>
                        </div>
                    </td>
                    <td>
                        <div class="cart-price">
                            @if ($getDiscountAttributePrice['discount'] > 0)
                                <div class="price-template">
                                    <div class="item-new-price">
                                        {{ $getDiscountAttributePrice['final_price'] }}đ
                                    </div>
                                    <div class="item-old-price" style="margin-left:-40px;">
                                        {{ $getDiscountAttributePrice['product_price'] }}đ
                                    </div>
                                </div>
                            @else
                                <div class="price-template">
                                    <div class="item-new-price">
                                        {{ $getDiscountAttributePrice['final_price'] }}đ
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
                            {{ $getDiscountAttributePrice['final_price'] * $item['quantity'] }}đ
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
<!-- Products-List-Wrapper /- -->
<!-- Coupon -->
<div class="coupon-continue-checkout u-s-m-b-60">
    <div class="coupon-area">
        <h6>{{ __('Nhập mã phiếu giảm giá của bạn nếu bạn có') }}</h6>
        <div class="coupon-field">
            <form id="applyCoupon" method="post" action="javascript:void(0);"
            @if(Auth::check()) user="1" @endif>
            @csrf
                <label class="sr-only" for="coupon-code">{{ __('Áp dụng phiếu giảm giá') }}</label>
                <input id="code" name="code" type="text" class="text-field" placeholder="Coupon Code">
                <button type="submit" class="button">{{ __('Áp dụng phiếu giảm giá') }}</button>
            </form>
        </div>
    </div>
    <div class="button-area">
        <a href="shop-v1-root-category.html" class="continue">Continue Shopping</a>
        <a href="checkout.html" class="checkout">Proceed to Checkout</a>
    </div>
</div>
<!-- Coupon /- -->

<!-- Billing -->
<div class="calculation u-s-m-b-60">
    <div class="table-wrapper-2">
        <table>
            <thead>
                <tr>
                    <th colspan="2">{{ __('Tổng số giỏ hàng') }}</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>
                        <h3 class="calc-h3 u-s-m-b-0">{{ __('Tổng tiền chưa giảm') }}</h3>
                    </td>
                    <td>
                        <span class="calc-text">{{ $total_price }}.đ</span>
                    </td>
                </tr>
                <tr>
                    <td>
                        <h3 class="calc-h3 u-s-m-b-0">{{ __('Phiếu Giảm Giá') }}</h3>
                    </td>
                    <td>
                        <span class="calc-text couponAmount">
                            @if(Session::has('couponAmount'))
                            {{ Session::get('couponAmount') }}.đ
                            @else{
                                0.đ
                            }
                            @endif
                        </span>
                    </td>
                </tr>
                <tr>
                    <td>
                        <h3 class="calc-h3 u-s-m-b-0">{{ __('Tổng Cộng') }}</h3>
                    </td>
                    <td>
                        <span class="calc-text grand_total">{{ $total_price - Session::get('couponAmount') }}.đ</span>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
<!-- Billing /- -->
