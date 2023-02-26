@extends('admin/layout/layout')
@section('content')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-md-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">{{ __('Ảnh Sản Phẩm') }}</h4>
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
                                @if (empty($imageProduct['id'])) action="{{ url('admin/add-image-product') }}"
                            @else action="{{ url('admin/add-image-product/' . $imageProduct['id']) }}" @endif
                                method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="product_name">{{ __('Tên Sản Phẩm ') }}<span
                                                    class="text-danger">*</span> :</label>
                                            &nbsp; {{ $imageProduct['product_name'] }}
                                        </div>
                                        <div class="form-group">
                                            <label for="product_code">{{ __('Mã Sản Phẩm ') }}<span
                                                    class="text-danger">*</span> :</label>
                                            &nbsp; {{ $imageProduct['product_code'] }}
                                        </div>
                                        <div class="form-group">
                                            <label for="product_color">{{ __('Màu Sản Phẩm ') }}<span
                                                    class="text-danger">*</span> :</label>
                                            &nbsp; {{ $imageProduct['product_color'] }}
                                        </div>
                                        <div class="form-group">
                                            <label for="product_price">{{ __('Giá Sản Phẩm ') }}<span
                                                    class="text-danger">*</span> :</label>
                                            &nbsp; {{ $imageProduct['product_price'] }}
                                        </div>
                                        <div class="form-group">
                                            @if (!empty($imageProduct['product_image']))
                                                <img style="width: 120px;"
                                                    src="{{ url('front/images/product_images/small/' . $imageProduct['product_image']) }}">
                                            @else
                                                <img style="width: 120px;"
                                                    src="{{ url('front/images/product_images/small/no-image.png') }}">
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <div class="field_wrapper">
                                                <div>
                                                    <input type="file" name="images[]" multiple="" id="images">
                                                    {{-- <a href="javascript:void(0);" class="add_button"
                                                        title="Add field">{{ __('Thêm') }}</a> --}}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <button type="submit"
                                    class="btn btn-primary mr-2 float-right">{{ __('Lưu') }}</button>
                                <button class="btn btn-danger"
                                    href="{{ url('admin/products') }}">{{ __('Quay Lại') }}</button>
                            </form>
                            <br>
                            <br>
                            <h5><strong>
                                    {{ _('Bảng Hình Ảnh') }}</strong></h5>
                            <div class="table-responsive">
                                <form method="post" action={{ url('admin/edit-attributes/' . $imageProduct['id']) }}>
                                    @csrf
                                    <table id="image_Product" class="table table-striped display">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>{{ __('Ảnh') }}</th>
                                                <th>{{ __('Trạng Thái') }}</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($imageProduct['images'] as $image)
                                                <tr>
                                                    <td>{{ $image['id'] }}</td>
                                                    <td>
                                                        <img
                                                            src="{{ url('front/images/product_images/small/' . $image['image']) }}">
                                                    </td>
                                                    <td>
                                                        @if ($image['status'] == 1)
                                                            <a class="updateImageProduct" id="image-{{ $image['id'] }}"
                                                                image_id={{ $image['id'] }} href="javascript:void(0)">
                                                                <i style="font-size: 25px"
                                                                    class="mdi mdi mdi-bookmark-check"
                                                                    status="Active"></i></a>
                                                        @else
                                                            <a class="updateImageProduct" id="image-{{ $image['id'] }}"
                                                                image_id={{ $image['id'] }} href="javascript:void(0)">
                                                                <i style="font-size: 25px"
                                                                    class="mdi mdi mdi-bookmark-outline"
                                                                    status="Inactive"></i></a>
                                                        @endif

                                                        &nbsp;
                                                        <a href="javascript:void(0)" class="confirmDelete" module="image"
                                                        moduleid="{{ $image['id'] }}">
                                                        <i style="font-size: 25px" class="mdi mdi-delete-sweep"
                                                            data-toggle="tooltip" data-placement="top"
                                                            title="Xóa Sản Phẩm"></i></a>
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
