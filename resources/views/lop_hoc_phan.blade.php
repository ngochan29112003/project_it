@extends('master')
@section("contents")
    <div class="container-fluid mt-4">
        <div class="d-flex justify-content-between mb-4 p-3 border rounded position-relative">
            <div class="d-flex flex-column">
                <!-- Title and breadcrumb in the same row aligned to the left -->
                <h3 class="text-danger fw-bold mb-0 me-3">
                    {{$chiTietLHP->ten_lop_hoc_phan}} - {{$chiTietLHP->ten_hoc_phan}} ({{$chiTietLHP->so_chi_ly_thuyet}}.{{$chiTietLHP->so_chi_thuc_hanh}}) - GV: {{$chiTietLHP->ten_nguoi_dung}}
                </h3>
                <nav class="breadcrumb p-0 mb-0 mt-2">
                    <a href="" class="breadcrumb-item">Nhà của tôi</a>
                    <a href="#" class="breadcrumb-item">Khóa học</a>
                    <span class="breadcrumb-item active">{{$chiTietLHP->ten_hoc_ky}}</span>
                    <span class="breadcrumb-item active">{{$chiTietLHP->ten_lop_hoc_phan}}</span>
                </nav>
            </div>
            @if(!$daGhiDanh)
                <button type="button" class="btn btn-danger align-self-start thamGiaLHP">
                    <i class="bi bi-key"></i> Ghi danh tôi vào lớp
                </button>
            @endif
        </div>

        @if(!$daGhiDanh)
            <p>Bạn cần ghi danh để xem thông tin của lớp <span class="text-danger">{{$chiTietLHP->ten_lop_hoc_phan}}</span></p>
        @else
            <div class="card mb-4">
                <div class="d-flex justify-content-between align-items-center">
                    <h5 class="card-header bg-light fw-bold text-primary">Thông báo</h5>
                    <div class="dropdown">
                        <button class="btn btn-link text-dark p-0" type="button" id="dropdownMenuButton1"
                                data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="bi bi-three-dots-vertical"></i>
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                            <li><a class="dropdown-item" href="#">Chỉnh sửa</a></li>
                        </ul>
                    </div>
                </div>
                <div class="card-body">
                    <p>Không có thông báo nào vào lúc này.</p>
                </div>
            </div>

            <div class="card mb-4">
                <div class="d-flex justify-content-between align-items-center">
                    <h5 class="card-header bg-light fw-bold text-primary">Thông tin học phần</h5>
                    <div class="dropdown">
                        <button class="btn btn-link text-dark p-0" type="button" id="dropdownMenuButton2"
                                data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="bi bi-three-dots-vertical"></i>
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton2">
                            <li><a class="dropdown-item" href="#">Chỉnh sửa</a></li>
                        </ul>
                    </div>
                </div>
                <div class="card-body bg-light">
                    <p>Lớp học phần: <strong>Triển khai hệ thống mạng văn phòng 241, 1TH1370, KS2A, 02, trực tiếp</strong></p>
                    <p>Tên học phần: <strong>Triển khai hệ thống mạng văn phòng</strong></p>
                    <p>Mã học phần: <strong>TH1370</strong></p>
                    <p>Số tín chỉ: <strong>3TC</strong> (1 lý thuyết : 2 thực hành)</p>
                </div>
            </div>

            <div class="card mb-4">
                <div class="d-flex justify-content-between align-items-center">
                    <h5 class="card-header bg-light fw-bold text-primary">Kế hoạch giảng dạy</h5>
                    <div class="dropdown">
                        <button class="btn btn-link text-dark p-0" type="button" id="dropdownMenuButton3"
                                data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="bi bi-three-dots-vertical"></i>
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton3">
                            <li><a class="dropdown-item" href="#">Chỉnh sửa</a></li>
                        </ul>
                    </div>
                </div>
                <div class="card-body">
                    <p><strong>Thứ ba (tiết 3 - 4, 08g40 – 10g50)</strong></p>
                    <p>Tuần học: <strong>337 - 38 - 39 - 40 - 41</strong></p>
                    <p>Ngày học: <strong>11/09, 18/09, 25/09, 02/10, 09/10</strong></p>
                    <p>Link học trực tuyến: <a href="https://meet.google.com/xym-ytor-sbm" target="_blank">meet.google.com/xym-ytor-sbm</a>
                    </p>
                </div>
            </div>

            <div class="card mb-4">
                <div class="d-flex justify-content-between align-items-center">
                    <h5 class="card-header bg-light fw-bold text-primary">Đề cương học phần</h5>
                    <div class="dropdown">
                        <button class="btn btn-link text-dark p-0" type="button" id="dropdownMenuButton4"
                                data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="bi bi-three-dots-vertical"></i>
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton4">
                            <li><a class="dropdown-item" href="#">Chỉnh sửa</a></li>
                        </ul>
                    </div>
                </div>
                <div class="card-body">
                    <p>Đề cương học phần sẽ được cung cấp trong lớp học.</p>
                </div>
            </div>

            <div class="card mb-4">
                <div class="d-flex justify-content-between align-items-center">
                    <h5 class="card-header bg-light fw-bold text-primary">Giáo trình - Bài giảng - tài liệu tham khảo</h5>
                    <div class="dropdown">
                        <button class="btn btn-link text-dark p-0" type="button" id="dropdownMenuButton5"
                                data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="bi bi-three-dots-vertical"></i>
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton5">
                            <li><a class="dropdown-item" href="#">Chỉnh sửa</a></li>
                        </ul>
                    </div>
                </div>
                <div class="card-body">
                    <ul class="list-unstyled">
                        <li><i class="bi bi-file-earmark-pdf text-danger"></i> <a href="#">Tài liệu tham khảo TKMVP</a></li>
                    </ul>
                </div>
            </div>

            <div class="card mb-4">
                <div class="d-flex justify-content-between align-items-center">
                    <h5 class="card-header bg-light fw-bold text-primary">Video giảng dạy</h5>
                    <div class="dropdown">
                        <button class="btn btn-link text-dark p-0" type="button" id="dropdownMenuButton6"
                                data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="bi bi-three-dots-vertical"></i>
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton6">
                            <li><a class="dropdown-item" href="#">Chỉnh sửa</a></li>
                        </ul>
                    </div>
                </div>
                <div class="card-body">
                    <p>Video giảng dạy sẽ được cập nhật tại đây.</p>
                </div>
            </div>

            <div class="card mb-4">
                <div class="d-flex justify-content-between align-items-center">
                    <h5 class="card-header bg-light fw-bold text-primary">Kiểm tra đánh giá</h5>
                    <div class="dropdown">
                        <button class="btn btn-link text-dark p-0" type="button" id="dropdownMenuButton7"
                                data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="bi bi-three-dots-vertical"></i>
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton7">
                            <li><a class="dropdown-item" href="#">Chỉnh sửa</a></li>
                        </ul>
                    </div>
                </div>
                <div class="card-body">
                    <p>Các bài kiểm tra và đánh giá sẽ được công bố sau.</p>
                </div>
            </div>

        @endif
    </div>
    <script>
        document.querySelector('.thamGiaLHP').addEventListener('click', function() {
            // Hiển thị SweetAlert để xác nhận
            Swal.fire({
                title: 'Bạn có chắc muốn ghi danh vào lớp này?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Có, ghi danh!',
                cancelButtonText: 'Hủy'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Gửi yêu cầu Ajax đến controller để ghi danh
                    fetch('{{ route('thamGiaLop') }}', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        },
                        body: JSON.stringify({
                            ma_hoc_phan: {{ $chiTietLHP->id_lop_hoc_phan }}
                        })
                    })
                        .then(response => response.json())
                        .then(data => {
                            if (data.success) {
                                Swal.fire(
                                    'Thành công!',
                                    data.message,
                                    'success'
                                ).then(() => {
                                    // Reload lại trang sau khi ghi danh thành công
                                    location.reload();
                                });
                            } else {
                                Swal.fire(
                                    'Lỗi!',
                                    'Có lỗi xảy ra, vui lòng thử lại.',
                                    'error'
                                );
                            }
                        })
                        .catch(error => {
                            Swal.fire(
                                'Lỗi!',
                                'Không thể kết nối đến server.',
                                'error'
                            );
                        });
                }
            });
        });
    </script>

@endsection

