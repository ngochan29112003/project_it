@extends('master')

@section('contents')
    <div class="card mb-4">
        <div class="card-body pt-xl-4">
            @if(session('ma_quyen') == 2)
                <div class="row mb-2">
                    <div class="col-md-9 d-flex align-items-center gap-2 justify-content-start">
                        <a href="{{route('ngan-hang-cau-hoi',['id' => $lhp->id_lop_hoc_phan,'ten_lop_hoc_phan'=>$lhp->ten_lop_hoc_phan])}}"
                           class="btn btn-primary d-flex align-items-center">
                            <i class="bi bi-patch-question-fill pe-2"></i>
                            Xem ngân hàng câu hỏi của lớp <span style="color: yellow"
                                                                class="ps-1"> {{$lhp->ten_lop_hoc_phan}}</span>
                        </a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-9 d-flex align-items-center gap-2 justify-content-start">
                        <button
                            class="btn btn-success d-flex align-items-center" data-bs-toggle="modal"
                            data-bs-target="#Model">
                            <i class="bi bi-file-earmark-text-fill pe-2"></i>
                            Tạo bài kiểm tra
                        </button>
                    </div>
                </div>
            @endif

            <!-- Thông tin bài kiểm tra -->
            <div class="exam-info mb-4 pt-xl-4">
                @if($baiKiemTra)
                    <h4 class="text-primary">Thông Tin Bài Kiểm Tra</h4>
                    @if(session('ma_quyen') == 2)
                        <div class="dropdown position-absolute top-0 end-0" style="z-index: 10;">
                            <button class="btn btn-link text-dark dropdown-toggle" type="button" id="dropdownMenuButton"
                                    data-bs-toggle="dropdown" aria-expanded="false"></button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <li>
                                    <a class="dropdown-item editItem" href="javascript:void(0)" data-id="{{ $baiKiemTra->id_bai_kiem_tra }}">Chỉnh sửa</a>
                                </li>
                                <li>
                                    <a class="dropdown-item deleteItem" data-id="{{ $baiKiemTra->id_bai_kiem_tra }}" href="javascript:void(0)">Xóa</a>
                                </li>
                            </ul>
                        </div>
                    @endif
                    <table class="table table-bordered" style="table-layout: fixed; width: 100%;">
                        <tbody>
                        <tr>
                            <td class="fw-bold" style="width: 50%;">Tên Bài Kiểm Tra:</td>
                            <td style="width: 50%;"><span>{{ $baiKiemTra->ten_bai_kiem_tra }}</span></td>
                        </tr>
                        <tr>
                            <td class="fw-bold" style="width: 50%;">Số Câu Hỏi:</td>
                            <td style="width: 50%;"><span>{{ $baiKiemTra->so_cau }}</span></td>
                        </tr>
                        <tr>
                            <td class="fw-bold" style="width: 50%;">Thời Gian Làm Bài:</td>
                            <td style="width: 50%;"><span>{{ $baiKiemTra->thoi_gian }} phút</span></td>
                        </tr>
                        <tr>
                            <td class="fw-bold" style="width: 50%;">Hạn Chót:</td>
                            <td style="width: 50%;">
                                <span>{{ \Carbon\Carbon::parse($baiKiemTra->han_chot)->format('d/m/Y H:i') }}</span>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                    @if(session('ma_quyen') == 2)
                        <div class="text-end">
                            <a href="{{route('danh-sach-diem',['id_bai_kiem_tra'=>$baiKiemTra->id_bai_kiem_tra])}}" class="btn btn-primary">Xem danh sách điểm</a>
                        </div>
                    @endif
                    @if($ketQua)
                        <!-- Nếu đã có kết quả -->
                        <div class="alert alert-info mt-3">
                            Bạn đã nộp bài. Kết quả: {{ $ketQua->so_cau_dung }}/{{ $baiKiemTra->so_cau }} câu đúng.
                            Điểm: {{ $ketQua->diem }}
                        </div>
                    @else
                        @if(session('ma_quyen') == 3)
                            <div class="text-end">
                                <button id="startTestBtn" class="btn btn-primary">Bắt đầu kiểm tra</button>
                            </div>
                        @endif
                    @endif

                @else
                    <p>Hiện không có bài kiểm tra nào.</p>
                @endif
            </div>


            @if(session('ma_quyen') == 2)
                <!-- Modal thêm bài kiểm tra -->
                <div class="modal fade" id="Model">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">Tạo bài kiểm tra</h4>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form id="formThem" enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="id_lop_hoc_phan" value="{{$id}}">
                                    <input type="hidden" name="ma_bai_giang" value="{{$ma_bai_giang}}">
                                    <div class="mb-3">
                                        <label for="ten_bai_kiem_tra" class="form-label">Tên bài kiểm tra</label>
                                        <input class="form-control" id="ten_bai_kiem_tra" name="ten_bai_kiem_tra"
                                               required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="so_cau" class="form-label">Số câu hỏi trong bài kiểm tra</label>
                                        <input type="number" class="form-control" id="so_cau" name="so_cau" required
                                               min="1" max="100">
                                    </div>
                                    <div class="mb-3">
                                        <label for="thoi_gian" class="form-label">Thời gian làm bài <span
                                                class="text-danger">(phút)</span>:</label>
                                        <input type="number" class="form-control" id="thoi_gian" name="thoi_gian"
                                               required min="1" max="120">
                                    </div>
                                    <div class="mb-3">
                                        <label for="han_chot" class="form-label">Thời gian hết hạn:</label>
                                        <input type="datetime-local" class="form-control" id="han_chot" name="han_chot"
                                               required>
                                    </div>
                                    <div class="text-end">
                                        <button type="submit" class="btn btn-primary">Thêm</button>
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Hủy
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Modal sửa bài kiểm tra -->
                <div class="modal fade" id="editModal">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">Chỉnh sửa bài kiểm tra</h4>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form id="formEdit" enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="id_bai_kiem_tra" id="edit_id_bai_kiem_tra">
                                    <div class="mb-3">
                                        <label for="edit_ten_bai_kiem_tra" class="form-label">Tên bài kiểm tra</label>
                                        <input class="form-control" id="edit_ten_bai_kiem_tra" name="ten_bai_kiem_tra" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="edit_so_cau" class="form-label">Số câu hỏi</label>
                                        <input type="number" class="form-control" id="edit_so_cau" name="so_cau" required min="1" max="100">
                                    </div>
                                    <div class="mb-3">
                                        <label for="edit_thoi_gian" class="form-label">Thời gian làm bài (phút):</label>
                                        <input type="number" class="form-control" id="edit_thoi_gian" name="thoi_gian" required min="1" max="120">
                                    </div>
                                    <div class="mb-3">
                                        <label for="edit_han_chot" class="form-label">Hạn chót:</label>
                                        <input type="datetime-local" class="form-control" id="edit_han_chot" name="han_chot" required>
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
            @endif
        </div>
    </div>
