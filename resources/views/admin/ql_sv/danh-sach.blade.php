@extends('admin.master')
@section('contents')
    <div class="page-header d-print-none">
        <div class="container-xl">
            <div class="row g-2 align-items-center">
                <div class="col">
                    <h2 class="page-title">
                        QUẢN LÝ SINH VIÊN
                    </h2>
                </div>
            </div>

            <!-- //lấy này nè -->
            <div class="row mt-2">
                <div class="col-md-9 d-flex align-items-center gap-2 justify-content-start">
                    <button class="btn btn-primary d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#Modal">
                        <i class="bi bi-file-earmark-plus pe-2"></i>
                        Thêm mới
                    </button>
                    <a href="{{ route('export-sinh-vien')}}" class="btn btn-success d-flex align-items-center text-white btn-export">
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
                                <table id="table" class="table table-vcenter card-table table-striped">
                                    <thead>
                                    <tr>
                                        <th>STT</th>
                                        <th>Họ tên</th>
                                        <th>Quyền</th>
                                        <th>Khoa</th>
                                        <th>Lớp</th>
                                        <th>Email</th>
                                        <th>Số điện thoại</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @php $stt = 1; @endphp <!-- Initialize the serial number -->
                                    @foreach($list_sv as $item)
                                        <tr>
                                            <td>{{ $stt++ }}</td>
                                            <td>{{ $item->ten_nguoi_dung}}</td>
                                            <td>{{ $item->ten_quyen}}</td>
                                            <td>{{ $item->ten_khoa}}</td>
                                            <td>{{ $item->ten_lop}}</td>
                                            <td>{{ $item->email}}</td>
                                            <td>{{ $item->sdt}}</td>
                                            <td class="text-center align-middle">
                                                <button
                                                    class="btn p-0 btn-primary border-0 bg-transparent text-primary shadow-none edit-btn"
                                                    data-id="{{ $item->ma_nguoi_dung}}">
                                                    <i class="bi bi-pencil-square"></i>
                                                </button>
                                                |
                                                <button
                                                    class="btn p-0 btn-primary border-0 bg-transparent text-danger shadow-none delete-btn"
                                                    data-id="{{ $item->ma_nguoi_dung}}">
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
        <div class="modal fade" id="Modal">
            <div class="modal-dialog modal-lg"> <!-- Chỉnh thành modal-lg để form rộng hơn -->
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Thêm sinh viên</h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form id="Form" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-12 mb-3">
                                    <label for="ten_nguoi_dung" class="form-label">Họ tên</label>
                                    <input type="text" class="form-control" name="ten_nguoi_dung" id="ten_nguoi_dung" required>
                                </div>
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="ma_khoa" class="form-label">Khoa</label>
                                <select class="form-select" name="ma_khoa" id="ma_khoa">
                                    <option value="" disabled selected>Chọn khoa</option>
                                    @foreach ($list_khoa as $item)
                                        <option value="{{ $item->ma_khoa}}">{{ $item->ten_khoa}} </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="ma_lop" class="form-label">Lớp</label>
                                <select class="form-select" name="ma_lop" id="ma_lop">
                                    <option value="" disabled selected>Chọn lớp</option>
                                    @foreach ($list_lop as $item)
                                        <option value="{{ $item->ma_lop}}">{{ $item->ten_lop}} </option>
                                    @endforeach
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

        <!-- ======= Modal sửa (tìm hiểu Modal này trên BS5) ======= -->
        <div class="modal fade" id="Modaledit">
            <div class="modal-dialog modal-lg"> <!-- Chỉnh thành modal-lg để form rộng hơn -->
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Sửa sinh viên</h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form id="Formedit" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-12 mb-3">
                                    <label for="ten_nguoi_dung" class="form-label">Họ tên</label>
                                    <input type="text" class="form-control" name="ten_nguoi_dung" id="ten_nguoi_dung_edit" required>
                                </div>
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="ma_khoa" class="form-label">Khoa</label>
                                <select class="form-select" name="ma_khoa" id="ma_khoa_edit">
                                    <option value="" disabled selected>Chọn khoa</option>
                                    @foreach ($list_khoa as $item)
                                        <option value="{{ $item->ma_khoa}}">{{ $item->ten_khoa}} </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="ma_lop" class="form-label">Lớp</label>
                                <select class="form-select" name="ma_lop" id="ma_lop_edit">
                                    <option value="" disabled selected>Chọn lớp</option>
                                    @foreach ($list_lop as $item)
                                        <option value="{{ $item->ma_lop}}">{{ $item->ten_lop}} </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="gioi_tinh" class="form-label">Giới tính</label>
                                    <select class="form-select" name="gioi_tinh" id="gioi_tinh_edit">
                                        <option value="" disabled selected>Chọn giới tính</option>
                                        <option value="1"> Nam</option>
                                        <option value="2">nữ</option>
                                    </select>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="ngay_sinh" class="form-label">Ngày sinh</label>
                                    <input type="date" class="form-control" id="ngay_sinh" name="ngay_sinh_edit" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="noi_sinh" class="form-label">Nơi sinh</label>
                                    <input type="text" class="form-control" name="noi_sinh" id="noi_sinh_edit" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="ho_khau_thuong_tru" class="form-label">Hộ khẩu thường trú</label>
                                    <input type="text" class="form-control" name="ho_khau_thuong_tru" id="ho_khau_thuong_tru_edit" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="cccd" class="form-label">Căn cước công dân</label>
                                    <input type="text" class="form-control" name="cccd" id="cccd_edit" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="sdt" class="form-label">Số điện thoại</label>
                                    <input type="text" class="form-control" name="sdt" id="sdt_edit" required>
                                </div>
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="email" name="email_edit" required>
                            </div>
                            <div class="text-end">
                                <button type="submit" class="btn btn-primary">Sửa</button>
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
        var table = $('#table').DataTable({
            "language": {
                "emptyTable": "Không có dữ liệu trong bảng",
                "search": "Tìm kiếm:",
                "lengthMenu": "Hiển thị _MENU_ sinh viên mỗi trang",
                "zeroRecords": "Không tìm thấy kết quả",
                "infoEmpty": "Không có dữ liệu"

            }
        });

        $('#Form').submit(function (e) {
            e.preventDefault();

            $.ajax({
                url: '{{ route('add-sinh-vien') }}',
                method: 'POST',
                data: $(this).serialize(),
                success: function (response) {
                    if (response.success) {
                        $('#Modal').modal('hide');
                        toastr.success(response.message, "Successful");
                        setTimeout(function () {
                            location.reload()
                        }, 500);
                    } else {
                        toastr.error(response.message, "Error");
                    }
                },
                error: function (xhr) {
                    toastr.error(response.message, "Error");
                    if (xhr.status === 400) {
                        var response = xhr.responseJSON;
                        toastr.error(response.message, "Error");
                    } else {
                        toastr.error("An error occurred", "Error");
                    }
                }
            });
        });

        $('#table').on('click', '.delete-btn', function () {
            var ma_sv = $(this).data('id');
            var row = $(this).closest('tr');

            Swal.fire({
                title: 'Bạn có chắc chắn?',
                text: "Bạn có muốn xóa sinh viên này không?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Vâng, xóa nó'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: '{{ route('delete-sinh-vien', ':id') }}'.replace(':id', ma_sv),
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

        //Hiện chi tiết của dữ liệu
        $('#table').on('click', '.edit-btn', function () {
            var sinhvien = $(this).data('id');

            $('#Formedit').data('id', sinhvien);
            var url = "{{ route('edit-sinh-vien', ':id') }}";
            url = url.replace(':id', sinhvien);
            $.ajax({
                url: url,
                method: 'GET',
                success: function (response) {
                    var data = response.sinhvien;
                    $('#ten_nguoi_dung_edit').val(data.ten_nguoi_dung);
                    $('#ma_khoa_edit').val(data.ma_khoa);
                    $('#ma_lop_edit').val(data.ma_lop);
                    $('#gioi_tinh_edit').val(data.gioi_tinh);
                    $('#ngay_sinh_edit').val(data.ngay_sinh);
                    $('#noi_sinh_edit').val(data.noi_sinh);
                    $('#ho_khau_thuong_tru_edit').val(data.ho_khau_thuong_tru);
                    $('#cccd_edit').val(data.cccd);
                    $('#email_edit').val(data.email);
                    $('#sdt_edit').val(data.sdt);
                    $('#Modaledit').modal('show');
                },
                error: function (xhr) {
                }
            });
        });

        //Lưu lại dữ liệu khi chỉnh sửa
        $('#Formedit').submit(function (e) {
            e.preventDefault();
            var sinhvienid = $(this).data('id');
            var url = "{{ route('update-sinh-vien', ':id') }}";
            url = url.replace(':id', sinhvienid);
            var formData = new FormData(this);
            $.ajax({
                url: url,
                method: 'POST',
                data: formData,
                contentType: false,
                processData: false,
                success: function (response) {
                    if (response.success) {
                        $('#Modaledit').modal('hide');
                        toastr.success(response.response, "Sửa thành công");
                        setTimeout(function () {
                            location.reload()
                        }, 500);
                    }
                },
                error: function (xhr) {
                    toastr.error("Lỗi");
                }
            });
        });
    </script>
@endsection
