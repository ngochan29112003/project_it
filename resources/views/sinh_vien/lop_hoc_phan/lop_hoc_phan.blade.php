@extends('sinh_vien.master')
@section("contents")
    <div class="container mt-4">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h3 class="text-danger fw-bold mb-0">241_1TH1314_KS2A_04_tructiep-Lập Trình Mạng (2.1) GV: Nguyễn Thị Hồng Yến</h3>
            <div class="dropdown">
                <button class="btn btn-link text-dark p-0" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="bi bi-three-dots-vertical"></i>
                </button>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <li><a class="dropdown-item" href="#">Rút tên tôi khỏi khóa học này</a></li>
                </ul>
            </div>
        </div>
        <div class="breadcrumb">Nhà của tôi / Khoa học / Các khóa học / Học kỳ 2</div>

        @for ($i = 1; $i <= 4; $i++)
            <div class="coursebox card mb-4" data-courseid="387{{ $i }}" data-type="1">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <h5 class="card-title mb-0" style="font-family: 'Roboto', sans-serif;">
                            <a class="text-primary" href="#">CHỦ ĐỀ {{ $i }}</a>
                        </h5>
                        
                        <!-- Dropdown menu with 3-dot icon -->
                        <div class="dropdown">
                            <button class="btn btn-link text-dark p-0" type="button" id="dropdownMenuButton{{ $i }}" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="bi bi-three-dots-vertical"></i>
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton{{ $i }}">
                                <li><a class="dropdown-item" href="#">Chỉnh sửa</a></li>
                            </ul>
                        </div>
                    </div>

                    <!-- Nội dung riêng cho từng chủ đề -->
                    @if ($i == 1)
                        <p class="card-text mt-3">
                            Đây là nội dung của <strong>CHỦ ĐỀ 1</strong>. Chủ đề này tập trung vào các khái niệm cơ bản về mạng văn phòng và cấu trúc mạng.
                        </p>
                        <ul>
                            <li>Giới thiệu về mạng văn phòng</li>
                            <li>Các thành phần cơ bản của mạng</li>
                            <li>Các thiết bị mạng thường dùng</li>
                        </ul>
                    @elseif ($i == 2)
                        <p class="card-text mt-3">
                            Đây là nội dung của <strong>CHỦ ĐỀ 2</strong>. Chủ đề này sẽ đi sâu vào cấu hình và quản lý các thiết bị mạng.
                        </p>
                        <ul>
                            <li>Cấu hình router và switch</li>
                            <li>Thiết lập mạng LAN và WLAN</li>
                            <li>Quản lý và giám sát mạng</li>
                        </ul>
                    @elseif ($i == 3)
                        <p class="card-text mt-3">
                            Đây là nội dung của <strong>CHỦ ĐỀ 3</strong>. Chủ đề này sẽ nghiên cứu về bảo mật mạng và cách bảo vệ hệ thống mạng.
                        </p>
                        <ul>
                            <li>Khái niệm về bảo mật mạng</li>
                            <li>Phòng chống xâm nhập mạng</li>
                            <li>Chính sách bảo mật mạng</li>
                        </ul>
                    @elseif ($i == 4)
                        <p class="card-text mt-3">
                            Đây là nội dung của <strong>CHỦ ĐỀ 4</strong>. Chủ đề này sẽ tổng kết và thực hành triển khai hệ thống mạng văn phòng.
                        </p>
                        <ul>
                            <li>Lên kế hoạch triển khai mạng</li>
                            <li>Các bước triển khai thực tế</li>
                            <li>Kiểm tra và bảo trì hệ thống</li>
                        </ul>
                    @endif
                </div>
            </div>
           <div class="coursebox card mb-4" data-courseid="3872" data-type="1">
                <div class="card-body">
                    <h5 class="card-title" style="font-family: 'Roboto', sans-serif;">
                        <a class="text-primary" href="#">CHỦ ĐỀ 3</a>
                    </h5>
                    <p class="card-text text-muted"></p>
                    <p class="card-text text-muted"></p>
                    <p class="card-text"><small class="text-success"></small></p>
                </div>
            </div>

            <div class="coursebox card mb-4" data-courseid="3873" data-type="1">
                <div class="card-body">
                    <h5 class="card-title" style="font-family: 'Roboto', sans-serif;">
                        <a class="text-primary" href="#">CHỦ ĐỀ 4</a>
                    </h5>
                    <p class="card-text text-muted"></p>
                    <p class="card-text text-muted"></p>
                    <p class="card-text"><small class="text-success"></small></p>
                </div>
            </div>
    </div>
@endsection
        @endfor
    </div> 
@endsection

