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
                             action="{{ url('admin/add-edit-shipping/'.$shippingDetails['id']) }}"
                             method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="state">{{ __('Tên Thành Phố ') }}<span
                                                class="text-danger">*</span> :</label>
                                            <input type="text" class="form-control" id="state" placeholder="" name="state" readonly
                                             value="{{ $shippingDetails['state']}}">
                                    </div>
                                </div>
                                {{-- <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="country">{{ __('Tên Quốc Gia') }}<span
                                                class="text-danger">*</span> :</label>
                                                <input type="text" class="form-control" id="country" placeholder="" name="country" readonly
                                                value="{{ $shippingDetails['country']}}">
                                    </div>
                                </div> --}}
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="rate">{{ __('Giá Từ 0 - 500g') }}<span
                                                class="text-danger">*</span> :</label>
                                                <input type="text" class="form-control" id="0_500g" placeholder="" name="0_500g"
                                                value="{{ $shippingDetails['0_500g']}}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="rate">{{ __('Giá Từ 501 - 1000g') }}<span
                                                class="text-danger">*</span> :</label>
                                                <input type="text" class="form-control" id="501_1000g" placeholder="" name="501_1000g"
                                                value="{{ $shippingDetails['501_1000g']}}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="rate">{{ __('Giá Từ 1001 - 2000g') }}<span
                                                class="text-danger">*</span> :</label>
                                                <input type="text" class="form-control" id="1001_2000g" placeholder="" name="1001_2000g"
                                                value="{{ $shippingDetails['1001_2000g']}}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="rate">{{ __('Giá Từ 2001 - 5000g') }}<span
                                                class="text-danger">*</span> :</label>
                                                <input type="text" class="form-control" id="2001_5000g" placeholder="" name="2001_5000g"
                                                value="{{ $shippingDetails['2001_5000g']}}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="rate">{{ __('Giá Trên 5000g') }}<span
                                                class="text-danger">*</span> :</label>
                                                <input type="text" class="form-control" id="above_5000g" placeholder="" name="above_5000g"
                                                value="{{ $shippingDetails['above_5000g']}}">
                                    </div>
                                </div>
                            </div>
                                <button type="submit"
                                    class="btn btn-primary mr-2 float-right">{{ __('Lưu') }}</button>
                                <a class="btn btn-danger" href="{{  url('admin/shipping')  }}">{{ __('Quay lai ') }}</a>

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
