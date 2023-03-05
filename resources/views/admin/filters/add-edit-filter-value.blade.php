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
                                @if (empty($filterValue['id'])) action="{{ url('admin/add-edit-filter-value') }}"
                            @else action="{{ url('admin/add-edit-filter-value/' . $filterValue['id']) }}" @endif
                                method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="filter_id">{{ __('Chọn Danh Mục ') }}</label>
                                            <select name="filter_id" id="filter_id" class="form-control"
                                                style="color: #000;" >
                                                <option value="">{{ __('Chọn Danh Mục ') }}</option>
                                                @foreach ($filters as $filter)
                                                <option value="{{ $filter['id'] }}">
                                                    {{ $filter['filter_name'] }}
                                                </option>

                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="filter_value">{{ __('Tên Bộ Lọc') }}<span
                                                    class="text-danger">*</span> :</label>
                                            <input type="text" class="form-control" id="filter_value"
                                                placeholder="Nhập Tên Sản Phẩm" name="filter_value"
                                                @if (!empty($filterValue['filter_value'])) value="{{ $filterValue['filter_value'] }}" @else value="{{ old('filter_value') }}" @endif>
                                        </div>


                                    </div>
                                </div>
                                <button type="submit"
                                    class="btn btn-primary mr-2 float-right">{{ __('Lưu') }}</button>
                                <a class="btn btn-danger" href="{ url('admin/filters') }}">{{ __('Quay lai ') }}</a>

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
