@extends('master')
@section("contents")
    <div class="card mb-4">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h2 class="submission-title text-danger fw-bold">Nộp bài tập</h2>
            <div class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups">
                @if($ttSinhVien->ma_quyen == 2)
                    <div class="btn-group me-2" role="group" aria-label="First group">
                        <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modalThemBaiNop">
                            <i class="bi bi-plus-circle"></i> Thêm bài tập
                        </button>
                    </div>
                    <div class="btn-group" role="group" aria-label="Second group">
                        <button class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#modalSuaBaiNop">
                            <i class="bi bi-pencil-square"></i> Sửa bài tập
                        </button>
                    </div>
                @endif
            </div>
        </div>

        <div class="card-body pt-xl-4">
            <p class="mb-4">Nộp bài tập tại đây !!!</p>

            <div class="submission-status mb-4">
                <h4 class="text-primary">Tình trạng nộp bài</h4>
                <table class="table table-bordered">
                    <tbody>
                    <tr>
                        <td class="fw-bold">Tình trạng nộp bài:</td>
                        <td><span class="badge bg-success">Đã nộp</span></td>
                    </tr>
                    <tr>
                        <td class="fw-bold">Hạn chót:</td>
                        <td>{{ \Carbon\Carbon::now()->format('d/m/Y, h:i A') }}</td>
                    </tr>
                    <tr>
                        <td class="fw-bold">Thời gian còn lại:</td>
                        <td><span class="text-success">Bài nộp đã được gửi sớm 10 giờ 7 phút</span></td>
                    </tr>
                    <tr>
                        <td class="fw-bold">Lần chỉnh sửa cuối:</td>
                        <td>{{ \Carbon\Carbon::now()->format('d/m/Y, h:i A') }}</td>
                    </tr>
                    </tbody>
                </table>
            </div>

            <div class="file-submissions mb-4">
                <h4 class="text-primary">Tài liệu nộp</h4>
                <ul class="list-unstyled">
                    <li><a href="#">IMG20210831104116.jpg</a> <span class="text-muted">{{ \Carbon\Carbon::now()->format('d/m/Y, h:i A') }}</span></li>
                    <li><a href="#">IMG20210831104126.jpg</a> <span class="text-muted">{{ \Carbon\Carbon::now()->format('d/m/Y, h:i A') }}</span></li>
                    <li><a href="#">IMG20210831104137.jpg</a> <span class="text-muted">{{ \Carbon\Carbon::now()->format('d/m/Y, h:i A') }}</span></li>
                    <li><a href="#">IMG20210831104143.jpg</a> <span class="text-muted">{{ \Carbon\Carbon::now()->format('d/m/Y, h:i A') }}</span></li>
                    <li><a href="#">received_20660054833142.jpeg</a> <span class="text-muted">{{ \Carbon\Carbon::now()->format('d/m/Y, h:i A') }}</span></li>
                </ul>
            </div>

            <div class="d-flex justify-content-center">
                <a href="{{route('nop-bai-tap')}}" class="btn btn-primary">
                    <i class="bi bi-upload"></i> Thêm bài nộp
                </a>
            </div>
        </div>
    </div>

    <!--Modal thêm -->
    <div class="modal fade" id="modalThemBaiNop" tabindex="-1" aria-labelledby="modalThemBaiNopLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalThemBaiNopLabel">Thêm bài tập</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="formTaoBaiTap" action="{{ route('them-bai-tap') }}" method="POST">
                    @csrf
                    <input type="hidden" name="id_lop_hoc_phan" value="{{ $list_lop_hp->id_lop_hoc_phan }}">
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="tieuDeBaiTap" class="form-label fw-bold">Tiêu đề bài tập:</label>
                            <input type="text" id="tieuDeBaiTap" name="tieu_de" class="form-control" placeholder="Nhập tiêu đề bài tập" required>
                        </div>
                        <div class="mb-3">
                            <label for="moTaBaiTap" class="form-label fw-bold">Mô tả:</label>
                            <textarea id="moTaBaiTap" name="mo_ta" class="form-control" rows="4" placeholder="Nhập mô tả bài tập"></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="hanChot" class="form-label fw-bold">Hạn chót:</label>
                            <input type="datetime-local" id="han_chot" name="han_chot" class="form-control" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Tạo bài tập</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Hủy</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!--Modal thêm -->
    <div class="modal fade" id="modalSuaBaiNop" tabindex="-1" aria-labelledby="modalSuaBaiNopLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalSuaBaiNopLabel">Thêm bài tập</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="formTaoBaiTap" enctype="multipart/form-data">
                    <div class="modal-body">
                        <!-- Nội dung form thêm bài tập như bạn đã viết -->
                        <div class="mb-3">
                            <label for="tieuDeBaiTap" class="form-label fw-bold">Tiêu đề bài tập:</label>
                            <input type="text" id="tieuDeBaiTap" name="tieu_de" class="form-control" placeholder="Nhập tiêu đề bài tập" required>
                        </div>
                        <div class="mb-3">
                            <label for="moTaBaiTap" class="form-label fw-bold">Mô tả:</label>
                            <textarea id="moTaBaiTap" name="mo_ta" class="form-control" rows="4" placeholder="Nhập mô tả bài tập"></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="hanChot" class="form-label fw-bold">Hạn chót:</label>
                            <input type="datetime-local" id="hanChot" name="han_chot" class="form-control" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Sửa bài tập</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Hủy</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        $('#formTaoBaiTap').on('submit', function(e) {
            e.preventDefault();

            var formData = new FormData(this);
            $.ajax({
                url: $(this).attr('action'),
                method: 'POST', // Đảm bảo phương thức là POST
                data: formData,
                contentType: false,
                processData: false,
                success: function(response) {
                    // Xử lý sau khi thành công
                },
                error: function() {
                    alert('Có lỗi xảy ra!');
                }
            });
        });
    </script>
@endsection
