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
                            {{-- <form class="forms-sample"
                             action="{{ url('admin/add-edit-shipping/'.$shippingDetails['id']) }}"
                             method="post" enctype="multipart/form-data"> --}}
                             <form class="forms-sample" @if(empty($shippingDetails['id'])) action="{{ url('admin/add-edit-shipping') }}"
                             @else action="{{ url('admin/add-edit-shipping/'.$shippingDetails['id']) }}" @endif
                              method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="state">{{ __('messages.shipping.name') }}<span
                                                class="text-danger">*</span> :</label>
                                            {{-- <input type="text" class="form-control" id="state" placeholder="" name="state" readonly
                                             value="{{ $shippingDetails['state']}}"> --}}
                                             <input type="text" class="form-control" id="state" name="state"
                                             @if(!empty($shippingDetails['state'])) value="{{ $shippingDetails['state']}}" @else value="{{ old('state') }}" @endif>
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
                                        <label for="rate">{{ __('messages.shipping.price_from') }} {{ __('0 - 500g') }}<span
                                                class="text-danger">*</span> :</label>
                                                {{-- <input type="text" class="form-control" id="0_500g" placeholder="" name="0_500g"
                                                value="{{ $shippingDetails['0_500g']}}"> --}}
                                                <input type="text" class="form-control" id="0_500g" name="0_500g"
                                                @if(!empty($shippingDetails['0_500g'])) value="{{ $shippingDetails['0_500g']}}" @else value="{{ old('0_500g') }}" @endif>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="rate">{{ __('messages.shipping.price_from') }} {{ __('501 - 1000g') }}<span
                                                class="text-danger">*</span> :</label>
                                                {{-- <input type="text" class="form-control" id="501_1000g" placeholder="" name="501_1000g"
                                                value="{{ $shippingDetails['501_1000g']}}"> --}}
                                                <input type="text" class="form-control" id="501_1000g" name="501_1000g"
                                                @if(!empty($shippingDetails['501_1000g'])) value="{{ $shippingDetails['501_1000g']}}" @else value="{{ old('501_1000g') }}" @endif>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="rate">{{ __('messages.shipping.price_from') }} {{ __('1001 - 2000g') }}<span
                                                class="text-danger">*</span> :</label>
                                                {{-- <input type="text" class="form-control" id="1001_2000g" placeholder="" name="1001_2000g"
                                                value="{{ $shippingDetails['1001_2000g']}}"> --}}
                                                <input type="text" class="form-control" id="1001_2000g" name="1001_2000g"
                                                @if(!empty($shippingDetails['1001_2000g'])) value="{{ $shippingDetails['1001_2000g']}}" @else value="{{ old('1001_2000g') }}" @endif>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="rate">{{ __('messages.shipping.price_from') }} {{ __('2001 - 5000g') }}<span
                                                class="text-danger">*</span> :</label>
                                                {{-- <input type="text" class="form-control" id="2001_5000g" placeholder="" name="2001_5000g"
                                                value="{{ $shippingDetails['2001_5000g']}}"> --}}
                                                <input type="text" class="form-control" id="2001_5000g" name="2001_5000g"
                                                @if(!empty($shippingDetails['2001_5000g'])) value="{{ $shippingDetails['2001_5000g']}}" @else value="{{ old('2001_5000g') }}" @endif>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="rate">{{ __('messages.shipping.above_price') }} {{ __('5000g') }}<span
                                                class="text-danger">*</span> :</label>
                                                {{-- <input type="text" class="form-control" id="above_5000g" placeholder="" name="above_5000g"
                                                value="{{ $shippingDetails['above_5000g']}}"> --}}
                                                <input type="text" class="form-control" id="above_5000g" name="above_5000g"
                                                @if(!empty($shippingDetails['above_5000g'])) value="{{ $shippingDetails['above_5000g']}}" @else value="{{ old('above_5000g') }}" @endif>
                                    </div>
                                </div>
                            </div>
                                <button type="submit"
                                    class="btn btn-primary mr-2 float-right">{{ __('messages.save') }}</button>
                                <a class="btn btn-danger" href="{{  url('admin/shipping')  }}">{{ __('messages.back') }}</a>

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
