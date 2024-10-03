<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover"/>
    <meta http-equiv="X-UA-Compatible" content="ie=edge"/>
    <link rel="shortcut icon" href="{{asset('asset/img/icon.png')}}">
    <title>Dashboard - TeachHub</title>
    <!-- CSS files -->
    <link rel="stylesheet" href="{{asset('https://cdn.datatables.net/2.1.7/css/dataTables.dataTables.css')}}" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <link href="{{asset('dist/css/tabler.min.css?1692870487')}}" rel="stylesheet"/>
    <link href="{{asset('dist/css/tabler-flags.min.css?1692870487')}}" rel="stylesheet"/>
    <link href="{{asset('dist/css/tabler-payments.min.css?1692870487')}}" rel="stylesheet"/>
    <link href="{{asset('dist/css/tabler-vendors.min.css?1692870487')}}" rel="stylesheet"/>
    <link href="{{asset('dist/css/demo.min.css')}}"/>
    <link href="{{asset('dist/css/toastr.css')}}" rel="stylesheet"/>
    <link rel="stylesheet"
          href="{{asset('https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.5/font/bootstrap-icons.min.css')}}">
    <style>
        @import url('https://rsms.me/inter/inter.css');

        :root {
            --tblr-font-sans-serif: 'Inter Var', -apple-system, BlinkMacSystemFont, San Francisco, Segoe UI, Roboto, Helvetica Neue, sans-serif;
        }

        body {
            font-feature-settings: "cv03", "cv04", "cv11";
        }
    </style>


