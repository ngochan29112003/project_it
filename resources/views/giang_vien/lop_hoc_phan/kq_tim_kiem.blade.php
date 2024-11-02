@extends('giang_vien.master')

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
                                <li class="breadcrumb-item active" aria-current="page">Kết quả tìm kiếm</li>
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
                                <h2 class="h5 mb-3 pt-xl-4">Kết quả tìm kiếm: {{ $lop_hoc_phan ? count($lop_hoc_phan) : 0 }}</h2>

                                <div class="courses course-search-result">
                                    @if($lop_hoc_phan->isEmpty())
                                        <p>Không tìm thấy khóa học nào.</p>
                                    @else
                                        @foreach($lop_hoc_phan as $lop)
                                            <div class="coursebox card mb-3">
                                                <div class="card-body">
                                                    <h3 class="coursename h6 pt-xl-4">
                                                        <a href="#">
                                                            ({{ $lop->ten_lop_hoc_phan }}) - Lập Trình Mạng (2.1) GV: Nguyễn Thị Hồng Yến
                                                        </a>
                                                    </h3>
                                                    <div class="text-muted mb-2">Học kỳ:
                                                        <a href="#">1</a>
                                                    </div>
                                                    <div class="enrolmenticons mb-3">
                                                        <i class="fas fa-sign-in-alt me-2" title="Tự đăng ký" aria-label="Tự đăng ký"></i>
                                                    </div>
                                                    <a class="btn btn-success" href="{{route('giang-vien-lop-hp')}}">Đăng ký vào lớp học</a>
                                                </div>
                                            </div>
                                        @endforeach
                                    @endif
                                </div>

                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
@endsection
