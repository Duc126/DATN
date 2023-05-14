
    <h4 class="section-h4 deliveryText">{{ __('messages.checkout.add_new_address') }}</h4>
    <div class="u-s-m-b-24">
        <input type="checkbox" class="check-box" id="ship-to-different-address" data-toggle="collapse"
            data-target="#showDifferent">
    @if (count($deliveryAddress) > 0)

        <label class="label-text newAddress"
            for="ship-to-different-address">{{ __('Vận chuyển đến một địa chỉ khác?') }}</label>
        @else
        <label class="label-text newAddress"
        for="ship-to-different-address">{{ __('Kiểm tra để thêm địa chỉ giao hàng') }}</label>
        @endif
        </div>
    <div class="collapse" id="showDifferent">
        <!-- Form-Fields -->
        <p id="delivery-error"></p>
        <p id="delivery-success"></p>

        <form id="addressAddEditForm" action="javascript:;" method="post">
            @csrf
            <input type="hidden" name="delivery_id">
            <div class="group-inline u-s-m-b-13">
                <div class="group-1 u-s-p-r-16">
                    <label for="delivery_name">{{ __('messages.table.name') }}
                        <span class="astk">*</span>
                    </label>
                    <input type="text" id="delivery_name" name="delivery_name" class="text-field">
                    <p id ="delivery-delivery_name"></p>
                </div>
                <div class="group-2">
                    <label for="delivery_address">{{ __('messages.delivery-address.address') }}
                        <span class="astk">*</span>
                    </label>
                    <input type="text" name="delivery_address" id="delivery_address" class="text-field">
                    <p id ="delivery-delivery_address"></p>

                </div>
            </div>
            <div class="group-inline u-s-m-b-13">
                <div class="group-1 u-s-p-r-16">
                    <label for="delivery_city">{{ __('messages.list-user.city') }}
                        <span class="astk">*</span>
                    </label>
                    <input type="text" name="delivery_city" id="delivery_city" class="text-field">
                    <p id ="delivery-delivery_city"></p>

                </div>
                {{-- <div class="group-2">
                    {{-- <label for="delivery_state">{{ __('messages.delivery-address.province') }}
                        <span class="astk">*</span>
                    </label>
                    <input type="text" name="delivery_state" id="delivery_state" class="text-field">
                    <p id ="delivery-delivery_state"></p> --}}


                {{-- </div> --}}
                <div class="u-s-m-b-13">

                    <label for="select-country-extra">{{ __('messages.delivery-address.province') }}
                        <span class="astk">*</span>
                    </label>
                    <div class="select-box-wrapper">
                        <select class="select-box" id="delivery_state" name="delivery_state">
                            <option value="">{{ __('Chọn Tỉnh') }}</option>
                            @foreach ($shippingState as $shipping)
                                <option value="{{ $shipping['state'] }}" @if ($shipping['state']
                                 == Auth::user()->shipping) selected @endif>
                                    {{ $shipping['state'] }}
                                </option>
                            @endforeach
                        </select>
                        <p id ="delivery-delivery_state"></p>

                    </div>
                </div>
            </div>
            <div class="u-s-m-b-13">

                <label for="select-country-extra">{{ __('Quốc Gia') }}
                    <span class="astk">*</span>
                </label>
                <div class="select-box-wrapper">
                    <select class="select-box" id="delivery_country" name="delivery_country">
                        <option value="">{{ __('Chọn Quốc Gia') }}</option>
                        @foreach ($countries as $country)
                            <option value="{{ $country['country_name'] }}" @if ($country['country_name']
                             == Auth::user()->country) selected @endif>
                                {{ $country['country_name'] }}
                            </option>
                        @endforeach
                    </select>
                    <p id ="delivery-delivery_country"></p>

                </div>
            </div>

            <div class="u-s-m-b-13">
                <label for="delivery_pincode">{{ __('Mã Pin') }}
                    <span class="astk"> *</span>
                </label>
                <input type="text" id="delivery_pincode" name="delivery_pincode" class="text-field">
                <p id ="delivery-delivery_pincode"></p>

            </div>
            <div class="u-s-m-b-13">
                <label for="delivery_phone">{{ __('messages.delivery-address.phone') }}
                    <span class="astk">*</span>
                </label>
                <input type="text" id="delivery_phone" name="delivery_phone" class="text-field">
                <p id ="delivery-delivery_phone"></p>

            </div>
            <div class="u-s-m-b-13">
                <button style="width:100%;" type="submit" class="button button-outline-secondary"
                    id="btnShipping">{{ __('messages.save') }}</button>
            </div>
        </form>
        <!-- Form-Fields /- -->
    </div>
