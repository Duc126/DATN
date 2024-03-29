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
                                @if (empty($staff['id'])) action="{{ url('admin/add-edit-staff') }}"
                            @else action="{{ url('admin/add-edit-staff/' . $staff['id']) }}" @endif
                                method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="name">{{ __('Tên Tên Nhân Viên') }}<span
                                                    class="text-danger">*</span> :</label>
                                            <input type="text" class="form-control" id="name"
                                                placeholder="Nhập Tên Nhân Viên" name="name"
                                                @if (!empty($staff['name'])) value="{{ $staff['name'] }}" @else value="{{ old('name') }}" @endif>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="phone">{{ __('SĐT Nhân Viên') }}<span
                                                    class="text-danger">*</span> :</label>
                                            <input type="text" class="form-control" id="phone"
                                                placeholder="Nhập SĐT" name="phone"
                                                @if (!empty($staff['phone'])) value="{{ $staff['phone'] }}" @else value="{{ old('phone') }}" @endif>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="address">{{ __('Địa Chỉ Nhân Viên') }}<span
                                                    class="text-danger">*</span> :</label>
                                            <input type="text" class="form-control" id="address"
                                                placeholder="Nhập địa chỉ " name="address"
                                                @if (!empty($staff['address'])) value="{{ $staff['address'] }}" @else value="{{ old('address') }}" @endif>
                                        </div>
                                    </div>
                                </div>
                                <button type="submit"
                                    class="btn btn-primary mr-2 float-right">{{ __('Lưu') }}</button>
                                <a class="btn btn-danger " href="{{ url('admin/staff') }}">{{ __('Quay lai ') }}</a>

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
