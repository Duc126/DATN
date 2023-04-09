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
                                @if (empty($filter['id'])) action="{{ url('admin/add-edit-filter') }}"
                            @else action="{{ url('admin/add-edit-filter/' . $filter['id']) }}" @endif
                                method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="cat_ids">{{ __('Chọn Danh Mục ') }}</label>
                                            <select name="cat_ids[]" id="cat_ids" class="form-control"
                                                style="color: #000; height:200px" multiple="">
                                                <option value="">{{ __('Chọn Danh Mục ') }}</option>
                                                @foreach ($categories as $section)
                                                    <optgroup label="{{ $section['name'] }}"></optgroup>
                                                    @foreach ($section['categories'] as $category)
                                                        <option @if (!empty($filter['category_id'] == $category['id'])) selected="" @endif
                                                            value="{{ $category['id'] }}">&nbsp; &nbsp; &nbsp;
                                                            --&nbsp;{{ $category['category_name'] }}</option>
                                                        @foreach ($category['subcategories'] as $subcategory)
                                                            <option @if (!empty($filter['category_id'] == $subcategory['id'])) selected="" @endif
                                                                value="{{ $subcategory['id'] }}">
                                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;--&nbsp;
                                                                {{ $subcategory['category_name'] }}</option>
                                                        @endforeach
                                                    @endforeach
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label for="filter_name">{{ __('Tên Bộ Lọc') }}<span
                                                    class="text-danger">*</span> :</label>
                                            <input type="text" class="form-control" id="filter_name"
                                                placeholder="Nhập Tên Bộ Lọc" name="filter_name"
                                                @if (!empty($filter['filter_name'])) value="{{ $filter['filter_name'] }}" @else value="{{ old('filter_name') }}" @endif>
                                        </div>

                                        <div class="form-group">
                                            <label for="filter_column">{{ __('Cột Lọc') }}<span
                                                    class="text-danger">*</span> :</label>
                                            <input type="text" class="form-control" id="filter_column"
                                                placeholder="Nhập Cột Bộ Lọc" name="filter_column"
                                                @if (!empty($filter['filter_column'])) value="{{ $filter['filter_column'] }}" @else value="{{ old('filter_column') }}" @endif>
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
