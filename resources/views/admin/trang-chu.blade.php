@extends('admin.master')
@section('contents')
    <div class="page-header d-print-none mb-4">
        <div class="container-xl">
            <div class="row g-2 align-items-center">
                <div class="col">
                    <h2 class="page-title text-uppercase fw-bold">
                        Trang tổng quan
                    </h2>
                </div>
            </div>
        </div>
    </div>

    <div class="page-body">
        <div class="container-xl">
            <div class="row row-deck row-cards">
                <!-- Example Card -->
                @foreach([
                    ['title' => 'Số lượng giáo viên', 'count' => $countGiangVien, 'icon' => 'bi-person-video2', 'color' => 'primary'],
                    ['title' => 'Số lượng học sinh', 'count' => $countSinhVien, 'icon' => 'bi-mortarboard', 'color' => 'success'],
                    ['title' => 'Số lượng lớp', 'count' => $countLop, 'icon' => 'bi-people', 'color' => 'info'],
                    ['title' => 'Số lượng khoa', 'count' => $countKhoa, 'icon' => 'bi-bank', 'color' => 'warning'],
                    ['title' => 'Số lượng học phần', 'count' => $countHocPhan, 'icon' => 'bi-book', 'color' => 'danger'],
                    ['title' => 'Tổng số người dùng', 'count' => $countNguoiDung, 'icon' => 'bi-people-fill', 'color' => 'secondary']
                ] as $card)
                    <div class="col-sm-6 col-lg-3">
                        <div class="card shadow border-0 card-hover">
                            <div class="card-body text-center">
                                <div class="icon-wrapper mb-3 bg-gradient-{{ $card['color'] }} text-white rounded-circle d-inline-flex justify-content-center align-items-center">
                                    <i class="bi {{ $card['icon'] }} fs-1"></i>
                                </div>
                                <div class="subheader text-uppercase text-muted mb-2">
                                    {{ $card['title'] }}
                                </div>
                                <div class="h1 mb-0 text-{{ $card['color'] }}">{{ $card['count'] }}</div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <div class="page-body mt-4">
        <div class="container-xl">
            <div class="row row-deck row-cards">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header bg-light">
                            <h3 class="card-title">Danh sách người dùng</h3>
                        </div>
                        <div class="table-responsive p-3" style="max-height: 400px; overflow-y: auto;">
                            <table id="tableGiangVien" class="table table-vcenter table-hover table-striped">
                                <thead class="bg-primary text-white">
                                <tr>
                                    <th>STT</th>
                                    <th>Họ tên</th>
                                    <th>Quyền</th>
                                    <th>Khoa</th>
                                    <th>Email</th>
                                </tr>
                                </thead>
                                <tbody>
                                @php $stt = 1; @endphp
                                @foreach($nguoidung as $item)
                                    <tr>
                                        <td>{{ $stt++ }}</td>
                                        <td>{{ $item->ten_nguoi_dung }}</td>
                                        <td>{{ $item->ten_quyen }}</td>
                                        <td>{{ $item->ten_khoa }}</td>
                                        <td>{{ $item->email }}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Custom CSS -->
    <style>
        .card-hover:hover {
            transform: translateY(-5px);
            transition: all 0.3s ease-in-out;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.15);
        }
        .icon-wrapper {
            width: 70px;
            height: 70px;
        }
        .bg-gradient-primary {
            background: linear-gradient(135deg, #007bff, #0056b3);
        }
        .bg-gradient-success {
            background: linear-gradient(135deg, #28a745, #218838);
        }
        .bg-gradient-info {
            background: linear-gradient(135deg, #17a2b8, #117a8b);
        }
        .bg-gradient-warning {
            background: linear-gradient(135deg, #ffc107, #e0a800);
        }
        .bg-gradient-danger {
            background: linear-gradient(135deg, #dc3545, #bd2130);
        }
        .bg-gradient-secondary {
            background: linear-gradient(135deg, #6c757d, #545b62);
        }
        table thead {
            border-radius: 5px;
        }
        table tr:hover {
            background: rgba(0, 123, 255, 0.1);
        }
    </style>
@endsection
