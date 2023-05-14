@extends('admin.layout.layout')
@section('content')
    <!-- partial:partials/_settings-panel.html -->
    <div class="theme-setting-wrapper">
        <div id="settings-trigger"><i class="ti-settings"></i></div>
        <div id="theme-settings" class="settings-panel">
            <i class="settings-close ti-close"></i>
            <p class="settings-heading">SIDEBAR SKINS</p>
            <div class="sidebar-bg-options selected" id="sidebar-light-theme">
                <div class="img-ss rounded-circle bg-light border mr-3"></div>Light
            </div>
            <div class="sidebar-bg-options" id="sidebar-dark-theme">
                <div class="img-ss rounded-circle bg-dark border mr-3"></div>Dark
            </div>
            <p class="settings-heading mt-2">HEADER SKINS</p>
            <div class="color-tiles mx-0 px-4">
                <div class="tiles success"></div>
                <div class="tiles warning"></div>
                <div class="tiles danger"></div>
                <div class="tiles info"></div>
                <div class="tiles dark"></div>
                <div class="tiles default"></div>
            </div>
        </div>
    </div>
    <div id="right-sidebar" class="settings-panel">
        <i class="settings-close ti-close"></i>
        <ul class="nav nav-tabs border-top" id="setting-panel" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="todo-tab" data-toggle="tab" href="#todo-section" role="tab"
                    aria-controls="todo-section" aria-expanded="true">TO DO LIST</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="chats-tab" data-toggle="tab" href="#chats-section" role="tab"
                    aria-controls="chats-section">CHATS</a>
            </li>
        </ul>
        <div class="tab-content" id="setting-content">
            <div class="tab-pane fade show active scroll-wrapper" id="todo-section" role="tabpanel"
                aria-labelledby="todo-section">
                <div class="add-items d-flex px-3 mb-0">
                    <form class="form w-100">
                        <div class="form-group d-flex">
                            <input type="text" class="form-control todo-list-input" placeholder="Add To-do">
                            <button type="submit" class="add btn btn-primary todo-list-add-btn" id="add-task">Add</button>
                        </div>
                    </form>
                </div>
                <div class="list-wrapper px-3">
                    <ul class="d-flex flex-column-reverse todo-list">
                        <li>
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input class="checkbox" type="checkbox">
                                    Team review meeting at 3.00 PM
                                </label>
                            </div>
                            <i class="remove ti-close"></i>
                        </li>
                        <li>
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input class="checkbox" type="checkbox">
                                    Prepare for presentation
                                </label>
                            </div>
                            <i class="remove ti-close"></i>
                        </li>
                        <li>
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input class="checkbox" type="checkbox">
                                    Resolve all the low priority tickets due today
                                </label>
                            </div>
                            <i class="remove ti-close"></i>
                        </li>
                        <li class="completed">
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input class="checkbox" type="checkbox" checked>
                                    Schedule meeting for next week
                                </label>
                            </div>
                            <i class="remove ti-close"></i>
                        </li>
                        <li class="completed">
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input class="checkbox" type="checkbox" checked>
                                    Project review
                                </label>
                            </div>
                            <i class="remove ti-close"></i>
                        </li>
                    </ul>
                </div>
                <h4 class="px-3 text-muted mt-5 font-weight-light mb-0">Events</h4>
                <div class="events pt-4 px-3">
                    <div class="wrapper d-flex mb-2">
                        <i class="ti-control-record text-primary mr-2"></i>
                        <span>Feb 11 2018</span>
                    </div>
                    <p class="mb-0 font-weight-thin text-gray">Creating component page build a js</p>
                    <p class="text-gray mb-0">The total number of sessions</p>
                </div>
                <div class="events pt-4 px-3">
                    <div class="wrapper d-flex mb-2">
                        <i class="ti-control-record text-primary mr-2"></i>
                        <span>Feb 7 2018</span>
                    </div>
                    <p class="mb-0 font-weight-thin text-gray">Meeting with Alisa</p>
                    <p class="text-gray mb-0 ">Call Sarah Graves</p>
                </div>
            </div>
            <!-- To do section tab ends -->
            <div class="tab-pane fade" id="chats-section" role="tabpanel" aria-labelledby="chats-section">
                <div class="d-flex align-items-center justify-content-between border-bottom">
                    <p class="settings-heading border-top-0 mb-3 pl-3 pt-0 border-bottom-0 pb-0">Friends</p>
                    <small class="settings-heading border-top-0 mb-3 pt-0 border-bottom-0 pb-0 pr-3 font-weight-normal">See
                        All</small>
                </div>
                <ul class="chat-list">
                    <li class="list active">
                        <div class="profile"><img src="images/faces/face1.jpg" alt="image"><span
                                class="online"></span></div>
                        <div class="info">
                            <p>Thomas Douglas</p>
                            <p>Available</p>
                        </div>
                        <small class="text-muted my-auto">19 min</small>
                    </li>
                    <li class="list">
                        <div class="profile"><img src="images/faces/face2.jpg" alt="image"><span
                                class="offline"></span></div>
                        <div class="info">
                            <div class="wrapper d-flex">
                                <p>Catherine</p>
                            </div>
                            <p>Away</p>
                        </div>
                        <div class="badge badge-success badge-pill my-auto mx-2">4</div>
                        <small class="text-muted my-auto">23 min</small>
                    </li>
                    <li class="list">
                        <div class="profile"><img src="images/faces/face3.jpg" alt="image"><span
                                class="online"></span></div>
                        <div class="info">
                            <p>Daniel Russell</p>
                            <p>Available</p>
                        </div>
                        <small class="text-muted my-auto">14 min</small>
                    </li>
                    <li class="list">
                        <div class="profile"><img src="images/faces/face4.jpg" alt="image"><span
                                class="offline"></span></div>
                        <div class="info">
                            <p>James Richardson</p>
                            <p>Away</p>
                        </div>
                        <small class="text-muted my-auto">2 min</small>
                    </li>
                    <li class="list">
                        <div class="profile"><img src="images/faces/face5.jpg" alt="image"><span
                                class="online"></span></div>
                        <div class="info">
                            <p>Madeline Kennedy</p>
                            <p>Available</p>
                        </div>
                        <small class="text-muted my-auto">5 min</small>
                    </li>
                    <li class="list">
                        <div class="profile"><img src="images/faces/face6.jpg" alt="image"><span
                                class="online"></span></div>
                        <div class="info">
                            <p>Sarah Graves</p>
                            <p>Available</p>
                        </div>
                        <small class="text-muted my-auto">47 min</small>
                    </li>
                </ul>
            </div>
            <!-- chat tab ends -->
        </div>
    </div>
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-md-12 grid-margin">
                    <div class="row">
                        <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                            <h3 class="font-weight-bold">{{ __('messages.welcome') }}
                                {{ Auth::guard('admin')->user()->first_name }}
                                {{ Auth::guard('admin')->user()->last_name }}</h3>
                            {{-- <h6 class="font-weight-normal mb-0">All systems are running smoothly! You have
                                <span class="text-primary">3 unread alerts!</span>
                            </h6> --}}
                        </div>

                    </div>
                </div>
            </div>
            <div class="row">
                <div class="chart-container col-md-6">
                    <canvas id="myChart"></canvas>
                </div>
                <div class="col-md-6 grid-margin transparent">
                    <div class="row">
                        <div class="col-md-6 mb-4 stretch-card transparent">
                            <div class="card card-tale">
                                <div class="card-body">
                                    <p class="mb-4">{{ __('messages.dashboard-list.total-customer-action') }}</p>
                                    <div class="d-flex align-items-end justify-content-between mt-4">
                                        <p class="fs-30 mb-2">{{ $totalUser }}</p>
                                        <a href="{{ url('admin/users') }}">
                                        <i class="mdi mdi-account-circle" style="font-size: 25px;"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 mb-4 stretch-card transparent">
                            <div class="card" style="background: #E9B406 ; color: #fff;">
                                <div class="card-body">
                                    <p class="mb-4">{{ __('messages.dashboard-list.total-product-action') }}</p>
                                    <div class="d-flex align-items-end justify-content-between mt-4">
                                        <p class="fs-30 mb-2">{{ $totalProduct }}</p>
                                        <a href="{{ url('admin/products') }}">
                                            <i class="mdi mdi-black-mesa" style="font-size: 25px;"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-4 mb-lg-0 stretch-card transparent">
                            <div class="card" style="background: #f7efdd !important">
                                <div class="card-body">
                                    <p class="mb-4">{{ __('messages.dashboard-list.total-brand-action') }}</p>
                                    <div class="d-flex align-items-end justify-content-between mt-4">
                                        <p class="fs-30 mb-2">{{ $totalBrands }}</p>
                                        <a href="{{ url('admin/brands') }}">
                                        <i class="mdi mdi-vector-intersection" style="font-size: 25px;"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 stretch-card transparent">
                            <div class="card card-light-danger">
                                <div class="card-body">
                                    <p class="mb-4">{{ __('messages.dashboard-list.total-orders') }}</p>
                                    <div class="d-flex align-items-end justify-content-between mt-4">
                                        <p class="fs-30 mb-2">{{ $totalOrder }}</p>
                                        <a href="{{ url('admin/order') }}">
                                        <i class="mdi mdi-cart" style="font-size: 25px;"></i>
                                        </a>

                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <p class="card-title mb-0">{{ __('messages.dashboard-list.list-custome-buy-the-most') }}</p>
                            <div class="table-responsive">
                                <table class="table table-striped table-borderless">
                                    <thead>
                                        <tr>
                                            <th>{{ __('messages.table.name-customer') }}</th>
                                            <th>{{ __('messages.table.phone') }}</th>
                                            <th>{{ __('messages.table.email') }}</th>
                                            <th>{{ __('messages.table.total-order') }}</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($totalOrderCount as $order)
                                            <tr>
                                                <td>{{ $order->name }}</td>
                                                <td>{{ $order->phone }}</td>
                                                <td>{{ $order->email }}</td>
                                                <td>{{ $order->count_id }} {{ __('Đơn Hàng') }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <p class="card-title mb-0">{{ __('messages.dashboard-list.list-recent-purchase-order') }}</p>
                            <div class="table-responsive">
                                <table class="table table-striped table-borderless">
                                    <thead>
                                        <tr>
                                            <th>{{ __('messages.table.name-customer') }}</th>
                                            <th>{{ __('messages.table.phone') }}</th>
                                            <th>{{ __('messages.table.date-purchase') }}</th>
                                            <th>{{ __('messages.table.payment') }}</th>
                                            <th>{{ __('messages.table.price') }}</th>


                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($orders as $ordersLimit)
                                            <tr>
                                                <td>{{ $ordersLimit->name }}</td>
                                                <td>{{ $ordersLimit->phone }}</td>
                                                <td>{{ date('d/m/Y', strtotime($ordersLimit->created_at)) }}<br>
                                                </td>
                                                {{-- <td>{{ $ordersLimit->created_at }}</td> --}}
                                                <td>
                                                    @if ($ordersLimit->payment_method == 'COD')
                                                        <span class="badge bg-info"
                                                            style="color: #fff;">{{ __('messages.table.cod') }}</span>
                                                    @else
                                                        <span class="badge bg-success"
                                                            style="color: #fff;">{{ __('messages.table.credit_card') }}</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    {{ number_format($ordersLimit->grand_total, 0, '.', '.') }} VNĐ

                                                    {{-- {{ $ordersLimit->grand_total }}.VNĐ --}}
                                                </td>


                                            </tr>
                                        @endforeach


                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->
        @include('admin.layout.footer')
        <!-- partial -->
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        var ctx = document.getElementById('myChart').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: {!! json_encode($result->pluck('month')) !!},
                datasets: [{
                    label: 'Doanh Thu Từng Tháng',
                    data: {!! json_encode($result->pluck('revenue')) !!},
                    backgroundColor: [
                        'rgba(54, 162, 235, 0.2)', // Màu xanh blue với độ trong suốt là 0.2
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)',
                        'rgba(54, 162, 235, 0.2)' // Màu xanh blue với độ trong suốt là 0.2
                    ],
                    borderColor: [
                        'rgba(54, 162, 235, 1)', // Màu xanh blue với độ trong suốt là 1
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)',
                        'rgba(54, 162, 235, 1)' // Màu xanh blue với độ trong suốt là 1
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
        });
    </script>
@endsection
