@extends('admin/layout/layout')
@section('content')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-md-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">{{ __('Thuộc Tính Sản Phẩm') }}</h4>
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
                                @if (empty($productAttributes['id'])) action="{{ url('admin/add-attributes-product') }}"
                            @else action="{{ url('admin/add-attributes-product/' . $productAttributes['id']) }}" @endif
                                method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="product_name">{{ __('Tên Sản Phẩm ') }}<span
                                                    class="text-danger">*</span> :</label>
                                            &nbsp; {{ $productAttributes['product_name'] }}
                                        </div>
                                        <div class="form-group">
                                            <label for="product_code">{{ __('Mã Sản Phẩm ') }}<span
                                                    class="text-danger">*</span> :</label>
                                            &nbsp; {{ $productAttributes['product_code'] }}
                                        </div>
                                        <div class="form-group">
                                            <label for="product_color">{{ __('Màu Sản Phẩm ') }}<span
                                                    class="text-danger">*</span> :</label>
                                            &nbsp; {{ $productAttributes['product_color'] }}
                                        </div>
                                        <div class="form-group">
                                            <label for="product_price">{{ __('Giá Sản Phẩm ') }}<span
                                                    class="text-danger">*</span> :</label>
                                            &nbsp; {{ $productAttributes['product_price'] }}
                                        </div>
                                        <div class="form-group">
                                            @if (!empty($productAttributes['product_image']))
                                                <img style="width: 120px;"
                                                    src="{{ url('front/images/product_images/small/' . $productAttributes['product_image']) }}">
                                            @else
                                                <img style="width: 120px;"
                                                    src="{{ url('front/images/product_images/small/no-image.png') }}">
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <div class="field_wrapper">
                                                <div>
                                                    <input type="text" name="size[]" placeholder="Kích Thước" required
                                                        style="width:120px;">
                                                    <input type="text" name="sku[]" placeholder="Mã Sản Phẩm" required
                                                        style="width:120px;">
                                                    <input type="text" name="price[]" placeholder="Giá" required
                                                        style="width:120px;">
                                                    <input type="text" name="stock[]" placeholder="Số Lượng" required
                                                        style="width:120px;">
                                                    <a href="javascript:void(0);" class="add_button"
                                                        title="Add field">{{ __('Thêm') }}</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <button type="submit"
                                    class="btn btn-primary mr-2 float-right">{{ __('Lưu') }}</button>
                                    <a class="btn btn-danger" href="{{ url('admin/products') }}">{{ __('Quay lai ') }}</a>

                            </form>
                            <br>
                            <br>
                            <h5><strong>
                                    {{ _('Bảng thuộc tính') }}</strong></h5>
                            <div class="table-responsive">
                                <form method="post"
                                    action={{ url('admin/edit-attributes/' . $productAttributes['id']) }}>
                                    @csrf
                                    <table id="attributes_Product" class="table table-striped display">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>{{ __('Kích Thước') }}</th>
                                                <th>{{ __('Mã Sản Phẩm') }}</th>
                                                <th>{{ __('Giá') }}</th>
                                                <th>{{ __('Số Lựơng') }}</th>
                                                <th>{{ __('Trạng Thái') }}</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($productAttributes['attributes'] as $attributes)
                                            <input class="d-none" type="text" name="attributeId[]" value="{{ $attributes['id'] }}">
                                                <tr>
                                                    <td>{{ $attributes['id'] }}</td>
                                                    <td>{{ $attributes['size'] }} </td>
                                                    <td>{{ $attributes['sku'] }} </td>
                                                    <td>
                                                        <input type="number" name="price[]"
                                                            value="{{ $attributes['price'] }}" require class="w-50">
                                                    </td>
                                                    <td>
                                                        <input type="number" name="stock[]"
                                                            value="{{ $attributes['stock'] }}" require class="w-50">
                                                    </td>
                                                    <td>
                                                        @if ($attributes['status'] == 1)
                                                            <a class="updateAttributesProduct"
                                                                id="attributes-{{ $attributes['id'] }}"
                                                                attributes_id={{ $attributes['id'] }}
                                                                href="javascript:void(0)">
                                                                <i style="font-size: 25px"
                                                                    class="mdi mdi mdi-bookmark-check"
                                                                    status="Active"></i></a>
                                                        @else
                                                            <a class="updateAttributesProduct"
                                                                id="attributes-{{ $attributes['id'] }}"
                                                                attributes_id={{ $attributes['id'] }}
                                                                href="javascript:void(0)">
                                                                <i style="font-size: 25px"
                                                                    class="mdi mdi mdi-bookmark-outline"
                                                                    status="Inactive"></i></a>
                                                        @endif()
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                    <button type="submit" class="btn btn-primary">{{ __('Cập Nhật') }}</button>
                                </form>
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