</head>
<body>
<script src="{{asset('dist/js/demo-theme.min.js?1692870487')}}"></script>
<div class="page">
    <!-- Navbar -->
    <header class="navbar navbar-expand-md d-print-none">
        <div class="container-xl">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar-menu"
                    aria-controls="navbar-menu" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <h1 class="navbar-brand navbar-brand-autodark d-none-navbar-horizontal pe-0 pe-md-3">
                <a href=".">
                    <img src="{{asset('asset/img/logo.png')}}" height="50" alt=" ">
                </a>
            </h1>
            <div class="navbar-nav flex-row order-md-last">
                <div class="nav-item d-none d-md-flex me-3">
                    <div class="btn-list">
                        <a href="https://www.facebook.com" class="btn" target="_blank" rel="noreferrer">
                            <i class="bi bi-facebook text-blue" style="font-size: 24px; margin-right: 8px;"></i>
                            Liên hệ Facebook
                        </a>

                        <a href="https://mail.google.com/mail/u/0/#inbox" class="btn" target="_blank" rel="noreferrer">
                            <i class="bi bi-envelope text-red" style="font-size: 24px; margin-right: 8px;"></i>
                            Gửi Email
                        </a>
                    </div>
                </div>
                <div class="d-none d-md-flex">
                    <a href="?theme=dark" class="nav-link px-0 hide-theme-dark" title="Bật chế độ tối"
                       data-bs-toggle="tooltip"
                       data-bs-placement="bottom">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24"
                             stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                             stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                            <path d="M12 3c.132 0 .263 0 .393 0a7.5 7.5 0 0 0 7.92 12.446a9 9 0 1 1 -8.313 -12.454z"/>
                        </svg>
                    </a>

                    <a href="?theme=light" class="nav-link px-0 hide-theme-light" title="Bật chế độ sáng"
                       data-bs-toggle="tooltip"
                       data-bs-placement="bottom">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24"
                             stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                             stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                            <path d="M12 12m-4 0a4 4 0 1 0 8 0a4 4 0 1 0 -8 0"/>
                            <path
                                d="M3 12h1m8 -9v1m8 8h1m-9 8v1m-6.4 -15.4l.7 .7m12.1 -.7l-.7 .7m0 11.4l.7 .7m-12.1 -.7l-.7 .7"/>
                        </svg>
                    </a>

                    <div class="nav-item dropdown d-none d-md-flex me-3">
                        <a href="#" class="nav-link px-0" data-bs-toggle="dropdown" tabindex="-1"
                           aria-label="Show notifications">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                 viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                 stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                <path
                                    d="M10 5a2 2 0 1 1 4 0a7 7 0 0 1 4 6v3a4 4 0 0 0 2 3h-16a4 4 0 0 0 2 -3v-3a7 7 0 0 1 4 -6"/>
                                <path d="M9 17v1a3 3 0 0 0 6 0v-1"/>
                            </svg>
                            <span class="badge bg-red"></span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-end dropdown-menu-card">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">Thông báo</h3>
                                </div>
                                <div class="list-group list-group-flush list-group-hoverable">
                                    <div class="list-group-item">
                                        <div class="row align-items-center">
                                            <div class="col-auto"><span
                                                    class="status-dot status-dot-animated bg-red d-block"></span></div>
                                            <div class="col text-truncate">
                                                <a href="#" class="text-body d-block">Toán 10</a>
                                                <div class="d-block text-secondary text-truncate mt-n1">
                                                    Chương 1: Mệnh đề và tập hợp
                                                </div>
                                            </div>
                                            <div class="col-auto">
                                                <a href="#" class="list-group-item-actions">
                                                    <!-- Download SVG icon from http://tabler-icons.io/i/star -->
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon text-muted"
                                                         width="24" height="24" viewBox="0 0 24 24" stroke-width="2"
                                                         stroke="currentColor" fill="none" stroke-linecap="round"
                                                         stroke-linejoin="round">
                                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                                        <path
                                                            d="M12 17.75l-6.172 3.245l1.179 -6.873l-5 -4.867l6.9 -1l3.086 -6.253l3.086 6.253l6.9 1l-5 4.867l1.179 6.873z"/>
                                                    </svg>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="list-group-item">
                                        <div class="row align-items-center">
                                            <div class="col-auto"><span class="status-dot d-block"></span></div>
                                            <div class="col text-truncate">
                                                <a href="#" class="text-body d-block">Ngữ văn 11</a>
                                                <div class="d-block text-secondary text-truncate mt-n1">
                                                    Bài 1: Ai đã đặt tên cho dòng sông
                                                </div>
                                            </div>
                                            <div class="col-auto">
                                                <a href="#" class="list-group-item-actions show">
                                                    <!-- Download SVG icon from http://tabler-icons.io/i/star -->
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon text-yellow"
                                                         width="24" height="24" viewBox="0 0 24 24" stroke-width="2"
                                                         stroke="currentColor" fill="none" stroke-linecap="round"
                                                         stroke-linejoin="round">
                                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                                        <path
                                                            d="M12 17.75l-6.172 3.245l1.179 -6.873l-5 -4.867l6.9 -1l3.086 -6.253l3.086 6.253l6.9 1l-5 4.867l1.179 6.873z"/>
                                                    </svg>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="list-group-item">
                                        <div class="row align-items-center">
                                            <div class="col-auto"><span class="status-dot d-block"></span></div>
                                            <div class="col text-truncate">
                                                <a href="#" class="text-body d-block">Vật lý 12</a>
                                                <div class="d-block text-secondary text-truncate mt-n1">
                                                    Bài 1: Dao động điều hòa
                                                </div>
                                            </div>
                                            <div class="col-auto">
                                                <a href="#" class="list-group-item-actions">
                                                    <!-- Download SVG icon from http://tabler-icons.io/i/star -->
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon text-muted"
                                                         width="24" height="24" viewBox="0 0 24 24" stroke-width="2"
                                                         stroke="currentColor" fill="none" stroke-linecap="round"
                                                         stroke-linejoin="round">
                                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                                        <path
                                                            d="M12 17.75l-6.172 3.245l1.179 -6.873l-5 -4.867l6.9 -1l3.086 -6.253l3.086 6.253l6.9 1l-5 4.867l1.179 6.873z"/>
                                                    </svg>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="list-group-item">
                                        <div class="row align-items-center">
                                            <div class="col-auto"><span
                                                    class="status-dot status-dot-animated bg-green d-block"></span>
                                            </div>
                                            <div class="col text-truncate">
                                                <a href="#" class="text-body d-block">Địa lý 12</a>
                                                <div class="d-block text-secondary text-truncate mt-n1">
                                                    Chương 1: Vị trí địa lí và phạm vi lãnh thổ
                                                </div>
                                            </div>
                                            <div class="col-auto">
                                                <a href="#" class="list-group-item-actions">
                                                    <!-- Download SVG icon from http://tabler-icons.io/i/star -->
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon text-muted"
                                                         width="24" height="24" viewBox="0 0 24 24" stroke-width="2"
                                                         stroke="currentColor" fill="none" stroke-linecap="round"
                                                         stroke-linejoin="round">
                                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                                        <path
                                                            d="M12 17.75l-6.172 3.245l1.179 -6.873l-5 -4.867l6.9 -1l3.086 -6.253l3.086 6.253l6.9 1l-5 4.867l1.179 6.873z"/>
                                                    </svg>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="nav-item dropdown">
                    <a href="#" class="nav-link d-flex lh-1 text-reset p-0" data-bs-toggle="dropdown"
                       aria-label="Open user menu">
                        <span class="avatar avatar-sm"
                              style="background-image: url({{asset('asset/img_user/user.jpg')}})"></span>
                        <div class="d-none d-xl-block ps-2">
                            <div>User</div>
                            <div class="mt-1 small text-secondary">Admin</div>
                        </div>
                    </a>
                    <div class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                        <a href="#" class="dropdown-item">Trạng thái</a>
                        <a href="{{asset('profile.html')}}" class="dropdown-item">Thông tin</a>
                        <div class="dropdown-divider"></div>
                        <a href="{{asset('settings.html')}}" class="dropdown-item">Cài đặt</a>
                        <a href="{{route('index-login')}}" class="dropdown-item">Đăng xuất</a>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <header class="navbar-expand-md">
        <div class="collapse navbar-collapse" id="navbar-menu">
            <div class="navbar">
                <div class="container-xl">
                    <div class="row flex-fill align-items-center">
                        <div class="col">
                            <ul class="navbar-nav">
                                <li class="nav-item active">
                                    <a class="nav-link" href="./">
                                        <span class="nav-link-icon d-md-none d-lg-inline-block">
                                          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                               viewBox="0 0 24 24" fill="none"
                                               stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                               stroke-linejoin="round"
                                               class="icon"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path
                                                  d="M5 12l-2 0l9 -9l9 9l-2 0"></path><path
                                                  d="M5 12v7a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-7"></path><path
                                                  d="M9 21v-6a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v6"></path></svg>
                                        </span>
                                        <span class="nav-link-title"> Trang chủ </span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{route('index.ds-giao-vien')}}">
                                        <span class="nav-link-icon d-md-none d-lg-inline-block">
                                           <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-user">
                                              <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                              <path d="M8 7a4 4 0 1 0 8 0a4 4 0 0 0 -8 0" />
                                              <path d="M6 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2" />
                                            </svg>
                                        </span>
                                        <span class="nav-link-title">Quản lý giáo viên</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{route('index.ds-hoc-sinh')}}">
                                        <span class="nav-link-icon d-md-none d-lg-inline-block">
                                            <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-school"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M22 9l-10 -4l-10 4l10 4l10 -4v6" /><path d="M6 10.6v5.4a6 3 0 0 0 12 0v-5.4" /></svg>
                                        </span>
                                        <span class="nav-link-title">Quản lý học sinh</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{route('index.ds-bo-mon')}}">
                                        <span class="nav-link-icon d-md-none d-lg-inline-block">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-book-2">
                                              <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                              <path d="M19 4v16h-12a2 2 0 0 1 -2 -2v-12a2 2 0 0 1 2 -2h12z" />
                                              <path d="M19 16h-12a2 2 0 0 0 -2 2" />
                                              <path d="M9 8h6" />
                                            </svg>
                                        </span>
                                        <span class="nav-link-title">Quản lý bộ môn</span>
                                    </a>
                                </li>
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#navbar-help" data-bs-toggle="dropdown" data-bs-auto-close="outside" role="button" aria-expanded="false">
                                        <span class="nav-link-icon d-md-none d-lg-inline-block">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-buildings">
                                              <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                              <path d="M4 21v-15c0 -1 1 -2 2 -2h5c1 0 2 1 2 2v15" />
                                              <path d="M16 8h2c1 0 2 1 2 2v11" />
                                              <path d="M3 21h18" />
                                              <path d="M10 12v0" />
                                              <path d="M10 16v0" />
                                              <path d="M10 8v0" />
                                              <path d="M7 12v0" />
                                              <path d="M7 16v0" />
                                              <path d="M7 8v0" />
                                              <path d="M17 12v0" />
                                              <path d="M17 16v0" />
                                            </svg>
                                        </span>
                                        <span class="nav-link-title">
                                          Quản lý khối
                                        </span>
                                    </a>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="{{route('index.ds-khoi-10')}}">
                                            Khối 10
                                        </a>
                                        <a class="dropdown-item" href="{{route('index.ds-khoi-11')}}">
                                            Khối 11
                                        </a>
                                        <a class="dropdown-item" href="{{route('index.ds-khoi-12')}}">
                                            Khối 12
                                        </a>
                                    </div>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{route('index.ds-de-xuat')}}">
                                        <span class="nav-link-icon d-md-none d-lg-inline-block">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-book-2">
                                              <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                              <path d="M19 4v16h-12a2 2 0 0 1 -2 -2v-12a2 2 0 0 1 2 -2h12z" />
                                              <path d="M19 16h-12a2 2 0 0 0 -2 2" />
                                              <path d="M9 8h6" />
                                            </svg>
                                        </span>
                                        <span class="nav-link-title">Quản lý đề xuất</span>
                                    </a>
                                </li>
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#navbar-help" data-bs-toggle="dropdown" data-bs-auto-close="outside" role="button" aria-expanded="false">
                                        <span class="nav-link-icon d-md-none d-lg-inline-block">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-users">
                                              <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                              <path d="M9 7m-4 0a4 4 0 1 0 8 0a4 4 0 1 0 -8 0" />
                                              <path d="M3 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2" />
                                              <path d="M16 3.13a4 4 0 0 1 0 7.75" />
                                              <path d="M21 21v-2a4 4 0 0 0 -3 -3.85" />
                                            </svg>
                                        </span>
                                        <span class="nav-link-title">
                                          Quản lý tài khoản
                                        </span>
                                    </a>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="{{route('index.ds-tk-hs')}}" >
                                            Học sinh
                                        </a>
                                        <a class="dropdown-item" href="{{route('index.ds-tk-gv')}}">
                                            Giáo viên
                                        </a>
                                        <a class="dropdown-item" href="{{route('index.ds-tk-ql')}}" >
                                            Người quản lý
                                        </a>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <div class="page-wrapper">
        @yield('contents')
    </div>
