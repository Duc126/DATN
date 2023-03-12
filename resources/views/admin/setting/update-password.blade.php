@extends('admin/layout/layout')
@section('content')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-md-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">{{ __('Cập nhật mật khẩu') }}</h4>
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
                            <form class="forms-sample" action="{{ url('admin/update-password') }}" method="post">
                                @csrf
                                <div class="form-group">
                                    <label for="exampleInputUsername1">{{ __('Địa chỉ Email') }}<span
                                            class="text-danger">*</span> :</label>
                                    <input type="text" class="form-control" value="{{ $adminPass['email'] }}" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">{{ __('Quyền') }}<span class="text-danger">*</span>
                                        :</label>
                                    <input type="text" class="form-control" value="{{ $adminPass['type'] }}" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="current_password">{{ __('Mật Khẩu Hiện Tại') }}<span
                                            class="text-danger">*</span> :</label>
                                    <input type="password" class="form-control" name="current_password"
                                        id="current_password" placeholder="Mật Khẩu Hiện Tại"required>
                                    <span id="check_password"></span>
                                </div>
                                <div class="form-group">
                                    <label for="new_password">{{ __('Mật Khẩu Mới') }}<span class="text-danger">*</span>
                                        :</label>
                                    <input type="password" class="form-control" name="new_password" id="new_password"
                                        placeholder="Mật Khẩu Mới" required>
                                </div>
                                <div class="form-group">
                                    <label for="confirm_password">{{ __('Xác Nhận Mật Khẩu') }}<span
                                            class="text-danger">*</span> :</label>
                                    <input type="password" class="form-control" name="confirm_password"
                                        id="confirm_password" placeholder="Xác Nhận Lại Mật Khẩu"required>
                                </div>
                                <button type="submit"
                                    class="btn btn-primary mr-2 float-right">{{ __('Lưu') }}</button>
                                    {{-- <a class="btn btn-danger" href="{{  url('admin/brands')  }}">{{ __('Quay lai ') }}</a> --}}
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
