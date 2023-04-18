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
                            <h4 class="card-title">{{ __('Chi phí vận chuyển') }}</h4>

                            @if (Session::has('success_message'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <strong>{{ __('Thành Công') }}:</strong> {{ Session::get('success_message') }}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @endif
                            <div class="table-responsive">
                                <table id="shipping" class="table table-striped display">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>{{ __('Tỉnh') }}</th>
                                            {{-- <th>{{ __('Quốc gia') }}</th> --}}
                                            <th>{{ __('Giá Từ 0g-500g') }}</th>
                                            <th>{{ __('Giá Từ 501g-1000g') }}</th>
                                            <th>{{ __('Giá Từ 1001g-2000g') }}</th>
                                            <th>{{ __('Giá Từ 2001g-5000g') }}</th>
                                            <th>{{ __('Giá Trên 5000g') }}</th>
                                            <th>{{ __('Trang Thái') }}</th>
                                            <th>{{ __('Hoạt động') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($shippingCharges as $shipping)
                                            <tr>
                                                <td>{{ $shipping['id'] }}</td>
                                                <td>{{ $shipping['state'] }}</td>
                                                {{-- <td>{{ $shipping['country'] }} </td> --}}
                                                <td>{{ $shipping['0_500g'] }}.VNĐ </td>
                                                <td>{{ $shipping['501_1000g'] }}.VNĐ </td>
                                                <td>{{ $shipping['1001_2000g'] }}.VNĐ </td>
                                                <td>{{ $shipping['2001_5000g'] }}.VNĐ </td>
                                                <td>{{ $shipping['above_5000g'] }}.VNĐ </td>
                                                <td>
                                                    @if ($shipping['status'] == 1)
                                                        <a class="updateShipping" id="shipping-{{ $shipping['id'] }}"
                                                            shipping_id={{ $shipping['id'] }} href="javascript:void(0)">
                                                            <i style="font-size: 25px" class="mdi mdi mdi-bookmark-check"
                                                                status="Active"></i></a>
                                                    @else
                                                        <a class="updateShipping" id="shipping-{{ $shipping['id'] }}"
                                                            shipping_id={{ $shipping['id'] }} href="javascript:void(0)">
                                                            <i style="font-size: 25px" class="mdi mdi mdi-bookmark-outline"
                                                                status="Inactive"></i></a>
                                                    @endif()
                                                </td>
                                                <th>
                                                    <a href={{ url('admin/add-edit-shipping/' . $shipping['id']) }}>
                                                        <i style="font-size: 25px" class="mdi mdi mdi-pencil-box"></i></a>

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
