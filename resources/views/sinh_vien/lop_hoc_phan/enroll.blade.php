@extends('sinh_vien.master')
@section("contents")
    <div id="page" class="container-fluid">
        <header id="page-header" class="row py-4 bg-light">
            <div class="col-12">
                <div class="card border-0 shadow-sm">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h1 class="text-danger fw-bold mb-3 border-bottom pb-2 pt-xl-4">Hệ thống LMS của VLUTE</h1>
                        </div>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb mb-0">
                                <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
                                <li class="breadcrumb-item"><a href="#">Đăng ký khóa học</a></li>
                                <li class="breadcrumb-item active" aria-current="page">241_1TH1390_(BT)_KS2A_tructiep - IoT (BT)</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </header>

        <div id="page-content" class="row mt-4">
            <div id="region-main-box" class="col-12">
                <section id="region-main">
                    <div class="card border-0 shadow-sm">
                        <div class="card-body">
                            <span class="notifications" id="user-notifications"></span>
                            <div role="main">
                                <h2 class="h5 mb-3 pt-xl-4">Kết quả tìm kiếm: 1</h2>
                                <div class="courses course-search-result">
                                    <div class="coursebox card mb-3">
                                        <div class="card-body">
                                            <h3 class="coursename h6 pt-xl-4">
                                                <a href="#">
                                                    241_1TH1390_(BT)_KS2A_tructiep (11 sv) TH1390_(BT) - Phát triển ứng dụng IoT (BT) (0.0) GV: Lê Thị Mỹ Tiên
                                                </a>
                                            </h3>
                                            <div class="text-muted mb-2">Category:
                                                <a href="#">HỌC KỲ I</a>
                                            </div>
                                            <div class="enrolmenticons mb-3">
                                                <i class="fas fa-sign-in-alt me-2" title="Self enrolment" aria-label="Self enrolment"></i>
                                            </div>
                                            <button class="btn btn-success">Đăng ký vào lớp học</button>
                                        </div>
                                    </div>
                                </div>

                                <div class="text-center py-4">
                                    <form id="coursesearch2" class="d-flex justify-content-center align-items-center" action="#" method="get">
                                        <input type="text" id="coursesearchbox" class="form-control w-50 me-2" name="search" placeholder="Tìm kiếm khóa học...">
                                        <button class="btn btn-danger" type="submit">Tìm kiếm</button>
                                    </form>
                                    <button class="btn btn-link p-0 ms-3" type="button" data-bs-toggle="popover" data-bs-content="<div class='no-overflow'><p>You can search for multiple words at once and refine your search:</p><ul><li><strong>word</strong> - find any match.</li><li><strong>+word</strong> - exact match only.</li><li><strong>-word</strong> - exclude results containing this word.</li></ul></div>" data-bs-html="true">
                                        <i class="fas fa-question-circle text-info"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
@endsection
