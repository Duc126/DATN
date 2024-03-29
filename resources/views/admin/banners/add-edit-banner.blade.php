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
                                @if (empty($banner['id'])) action="{{ url('admin/add-edit-banner') }}"
                            @else action="{{ url('admin/add-edit-banner/' . $banner['id']) }}" @endif
                                method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="link"> {{ __('messages.banner.type') }}</label>
                                            <select class="form-control" id="type" name="type" required>
                                                <option value="">{{ __('Chọn') }}</option>
                                                <option @if (!empty($banner['type']) && $banner['type'] == "Slider")
                                                selected="" @endif value="Slider">Slider</option>
                                                <option @if (!empty($banner['type']) && $banner['type'] == "Fix")
                                                selected="" @endif value="Fix">Fix</option>

                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="image">{{ __('messages.image') }}<span
                                                    class="text-danger">*</span>
                                                :</label>
                                            <input type="file" class="form-control" id="image"
                                                name="image">
                                                @if(!empty($banner['image']))
                                                <a target="_blank" href="{{ url('front/images/banner_images/'.$banner['image']) }}">
                                                    {{ __('messages.view_image') }}</a>
                                                @endif
                                        </div>
                                        <div class="form-group">
                                            <label for="link">{{ __('messages.banner.link') }}<span
                                                    class="text-danger">*</span> :</label>
                                            <input type="text" class="form-control" id="link"
                                                placeholder="" name="link"
                                                @if (!empty($banner['link'])) value="{{ $banner['link'] }}" @else value="{{ old('link') }}" @endif>
                                        </div>


                                        <div class="form-group">
                                            <label for="title">{{ __('messages.banner.title') }} :</label>
                                            <input type="text" class="form-control" id="title"
                                                placeholder="Nhập Tiêu Đề" name="title"
                                                @if (!empty($banner['title'])) value="{{ $banner['title'] }}" @else value="{{ old('title') }}" @endif>
                                        </div>

                                        <div class="form-group">
                                            <label for="alt">{{ __('messages.banner.banner_all_text') }}
                                                :</label>
                                            <input type="text" class="form-control" id="alt"
                                                placeholder="Nhập Văn Bản" name="alt"
                                                @if (!empty($banner['alt'])) value="{{ $banner['alt'] }}" @else value="{{ old('alt') }}" @endif>
                                        </div>

                                    </div>
                                </div>
                                <button type="submit"
                                    class="btn btn-primary mr-2 float-right">{{ __('Lưu') }}</button>
                                    <a class="btn btn-danger" href="{{  url('admin/brands')  }}">{{ __('Quay lai ') }}</a>

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
