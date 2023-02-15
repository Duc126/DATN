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
                            @if ($errors->any())
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </div>
                            @endif
                            <form class="forms-sample" action="{{ route('update-details') }}" method="post">
                                @csrf
                                <div class="form-group">
                                    <label for="exampleInputUsername1">{{ __('Địa chỉ Email') }}<span
                                            class="text-danger">*</span> :</label>
                                    <input type="text" class="form-control"
                                        value="{{ Auth::guard('admin')->user()->email }}" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">{{ __('Quyền') }}<span class="text-danger">*</span>
                                        :</label>
                                    <input type="text" class="form-control"
                                        value="{{ Auth::guard('admin')->user()->type }}" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="name">{{ __('Tên') }}<span class="text-danger">*</span> :</label>
                                    <input type="text" id="name" class="form-control" name="name"
                                        placeholder="Họ Tên" value="{{ Auth::guard('admin')->user()->name }}">
                                </div>
                                <div class="form-group">
                                    <label for="mobile">{{ __('Số Điện Thoại') }}<span class="text-danger">*</span>
                                        :</label>
                                    <input type="text" class="form-control"
                                        value="{{ Auth::guard('admin')->user()->mobile }}" id="mobile" name="mobile"
                                        placeholder="Số Điện Thoại">
                                </div>
                                <button type="submit"
                                    class="btn btn-primary mr-2 float-right">{{ __('Submit') }}</button>
                                <button class="btn btn-light">{{ __('Back') }}</button>
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