</div>


<!-- Libs JS -->
<script src="https://cdn.datatables.net/2.1.7/js/dataTables.js"></script>
<script src="{{asset('dist/libs/apexcharts/dist/apexcharts.min.js?1692870487')}}" defer></script>
<script src="{{asset('dist/libs/jsvectormap/dist/js/jsvectormap.min.js?1692870487')}}" defer></script>
<script src="{{asset('dist/libs/jsvectormap/dist/maps/world.js?1692870487')}}" defer></script>
<script src="{{asset('dist/libs/jsvectormap/dist/maps/world-merc.js?1692870487')}}" defer></script>

<script src="{{asset('dist/js/tabler.min.js?1692870487')}}" defer></script>
<script src="{{asset('dist/js/demo.min.js?1692870487')}}" defer></script>
<script src="{{asset('dist/js/toastr.min.js')}}"></script>
<script>
    // @formatter:off
    document.addEventListener("DOMContentLoaded", function () {
        window.ApexCharts && (new ApexCharts(document.getElementById('chart-revenue-bg'), {
            chart: {
                type: "area",
                fontFamily: 'inherit',
                height: 40.0,
                sparkline: {
                    enabled: true
                },
                animations: {
                    enabled: false
                },
            },
            dataLabels: {
                enabled: false,
            },
            fill: {
                opacity: .16,
                type: 'solid'
            },
            stroke: {
                width: 2,
                lineCap: "round",
                curve: "smooth",
            },
            series: [{
                name: "Profits",
                data: [37, 35, 44, 28, 36, 24, 65, 31, 37, 39, 62, 51, 35, 41, 35, 27, 93, 53, 61, 27, 54, 43, 19, 46, 39, 62, 51, 35, 41, 67]
            }],
            tooltip: {
                theme: 'dark'
            },
            grid: {
                strokeDashArray: 4,
            },
            xaxis: {
                labels: {
                    padding: 0,
                },
                tooltip: {
                    enabled: false
                },
                axisBorder: {
                    show: false,
                },
                type: 'datetime',
            },
            yaxis: {
                labels: {
                    padding: 4
                },
            },
            labels: [
                '2020-06-20', '2020-06-21', '2020-06-22', '2020-06-23', '2020-06-24', '2020-06-25', '2020-06-26', '2020-06-27', '2020-06-28', '2020-06-29', '2020-06-30', '2020-07-01', '2020-07-02', '2020-07-03', '2020-07-04', '2020-07-05', '2020-07-06', '2020-07-07', '2020-07-08', '2020-07-09', '2020-07-10', '2020-07-11', '2020-07-12', '2020-07-13', '2020-07-14', '2020-07-15', '2020-07-16', '2020-07-17', '2020-07-18', '2020-07-19'
            ],
            colors: [tabler.getColor("primary")],
            legend: {
                show: false,
            },
        })).render();
    });
    // @formatter:on
