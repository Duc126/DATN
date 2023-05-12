@extends('admin/layout/layout')

@section('css')
    <!--datatable css-->
    <link href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css" rel="stylesheet" type="text/css" />
    <!--datatable responsive css-->
    <link href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.bootstrap.min.css" rel="stylesheet"
        type="text/css" />
    <link href="https://cdn.datatables.net/buttons/2.2.2/css/buttons.dataTables.min.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flatpickr/4.2.3/flatpickr.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flatpickr/4.2.3/themes/dark.css">
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
                                            <input type="month" class="form-control month-input" id="month"
                                                name="month" value="{{ date('Y-m', strtotime($date)) }}">

                                        </div>
                                        <div class="col-md-2">
                                            <button type="submit"
                                                class="btn btn-primary button-class">{{ __('Tìm kiếm') }}</button>
                                        </div>
                                        <style>
                                            .month-input {
                                                border: 2px solid whitesmoke;
                                                border-radius: 20px;
                                                padding: 10px 10px;
                                                text-align: center;
                                                width: 220px;
                                            }

                                            .button-class {
                                                border: 2px solid whitesmoke;
                                                border-radius: 20px;
                                                padding: 6px 10px;
                                                text-align: center;
                                                width: 110px;
                                                /* margin-bottom: 0px; */
                                                margin-top: -2px;

                                            }
                                        </style>

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
                                                <td>{{ date('d/m/Y', strtotime($totalDate->date)) }} </td>

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
    {{-- <script>
        var inputMonth = document.getElementById('month').value;
        // Tạo một đối tượng Date từ chuỗi tháng
        var date = new Date(inputMonth);
        // Lấy số ngày trong tháng đó
        var daysInMonth = new Date(date.getFullYear(), date.getMonth() + 1, 0).getDate();
        console.log(daysInMonth); // In ra số ngày trong tháng
    </script> --}}
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    {{-- <script>
        var dateAndRevenue = {!! $productTotalJson !!};
        dateAndRevenue.sort(function(a, b) {
            return new Date(a.date) - new Date(b.date);
        });
        console.log(dateAndRevenue);

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
                labels: getLabels(),
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

        function getLabels() {
            var yearMonth = document.getElementById('month').value;
            var year = yearMonth.split('-')[0];
            var month = yearMonth.split('-')[1];
            var daysInMonth = new Date(year, month, 0).getDate();
            var labels = [];
            var values = dateAndRevenue.map(function(item) {
                var day = item.date.split('-')[0];
                var month = item.date.split('-')[1];
                var dateTotal = day + '-' + month;
                console.log(dateTotal)

                return dateTotal;
            });

            for (var i = 1; i <= daysInMonth; i++) {
                var day = i < 10 ? '0' + i : i;
                var dateTotal = day + '-' + month;
                labels.push(dateTotal);
            }

            return labels.filter(function(label) {
                return values.includes(label);
            });
            console.log(label);
        }
    </script> --}}
    {{-- <script>
        var dateAndRevenue = {!! $productTotalJson !!};
        console.log(dateAndRevenue);
        dateAndRevenue.sort(function(a, b) {
            return new Date(a.date) - new Date(b.date);
        });

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
                labels: getLabels(),
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
                            tooltipFormat: 'd',
                            displayFormats: {
                                day: 'd'
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

        function getLabels() {
        var yearMonth = document.getElementById("month").value;
        var year = yearMonth.split("-")[0];
        var month = yearMonth.split("-")[1];
        var daysInMonth = new Date(year, month, 0).getDate();
        var labels = [];
        var values = dateAndRevenue.map(function (item) {
            var day = item.date.split("-")[0].padStart(2, "0");
            var itemMonth = item.date.split("-")[1];
            var dateTotal = day + "-" + itemMonth;
            console.log("🚀 ~ file: order-date.blade.php:311 ~ values ~ dateTotal:", dateTotal)

            return dateTotal;
        });

        for (var i = 1; i <= daysInMonth; i++) {
            var day = i.toString().padStart(2, "0");
            var dateTotal = day + "-" + month;
            if (values.includes(dateTotal) && !labels.includes(dateTotal)) {
            labels.push(dateTotal);
            } else if (!values.includes(dateTotal)) {
            labels.push(dateTotal);
            }
        }

        labels.sort(function (a, b) {
            var aDay = parseInt(a.split("-")[0]);
            var bDay = parseInt(b.split("-")[0]);
            return aDay - bDay;
        });

        console.log(labels);
        return labels;
        }





        // function getLabels() {
        //   var yearMonth = document.getElementById('month').value;
        //   var year = yearMonth.split('-')[0];
        //   var month = yearMonth.split('-')[1];
        //   var daysInMonth = new Date(year, month, 0).getDate();
        //   var labels = [];
        //   var values = dateAndRevenue.map(function(item) {
        //     var day = item.date.split('-')[0];
        //     var month = item.date.split('-')[1];
        //     var year = item.date.split('-')[2];
        //     var dateTotal = day + '-' + month;
        //     console.log(dateTotal);
        //     return dateTotal;
        //   });

        //   for (var i = 1; i <= daysInMonth; i++) {
        //     var day = i < 10 ? '0' + i : i;
        //     var dateTotal = day + '-' + month;
        //     if (values.includes(dateTotal) && !labels.includes(dateTotal)) {
        //       labels.push(dateTotal);
        //     } else if (!values.includes(dateTotal)) {
        //       labels.push(dateTotal);
        //     }
        //   }

        //   labels = labels.filter(function(label) {
        //     return values.includes(label);
        //   });

        //   console.log(labels);
        //   return labels;
        // }
    </script> --}}
    <script>
        var dateAndRevenue = {!! $productTotalJson !!};
        console.log(dateAndRevenue);

        // Tạo một mảng chứa tên các sản phẩm bán chạy nhất
        var bestSellingProducts = [];
        dateAndRevenue.forEach(function(item) {
            // Nếu sản phẩm không nằm trong mảng bestSellingProducts thì thêm vào mảng
            if (bestSellingProducts.indexOf(item.bestSellingProduct) === -1) {
                bestSellingProducts.push(item.bestSellingProduct);
            }
        });

        var datasets = [{
            label: 'Doanh thu',
            data: dateAndRevenue.map(function(item) {
                return item.revenueSales;
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
                    if (item.bestSellingProduct === product) {
                        return item.revenueSales;
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
                    return item.date.slice(8, 10);
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
                            unit: 'dayOfMonth',
                            tooltipFormat: 'dd-mm-yy',
                            displayFormats: {
                                day: 'dd-mm-yy'
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




@endsection
