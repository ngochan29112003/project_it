@extends('master')
@section('contents')

    <body>
    <style>
        .text-truncate {
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
            display: block;
        }

        .border-bottom {
            border-bottom: 1px solid #dee2e6; /* Đường gạch ngang màu nhạt */
        }

        .pb-2 {
            padding-bottom: 0.5rem; /* Khoảng cách dưới văn bản */
        }

        .mb-2 {
            margin-bottom: 0.5rem; /* Khoảng cách giữa các mục */
        }

    </style>

    <div class="container-fluid">
        <!-- Header Section -->
        <header id="page-header" class="row py-4">
            <div class="col-12">
                <div class="card shadow-sm border-0">
                    <div class="card-body d-flex align-items-center">
                        <div class="d-flex align-items-center me-auto">
                            <div class="page-header-image">
                                <a href="#">
                                    <img src="{{ asset('assets/img_user/' . ($nguoidung->hinh_anh)) }}" alt="Profile"
                                         class="rounded-circle border" style="width: 100px; height: 100px; object-fit: cover;">
                                </a>
                            </div>
                            <div class="ms-3">
                                <h1 class="h5 fw-bold mb-1">{{ $nguoidung->ten_nguoi_dung }}</h1>
                                <p class="text-muted mb-0">{{ $nguoidung->ten_quyen }} - Khoa Công Nghệ Thông Tin</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
    </div>

    <div class="col-12 mb-4">
        <div class="card shadow-sm border-0">
            <div class="card-body">
                <h5 class="text-primary fw-bold border-bottom pb-2 mb-3">Các khóa học truy cập gần đây</h5>
                <div class="row row-cols-1 row-cols-md-2">
                    <div class="col">
                        <div class="d-flex align-items-center border-bottom pb-2 mb-2">
                        <span class="text-truncate w-100">
                            <a href="#" class="text-decoration-none text-dark d-block p-2 bg-light-hover">241_1TH1314_(BT)_KS2A_04_tructiep (27 sv) TH1314_(BT) - Lập trình mạng (2.1)</a>
                        </span>
                        </div>
                    </div>
                    <div class="col">
                        <div class="d-flex align-items-center border-bottom pb-2 mb-2">
                        <span class="text-truncate w-100">
                            <a href="#" class="text-decoration-none text-dark d-block p-2 bg-light-hover">241_1TH1314_KS2A_02_tructiep (63 sv) TH1314 - Lập trình mạng (2.1)</a>
                        </span>
                        </div>
                    </div>
                    <div class="col">
                        <div class="d-flex align-items-center border-bottom pb-2 mb-2">
                        <span class="text-truncate w-100">
                            <a href="#" class="text-decoration-none text-dark d-block p-2 bg-light-hover">241_1TH1606_KS2A (42 sv) TH1606 - Thương mại điện tử (2.1)</a>
                        </span>
                        </div>
                    </div>
                    <div class="col">
                        <div class="d-flex align-items-center border-bottom pb-2 mb-2">
                        <span class="text-truncate w-100">
                            <a href="#" class="text-decoration-none text-dark d-block p-2 bg-light-hover">211_1TH1203_02 (59 sv) TH1203 - Toán rời rạc (2.0) GV: Lê Hoàng An</a>
                        </span>
                        </div>
                    </div>
                    <div class="col">
                        <div class="d-flex align-items-center border-bottom pb-2 mb-2">
                        <span class="text-truncate w-100">
                            <a href="#" class="text-decoration-none text-dark d-block p-2 bg-light-hover">241_1TH1370_KS2A_02_tructiep (52 sv) TH1370 - Triển khai hệ thống mạng</a>
                        </span>
                        </div>
                    </div>
                    <div class="col">
                        <div class="d-flex align-items-center border-bottom pb-2 mb-2">
                        <span class="text-truncate w-100">
                            <a href="#" class="text-decoration-none text-dark d-block p-2 bg-light-hover">211_1TH1201_02 (59 sv) TH1201 - Tin học cơ sở (2.0) GV: Trần Thu Mai</a>
                        </span>
                        </div>
                    </div>
                </div>
            </div>



            <div class="col-12 mb-4">
                <div class="card shadow-sm border-0">
                    <div class="card-body">
                        <h5 class="text-primary fw-bold border-bottom pb-2 mb-3">Các học phần đã đăng ký</h5>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item d-flex justify-content-between align-items-start">
                                <div class="ms-2 me-auto">
                                    <div class="fw-bold">241_1TH1314_KS2A_04 - Lập trình mạng</div>
                                    <small>GV: Trần Quốc Thịnh</small>
                                </div>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-start">
                                <div class="ms-2 me-auto">
                                    <div class="fw-bold">241_1TH1314_KS2A_02 - Lập trình mạng</div>
                                    <small>GV: Nguyễn Thị Hồng Yến</small>
                                </div>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-start">
                                <div class="ms-2 me-auto">
                                    <div class="fw-bold">241_1TH1606_KS2A - Thương mại điện tử</div>
                                    <small>GV: Trần Thu Mai</small>
                                </div>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-start">
                                <div class="ms-2 me-auto">
                                    <div class="fw-bold">211_1TH1203_02 - Toán rời rạc</div>
                                    <small>GV: Lê Hoàng An</small>
                                </div>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-start">
                                <div class="ms-2 me-auto">
                                    <div class="fw-bold">241_1TH1370_KS2A_02 - Triển khai hệ thống mạng</div>
                                    <small>GV: Trần Thái Bảo</small>
                                </div>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-start">
                                <div class="ms-2 me-auto">
                                    <div class="fw-bold">211_1TH1201_02 - Tin học cơ sở</div>
                                    <small>GV: Trần Thu Mai</small>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </body>
@endsection
