@extends('admin.master')
@section('contents')
    <style>
        .form-floating select {
            padding-top: 1.25rem; /* Điều chỉnh khoảng cách nhãn */
            padding-bottom: 0.25rem;
        }

        .form-floating label {
            white-space: nowrap; /* Giữ cho nhãn không bị xuống dòng */
            overflow: hidden;    /* Ẩn phần thừa khi bị tràn */
            text-overflow: ellipsis; /* Thêm dấu "..." khi bị tràn */
            width: 100%;
        }
    </style>

    <div class = "page-header d-print-none">
        <div class = "container-xl">
            <div class = "row g-2 align-items-center">
                <div class = "col">
                    <h2 class = "page-title">
                        QUẢN LÝ TÀI KHOẢN </h2>
                </div>
            </div>
            <div class = "row mt-2">
                <div class = "col-9">
                    <div class="btn btn-primary mx-2" data-bs-toggle="modal" data-bs-target="#themtaikhoan">
                        <div class="d-flex align-items-center at1">
                                <i class="bi bi-file-earmark-plus pe-2"></i>
                                Thêm mới
                        </div>
                    </div>
                </div>

                <div class="col-3">
                    <div class="form-floating w-100">
                        <select class="form-select" id="floatingSelect" onchange="filterByRole(this.value)">
                            <option value="" selected>Hiện tất cả</option>
                            <option value="1">Tài khoản giảng viên</option>
                            <option value="2">Tài khoản sinh viên</option>
                        </select>
                        <label for="floatingSelect">Lựa chọn loại tài khoản hiển thị</label>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <div class = "page-body">
        <div class = "container-xl">
            <div class = "row row-deck row-cards">
                <div class = "col-12">
                    <div class = "card">
                        <div class = "table-responsive p-2">
                            <table id = "tableTaiKhoan" class = "table table-vcenter card-table table-striped">
                                <thead>
                                <tr>
                                    <th>STT</th>
                                    <th>Họ và tên</th>
                                    <th>Tên tài khoản</th>
                                    <th>Quyền</th>
                                    <th class = "text-center">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @php $stt = 1; @endphp <!-- Initialize the serial number -->
                                @foreach($list_tai_khoan as $item)
                                    <tr>
                                        <td>{{ $stt++ }}</td>
                                        <td>{{ $item->ten_nguoi_dung}}</td>
                                        <td>{{ $item->ten_tai_khoan}}</td>
                                        <td>{{ $item->ten_quyen}}</td>
                                        <td class="text-center align-middle">
                                            <button
                                                class="btn p-0 btn-primary border-0 bg-transparent text-danger shadow-none delete-btn"
                                                data-id="{{ $item->ma_tai_khoan}}">
                                                <i class="bi bi-trash3"></i>
                                            </button>
                                        </td>
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

    <!-- ======= Modal thêm (tìm hiểu Modal này trên BS5) ======= -->
    <div class="modal fade" id="themtaikhoan">
        <div class="modal-dialog modal-lg"> <!-- Chỉnh thành modal-lg để form rộng hơn -->
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Thêm tài khoản</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="Formthemtaikhoan" enctype="multipart/form-data">
                        @csrf
                            <div class="col-md-12 mb-3">
                                <label for="ma_nguoi_dung" class="form-label">Tên người dùng</label>
                                <select class="form-select" name="ma_nguoi_dung" id="ma_nguoi_dung">
                                    <option value="" disabled selected>Chọn người dùng</option>
                                    @foreach ($list_nguoi_dung as $item)
                                        <option value="{{ $item->ma_nguoi_dung}}">{{ $item->ten_nguoi_dung}} - {{ $item->ten_quyen}} </option>
                                    @endforeach
                                </select>
                            </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="ten_tai_khoan" class="form-label">Tên tài khoản</label>
                                <input type="text" class="form-control" id="ten_tai_khoan" name="ten_tai_khoan" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="mat_khau" class="form-label">Mật khẩu</label>
                                <input type="password" class="form-control" id="mat_khau" name="mat_khau" required>
                            </div>
                        </div>
                        <div class="text-end">
                            <button type="submit" class="btn btn-primary">Thêm</button>
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Hủy</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        var table = $('#tableTaiKhoan').DataTable({
            "language": {
                "emptyTable": "Không có dữ liệu trong bảng",
                "search": "Tìm kiếm:",
                "lengthMenu": "Hiển thị _MENU_ tài khoản mỗi trang",
                "zeroRecords": "Không tìm thấy kết quả",
                "infoEmpty": "Không có dữ liệu"

            }
        });

        $('#Formthemtaikhoan').submit(function (e) {
            e.preventDefault();

            $.ajax({
                url: '{{ route('add-tai-khoan') }}',
                method: 'POST', // sử dụng POST để tránh lộ thông tin qua URL
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') // thêm CSRF token
                },
                data: $(this).serialize(),
                success: function (response) {
                    if (response.success) {
                        toastr.success(response.message, "Thành công");
                        setTimeout(function () {
                           location.reload(); // Chuyển hướng người dùng
                        }, 500);
                    } else {
                        toastr.error(response.message, "Lỗi");
                    }
                },
                error: function (xhr) {
                    // Sửa lỗi này bằng cách lấy thông báo chính xác từ phản hồi JSON
                    if (xhr.status === 400) {
                        var response = xhr.responseJSON;
                        toastr.error(response.message, "Lỗi");
                    } else {
                        // Trường hợp lỗi khác (nếu có)
                        toastr.error("An error occurred", "Lỗi");
                    }
                }
            });
        });

        $('#tableTaiKhoan').on('click', '.delete-btn', function () {
            var ma_tk = $(this).data('id');
            var row = $(this).closest('tr');

            Swal.fire({
                title: 'Bạn có chắc chắn?',
                text: "Bạn có muốn xóa tài khoản này không?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Vâng, xóa nó'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: '{{ route('delete-tai-khoan', ':id') }}'.replace(':id', ma_tk),
                        method: 'DELETE',
                        data: {
                            _token: '{{ csrf_token() }}'
                        },
                        success: function (response) {
                            if (response.success) {
                                toastr.success(response.message, "Đã xóa thành công");
                                setTimeout(function () {
                                    location.reload()
                                }, 500);
                            } else {
                                toastr.error("Không thể xóa.",
                                    "Thất bại");
                            }
                        },
                        error: function (xhr) {
                            toastr.error("Đã xãy ra lỗi.", "Thất bại");
                        }
                    });
                }
            });
        });
    </script>
@endsection
