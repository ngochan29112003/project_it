@extends('admin.master')
@section('contents')
    <div class="page-header d-print-none">
        <div class="container-xl">
            <div class="row g-2 align-items-center">
                <div class="col">
                    <h2 class="page-title">
                        TRANG QUẢN LÝ KHOA
                    </h2>
                </div>
            </div>

            <!-- lấy này nè -->
            <div class="row mt-2">
                <div class="col-md-9 d-flex align-items-center gap-2 justify-content-start">
                    <button class="btn btn-primary d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#Modalthemkhoa">
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
                            <table id="tableKhoa" class="table table-vcenter card-table table-striped">
                                <thead>
                                <tr>
                                    <th>STT</th>
                                    <th>Tên Khoa</th>
                                    <th>Trưởng Khoa</th>
                                    <th class="text-center align-middle">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @php $stt = 1; @endphp <!-- Initialize the serial number -->
                                @foreach($list_khoa as $item)
                                    <tr>
                                        <td class="align-middle">{{ $stt++ }}</td>
                                        <td class="align-middle">{{ $item->ten_khoa }}</td>
                                        <td class="align-middle">{{ $item->truong_khoa }}</td>
                                        <td class="text-center align-middle">
                                            <a href="" class="btn p-0 btn-primary border-0 bg-transparent text-primary shadow-none edit-btn">
                                                <i class="bi bi-pencil-square"></i>
                                            </a>
                                            |
                                            <button
                                                class="btn p-0 btn-primary border-0 bg-transparent text-danger shadow-none delete-btn"
                                                data-id="{{ $item->ma_khoa}}">
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
    <div class="modal fade" id="Modalthemkhoa">
        <div class="modal-dialog modal-lg"> <!-- Chỉnh thành modal-lg để form rộng hơn -->
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Thêm Khoa</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="Formthemkhoa" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="ten_khoa" class="form-label">Tên khoa</label>
                                <input type="text" class="form-control" name="ten_khoa" id="ten_khoa" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="truong_khoa" class="form-label">Trưởng khoa</label>
                                <input type="text" class="form-control" name="truong_khoa" id="truong_khoa" required>
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
        var table = $('#tableKhoa').DataTable({
            "language": {
                "emptyTable": "Không có dữ liệu trong bảng",
                "search": "Tìm kiếm:",
                "lengthMenu": "Hiển thị _MENU_ khoa mỗi trang",
                "zeroRecords": "Không tìm thấy kết quả",
                "infoEmpty": "Không có dữ liệu"

            }
        });

        var table = $('#tableKhoa').DataTable();

        $('#Formthemkhoa').submit(function (e) {
            e.preventDefault();

            $.ajax({
                url: '{{ route('add-khoa') }}',
                method: 'POST',
                data: $(this).serialize(),
                success: function (response) {
                    if (response.success) {
                        $('#Modalthemkhoa').modal('hide');
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

        $('#tableKhoa').on('click', '.delete-btn', function () {
            var ma_khoa = $(this).data('id');
            var row = $(this).closest('tr');

            Swal.fire({
                title: 'Bạn có chắc chăn ?',
                text: "Bạn có muốn xóa khoa không ?",
                icon: 'cảnh báo',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: '{{ route('delete-khoa', ':id') }}'.replace(':id', ma_khoa),
                        method: 'DELETE',
                        data: {
                            _token: '{{ csrf_token() }}'
                        },
                        success: function (response) {
                            if (response.success) {
                                toastr.success(response.message, "Xóa thành công");
                                setTimeout(function () {
                                    location.reload()
                                }, 500);
                            } else {
                                toastr.error("Xóa không thành công.",
                                    "Operation Failed");
                            }
                        },
                        error: function (xhr) {
                            toastr.error("An error occurred.", "Operation Failed");
                        }
                    });
                }
            });
        });
    </script>
@endsection
