@extends('master')
@section('contents')
    <div class="container-fluid">
        <div class="card">
            <div class="d-flex justify-content-between p-3 position-relative pt-3">
                <div class="d-flex flex-column">
                    <h2 class="text-danger fw-bold mb-0 me-3">
                        NGÂN HÀNG CÂU HỎI / {{$lhp->ten_lop_hoc_phan}}
                    </h2>
                </div>
            </div>
            <div class="row row-deck row-cards px-4 pb-2">
                <div class="col-md-9 d-flex align-items-center gap-2 justify-content-start">
                    <button class="btn btn-primary d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#ModelThem">
                        <i class="bi bi-file-earmark-plus pe-2"></i>
                        Thêm mới câu hỏi
                    </button>
                    <div class="btn btn-success d-flex align-items-center at2 text-white btnExcel mx-2">
                        <i class="bi bi-file-earmark-arrow-up pe-2 "></i>
                        Import
                    </div>
                </div>
            </div>
            <div class="row row-deck row-cards px-4">
                <div class="col-12">
                    <div class="card">
                        <div class="table-responsive p-2">
                            <table id="table" class="table table-vcenter">
                                <thead>
                                <tr>
                                    <th>STT</th>
                                    <th>Câu hỏi</th>
                                    <th>Đáp án A</th>
                                    <th>Đáp án B</th>
                                    <th>Đáp án C</th>
                                    <th>Đáp án D</th>
                                    <th>Đáp án đúng</th>
                                    <th class="text-center">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($cauHoi as $index => $cau)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>{{ $cau->cau_hoi }}</td>
                                        <td>{{ $cau->dap_an_a }}</td>
                                        <td>{{ $cau->dap_an_b }}</td>
                                        <td>{{ $cau->dap_an_c }}</td>
                                        <td>{{ $cau->dap_an_d }}</td>
                                        <td>{{ $cau->dap_an_dung }}</td>
                                        <td class="text-center align-middle">
                                            <button
                                                class="btn p-0 btn-primary border-0 bg-transparent text-primary shadow-none edit-btn"
                                                data-id="{{ $cau->id }}">
                                                <i class="bi bi-pencil-square"></i>
                                            </button>
                                            |
                                            <button
                                                class="btn p-0 btn-primary border-0 bg-transparent text-danger shadow-none delete-btn"
                                                data-id="{{ $cau->id }}">
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

    {{-- Modal Thêm --}}
    <div class="modal fade" id="ModelThem">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Thêm câu hỏi</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="formThem" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id_lop_hoc_phan" value="{{ $id_lop_hoc_phan }}">
                        <div class="mb-3">
                            <label for="cau_hoi" class="form-label">Câu hỏi</label>
                            <textarea class="form-control" id="cau_hoi" name="cau_hoi" rows="3" required></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="dap_an_a" class="form-label">Đáp án A</label>
                            <input type="text" class="form-control" id="dap_an_a" name="dap_an_a" required>
                        </div>
                        <div class="mb-3">
                            <label for="dap_an_b" class="form-label">Đáp án B</label>
                            <input type="text" class="form-control" id="dap_an_b" name="dap_an_b" required>
                        </div>
                        <div class="mb-3">
                            <label for="dap_an_c" class="form-label">Đáp án C</label>
                            <input type="text" class="form-control" id="dap_an_c" name="dap_an_c" required>
                        </div>
                        <div class="mb-3">
                            <label for="dap_an_d" class="form-label">Đáp án D</label>
                            <input type="text" class="form-control" id="dap_an_d" name="dap_an_d" required>
                        </div>
                        <div class="mb-3">
                            <label for="dap_an_dung" class="form-label">Đáp án đúng</label>
                            <select class="form-control" id="dap_an_dung" name="dap_an_dung" required>
                                <option value="">--Chọn đáp án đúng--</option>
                                <option value="A">A</option>
                                <option value="B">B</option>
                                <option value="C">C</option>
                                <option value="D">D</option>
                            </select>
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

    {{-- Modal Sửa --}}
    <div class="modal fade" id="ModalEdit">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Sửa câu hỏi</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="FormEdit" enctype="multipart/form-data">
                        @csrf
                        {{-- Có thể cần thêm phương thức PUT hoặc PATCH nếu muốn --}}
                        <input type="hidden" name="id" id="id_edit">
                        <div class="mb-3">
                            <label for="cau_hoi_edit" class="form-label">Câu hỏi</label>
                            <textarea class="form-control" id="cau_hoi_edit" name="cau_hoi" rows="3" required></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="dap_an_a_edit" class="form-label">Đáp án A</label>
                            <input type="text" class="form-control" id="dap_an_a_edit" name="dap_an_a" required>
                        </div>
                        <div class="mb-3">
                            <label for="dap_an_b_edit" class="form-label">Đáp án B</label>
                            <input type="text" class="form-control" id="dap_an_b_edit" name="dap_an_b" required>
                        </div>
                        <div class="mb-3">
                            <label for="dap_an_c_edit" class="form-label">Đáp án C</label>
                            <input type="text" class="form-control" id="dap_an_c_edit" name="dap_an_c" required>
                        </div>
                        <div class="mb-3">
                            <label for="dap_an_d_edit" class="form-label">Đáp án D</label>
                            <input type="text" class="form-control" id="dap_an_d_edit" name="dap_an_d" required>
                        </div>
                        <div class="mb-3">
                            <label for="dap_an_dung_edit" class="form-label">Đáp án đúng</label>
                            <select class="form-control" id="dap_an_dung_edit" name="dap_an_dung" required>
                                <option value="">--Chọn đáp án đúng--</option>
                                <option value="A">A</option>
                                <option value="B">B</option>
                                <option value="C">C</option>
                                <option value="D">D</option>
                            </select>
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

    <div class="modal fade md2">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title text-bold"></h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <label for="">Select file (*.xlsx) or download
                                <a target="_blank" href="{{asset('excel/question-bank-import.xlsx')}}">
                                    Example file
                                </a>
                            </label>
                            <input accept=".xlsx" name="file-excel" type="file" class="form-control">
                            <br>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary luuTT">Upload</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $(document).ready(function() {
            var table = $('#table').DataTable({
                "language": {
                    "emptyTable": "Không có dữ liệu trong bảng",
                    "search": "Tìm kiếm:",
                    "lengthMenu": "Hiển thị _MENU_ câu hỏi mỗi trang",
                    "zeroRecords": "Không tìm thấy kết quả",
                    "infoEmpty": "Không có dữ liệu"
                }
            });

            // Xử lý submit form Thêm
            $('#formThem').on('submit', function(e) {
                e.preventDefault();
                var formData = new FormData(this);

                $.ajax({
                    url: "{{ route('add-ngan-hang-cau-hoi') }}",
                    type: 'POST',
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function(res) {
                        if(res.status === 'success'){
                            $('#ModelThem').modal('hide');
                            $('#formThem')[0].reset();
                            toastr.success('Thêm câu hỏi thành công!');
                            setTimeout(function(){
                                location.reload();
                            }, 1000);
                        }
                    },
                    error: function(xhr) {
                        console.log(xhr.responseText);
                        toastr.error('Có lỗi xảy ra. Vui lòng thử lại.');
                    }
                });
            });

            // Xử lý Delete
            $('#table').on('click', '.delete-btn', function () {
                var cauhoi_id = $(this).data('id');
                var row = $(this).closest('tr');

                Swal.fire({
                    title: 'Bạn có chắc chắn?',
                    text: "Bạn có muốn xóa câu hỏi này không?",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Vâng, xóa nó'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: '{{ route('delete-ngan-hang-cau-hoi', ':id') }}'.replace(':id', cauhoi_id),
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

            // Xử lý Edit (Mở modal và điền dữ liệu)
            $('#table').on('click', '.edit-btn', function () {
                var cauhoi_id = $(this).data('id');

                var url = "{{ route('edit-ngan-hang-cau-hoi', ':id') }}";
                url = url.replace(':id', cauhoi_id);
                $.ajax({
                    url: url,
                    method: 'GET',
                    success: function (response) {
                        var data = response.cauhoi;
                        $('#id_edit').val(data.id);
                        $('#cau_hoi_edit').val(data.cau_hoi);
                        $('#dap_an_a_edit').val(data.dap_an_a);
                        $('#dap_an_b_edit').val(data.dap_an_b);
                        $('#dap_an_c_edit').val(data.dap_an_c);
                        $('#dap_an_d_edit').val(data.dap_an_d);
                        $('#dap_an_dung_edit').val(data.dap_an_dung);
                        $('#ModalEdit').modal('show');
                    },
                    error: function (xhr) {
                        toastr.error("Không thể lấy dữ liệu để sửa.", "Lỗi");
                    }
                });
            });

            // Xử lý submit form Sửa
            $('#FormEdit').submit(function (e) {
                e.preventDefault();
                var cauhoi_id = $('#id_edit').val();
                var url = "{{ route('update-ngan-hang-cau-hoi', ':id') }}";
                url = url.replace(':id', cauhoi_id);
                var formData = new FormData(this);
                $.ajax({
                    url: url,
                    method: 'POST',
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function (response) {
                        if (response.success) {
                            $('#ModalEdit').modal('hide');
                            toastr.success(response.message, "Cập nhật thành công");
                            setTimeout(function () {
                                location.reload()
                            }, 500);
                        } else {
                            toastr.error("Cập nhật không thành công.", "Thất bại");
                        }
                    },
                    error: function (xhr) {
                        toastr.error("Lỗi khi cập nhật.", "Thất bại");
                    }
                });
            });

            // Xử lý btnExcel
            $('.btnExcel').click(function () {
                let id = {{ $id_lop_hoc_phan }};
                let lhp = "{{ $lhp->ten_lop_hoc_phan }}"; // Đảm bảo chuỗi được bao quanh bởi dấu ngoặc kép
                $('.md2 .modal-title').text('Thêm câu hỏi vào lớp học phần ' + lhp);
                $('.md2').modal('show');

                // Tách hàm click để tránh nhiều lần gán sự kiện
                $('.luuTT').off('click').on('click', function () {
                    var fileInput = $('input[name="file-excel"]')[0].files[0];
                    if (!fileInput) {
                        toastr.error("Vui lòng chọn file để tải lên.");
                        return;
                    }
                    var formData = new FormData();
                    formData.append('file-excel', fileInput);
                    $.ajax({
                        url: '{{ route('import-ngan-hang-cau-hoi', ':id') }}'.replace(':id', id),
                        type: "POST",
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        data: formData,
                        contentType: false,
                        processData: false,
                        success: function (result) {
                            if (result.status === 200) {
                                toastr.success(result.message);
                                setTimeout(function () {
                                    location.reload();
                                }, 750);
                            } else {
                                toastr.error(result.message);
                            }
                        },
                        error: function (error) {
                            toastr.error("Thêm thất bại");
                        }
                    });
                });
            });


        });
    </script>
@endsection

