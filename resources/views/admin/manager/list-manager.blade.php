@extends('admin/layout/layout')
@section('content')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-md-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">{{ $title }}</h4>
                            <div class="table-responsive">
                                <table id="adminTable" class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>{{ __('Họ Tên') }}</th>
                                            <th>{{ __('Kiểu') }}</th>
                                            <th>{{ __('Số Điện Thoại') }}</th>
                                            <th>{{ __('Email') }}</th>
                                            <th>{{ __('Ảnh Đại Diện') }}</th>
                                            <th>{{ __('Trang Thái') }}</th>
                                            <th>{{ __('Hoạt động') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($admin as $adminList)
                                            <tr>
                                                <td>{{ $adminList['id'] }}</td>
                                                <td>{{ $adminList['first_name'] }} {{ $adminList['last_name'] }} </td>
                                                <td>
                                                    @if($adminList['type'] =="admin" )
                                                    <p>Admin</p>
                                                    @else
                                                    <p> Nhân Viên</p>
                                                    @endif

                                                </td>
                                                <td>{{ $adminList['phone'] }}</td>
                                                <td>{{ $adminList['email'] }}</td>
                                                <td>
                                                    @if ($adminList['image'] != '')
                                                        <img
                                                            src="{{ asset('admin/images/photos/' . $adminList['image']) }}">
                                                    @else
                                                        <img src="{{ asset('admin/images/photos/no-image.png') }}">
                                                    @endif
                                                </td>
                                                <td>
                                                    @if ($adminList['status'] == 1)
                                                        <a class="updateAdminStatus" id="admin-{{ $adminList['id'] }}"
                                                            admin_id={{ $adminList['id'] }} href="javascript:void(0)">
                                                            <i style="font-size: 25px" class="mdi mdi mdi-bookmark-check"
                                                                status="Active"></i></a>

                                                        {{-- <div style='display: flex;justify-content: center;'><span class ="badge text-white bg-success" status="Action">{{ __('Hoạt Động') }}</span></div></a> --}}
                                                    @else
                                                        <a class="updateAdminStatus" id="admin-{{ $adminList['id'] }}"
                                                            admin_id={{ $adminList['id'] }} href="javascript:void(0)">
                                                            <i style="font-size: 25px" class="mdi mdi mdi-bookmark-outline"
                                                                status="Inactive"></i></a>
                                                        {{-- <div style='display: flex;justify-content: center;'><span class ="badge text-white bg-danger" status="Inactive">{{ __('Không Hoạt Động') }}</span></div></a> --}}
                                                    @endif()
                                                </td>
                                                <th>
                                                    @if ($adminList['type'] == 'vendor')
                                                        <a href={{ url('admin/view-vendor/' . $adminList['id']) }}>
                                                            <i style="font-size: 25px"
                                                                class="mdi mdi mdi-table-edit"></i></a>
                                                    @endif

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
        <!-- content-wrapper ends -->
        <!-- partial:../../partials/_footer.html -->
        @include('admin.layout.footer')
        <!-- partial -->
    </div>
@endsection
