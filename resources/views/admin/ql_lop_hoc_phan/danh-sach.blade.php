@extends('admin.master')
@section('contents')
    <div class="page-header d-print-none">
        <div class="container-xl">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item fs-2 ">
                        <a href="{{route('hoc-phan')}}" class="text-dark fw-bold">QUẢN LÝ LỚP HỌC PHẦN</a>
                    </li>
                    <li class="breadcrumb-item active fs-2" aria-current="page" style="color:#0f77a2">
                        {{$ttHocPhan->ma_hoc_phan}} - {{$ttHocPhan->ten_hoc_phan}}
                    </li>
                </ol>
            </nav>

            <div class="row mt-2">
                <div class="col-md-9 d-flex align-items-center gap-2 justify-content-start">
                    <button class="btn btn-primary d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#Modal">
                        <i class="bi bi-file-earmark-plus pe-2"></i>
                        Tạo lớp học phần
                    </button>
                    <a href="#" class="btn btn-success d-flex align-items-center text-white btn-export">
                        <i class="bi bi-file-earmark-arrow-down pe-2"></i>
                        Xuất file Excel
                    </a>
                </div>
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
                                    <th>Tên lớp học phần</th>
                                    <th>Số lượng SV</th>
                                    <th>Giảng viên giảng dạy</th>
                                    <th class="text-center">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @php $stt = 1; @endphp
                                @foreach($list_lhp as $item)
                                    <tr>
                                        <td>{{ $stt++ }}</td>
                                        <td>{{ $item->ten_lop_hoc_phan}}</td>
                                        <td>{{ $item->so_luong_sinh_vien}}</td>
                                        <td>{{ $item->ten_nguoi_dung}}</td>
                                        <td class="text-center align-middle">
                                            <button
                                                class="btn p-0 btn-primary border-0 bg-transparent text-primary shadow-none edit-btn"
                                                data-id="{{ $item->id_lop_hoc_phan}}">
                                                <i class="bi bi-pencil-square"></i>
                                            </button>
                                            |
                                            <button
                                                class="btn p-0 btn-primary border-0 bg-transparent text-danger shadow-none delete-btn"
                                                data-id="{{ $item->id_lop_hoc_phan}}">
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

    <!-- Modal thêm -->
    <div class="modal fade" id="Modal">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Lớp học phần: <span style="color:#0f77a2">{{$ttHocPhan->ma_hoc_phan}} - {{$ttHocPhan->ten_hoc_phan}}</span></h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="Form" enctype="multipart/form-data">
                        @csrf
                        <input type="text" value="{{$ttHocPhan->ma_hoc_phan}}" name="ma_hoc_phan" hidden>
                        <input type="text" value="{{$ttHocPhan->id_hoc_phan}}" name="id_hoc_phan" hidden>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="maHK" class="form-label">Học kỳ</label>
                                <select class="form-select" name="maHK" id="maHK">
                                    @foreach ($hocKy as $item)
                                        <option value="{{ $item->ma_hoc_ky}}">{{ $item->ten_hoc_ky}} </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="giang_vien" class="form-label">Giảng viên giảng dạy</label>
                                <select class="form-select" name="giang_vien" id="giang_vien">
                                    @foreach ($giangVien as $item)
                                        <option value="{{ $item->ma_nguoi_dung}}">{{ $item->ten_nguoi_dung}} </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="dot" class="form-label">Đợt</label>
                                <select class="form-select" name="dot" id="dot">
                                    <option value="1">Đợt 1</option>
                                    <option value="2">Đợt 2</option>
                                    <option value="3">Đợt 3</option>
                                </select>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="loai_lop" class="form-label">Loại lớp</label>
                                <select class="form-select" name="loai_lop" id="loai_lop">
                                    <option value="LT">Lý thuyết</option>
                                    <option value="BT">Thực hành</option>
                                </select>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-check">
                                    <div class="row">
                                        <div class="col-6">
                                            <input class="form-check-input" type="checkbox" id="toggleCheckbox">
                                            <span class="form-check-label">Tạo nhanh nhiều lớp</span>
                                        </div>
                                        <div class="col-6">
                                            <input type="number" class="form-control" id="soluonglop" name="soluonglop" min="1" disabled>
                                        </div>
                                    </div>
                                </label>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="so_luong_sinh_vien" class="form-label">Số lượng sinh viên</label>
                                <input type="number" class="form-control" id="so_luong_sinh_vien" name="so_luong_sinh_vien">
                            </div>
                        </div>
                        <div class="text-end">
                            <button type="submit" class="btn btn-primary">Tạo</button>
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Hủy</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal edit -->
    <div class="modal fade" id="Modaledit">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Chỉnh sửa Lớp Học Phần <span id="tenLopHocPhan" class="text-danger"></span></h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="Formedit" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id_lop_hoc_phan" id="id_lop_hoc_phan_edit">

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="hoc_ki_edit" class="form-label">Học kỳ</label>
                                <select class="form-select" name="hoc_ki" id="hoc_ki_edit">
                                    <!-- Options sẽ được thêm bằng JS -->
                                </select>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="giang_vien_edit" class="form-label">Giảng viên giảng dạy</label>
                                <select class="form-select" name="giang_vien" id="giang_vien_edit">
                                    <!-- Options sẽ được thêm bằng JS -->
                                </select>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="dot_edit" class="form-label">Đợt</label>
                                <select class="form-select" name="dot" id="dot_edit">
                                    <option value="1">Đợt 1</option>
                                    <option value="2">Đợt 2</option>
                                    <option value="3">Đợt 3</option>
                                </select>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="loai_lop_edit" class="form-label">Loại lớp</label>
                                <select class="form-select" name="loai_lop" id="loai_lop_edit">
                                    <option value="LT">Lý thuyết</option>
                                    <option value="BT">Thực hành</option>
                                </select>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="so_luong_sinh_vien_edit" class="form-label">Số lượng sinh viên</label>
                                <input type="number" class="form-control" name="so_luong_sinh_vien" id="so_luong_sinh_vien_edit">
                            </div>
                        </div>
                        <div class="text-end">
                            <button type="submit" class="btn btn-primary">Cập nhật</button>
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
                "lengthMenu": "Hiển thị _MENU_ học phần mỗi trang",
                "zeroRecords": "Không tìm thấy kết quả",
                "infoEmpty": "Không có dữ liệu"
            }
        });

        document.getElementById('toggleCheckbox').addEventListener('change', function() {
            const inputField = document.getElementById('soluonglop');
            inputField.disabled = !this.checked;
        });

        // Thêm mới lớp học phần
        $('#Form').submit(function (e) {
            e.preventDefault();
            $.ajax({
                url: '{{ route('add-lop-hoc-phan') }}',
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
                    toastr.error("Có lỗi xảy ra", "Error");
                    if (xhr.status === 400) {
                        var response = xhr.responseJSON;
                        toastr.error(response.message, "Error");
                    } else {
                        toastr.error("An error occurred", "Error");
                    }
                }
            });
        });

        // Xóa lớp học phần
        $('#table').on('click', '.delete-btn', function () {
            var id = $(this).data('id');

            Swal.fire({
                title: 'Bạn có chắc chắn?',
                text: "Bạn có muốn xóa lớp học phần này không?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Vâng, xóa nó'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: '{{ route('delete-lop-hoc-phan', ':id') }}'.replace(':id', id),
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
                                toastr.error("Không thể xóa.", "Thất bại");
                            }
                        },
                        error: function (xhr) {
                            toastr.error("Đã xảy ra lỗi.", "Thất bại");
                        }
                    });
                }
            });
        });

        // Khi nhấn nút sửa
        $('#table').on('click', '.edit-btn', function () {
            var id = $(this).data('id');
            var url = "{{ route('edit-lop-hoc-phan', ':id') }}".replace(':id', id);

            $.ajax({
                url: url,
                method: 'GET',
                success: function (response) {
                    if (response.success) {
                        var lopHocPhan = response.lopHocPhan;
                        console.log(lopHocPhan)
                        $('#tenLopHocPhan').text(lopHocPhan.ten_lop_hoc_phan);
                        $('#id_lop_hoc_phan_edit').val(lopHocPhan.id_lop_hoc_phan);
                        $('#so_luong_sinh_vien_edit').val(lopHocPhan.so_luong_sinh_vien);
                        $('#dot_edit').val(lopHocPhan.dot);
                        $('#loai_lop_edit').val(lopHocPhan.loai_lop);

                        // Học kỳ
                        var hocKyOptions = '';
                        response.hocKy.forEach(function (hk) {
                            var selected = (hk.ma_hoc_ky == lopHocPhan.hoc_ki) ? 'selected' : '';
                            hocKyOptions += '<option value="' + hk.ma_hoc_ky + '" ' + selected + '>' + hk.ten_hoc_ky + '</option>';
                        });
                        $('#hoc_ki_edit').html(hocKyOptions);

                        // Giảng viên
                        var gvOptions = '';
                        response.giangVien.forEach(function (gv) {
                            var selected = (gv.ma_nguoi_dung == lopHocPhan.giang_vien) ? 'selected' : '';
                            gvOptions += '<option value="' + gv.ma_nguoi_dung + '" ' + selected + '>' + gv.ten_nguoi_dung + '</option>';
                        });
                        $('#giang_vien_edit').html(gvOptions);

                        $('#Modaledit').modal('show');
                    }
                },
                error: function (xhr) {
                    toastr.error("Lỗi khi lấy dữ liệu!", "Error");
                }
            });
        });

        // Cập nhật lớp học phần
        $('#Formedit').submit(function (e) {
            e.preventDefault();
            var id = $('#id_lop_hoc_phan_edit').val();
            var url = "{{ route('update-lop-hoc-phan', ':id') }}".replace(':id', id);
            var formData = $(this).serialize();

            $.ajax({
                url: url,
                method: 'POST',
                data: formData,
                success: function (response) {
                    if (response.success) {
                        $('#Modaledit').modal('hide');
                        toastr.success(response.message, "Cập nhật thành công");
                        setTimeout(function () {
                            location.reload();
                        }, 500);
                    } else {
                        toastr.error("Cập nhật thất bại!", "Error");
                    }
                },
                error: function (xhr) {
                    if (xhr.status === 422) {
                        var errors = xhr.responseJSON.errors;
                        for (var key in errors) {
                            toastr.error(errors[key][0], "Validation Error");
                        }
                    } else {
                        toastr.error("Đã xảy ra lỗi!", "Error");
                    }
                }
            });
        });
    </script>
@endsection
