@extends('admin.master')
@section('contents')
    <div class="page-header d-print-none">
        <div class="container-xl">
            <div class="row g-2 align-items-center">
                <div class="col">
                    <h2 class="page-title">
                        TRANG QUẢN LÝ HỌC PHẦN
                    </h2>
                </div>
            </div>

            <!-- lấy này nè -->
            <div class="row mt-2">
                <div class="col-md-9 d-flex align-items-center gap-2 justify-content-start">
                    <button class="btn btn-primary d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#Modalthemlophocphan">
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
                                        <td>{{ $item->ten_hoc_phan}}</td>
                                        <td>{{ $item->so_chi_ly_thuyet}}</td>
                                        <td>{{ $item->so_chi_thuc_hanh}}</td>
                                        <td class="text-center align-middle">
                                            <a href="" class="btn p-0 btn-primary border-0 bg-transparent text-primary shadow-none edit-btn">
                                                <i class="bi bi-pencil-square"></i>
                                            </a>
                                            |
                                            <button
                                                class="btn p-0 btn-primary border-0 bg-transparent text-danger shadow-none delete-btn"
                                                data-id="{{ $item->ma_hoc_phan}}">
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
                    <h4 class="modal-title">Thêm Lớp Học Phần</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="Form" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-12 mb-3">
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
                            <div class="col-md-12 mb-3">
                                <label for="hoc_ky" class="form-label">Học kỳ</label>
                                <select class="form-select" name="hoc_ky" id="hoc_ky">
                                    <option value="" disabled selected>Chọn học kỳ</option>
                                    <option value="2023-2024">2023-2024</option>
                                    <option value="2024-2025">2024-2025</option>
                                </select>
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
    </script>
@endsection
