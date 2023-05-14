@extends('admin/layout/layout')
@section('content')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-md-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">{{ $title }}</h4>
                            @if (Session::has('error_message'))
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    <strong>{{ __('Lỗi') }}:</strong> {{ Session::get('error_message') }}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @endif
                            @if (Session::has('success_message'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <strong>{{ __('Thành Công') }}:</strong> {{ Session::get('success_message') }}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @endif
                            @if ($errors->any())
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </div>
                            @endif
                            <form class="forms-sample"
                                @if (empty($coupon['id'])) action="{{ url('admin/add-edit-coupon') }}"
                            @else action="{{ url('admin/add-edit-coupon/' . $coupon['id']) }}" @endif
                                method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6">
                                        @if (empty($coupon['coupon_code']))
                                            <div class="form-group">
                                                <label for="coupon_option">{{ __('messages.coupons.coupon_option') }}</label><br>
                                                <span>
                                                    <input type="radio" id="AutomaticCoupon" name="coupon_option"
                                                        value="Automatic"
                                                        checked="">&nbsp;{{ __('messages.coupons.auto_code') }}&nbsp;&nbsp;
                                                </span>
                                                <span>
                                                    <input type="radio" id="ManualCoupon" name="coupon_option"
                                                        value="Manual">&nbsp;{{ __('messages.coupons.enter_code') }}&nbsp;&nbsp;
                                                </span>
                                            </div>
                                            <div class="form-group" style="display: none;" id="couponField">
                                                <label for="coupon_code">{{ __('messages.coupons.code_coupons') }}</label>
                                                <input type="text" class="form-control" name="coupon_code"
                                                    id="coupon_code">
                                            </div>
                                        @else
                                            <input type="hidden" name="coupon_option"
                                                value="{{ $coupon['coupon_option'] }}">
                                            <input type="hidden" name="coupon_code" value="{{ $coupon['coupon_code'] }}">
                                            <div>
                                                <strong for="coupon_code">{{ __('messages.coupons.code_coupons') }}</strong>
                                                <span>{{ $coupon['coupon_code'] }}</span>
                                            </div>
                                        @endif
                                        <div class="form-group">
                                            <label for="coupon_type">{{ __('messages.coupons.type_coupons') }}</label><br>
                                            <span>
                                                <input type="radio" name="coupon_type" value="Multiple Time"
                                                    @if (isset($coupon['coupon_type']) && $coupon['coupon_type'] == 'Multiple Time') checked="" @endif>&nbsp;{{ __('Multiple Time') }}&nbsp;&nbsp;

                                            </span>
                                            <span>
                                                <input type="radio" name="coupon_type" value="Single Time"
                                                    @if (isset($coupon['coupon_type']) && $coupon['coupon_type'] == 'Single Time') checked="" @endif>&nbsp;{{ __('Single Time') }}&nbsp;&nbsp;
                                            </span>
                                        </div>

                                        <div class="form-group">
                                            <label for="amount_type">{{ __('messages.coupons.discount_currency') }}</label><br>
                                            <span>
                                                <input type="radio" name="amount_type"
                                                    value="Percentage"@if (isset($coupon['amount_type']) && $coupon['amount_type'] == 'Percentage') checked="" @endif>&nbsp;{{ __('Tỷ Lệ Phần Trăm') }}&nbsp;{{ __('- (Tính Bằng %)') }}&nbsp;
                                            </span><br><br>
                                            <span>
                                                <input type="radio" name="amount_type" value="Fixed"
                                                    @if (isset($coupon['amount_type']) && $coupon['amount_type'] == 'Fixed') checked="" @endif>&nbsp;{{ __('Cố Định') }}&nbsp;{{ __('- (Tính Bằng VNĐ)') }}
                                            </span>
                                        </div>
                                        <div class="form-group">
                                            <label for="amount">{{ __('messages.coupons.number') }}</label>
                                            <input type="text" class="form-control" name="amount" id="amount"
                                                @if (isset($coupon['amount'])) value="{{ $coupon['amount'] }}"
                                                @else
                                            value="{{ old('amount') }}"
                                            @endif>
                                        </div>
                                        <div class="form-group">
                                            <label for="categories">{{ __('messages.coupons.select_category') }}</label>
                                            <select name="categories[]" class="form-control text-dark" multiple="">
                                                @foreach ($categories as $section)
                                                    <optgroup label="{{ $section['name'] }}"></optgroup>
                                                    @foreach ($section['categories'] as $category)
                                                        <option value="{{ $category['id'] }}"
                                                            @if (in_array($category['id'], $selCats)) selected="" @endif>&nbsp;
                                                            &nbsp;
                                                            &nbsp;--&nbsp;{{ $category['category_name'] }}
                                                        </option>
                                                        @foreach ($category['subcategories'] as $subcategory)
                                                            <option value="{{ $subcategory['id'] }}"
                                                                @if (in_array($subcategory['id'], $selCats)) selected="" @endif>
                                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;--&nbsp;
                                                                {{ $subcategory['category_name'] }}</option>
                                                        @endforeach
                                                    @endforeach
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="brands">{{ __('messages.coupons.select_brand') }}</label>
                                            <select name="brands[]" class="form-control text-dark" multiple="">
                                                @foreach ($brands as $brand)
                                                    <option value="{{ $brand['id'] }}"
                                                        @if (in_array($brand['id'], $selBrands)) selected="" @endif>
                                                        {{ $brand['name'] }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="users">{{ __('messages.coupons.select_user') }}</label>
                                            <select name="users[]" class="form-control text-dark" multiple="">
                                                @foreach ($users as $user)
                                                    <option value="{{ $user['email'] }}"
                                                        @if (in_array($user['email'], $selUsers)) selected="" @endif>
                                                        {{ $user['email'] }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="expiry_date">{{ __('messages.coupons.expiration_date') }}</label>
                                            <input type="date" class="form-control" id="expiry_date"
                                                name="expiry_date"
                                                @if (isset($coupon['expiry_date'])) value="{{ $coupon['expiry_date'] }}"
                                                    @else

                                                value="{{ old('expiry_date') }}"
                                                @endif>
                                        </div>

                                    </div>

                                </div>
                                <button type="submit"
                                    class="btn btn-primary mr-2 float-right">{{ __('Lưu') }}</button>
                                <a class="btn btn-danger" href="{{ url('admin/coupons') }}">{{ __('Quay lai') }}</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- content-wrapper ends -->
        <!-- partial:../../partials/_footer.html -->
        @include('admin.layout.footer')
        <!-- partial -->
    </div>
@endsection
