@extends('admin/layout/layout')
@section('css')
    <!--datatable css-->
    <link href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css" rel="stylesheet" type="text/css" />
    <!--datatable responsive css-->
    <link href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.bootstrap.min.css" rel="stylesheet"
        type="text/css" />
    <link href="https://cdn.datatables.net/buttons/2.2.2/css/buttons.dataTables.min.css" rel="stylesheet" type="text/css" />
@endsection
@section('content')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-md-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">{{ __('Danh Mục') }}</h4>
                            <a style="max-width: 175px; float:right;display: inline-block;"
                                href="{{ url('admin/add-edit-category') }}" class="btn btn-block btn-primary">{{__('Thêm Danh Mục')}}</a>
                            @if (Session::has('success_message'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <strong>{{ __('Thành Công') }}:</strong> {{ Session::get('success_message') }}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @endif
                            <div class="table-responsive">
                                <table id="category" class="table table-striped display">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>{{ __('Tên Loại') }}</th>
                                            <th>{{ __('Nguồn Gốc') }}</th>
                                            <th>{{ __('Thuộc nhóm') }}</th>
                                            <th>{{ __('url') }}</th>
                                            <th>{{ __('Trang Thái') }}</th>
                                            <th>{{ __('Hoạt động') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($categories as $category)
                                            @if (isset($category['parentcategory']['category_name']) && !empty($category['parentcategory']['category_name']))
                                                @php $parent_category = $category['parentcategory']['category_name']; @endphp
                                            @else
                                                @php $parent_category="Root";  @endphp
                                            @endif
                                            <tr>
                                                <td>{{ $category['id'] }}</td>
                                                <td>{{ $category['category_name'] }} </td>
                                                <td>
                                                    {{ $parent_category }}
                                                 </td>
                                                <td>{{ $category['section']['name'] }} </td>
                                                <td>{{ $category['url'] }} </td>
                                                <td>
                                                    @if ($category['status'] == 1)
                                                        <a class="updateCategory" id="category-{{ $category['id'] }}"
                                                            category_id={{ $category['id'] }}
                                                            href="javascript:void(0)">
                                                            <i style="font-size: 25px" class="mdi mdi mdi-bookmark-check"
                                                                status="Active"></i></a>
                                                    @else
                                                        <a class="updateCategory" id="category-{{ $category['id'] }}"
                                                            category_id={{ $category['id'] }}
                                                            href="javascript:void(0)">
                                                            <i style="font-size: 25px" class="mdi mdi mdi-bookmark-outline"
                                                                status="Inactive"></i></a>
                                                    @endif()
                                                </td>
                                                <th>
                                                    <a href={{ url('admin/add-edit-category/' . $category['id']) }}>
                                                        <i style="font-size: 25px" class="mdi mdi mdi-pencil-box"></i></a>
                                                    <a href="javascript:void(0)" class="confirmDelete" module="category"
                                                        moduleid="{{ $category['id'] }}">
                                                        <i style="font-size: 25px" class="mdi mdi mdi-delete-sweep"></i></a>
                                                </th>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    {{-- <script src="{{ url('admin/js/section.js') }}"></script> --}}
@endsection
