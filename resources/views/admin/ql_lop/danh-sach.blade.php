@extends('admin.master')
@section('contents')
    <div class="page-header d-print-none">
        <div class="container-xl">
            <div class="row g-2 align-items-center">
                <div class="col">
                    <h2 class="page-title">
                        QUẢN LÝ LỚP
                    </h2>
                </div>
            </div>

            <!-- lấy này nè -->
            <div class="row mt-2">
                <div class="col-md-9 d-flex align-items-center gap-2 justify-content-start">
                    <button class="btn btn-primary d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#Modalthemlop">
                        <i class="bi bi-file-earmark-plus pe-2"></i>
                        Thêm mới
                    </button>
                    <a href="{{route('export-lop')}}" class="btn btn-success d-flex align-items-center text-white btn-export">
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
                            <table id="tableLop" class="table table-vcenter card-table table-striped">
                                <thead>
                                <tr>
                                    <th>STT</th>
                                    <th>Tên lớp</th>
                                    <th>Khoa</th>
                                    <th>Năm học</th>
                                    <th class="text-center">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @php $stt = 1; @endphp <!-- Initialize the serial number -->
                                @foreach($list_lop as $item)
                                    <tr>
                                        <td>{{ $stt++ }}</td>
                                        <td>{{ $item->ten_lop}}</td>
                                        <td>{{ $item->ten_khoa}}</td>
                                        <td>{{ $item->nam_hoc}}</td>
                                        <td class="text-center align-middle">
                                            <button
                                                class="btn p-0 btn-primary border-0 bg-transparent text-primary shadow-none edit-btn"
                                                data-id="{{ $item->ma_lop}}">
                                                <i class="bi bi-pencil-square"></i>
                                            </button>
                                            |
                                            <button
                                                class="btn p-0 btn-primary border-0 bg-transparent text-danger shadow-none delete-btn"
                                                data-id="{{ $item->ma_lop}}">
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
    <div class="modal fade" id="Modalthemlop">
        <div class="modal-dialog modal-lg"> <!-- Chỉnh thành modal-lg để form rộng hơn -->
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Thêm Lớp</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="Formthemlop" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="ten_lop" class="form-label">Tên lớp</label>
                                <input type="text" class="form-control" name="ten_lop" id="ten_lop" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="ma_khoa" class="form-label">Khoa</label>
                                <select class="form-select" name="ma_khoa" id="ma_khoa">
                                    <option value="" disabled selected>Chọn khoa</option>
                                    @foreach ($list_khoa as $item)
                                        <option value="{{ $item->ma_khoa}}">{{ $item->ten_khoa}}</option>
                                    @endforeach
                                </select>
                             </div>
                            <div class="col-md-12 mb-3">
                                <label for="nam_hoc" class="form-label">Năm học</label>
                                <input type="text" class="form-control" name="nam_hoc" id="nam_hoc" required>
{{--                                <select class="form-select" name="nam_hoc" id="nam_hoc">--}}
{{--                                    <option value="" disabled selected>Chọn năm học</option>--}}
{{--                                    <option value="1">2023</option>--}}
{{--                                    <option value="2">2024</option>--}}
{{--                                </select>--}}
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
    <div class="modal fade" id="Modaleditlop">
        <div class="modal-dialog modal-lg"> <!-- Chỉnh thành modal-lg để form rộng hơn -->
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Sửa Lớp</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="Formeditlop" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="ten_lop" class="form-label">Tên lớp</label>
                                <input type="text" class="form-control" name="ten_lop" id="ten_lop_edit" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="ma_khoa" class="form-label">Khoa</label>
                                <select class="form-select" name="ma_khoa" id="ma_khoa_edit">
                                    <option value="" disabled selected>Chọn khoa</option>
                                    @foreach ($list_khoa as $item)
                                        <option value="{{ $item->ma_khoa}}">{{ $item->ten_khoa}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="nam_hoc" class="form-label">Năm học</label>
                                <input type="text" class="form-control" name="nam_hoc" id="nam_hoc_edit" required>
                                {{--                                <select class="form-select" name="nam_hoc" id="nam_hoc">--}}
                                {{--                                    <option value="" disabled selected>Chọn năm học</option>--}}
                                {{--                                    <option value="1">2023</option>--}}
                                {{--                                    <option value="2">2024</option>--}}
                                {{--                                </select>--}}
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
        var table = $('#tableLop').DataTable({
            "language": {
                "emptyTable": "Không có dữ liệu trong bảng",
                "search": "Tìm kiếm:",
                "lengthMenu": "Hiển thị _MENU_ lớp mỗi trang",
                "zeroRecords": "Không tìm thấy kết quả",
                "infoEmpty": "Không có dữ liệu"

            }
        });

        var table = $('#tableLop').DataTable();

        $('#Formthemlop').submit(function (e) {
            e.preventDefault();

            $.ajax({
                url: '{{ route('add-lop') }}',
                method: 'POST',
                data: $(this).serialize(),
                success: function (response) {
                    if (response.success) {
                        $('#Modalthemlop').modal('hide');
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

        //Hiện chi tiết của dữ liệu
        $('#tableLop').on('click', '.edit-btn', function () {
            var lop = $(this).data('id');

            $('#Formeditlop').data('id', lop);
            var url = "{{ route('edit-lop', ':id') }}";
            url = url.replace(':id', lop);
            $.ajax({
                url: url,
                method: 'GET',
                success: function (response) {
                    var data = response.lop;
                    $('#ten_lop_edit').val(data.ten_lop);
                    $('#ma_khoa_edit').val(data.ma_khoa);
                    $('#nam_hoc_edit').val(data.nam_hoc);
                    $('#Modaleditlop').modal('show');
                },
                error: function (xhr) {
                }
            });
        });

        //Lưu lại dữ liệu khi chỉnh sửa
        $('#Formeditlop').submit(function (e) {
            e.preventDefault();
            var lopid = $(this).data('id');
            var url = "{{ route('update-lop', ':id') }}";
            url = url.replace(':id', lopid);
            var formData = new FormData(this);
            $.ajax({
                url: url,
                method: 'POST',
                data: formData,
                contentType: false,
                processData: false,
                success: function (response) {
                    if (response.success) {
                        $('#Modaleditlop').modal('hide');
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
