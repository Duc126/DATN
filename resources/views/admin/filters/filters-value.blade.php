<?php use App\Models\ProductsFilter; ?>

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
                            <h4 class="card-title">{{ __('messages.filter.value-filter') }}</h4>
                            <a style="max-width: 175px; float:right;display: inline-block;"
                                href="{{ url('admin/add-edit-filter-value') }}"
                                class="btn btn-block btn-primary">{{ __('messages.filter.add-value-filter') }}</a>
                            @if (Session::has('success_message'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <strong>{{ __('Thành Công') }}:</strong> {{ Session::get('success_message') }}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @endif
                            <div class="table-responsive">
                                <table id="filters" class="table table-striped display">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>{{ __('ID') }}</th>
                                            <th>{{ __('messages.filter.name') }}</th>
                                            <th>{{ __('messages.filter.column_value_filter') }}</th>
                                            <th>{{ __('messages.table.status') }}</th>
                                            <th>{{ __('messages.table.action') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($filters_values as $filterValue)
                                            <tr>
                                                <td>{{ $filterValue['id'] }}</td>
                                                <td>{{ $filterValue['filter_id'] }}</td>
                                                <td>
                                                    <?php
                                                    echo $getFilterName = ProductsFilter::getFilterName($filterValue['filter_id']);
                                                    ?>
                                                </td>
                                                <td>{{ $filterValue['filter_value'] }} </td>
                                                <td>
                                                    @if ($filterValue['status'] == 1)
                                                        <a class="updateFiltersValue"
                                                            id="filterValue-{{ $filterValue['id'] }}"
                                                            filterValue_id={{ $filterValue['id'] }}
                                                            href="javascript:void(0)">
                                                            <i style="font-size: 25px" class="mdi mdi mdi-bookmark-check"
                                                                status="Active"></i></a>
                                                    @else
                                                        <a class="updateFiltersValue"
                                                            id="filterValue-{{ $filterValue['id'] }}"
                                                            filterValue_id={{ $filterValue['id'] }}
                                                            href="javascript:void(0)">
                                                            <i style="font-size: 25px" class="mdi mdi mdi-bookmark-outline"
                                                                status="Inactive"></i></a>
                                                    @endif()
                                                </td>
                                                <th>
                                                    <a href={{ url('admin/add-edit-filter/' . $filterValue['id']) }}>
                                                        <i style="font-size: 25px" class="mdi mdi mdi-pencil-box"></i></a>

                                                    <a href="javascript:void(0)" class="confirmDelete" module="brand"
                                                        moduleid="{{ $filterValue['id'] }}">
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