@endsection

@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        // Xử lý submit form Thêm
        $('#formThem').on('submit', function (e) {
            e.preventDefault();
            var formData = new FormData(this);

            $.ajax({
                url: "{{ route('add-bai-kiem-tra') }}",
                type: 'POST',
                data: formData,
                contentType: false,
                processData: false,
                success: function (res) {
                    if (res.status === 'success') {
                        $('#Model').modal('hide');
                        $('#formThem')[0].reset();
                        toastr.success(res.message);
                        setTimeout(function () {
                            location.reload();
                        }, 1000);
                    } else if (res.status === 'exists') {
                        Swal.fire({
                            title: 'Bài kiểm tra đã tồn tại',
                            text: res.message,
                            icon: 'warning',
                            showCancelButton: true,
                            confirmButtonText: 'Ghi đè',
                            cancelButtonText: 'Hủy'
                        }).then((result) => {
                            if (result.isConfirmed) {
                                $.ajax({
                                    url: "{{ route('add-bai-kiem-tra') }}",
                                    type: 'POST',
                                    data: {
                                        ...Object.fromEntries(formData),
                                        overwrite: true
                                    },
                                    headers: {
                                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                                    },
                                    success: function (res) {
                                        if (res.status === 'success') {
                                            $('#Model').modal('hide');
                                            $('#formThem')[0].reset();
                                            toastr.success('Ghi đè bài kiểm tra thành công!');
                                            setTimeout(function () {
                                                location.reload();
                                            }, 1000);
                                        }
                                    },
                                    error: function (xhr) {
                                        console.log(xhr.responseText);
                                        toastr.error('Có lỗi xảy ra. Vui lòng thử lại.');
                                    }
                                });
                            }
                        });
                    }
                },
                error: function (xhr) {
                    if (xhr.status === 422) {
                        var errors = xhr.responseJSON.errors;
                        for (var key in errors) {
                            toastr.error(errors[key][0]);
                        }
                    } else {
                        toastr.error('Có lỗi xảy ra. Vui lòng thử lại.');
                    }
                }
            });
        });

        @if(session('ma_quyen') == 3 && $baiKiemTra && !$ketQua)
        // Xử lý bắt đầu kiểm tra
        $('#startTestBtn').on('click', function () {
            var han_chot = "{{ $baiKiemTra->han_chot }}";
            var currentTime = new Date();
            var deadline = new Date(han_chot);

            if (currentTime > deadline) {
                Swal.fire({
                    title: 'Hết hạn kiểm tra',
                    text: 'Bài kiểm tra đã hết hạn. Bạn không thể bắt đầu kiểm tra.',
                    icon: 'error',
                    confirmButtonText: 'Đóng'
                });
            } else {
                window.location.href = "{{ route('kiem-tra-trac-nghiem', ['id_bai_kiem_tra' => $baiKiemTra->id_bai_kiem_tra, 'id_bai_giang' => $ma_bai_giang]) }}";
            }
        });
        @endif

        // Chỉnh sửa bài kiểm tra
        $(document).on('click', '.editItem', function() {
            var id = $(this).data('id');
            $.ajax({
                url: "{{ url('/bai-kiem-tra/sua') }}/" + id,
                type: 'GET',
                success: function (res) {
                    if(res.status === 'success') {
                        $('#edit_id_bai_kiem_tra').val(res.data.id_bai_kiem_tra);
                        $('#edit_ten_bai_kiem_tra').val(res.data.ten_bai_kiem_tra);
                        $('#edit_so_cau').val(res.data.so_cau);
                        $('#edit_thoi_gian').val(res.data.thoi_gian);

                        let hanChot = new Date(res.data.han_chot);
                        let hanChotLocal = hanChot.toISOString().slice(0,16);
                        $('#edit_han_chot').val(hanChotLocal);

                        $('#editModal').modal('show');
                    } else {
                        toastr.error('Không thể lấy thông tin bài kiểm tra.');
                    }
                },
                error: function (xhr) {
                    toastr.error('Có lỗi xảy ra. Vui lòng thử lại.');
                }
            });
        });

        // Cập nhật bài kiểm tra
        $('#formEdit').on('submit', function(e) {
            e.preventDefault();
            var formData = new FormData(this);
            var id = $('#edit_id_bai_kiem_tra').val();

            $.ajax({
                url: "{{ url('/bai-kiem-tra/capnhat') }}/" + id,
                type: 'POST',
                data: formData,
                contentType:false,
                processData:false,
                success: function(res) {
                    if(res.status === 'success') {
                        $('#editModal').modal('hide');
                        toastr.success(res.message);
                        setTimeout(function(){
                            location.reload();
                        }, 1000);
                    } else {
                        toastr.error('Cập nhật không thành công.');
                    }
                },
                error: function (xhr) {
                    if (xhr.status === 422) {
                        var errors = xhr.responseJSON.errors;
                        for (var key in errors) {
                            toastr.error(errors[key][0]);
                        }
                    } else {
                        toastr.error('Có lỗi xảy ra. Vui lòng thử lại.');
                    }
                }
            });
        });

        // Xóa bài kiểm tra
        $(document).on('click', '.deleteItem', function() {
            var id = $(this).data('id');
            Swal.fire({
                title: 'Xóa bài kiểm tra?',
                text: "Bạn có chắc chắn muốn xóa bài kiểm tra này?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Xóa',
                cancelButtonText: 'Hủy'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: "{{ url('/bai-kiem-tra/xoa') }}/" + id,
                        type: 'DELETE',
                        headers: {
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        },
                        success: function(res) {
                            if(res.status === 'success') {
                                toastr.success(res.message);
                                setTimeout(function(){
                                    location.reload();
                                }, 1000);
                            } else {
                                toastr.error('Xóa không thành công.');
                            }
                        },
                        error: function (xhr) {
                            toastr.error('Có lỗi xảy ra. Vui lòng thử lại.');
                        }
                    });
                }
            })
        });
    </script>
@endsection
