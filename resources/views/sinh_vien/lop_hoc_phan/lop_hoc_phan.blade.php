@extends('sinh_vien.master')
@section("contents")
    <div class="container-fluid mt-4">
        <div class="d-flex justify-content-between align-items-center mb-4 p-3 border rounded position-relative">
            <div>
                <h3 class="text-danger fw-bold mb-0">211_1TH1201_02 (59 sv) TH1201 - Tin học cơ sở (2.0) - GV: Trần Thu Mai</h3>
                <nav class="breadcrumb p-0 mb-0 pt-xl-4">
                    <a href="{{route('dash-board-sinh-vien')}}" class="breadcrumb-item">Nhà của tôi</a>
                    <a href="#" class="breadcrumb-item">Khóa học</a>
                    <span class="breadcrumb-item active">Học kỳ II</span>
                    <span class="breadcrumb-item active">211_1TH1201_02 (59 sv)</span>
                </nav>
            </div>

            <div class="dropdown position-absolute" style="top: 10px; right: 15px;">
                <button class="btn btn-link text-primary p-0" type="button" id="settingsDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="bi bi-gear"></i>
                </button>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="settingsDropdown">
                    <li><a class="dropdown-item text-danger" href="#">Rút tôi ra khỏi khóa học</a></li>
                </ul>
            </div>
        </div>

        <div class="card mb-4">
            <h5 class="card-header bg-light fw-bold text-primary">Thông báo</h5>
            <div class="card-body">
                <p>Không có thông báo nào vào lúc này.</p>
            </div>
        </div>

        <div class="card mb-4">
            <h5 class="card-header bg-light fw-bold text-primary">Thông tin học phần</h5>
            <div class="card-body bg-light">
                <p>Lớp học phần: <strong>Tin học cơ sở 211, 1TH1201 CTT, 76.150 (59 sv)</strong></p>
                <p>Tên học phần: <strong>Tin học cơ sở</strong></p>
                <p>Mã học phần: <strong>TH1201</strong></p>
                <p>Số tín chỉ: <strong>2TC</strong> (lý thuyết)</p>
            </div>
        </div>

        <div class="card mb-4">
            <h5 class="card-header bg-light fw-bold text-primary">Kế hoạch giảng dạy</h5>
            <div class="card-body">
                <p><strong>Thứ hai (tiết 3 - 4, 08g40 – 10g10)</strong></p>
                <p>Tuần học: <strong>34 - 35 - 36 - 37 - 38 - 39 - 40 - 41</strong></p>
                <p>Ngày học: <strong>7/10, 14/10, 21/10, 28/10</strong></p>
                <p>Link học trực tuyến: <a href="https://meet.google.com/xym-ytor-sbm" target="_blank">meet.google.com/xym-ytor-sbm</a></p>
            </div>
        </div>

        <div class="card mb-4">
            <h5 class="card-header bg-light fw-bold text-primary">Đề cương học phần</h5>
            <div class="card-body">
                <p>Đề cương học phần sẽ được cung cấp trong lớp học.</p>
            </div>
        </div>

        <div class="card mb-4">
            <h5 class="card-header bg-light fw-bold text-primary">Giáo trình - Bài giảng - tài liệu tham khảo</h5>
            <div class="card-body">
                <ul class="list-unstyled">
                    <li><i class="bi bi-file-earmark-pdf text-danger"></i> <a href="#">Giáo trình Tin học cơ sở</a></li>
                </ul>
            </div>
        </div>

        <div class="card mb-4">
            <h5 class="card-header bg-light fw-bold text-primary">Video giảng dạy</h5>
            <div class="card-body">
                <p>Video giảng dạy sẽ được cập nhật tại đây.</p>
            </div>
        </div>

        <div class="card mb-4">
            <h5 class="card-header bg-light fw-bold text-primary">Kiểm tra đánh giá</h5>
            <div class="card-body">
                <p>Các bài kiểm tra và đánh giá sẽ được công bố sau.</p>
            </div>
        </div>
    </div>
@endsection
