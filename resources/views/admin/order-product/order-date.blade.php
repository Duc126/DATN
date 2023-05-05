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
                            <h4 class="card-title">{{ __('Doanh Thu Theo Ngày') }}</h4>
                            <div class="table-responsive col-md-12">
                                <form method="GET" action="{{ route('sales.index') }}">
                                    <div class="form-group row">
                                        <label for="month" class="col-md-2 col-form-label">{{ __('Chọn tháng') }}</label>
                                        <div class="col-md-2">
                                            <input type="month" class="form-control" id="month" name="month"
                                                value="{{ date('Y-m', strtotime($date)) }}">

                                        </div>

                                        <div class="col-md-2">
                                            <button type="submit" class="btn btn-primary">{{ __('Tìm kiếm') }}</button>
                                        </div>
                                    </div>
                                </form>

                                <table id="brand" class="table table-striped display">
                                    <thead>
                                        <tr>
                                            <th>{{ __('Tên Sản Phẩm') }}</th>
                                            <th>{{ __('Ngày Bán Ra') }}</th>
                                            <th>{{ __('Tổng Số Tiền') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($dateAndRevenue as $totalDate)
                                            <tr>
                                                <td>{{ $totalDate->best_selling_product }}</td>
                                                <td>{{ $totalDate->date }} </td>
                                                <td>
                                                    {{ number_format($totalDate->revenue, 0, '.', '.') }} VNĐ
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div class="col-md-12">
                                <canvas style="margin-top: 90px !important;" id="areaChart"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    {{-- <script>
        var dateAndRevenue = {!! $productTotalJson !!}; // Chuyển đổi chuỗi JSON thành đối tượng JavaScript
        console.log(dateAndRevenue);

        var ctx = document.getElementById('areaChart').getContext('2d');
        var areaChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: dateAndRevenue.map(function(item) {
                    return item.date;
                }),
                datasets: [{
                    label: 'Doanh thu',
                    data: dateAndRevenue.map(function(item) {
                        return item.revenue;
                    }),
                    backgroundColor: 'rgba(255, 99, 132, 0.2)',
                    borderColor: 'rgba(255,99,132,1)',
                    borderWidth: 1
                }, {
                    label: 'Sản phẩm bán chạy nhất',
                    data: dateAndRevenue.map(function(item) {
                        return item.best_selling_product;
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
                    text: 'Biểu đồ doanh thu và sản phẩm bán chạy nhất'
                },
                scales: {
                    xAxes: [{
                        display: true,
                        scaleLabel: {
                            display: true,
                            labelString: 'Ngày'
                        }
                    }],
                    yAxes: [{
                        display: true,
                        scaleLabel: {
                            display: true,
                            labelString: 'Giá trị'
                        },
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
        });
    </script> --}}
    {{-- <script>
        var dateAndRevenue = {!! $productTotalJson !!}; // Chuyển đổi chuỗi JSON thành đối tượng JavaScript

        var ctx = document.getElementById('areaChart').getContext('2d');
        var areaChart = new Chart(ctx, {
            type: 'line', // sử dụng biểu đồ đường
            data: {
                labels: dateAndRevenue.map(function(item) {
                    return item.date;
                }),
                datasets: [{
                    label: 'Doanh thu',
                    data: dateAndRevenue.map(function(item) {
                        return item.revenue;
                    }),
                    backgroundColor: 'rgba(255, 99, 132, 0.2)',
                    borderColor: 'rgba(255,99,132,1)',
                    borderWidth: 1
                }, {
                    label: 'Sản phẩm bán chạy nhất',
                    data: dateAndRevenue.map(function(item) {
                        if (item.best_selling_product === 'Áo Phông Nam') {
                            return 1; // Đếm số lần bán sản phẩm 'Áo Phông Nam'
                        } else {
                            return 0;
                        }
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
                    text: 'Biểu đồ doanh thu và sản phẩm bán chạy nhất'
                },
                scales: {
                    xAxes: [{
                        display: true,
                        scaleLabel: {
                            display: true,
                            labelString: 'Ngày'
                        }
                    }],
                    yAxes: [{
                        display: true,
                        scaleLabel: {
                            display: true,
                            labelString: 'Giá trị'
                        },
                        ticks: {
                            beginAtZero: true,
                            precision: 0 // hiển thị số nguyên trên trục y
                        }
                    }]
                }
            }
        });
    </script> --}}

    {{-- <script>
        var dateAndRevenue = {!! $productTotalJson !!};

        // Tạo một mảng chứa tên các sản phẩm bán chạy nhất
        var bestSellingProducts = [];
        dateAndRevenue.forEach(function(item) {
            // Nếu sản phẩm không nằm trong mảng bestSellingProducts thì thêm vào mảng
            if (bestSellingProducts.indexOf(item.best_selling_product) === -1) {
                bestSellingProducts.push(item.best_selling_product);
            }
        });

        var datasets = [{
            label: 'Doanh thu',
            data: dateAndRevenue.map(function(item) {
                return item.revenue;
            }),
            backgroundColor: 'rgba(255, 99, 132, 0.2)',
            borderColor: 'rgba(255,99,132,1)',
            borderWidth: 1
        }];

        // Tạo một dataset cho mỗi sản phẩm bán chạy nhất
        bestSellingProducts.forEach(function(product) {
            datasets.push({
                label: product,
                data: dateAndRevenue.map(function(item) {
                    if (item.best_selling_product === product) {
                        return 1;
                    } else {
                        return 0;
                    }
                }),
                backgroundColor: 'rgba(54, 162, 235, 0.2)',
                borderColor: 'rgba(54, 162, 235, 1)',
                borderWidth: 1
            });
        });

        var ctx = document.getElementById('areaChart').getContext('2d');
        var areaChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: dateAndRevenue.map(function(item) {
                    return item.date;
                }),
                datasets: datasets
            },
            options: {
                responsive: true,
                title: {
                    display: true,
                    text: 'Biểu đồ doanh thu và sản phẩm bán chạy nhất'
                },
                scales: {
                    xAxes: [{
                        display: true,
                        scaleLabel: {
                            display: true,
                            labelString: 'Ngày'
                        }
                    }],
                    yAxes: [{
                        display: true,
                        scaleLabel: {
                            display: true,
                            labelString: 'Giá trị'
                        },
                        ticks: {
                            beginAtZero: true,
                            precision: 0
                        }
                    }]
                }
            }
        });
    </script> --}}
    {{-- <script>
        var dateAndRevenue = {!! $productTotalJson !!};

        // Tạo một mảng chứa tên các sản phẩm bán chạy nhất
        var bestSellingProducts = [];
        dateAndRevenue.forEach(function(item) {
            // Nếu sản phẩm không nằm trong mảng bestSellingProducts thì thêm vào mảng
            if (bestSellingProducts.indexOf(item.best_selling_product) === -1) {
                bestSellingProducts.push(item.best_selling_product);
            }
        });

        var datasets = [{
            label: 'Doanh thu',
            data: dateAndRevenue.map(function(item) {
                return item.revenue;
            }),
            backgroundColor: 'rgba(255, 99, 132, 0.2)',
            borderColor: 'rgba(255,99,132,1)',
            borderWidth: 1
        }];

        // Tạo một dataset cho mỗi sản phẩm bán chạy nhất
        bestSellingProducts.forEach(function(product) {
            datasets.push({
                label: product,
                data: dateAndRevenue.map(function(item) {
                    if (item.best_selling_product === product) {
                        return item.revenue;
                    } else {
                        return 0;
                    }
                }),
                backgroundColor: 'rgba(54, 162, 235, 0.2)',
                borderColor: 'rgba(54, 162, 235, 1)',
                borderWidth: 1
            });
        });

        var ctx = document.getElementById('areaChart').getContext('2d');
        var areaChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: dateAndRevenue.map(function(item) {
                    return item.date;
                }),
                datasets: datasets
            },
            options: {
                responsive: true,
                title: {
                    display: true,
                    text: 'Biểu đồ doanh thu và sản phẩm bán chạy nhất'
                },
                scales: {
                    xAxes: [{
                        display: true,
                        scaleLabel: {
                            display: true,
                            labelString: 'Ngày'
                        }
                    }],
                    yAxes: [{
                        display: true,
                        scaleLabel: {
                            display: true,
                            labelString: 'Giá trị'
                        },
                        ticks: {
                            beginAtZero: true,
                            precision: 0
                        }
                    }]
                }
            }
        });
    </script> --}}
    <script>
        var dateAndRevenue = {!! $productTotalJson !!};

        // Tạo một mảng chứa tên các sản phẩm bán chạy nhất
        var bestSellingProducts = [];
        dateAndRevenue.forEach(function(item) {
            // Nếu sản phẩm không nằm trong mảng bestSellingProducts thì thêm vào mảng
            if (bestSellingProducts.indexOf(item.best_selling_product) === -1) {
                bestSellingProducts.push(item.best_selling_product);
            }
        });

        var datasets = [{
            label: 'Doanh thu',
            data: dateAndRevenue.map(function(item) {
                return item.revenue;
            }),
            backgroundColor: 'rgba(255, 99, 132, 0.2)',
            borderColor: 'rgba(255,99,132,1)',
            borderWidth: 1
        }];

        // Tạo một dataset cho mỗi sản phẩm bán chạy nhất
        bestSellingProducts.forEach(function(product) {
            datasets.push({
                label: product,
                data: dateAndRevenue.map(function(item) {
                    if (item.best_selling_product === product) {
                        return item.revenue;
                    } else {
                        return 0;
                    }
                }),
                backgroundColor: 'rgba(54, 162, 235, 0.2)',
                borderColor: 'rgba(54, 162, 235, 1)',
                borderWidth: 1
            });
        });

        var ctx = document.getElementById('areaChart').getContext('2d');
        var areaChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: dateAndRevenue.map(function(item) {
                    return item.date;
                }),
                datasets: datasets
            },
            options: {
                responsive: true,
                title: {
                    display: true,
                    text: 'Biểu đồ doanh thu và sản phẩm bán chạy nhất'
                },
                scales: {
                    xAxes: [{
                        type: 'time',
                        distribution: 'linear',
                        time: {
                            unit: 'day',
                            tooltipFormat: 'DD/MM/YYYY',
                            displayFormats: {
                                day: 'DD/MM/YYYY'
                            }
                        },
                        scaleLabel: {
                            display: true,
                            labelString: 'Ngày'
                        }
                    }],
                    yAxes: [{
                        display: true,
                        scaleLabel: {
                            display: true,
                            labelString: 'Giá trị'
                        },
                        ticks: {
                            beginAtZero: true,
                            precision: 0
                        }
                    }]
                }
            }
        });
    </script>

    {{-- <script>
        var year = parseInt(document.getElementById("month").value.substring(0, 4));
        var month = parseInt(document.getElementById("month").value.substring(5, 7)) - 1;

        var daysInMonth = [];
        var daysCount = new Date(year, month + 1, 0).getDate(); // Lấy số ngày trong tháng
        for (var i = 1; i <= daysCount; i++) {
            var day = new Date(year, month, i).getDate();
            daysInMonth.push(day);
        }

        // Sắp xếp lại mảng daysInMonth theo thứ tự tăng dần của ngày
        daysInMonth.sort(function(a, b) {
            return a - b;
        });

        var dateAndRevenue = {!! $productTotalJson !!};

        // Tạo một mảng chứa tên các sản phẩm bán chạy nhất
        var bestSellingProducts = [];
        dateAndRevenue.forEach(function(item) {
            // Nếu sản phẩm không nằm trong mảng bestSellingProducts thì thêm vào mảng
            if (bestSellingProducts.indexOf(item.best_selling_product) === -1) {
                bestSellingProducts.push(item.best_selling_product);
            }
        });

        var datasets = [{
            label: 'Doanh thu',
            data: dateAndRevenue.map(function(item) {
                return item.revenue;
            }),
            backgroundColor: 'rgba(255, 99, 132, 0.2)',
            borderColor: 'rgba(255,99,132,1)',
            borderWidth: 1
        }];

        // Tạo một dataset cho mỗi sản phẩm bán chạy nhất
        bestSellingProducts.forEach(function(product) {
            datasets.push({
                label: product,
                data: dateAndRevenue.map(function(item) {
                    if (item.best_selling_product === product) {
                        return item.date;
                    } else {
                        return 0;
                    }
                }),
                backgroundColor: 'rgba(54, 162, 235, 0.2)',
                borderColor: 'rgba(54, 162, 235, 1)',
                borderWidth: 1
            });
        });

        var ctx = document.getElementById('areaChart').getContext('2d');
        var areaChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: daysInMonth,
                datasets: datasets
            },
            options: {
                responsive: true,
                title: {
                    display: true,
                    text: 'Biểu đồ doanh thu và sản phẩm bán chạy nhất'
                },
                scales: {
                    xAxes: [{
                        display: true,
                        scaleLabel: {
                            display: true,
                            labelString: 'Ngày'
                        }
                    }],
                    yAxes: [{
                        display: true,
                        scaleLabel: {
                            display: true,
                            labelString: 'Giá trị'
                        },
                        ticks: {
                            beginAtZero: true,
                            precision: 0
                        }
                    }]
                }
            }
        });
    </script> --}}
@endsection
