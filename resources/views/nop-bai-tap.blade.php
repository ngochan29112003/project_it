@extends('master')
@section('contents')
    <body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-12 col-md-8">
                <div class="d-flex justify-content-between align-items-center">
                    <h2 class="text-danger mb-0">{{ $baiTap->tieu_de }}</h2>
                    @if(session('ma_quyen') == 2)
                        <div class="dropdown">
                            <a href="#" class="text-muted" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="bi bi-gear-fill"></i>
                            </a>
                            <div class="dropdown-menu">
                                <li>
                                    <button class="dropdown-item editItem" data-id="{{ $baiTap->ma_bai_tap }}"
                                            data-bs-toggle="modal" data-bs-target="#editModal">Chỉnh sửa
                                    </button>
                                    <button class="dropdown-item showListNopBT" data-id="{{ $baiTap->ma_bai_tap }}">Danh
                                        sách sinh viên đã nộp
                                    </button>
                                </li>
                            </div>
                        </div>
                    @endif
                </div>
            </div>

            <div class="col-lg-12 col-md-8">
                {!! $baiTap->noi_dung_bai_tap !!}
            </div>

            @if(session('ma_quyen') == 3)
                <div class="col-lg-12 col-md-8 mt-4">
                    <h4>Các file đã nộp:</h4>
                    @if(isset($listFiles) && $listFiles->count() > 0)
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th>Tên file</th>
                                    <th>Hành động</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($listFiles as $file)
                                    <tr id="file-row-{{ $file->id }}">
                                        <td>{{ $file->ten_file }}</td>
                                        <td>
                                            <!-- Nút Download với icon -->
                                            <a href="{{ asset('file_bai_tap/' . $file->ten_file) }}" target="_blank"
                                               class="btn p-0 btn-primary border-0 bg-transparent text-primary shadow-none"
                                               title="Download">
                                                <i class="bi bi-download"></i>
                                            </a>
                                            |
                                            <!-- Nút Xóa với icon -->
                                            <button
                                                class="btn p-0 btn-primary border-0 bg-transparent text-danger shadow-none deleteFile"
                                                data-id="{{ $file->id }}" title="Xóa">
                                                <i class="bi bi-trash"></i>
                                            </button>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
                        <p>Chưa có file nào được nộp.</p>
                    @endif
                </div>
            @endif

            <!-- Phần nộp bài tập -->
            <div class="col-lg-12 col-md-8">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Nộp bài tập</h4>
                        @php
                            use Carbon\Carbon;

                            $now = Carbon::now();
                            $han_nop = Carbon::parse($baiTap->han_nop);
                            $diffInDays = $now->diffInDays($han_nop, false); // false để lấy giá trị có dấu

                            if ($now->greaterThan($han_nop)) {
                                $deadlineClass = 'text-danger';
                            } elseif ($diffInDays <= 1) {
                                $deadlineClass = 'text-warning';
                            } else {
                                $deadlineClass = 'text-success';
                            }
                            $formattedHanNop = $han_nop->format('d/m/Y H:i');
                        @endphp
                        <h5 class="{{ $deadlineClass }}">Hạn nộp bài tập: {{ $formattedHanNop }}</h5>
                        <div id="countdown-timer" class="mt-2"></div>

                        @if($now->lessThanOrEqualTo($han_nop))
                            <form class="dropzone dz-clickable" id="dropzone-multiple"
                                  action="{{ route('bai-tap.upload-file', ['id' => $baiTap->ma_bai_tap]) }}"
                                  method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="dz-default dz-message">
                                    <button class="dz-button" type="button">Kéo & thả file vào đây hoặc nhấn để chọn
                                    </button>
                                </div>
                            </form>
                        @else
                            <div class="alert alert-danger" role="alert" id="deadline-message">
                                Hạn nộp bài đã kết thúc. Bạn không thể nộp bài nữa.
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

    @if(session('ma_quyen') == 2)
        <!-- Modal sửa bài kiểm tra -->
        <div class="modal fade" id="editModal" tabindex="-1" aria-hidden="true" data-id="">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Chỉnh sửa bài tập</h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form id="formThem" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label for="tieu_de" class="form-label">Tiêu đề bài tập</label>
                                <input class="form-control" id="tieu_de" name="tieu_de" required>
                            </div>
                            <div class="mb-3">
                                <label for="noi_dung_bai_tap" class="form-label">Nội dung bài tập</label>
                                <textarea id="tinymce-default" class="form-control" name="noi_dung_bai_tap"></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="han_nop" class="form-label">Hạn nộp</label>
                                <input type="datetime-local" class="form-control" id="han_nop" name="han_nop" required>
                            </div>
                            <div class="text-end">
                                <button type="submit" class="btn btn-primary">Lưu</button>
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Hủy</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal để hiển thị danh sách sinh viên đã nộp -->
        <div class="modal fade" id="listNopBTModal" tabindex="-1" aria-labelledby="listNopBTModalLabel"
             aria-hidden="true">
            <div class="modal-dialog modal-lg"> <!-- Kích thước lớn để hiển thị tốt -->
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Danh sách sinh viên đã nộp</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th>STT</th>
                                <th>Tên sinh viên</th>
                                <th>Tên file</th>
                            </tr>
                            </thead>
                            <tbody id="listNopBTBody">
                            <!-- Dữ liệu sẽ được chèn vào đây bằng JavaScript -->
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    @endif
    </body>

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

    <script>
        $(document).on('click', '.editItem', function () {
            var id = $(this).data('id');
            var url = "{{ route('bai-tap.edit', ':id') }}".replace(':id', id);

            $.ajax({
                url: url,
                type: 'GET',
                success: function (res) {
                    if (res.status === 'success') {
                        $('#tieu_de').val(res.data.tieu_de);
                        tinymce.get('tinymce-default').setContent(res.data.noi_dung_bai_tap);
                        $('#han_nop').val(res.data.han_nop);

                        $('#editModal').modal('show');
                        $('#editModal').attr('data-id', id);
                    } else {
                        toastr.error(res.message);
                    }
                },
                error: function () {
                    toastr.error('Không thể lấy thông tin bài tập.');
                }
            });
        });


        // Handle Update Form Submission
        $('#formThem').on('submit', function (e) {
            e.preventDefault();
            tinyMCE.triggerSave();
            var id = $('#editModal').data('id');
            var url = "{{ route('bai-tap.update', ':id') }}".replace(':id', id);
            var formData = new FormData(this);

            $.ajax({
                url: url,
                type: 'POST',
                data: formData,
                contentType: false,
                processData: false,
                success: function (res) {
                    if (res.status === 'success') {
                        toastr.success(res.message);
                        $('#editModal').modal('hide');
                        setTimeout(function () {
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
        $(document).on('click', '.deleteItem', function () {
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
                        success: function (res) {
                            if (res.status === 'success') {
                                toastr.success(res.message);
                                setTimeout(function () {
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
@section('scripts')
    <script>
        $(document).ready(function () {
            // Dropzone Configuration
            let myDropzone = new Dropzone("#dropzone-multiple", {
                paramName: "file",
                maxFilesize: 100, // Giới hạn kích thước file (MB)
                addRemoveLinks: true,
                headers: {
                    'X-CSRF-TOKEN': "{{ csrf_token() }}"
                },
                init: function () {
                    this.on("success", function (file, response) {
                        if (response.status === 'success') {
                            toastr.success(response.message);
                            // Sau khi upload xong, reload để cập nhật bảng file
                            setTimeout(function () {
                                location.reload();
                            }, 500);
                        } else {
                            toastr.error(response.message);
                        }
                    });

                    this.on("error", function (file, errorMessage) {
                        toastr.error('Đã xảy ra lỗi khi upload file.');
                    });
                }
            });

            // Handle Delete File Button Click
            $(document).on('click', '.deleteFile', function () {
                var fileId = $(this).data('id');

                Swal.fire({
                    title: 'Xóa file?',
                    text: "Bạn có chắc chắn muốn xóa file này?",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Xóa',
                    cancelButtonText: 'Hủy'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: "{{ route('bai-tap.delete-file', ':id') }}".replace(':id', fileId),
                            type: 'DELETE',
                            data: {
                                _token: '{{ csrf_token() }}',
                            },
                            success: function (res) {
                                if (res.status === 'success') {
                                    toastr.success(res.message);
                                    // Remove the table row
                                    $('#file-row-' + fileId).remove();
                                } else {
                                    toastr.error(res.message);
                                }
                            },
                            error: function (xhr) {
                                if (xhr.status === 404) {
                                    toastr.error('File không tồn tại.');
                                } else if (xhr.status === 403) {
                                    toastr.error('Bạn không có quyền xóa file này.');
                                } else {
                                    toastr.error('Có lỗi xảy ra. Vui lòng thử lại.');
                                }
                            }
                        });
                    }
                });
            });

            // Xử lý sự kiện click vào nút "Danh sách sinh viên đã nộp"
            $(document).on('click', '.showListNopBT', function () {
                var ma_bai_tap = $(this).data('id');
                // Xóa dữ liệu cũ
                $('#listNopBTBody').empty();
                // Gửi yêu cầu AJAX để lấy danh sách
                $.ajax({
                    url: "{{ route('bai-tap.list-nop-bt', ':ma_bai_tap') }}".replace(':ma_bai_tap', ma_bai_tap),
                    type: 'GET',
                    dataType: 'json',
                    success: function (response) {
                        if (response.status === 'success') {
                            var list = response.data;
                            if (list.length > 0) {
                                $.each(list, function (index, item) {
                                    var filesHtml = '';
                                    $.each(item.files, function (i, file) {
                                        filesHtml += '<div>' + file.ten_file + '</div>';
                                    });
                                    var row = '<tr>' +
                                        '<td>' + item.stt + '</td>' +
                                        '<td>' + item.ten_sinh_vien + '</td>' +
                                        '<td>' + filesHtml + '</td>' +
                                        '</tr>';
                                    $('#listNopBTBody').append(row);
                                });
                            } else {
                                $('#listNopBTBody').append('<tr><td colspan="3">Không có dữ liệu.</td></tr>');
                            }
                            // Hiển thị modal
                            $('#listNopBTModal').modal('show');
                        } else {
                            toastr.error('Không lấy được danh sách sinh viên đã nộp.');
                        }
                    },
                    error: function (xhr) {
                        toastr.error('Có lỗi xảy ra khi lấy danh sách sinh viên đã nộp.');
                    }
                });
            });

            // Kiểm tra thời gian hạn nộp ở phía client
            const deadline = new Date("{{ $baiTap->han_nop->toIso8601String() }}");
            const countdownElement = document.getElementById('countdown-timer');

            function updateCountdown() {
                const now = new Date();
                const distance = deadline - now;

                if (distance < 0) {
                    // Hết hạn
                    if (countdownElement) {
                        countdownElement.innerHTML = "Hết hạn nộp bài.";
                    }
                    // Ẩn form nộp bài và hiển thị thông báo nếu chưa bị ẩn
                    const dropzoneForm = document.getElementById('dropzone-multiple');
                    if (dropzoneForm && dropzoneForm.style.display !== 'none') {
                        dropzoneForm.style.display = 'none';
                    }

                    const deadlineMessage = document.getElementById('deadline-message');
                    if (deadlineMessage && deadlineMessage.style.display !== 'block') {
                        deadlineMessage.style.display = 'block';
                    }

                    clearInterval(countdownInterval); // Ngừng kiểm tra
                    return;
                }

                const days = Math.floor(distance / (1000 * 60 * 60 * 24));
                const hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                const minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                const seconds = Math.floor((distance % (1000 * 60)) / 1000);

                if (countdownElement) {
                    countdownElement.innerHTML = `Còn lại: ${days} ngày ${hours} giờ ${minutes} phút ${seconds} giây`;
                }
            }

            // Gọi ngay lần đầu để cập nhật
            updateCountdown();

            // Cập nhật đếm ngược mỗi giây
            const countdownInterval = setInterval(updateCountdown, 1000);
        });
    </script>
@endsection
