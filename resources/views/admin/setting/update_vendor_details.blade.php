@extends('admin.layout.layout')
@section('content')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-md-12 grid-margin">
                    <div class="row">
                        <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                            <h3 class="font-weight-bold">{{ __('Chào Mừng') }} {{ Auth::guard('admin')->user()->first_name }}
                                {{ Auth::guard('admin')->user()->last_name }}</h3>
                            <h6 class="font-weight-normal mb-0">All systems are running smoothly! You have
                                <span class="text-primary">3 unread alerts!</span>
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
            @if ($slug == 'personal')
                <div class="row">
                    <div class="col-md-12 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">{{ __('Cập nhật chi tiết nhà cung cấp ') }}</h4>
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
                                <form class="forms-sample" action="{{ url('admin/update-vendor-details/personal') }}"
                                    method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputUsername1">{{ __('Địa chỉ Email') }}<span
                                                        class="text-danger">*</span> :</label>
                                                <input type="text" class="form-control"
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
                                                <label for="first_name">{{ __('Họ') }}<span
                                                        class="text-danger">*</span>
                                                    :</label>
                                                <input type="text" id="first_name" class="form-control" name="first_name"
                                                    placeholder="Nhập Họ"
                                                    value="{{ Auth::guard('admin')->user()->first_name }}">
                                            </div>
                                            <div class="form-group">
                                                <label for="last_name">{{ __('Tên') }}<span
                                                        class="text-danger">*</span>
                                                    :</label>
                                                <input type="text" id="last_name" class="form-control" name="last_name"
                                                    placeholder="Nhập Tên"
                                                    value="{{ Auth::guard('admin')->user()->last_name }}">
                                            </div>
                                            <div class="form-group">
                                                <label for="address">{{ __('Địa Chỉ') }}<span class="text-danger">*</span>
                                                    :</label>
                                                <input type="text" id="address" class="form-control" name="address"
                                                    placeholder="Nhập Địa Chỉ" value="{{ $vendorDetail['address'] }}">
                                            </div>


                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="city">{{ __('Thành Phố') }}<span
                                                        class="text-danger">*</span>
                                                    :</label>
                                                <input type="text" id="city" class="form-control" name="city"
                                                    placeholder="Nhập Tên Thành Phố" value="{{ $vendorDetail['city'] }}">
                                            </div>
                                            <div class="form-group">
                                                <label for="state">{{ __('State') }}<span
                                                        class="text-danger">*</span>
                                                    :</label>
                                                <input type="text" id="state" class="form-control" name="state"
                                                    placeholder="Nhập Tên" value="{{ $vendorDetail['state'] }}">
                                            </div>
                                            <div class="form-group">
                                                <label for="country">{{ __('Country') }}<span
                                                        class="text-danger">*</span>
                                                    :</label>
                                                <input type="text" id="country" class="form-control" name="country"
                                                    placeholder="Nhập Tên" value="{{ $vendorDetail['country'] }}">
                                            </div>
                                            <div class="form-group">
                                                <label for="pincode">{{ __('PinCode') }}<span
                                                        class="text-danger">*</span>
                                                    :</label>
                                                <input type="text" id="pincode" class="form-control" name="pincode"
                                                    placeholder="Nhập Tên" value="{{ $vendorDetail['pincode'] }}">
                                            </div>
                                            <div class="form-group">
                                                <label for="phone">{{ __('Số Điện Thoại') }}<span
                                                        class="text-danger">*</span>
                                                    :</label>
                                                <input type="text" class="form-control"
                                                    value="{{ $vendorDetail['phone'] }}" id="phone" name="phone"
                                                    placeholder="Số Điện Thoại">
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="d-flex justify-content-center mb-4">
                                                <img src="https://mdbootstrap.com/img/Photos/Others/placeholder-avatar.jpg"
                                                    class="rounded-circle" alt="example placeholder"
                                                    style="width: 200px;" />
                                                {{-- <img src="{{ Auth::guard('admin')->user()->image }}"
                                        class="rounded-circle" alt="example placeholder" style="width: 200px;" /> --}}
                                            </div>
                                            <div class="d-flex justify-content-center">
                                                <div>
                                                    <label class="btn btn-primary btn-rounded"
                                                        for="image">{{ __('Chọn Ảnh') }}</label>
                                                    <input type="file" class="form-control d-none" value=""
                                                        id="image" name="image" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <button type="submit"
                                        class="btn btn-primary mr-2 float-right">{{ __('Lưu') }}</button>
                                    <button class="btn btn-danger"
                                        href="{{ route('Ad-dashboard') }}">{{ __('Quay Lại') }}</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @elseif($slug == 'business')
                <div class="row">
                    <div class="col-md-12 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">{{ __('Cập nhật chi tiết kinh doanh ') }}</h4>
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
                                <form class="forms-sample" action="{{ url('admin/update-vendor-details/business') }}"
                                    method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="shop_name">{{ __('Tên') }}<span
                                                        class="text-danger">*</span> :</label>
                                                <input type="text" class="form-control" name="shop_name"
                                                    id="shop_name" value="{{ $vendorDetail['shop_name'] }}">
                                            </div>
                                            <div class="form-group">
                                                <label for="shop_address">{{ __('Đường') }}
                                                    :</label>
                                                <input type="text" class="form-control" id="shop_address"
                                                    name="shop_address" value="{{ $vendorDetail['shop_address'] }}">
                                            </div>
                                            <div class="form-group">
                                                <label for="shop_city">{{ __('Thành Phố') }}<span
                                                        class="text-danger">*</span>
                                                    :</label>
                                                <input type="text" id="shop_city" class="form-control"
                                                    name="shop_city" placeholder="Nhập Họ"
                                                    value="{{ $vendorDetail['shop_city'] }}">
                                            </div>
                                            <div class="form-group">
                                                <label for="shop_state">{{ __('Tỉnh') }}<span
                                                        class="text-danger">*</span>
                                                    :</label>
                                                <input type="text" id="shop_state" class="form-control"
                                                    name="shop_state" placeholder="Nhập Tên"
                                                    value="{{ $vendorDetail['shop_state'] }}">
                                            </div>
                                            <div class="form-group">
                                                <label for="shop_country">{{ __('Quốc Gia') }}<span
                                                        class="text-danger">*</span>
                                                    :</label>
                                                <input type="text" id="shop_country" class="form-control"
                                                    name="shop_country" placeholder="Nhập Địa Chỉ"
                                                    value="{{ $vendorDetail['shop_country'] }}">
                                            </div>
                                            <div class="form-group">
                                                <label for="shop_pincode">{{ __('Mã code') }}<span
                                                        class="text-danger">*</span>
                                                    :</label>
                                                <input type="text" id="shop_pincode" class="form-control"
                                                    name="shop_pincode" placeholder="Nhập Địa Chỉ"
                                                    value="{{ $vendorDetail['shop_pincode'] }}">
                                            </div>
                                            <div class="form-group">
                                                <div class="d-flex justify-content-center mb-4">
                                                    <img src="https://mdbootstrap.com/img/Photos/Others/placeholder-avatar.jpg"
                                                        class="rounded-circle" alt="example placeholder"
                                                        style="width: 200px;" />
                                                    {{-- <img src="{{ Auth::guard('admin')->user()->image }}"
                                            class="rounded-circle" alt="example placeholder" style="width: 200px;" /> --}}
                                                </div>
                                                <div class="d-flex justify-content-center">
                                                    <div>
                                                        <label class="btn btn-primary btn-rounded"
                                                            for="address_proof_image">{{ __('Chọn Ảnh') }}</label>
                                                        <input type="file" class="form-control d-none" value=""
                                                            id="address_proof_image" name="address_proof_image" />
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="shop_mobile">{{ __('Số điện thoại') }}<span
                                                        class="text-danger">*</span>
                                                    :</label>
                                                <input type="text" id="shop_mobile" class="form-control"
                                                    name="shop_mobile" placeholder="Nhập Tên Thành Phố"
                                                    value="{{ $vendorDetail['shop_mobile'] }}">
                                            </div>
                                            <div class="form-group">
                                                <label for="shop_website">{{ __('Website') }}<span
                                                        class="text-danger">*</span>
                                                    :</label>
                                                <input type="text" id="shop_website" class="form-control"
                                                    name="shop_website" placeholder="Nhập Tên"
                                                    value="{{ $vendorDetail['shop_website'] }}">
                                            </div>
                                            <div class="form-group">
                                                <label for="shop_email">{{ __('Địa Chỉ Email') }}<span
                                                        class="text-danger">*</span>
                                                    :</label>
                                                <input type="text" id="shop_email" class="form-control"
                                                    name="shop_email" placeholder="Nhập Tên"
                                                    value="{{ $vendorDetail['shop_email'] }}">
                                            </div>
                                            <div class="form-group">
                                                <label
                                                    for="business_license_number">{{ __('Số giấy phép kinh doanh') }}<span
                                                        class="text-danger">*</span>
                                                    :</label>
                                                <input type="text" id="business_license_number" class="form-control"
                                                    name="business_license_number" placeholder="Nhập Tên"
                                                    value="{{ $vendorDetail['business_license_number'] }}">
                                            </div>
                                            <div class="form-group">
                                                <label for="address_proof">{{ __('Địa chỉ Proof') }}<span
                                                        class="text-danger">*</span>
                                                    :</label>
                                                <select class="form-control" value="{{ $vendorDetail['address_proof'] }}"
                                                    name="address_proof" id="address_proof">
                                                    <option value="Passpost"
                                                        @if ($vendorDetail['address_proof'] == 'Passpost') selected @endif>
                                                        {{ __('Passpost') }}</option>
                                                    <option
                                                        value="Pan"@if ($vendorDetail['address_proof'] == 'Pan') selected @endif>
                                                        {{ __('Pan') }}</option>
                                                    <option
                                                        value="C"@if ($vendorDetail['address_proof'] == 'C') selected @endif>
                                                        {{ __('C') }}</option>
                                                    <option
                                                        value="D"@if ($vendorDetail['address_proof'] == 'D') selected @endif>
                                                        {{ __('D') }}</option>
                                                    <option
                                                        value="E"@if ($vendorDetail['address_proof'] == 'E') selected @endif>
                                                        {{ __('E') }}</option>

                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="pan_number">{{ __('Số khóa') }}<span
                                                        class="text-danger">*</span>
                                                    :</label>
                                                <input type="text" class="form-control"
                                                    value="{{ $vendorDetail['pan_number'] }}"id="pan_number"
                                                    name="pan_number" placeholder="Số Điện Thoại">
                                            </div>
                                            <div class="form-group">
                                                <label for="gst_number">{{ __('Số thuế') }}<span
                                                        class="text-danger">*</span>
                                                    :</label>
                                                <input type="text" class="form-control"
                                                    value="{{ $vendorDetail['gst_number'] }}"id="gst_number"
                                                    name="gst_number" placeholder="Số Điện Thoại">
                                            </div>
                                        </div>

                                        {{-- <div class="col-md-12">

                            </div> --}}
                                    </div>
                                    <button type="submit"
                                        class="btn btn-primary mr-2 float-right">{{ __('Lưu') }}</button>
                                    <button class="btn btn-danger"
                                        href="{{ route('Ad-dashboard') }}">{{ __('Quay Lại') }}</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @elseif($slug == 'bank')
            <div class="row">
                <div class="col-md-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">{{ __('Cập nhật chi tiết ngân hàng ') }}</h4>
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
                            <form class="forms-sample" action="{{ url('admin/update-vendor-details/bank') }}"
                                method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="account_holder_name">{{ __('Tên Tài Khoản') }}<span
                                                    class="text-danger">*</span> :</label>
                                            <input type="text" class="form-control" name="account_holder_name" id="account_holder_name"
                                                value="{{ $vendorDetail['account_holder_name'] }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="account_number">{{ __('Số Tài Khoản') }}<span
                                                    class="text-danger">*</span>
                                                :</label>
                                            <input type="text" id="account_number" class="form-control" name="account_number"
                                                value="{{ $vendorDetail['account_number']  }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="bank_name">{{ __('Tên Ngân Hàng') }}<span
                                                    class="text-danger">*</span>
                                                :</label>
                                            <input type="text" id="bank_name" class="form-control" name="bank_name"
                                                placeholder="Nhập Tên Thành Phố" value="{{ $vendorDetail['bank_name'] }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="bank_ifsc_code">{{ __('Mã Code') }}<span
                                                    class="text-danger">*</span>
                                                :</label>
                                            <input type="text" id="bank_ifsc_code" class="form-control" name="bank_ifsc_code"
                                                placeholder="Nhập Tên" value="{{ $vendorDetail['bank_ifsc_code'] }}">
                                        </div>
                                    </div>
                                </div>
                                <button type="submit"
                                    class="btn btn-primary mr-2 float-right">{{ __('Lưu') }}</button>
                                <button class="btn btn-danger"
                                    href="{{ route('Ad-dashboard') }}">{{ __('Quay Lại') }}</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            @endif
        </div>
        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->
        @include('admin.layout.footer')
        <!-- partial -->
    </div>
@endsection
