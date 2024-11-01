@extends('sinh_vien.master')
@section('contents')
    <style>

    </style>
    <body>
    <div class="container-fluid">
        <header id="page-header" class="row">
            <div class="col-12 pt-4 pb-4">
                <div class="card shadow-sm border-0">
                    <div class="card-body">
                        <div class="d-flex align-items-center mb-3">
                            <div class="me-auto d-flex align-items-center">
                                <div class="page-header-image pt-xl-4">
                                    <a href="#">
                                        <img src="{{asset('/assets/img/user.jpg')}}" alt="Hình của Lê Thị Ngọc Hân"
                                             title="Hình của {{$ttSinhVien->ten_nguoi_dung}}" class="rounded-circle border" width="120" height="120"> <!-- Tăng kích thước ảnh -->
                                    </a>
                                </div>
                                <div class="page-header-headings ms-3">
                                    <h1 class="h3 fw-bold mb-0">{{$ttSinhVien->ten_nguoi_dung}}</h1>
                                    <p class="text-muted">Sinh viên khoa Công nghệ thông tin</p>
                                </div>
                            </div>
                        </div>
{{--                        <div class="d-flex flex-wrap justify-content-end">--}}
{{--                            <button type="button" class="btn btn-secondary btn-lg">--}}
{{--                                Tùy chỉnh trang này--}}
{{--                            </button>--}}
{{--                        </div>--}}
                    </div>
                </div>
            </div>
        </header>


        <div class="container mt-4">
            <div class="row">
                <div class="col-lg-8 mb-4">
                    <div class="card shadow-sm border-0">
                        <div class="card-body">
                            <h5 class="text-danger fw-bold mb-3 border-bottom pb-2" style="padding-top: 15px">Các khóa học truy cập gần đây</h5>
                            <div class="row">
                                <div class="col-sm-6">
                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item">
                                            <a href="#" class="text-decoration-none text-dark">CB03K31_UDCNTTCB_Nguyễn Ngọc Hoàng Quyên</a>
                                        </li>
                                        <li class="list-group-item">
                                            <a href="#" class="text-decoration-none text-dark">241_1TH1341_KS2A_01_tructiep - An toàn và an ninh thông tin</a>
                                        </li>
                                        <li class="list-group-item">
                                            <a href="#" class="text-decoration-none text-dark">241_1TH1606_KS2A_tructiep - Thương mại điện tử</a>
                                        </li>
                                        <li class="list-group-item">
                                            <a href="#" class="text-decoration-none text-dark">234_1TH1601_KS3A_ngoaigio - Thực tập tốt nghiệp</a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="col-sm-6">
                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item">
                                            <a href="#" class="text-decoration-none text-dark">241_1TH1370_KS2A_02_tructiep - Triển khai hệ thống mạng</a>
                                        </li>
                                        <li class="list-group-item">
                                            <a href="#" class="text-decoration-none text-dark">241_1TH1314_KS2A_04_tructiep - Lập trình mạng</a>
                                        </li>
                                        <li class="list-group-item">
                                            <a href="#" class="text-decoration-none text-dark">241_1TH1314_KS2A_04_ngoaigio - Đồ án 2</a>
                                        </li>
                                        <li class="list-group-item">
                                            <a href="#" class="text-decoration-none text-dark">241_1TH1314_KS2A_04_tructiep - Lập trình web</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="col-lg-4">
                    <div class="card mb-4 shadow-sm border-0">
                        <div class="card-body">
                            <h5 class="text-danger fw-bold mb-3 border-bottom pb-2 " style="padding-top: 15px">Tệp riêng tư của tôi</h5>
                            <p class="text-muted mb-2">Không có tệp</p>
                            <a href="#" class="btn btn-link text-decoration-none">Quản lý tệp riêng tư...</a>
                        </div>
                    </div>

                    <div class="card shadow-sm border-0">
                        <div class="card-body">
                            <h5 class="text-danger fw-bold mb-3 border-bottom pb-2" style="padding-top: 15px" >Thành viên trực tuyến</h5>
                            <div class="online-user-list">
                                <a href="#" class="d-flex align-items-center text-decoration-none mb-2">
                                    <span class="bi bi-toggle-on text-success me-2"></span>
                                    <span class="text-dark">Lê Thị Ngọc Hân</span>
                                </a>
                                <a href="#" class="d-flex align-items-center text-decoration-none mb-2">
                                    <span class="bi bi-toggle-on text-success me-2"></span>
                                    <span class="text-dark">Mã Huyền Trân</span>
                                </a>
                                <a href="#" class="d-flex align-items-center text-decoration-none">
                                    <span class="bi bi-toggle-off text-danger me-2"></span>
                                    <span class="text-dark">Huỳnh Tuấn Anh</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    </body>
@endsection
