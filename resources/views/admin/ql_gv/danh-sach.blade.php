@extends('admin.master')
@section('contents')
    <div class="page-header d-print-none">
        <div class="container-xl">
            <div class="row align-items-center">
                <div class="col">
                    <h2 class="page-title">
                       QUẢN LÝ GIẢNG VIÊN
                    </h2>
                </div>
            </div>

            <div class="row mt-2">
                <div class="col-md-9 d-flex align-items-center gap-2 justify-content-start">
                    <button class="btn btn-primary d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#Modelthemgiangvien">
                        <i class="bi bi-file-earmark-plus pe-2"></i>
                        Thêm mới
                    </button>
                    <a href="{{route('export-giang-vien')}}" class="btn btn-success d-flex align-items-center text-white btn-export">
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
                                    <th>Email</th>
                                    <th class="text-center">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @php $stt = 1; @endphp <!-- Initialize the serial number -->
                                @foreach($list_gv as $item)
                                    <tr>
                                        <td>{{ $stt++ }}</td>
                                        <td>{{ $item->ten_nguoi_dung}}</td>
                                        <td>{{ $item->ten_quyen}}</td>
                                        <td>{{ $item->ten_khoa}}</td>
                                        <td>{{ $item->email}}</td>
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
    <div class="modal fade" id="Modelthemgiangvien">
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
        <div class="modal fade" id="Modeleditgiangvien">
            <div class="modal-dialog modal-lg"> <!-- Chỉnh thành modal-lg để form rộng hơn -->
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Sửa giảng viên</h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form id="Formeditgiangvien" enctype="multipart/form-data">
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
                                    <input type="date" class="form-control" id="ngay_sinh_edit" name="ngay_sinh" required>
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
                                <input type="text" class="form-control" id="email_edit" name="email" required>
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
        var table = $('#tableGiangVien').DataTable({
            "language": {
                "emptyTable": "Không có dữ liệu trong bảng",
                "search": "Tìm kiếm:",
                "lengthMenu": "Hiển thị _MENU_ giảng viên mỗi trang",
                "zeroRecords": "Không tìm thấy kết quả",
                "infoEmpty": "Không có dữ liệu"
            }
        });

        $('#Formthemgiangvien').submit(function (e) {
            e.preventDefault();

            $.ajax({
                url: '{{ route('add-giang-vien') }}',
                method: 'POST',
                data: $(this).serialize(),
                success: function (response) {
                    if (response.success) {
                        $('#Modelthemgiangvien').modal('hide');
                        toastr.success(response.message, "Thêm thành công");
                        setTimeout(function () {
                            location.reload()
                        }, 500);
                    } else {
                        toastr.error(response.message, "Có lỗi, vui lòng kiểm tra");
                    }
                },
                error: function (xhr) {
                    if (xhr.status === 422) { // Lỗi validate
                        let errors = xhr.responseJSON.errors;
                        for (const [field, messages] of Object.entries(errors)) {
                            // Hiển thị từng thông báo lỗi bằng toastr
                            messages.forEach(message => {
                                toastr.error(message, 'Lỗi');
                            });

                            // Tô viền đỏ input bị lỗi nếu cần
                            $(`#Formthemgiangvien [name="${field}"]`).addClass('is-invalid');
                        }
                    } else {
                        toastr.error("Đã xảy ra lỗi, vui lòng thử lại", "Error");
                    }
                }
            });
        });

        $('#tableGiangVien').on('click', '.delete-btn', function () {
            var ma_gv = $(this).data('id');
            var row = $(this).closest('tr');

            Swal.fire({
                title: 'Bạn có chắc chắn?',
                text: "Bạn có muốn xóa giảng viên này không?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Vâng, xóa nó'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: '{{ route('delete-giang-vien', ':id') }}'.replace(':id', ma_gv),
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
        $('#tableGiangVien').on('click', '.edit-btn', function () {
            var giangvien = $(this).data('id');

            $('#Formeditgiangvien').data('id', giangvien);
            var url = "{{ route('edit-giang-vien', ':id') }}";
            url = url.replace(':id', giangvien);
            $.ajax({
                url: url,
                method: 'GET',
                success: function (response) {
                    var data = response.giangvien;
                    $('#ten_nguoi_dung_edit').val(data.ten_nguoi_dung);
                    $('#ma_khoa_edit').val(data.ma_khoa);
                    $('#gioi_tinh_edit').val(data.gioi_tinh);
                    $('#ngay_sinh_edit').val(data.ngay_sinh);
                    $('#noi_sinh_edit').val(data.noi_sinh);
                    $('#ho_khau_thuong_tru_edit').val(data.ho_khau_thuong_tru);
                    $('#cccd_edit').val(data.cccd);
                    $('#sdt_edit').val(data.sdt);
                    $('#email_edit').val(data.email);
                    $('#Modeleditgiangvien').modal('show');
                },
                error: function (xhr) {
                }
            });
        });

        //Lưu lại dữ liệu khi chỉnh sửa
        $('#Formeditgiangvien').submit(function (e) {
            e.preventDefault();
            var giangvienid = $(this).data('id');
            var url = "{{ route('update-giang-vien', ':id') }}";
            url = url.replace(':id', giangvienid);
            var formData = new FormData(this);
            $.ajax({
                url: url,
                method: 'POST',
                data: formData,
                contentType: false,
                processData: false,
                success: function (response) {
                    if (response.success) {
                        $('#Modeleditgiangvien').modal('hide');
                        toastr.success(response.response, "Sửa thành công");
                        setTimeout(function () {
                            location.reload()
                        }, 500);
                    }
                },
                error: function (xhr) {
                    if (xhr.status === 422) { // Lỗi validate
                        let errors = xhr.responseJSON.errors;
                        for (const [field, messages] of Object.entries(errors)) {
                            // Hiển thị từng thông báo lỗi bằng toastr
                            messages.forEach(message => {
                                toastr.error(message, 'Lỗi');
                            });

                            // Tô viền đỏ input bị lỗi nếu cần
                            $(`#Formeditgiangvien [name="${field}"]`).addClass('is-invalid');
                        }
                    } else {
                        toastr.error("Đã xảy ra lỗi, vui lòng thử lại", "Error");
                    }
                }
            });
        });
    </script>
@endsection

