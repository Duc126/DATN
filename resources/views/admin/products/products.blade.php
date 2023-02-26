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
                            <h4 class="card-title">{{ __('Sản Phẩm') }}</h4>
                            <a style="max-width: 150px; float:right;display: inline-block;"
                                href="{{ url('admin/add-edit-product') }}" class="btn btn-block btn-primary">Thêm Sản
                                Phẩm</a>
                            @if (Session::has('success_message'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <strong>{{ __('Thành Công') }}:</strong> {{ Session::get('success_message') }}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @endif
                            <div class="table-responsive">
                                <table id="products" class="table table-striped display">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>{{ __('Tên Sản Phẩm') }}</th>
                                            <th>{{ __('Mã Sản Phẩm') }}</th>
                                            <th>{{ __('Màu Sản Phẩm') }}</th>
                                            <th>{{ __('Ảnh') }}</th>
                                            <th>{{ __('Thuộc Loại') }}</th>
                                            <th>{{ __('Thuộc Phần') }}</th>
                                            <th>{{ __('Thêm Bởi') }}</th>
                                            <th>{{ __('Trang Thái') }}</th>
                                            <th>{{ __('Hoạt động') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($products as $product)
                                            <tr>
                                                <td>{{ $product['id'] }}</td>
                                                <td>{{ $product['product_name'] }} </td>
                                                <td>{{ $product['product_code'] }} </td>
                                                <td>{{ $product['product_color'] }} </td>
                                                <td>
                                                    @if (!empty($product['product_image']))
                                                        <img
                                                            src="{{ asset('front/images/product_images/small/' . $product['product_image']) }}">
                                                    @else
                                                        <img
                                                            src="{{ asset('front/images/product_images/small/no-image.png') }}">
                                                    @endif
                                                </td>
                                                <td>{{ $product['category']['category_name'] }} </td>
                                                <td>{{ $product['section']['name'] }} </td>
                                                <td>
                                                    @if ($product['admin_type'] == 'vendor')
                                                        <a target="_blank"
                                                            href="{{ url('admin/view-vendor/' . $product['admin_id']) }}">
                                                            {{ $product['admin_type'] }}
                                                        </a>
                                                    @else
                                                        {{ ucfirst($product['admin_type']) }}
                                                    @endif
                                                </td>

                                                <td>
                                                    @if ($product['status'] == 1)
                                                        <a class="updateProduct" id="product-{{ $product['id'] }}"
                                                            product_id={{ $product['id'] }} href="javascript:void(0)">
                                                            <i style="font-size: 25px" class="mdi mdi mdi-bookmark-check"
                                                                status="Active"></i></a>
                                                    @else
                                                        <a class="updateProduct" id="product-{{ $product['id'] }}"
                                                            product_id={{ $product['id'] }} href="javascript:void(0)">
                                                            <i style="font-size: 25px" class="mdi mdi mdi-bookmark-outline"
                                                                status="Inactive"></i></a>
                                                    @endif()
                                                </td>
                                                <th>
                                                    <a href={{ url('admin/add-edit-product/' . $product['id']) }}>
                                                        <i style="font-size: 25px"
                                                            class="mdi mdi-pencil-box"data-toggle="tooltip"
                                                            data-placement="top" title="Chỉnh Sửa Sản Phẩm"></i></a>
                                                    <a href={{ url('admin/add-attributes-product/' . $product['id']) }}>
                                                        <i style="font-size: 25px" class="mdi mdi-plus-box"
                                                            data-toggle="tooltip" data-placement="top"
                                                            title="Thêm Thuộc Tính Sản Phẩm"></i></a>
                                                    <a href={{ url('admin/add-image-product/' . $product['id']) }}>
                                                        <i style="font-size: 25px" class="mdi mdi-library-plus"
                                                            data-toggle="tooltip" data-placement="top"
                                                            title="Thêm Ảnh Sản Phẩm"></i></a>
                                                    <a href="javascript:void(0)" class="confirmDelete" module="product"
                                                        moduleid="{{ $product['id'] }}">
                                                        <i style="font-size: 25px" class="mdi mdi-delete-sweep"
                                                            data-toggle="tooltip" data-placement="top"
                                                            title="Xóa Sản Phẩm"></i></a>
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
@endsection
