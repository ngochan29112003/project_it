@extends('master')
@section("contents")
        <div class="card mb-4">
            <div class="card-body pt-xl-4">
                <h2 class="submission-title text-danger fw-bold">Nộp bài kiểm tra 10% lần 1</h2>
                <span>Nộp bài tập tại đây !!!</span>

                <div class="submission-status mb-4 pt-xl-4">
                    <h4 class="text-primary">Tình trạng nộp bài</h4>
                    <table class="table table-bordered">
                        <tbody>
                        <tr>
                            <td class="fw-bold">Tình trạng nộp bài:</td>
                            <td><span class="badge bg-success">Đã nộp để chấm điểm</span></td>
                        </tr>
                        <tr>
                            <td class="fw-bold">Tình trạng chấm điểm:</td>
                            <td><span class="badge bg-success">Đã cho điểm</span></td>
                        </tr>
                        <tr>
                            <td class="fw-bold">Hạn chót:</td>
                            <td>{{ \Carbon\Carbon::now()->format('d/m/Y, h:i A') }}</td>
                        </tr>
                        <tr>
                            <td class="fw-bold">Thời gian còn lại:</td>
                            <td><span class="text-success">Bài nộp đã được gửi sớm 10 giờ 7 phút</span></td>
                        </tr>
                        <tr>
                            <td class="fw-bold">Lần chỉnh sửa cuối:</td>
                            <td>{{ \Carbon\Carbon::now()->format('d/m/Y, h:i A') }}</td>
                        </tr>
                        </tbody>
                    </table>
                </div>

                <div class="file-submissions mb-4">
                    <h4 class="text-primary">Tài liệu nộp</h4>
                    <ul class="list-unstyled">
                        <li><a href="#">IMG20210831104116.jpg</a> <span class="text-muted">{{ \Carbon\Carbon::now()->format('d/m/Y, h:i A') }}</span></li>
                        <li><a href="#">IMG20210831104126.jpg</a> <span class="text-muted">{{ \Carbon\Carbon::now()->format('d/m/Y, h:i A') }}</span></li>
                        <li><a href="#">IMG20210831104137.jpg</a> <span class="text-muted">{{ \Carbon\Carbon::now()->format('d/m/Y, h:i A') }}</span></li>
                        <li><a href="#">IMG20210831104143.jpg</a> <span class="text-muted">{{ \Carbon\Carbon::now()->format('d/m/Y, h:i A') }}</span></li>
                        <li><a href="#">received_20660054833142.jpeg</a> <span class="text-muted">{{ \Carbon\Carbon::now()->format('d/m/Y, h:i A') }}</span></li>
                    </ul>
                </div>

                <div class="d-flex align-content-center">
                    <a href="{{route('nop-bai-tap')}}" class="btn btn-primary">Thêm bài nộp</a>
                </div>

                <div class="submission-feedback mt-4">
                    <div class="d-flex justify-content-between align-items-center">
                        <h4 class="text-primary mb-0">Phản hồi</h4>
                        <!-- Dropdown chỉnh sửa -->
                        <div class="dropdown">
                            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                                Chỉnh sửa
                            </button>
                            <ul class="dropdown-menu dropdown-menu-end shadow" aria-labelledby="dropdownMenuButton">
                                <li>
                                    <a class="dropdown-item d-flex align-items-center" href="#">
                                        <i class="bi bi-pencil-square me-2 text-primary"></i> Sửa điểm
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item d-flex align-items-center" href="#">
                                        <i class="bi bi-trash-fill me-2 text-danger"></i> Xóa tất cả
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <table class="table table-bordered mt-3">
                        <tbody>
                        <tr>
                            <td class="fw-bold">Điểm:</td>
                            <td>8.0/10.0</td>
                        </tr>
                        <tr>
                            <td class="fw-bold">Chấm điểm vào:</td>
                            <td>{{ \Carbon\Carbon::now()->format('d/m/Y, h:i A') }}</td>
                        </tr>
                        <tr>
                            <td class="fw-bold">Người chấm điểm:</td>
                            <td>Nguyễn Vạn Năng</td>
                        </tr>
                        </tbody>
                    </table>
                </div>

@endsection
