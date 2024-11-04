@extends('admin.master')
@section('contents')
    <div class="page-header d-print-none">
        <div class="container-xl">
            <div class="row g-2 align-items-center">
                <div class="col">
                    <h2 class="page-title">
                        QUẢN LÝ HỌC PHẦN
                    </h2>
                </div>
            </div>
            <div class="row mt-2">
                <div class="col-md-9 d-flex align-items-center gap-2 justify-content-start">
                    <button class="btn btn-primary d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#Modal">
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
                                    <th>Mã lớp</th>
                                    <th>Tên học phần</th>
                                    <th>Số TC-LT</th>
                                    <th>Số TC-TH</th>
                                    <th class="text-center">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @php $stt = 1; @endphp <!-- Initialize the serial number -->
                                @foreach($list_hp as $item)
                                    <tr>
                                        <td>{{ $stt++ }}</td>
                                        <td>{{ $item->ma_hoc_phan}}</td>
                                        <td>{{ $item->ten_hoc_phan}}</td>
                                        <td>{{ $item->so_chi_ly_thuyet}}</td>
                                        <td>{{ $item->so_chi_thuc_hanh}}</td>
                                        <td class="text-center align-middle">
                                            <a
                                                href="{{ route('lop-hoc-phan', ['id' => $item->id_hoc_phan]) }}"
                                                class="btn p-0 btn-primary border-0 bg-transparent text-primary shadow-none info-btn">
                                                <i class="bi bi-eye text-green"></i>
                                            </a>
                                            |
                                            <button
                                                class="btn p-0 btn-primary border-0 bg-transparent text-primary shadow-none edit-btn"
                                                data-id="{{ $item->id_hoc_phan}}">
                                                <i class="bi bi-pencil-square"></i>
                                            </button>
                                            |
                                            <button
                                                class="btn p-0 btn-primary border-0 bg-transparent text-danger shadow-none delete-btn"
                                                data-id="{{ $item->id_hoc_phan}}">
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
                    <h4 class="modal-title">Thêm Học Phần</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="Form" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="id_lop_hoc_phan" class="form-label">Mã lớp</label>
                                <input type="text" class="form-control" name="ma_hoc_phan" id="ma_hoc_phan" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="ten_hoc_phan" class="form-label">Tên học phần</label>
                                <input type="text" class="form-control" name="ten_hoc_phan" id="ten_hoc_phan" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="so_chi_ly_thuyet" class="form-label">Số chỉ lý thuyết</label>
                                <input type="number" class="form-control" name="so_chi_ly_thuyet" id="so_chi_ly_thuyet" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="so_chi_thuc_hanh" class="form-label">Số chỉ thực hành</label>
                                <input type="number" class="form-control" name="so_chi_thuc_hanh" id="so_chi_thuc_hanh" required>
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

    <div class="modal fade" id="Modaledit">
        <div class="modal-dialog modal-lg"> <!-- Chỉnh thành modal-lg để form rộng hơn -->
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Thêm Lớp Học Phần</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="Formedit" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="id_lop_hoc_phan" class="form-label">Mã lớp</label>
                                <input type="text" class="form-control" name="ma_hoc_phan" id="ma_hoc_phan_edit" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="ten_hoc_phan" class="form-label">Tên học phần</label>
                                <input type="text" class="form-control" name="ten_hoc_phan" id="ten_hoc_phan_edit" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="so_chi_ly_thuyet" class="form-label">Số chỉ lý thuyết</label>
                                <input type="number" class="form-control" name="so_chi_ly_thuyet" id="so_chi_ly_thuyet_edit" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="so_chi_thuc_hanh" class="form-label">Số chỉ thực hành</label>
                                <input type="number" class="form-control" name="so_chi_thuc_hanh" id="so_chi_thuc_hanh_edit" required>
                            </div>
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
                "lengthMenu": "Hiển thị _MENU_ học phần mỗi trang",
                "zeroRecords": "Không tìm thấy kết quả",
                "infoEmpty": "Không có dữ liệu"

            }
        });

        var table = $('#table').DataTable();

        $('#Form').submit(function (e) {
            e.preventDefault();

            $.ajax({
                url: '{{ route('add-hoc-phan') }}',
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
            var ma_hp = $(this).data('id');
            var row = $(this).closest('tr');

            Swal.fire({
                title: 'Bạn có chắc chắn?',
                text: "Bạn có muốn xóa học phần này không?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Vâng, xóa nó'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: '{{ route('delete-hoc-phan', ':id') }}'.replace(':id', ma_hp),
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
            var HocPhan = $(this).data('id');

            $('#Formedit').data('id', HocPhan);
            var url = "{{ route('edit-hoc-phan', ':id') }}";
            url = url.replace(':id', HocPhan);
            $.ajax({
                url: url,
                method: 'GET',
                success: function (response) {
                    var data = response.hocphan;
                    $('#ma_hoc_phan_edit').val(data.ma_hoc_phan);
                    $('#ten_hoc_phan_edit').val(data.ten_hoc_phan);
                    $('#so_chi_ly_thuyet_edit').val(data.so_chi_ly_thuyet);
                    $('#so_chi_thuc_hanh_edit').val(data.so_chi_thuc_hanh);
                    $('#Modaledit').modal('show');
                },
                error: function (xhr) {
                }
            });
        });

        //Lưu lại dữ liệu khi chỉnh sửa
        $('#Formedit').submit(function (e) {
            e.preventDefault();
            var hocphanid = $(this).data('id');
            var url = "{{ route('update-hoc-phan', ':id') }}";
            url = url.replace(':id', hocphanid);
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
