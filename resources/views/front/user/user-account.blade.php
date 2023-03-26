@extends('front.layout.layout')
@section('content')
    <!-- Page Introduction Wrapper -->
    <div class="page-style-a">
        <div class="container">
            <div class="page-intro">
                <h2>{{ __('Tài Khoản') }}</h2>
                <ul class="bread-crumb">
                    <li class="has-separator">
                        <i class="ion ion-md-home"></i>
                        <a href="index.html">{{ __('Trang Chủ') }}</a>
                    </li>
                    <li class="is-marked">
                        <a href="account.html">{{ __('Tài Khoản') }}</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <!-- Page Introduction Wrapper /- -->
    <!-- Account-Page -->
    <div class="page-account u-s-p-t-80">
        <div class="container">
            @if (Session::has('success_message'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>{{ __('Thành Công') }}:</strong> {{ Session::get('success_message') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
            @if (Session::has('error_message'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>{{ __('Thất Bại') }}:</strong> {{ Session::get('error_message') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
            @if ($errors->any())
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>{{ __('Thất Bại') }}:</strong> <?php echo implode('', $errors->all('<div>:message</div>')); ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif

            <div class="row">
                <!-- Update Detail -->
                <div class="col-lg-6">
                    <div class="login-wrapper">
                        <h2 class="account-h2 u-s-m-b-20">{{ __('Cập nhật chi tiết liên hệ') }}</h2>
                        <p id="account-error"></p>
                        <p id="account-success"></p>
                        <form id="accountForm" action="javascript:;" method="post">
                            @csrf
                            <div class="u-s-m-b-30">
                                <label for="user-email">{{ __('Email') }}
                                    <span class="astk">*</span>
                                </label>
                                <input class="text-field" value="{{ Auth::user()->email }}" readonly>
                                <p id="account-email"></p>
                            </div>
                            <div class="u-s-m-b-30">
                                <label for="user-name">{{ __('Tên') }}
                                    <span class="astk">*</span>
                                </label>
                                <input class="text-field" type="text" id="user-name" name="name"
                                    value="{{ Auth::user()->name }}">
                                <p id="account-name"></p>
                            </div>
                            <div class="u-s-m-b-30">
                                <label for="user-address">{{ __('Địa Chỉ') }}
                                    <span class="astk">*</span>
                                </label>
                                <input class="text-field" type="text" id="user-address" name="address"
                                    value="{{ Auth::user()->address }}">
                                <p id="account-address"></p>
                            </div>
                            <div class="u-s-m-b-30">
                                <label for="user-city">{{ __('Thành Phô') }}
                                    <span class="astk">*</span>
                                </label>
                                <input class="text-field" type="text" id="user-city" name="city"
                                    value="{{ Auth::user()->city }}">
                                <p id="account-city"></p>
                            </div>
                            <div class="u-s-m-b-30">
                                <label for="user-state">{{ __('Trạng Thái') }}
                                    <span class="astk">*</span>
                                </label>
                                <input class="text-field" type="text" id="user-state" name="state"
                                    value="{{ Auth::user()->state }}">
                                <p id="account-state"></p>
                            </div>
                            <div class="u-s-m-b-30">
                                <label for="user-country">{{ __('Quốc Gia') }}
                                    <span class="astk">*</span>
                                </label>
                                <select class="text-field" id="user-country" name="country" style="color: #495057">
                                    <option value="">{{ __('Chọn Quốc Gia') }}</option>
                                    @foreach ($countries as $country)
                                        <option value="{{ $country['country_name'] }}"
                                            @if ($country['country_name'] == Auth::user()->country) selected @endif>
                                            {{ $country['country_name'] }}
                                    @endforeach
                                </select>
                                <p id="account-country"></p>
                            </div>
                            <div class="u-s-m-b-30">
                                <label for="user-pincode">{{ __('Mã Pin') }}
                                    <span class="astk">*</span>
                                </label>
                                <input class="text-field" type="text" id="user-pincode" name="pincode"
                                    value="{{ Auth::user()->pincode }}">
                                <p id="account-pincode"></p>
                            </div>
                            <div class="u-s-m-b-30">
                                <label for="user-phone">{{ __('Điệnt Thoại') }}
                                    <span class="astk">*</span>
                                </label>
                                <input class="text-field" type="text" id="user-phone" name="phone"
                                    value="{{ Auth::user()->phone }}">
                                <p id="account-phone"></p>
                            </div>
                            <div class="m-b-45">
                                <button class="button button-outline-secondary w-100">{{ __('Cập Nhật') }}</button>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- Update Detail /- -->
                <!-- Update Password -->
                <div class="col-lg-6">
                    <div class="reg-wrapper">
                        <h2 class="account-h2 u-s-m-b-20">{{ __('Cập Nhật Mật Khẩu') }}</h2>
                        <p id="password-success"></p>
                        <p id="password-error"></p>

                        <form id="passwordForm" action="javascript:;" method="post">
                            @csrf
                            <div class="u-s-m-b-30">
                                <label for="current-password">{{ __('Mật khẩu hiện tại') }}
                                    <span class="astk">*</span>
                                </label>
                                <input type="password" id="current-password" name="current_password" class="text-field"
                                    placeholder="Nhập Mật Khẩu Hiện Tại">
                                <p id="password-current_password"></p>
                            </div>
                            <div class="u-s-m-b-30">
                                <label for="new-password">{{ __('Mật Khẩu Mới') }}
                                    <span class="astk">*</span>
                                </label>
                                <input type="password" id="new-password" name="new_password" class="text-field"
                                    placeholder="Nhập Mật Khẩu Mới">
                                <p id="password-new_password"></p>
                            </div>
                            <div class="u-s-m-b-30">
                                <label for="confirm-password">{{ __('Xác nhận mật khẩu') }}
                                    <span class="astk">*</span>
                                </label>
                                <input type="password" id="confirm-password" name="confirm_password" class="text-field"
                                placeholder="Xác Nhận Mật Khẩu">
                            <p id="password-confirm_password"></p>

                            </div>
                            <div class="u-s-m-b-45">
                                <button class="button button-primary w-100">{{ __('Đăng Ký') }}</button>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- Register /- -->
            </div>
        </div>
    </div>
    <!-- Account-Page /- -->
@endsection
