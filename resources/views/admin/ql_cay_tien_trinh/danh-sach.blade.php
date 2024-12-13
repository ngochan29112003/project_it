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
                    <button class="btn btn-primary d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#Modelthemctt">
                        <i class="bi bi-file-earmark-plus pe-2"></i>
                        Thêm mới
                    </button>
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
                                    <th>Tên khoa</th>
                                    <th>Hình cây tiến trình</th>
                                    <th>Khóa học</th>
                                    <th class="text-center">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @php $stt = 1; @endphp <!-- Initialize the serial number -->
                                    @foreach($list_ds as $item)
                                        <tr>
                                            <td>{{ $stt++ }}</td>
                                            <td>{{ $item->ten_khoa}}</td>
                                            <td>
                                                <!-- Hiển thị hình ảnh -->
                                                <img src="{{ asset('assets/img_tientrinh/' . $item->cay_tien_trinh) }}" alt="Image" style="max-width: 100px; max-height: 100px;">
                                            </td>
                                            <td>{{ $item->khoa_hoc}}</td>
                                            <td class="text-center align-middle">
                                                <button
                                                    class="btn p-0 btn-primary border-0 bg-transparent text-primary shadow-none edit-btn"
                                                    data-id="{{ $item->ma_tien_trinh}}">
                                                    <i class="bi bi-pencil-square"></i>
                                                </button>
                                                |
                                                <button
                                                    class="btn p-0 btn-primary border-0 bg-transparent text-danger shadow-none delete-btn"
                                                    data-id="{{ $item->ma_tien_trinh}}">
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

    <!-- Modal thêm cây tiến trình -->
<div class="modal fade" id="Modelthemctt">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Thêm cây tiến trình</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="Formthemctt" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <label for="ma_khoa" class="form-label">Tên khoa</label>
                            <select class="form-select" name="ma_khoa" id="ma_khoa">
                                <option value="" disabled selected>Chọn khoa</option>
                                @foreach ($list_khoa as $item)
                                    <option value="{{ $item->ma_khoa }}">{{ $item->ten_khoa }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="cay_tien_trinh" class="form-label">Hình cây tiến trình</label>
                            <input type="file" class="form-control" name="cay_tien_trinh" id="cay_tien_trinh" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="khoa_hoc" class="form-label">Khóa học</label>
                            <input type="text" class="form-control" id="khoa_hoc" name="khoa_hoc" required>
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

        <!-- ======= Modal sửa (tìm hiểu Modal này trên BS5) ======= -->
        <div class="modal fade" id="Modelsuactt">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Sửa cây tiến trình</h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form id="Formsuactt" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-12 mb-3">
                                    <label for="ma_khoa" class="form-label">Tên khoa</label>
                                    <select class="form-select" name="ma_khoa" id="edit_ma_khoa">
                                        <option value="" disabled selected>Chọn khoa</option>
                                        @foreach ($list_khoa as $item)
                                            <option value="{{ $item->ma_khoa }}">{{ $item->ten_khoa }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="cay_tien_trinh" class="form-label">Hình cây tiến trình</label>
                                    <input type="file" class="form-control" name="cay_tien_trinh" id="edit_cay_tien_trinh">
                                    <p id="file-name" class="text-muted"></p> <!-- Hiển thị tên file -->
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="khoa_hoc" class="form-label">Khóa học</label>
                                    <input type="text" class="form-control" id="edit_khoa_hoc" name="khoa_hoc" required>
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
                "lengthMenu": "Hiển thị _MENU_ đề xuất mỗi trang",
                "zeroRecords": "Không tìm thấy kết quả",
                "infoEmpty": "Không có dữ liệu"
            }
        });

        //Xem lại
        $('#Formthemctt').submit(function (e) {
            e.preventDefault();

            $.ajax({
                url: '{{ route('add-cay-tien-trinh') }}',
                method: 'POST',
                data: new FormData(this), // Dùng FormData để gửi tệp ảnh
                contentType: false,
                processData: false,
                success: function (response) {
                    if (response.success) {
                        $('#Modelthemctt').modal('hide');
                        toastr.success(response.message, "Successful");
                        setTimeout(function () {
                            location.reload(); // Tải lại trang sau khi thêm thành công
                        }, 500);
                    } else {
                        toastr.error(response.message, "Error");
                    }
                },
                error: function (xhr, status, error) {
                    console.log("Status: " + status);  // In ra trạng thái lỗi
                    console.log("Error: " + error);    // In ra thông báo lỗi
                    console.log("Response: ", xhr.responseText);  // In ra phản hồi chi tiết từ server

                    if (xhr.status === 400) {
                        var response = xhr.responseJSON;
                        toastr.error(response.message, "Error");
                    } else {
                        toastr.error("An error occurred", "Error");
                    }
                }
            });
        });

        //xóa
        $('#table').on('click', '.delete-btn', function () {
            var ma_tt = $(this).data('id');
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
                        url: '{{ route('delete-cay-tien-trinh', ':id') }}'.replace(':id', ma_tt),
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
            var ctt = $(this).data('id');

            $('#Formsuactt').data('id', ctt);
            var url = "{{ route('edit-cay-tien-trinh', ':id') }}";
            url = url.replace(':id', ctt);
            $.ajax({
                url: url,
                method: 'GET',
                success: function (response) {
    var data = response.ctt;

    $('#edit_ma_khoa').val(data.ma_khoa);
    $('#edit_khoa_hoc').val(data.khoa_hoc);

    // Hiển thị tên file
    if (data.hinh_anh) {
        $('#file-name').text(data.hinh_anh); // Hiển thị tên file hiện tại
    } else {
        $('#file-name').text("Chưa có file nào được chọn.");
    }

    $('#Modelsuactt').modal('show');
},
                error: function (xhr) {
                }
            });
        });

        //Lưu lại dữ liệu khi chỉnh sửa
        $('#Formsuactt').submit(function (e) {
            e.preventDefault();
            var cttid = $(this).data('id');
            var url = "{{ route('update-cay-tien-trinh', ':id') }}";
            url = url.replace(':id', cttid);
            var formData = new FormData(this);
            $.ajax({
                url: url,
                method: 'POST',
                data: formData,
                contentType: false,
                processData: false,
                success: function (response) {
                    if (response.success) {
                        $('#Modelsuactt').modal('hide');
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

