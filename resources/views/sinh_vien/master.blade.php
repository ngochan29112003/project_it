<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>LMS - Vlute</title>
    <link rel="shortcut icon" href="{{asset('assets/img/icon.png')}}">
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
    <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/quill/quill.snow.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/quill/quill.bubble.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/remixicon/remixicon.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/simple-datatables/style.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">

    <style>
        #sidebar {
            width: 250px;
            transition: width 0.3s;
        }

        #main {
            flex-grow: 1;
            transition: margin-left 0.3s;
        }


        .sidebar.active + #main {
            margin-left: 0;
        }
    </style>

</head>

<body>

<header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
        <a href="{{route('trang-chu-sinh-vien')}}" class="logo d-flex align-items-center">
            <img src="{{asset('assets/img/icon.png')}}" alt="">
            <span class="d-none d-lg-block" style="color:#0f77a2">LMS Vlute</span>
        </a>
        <i class="bi bi-list toggle-sidebar-btn"></i>
    </div>

    <div class="search-bar">
        <form class="search-form d-flex align-items-center" method="POST" action="#">
            <input type="text" name="query" placeholder="Bạn tìm lớp học phần nào?" title="Enter search keyword">
            <button type="submit" title="Search"><i class="bi bi-search"></i></button>
        </form>
    </div>

    <nav class="header-nav ms-auto">
        <ul class="d-flex align-items-center">

            <li class="nav-item d-block d-lg-none">
                <a class="nav-link nav-icon search-bar-toggle " href="#">
                    <i class="bi bi-search"></i>
                </a>
            </li>

            <li class="nav-item dropdown pe-3">

                <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
                    <img src="{{asset('assets/img_user/'.$ttSinhVien->hinh_anh)}}" class="rounded-circle" style="height: 100px; object-fit: contain;">

                    <span class="d-none d-md-block dropdown-toggle ps-2">{{$ttSinhVien->ten_nguoi_dung}}</span>
                </a>

                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
                    <li class="dropdown-header">
                        <h6>{{$ttSinhVien->ten_nguoi_dung}}</h6>
                        <span>{{$ttSinhVien->ten_quyen}}</span>
                    </li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>
                    <li>
                        <a class="dropdown-item d-flex align-items-center" href="{{asset('thong-tin-sinh-vien')}}">

                        <a class="dropdown-item d-flex align-items-center" href="{{route('thong-tin-tai-khoan')}}">

                            <i class="bi bi-person"></i>
                            <span>My Profile</span>
                        </a>
                    </li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>

                    <li>
                        <a class="dropdown-item d-flex align-items-center" href="{{route('logout')}}">
                            <i class="bi bi-box-arrow-right"></i>
                            <span>Sign Out</span>
                        </a>
                    </li>

                </ul>
            </li>

        </ul>
    </nav>
</header>

<aside id="sidebar" class="sidebar">
    <ul class="sidebar-nav" id="sidebar-nav">

        <li class="nav-item">
            <a class="nav-link collapsed" href="{{route('trang-chu-sinh-vien')}}">
                <i class="bi bi-house"></i>
                <span>Trang chủ</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link collapsed" href="{{route('dash-board-sinh-vien')}}">
                <i class="bi bi-journal-check"></i>
                <span>Khóa học đã đăng ký</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-journal-text"></i><span>Các lớp học phần của tôi</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="forms-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <li>
                    <a href="forms-elements.html">
                        <i class="bi bi-circle"></i><span>241_1TH1314_KS2A_02_tructiep</span>
                    </a>
                </li>
            </ul>
        </li>
    </ul>

</aside>


<main id="main" class="main">
    @yield('contents')
</main>

