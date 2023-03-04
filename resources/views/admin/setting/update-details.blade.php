@extends('admin/layout/layout')
@section('content')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-md-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">{{ __('Cập nhật chi tiết') }}</h4>
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
                            <form class="forms-sample" action="{{ route('update-details') }}" method="post"
                                enctype="multipart/form-data">
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
                                            <label for="first_name">{{ __('Họ') }}<span class="text-danger">*</span>
                                                :</label>
                                            <input type="text" id="first_name" class="form-control" name="first_name"
                                                placeholder="Nhập Họ"
                                                value="{{ Auth::guard('admin')->user()->first_name }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="last_name">{{ __('Tên') }}<span class="text-danger">*</span>
                                                :</label>
                                            <input type="text" id="last_name" class="form-control" name="last_name"
                                                placeholder="Nhập Tên"
                                                value="{{ Auth::guard('admin')->user()->last_name }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="phone">{{ __('Số Điện Thoại') }}<span
                                                    class="text-danger">*</span>
                                                :</label>
                                            <input type="text" class="form-control"
                                                value="{{ Auth::guard('admin')->user()->phone }}" id="phone"
                                                name="phone" placeholder="Số Điện Thoại">
                                        </div>
                                        <div class="form-group">
                                            <label for="image">{{ __('Số Điện Thoại') }}<span
                                                    class="text-danger">*</span>
                                                :</label>
                                            <input type="file" class="form-control" id="image" name="image">
                                            @if (!empty(Auth::guard('admin')->user()->image))
                                                <a target="_blank"
                                                    href="{{ url('admin/images/photos/' . Auth::guard('admin')->user()->image) }}">Xem
                                                    Avatar
                                                </a>
                                                <input type="hidden" name="current-image"
                                                    value="{{ Auth::guard('admin')->user()->image }}">
                                            @endif
                                        </div>
                                    </div>

                                </div>
                                <button type="submit"
                                    class="btn btn-primary mr-2 float-right">{{ __('Lưu') }}</button>
                                <a class="btn btn-danger" href="{{ route('Ad-dashboard') }}">{{ __('Quay lai ') }}</a>

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
