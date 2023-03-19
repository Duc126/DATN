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
                                @if (empty($product['id'])) action="{{ url('admin/add-edit-product') }}"
                            @else action="{{ url('admin/add-edit-product/' . $product['id']) }}" @endif
                                method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="category_id">{{ __('Chọn Danh Mục ') }}</label>
                                            <select name="category_id" id="category_id" class="form-control"
                                                style="color: #000;">
                                                <option value="">{{ __('Chọn Danh Mục ') }}</option>
                                                @foreach ($categories as $section)
                                                    <optgroup label="{{ $section['name'] }}"></optgroup>
                                                    @foreach ($section['categories'] as $category)
                                                        <option @if (!empty($product['category_id'] == $category['id'])) selected="" @endif
                                                            value="{{ $category['id'] }}">&nbsp; &nbsp; &nbsp;
                                                            --&nbsp;{{ $category['category_name'] }}</option>
                                                        @foreach ($category['subcategories'] as $subcategory)
                                                            <option @if (!empty($product['category_id'] == $subcategory['id'])) selected="" @endif
                                                                value="{{ $subcategory['id'] }}">
                                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;--&nbsp;
                                                                {{ $subcategory['category_name'] }}</option>
                                                        @endforeach
                                                    @endforeach
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="loadFilters">
                                            @include('admin.filters.category-filter')

                                        </div>
                                        <div class="form-group">
                                            <label for="brand_id">{{ __('Chọn Thương Hiệu ') }}</label>
                                            <select name="brand_id" id="brand_id" class="form-control"
                                                style="Color: #000;">
                                                <option value="">{{ __('Chọn Thương Hiệu ') }}</option>
                                                @foreach ($brands as $brand)
                                                    <option @if (!empty($product['brand_id'] == $brand['id'])) selected="" @endif
                                                        value="{{ $brand['id'] }}">{{ $brand['name'] }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="product_name">{{ __('Tên Sản Phẩm ') }}<span
                                                    class="text-danger">*</span> :</label>
                                            <input type="text" class="form-control" id="product_name"
                                                placeholder="Nhập Tên Sản Phẩm" name="product_name"
                                                @if (!empty($product['product_name'])) value="{{ $product['product_name'] }}" @else value="{{ old('product_name') }}" @endif>
                                        </div>
                                        <div class="form-group">
                                            <label for="product_code">{{ __('Mã Sản Phẩm ') }}<span
                                                    class="text-danger">*</span> :</label>
                                            <input type="text" class="form-control" id="product_code"
                                                placeholder="Nhập Mã Sản Phẩm" name="product_code"
                                                @if (!empty($product['product_code'])) value="{{ $product['product_code'] }}" @else value="{{ old('product_code') }}" @endif>
                                        </div>
                                        <div class="form-group">
                                            <label for="product_color">{{ __('Product Color ') }}<span
                                                    class="text-danger">*</span> :</label>
                                            <input type="text" class="form-control" id="product_color"
                                                placeholder="Nhập Màu Sản Phẩm" name="product_color"
                                                @if (!empty($product['product_color'])) value="{{ $product['product_color'] }}" @else value="{{ old('product_color') }}" @endif>
                                        </div>
                                        <div class="form-group">
                                            <label for="product_price">{{ __('Giá Sản Phẩm ') }}<span
                                                    class="text-danger">*</span> :</label>
                                            <input type="text" class="form-control" id="product_price"
                                                placeholder="Nhập Giá Sản Phẩm" name="product_price"
                                                @if (!empty($product['product_price'])) value="{{ $product['product_price'] }}" @else value="{{ old('product_price') }}" @endif>
                                        </div>
                                        <div class="form-group">
                                            <label for="product_discount">{{ __('Giảm Giá Sản Phẩm (%) ') }}<span
                                                    class="text-danger">*</span> :</label>
                                            <input type="text" class="form-control" id="product_discount"
                                                placeholder="Nhập % Giảm Giá Sản Phẩm" name="product_discount"
                                                @if (!empty($product['product_discount'])) value="{{ $product['product_discount'] }}" @else value="{{ old('product_discount') }}" @endif>
                                        </div>
                                        <div class="form-group">
                                            <label for="product_weight">{{ __('Trọng Lượng Sản Phẩm ') }} :</label>
                                            <input type="text" class="form-control" id="product_weight"
                                                placeholder="Nhập Trọng Lượng Sản Phẩm" name="product_weight"
                                                @if (!empty($product['product_weight'])) value="{{ $product['product_weight'] }}" @else value="{{ old('product_weight') }}" @endif>
                                        </div>
                                        <div class="form-group">
                                            <label for="group_code">{{ __('Mã Nhóm ') }}<span class="text-danger">*</span>
                                                :</label>
                                            <input type="text" class="form-control" id="group_code"
                                                placeholder="Nhập Mã Nhóm" name="group_code"
                                                @if (!empty($product['group_code'])) value="{{ $product['group_code'] }}" @else value="{{ old('group_code') }}" @endif>
                                        </div>
                                        {{-- <div id="appendProductsLevel">
                                            @include('admin.products.append-product')
                                        </div> --}}
                                        <div class="form-group">
                                            <label
                                                for="product_image">{{ __('Danh Mục Hình Ảnh (Kích thước ảnh: 1000x1000)') }}
                                                :</label>
                                            <input type="file" class="form-control" id="product_image"
                                                name="product_image">
                                            @if (!empty($product['product_image']))
                                                <a target="_blank"
                                                    href="{{ url('front/images/product_images/medium/' . $product['product_image']) }}">
                                                    {{ __('Xem Ảnh') }}</a>&nbsp;|&nbsp;
                                                <a href="javascript:void(0)" class="confirmDelete" module="product-image"
                                                    moduleid="{{ $product['id'] }}">{{ __('Xóa Ảnh') }}</a>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label
                                                for="product_video">{{ __('Danh Mục Video (Kích thước video: Ít hơn 2MB )') }}
                                                :</label>
                                            <input type="file" class="form-control" id="product_video"
                                                name="product_video">
                                            @if (!empty($product['product_video']))
                                                <a target="_blank"
                                                    href="{{ url('front/videos/product_videos/' . $product['product_video']) }}">
                                                    {{ __('Xem Video') }}</a>&nbsp;|&nbsp;
                                                <a href="javascript:void(0)" class="confirmDelete" module="product-video"
                                                    moduleid="{{ $product['id'] }}">{{ __('Xóa Video') }}
                                                </a>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <label for="category_discount">{{ __('Danh Mục Giảm Giá') }} :</label>
                                            <input type="number" class="form-control" id="category_discount"
                                                placeholder="Nhập Danh Mục Giảm Giá" name="category_discount"
                                                @if (!empty($product['category_discount'])) value="{{ $product['category_discount'] }}" @else value="{{ old('category_discount') }}" @endif>
                                        </div>
                                        <div class="form-group">
                                            <label for="description">{{ __('Mô Tả Danh Mục') }}</label>
                                            <textarea name="description" id="description" class="form-control" rows="3">{{ $product['description'] }}</textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="meta_title">{{ __('Tiêu Đề Meta') }} :</label>
                                            <input type="text" class="form-control" id="meta_title"
                                                placeholder="Nhập Tiêu Đề " name="meta_title"
                                                @if (!empty($product['meta_title'])) value="{{ $product['meta_title'] }}" @else value="{{ old('meta_title') }}" @endif>
                                        </div>
                                        <div class="form-group">
                                            <label for="meta_description">{{ __('Mô Tả Meta') }} :</label>
                                            <input type="text" class="form-control" id="meta_description"
                                                placeholder="Nhập Mô Tả" name="meta_description"
                                                @if (!empty($product['meta_description'])) value="{{ $product['meta_description'] }}" @else value="{{ old('meta_description') }}" @endif>
                                        </div>
                                        <div class="form-group">
                                            <label for="meta_keywords">{{ __('Từ Khóa Meta') }} :</label>
                                            <input type="text" class="form-control" id="meta_keywords"
                                                placeholder="Nhập Từ Khóa" name="meta_keywords"
                                                @if (!empty($product['meta_keywords'])) value="{{ $product['meta_keywords'] }}" @else value="{{ old('meta_keywords') }}" @endif>
                                        </div>
                                        <div class="form-group">
                                            <label for="is_featured">{{ __('Đặc sắc') }}
                                            </label>
                                            <input type="checkbox" name="is_featured" id="is_featured" value="Yes"
                                                @if (!empty($product['is_featured']) && $product['is_featured'] == 'Yes') checked="" @endif>

                                        </div>
                                        <div class="form-group">
                                            <label for="is_bestseller">{{ __('Sản Phẩm Bán Chạy Nhất') }}
                                            </label>
                                            <input type="checkbox" name="is_bestseller" id="is_bestseller"
                                                value="Yes" @if (!empty($product['is_bestseller']) && $product['is_bestseller'] == 'Yes') checked="" @endif>

                                        </div>
                                    </div>
                                </div>
                                <button type="submit"
                                    class="btn btn-primary mr-2 float-right">{{ __('Lưu') }}</button>
                                <a class="btn btn-danger" href="{{ url('admin/products') }}">{{ __('Quay lai') }}</a>
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
