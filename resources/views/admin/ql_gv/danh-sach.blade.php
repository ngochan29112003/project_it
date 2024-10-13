@extends('admin.master')
@section('contents')
    <div class="page-header d-print-none">
        <div class="container-xl">
            <div class="row align-items-center">
                <div class="col">
                    <h2 class="page-title">
                        TRANG QUẢN LÝ GIẢNG VIÊN
                    </h2>
                </div>
            </div>

            <div class="row mt-2">
                <div class="col-md-9 d-flex align-items-center gap-2 justify-content-start">
                    <button class="btn btn-primary d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#themgiangvien">
                        <i class="bi bi-file-earmark-plus pe-2"></i>
                        Thêm mới
                    </button>
                    <a href="#" class="btn btn-success d-flex align-items-center text-white btn-export">
                        <i class="bi bi-file-earmark-arrow-down pe-2"></i>
                        Xuất file Excel
                    </a>
                </div>
            </div>
        </div>

    <div class="page-body">
        <div class="container-xl">
            <div class="row row-deck row-cards">

                <div class="col-12">
                    <div class="card">
                        <div class="table-responsive p-2">
                            <table id="tableGiangVien" class="table table-vcenter card-table table-striped">
                                <thead>
                                <tr>
                                    <th>STT</th>
                                    <th>Họ tên</th>
                                    <th>Quyền</th>
                                    <th>Khoa</th>
                                    <th>Giới tính</th>
                                    <th>Ngày sinh</th>
                                    <th>Nơi sinh</th>
                                    <th>Email</th>
                                    <th class="text-center">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- ======= Modal thêm (tìm hiểu Modal này trên BS5) ======= -->
    <div class="modal fade" id="themgiangvien">
        <div class="modal-dialog modal-lg"> <!-- Chỉnh thành modal-lg để form rộng hơn -->
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Thêm giảng viên</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="Formthemgiangvien" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="ten_nguoi_dung" class="form-label">Họ tên</label>
                                <input type="text" class="form-control" name="ten_nguoi_dung" id="ten_nguoi_dung" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="ma_quyen" class="form-label">Quyền</label>
                                <select class="form-select" name="ma_quyen" id="ma_quyen">
                                    <option value="" disabled selected>Chọn quyền</option>
                                    <option value="1">Giảng viên</option>
                                    <option value="2">Học sinh</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="ma_khoa" class="form-label">Khoa</label>
                            <select class="form-select" name="ma_khoa" id="ma_khoa">
                                <option value="" disabled selected>Chọn khoa</option>
                                <option value="1">Công nghệ thông tin</option>
                                <option value="2">Khoa học máy tính</option>
                            </select>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="gioi_tinh" class="form-label">Giới tính</label>
                                <select class="form-select" name="gioi_tinh" id="gioi_tinh">
                                    <option value="" disabled selected>Chọn giới tính</option>
                                    <option value="1"> Nam</option>
                                    <option value="2">nữ</option>
                                </select>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="ngay_sinh" class="form-label">Ngày sinh</label>
                                <input type="date" class="form-control" id="ngay_sinh" name="ngay_sinh" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="noi_sinh" class="form-label">Nơi sinh</label>
                                <input type="text" class="form-control" name="noi_sinh" id="noi_sinh" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="ho_khau_thuong_tru" class="form-label">Hộ khẩu thường trú</label>
                                <input type="text" class="form-control" name="ho_khau_thuong_tru" id="ho_khau_thuong_tru" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="cccd" class="form-label">Căn cước công dân</label>
                                <input type="text" class="form-control" name="cccd" id="cccd" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="sdt" class="form-label">Số điện thoại</label>
                                <input type="text" class="form-control" name="sdt" id="sdt" required>
                            </div>
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="text" class="form-control" id="email" name="email" required>
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
        var table = $('#tableGiangVien').DataTable({
            "language": {
                "emptyTable": "Không có dữ liệu trong bảng",
                "search": "Tìm kiếm:",
                "lengthMenu": "Hiển thị _MENU_ giảng viên mỗi trang",
                "zeroRecords": "Không tìm thấy kết quả",
                "infoEmpty": "Không có dữ liệu"
            }
        });
    </script>
@endsection

