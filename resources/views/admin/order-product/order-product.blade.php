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
                            <h4 class="card-title">{{ __('Thống kê số lượng sản phẩm được bán theo tháng') }}</h4>
                            <form method="GET" action="{{ route('search_products') }}">
                                <div class="form-group d-flex col-md-12">
                                    <div class="col-md-5">
                                        <label for="start_date">Ngày bắt đầu:</label>
                                        <input type="date" class="form-control month-input" id="start_date" name="start_date"
                                            value={{ $start_date }} required>
                                    </div>
                                    <div class="col-md-5">
                                        <label for="end_date">Ngày kết thúc:</label>
                                        <input type="date" class="form-control month-input" id="end_date" name="end_date"
                                            value={{ $end_date }} required>
                                    </div>


                                    <div class="col-md-2 mt-4">
                                        <button type="submit" class="btn btn-primary button-class">{{ __('Tìm Kiếm') }}</button>
                                    </div>

                                    <style>
                                        .month-input {
                                            border: 2px solid whitesmoke;
                                            border-radius: 20px;
                                            padding: 10px 10px;
                                            text-align: center;
                                            /* width: 220px; */
                                        }
                                        .button-class {
                                            border: 2px solid whitesmoke;
                                            border-radius: 20px;
                                            padding: 10px 10px;
                                            text-align: center;
                                            width: 220px;
                                        }
                                    </style>
                                </div>

                            </form>
                            <div class="row">
                                <div class="table-responsive col-md-12">
                                    <table id="brand" class="table table-striped display">
                                        <thead>
                                            <tr>
                                                <th>{{ __('Tên Sản Phẩm') }}</th>
                                                <th>{{ __('Tháng Bán Được') }}</th>
                                                <th>{{ __('Tổng Số Lượng Bán Ra') }}</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($product as $orderProduct)
                                                <tr>
                                                    <td>{{ $orderProduct->product_name }}</td>
                                                    <td>{{ $orderProduct->month }}</td>
                                                    <td>{{ $orderProduct->total_quantity }} </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>

                            </div>
                            <div class="col-md-12">
                                <canvas width="800" height="400" style="margin-top: 90px !important;"
                                    id="columnChart"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>


    {{-- <script>
        var ctx = document.getElementById('areaChart').getContext('2d');
        var chartData = JSON.parse('{!! $chart_data_json !!}'); // Chuyển đổi chuỗi JSON thành đối tượng JavaScript

        // Tùy chọn của biểu đồ
        var options = {
            responsive: true,
            title: {
                display: true,
                text: 'Area Chart'
            },
            scales: {
                xAxes: [{
                    display: true,
                    scaleLabel: {
                        display: true,
                        labelString: 'Month'
                    }
                }],
                yAxes: [{
                    display: true,
                    scaleLabel: {
                        display: true,
                        labelString: 'Value'
                    },
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        };

        // Khởi tạo biểu đồ
        var areaChart = new Chart(ctx, {
            type: 'bar',
            data: chartData,
            options: options
        });
    </script> --}}
    <script>
        var ctx = document.getElementById('columnChart').getContext('2d');
        var chartData = JSON.parse('{!! $chart_data_json !!}'); // Chuyển đổi chuỗi JSON thành đối tượng JavaScript


        // Tùy chọn của biểu đồ
        var options = {
            responsive: true,
            title: {
                display: true,
                text: 'Column Chart'
            },
            scales: {
                xAxes: [{
                    display: true,
                    scaleLabel: {
                        display: true,
                        labelString: 'Month'
                    },
                    // sử dụng labels thay vì cứng set như '04-2023' và '05-2023'
                    ticks: {
                        autoSkip: true,
                        maxTicksLimit: 20
                    }
                }],
                yAxes: [{
                    display: true,
                    scaleLabel: {
                        display: true,
                        labelString: 'Value'
                    },
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        };


        // Khởi tạo biểu đồ
        var columnChart = new Chart(ctx, {
            type: 'bar',
            data: chartData,
            options: options
        });
    </script>
@endsection

@section('script')
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.9/js/responsive.bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
@endsection