</script>
<script>
    // @formatter:off
    document.addEventListener("DOMContentLoaded", function () {
        window.ApexCharts && (new ApexCharts(document.getElementById('chart-new-clients'), {
            chart: {
                type: "line",
                fontFamily: 'inherit',
                height: 40.0,
                sparkline: {
                    enabled: true
                },
                animations: {
                    enabled: false
                },
            },
            fill: {
                opacity: 1,
            },
            stroke: {
                width: [2, 1],
                dashArray: [0, 3],
                lineCap: "round",
                curve: "smooth",
            },
            series: [{
                name: "May",
                data: [37, 35, 44, 28, 36, 24, 65, 31, 37, 39, 62, 51, 35, 41, 35, 27, 93, 53, 61, 27, 54, 43, 4, 46, 39, 62, 51, 35, 41, 67]
            },{
                name: "April",
                data: [93, 54, 51, 24, 35, 35, 31, 67, 19, 43, 28, 36, 62, 61, 27, 39, 35, 41, 27, 35, 51, 46, 62, 37, 44, 53, 41, 65, 39, 37]
            }],
            tooltip: {
                theme: 'dark'
            },
            grid: {
                strokeDashArray: 4,
            },
            xaxis: {
                labels: {
                    padding: 0,
                },
                tooltip: {
                    enabled: false
                },
                type: 'datetime',
            },
            yaxis: {
                labels: {
                    padding: 4
                },
            },
            labels: [
                '2020-06-20', '2020-06-21', '2020-06-22', '2020-06-23', '2020-06-24', '2020-06-25', '2020-06-26', '2020-06-27', '2020-06-28', '2020-06-29', '2020-06-30', '2020-07-01', '2020-07-02', '2020-07-03', '2020-07-04', '2020-07-05', '2020-07-06', '2020-07-07', '2020-07-08', '2020-07-09', '2020-07-10', '2020-07-11', '2020-07-12', '2020-07-13', '2020-07-14', '2020-07-15', '2020-07-16', '2020-07-17', '2020-07-18', '2020-07-19'
            ],
            colors: [tabler.getColor("primary"), tabler.getColor("gray-600")],
            legend: {
                show: false,
            },
        })).render();
    });
    // @formatter:on
