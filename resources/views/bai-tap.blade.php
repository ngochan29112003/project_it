@extends('master')

@section('contents')
    <div class="card mb-4">
        <div class="card-body pt-xl-4">
            @if(session('ma_quyen') == 2)
                <div class="row">
                    <div class="col-md-9 d-flex align-items-center gap-2 justify-content-start">
                        <button
                            class="btn btn-success d-flex align-items-center" data-bs-toggle="modal"
                            data-bs-target="#Model">
                            <i class="bi bi-file-earmark-text-fill pe-2"></i>
                            Tạo bài tập
                        </button>
                    </div>
                </div>
            @endif

            <div class="row mt-3">
                <ul class="list-unstyled">
                    @forelse($baiTaps as $baiTap)
                        <li class="mb-3 d-flex justify-content-between align-items-center fs-5">
                            <a href="{{ route('bai-tap-chi-tiet', ['id' => $baiTap->ma_bai_tap]) }}" class="d-flex align-items-center text-decoration-none">
                                <i class="bi bi-pencil-square me-2 text-primary"></i>
                                {{ $baiTap->tieu_de }}
                            </a>
                            @if(session('ma_quyen') == 2)
                                <div class="dropdown">
                                    <a href="" class="text-muted" data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="bi bi-gear-fill"></i>
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li>
                                            <button class="dropdown-item editItem" data-id="{{ $baiTap->ma_bai_tap }}" data-bs-toggle="modal" data-bs-target="#editModal">Chỉnh sửa</button>
                                        </li>
                                        <li>
                                            <button class="dropdown-item deleteItem" data-id="{{ $baiTap->ma_bai_tap }}">Xóa</button>
                                        </li>
                                    </ul>
                                </div>
                            @endif
                        </li>
                    @empty
                        <li class="text-muted">Hiện chưa có bài tập nào.</li>
                    @endforelse
                </ul>
            </div>
        </div>
        <!-- Hiển thị danh sách bài tập -->

        @if(session('ma_quyen') == 2)
            <!-- Modal thêm bài kiểm tra -->
            <div class="modal fade" id="Model">
                <div class="modal-dialog modal-xl">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Tạo bài tập</h4>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form id="formThem" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="id_lop_hoc_phan" value="{{$id}}">
                                <input type="hidden" name="ma_bai_giang" value="{{$ma_bai_giang}}">
                                <div class="mb-3">
                                    <label for="tieu_de" class="form-label">Tiêu đề bài tập</label>
                                    <input class="form-control" id="tieu_de" name="tieu_de"
                                           required>
                                </div>
                                <div class="mb-3">
                                    <label for="noi_dung_bai_tap" class="form-label">Nội dung bài tập</label>
                                    <textarea id="tinymce-default" class="form-control"
                                              name="noi_dung_bai_tap"></textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="han_nop" class="form-label">Hạn nộp</label>
                                    <input type="datetime-local" class="form-control" id="han_nop" name="han_nop"
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
        @endif
    </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@tabler/core@1.0.0-beta17/dist/libs/tinymce/tinymce.min.js"
            defer></script>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            let options = {
                selector: '#tinymce-default',
                height: 600,
                menubar: false,
                statusbar: false,
                plugins: [
                    'advlist autolink lists link image charmap print preview anchor',
                    'searchreplace visualblocks code fullscreen',
                    'insertdatetime media table paste code help wordcount'
                ],
                toolbar: 'undo redo | formatselect | ' +
                    'bold italic backcolor | alignleft aligncenter ' +
                    'alignright alignjustify | bullist numlist outdent indent | ' +
                    'removeformat',
                content_style: 'body { font-family: -apple-system, BlinkMacSystemFont, San Francisco, Segoe UI, Roboto, Helvetica Neue, sans-serif; font-size: 14px; -webkit-font-smoothing: antialiased; }'
            }
            if (localStorage.getItem("tablerTheme") === 'dark') {
                options.skin = 'oxide-dark';
                options.content_css = 'dark';
            }
            tinyMCE.init(options);
        })
    </script>
@endsection

@section('scripts')
    <script>
        $('#formThem').on('submit', function (e) {
            e.preventDefault();

            // Đồng bộ TinyMCE với textarea
            tinyMCE.triggerSave();

            var formData = new FormData(this);

            $.ajax({
                url: "{{ route('add-bai-tap') }}",
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
                    }
                },
                error: function (xhr) {
                    console.log(xhr.responseText);
                    toastr.error('Có lỗi xảy ra. Vui lòng thử lại.');
                }
            });
        });

        $(document).ready(function () {
            // Xóa bài tập
            $('body').on('click', '.deleteItem', function () {
                var ma_bai_tap = $(this).data('id'); // Lấy ID bài tập
                var item = $(this).closest('li'); // Xác định dòng danh sách cần xóa

                Swal.fire({
                    title: 'Bạn có chắc chắn?',
                    text: "Bạn có muốn xóa bài tập này không?",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Vâng, xóa nó'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: '{{ route('delete-bai-tap', ':id') }}'.replace(':id', ma_bai_tap),
                            method: 'DELETE',
                            data: {
                                _token: '{{ csrf_token() }}'
                            },
                            success: function (response) {
                                if (response.success) {
                                    toastr.success(response.message, "Đã xóa thành công");
                                    item.remove(); // Xóa dòng khỏi giao diện
                                    location.reload();
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
        });
    </script>

@endsection

