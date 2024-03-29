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
                                    <strong>{{ __('messages.error') }}:</strong> {{ Session::get('error_message') }}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @endif
                            @if (Session::has('success_message'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <strong>{{ __('messages.success') }}:</strong> {{ Session::get('success_message') }}
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
                                @if (empty($category['id'])) action="{{ url('admin/add-edit-category') }}"
                            @else action="{{ url('admin/add-edit-category/' . $category['id']) }}" @endif
                                method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="category_name">{{ __('messages.category.name_category') }}<span
                                                    class="text-danger">*</span> :</label>
                                            <input type="text" class="form-control" id="category_name"
                                                placeholder="Nhập Tên Danh Mục" name="category_name"
                                                @if (!empty($category['category_name'])) value="{{ $category['category_name'] }}" @else value="{{ old('category_name') }}" @endif>
                                        </div>
                                        <div class="form-group">
                                            <label for="section_id">{{ __('messages.category.name_section') }}<span
                                                    class="text-danger">*</span> :</label>
                                            <select name="section_id" id="section_id" class="form-control">
                                                <option value="">{{ __('Chọn ') }}</option>
                                                @foreach ($fullSection as $section)
                                                    <option value="{{ $section['id'] }}"
                                                        @if (!empty($category['section_id']) && $category['section_id'] == $section['id']) selected="" @endif>
                                                        {{ $section['name'] }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div id="appendCategoriesLevel">
                                            @include('admin.categories.append-category')
                                        </div>
                                        <div class="form-group">
                                            <label for="category_image">{{ __('messages.image') }}
                                                :</label>
                                            <input type="file" class="form-control" id="category_image"
                                                name="category_image">
                                                @if(!empty($category['category_image']))
                                                <a target="_blank" href="{{ url('front/images/category_images/'.$category['category_image']) }}">
                                                    {{ __('Xem Ảnh') }}</a>&nbsp;|&nbsp;
                                                <a href="javascript:void(0)" class="confirmDelete" module="category-image"
                                                moduleid="{{ $category['id'] }}">{{ __('messages.delete-image') }}</a>
                                                @endif
                                        </div>
                                        <div class="form-group">
                                            <label for="category_discount">{{ __('messages.discount') }} :</label>
                                            <input type="number" class="form-control" id="category_discount"
                                                placeholder="Nhập Danh Mục Giảm Giá" name="category_discount"
                                                @if (!empty($category['category_discount'])) value="{{ $category['category_discount'] }}" @else value="{{ old('category_discount') }}" @endif>
                                        </div>
                                        <div class="form-group">
                                            <label for="description">{{ __('messages.description') }} :</label>
                                            <textarea name="description" id="description" class="form-control" rows="3">
                                                {{ $category['description'] }}
                                            </textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="url">{{ __('messages.table.url') }}<span class="text-danger">*</span>
                                                :</label>
                                            <input type="text" class="form-control" id="url"
                                                placeholder="Nhập URL" name="url"
                                                @if (!empty($category['url'])) value="{{ $category['url'] }}" @else value="{{ old('url') }}" @endif>
                                        </div>
                                        <div class="form-group">
                                            <label for="meta_title">{{ __('messages.title_meta') }} :</label>
                                            <input type="text" class="form-control" id="meta_title"
                                                placeholder="Nhập Tiêu Đề" name="meta_title"
                                                @if (!empty($category['meta_title'])) value="{{ $category['meta_title'] }}" @else value="{{ old('meta_title') }}" @endif>
                                        </div>
                                        <div class="form-group">
                                            <label for="meta_description">{{ __('messages.description_meta') }} :</label>
                                            <input type="text" class="form-control" id="meta_description"
                                                placeholder="Nhập Mô Tả" name="meta_description"
                                                @if (!empty($category['meta_description'])) value="{{ $category['meta_description'] }}" @else value="{{ old('meta_description') }}" @endif>
                                        </div>
                                        <div class="form-group">
                                            <label for="meta_keywords">{{ __('messages.keywords_meta') }} :</label>
                                            <input type="text" class="form-control" id="meta_keywords"
                                                placeholder="Nhập Tên Sản Phẩm" name="meta_keywords"
                                                @if (!empty($category['meta_keywords'])) value="{{ $category['meta_keywords'] }}" @else value="{{ old('meta_keywords') }}" @endif>
                                        </div>
                                    </div>
                                </div>
                                <button type="submit"
                                    class="btn btn-primary mr-2 float-right">{{ __('messages.save') }}</button>
                                    <a class="btn btn-danger" href="{{  url('admin/categories')  }}">{{ __('messages.back') }}</a>

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