</script>
<script>
    // @formatter:off
    document.addEventListener("DOMContentLoaded", function () {
        window.ApexCharts && (new ApexCharts(document.getElementById('chart-active-users'), {
            chart: {
                type: "bar",
                fontFamily: 'inherit',
                height: 40.0,
                sparkline: {
                    enabled: true
                },
                animations: {
                    enabled: false
                },
            },
            plotOptions: {
                bar: {
                    columnWidth: '50%',
                }
            },
            dataLabels: {
                enabled: false,
            },
            fill: {
                opacity: 1,
            },
            series: [{
                name: "Profits",
                data: [37, 35, 44, 28, 36, 24, 65, 31, 37, 39, 62, 51, 35, 41, 35, 27, 93, 53, 61, 27, 54, 43, 19, 46, 39, 62, 51, 35, 41, 67]
            }],
            tooltip: {
                theme: 'dark'
            },
            grid: {
                strokeDashArray: 4,
            },
            xaxis: {
                labels: {
                    padding: 0,
                },
                tooltip: {
                    enabled: false
                },
                axisBorder: {
                    show: false,
                },
                type: 'datetime',
            },
            yaxis: {
                labels: {
                    padding: 4
                },
            },
            labels: [
                '2020-06-20', '2020-06-21', '2020-06-22', '2020-06-23', '2020-06-24', '2020-06-25', '2020-06-26', '2020-06-27', '2020-06-28', '2020-06-29', '2020-06-30', '2020-07-01', '2020-07-02', '2020-07-03', '2020-07-04', '2020-07-05', '2020-07-06', '2020-07-07', '2020-07-08', '2020-07-09', '2020-07-10', '2020-07-11', '2020-07-12', '2020-07-13', '2020-07-14', '2020-07-15', '2020-07-16', '2020-07-17', '2020-07-18', '2020-07-19'
            ],
            colors: [tabler.getColor("primary")],
            legend: {
                show: false,
            },
        })).render();
    });
    // @formatter:on
