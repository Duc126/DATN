@extends('admin/layout/layout')

@section('css')
    <!--datatable css-->
    <link href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css" rel="stylesheet" type="text/css" />
    <!--datatable responsive css-->
    <link href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.bootstrap.min.css" rel="stylesheet"
        type="text/css" />
    <link href="https://cdn.datatables.net/buttons/2.2.2/css/buttons.dataTables.min.css" rel="stylesheet" type="text/css" />
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

@endsection

@section('content')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-md-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">{{ __('Quản Lý Số Lượng') }}</h4>
                            {{-- <div class="col-lg-6 grid-margin grid-margin-lg-0 stretch-card">
                                <div class="card">
                                  <div class="card-body">
                                    <h4 class="card-title">Pie chart</h4>
                                    <canvas id="pieChart"></canvas>
                                  </div>
                                </div>
                              </div> --}}
                            <div class="table-responsive col-md-7">
                                <table id="brand" class="table table-striped display">
                                    <thead>
                                        <tr>
                                            <th>{{ __('Tên Sản Phẩm') }}</th>
                                            <th>{{ __('Tổng Sản Phẩm Lúc Thêm Vào') }}</th>
                                            <th>{{ __('Tổng Còn Lại Trong Kho') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($productTotal as $total)
                                            <tr>
                                                <td>{{$total->product_name}}</td>
                                                <td>{{ $total->total_price }} Sản Phẩm </td>
                                                <td>{{$total->total_stock}} Sản Phẩm</td>

                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div class="col-md-12" >
                                <canvas style="margin-top: 90px !important;" id="areaChart"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        var productTotal = {!! $productTotalJson !!}; // Chuyển đổi chuỗi JSON thành đối tượng JavaScript

        var ctx = document.getElementById('areaChart').getContext('2d');
        var areaChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: productTotal.map(function(item) {
                    return item.product_name;
                }),
                datasets: [{
                    label: 'Tổng Số sản phẩm còn lại',
                    data: productTotal.map(function(item) {
                        return item.total_stock;
                    }),
                    backgroundColor: 'rgba(255, 99, 132, 0.2)',
                    borderColor: 'rgba(255,99,132,1)',
                    borderWidth: 1
                }, {
                    label: 'Tổng lúc đầu nhập vào',
                    data: productTotal.map(function(item) {
                        return item.total_price;
                    }),
                    backgroundColor: 'rgba(54, 162, 235, 0.2)',
                    borderColor: 'rgba(54, 162, 235, 1)',
                    borderWidth: 1
                }]
            },
            options: {
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
                            labelString: 'Product Name'
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
            }
        });
      </script>

@endsection

