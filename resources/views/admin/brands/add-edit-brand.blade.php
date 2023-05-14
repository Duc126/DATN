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
                            <form class="forms-sample" @if(empty($brand['id'])) action="{{ url('admin/add-edit-brand') }}"
                            @else action="{{ url('admin/add-edit-brand/'.$brand['id']) }}" @endif
                             method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="brand_name">{{ __('messages.brand.name') }}<span
                                                class="text-danger">*</span> :</label>
                                            <input type="text" class="form-control" id="brand_name" name="brand_name"
                                                @if(!empty($brand['name'])) value="{{ $brand['name']}}" @else value="{{ old('brand_name') }}" @endif>
                                    </div>
                                </div>
                            </div>
                                <button type="submit"
                                    class="btn btn-primary mr-2 float-right">{{ __('messages.save') }}</button>
                                <a class="btn btn-danger" href="{{  url('admin/brands')  }}">{{ __('messages.back') }}</a>

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