</script>
<script>
    // @formatter:off
    document.addEventListener("DOMContentLoaded", function () {
        window.ApexCharts && (new ApexCharts(document.getElementById('chart-mentions'), {
            chart: {
                type: "bar",
                fontFamily: 'inherit',
                height: 240,
                parentHeightOffset: 0,
                toolbar: {
                    show: false,
                },
                animations: {
                    enabled: false
                },
                stacked: true,
            },
            plotOptions: {
                bar: {
                    columnWidth: '50%',
                }
            },
            dataLabels: {
                enabled: false,
            },
            fill: {
                opacity: 1,
            },
            series: [{
                name: "Web",
                data: [1, 0, 0, 0, 0, 1, 1, 0, 0, 0, 2, 12, 5, 8, 22, 6, 8, 6, 4, 1, 8, 24, 29, 51, 40, 47, 23, 26, 50, 26, 41, 22, 46, 47, 81, 46, 6]
            },{
                name: "Social",
                data: [2, 5, 4, 3, 3, 1, 4, 7, 5, 1, 2, 5, 3, 2, 6, 7, 7, 1, 5, 5, 2, 12, 4, 6, 18, 3, 5, 2, 13, 15, 20, 47, 18, 15, 11, 10, 0]
            },{
                name: "Other",
                data: [2, 9, 1, 7, 8, 3, 6, 5, 5, 4, 6, 4, 1, 9, 3, 6, 7, 5, 2, 8, 4, 9, 1, 2, 6, 7, 5, 1, 8, 3, 2, 3, 4, 9, 7, 1, 6]
            }],
            tooltip: {
                theme: 'dark'
            },
            grid: {
                padding: {
                    top: -20,
                    right: 0,
                    left: -4,
                    bottom: -4
                },
                strokeDashArray: 4,
                xaxis: {
                    lines: {
                        show: true
                    }
                },
            },
            xaxis: {
                labels: {
                    padding: 0,
                },
                tooltip: {
                    enabled: false
                },
                axisBorder: {
                    show: false,
                },
                type: 'datetime',
            },
            yaxis: {
                labels: {
                    padding: 4
                },
            },
            labels: [
                '2020-06-20', '2020-06-21', '2020-06-22', '2020-06-23', '2020-06-24', '2020-06-25', '2020-06-26', '2020-06-27', '2020-06-28', '2020-06-29', '2020-06-30', '2020-07-01', '2020-07-02', '2020-07-03', '2020-07-04', '2020-07-05', '2020-07-06', '2020-07-07', '2020-07-08', '2020-07-09', '2020-07-10', '2020-07-11', '2020-07-12', '2020-07-13', '2020-07-14', '2020-07-15', '2020-07-16', '2020-07-17', '2020-07-18', '2020-07-19', '2020-07-20', '2020-07-21', '2020-07-22', '2020-07-23', '2020-07-24', '2020-07-25', '2020-07-26'
            ],
            colors: [tabler.getColor("primary"), tabler.getColor("primary", 0.8), tabler.getColor("green", 0.8)],
            legend: {
                show: false,
            },
        })).render();
    });
    // @formatter:on
</script>
<script>
    // @formatter:on
    document.addEventListener("DOMContentLoaded", function () {
        const map = new jsVectorMap({
            selector: '#map-world',
            map: 'world',
            backgroundColor: 'transparent',
            regionStyle: {
                initial: {
                    fill: tabler.getColor('body-bg'),
                    stroke: tabler.getColor('border-color'),
                    strokeWidth: 2,
                }
            },
            zoomOnScroll: false,
            zoomButtons: false,
            // -------- Series --------
            visualizeData: {
                scale: [tabler.getColor('bg-surface'), tabler.getColor('primary')],
                values: {
                    "AF": 16,
                    "AL": 11,
                    "DZ": 158,
                    "AO": 85,
                    "AG": 1,
                    "AR": 351,
                    "AM": 8,
                    "AU": 1219,
                    "AT": 366,
                    "AZ": 52,
                    "BS": 7,
                    "BH": 21,
                    "BD": 105,
                    "BB": 3,
                    "BY": 52,
                    "BE": 461,
                    "BZ": 1,
                    "BJ": 6,
                    "BT": 1,
                    "BO": 19,
                    "BA": 16,
                    "BW": 12,
                    "BR": 2023,
                    "BN": 11,
                    "BG": 44,
                    "BF": 8,
                    "BI": 1,
                    "KH": 11,
                    "CM": 21,
                    "CA": 1563,
                    "CV": 1,
                    "CF": 2,
                    "TD": 7,
                    "CL": 199,
                    "CN": 5745,
                    "CO": 283,
                    "KM": 0,
                    "CD": 12,
                    "CG": 11,
                    "CR": 35,
                    "CI": 22,
                    "HR": 59,
                    "CY": 22,
                    "CZ": 195,
                    "DK": 304,
                    "DJ": 1,
                    "DM": 0,
                    "DO": 50,
                    "EC": 61,
                    "EG": 216,
                    "SV": 21,
                    "GQ": 14,
                    "ER": 2,
                    "EE": 19,
                    "ET": 30,
                    "FJ": 3,
                    "FI": 231,
                    "FR": 2555,
                    "GA": 12,
                    "GM": 1,
                    "GE": 11,
                    "DE": 3305,
                    "GH": 18,
                    "GR": 305,
                    "GD": 0,
                    "GT": 40,
                    "GN": 4,
                    "GW": 0,
                    "GY": 2,
                    "HT": 6,
                    "HN": 15,
                    "HK": 226,
                    "HU": 132,
                    "IS": 12,
                    "IN": 1430,
                    "ID": 695,
                    "IR": 337,
                    "IQ": 84,
                    "IE": 204,
                    "IL": 201,
                    "IT": 2036,
                    "JM": 13,
                    "JP": 5390,
                    "JO": 27,
                    "KZ": 129,
                    "KE": 32,
                    "KI": 0,
                    "KR": 986,
                    "KW": 117,
                    "KG": 4,
                    "LA": 6,
                    "LV": 23,
                    "LB": 39,
                    "LS": 1,
                    "LR": 0,
                    "LY": 77,
                    "LT": 35,
                    "LU": 52,
                    "MK": 9,
                    "MG": 8,
                    "MW": 5,
                    "MY": 218,
                    "MV": 1,
                    "ML": 9,
                    "MT": 7,
                    "MR": 3,
                    "MU": 9,
                    "MX": 1004,
                    "MD": 5,
                    "MN": 5,
                    "ME": 3,
                    "MA": 91,
                    "MZ": 10,
                    "MM": 35,
                    "NA": 11,
                    "NP": 15,
                    "NL": 770,
                    "NZ": 138,
                    "NI": 6,
                    "NE": 5,
                    "NG": 206,
                    "NO": 413,
                    "OM": 53,
                    "PK": 174,
                    "PA": 27,
                    "PG": 8,
                    "PY": 17,
                    "PE": 153,
                    "PH": 189,
                    "PL": 438,
                    "PT": 223,
                    "QA": 126,
                    "RO": 158,
                    "RU": 1476,
                    "RW": 5,
                    "WS": 0,
                    "ST": 0,
                    "SA": 434,
                    "SN": 12,
                    "RS": 38,
                    "SC": 0,
                    "SL": 1,
                    "SG": 217,
                    "SK": 86,
                    "SI": 46,
                    "SB": 0,
                    "ZA": 354,
                    "ES": 1374,
                    "LK": 48,
                    "KN": 0,
                    "LC": 1,
                    "VC": 0,
                    "SD": 65,
                    "SR": 3,
                    "SZ": 3,
                    "SE": 444,
                    "CH": 522,
                    "SY": 59,
                    "TW": 426,
                    "TJ": 5,
                    "TZ": 22,
                    "TH": 312,
                    "TL": 0,
                    "TG": 3,
                    "TO": 0,
                    "TT": 21,
                    "TN": 43,
                    "TR": 729,
                    "TM": 0,
                    "UG": 17,
                    "UA": 136,
                    "AE": 239,
                    "GB": 2258,
                    "US": 4624,
                    "UY": 40,
                    "UZ": 37,
                    "VU": 0,
                    "VE": 285,
                    "VN": 101,
                    "YE": 30,
                    "ZM": 15,
                    "ZW": 5
                },
            },
        });
        window.addEventListener("resize", () => {
            map.updateSize();
        });
    });
    // @formatter:off
