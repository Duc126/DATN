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
                            <h4 class="card-title">{{ __('messages.user') }}</h4>
                            @if (Session::has('success_message'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <strong>{{ __('messages.succes') }}:</strong> {{ Session::get('success_message') }}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @endif
                            <div class="table-responsive">
                                <table id="users" class="table table-striped display">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>{{ __('messages.list-user.name') }}</th>
                                            <th>{{ __('messages.list-user.address') }}</th>
                                            <th>{{ __('messages.list-user.city') }}</th>
                                            <th>{{ __('messages.list-user.phone') }}</th>

                                            {{-- <th>{{ __('Quốc Gia') }}</th> --}}
                                            <th>{{ __('Email') }}</th>
                                            <th>{{ __('messages.table.status') }}</th>
                                            <th>{{ __('messages.table.action') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($users as $userList)
                                            <tr>
                                                <td>{{ $userList['id'] }}</td>
                                                <td>{{ $userList['name'] }} </td>
                                                <td>{{ $userList['address'] }} </td>
                                                <td>{{ $userList['city'] }} </td>
                                                {{-- <td>{{ $userList['country'] }} </td> --}}
                                                <td>{{ $userList['phone'] }} </td>
                                                <td>{{ $userList['email'] }} </td>

                                                <td>
                                                    @if ($userList['status'] == 1)
                                                        <a class="updateUser" id="user-{{ $userList['id'] }}"
                                                            user_id={{ $userList['id'] }} href="javascript:void(0)">
                                                            <i style="font-size: 25px" class="mdi mdi mdi-bookmark-check"
                                                                status="Active"></i></a>
                                                    @else
                                                        <a class="updateUser" id="user-{{ $userList['id'] }}"
                                                            user_id={{ $userList['id'] }} href="javascript:void(0)">
                                                            <i style="font-size: 25px" class="mdi mdi mdi-bookmark-outline"
                                                                status="Inactive"></i></a>
                                                    @endif()
                                                </td>
                                                <th>
                                                    {{-- <a href={{ url('admin/add-edit-category/' . $userList['id']) }}>
                                                        <i style="font-size: 25px" class="mdi mdi mdi-pencil-box"></i></a> --}}
                                                    <a href="javascript:void(0)" class="confirmDelete" module="user"
                                                        moduleid="{{ $userList['id'] }}">
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
