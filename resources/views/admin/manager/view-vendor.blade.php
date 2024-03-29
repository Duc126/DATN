@extends('admin.layout.layout')
@section('content')
    <div class="main-panel">
        <div class="content-wrapper">
            {{-- <div class="row">
                <div class="col-md-12 grid-margin">
                    <div class="row">
                        <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                            <h3 class="font-weight-bold">{{ __('Chi Tiết Nhân Viên') }}</h3>
                            <h6 class="font-weight-normal mb-0"> <a
                                    href="{{ url('admin/list-admin/vendor') }}">{{ __('Quay trở lại bảng danh sách nhân viên') }}
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
            </div> --}}

            <div class="row">
                <div class="col-md-6 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">{{ __('Chi tiết nhà cung cấp ') }}</h4>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleInputUsername1">{{ __('Địa chỉ Email') }}<span
                                                class="text-danger">*</span> :</label>
                                        <input type="text" class="form-control "
                                            value="{{ Auth::guard('admin')->user()->email }}" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">{{ __('Quyền') }}<span
                                                class="text-danger">*</span>
                                            :</label>
                                        <input type="text" class="form-control"
                                            value="{{ Auth::guard('admin')->user()->type }}" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label for="first_name">{{ __('Họ') }}<span class="text-danger">*</span>
                                            :</label>
                                        <input type="text" id="first_name" class="form-control" name="first_name"
                                            placeholder="Nhập Họ" value="{{ Auth::guard('admin')->user()->first_name }}"
                                            readonly>
                                    </div>
                                    <div class="form-group">
                                        <label for="last_name">{{ __('Tên') }}<span class="text-danger">*</span>
                                            :</label>
                                        <input type="text" id="last_name" class="form-control" name="last_name"
                                            placeholder="Nhập Tên" value="{{ Auth::guard('admin')->user()->last_name }}"
                                            readonly>
                                    </div>
                                    <div class="form-group">
                                        <label for="address">{{ __('Địa Chỉ') }}<span class="text-danger">*</span>
                                            :</label>
                                        <input type="text" id="address" class="form-control" name="address"
                                            placeholder="Nhập Địa Chỉ"
                                            value="{{ old('address', $vendor['vendor_personal']['address'] ?? null) }}"readonly>
                                        {{-- value="{{ isset($vendor) ? $vendor['vendor_personal']['address'] : '' }}"readonly> --}}
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="city">{{ __('Thành Phố') }}<span class="text-danger">*</span>
                                            :</label>
                                        <input type="text" id="city" class="form-control" name="city"
                                            placeholder="Nhập Tên Thành Phố"
                                            value="{{ old('city', $vendor['vendor_personal']['city'] ?? null) }}"readonly>
                                        {{-- value="{{ $vendor['vendor_personal']['city'] }}"readonly> --}}
                                    </div>
                                    <div class="form-group">
                                        <label for="state">{{ __('Tình Trạng') }}<span class="text-danger">*</span>
                                            :</label>
                                        <input type="text" id="state" class="form-control" name="state"
                                            placeholder="Nhập Tình Trạng" {{-- value="{{ $vendor['vendor_personal']['state'] }}"readonly> --}}
                                            value="{{ old('state', $vendor['vendor_personal']['state'] ?? null) }}"readonly>

                                    </div>
                                    <div class="form-group">
                                        <label for="country">{{ __('Quôc Gia') }}<span class="text-danger">*</span>
                                            :</label>
                                        <input type="text" id="country" class="form-control" name="country"
                                            placeholder="Nhập Tên"
                                            value="{{ old('country', $vendor['vendor_personal']['country'] ?? null) }}"readonly>

                                        {{-- value="{{ $vendor['vendor_personal']['country'] }}"readonly> --}}
                                    </div>
                                    <div class="form-group">
                                        <label for="pincode">{{ __('PinCode') }}<span class="text-danger">*</span>
                                            :</label>
                                        <input type="text" id="pincode" class="form-control" name="pincode"
                                            placeholder="Nhập Tên"
                                            value="{{ old('pincode', $vendor['vendor_personal']['pincode'] ?? null) }}"readonly>

                                        {{-- value="{{ $vendor['vendor_personal']['pincode'] }}"readonly> --}}
                                    </div>
                                    <div class="form-group">
                                        <label for="phone">{{ __('Số Điện Thoại') }}<span class="text-danger">*</span>
                                            :</label>
                                        <input type="text" class="form-control" id="phone" name="phone"
                                            placeholder="Số Điện Thoại"
                                            value="{{ old('phone', $vendor['vendor_personal']['phone'] ?? null) }}"readonly>

                                        {{-- value="{{ $vendor['vendor_personal']['phone'] }}"readonly> --}}
                                    </div>
                                    @if (!empty($vendor['image']))
                                        <div class="form-group">
                                            <label for="">{{ __('Ảnh') }}</label>
                                            <br>
                                            <img style="width:200px; height:100px;"
                                                src="{{ url('admin/images/photos/' . $vendor['image']) }}">
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">{{ __('Chi tiết kinh doanh ') }}</h4>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="shop_name">{{ __('Tên') }}<span class="text-danger">*</span>
                                            :</label>
                                        <input type="text" class="form-control" name="shop_name" id="shop_name"
                                            {{-- @if (isset($vendor['shop_name']))
                                        value="{{ $vendor['shop_name'] }}"@endif readonly> --}}
                                            value="{{ old('shop_name', $vendor['vendor_business']['shop_name'] ?? null) }}"readonly>

                                        {{-- value="{{ $vendor['vendor_business']['shop_name'] }}"readonly> --}}
                                    </div>
                                    <div class="form-group">
                                        <label for="shop_address">{{ __('Đường') }}
                                            :</label>
                                        <input type="text" class="form-control" id="shop_address" name="shop_address"
                                            value="{{ old('shop_address', $vendor['vendor_business']['shop_address'] ?? null) }}"readonly>

                                        {{-- value="{{ $vendor['vendor_business']['shop_address'] }}"readonly> --}}
                                    </div>
                                    <div class="form-group">
                                        <label for="shop_city">{{ __('Thành Phố') }}<span class="text-danger">*</span>
                                            :</label>
                                        <input type="text" id="shop_city" class="form-control" name="shop_city"
                                            placeholder="Nhập Họ"
                                            value="{{ old('shop_city', $vendor['vendor_business']['shop_city'] ?? null) }}"readonly>

                                        {{-- value="{{ $vendor['vendor_business']['shop_city'] }}"readonly> --}}
                                    </div>
                                    <div class="form-group">
                                        <label for="shop_state">{{ __('Tỉnh') }}<span class="text-danger">*</span>
                                            :</label>
                                        <input type="text" id="shop_state" class="form-control" name="shop_state"
                                            placeholder="Nhập Tên" {{-- value="{{ $vendor['vendor_business']['shop_state'] }}"readonly> --}}
                                            value="{{ old('shop_state', $vendor['vendor_business']['shop_state'] ?? null) }}"readonly>

                                    </div>
                                    <div class="form-group">
                                        <label for="shop_country">{{ __('Quốc Gia') }}<span class="text-danger">*</span>
                                            :</label>
                                        <input type="text" id="shop_country" class="form-control" name="shop_country"
                                            placeholder="Nhập Địa Chỉ"readonly {{-- value="{{ $vendor['vendor_business']['shop_country'] }}"> --}}
                                            value="{{ old('shop_country', $vendor['vendor_business']['shop_country'] ?? null) }}"readonly>

                                    </div>
                                    <div class="form-group">
                                        <label for="shop_pincode">{{ __('Mã code') }}<span class="text-danger">*</span>
                                            :</label>
                                        <input type="text" id="shop_pincode" class="form-control" name="shop_pincode"
                                            placeholder="Nhập Địa Chỉ"
                                            value="{{ old('shop_pincode', $vendor['vendor_business']['shop_pincode'] ?? null) }}"readonly>

                                        {{-- value="{{ $vendor['vendor_business']['shop_pincode'] }}"readonly> --}}
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="shop_mobile">{{ __('Số điện thoại') }}<span
                                                class="text-danger">*</span>
                                            :</label>
                                        <input type="text" id="shop_mobile" class="form-control" name="shop_mobile"
                                            placeholder="Nhập Tên Thành Phố"
                                            value="{{ old('shop_mobile', $vendor['vendor_business']['shop_mobile'] ?? null) }}"readonly>

                                        {{-- value="{{ $vendor['vendor_business']['shop_mobile'] }}"readonly> --}}
                                    </div>
                                    <div class="form-group">
                                        <label for="shop_website">{{ __('Website') }}<span class="text-danger">*</span>
                                            :</label>
                                        <input type="text" id="shop_website" class="form-control" name="shop_website"
                                            placeholder="Nhập Tên"
                                            value="{{ old('shop_website', $vendor['vendor_business']['shop_website'] ?? null) }}"readonly>

                                        {{-- value="{{ $vendor['vendor_business']['shop_website'] }}"readonly> --}}
                                    </div>
                                    <div class="form-group">
                                        <label for="shop_email">{{ __('Địa Chỉ Email') }}<span
                                                class="text-danger">*</span>
                                            :</label>
                                        <input type="text" id="shop_email" class="form-control" name="shop_email"
                                            placeholder="Nhập Tên"
                                            value="{{ old('shop_email', $vendor['vendor_business']['shop_email'] ?? null) }}"readonly>

                                        {{-- value="{{ $vendor['vendor_business']['shop_email'] }}"readonly> --}}
                                    </div>
                                    <div class="form-group">
                                        <label for="business_license_number">{{ __('Số giấy phép kinh doanh') }}<span
                                                class="text-danger">*</span>
                                            :</label>
                                        <input type="text" id="business_license_number" class="form-control"
                                            name="business_license_number" placeholder="Nhập Tên"
                                            value="{{ old('business_license_number', $vendor['vendor_business']['business_license_number'] ?? null) }}"readonly>

                                        {{-- value="{{ $vendor['vendor_business']['business_license_number'] }}"readonly> --}}
                                    </div>
                                    <div class="form-group">
                                        <label for="address_proof">{{ __('Địa chỉ Proof') }}<span
                                                class="text-danger">*</span>
                                            :</label>
                                        <select class="form-control text-dark" disabled
                                            value="{{ old('address_proof', $vendor['vendor_business']['address_proof'] ?? null) }}"
                                            {{-- value="{{ $vendor['vendor_business']['address_proof'] }}" --}} name="address_proof" id="address_proof">
                                            {{-- <option value="Passpost" @if ($vendor['vendor_business']['address_proof'] == 'Passpost') selected @endif>
                                                {{ __('Passpost') }}</option> --}}
                                            <option
                                                {{ old('address_proof', $vendor['vendor_business']['address_proof'] ?? null) == 'Passpost' ? 'selected' : '' }}
                                                value="Passpost">Passpost</option>
                                            <option
                                                {{ old('address_proof', $vendor['vendor_business']['address_proof'] ?? null) == 'Pan' ? 'selected' : '' }}
                                                value="Pan">Pan</option>
                                            <option
                                                {{ old('address_proof', $vendor['vendor_business']['address_proof'] ?? null) == 'C' ? 'selected' : '' }}
                                                value="C">C</option>
                                            <option
                                                {{ old('address_proof', $vendor['vendor_business']['address_proof'] ?? null) == 'D' ? 'selected' : '' }}
                                                value="D">D</option>
                                            <option
                                                {{ old('address_proof', $vendor['vendor_business']['address_proof'] ?? null) == 'E' ? 'selected' : '' }}
                                                value="E">E</option>
                                            {{-- <option value="Pan"@if ($vendor['vendor_business']['address_proof'] == 'Pan') selected @endif>
                                                {{ __('Pan') }}</option>
                                            <option value="C"@if ($vendor['vendor_business']['address_proof'] == 'C') selected @endif>
                                                {{ __('C') }}</option>
                                            <option value="D"@if ($vendor['vendor_business']['address_proof'] == 'D') selected @endif>
                                                {{ __('D') }}</option>
                                            <option value="E"@if ($vendor['vendor_business']['address_proof'] == 'E') selected @endif>
                                                {{ __('E') }}</option> --}}

                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="pan_number">{{ __('Số khóa') }}<span class="text-danger">*</span>
                                            :</label>
                                        <input type="text" class="form-control"
                                            value="{{ old('pan_number', $vendor['vendor_business']['pan_number'] ?? null) }}"
                                            {{-- value="{{ $vendor['vendor_business']['pan_number'] }}" --}} id="pan_number" name="pan_number"
                                            placeholder="Số Điện Thoại" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label for="gst_number">{{ __('Số thuế') }}<span class="text-danger">*</span>
                                            :</label>
                                        <input type="text" class="form-control"
                                            value="{{ old('gst_number', $vendor['vendor_business']['gst_number'] ?? null) }}"
                                            {{-- value="{{ $vendor['vendor_business']['gst_number'] }}" --}} id="gst_number" name="gst_number"
                                            placeholder="Số Điện Thoại" readonly>
                                    </div>
                                    @if (!empty($vendor['vendor_business']['address_proof_images']))
                                        <div class="form-group">
                                            <label for=""> {{ __('Ảnh') }}</label>
                                            <br>
                                            <img style="width:200px; height:100px;"
                                                src="{{ url('admin/images/proofs/' . $vendor['vendor_business']['address_proof_images']) }}">
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">{{ __('Chi tiết ngân hàng ') }}</h4>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="account_holder_name">{{ __('Tên Tài Khoản') }}<span
                                                class="text-danger">*</span> :</label>
                                        <input type="text" class="form-control" name="account_holder_name"
                                            id="account_holder_name"
                                            value="{{ old('account_holder_name', $vendor['vendor_bank']['account_holder_name'] ?? null) }}"
                                            readonly>

                                        {{-- value="{{ $vendor['vendor_bank']['account_holder_name'] }}" --}}
                                    </div>
                                    <div class="form-group">
                                        <label for="account_number">{{ __('Số Tài Khoản') }}<span
                                                class="text-danger">*</span>
                                            :</label>
                                        <input type="text" id="account_number" class="form-control"
                                            name="account_number"
                                            value="{{ old('account_number', $vendor['vendor_bank']['account_number'] ?? null) }}"
                                            readonly>

                                        {{-- value="{{ $vendor['vendor_bank']['account_number'] }}"
                                            readonly> --}}
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="bank_name">{{ __('Tên Ngân Hàng') }}<span
                                                class="text-danger">*</span>
                                            :</label>
                                        <input type="text" id="bank_name" class="form-control" name="bank_name"
                                            readonly placeholder="Nhập Tên Thành Phố" {{-- value="{{ $vendor['vendor_bank']['bank_name'] }}"> --}}
                                            value="{{ old('bank_name', $vendor['vendor_bank']['bank_name'] ?? null) }}"
                                            readonly>

                                    </div>
                                    <div class="form-group">
                                        <label for="bank_ifsc_code">{{ __('Mã Code') }}<span class="text-danger">*</span>
                                            :</label>
                                        <input type="text" id="bank_ifsc_code" class="form-control"
                                            name="bank_ifsc_code" readonly placeholder="Nhập Tên" {{-- value="{{ $vendor['vendor_bank']['bank_ifsc_code'] }}"> --}}
                                            value="{{ old('bank_ifsc_code', $vendor['vendor_bank']['bank_ifsc_code'] ?? null) }}"
                                            readonly>

                                    </div>
                                </div>
                            </div>
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
