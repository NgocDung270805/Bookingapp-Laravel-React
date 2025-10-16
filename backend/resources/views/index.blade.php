@extends('layouts.app')
@section('title', 'Trang chủ')
@section('content')
    {{-- Thông báo cho Login Google, Fb --}}
    <div class="toast-container position-fixed top-0 end-0 p-3">
        @if (session('success'))
            <div class="toast align-items-center text-bg-success border-0" role="alert" aria-live="assertive"
                aria-atomic="true">
                <div class="d-flex">
                    <div class="toast-body">
                        {{ session('success') }}
                    </div>
                    <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"
                        aria-label="Close"></button>
                </div>
            </div>
        @endif

        @if (session('error'))
            <div class="toast align-items-center text-bg-danger border-0" role="alert" aria-live="assertive"
                aria-atomic="true">
                <div class="d-flex">
                    <div class="toast-body">
                        {{ session('error') }}
                    </div>
                    <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"
                        aria-label="Close"></button>
                </div>
            </div>
        @endif

        @if (session('warning'))
            <div class="toast align-items-center text-bg-warning border-0" role="alert" aria-live="assertive"
                aria-atomic="true">
                <div class="d-flex">
                    <div class="toast-body">
                        {{ session('warning') }}
                    </div>
                    <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"
                        aria-label="Close"></button>
                </div>
            </div>
        @endif
    </div>
    <script>
        // JS cho phần thông báo Login Google FB
        document.addEventListener('DOMContentLoaded', function() {
            var toastElList = [].slice.call(document.querySelectorAll('.toast'))
            var toastList = toastElList.map(function(toastEl) {
                return new bootstrap.Toast(toastEl, {
                    autohide: true,
                    delay: 5000 // 5 giây
                })
            })
            toastList.forEach(toast => toast.show())
        });
    </script>

    <!-- BẮT ĐẦU MAIN -->
    <div class="content">
        <div class="pb-5">
            <div class="row g-4">
                <div class="col-12 col-xxl-6">
                    <div class="mb-8">
                        <h2 class="mb-2">Thống kê hệ thống</h2>
                        <h5 class="text-body-tertiary fw-semibold">Đây là những gì mà diễn ra tại doanh nghiệp của bạn ngay
                            bây giờ</h5>
                    </div>
                    <div class="row align-items-center g-4">
                        <div class="col-12 col-md-auto">
                            <div class="d-flex align-items-center"><span class="fa-stack"
                                    style="min-height: 46px;min-width: 46px;"><span
                                        class="fa-solid fa-square fa-stack-2x dark__text-opacity-50 text-success-light"
                                        data-fa-transform="down-4 rotate--10 left-4"></span><span
                                        class="fa-solid fa-circle fa-stack-2x stack-circle text-stats-circle-success"
                                        data-fa-transform="up-4 right-3 grow-2"></span><span
                                        class="fa-stack-1x fa-solid fa-star text-success "
                                        data-fa-transform="shrink-2 up-8 right-6"></span></span>
                                <div class="ms-3">
                                    <h4 class="mb-0"><span
                                            data-stat="new_bookings">{{ $stats['new_bookings'] ?? 0 }}</span> yêu cầu mới
                                    </h4>
                                    <p class="text-body-secondary fs-9 mb-0">Đang chờ xử lý</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-auto">
                            <div class="d-flex align-items-center"><span class="fa-stack"
                                    style="min-height: 46px;min-width: 46px;"><span
                                        class="fa-solid fa-square fa-stack-2x dark__text-opacity-50 text-warning-light"
                                        data-fa-transform="down-4 rotate--10 left-4"></span><span
                                        class="fa-solid fa-circle fa-stack-2x stack-circle text-stats-circle-warning"
                                        data-fa-transform="up-4 right-3 grow-2"></span><span
                                        class="fa-stack-1x fa-solid fa-pause text-warning "
                                        data-fa-transform="shrink-2 up-8 right-6"></span></span>
                                <div class="ms-3">
                                    <h4 class="mb-0"><span
                                            data-stat="pending_bookings">{{ $stats['pending_bookings'] ?? 0 }}</span> yêu
                                        cầu đang chờ xử lý</h4>
                                    <p class="text-body-secondary fs-9 mb-0">Đang giữ</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-auto">
                            <div class="d-flex align-items-center"><span class="fa-stack"
                                    style="min-height: 46px;min-width: 46px;"><span
                                        class="fa-solid fa-square fa-stack-2x dark__text-opacity-50 text-danger-light"
                                        data-fa-transform="down-4 rotate--10 left-4"></span><span
                                        class="fa-solid fa-circle fa-stack-2x stack-circle text-stats-circle-danger"
                                        data-fa-transform="up-4 right-3 grow-2"></span><span
                                        class="fa-stack-1x fa-solid fa-xmark text-danger "
                                        data-fa-transform="shrink-2 up-8 right-6"></span></span>
                                <div class="ms-3">
                                    <h4 class="mb-0"><span
                                            data-stat="out_of_stock">{{ $stats['out_of_stock'] ?? 0 }}</span> sản phẩm</h4>
                                    <p class="text-body-secondary fs-9 mb-0">Hết hàng</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr class="bg-body-secondary mb-6 mt-4" />
                    <div class="row flex-between-center mb-4 g-3">
                        <div class="col-auto">
                            <h3>Số lượt yêu cầu(booking)<span class="fs-9 ms-2">
                                    <i class="fas fa-circle text-success"></i>
                                </span></h3>
                            <p class="text-body-tertiary lh-sm mb-0">Thanh toán nhận được trên tất cả các kênh</p>
                        </div>
                        <div class="col-8 col-sm-4"><select class="form-select form-select-sm" id="booking-filter">
                                <option value="year">Năm</option>
                                <option value="month">Tháng</option>
                                <option value="day">Ngày</option>
                            </select></div>
                    </div>
                    <div class="booking-stats-chart" style="min-height:320px;width:100%"></div>
                    <script src="https://cdn.jsdelivr.net/npm/echarts@5.4.3/dist/echarts.min.js"></script>
                    <script>
                        const bookingChart = echarts.init(document.querySelector('.booking-stats-chart'));
                        const loadBookingData = (filter = 'year') => {
                            let bookingStats = {
                                'year': @json($stats['bookings_by_year']),
                                'month': @json($stats['bookings_by_month']),
                                'day': @json($stats['bookings_by_day'])
                            };

                            let data;
                            try {

                                data = {
                                    labels: bookingStats[filter].map(item => {
                                        return item.year || item.month || item.date;
                                    }),
                                    values: bookingStats[filter].map(item => {
                                        return item.count;
                                    })
                                };
                            } catch (error) {
                                return;
                            }

                            if (!data) {
                                return;
                            }
                            bookingChart.setOption({
                                backgroundColor: 'transparent',
                                tooltip: {
                                    trigger: 'axis',
                                    backgroundColor: 'rgba(20, 20, 30, 0.9)',
                                    borderWidth: 0,
                                    textStyle: { color: '#fff', fontSize: 12 },
                                    padding: 8,
                                    formatter: function (params) {
                                        return `<b>${params[0].axisValue}</b><br/>📅 ${params[0].value} lượt booking`;
                                    },
                                },
                                grid: {
                                    left: '3%',
                                    right: '3%',
                                    bottom: '5%',
                                    top: '10%',
                                    containLabel: true
                                },
                                xAxis: {
                                    type: 'category',
                                    data: data.labels,
                                    boundaryGap: false,
                                    axisLine: {
                                        lineStyle: { color: 'rgba(255,255,255,0.15)' }
                                    },
                                    axisTick: { show: false },
                                    axisLabel: {
                                        color: 'rgba(255,255,255,0.6)',
                                        fontSize: 11,
                                        formatter: (value) => {
                                            if (filter === 'year') return value;
                                            if (filter === 'month') return dayjs(value).format('MM/YYYY');
                                            return dayjs(value).format('DD/MM');
                                        }
                                    }
                                },
                                yAxis: {
                                    type: 'value',
                                    axisLine: { show: false },
                                    axisTick: { show: false },
                                    splitLine: {
                                        lineStyle: { color: 'rgba(255,255,255,0.05)' }
                                    },
                                    axisLabel: {
                                        color: 'rgba(255,255,255,0.5)',
                                        fontSize: 11,
                                    }
                                },
                                series: [{
                                    name: 'Số lượt booking',
                                    type: 'line',
                                    data: data.values,
                                    smooth: true,
                                    symbol: 'circle',
                                    symbolSize: 5, // nhỏ hơn cho thanh mảnh
                                    itemStyle: {
                                        color: '#005585', // 🔹 Xanh dương sang
                                        borderColor: '#111',
                                        borderWidth: 1.5
                                    },
                                    lineStyle: {
                                        color: '#005585',
                                        width: 2.2, // mảnh hơn
                                        shadowColor: 'rgba(0,85,133,0.2)',
                                        shadowBlur: 4
                                    },
                                    areaStyle: {
                                        opacity: 0.15,
                                        color: new echarts.graphic.LinearGradient(0, 0, 0, 1, [
                                            { offset: 0, color: 'rgba(0,85,133,0.35)' },
                                            { offset: 1, color: 'rgba(0,85,133,0)' }
                                        ])
                                    },
                                    emphasis: {
                                        focus: 'series',
                                        itemStyle: {
                                            color: '#00aaff',
                                            borderColor: '#fff',
                                            borderWidth: 2
                                        }
                                    }
                                }]
                            });
                        };

                        // Load initial data
                        loadBookingData('year');

                        // Handle filter change
                        document.getElementById('booking-filter').addEventListener('change', (e) => {
                            loadBookingData(e.target.value);
                        });
                    </script>
                </div>
                <div class="col-12 col-xxl-6">
                    <div class="row g-3">
                        <div class="col-12 col-md-6">
                            <div class="card h-100">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between">
                                        <div>
                                            <h5 class="mb-1">Tổng số đơn yêu cầu(booking)
                                                <span class="fs-9 ms-2">
                                                    <i class="fas fa-circle text-success"></i>
                                                </span>
                                                @php
                                                    $currentWeekBookings = $stats['bookings_current_week'] ?? 0;
                                                    $lastWeekBookings = $stats['bookings_last_week'] ?? 0;
                                                    $percentChange =
                                                        $lastWeekBookings > 0
                                                            ? (($currentWeekBookings - $lastWeekBookings) /
                                                                    $lastWeekBookings) *
                                                                100
                                                            : 0;
                                                @endphp
                                                <span
                                                    class="badge badge-phoenix badge-phoenix-{{ $percentChange >= 0 ? 'success' : 'warning' }} rounded-pill fs-9 ms-2">
                                                    <span
                                                        class="badge-label">{{ $percentChange >= 0 ? '+' : '' }}{{ number_format($percentChange, 1) }}%</span>
                                                </span>
                                            </h5>
                                            <h6 class="text-body-tertiary">7 ngày qua</h6>
                                        </div>
                                        <h4>{{ $stats['bookings_last_7_days_summary']->total ?? 0 }}</h4>
                                    </div>
                                    <div class="d-flex justify-content-center px-4 py-6">
                                        <div class="echart-total-orders" style="height:85px;width:115px"></div>
                                    </div>
                                    <div class="mt-2">
                                        <div class="d-flex align-items-center mb-2">
                                            <div class="bullet-item bg-primary me-2"></div>
                                            <h6 class="text-body fw-semibold flex-1 mb-0">Hoàn thành</h6>
                                            <h6 class="text-body fw-semibold mb-0">
                                                {{ $stats['bookings_last_7_days_summary']->completed ?? 0 }}</h6>
                                        </div>
                                        <div class="d-flex align-items-center">
                                            <div class="bullet-item bg-primary-subtle me-2"></div>
                                            <h6 class="text-body fw-semibold flex-1 mb-0">Đang chờ xử lý</h6>
                                            <h6 class="text-body fw-semibold mb-0">
                                                {{ $stats['bookings_last_7_days_summary']->pending ?? 0 }}</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="card h-100">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between">
                                        <div>
                                            <h5 class="mb-1">Khách hàng mới<span class="fs-9 ms-2">
                                                    <i class="fas fa-circle text-success"></i>
                                                </span>
                                                @php
                                                    $currentNewUsers = $stats['new_users_last_7_days'] ?? 0;
                                                    $prevNewUsers = $stats['new_users_previous_7_days'] ?? 0;
                                                    $userPercentChange = $prevNewUsers > 0 
                                                        ? (($currentNewUsers - $prevNewUsers) / $prevNewUsers) * 100 
                                                        : 0;
                                                @endphp
                                                <span
                                                    class="badge badge-phoenix badge-phoenix-{{ $userPercentChange >= 0 ? 'success' : 'warning' }} rounded-pill fs-9 ms-2">
                                                    <span class="badge-label">{{ $userPercentChange >= 0 ? '+' : '' }}{{ number_format($userPercentChange, 1) }}%</span>
                                                </span>
                                            </h5>
                                            <h6 class="text-body-tertiary">7 ngày qua</h6>
                                        </div>
                                        <h4>{{ $stats['new_users_last_7_days'] }}</h4>
                                    </div>
                                    <div class="pb-0 pt-4">
                                        <div class="echarts-new-customers" style="height:180px;width:100%;"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="card h-100">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between">
                                        <div>
                                            <h5 class="mb-2">Phiếu giảm giá hàng đầu</h5>
                                            <h6 class="text-body-tertiary">7 ngày qua</h6>
                                        </div>
                                    </div>
                                    <div class="pb-4 pt-3">
                                        <div class="echart-top-coupons" style="height:115px;width:100%;"></div>
                                    </div>
                                    <div>
                                        <div class="d-flex align-items-center mb-2">
                                            <div class="bullet-item bg-primary me-2"></div>
                                            <h6 class="text-body fw-semibold flex-1 mb-0">Giảm giá theo tỷ lệ phần trăm
                                            </h6>
                                            <h6 class="text-body fw-semibold mb-0">72%</h6>
                                        </div>
                                        <div class="d-flex align-items-center mb-2">
                                            <div class="bullet-item bg-primary-lighter me-2"></div>
                                            <h6 class="text-body fw-semibold flex-1 mb-0">Giảm giá theo thẻ cố định</h6>
                                            <h6 class="text-body fw-semibold mb-0">18%</h6>
                                        </div>
                                        <div class="d-flex align-items-center">
                                            <div class="bullet-item bg-info-dark me-2"></div>
                                            <h6 class="text-body fw-semibold flex-1 mb-0">Giảm giá theo sản phẩm cố định
                                            </h6>
                                            <h6 class="text-body fw-semibold mb-0">10%</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="card h-100">
                                <div class="card-body d-flex flex-column">
                                    <div class="d-flex justify-content-between">
                                        <div>
                                            <h5 class="mb-2">Khách hàng trả phí vs không trả phí</h5>
                                            <h6 class="text-body-tertiary">7 ngày qua</h6>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-center pt-3 flex-1">
                                        <div class="echarts-paying-customer-chart" style="height:100%;width:100%;"></div>
                                    </div>
                                    <div class="mt-3">
                                        <div class="d-flex align-items-center mb-2">
                                            <div class="bullet-item bg-primary me-2"></div>
                                            <h6 class="text-body fw-semibold flex-1 mb-0">Khách hàng trả phí</h6>
                                            <h6 class="text-body fw-semibold mb-0">30%</h6>
                                        </div>
                                        <div class="d-flex align-items-center">
                                            <div class="bullet-item bg-primary-subtle me-2"></div>
                                            <h6 class="text-body fw-semibold flex-1 mb-0">Khách hàng không trả phí</h6>
                                            <h6 class="text-body fw-semibold mb-0">70%</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="mx-n4 px-4 mx-lg-n6 px-lg-6 bg-body-emphasis pt-7 border-y">
            <div data-list='{"valueNames":["product","customer","rating","review","time"],"page":6}'>
                <div class="row align-items-end justify-content-between pb-5 g-3">
                    <div class="col-auto">
                        <h3>Bình luận mới nhất
                            <span class="fs-9 ms-2">
                                <i class="fas fa-circle text-success"></i>
                            </span>
                        </h3>
                        <p class="text-body-tertiary lh-sm mb-0">Thanh toán đã nhận trên tất cả các kênh</p>
                    </div>
                    <div class="col-12 col-md-auto">
                        <div class="row g-2 gy-3">
                            <div class="col-auto flex-1">
                                <div class="search-box">
                                    <form class="position-relative"><input
                                            class="form-control search-input search form-control-sm" type="search"
                                            placeholder="Search" aria-label="Search" />
                                        <span class="fas fa-search search-box-icon"></span>
                                    </form>
                                </div>
                            </div>
                            <div class="col-auto"><button
                                    class="btn btn-sm btn-phoenix-secondary bg-body-emphasis bg-body-hover me-2"
                                    type="button">All
                                    products</button><button
                                    class="btn btn-sm btn-phoenix-secondary bg-body-emphasis bg-body-hover action-btn"
                                    type="button" data-bs-toggle="dropdown" data-boundary="window" aria-haspopup="true"
                                    aria-expanded="false" data-bs-reference="parent"><span class="fas fa-ellipsis-h"
                                        data-fa-transform="shrink-2"></span></button>
                                <ul class="dropdown-menu dropdown-menu-end">
                                    <li><a class="dropdown-item" href="#">Hoạt động</a></li>
                                    <li><a class="dropdown-item" href="#">Hành động khác</a></li>
                                    <li><a class="dropdown-item" href="#">Một cái gì đó khác ở đây</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="table-responsive mx-n1 px-1 scrollbar">
                    <table class="table fs-9 mb-0 border-top border-translucent">
                        <thead>
                            <tr>
                                <th class="white-space-nowrap fs-9 ps-0 align-middle">
                                    <div class="form-check mb-0 fs-8"><input class="form-check-input"
                                            id="checkbox-bulk-reviews-select" type="checkbox"
                                            data-bulk-select='{"body":"table-latest-review-body"}' /></div>
                                </th>
                                <th class="sort white-space-nowrap align-middle" scope="col"></th>
                                <th class="sort white-space-nowrap align-middle" scope="col" style="min-width:360px;"
                                    data-sort="product">SẢN PHẨM</th>
                                <th class="sort align-middle" scope="col" data-sort="customer"
                                    style="min-width:200px;">KHÁCH HÀNG</th>
                                <th class="sort align-middle" scope="col" data-sort="rating"
                                    style="min-width:110px;">ĐÁNH GIÁ</th>
                                <th class="sort align-middle" scope="col" style="max-width:350px;"
                                    data-sort="review">BÌNH LUẬN</th>
                                <th class="sort text-start ps-5 align-middle" scope="col" data-sort="status">TRẠNG
                                    THÁI
                                </th>
                                <th class="sort text-end align-middle" scope="col" data-sort="time">THỜI GIAN</th>
                                <th class="sort text-end pe-0 align-middle" scope="col"></th>
                            </tr>
                        </thead>
                        <tbody class="list" id="table-latest-review-body">
                            @foreach ($stats['latest_comments'] as $comment)
                                <tr class="hover-actions-trigger btn-reveal-trigger position-static">
                                    <td class="fs-9 align-middle ps-0">
                                        <div class="form-check mb-0 fs-8"><input class="form-check-input" type="checkbox"
                                                data-bulk-select-row='{"product":"Fitbit Sense Advanced Smartwatch with Tools for Heart Health, Stress Management & Skin Temperature Trends, Carbon/Graphite, One Size (S & L Bands)","productImage":"/products/60x60/1.png","customer":{"name":"Richard Dawkins","avatar":""},"rating":5,"review":"This Fitbit is fantastic! I was trying to be in better shape and needed some motivation, so I decided to treat myself to a new Fitbit.","status":{"title":"Approved","badge":"success","icon":"check"},"time":"Just now"}' />
                                        </div>
                                    </td>
                                    <td class="align-middle product white-space-nowrap py-0"><a
                                            class="d-block rounded-2 border border-translucent"
                                            href="apps/e-commerce/landing/product-details.html"><img
                                                src="{{ asset('storage/' . $comment->product_image) }}" alt=""
                                                width="53" /></a>
                                    </td>
                                    <td class="align-middle product white-space-nowrap"><a class="fw-semibold"
                                            href="apps/e-commerce/landing/product-details.html">{{ $comment->product_name }}</a>
                                    </td>
                                    <td class="align-middle product white-space-nowrap"><a
                                            class="d-flex align-items-center text-body"
                                            href="apps/e-commerce/landing/profile.html">
                                            <img src="{{ asset('storage/' . ($comment->user_avatar ? $comment->user_avatar : 'uploads/avatars/admin.png')) }}"
                                                alt="" width="53" />
                                            <h6 class="mb-0 ms-3 text-body">{{ $comment->user_name }}</h6>
                                        </a></td>
                                    <td class="align-middle rating white-space-nowrap fs-10"><span
                                            class="fa fa-star text-warning"></span><span
                                            class="fa fa-star text-warning"></span><span
                                            class="fa fa-star text-warning"></span><span
                                            class="fa fa-star text-warning"></span><span
                                            class="fa fa-star text-warning"></span></td>
                                    <td class="align-middle review" style="min-width:350px;">
                                        <p class="fs-9 fw-semibold text-body-highlight mb-0">{{ $comment->content }}</p>
                                    </td>
                                    <td class="align-middle text-start ps-5 status">
                                        <span class="badge badge-phoenix fs-10 badge-phoenix-success">
                                            <span class="badge-label">Thành công</span>
                                            <span class="ms-1" data-feather="check"
                                                style="height:12.8px;width:12.8px;"></span>
                                        </span>
                                    </td>
                                    <td class="align-middle text-end time white-space-nowrap">
                                        <div class="hover-hide">
                                            <h6 class="text-body-highlight mb-0">
                                                {{ \Carbon\Carbon::parse($comment->created_at)->format('H:i:s d/m/Y') }}
                                            </h6>
                                        </div>
                                    </td>
                                    <td class="align-middle white-space-nowrap text-end pe-0">
                                        <div class="position-relative">
                                            <div class="hover-actions"><button
                                                    class="btn btn-sm btn-phoenix-secondary me-1 fs-10"><span
                                                        class="fas fa-check"></span></button><button
                                                    class="btn btn-sm btn-phoenix-secondary fs-10"><span
                                                        class="fas fa-trash"></span></button>
                                            </div>
                                        </div>
                                        <div class="btn-reveal-trigger position-static"><button
                                                class="btn btn-sm dropdown-toggle dropdown-caret-none transition-none btn-reveal fs-10"
                                                type="button" data-bs-toggle="dropdown" data-boundary="window"
                                                aria-haspopup="true" aria-expanded="false"
                                                data-bs-reference="parent"><span
                                                    class="fas fa-ellipsis-h fs-10"></span></button>
                                            <div class="dropdown-menu dropdown-menu-end py-2"><a class="dropdown-item"
                                                    href="#!">View</a><a class="dropdown-item"
                                                    href="#!">Export</a>
                                                <div class="dropdown-divider"></div><a class="dropdown-item text-danger"
                                                    href="#!">Remove</a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="row align-items-center py-1">
                    <div class="pagination d-none"></div>
                    <div class="col d-flex fs-9">
                        <p class="mb-0 d-none d-sm-block me-3 fw-semibold text-body" data-list-info="data-list-info">
                        </p><a class="fw-semibold" href="#!" data-list-view="*">View all<span
                                class="fas fa-angle-right ms-1" data-fa-transform="down-1"></span></a><a
                            class="fw-semibold d-none" href="#!" data-list-view="less">View Less</a>
                    </div>
                    <div class="col-auto d-flex">
                        <button class="btn btn-link px-1 me-1" type="button" title="Previous"
                            data-list-pagination="prev"><span
                                class="fas fa-chevron-left me-2"></span>Previous</button><button
                            class="btn btn-link px-1 ms-1" type="button" title="Next"
                            data-list-pagination="next">Next<span class="fas fa-chevron-right ms-2"></span></button>
                    </div>
                </div>
            </div>
        </div>
        <div class="row gx-6">
            <div class="col-12 col-xl-6">
                <div data-list='{"valueNames":["country","users","transactions","revenue","conv-rate"],"page":5}'>
                    <div class="mb-5 mt-7">
                        <h3>Các khu vực hàng đầu theo doanh thu</h3>
                        <p class="text-body-tertiary">Nơi bạn tạo ra nhiều doanh thu nhất</p>
                    </div>
                    <div class="table-responsive scrollbar">
                        <table class="table fs-10 mb-0">
                            <thead>
                                <tr>
                                    <th class="sort border-top border-translucent ps-0 align-middle" scope="col"
                                        data-sort="country" style="width:32%">QUỐC GIA</th>
                                    <th class="sort border-top border-translucent align-middle" scope="col"
                                        data-sort="users" style="width:17%">NGƯỜI DÙNG</th>
                                    <th class="sort border-top border-translucent text-end align-middle" scope="col"
                                        data-sort="transactions" style="width:16%">GIAO DỊCH</th>
                                    <th class="sort border-top border-translucent text-end align-middle" scope="col"
                                        data-sort="revenue" style="width:20%">DOANH THU</th>
                                    <th class="sort border-top border-translucent text-end pe-0 align-middle"
                                        scope="col" data-sort="conv-rate" style="width:17%">TỶ LỆ CHUYỂN ĐỔI</th>
                                </tr>
                            </thead>
                            <tr>
                                <td></td>
                                <td class="align-middle py-4">
                                    <h4 class="mb-0 fw-normal">377,620</h4>
                                </td>
                                <td class="align-middle text-end py-4">
                                    <h4 class="mb-0 fw-normal">236</h4>
                                </td>
                                <td class="align-middle text-end py-4">
                                    <h4 class="mb-0 fw-normal">$15,758</h4>
                                </td>
                                <td class="align-middle text-end py-4 pe-0">
                                    <h4 class="mb-0 fw-normal">10.32%</h4>
                                </td>
                            </tr>
                            <tbody class="list" id="table-regions-by-revenue">
                                <tr>
                                    <td class="white-space-nowrap ps-0 country" style="width:32%">
                                        <div class="d-flex align-items-center">
                                            <h6 class="mb-0 me-3">1. </h6><a href="#!">
                                                <div class="d-flex align-items-center"><img
                                                        src="assets/img/country/india.png" alt=""
                                                        width="24" />
                                                    <p class="mb-0 ps-3 text-primary fw-bold fs-9">Ấn Độ</p>
                                                </div>
                                            </a>
                                        </div>
                                    </td>
                                    <td class="align-middle users" style="width:17%">
                                        <h6 class="mb-0">92896<span
                                                class="text-body-tertiary fw-semibold ms-2">(41.6%)</span></h6>
                                    </td>
                                    <td class="align-middle text-end transactions" style="width:17%">
                                        <h6 class="mb-0">67<span
                                                class="text-body-tertiary fw-semibold ms-2">(34.3%)</span></h6>
                                    </td>
                                    <td class="align-middle text-end revenue" style="width:17%">
                                        <h6 class="mb-0">$7560<span
                                                class="text-body-tertiary fw-semibold ms-2">(36.9%)</span></h6>
                                    </td>
                                    <td class="align-middle text-end pe-0 conv-rate" style="width:17%">
                                        <h6>14.01%</h6>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="white-space-nowrap ps-0 country" style="width:32%">
                                        <div class="d-flex align-items-center">
                                            <h6 class="mb-0 me-3">2. </h6><a href="#!">
                                                <div class="d-flex align-items-center"><img
                                                        src="assets/img/country/china.png" alt=""
                                                        width="24" />
                                                    <p class="mb-0 ps-3 text-primary fw-bold fs-9">China</p>
                                                </div>
                                            </a>
                                        </div>
                                    </td>
                                    <td class="align-middle users" style="width:17%">
                                        <h6 class="mb-0">50496<span
                                                class="text-body-tertiary fw-semibold ms-2">(32.8%)</span></h6>
                                    </td>
                                    <td class="align-middle text-end transactions" style="width:17%">
                                        <h6 class="mb-0">54<span
                                                class="text-body-tertiary fw-semibold ms-2">(23.8%)</span></h6>
                                    </td>
                                    <td class="align-middle text-end revenue" style="width:17%">
                                        <h6 class="mb-0">$6532<span
                                                class="text-body-tertiary fw-semibold ms-2">(26.5%)</span></h6>
                                    </td>
                                    <td class="align-middle text-end pe-0 conv-rate" style="width:17%">
                                        <h6>23.56%</h6>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="white-space-nowrap ps-0 country" style="width:32%">
                                        <div class="d-flex align-items-center">
                                            <h6 class="mb-0 me-3">3. </h6><a href="#!">
                                                <div class="d-flex align-items-center"><img
                                                        src="assets/img/country/usa.png" alt="" width="24" />
                                                    <p class="mb-0 ps-3 text-primary fw-bold fs-9">USA</p>
                                                </div>
                                            </a>
                                        </div>
                                    </td>
                                    <td class="align-middle users" style="width:17%">
                                        <h6 class="mb-0">45679<span
                                                class="text-body-tertiary fw-semibold ms-2">(24.3%)</span></h6>
                                    </td>
                                    <td class="align-middle text-end transactions" style="width:17%">
                                        <h6 class="mb-0">35<span
                                                class="text-body-tertiary fw-semibold ms-2">(19.7%)</span></h6>
                                    </td>
                                    <td class="align-middle text-end revenue" style="width:17%">
                                        <h6 class="mb-0">$5432<span
                                                class="text-body-tertiary fw-semibold ms-2">(16.9%)</span></h6>
                                    </td>
                                    <td class="align-middle text-end pe-0 conv-rate" style="width:17%">
                                        <h6>10.23%</h6>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="white-space-nowrap ps-0 country" style="width:32%">
                                        <div class="d-flex align-items-center">
                                            <h6 class="mb-0 me-3">4. </h6><a href="#!">
                                                <div class="d-flex align-items-center"><img
                                                        src="assets/img/country/south-korea.png" alt=""
                                                        width="24" />
                                                    <p class="mb-0 ps-3 text-primary fw-bold fs-9">South Korea</p>
                                                </div>
                                            </a>
                                        </div>
                                    </td>
                                    <td class="align-middle users" style="width:17%">
                                        <h6 class="mb-0">36453<span
                                                class="text-body-tertiary fw-semibold ms-2">(19.7%)</span></h6>
                                    </td>
                                    <td class="align-middle text-end transactions" style="width:17%">
                                        <h6 class="mb-0">22<span
                                                class="text-body-tertiary fw-semibold ms-2">(9.54%)</span></h6>
                                    </td>
                                    <td class="align-middle text-end revenue" style="width:17%">
                                        <h6 class="mb-0">$4673<span
                                                class="text-body-tertiary fw-semibold ms-2">(11.6%)</span></h6>
                                    </td>
                                    <td class="align-middle text-end pe-0 conv-rate" style="width:17%">
                                        <h6>8.85%</h6>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="white-space-nowrap ps-0 country" style="width:32%">
                                        <div class="d-flex align-items-center">
                                            <h6 class="mb-0 me-3">5. </h6><a href="#!">
                                                <div class="d-flex align-items-center"><img
                                                        src="assets/img/country/vietnam.png" alt=""
                                                        width="24" />
                                                    <p class="mb-0 ps-3 text-primary fw-bold fs-9">Vietnam</p>
                                                </div>
                                            </a>
                                        </div>
                                    </td>
                                    <td class="align-middle users" style="width:17%">
                                        <h6 class="mb-0">15007<span
                                                class="text-body-tertiary fw-semibold ms-2">(11.9%)</span></h6>
                                    </td>
                                    <td class="align-middle text-end transactions" style="width:17%">
                                        <h6 class="mb-0">17<span
                                                class="text-body-tertiary fw-semibold ms-2">(6.91%)</span></h6>
                                    </td>
                                    <td class="align-middle text-end revenue" style="width:17%">
                                        <h6 class="mb-0">$2456<span
                                                class="text-body-tertiary fw-semibold ms-2">(10.2%)</span></h6>
                                    </td>
                                    <td class="align-middle text-end pe-0 conv-rate" style="width:17%">
                                        <h6>6.01%</h6>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="white-space-nowrap ps-0 country" style="width:32%">
                                        <div class="d-flex align-items-center">
                                            <h6 class="mb-0 me-3">6. </h6><a href="#!">
                                                <div class="d-flex align-items-center"><img
                                                        src="assets/img/country/russia.png" alt=""
                                                        width="24" />
                                                    <p class="mb-0 ps-3 text-primary fw-bold fs-9">Russia</p>
                                                </div>
                                            </a>
                                        </div>
                                    </td>
                                    <td class="align-middle users" style="width:17%">
                                        <h6 class="mb-0">54215<span
                                                class="text-body-tertiary fw-semibold ms-2">(32.9%)</span></h6>
                                    </td>
                                    <td class="align-middle text-end transactions" style="width:17%">
                                        <h6 class="mb-0">38<span
                                                class="text-body-tertiary fw-semibold ms-2">(7.91%)</span></h6>
                                    </td>
                                    <td class="align-middle text-end revenue" style="width:17%">
                                        <h6 class="mb-0">$3254<span
                                                class="text-body-tertiary fw-semibold ms-2">(12.4%)</span></h6>
                                    </td>
                                    <td class="align-middle text-end pe-0 conv-rate" style="width:17%">
                                        <h6>6.21%</h6>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="white-space-nowrap ps-0 country" style="width:32%">
                                        <div class="d-flex align-items-center">
                                            <h6 class="mb-0 me-3">7. </h6><a href="#!">
                                                <div class="d-flex align-items-center"><img
                                                        src="assets/img/country/australia.png" alt=""
                                                        width="24" />
                                                    <p class="mb-0 ps-3 text-primary fw-bold fs-9">Australia</p>
                                                </div>
                                            </a>
                                        </div>
                                    </td>
                                    <td class="align-middle users" style="width:17%">
                                        <h6 class="mb-0">54789<span
                                                class="text-body-tertiary fw-semibold ms-2">(12.7%)</span></h6>
                                    </td>
                                    <td class="align-middle text-end transactions" style="width:17%">
                                        <h6 class="mb-0">32<span
                                                class="text-body-tertiary fw-semibold ms-2">(14.0%)</span></h6>
                                    </td>
                                    <td class="align-middle text-end revenue" style="width:17%">
                                        <h6 class="mb-0">$3215<span
                                                class="text-body-tertiary fw-semibold ms-2">(5.72%)</span></h6>
                                    </td>
                                    <td class="align-middle text-end pe-0 conv-rate" style="width:17%">
                                        <h6>12.02%</h6>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="white-space-nowrap ps-0 country" style="width:32%">
                                        <div class="d-flex align-items-center">
                                            <h6 class="mb-0 me-3">8. </h6><a href="#!">
                                                <div class="d-flex align-items-center"><img
                                                        src="assets/img/country/england.png" alt=""
                                                        width="24" />
                                                    <p class="mb-0 ps-3 text-primary fw-bold fs-9">England</p>
                                                </div>
                                            </a>
                                        </div>
                                    </td>
                                    <td class="align-middle users" style="width:17%">
                                        <h6 class="mb-0">14785<span
                                                class="text-body-tertiary fw-semibold ms-2">(12.9%)</span></h6>
                                    </td>
                                    <td class="align-middle text-end transactions" style="width:17%">
                                        <h6 class="mb-0">11<span
                                                class="text-body-tertiary fw-semibold ms-2">(32.91%)</span></h6>
                                    </td>
                                    <td class="align-middle text-end revenue" style="width:17%">
                                        <h6 class="mb-0">$4745<span
                                                class="text-body-tertiary fw-semibold ms-2">(10.2%)</span></h6>
                                    </td>
                                    <td class="align-middle text-end pe-0 conv-rate" style="width:17%">
                                        <h6>8.01%</h6>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="white-space-nowrap ps-0 country" style="width:32%">
                                        <div class="d-flex align-items-center">
                                            <h6 class="mb-0 me-3">9. </h6><a href="#!">
                                                <div class="d-flex align-items-center"><img
                                                        src="assets/img/country/indonesia.png" alt=""
                                                        width="24" />
                                                    <p class="mb-0 ps-3 text-primary fw-bold fs-9">Indonesia</p>
                                                </div>
                                            </a>
                                        </div>
                                    </td>
                                    <td class="align-middle users" style="width:17%">
                                        <h6 class="mb-0">32156<span
                                                class="text-body-tertiary fw-semibold ms-2">(32.2%)</span></h6>
                                    </td>
                                    <td class="align-middle text-end transactions" style="width:17%">
                                        <h6 class="mb-0">89<span
                                                class="text-body-tertiary fw-semibold ms-2">(12.0%)</span></h6>
                                    </td>
                                    <td class="align-middle text-end revenue" style="width:17%">
                                        <h6 class="mb-0">$2456<span
                                                class="text-body-tertiary fw-semibold ms-2">(23.2%)</span></h6>
                                    </td>
                                    <td class="align-middle text-end pe-0 conv-rate" style="width:17%">
                                        <h6>9.07%</h6>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="white-space-nowrap ps-0 country" style="width:32%">
                                        <div class="d-flex align-items-center">
                                            <h6 class="mb-0 me-3">10. </h6><a href="#!">
                                                <div class="d-flex align-items-center"><img
                                                        src="assets/img/country/japan.png" alt=""
                                                        width="24" />
                                                    <p class="mb-0 ps-3 text-primary fw-bold fs-9">Japan</p>
                                                </div>
                                            </a>
                                        </div>
                                    </td>
                                    <td class="align-middle users" style="width:17%">
                                        <h6 class="mb-0">12547<span
                                                class="text-body-tertiary fw-semibold ms-2">(12.7%)</span></h6>
                                    </td>
                                    <td class="align-middle text-end transactions" style="width:17%">
                                        <h6 class="mb-0">21<span
                                                class="text-body-tertiary fw-semibold ms-2">(14.91%)</span></h6>
                                    </td>
                                    <td class="align-middle text-end revenue" style="width:17%">
                                        <h6 class="mb-0">$2541<span
                                                class="text-body-tertiary fw-semibold ms-2">(23.2%)</span></h6>
                                    </td>
                                    <td class="align-middle text-end pe-0 conv-rate" style="width:17%">
                                        <h6>20.01%</h6>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="row align-items-center py-1">
                        <div class="pagination d-none"></div>
                        <div class="col d-flex fs-9">
                            <p class="mb-0 d-none d-sm-block me-3 fw-semibold text-body" data-list-info="data-list-info">
                            </p>
                        </div>
                        <div class="col-auto d-flex">
                            <button class="btn btn-link px-1 me-1" type="button" title="Previous"
                                data-list-pagination="prev"><span
                                    class="fas fa-chevron-left me-2"></span>Previous</button><button
                                class="btn btn-link px-1 ms-1" type="button" title="Next"
                                data-list-pagination="next">Next<span class="fas fa-chevron-right ms-2"></span></button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-xl-6">
                <div class="mx-n4 mx-lg-n6 ms-xl-0 h-100">
                    <div class="h-100 w-100">
                        <div class="h-100 bg-body-emphasis" id="map" style="min-height: 300px;"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="mx-n4 px-4 mx-lg-n6 px-lg-6 bg-body-emphasis pt-6 pb-9 border-top">
            <div class="row g-6">
                <div class="col-12 col-xl-6">
                    <div class="me-xl-4">
                        <div>
                            <h3>Dự đoán so với thực tế</h3>
                            <p class="mb-1 text-body-tertiary">Doanh thu thực tế so với doanh thu dự đoán</p>
                        </div>
                        <div class="echart-projection-actual" style="height:300px; width:100%"></div>
                    </div>
                </div>
                <div class="col-12 col-xl-6">
                    <div>
                        <h3>Tỷ lệ khách hàng quay lại</h3>
                        <p class="mb-1 text-body-tertiary">Tỷ lệ khách hàng quay lại cửa hàng của bạn theo thời gian</p>
                    </div>
                    <div class="echart-returning-customer" style="height:300px;"></div>
                </div>
            </div>
        </div>
        @include('partials.footer')
    </div>
@endsection
