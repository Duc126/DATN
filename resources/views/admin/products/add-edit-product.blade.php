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
                                            <label for="category_id">{{ __('messages.product.select-category') }}</label>
                                            <select name="category_id" id="category_id" class="form-control"
                                                style="color: #000;">
                                                <option value="">{{ __('messages.product.select-category') }}</option>
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
                                            <label for="brand_id">{{ __('messages.product.select-brand') }}</label>
                                            <select name="brand_id" id="brand_id" class="form-control"
                                                style="Color: #000;">
                                                <option value="">{{ __('messages.product.select-brand') }}</option>
                                                @foreach ($brands as $brand)
                                                    <option @if (!empty($product['brand_id'] == $brand['id'])) selected="" @endif
                                                        value="{{ $brand['id'] }}">{{ $brand['name'] }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="product_name">{{ __('messages.product.name') }}<span
                                                    class="text-danger">*</span> :</label>
                                            <input type="text" class="form-control" id="product_name"
                                                name="product_name"
                                                @if (!empty($product['product_name'])) value="{{ $product['product_name'] }}" @else value="{{ old('product_name') }}" @endif>
                                        </div>
                                        <div class="form-group">
                                            <label for="product_code">{{ __('messages.product.code') }}<span
                                                    class="text-danger">*</span> :</label>
                                            <input type="text" class="form-control" id="product_code"
                                                 name="product_code"
                                                @if (!empty($product['product_code'])) value="{{ $product['product_code'] }}" @else value="{{ old('product_code') }}" @endif>
                                        </div>
                                        <div class="form-group">
                                            <label for="product_color">{{ __('messages.product.color') }}<span
                                                    class="text-danger">*</span> :</label>
                                            <input type="text" class="form-control" id="product_color"
                                                name="product_color"
                                                @if (!empty($product['product_color'])) value="{{ $product['product_color'] }}" @else value="{{ old('product_color') }}" @endif>
                                        </div>
                                        <div class="form-group">
                                            <label for="product_price">{{ __('messages.product.price') }}<span
                                                    class="text-danger">*</span> :</label>
                                            <input type="text" class="form-control" id="product_price"
                                                name="product_price"
                                                @if (!empty($product['product_price'])) value="{{ $product['product_price'] }}" @else value="{{ old('product_price') }}" @endif>
                                        </div>
                                        <div class="form-group">
                                            <label for="product_discount">{{ __('messages.discount') }}<span
                                                    class="text-danger">*</span> :</label>
                                            <input type="text" class="form-control" id="product_discount"
                                               name="product_discount"
                                                @if (!empty($product['product_discount'])) value="{{ $product['product_discount'] }}" @else value="{{ old('product_discount') }}" @endif>
                                        </div>
                                        <div class="form-group">
                                            <label for="product_weight">{{ __('messages.product.product_weight') }} :</label>
                                            <input type="text" class="form-control" id="product_weight"
                                                name="product_weight"
                                                @if (!empty($product['product_weight'])) value="{{ $product['product_weight'] }}" @else value="{{ old('product_weight') }}" @endif>
                                        </div>
                                        <div class="form-group">
                                            <label for="group_code">{{ __('messages.product.group_code') }}
                                                :</label>
                                            <input type="text" class="form-control" id="group_code"
                                                name="group_code"
                                                @if (!empty($product['group_code'])) value="{{ $product['group_code'] }}" @else value="{{ old('group_code') }}" @endif>
                                        </div>
                                        {{-- <div id="appendProductsLevel">
                                            @include('admin.products.append-product')
                                        </div> --}}
                                        <div class="form-group">
                                            <label
                                                for="product_image">{{ __('messages.image') }}
                                                :</label>
                                            <input type="file" class="form-control" id="product_image"
                                                name="product_image">
                                            @if (!empty($product['product_image']))
                                                <a target="_blank"
                                                    href="{{ url('front/images/product_images/medium/' . $product['product_image']) }}">
                                                    {{ __('messages.view_image') }}</a>&nbsp;|&nbsp;
                                                <a href="javascript:void(0)" class="confirmDelete" module="product-image"
                                                    moduleid="{{ $product['id'] }}">{{ __('messages.delete_image') }}</a>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label
                                                for="product_video">{{ __('messages.video') }}
                                                :</label>
                                            <input type="file" class="form-control" id="product_video"
                                                name="product_video">
                                            @if (!empty($product['product_video']))
                                                <a target="_blank"
                                                    href="{{ url('front/videos/product_videos/' . $product['product_video']) }}">
                                                    {{ __('messages.view_video') }}</a>&nbsp;|&nbsp;
                                                <a href="javascript:void(0)" class="confirmDelete" module="product-video"
                                                    moduleid="{{ $product['id'] }}">{{ __('messages.delete_video') }}
                                                </a>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <label for="category_discount">{{ __('messages.product.category_discount') }} :</label>
                                            <input type="number" class="form-control" id="category_discount"
                                               name="category_discount"
                                                @if (!empty($product['category_discount'])) value="{{ $product['category_discount'] }}" @else value="{{ old('category_discount') }}" @endif>
                                        </div>
                                        <div class="form-group">
                                            <label for="description">{{ __('messages.description') }}</label>
                                            <textarea name="description" id="description" class="form-control" rows="3">{{ $product['description'] }}</textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="meta_title">{{ __('messages.title_meta') }} :</label>
                                            <input type="text" class="form-control" id="meta_title"
                                                 name="meta_title"
                                                @if (!empty($product['meta_title'])) value="{{ $product['meta_title'] }}" @else value="{{ old('meta_title') }}" @endif>
                                        </div>
                                        <div class="form-group">
                                            <label for="meta_description">{{ __('messages.description_meta') }} :</label>
                                            <input type="text" class="form-control" id="meta_description"
                                                 name="meta_description"
                                                @if (!empty($product['meta_description'])) value="{{ $product['meta_description'] }}" @else value="{{ old('meta_description') }}" @endif>
                                        </div>
                                        <div class="form-group">
                                            <label for="meta_keywords">{{ __('messages.keywords_meta') }} :</label>
                                            <input type="text" class="form-control" id="meta_keywords"
                                                 name="meta_keywords"
                                                @if (!empty($product['meta_keywords'])) value="{{ $product['meta_keywords'] }}" @else value="{{ old('meta_keywords') }}" @endif>
                                        </div>
                                        <div class="form-group">
                                            <label for="is_featured">{{ __('messages.product.featured') }}
                                            </label>
                                            <input type="checkbox" name="is_featured" id="is_featured" value="Yes"
                                                @if (!empty($product['is_featured']) && $product['is_featured'] == 'Yes') checked="" @endif>

                                        </div>
                                        <div class="form-group">
                                            <label for="is_bestseller">{{ __('messages.product.best_seller') }}
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
