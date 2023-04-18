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
                            <h4 class="card-title">{{ __('Danh Sách Nhân Viên') }}</h4>
                            <a style="max-width: 175px; float:right;display: inline-block;"
                                href="{{ url('admin/add-edit-staff') }}"
                                class="btn btn-block btn-primary">{{ __('Thêm Nhân Viên') }}</a>
                            @if (Session::has('success_message'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <strong>{{ __('Thành Công') }}:</strong> {{ Session::get('success_message') }}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @endif
                            <div class="table-responsive">
                                <table id="staff" class="table table-striped display">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>{{ __('Tên') }}</th>
                                            <th>{{ __('Số Điện Thoại') }}</th>
                                            <th>{{ __('Địa Chỉ') }}</th>
                                            <th>{{ __('Trang Thái') }}</th>
                                            <th>{{ __('Hoạt động') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($staff as $listStaff)
                                            <tr>
                                                <td>{{ $listStaff['id'] }}</td>
                                                <td>{{ $listStaff['name'] }} </td>
                                                <td>{{ $listStaff['phone'] }} </td>
                                                <td>{{ $listStaff['address'] }} </td>
                                                <td>
                                                    @if ($listStaff['status'] == 1)
                                                        <a class="updateStaff" id="staff-{{ $listStaff['id'] }}"
                                                            staff_id={{ $listStaff['id'] }} href="javascript:void(0)">
                                                            <i style="font-size: 25px" class="mdi mdi mdi-bookmark-check"
                                                                status="Active"></i></a>
                                                    @else
                                                        <a class="updateStaff" id="staff-{{ $listStaff['id'] }}"
                                                            staff_id={{ $listStaff['id'] }} href="javascript:void(0)">
                                                            <i style="font-size: 25px" class="mdi mdi mdi-bookmark-outline"
                                                                status="Inactive"></i></a>
                                                    @endif()
                                                </td>
                                                <th>
                                                    <a href={{ url('admin/add-edit-staff/' . $listStaff['id']) }}>
                                                        <i style="font-size: 25px" class="mdi mdi mdi-pencil-box"></i></a>

                                                    <a href="javascript:void(0)" class="confirmDelete" module="staff"
                                                        moduleid="{{ $listStaff['id'] }}">
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