</script>
<script>
    // @formatter:off
    document.addEventListener("DOMContentLoaded", function () {
        window.ApexCharts && (new ApexCharts(document.getElementById('sparkline-activity'), {
            chart: {
                type: "radialBar",
                fontFamily: 'inherit',
                height: 40,
                width: 40,
                animations: {
                    enabled: false
                },
                sparkline: {
                    enabled: true
                },
            },
            tooltip: {
                enabled: false,
            },
            plotOptions: {
                radialBar: {
                    hollow: {
                        margin: 0,
                        size: '75%'
                    },
                    track: {
                        margin: 0
                    },
                    dataLabels: {
                        show: false
                    }
                }
            },
            colors: [tabler.getColor("blue")],
            series: [35],
        })).render();
    });
    // @formatter:on
</script>
<script>
    // @formatter:off
    document.addEventListener("DOMContentLoaded", function () {
        window.ApexCharts && (new ApexCharts(document.getElementById('chart-development-activity'), {
            chart: {
                type: "area",
                fontFamily: 'inherit',
                height: 192,
                sparkline: {
                    enabled: true
                },
                animations: {
                    enabled: false
                },
            },
            dataLabels: {
                enabled: false,
            },
            fill: {
                opacity: .16,
                type: 'solid'
            },
            stroke: {
                width: 2,
                lineCap: "round",
                curve: "smooth",
            },
            series: [{
                name: "Purchases",
                data: [3, 5, 4, 6, 7, 5, 6, 8, 24, 7, 12, 5, 6, 3, 8, 4, 14, 30, 17, 19, 15, 14, 25, 32, 40, 55, 60, 48, 52, 70]
            }],
            tooltip: {
                theme: 'dark'
            },
            grid: {
                strokeDashArray: 4,
            },
            xaxis: {
                labels: {
                    padding: 0,
                },
                tooltip: {
                    enabled: false
                },
                axisBorder: {
                    show: false,
                },
                type: 'datetime',
            },
            yaxis: {
                labels: {
                    padding: 4
                },
            },
            labels: [
                '2020-06-20', '2020-06-21', '2020-06-22', '2020-06-23', '2020-06-24', '2020-06-25', '2020-06-26', '2020-06-27', '2020-06-28', '2020-06-29', '2020-06-30', '2020-07-01', '2020-07-02', '2020-07-03', '2020-07-04', '2020-07-05', '2020-07-06', '2020-07-07', '2020-07-08', '2020-07-09', '2020-07-10', '2020-07-11', '2020-07-12', '2020-07-13', '2020-07-14', '2020-07-15', '2020-07-16', '2020-07-17', '2020-07-18', '2020-07-19'
            ],
            colors: [tabler.getColor("primary")],
            legend: {
                show: false,
            },
            point: {
                show: false
            },
        })).render();
    });
    // @formatter:on