<script src="{{ asset('assets/vendor/apexcharts/apexcharts.min.js') }}"></script>
<script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('assets/vendor/chart.js/chart.umd.js') }}"></script>
<script src="{{ asset('assets/vendor/echarts/echarts.min.js') }}"></script>
<script src="{{ asset('assets/vendor/quill/quill.js') }}"></script>
<script src="{{ asset('assets/vendor/simple-datatables/simple-datatables.js') }}"></script>
<script src="{{ asset('assets/vendor/tinymce/tinymce.min.js') }}"></script>
<script src="{{ asset('assets/vendor/php-email-form/validate.js') }}"></script>
<script src="{{ asset('assets/js/main.js') }}"></script>


</body>
<footer id="footer" class="py-4 bg-dark text-white ">
    <div class="footer-main py-4 align-items-center  ">
        <div class="container">
            <div class="row">

                <div class="col-md-3 mb-4">
                    <div class="foot-links">
                        <h5>Thông Tin</h5>
                        <ul class="list-unstyled">
                            <li><a href="#" target="_blank" class="text-white-50">Cổng thông tin</a></li>
                            <li><a href="#" target="_blank" class="text-white-50">Hệ thống quản lý đào tạo</a></li>
                            <li><a href="#" target="_blank" class="text-white-50">Thư viện</a></li>
                            <li><a href="#" target="_blank" class="text-white-50">QL lịch biểu</a></li>
                            <li><a href="#" target="_blank" class="text-white-50">QL đề tài NCKH</a></li>
                        </ul>
                    </div>
                </div>

                <div class="col-md-3 mb-4">
                    <div class="contact-info">
                        <h5>Liên Hệ</h5>
                        <p>73 Nguyễn Huệ, Phường 2, TP. Vĩnh Long, tỉnh Vĩnh Long</p>
                        <p><i class="fas fa-phone-alt me-2"></i>Phone: (+84) 0355700664</p>
                        <p><i class="fas fa-envelope me-2"></i>Email: <a href="mailto:21004091@st.vlute.edu.vn" class="text-white-50">21004091@st.vlute.edu.vn</a></p>
                        <p><i class="fas fa-envelope me-2"></i>Email: <a href="mailto:21004092@st.vlute.edu.vn" class="text-white-50">21004092@st.vlute.edu.vn</a></p>
                    </div>
                </div>

                {{--                        <div class="col-md-3 mb-4">--}}
                {{--                            <div class="social-media">--}}
                {{--                                <h5>Theo Dõi</h5>--}}
                {{--                                <ul class="list-inline">--}}
                {{--                                    <li class="list-inline-item me-2">--}}
                {{--                                        <a href="#" target="_blank" class="text-white-50 fs-4">--}}
                {{--                                            <i class="fab fa-facebook-square"></i>--}}
                {{--                                        </a>--}}
                {{--                                    </li>--}}
                {{--                                    <li class="list-inline-item me-2">--}}
                {{--                                        <a href="#" target="_blank" class="text-white-50 fs-4">--}}
                {{--                                            <i class="fab fa-pinterest-square"></i>--}}
                {{--                                        </a>--}}
                {{--                                    </li>--}}
                {{--                                    <li class="list-inline-item me-2">--}}
                {{--                                        <a href="#" target="_blank" class="text-white-50 fs-4">--}}
                {{--                                            <i class="fab fa-twitter-square"></i>--}}
                {{--                                        </a>--}}
                {{--                                    </li>--}}
                {{--                                    <li class="list-inline-item me-2">--}}
                {{--                                        <a href="#" target="_blank" class="text-white-50 fs-4">--}}
                {{--                                            <i class="fab fa-google-plus-square"></i>--}}
                {{--                                        </a>--}}
                {{--                                    </li>--}}
                {{--                                </ul>--}}
                {{--                            </div>--}}
                {{--                        </div>--}}
            </div>
        </div>
    </div>

    <div class="footer-foot bg-secondary text-center py-3">
        <div class="container">
            <p class="mb-0 text-white-50">© 2019 - Developed by Phan Anh Cang - Powered by <a href="#" class="text-white">VLUTE</a></p>
        </div>
    </div>
</footer>
</html>
