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
                <!-- Login -->
                <div class="col-lg-6">
                    <div class="login-wrapper">
                        <h2 class="account-h2 u-s-m-b-20">{{ __('Đăng Nhập') }}</h2>
                        <h6 class="account-h6 u-s-m-b-30">{{ __('Chào mừng trở lại! đăng nhập vào tài khoản của bạn') }}.</h6>
                        <p id="login-error"></p>
                        <form id="loginForm" action="javascript:;" method="post" >
                            @csrf
                            <div class="u-s-m-b-30">
                                <label for="users-email">{{ __('Email') }}
                                    <span class="astk">*</span>
                                </label>
                                <input type="text" name="email" id="users-email"class="text-field"
                                    placeholder="Username / Email">
                                    <p id ="login-email"></p>
                            </div>
                            <div class="u-s-m-b-30">
                                <label for="users-password">{{ __('Mật Khẩu') }}
                                    <span class="astk">*</span>
                                </label>
                                <input type="password" id="users-password" name="password" class="text-field" placeholder="Password">
                                <p id ="login-password"></p>

                            </div>
                            {{-- <div class="group-inline u-s-m-b-30">
                                <div class="group-1">
                                    <input type="checkbox" class="check-box" id="remember-me-token">
                                    <label class="label-text" for="remember-me-token">Remember me</label>
                                </div>
                                <div class="group-2 text-right">
                                    <div class="page-anchor">
                                        <a href="lost-password.html">
                                            <i class="fas fa-circle-o-notch u-s-m-r-9"></i>Lost your password?</a>
                                    </div>
                                </div>
                            </div> --}}
                            <div class="m-b-45">
                                <button class="button button-outline-secondary w-100">{{ __('Đăng Nhập') }}</button>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- Login /- -->
                <!-- Register -->
                <div class="col-lg-6">
                    <div class="reg-wrapper">
                        <h2 class="account-h2 u-s-m-b-20">{{ __('Đăng Ký') }}</h2>
                        <h6 class="account-h6 u-s-m-b-30">{{ __('Đăng ký cho trang web này cho phép bạn truy cập trạng thái và lịch sử đặt hàng của bạn.') }}</h6>
                        <p id="register-success"></p>

                        <form id="registerForm" action="javascript:;" method="post">
                            @csrf
                            <div class="u-s-m-b-30">
                                <label for="user-name">{{ __('Họ Tên') }}
                                    <span class="astk">*</span>
                                </label>
                                <input type="text" id="user-name" name="name" class="text-field"
                                    placeholder="Nhập Tên">
                                    <p id="register-name"></p>
                            </div>
                            <div class="u-s-m-b-30">
                                <label for="user-phone">{{ __('Số Điện Thoại') }}
                                    <span class="astk">*</span>
                                </label>
                                <input type="text" id="user-phone" name="phone" class="text-field"
                                    placeholder="Nhập Số Điện Thoại">
                                    <p id="register-phone"></p>

                            </div>
                            <div class="u-s-m-b-30">
                                <label for="user-email">{{ __('Email') }}
                                    <span class="astk">*</span>
                                </label>
                                <input type="email" id="user-email" name="email" class="text-field"
                                    placeholder="Nhập Email">
                                    <p id="register-email"></p>

                            </div>
                            <div class="u-s-m-b-30">
                                <label for="user-pass">{{ __('Mật Khẩu') }}
                                    <span class="astk">*</span>
                                </label>
                                <input type="password" id="user-pass" name="password" class="text-field"
                                    placeholder="Nhập Mật Khẩu">
                                    <p id="register-password"></p>

                            </div>
                            <div class="u-s-m-b-30">
                                <input type="checkbox" class="check-box" name="accept" id="accept">
                                <label class="label-text no-color" for="accept">{{ __('Tôi đã đọc và chấp nhận') }}
                                    <a href="terms-and-conditions.html" class="u-c-brand">{{ __('Điều khoản và điều kiện') }}</a>
                                </label>
                                <p id="register-accept"></p>

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