</script>
<script>
    // @formatter:off
    document.addEventListener("DOMContentLoaded", function () {
        window.ApexCharts && (new ApexCharts(document.getElementById('sparkline-bounce-rate-1'), {
            chart: {
                type: "line",
                fontFamily: 'inherit',
                height: 24,
                animations: {
                    enabled: false
                },
                sparkline: {
                    enabled: true
                },
            },
            tooltip: {
                enabled: false,
            },
            stroke: {
                width: 2,
                lineCap: "round",
            },
            series: [{
                color: tabler.getColor("primary"),
                data: [17, 24, 20, 10, 5, 1, 4, 18, 13]
            }],
        })).render();
    });
    // @formatter:on
</script>
<script>
    // @formatter:off
    document.addEventListener("DOMContentLoaded", function () {
        window.ApexCharts && (new ApexCharts(document.getElementById('sparkline-bounce-rate-2'), {
            chart: {
                type: "line",
                fontFamily: 'inherit',
                height: 24,
                animations: {
                    enabled: false
                },
                sparkline: {
                    enabled: true
                },
            },
            tooltip: {
                enabled: false,
            },
            stroke: {
                width: 2,
                lineCap: "round",
            },
            series: [{
                color: tabler.getColor("primary"),
                data: [13, 11, 19, 22, 12, 7, 14, 3, 21]
            }],
        })).render();
    });
    // @formatter:on
</script>
<script>
    // @formatter:off
    document.addEventListener("DOMContentLoaded", function () {
        window.ApexCharts && (new ApexCharts(document.getElementById('sparkline-bounce-rate-3'), {
            chart: {
                type: "line",
                fontFamily: 'inherit',
                height: 24,
                animations: {
                    enabled: false
                },
                sparkline: {
                    enabled: true
                },
            },
            tooltip: {
                enabled: false,
            },
            stroke: {
                width: 2,
                lineCap: "round",
            },
            series: [{
                color: tabler.getColor("primary"),
                data: [10, 13, 10, 4, 17, 3, 23, 22, 19]
            }],
        })).render();
    });
    // @formatter:on
</script>
<script>
    // @formatter:off
    document.addEventListener("DOMContentLoaded", function () {
        window.ApexCharts && (new ApexCharts(document.getElementById('sparkline-bounce-rate-4'), {
            chart: {
                type: "line",
                fontFamily: 'inherit',
                height: 24,
                animations: {
                    enabled: false
                },
                sparkline: {
                    enabled: true
                },
            },
            tooltip: {
                enabled: false,
            },
            stroke: {
                width: 2,
                lineCap: "round",
            },
            series: [{
                color: tabler.getColor("primary"),
                data: [6, 15, 13, 13, 5, 7, 17, 20, 19]
            }],
        })).render();
    });
    // @formatter:on
</script>
<script>
    // @formatter:off
    document.addEventListener("DOMContentLoaded", function () {
        window.ApexCharts && (new ApexCharts(document.getElementById('sparkline-bounce-rate-5'), {
            chart: {
                type: "line",
                fontFamily: 'inherit',
                height: 24,
                animations: {
                    enabled: false
                },
                sparkline: {
                    enabled: true
                },
            },
            tooltip: {
                enabled: false,
            },
            stroke: {
                width: 2,
                lineCap: "round",
            },
            series: [{
                color: tabler.getColor("primary"),
                data: [2, 11, 15, 14, 21, 20, 8, 23, 18, 14]
            }],
        })).render();
    });
    // @formatter:on
</script>
<script>
    // @formatter:off
    document.addEventListener("DOMContentLoaded", function () {
        window.ApexCharts && (new ApexCharts(document.getElementById('sparkline-bounce-rate-6'), {
            chart: {
                type: "line",
                fontFamily: 'inherit',
                height: 24,
                animations: {
                    enabled: false
                },
                sparkline: {
                    enabled: true
                },
            },
            tooltip: {
                enabled: false,
            },
            stroke: {
                width: 2,
                lineCap: "round",
            },
            series: [{
                color: tabler.getColor("primary"),
                data: [22, 12, 7, 14, 3, 21, 8, 23, 18, 14]
            }],
        })).render();
    });
    // @formatter:on
</script>
@yield('scripts')
</body>
</html>
