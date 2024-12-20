@extends('master')
@section('contents')
    <div class="container-fluid mt-4">
        <!-- Phần tiêu đề và breadcrumb -->
        <div class="d-flex justify-content-between mb-4 p-3 border rounded position-relative">
            <div class="d-flex flex-column">
                <h2 class="text-danger fw-bold mb-0 me-3">
                    {{ $chiTietLHP->ten_lop_hoc_phan }} - {{ $chiTietLHP->ten_hoc_phan }}
                    ({{ $chiTietLHP->so_chi_ly_thuyet }}.{{ $chiTietLHP->so_chi_thuc_hanh }}) -
                    GV: {{ $chiTietLHP->ten_nguoi_dung }}
                </h2>
                <nav class="breadcrumb p-0 mb-0 mt-2">
                    <a href="{{route('nha-cua-toi')}}" class="breadcrumb-item">Nhà của tôi</a>
                    <a href="{{route('trang-chu')}}" class="breadcrumb-item">Khóa học</a>
                    <span class="breadcrumb-item active">{{ $chiTietLHP->ten_hoc_ky }}</span>
                    <span class="breadcrumb-item active">{{ $chiTietLHP->ten_lop_hoc_phan }}</span>
                </nav>
            </div>
            @if(!$daGhiDanh)
                <button type="button" class="btn btn-danger align-self-start thamGiaLHP">
                    <i class="bi bi-key"></i> Ghi danh tôi vào lớp
                </button>
            @endif
        </div>

        @if(!$daGhiDanh)
            <p>Bạn cần ghi danh để xem thông tin của lớp <span
                    class="text-danger">{{ $chiTietLHP->ten_lop_hoc_phan }}</span></p>
        @else
            <div class="d-flex justify-content-between align-items-center mb-4">
                @if(session('ma_nguoi_dung') == $chiTietLHP->giang_vien)
                    <div class="d-flex gap-2">
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalAddBaiGiang">
                            Thêm bài giảng
                        </button>
                        <a href="{{ route('export-danh-sach-sv-lhp', ['id' => $chiTietLHP->id_lop_hoc_phan]) }}"
                           class="btn btn-success btn-export">
                            <i class="bi bi-file-earmark-arrow-down pe-2"></i>
                            Danh sách sinh viên
                        </a>
                        <a type="button" class="btn btn-success "
                           href="{{route('diem-danh',['ma_hoc_phan' => $chiTietLHP->id_lop_hoc_phan, 'ten_lop_hoc_phan' => $chiTietLHP->ten_lop_hoc_phan])}}">
                            Điểm danh
                        </a>
                    </div>
                @endif
            </div>

            <!-- Modal thêm bài giảng -->
            <div class="modal fade" id="modalAddBaiGiang" tabindex="-1" aria-labelledby="modalAddBaiGiangLabel"
                 aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="modalAddBaiGiangLabel">Thêm Bài Giảng</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form id="formAddBaiGiang" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="id_lop_hoc_phan" value="{{ $chiTietLHP->id_lop_hoc_phan }}">
                                <input type="hidden" name="trang_thai" value="0">

                                <!-- Tên bài giảng -->
                                <div class="mb-3">
                                    <label for="ten_bai_giang" class="form-label">Tên bài giảng</label>
                                    <input type="text" class="form-control" id="ten_bai_giang" name="ten_bai_giang"
                                           placeholder="Nhập tên bài giảng" required>
                                </div>

                                <!-- Nội dung bài giảng -->
                                <div class="mb-3">
                                    <label for="noi_dung_bai_giang" class="form-label">Nội dung</label>
                                    <textarea class="form-control" id="noi_dung_bai_giang" name="noi_dung_bai_giang"
                                              rows="3" placeholder="Nhập nội dung bài giảng"></textarea>
                                </div>

                                <!-- Tải lên file -->
                                <div class="mb-3">
                                    <label for="file" class="form-label">Tải lên tài liệu</label>
                                    <input class="form-control" type="file" id="file" name="files[]" multiple>
                                    <ul id="fileList" class="list-unstyled mt-2"></ul>
                                </div>

                                <!-- Link video -->
                                <div class="mb-3">
                                    <label for="video_path" class="form-label">Tải lên video</label>
                                    <input type="url" class="form-control" id="video_path" name="video_path"
                                           placeholder="Nhập link video bài giảng (nếu có)">
                                </div>

                                <!-- Link bài giảng -->
                                <div class="mb-3">
                                    <label for="link" class="form-label">Link bài giảng</label>
                                    <input type="url" class="form-control" id="link" name="link"
                                           placeholder="Nhập link bài giảng (nếu có)">
                                </div>

                                <!-- Kiểm tra -->
                                <div class="mb-3 form-check">
                                    <input type="checkbox" class="form-check-input" id="kiem_tra">
                                    <label for="kiem_tra" class="form-check-label">Kiểm tra</label>
                                    <input type="hidden" id="kiem_tra_hidden" name="kiem_tra" value="0">
                                </div>

                                <!-- Bài tập -->
                                <div class="mb-3 form-check">
                                    <input type="checkbox" class="form-check-input" id="bai_tap">
                                    <label for="bai_tap" class="form-check-label">Bài tập</label>
                                    <input type="hidden" id="bai_tap_hidden" name="bai_tap" value="0">
                                </div>

                                <button type="submit" class="btn btn-primary w-100">Thêm bài giảng</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Modal sửa bài giảng -->
            <div class="modal fade" id="modalEditBaiGiang" tabindex="-1" aria-labelledby="modalEditBaiGiangLabel"
                 aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="modalEditBaiGiangLabel">Chỉnh sửa Bài Giảng</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form id="formEditBaiGiang" enctype="multipart/form-data">
                                @csrf

                                <!-- Trường ẩn để lưu ID bài giảng -->
                                <input type="hidden" id="bai_giang_id" name="bai_giang_id" value="">

                                <!-- Trường ẩn để lưu danh sách các tệp tin cần xóa -->
                                <input type="hidden" id="filesToDelete" name="files_to_delete" value="">

                                <input type="hidden" name="id_lop_hoc_phan" value="{{ $chiTietLHP->id_lop_hoc_phan }}">
                                <input type="hidden" name="trang_thai" value="0">

                                <!-- Tên bài giảng -->
                                <div class="mb-3">
                                    <label for="edit_ten_bai_giang" class="form-label">Tên bài giảng</label>
                                    <input type="text" class="form-control" id="edit_ten_bai_giang" name="ten_bai_giang"
                                           placeholder="Nhập tên bài giảng" required>
                                </div>

                                <!-- Nội dung bài giảng -->
                                <div class="mb-3">
                                    <label for="edit_noi_dung_bai_giang" class="form-label">Nội dung</label>
                                    <textarea class="form-control" id="edit_noi_dung_bai_giang"
                                              name="noi_dung_bai_giang" rows="3"
                                              placeholder="Nhập nội dung bài giảng"></textarea>
                                </div>

                                <!-- Tải lên tệp tin mới -->
                                <div class="mb-3">
                                    <label for="edit_files" class="form-label">Thêm tệp tin</label>
                                    <input class="form-control" type="file" id="edit_files" name="files[]" multiple>
                                    <ul id="editFileList" class="list-unstyled mt-2"></ul>
                                </div>

                                <!-- Danh sách tệp tin hiện có -->
                                <div class="mb-3">
                                    <label class="form-label">Tệp tin hiện có</label>
                                    <ul id="existingFileList" class="list-group">
                                        <!-- Các tệp tin sẽ được thêm vào đây bằng JavaScript -->
                                    </ul>
                                </div>

                                <!-- Link video -->
                                <div class="mb-3">
                                    <label for="edit_video_path" class="form-label">Tải lên video</label>
                                    <input type="url" class="form-control" id="edit_video_path" name="video_path"
                                           placeholder="Nhập link video bài giảng (nếu có)">
                                </div>

                                <!-- Link bài giảng -->
                                <div class="mb-3">
                                    <label for="edit_link" class="form-label">Link bài giảng</label>
                                    <input type="url" class="form-control" id="edit_link" name="link"
                                           placeholder="Nhập link bài giảng (nếu có)">
                                </div>

                                <!-- Kiểm tra -->
                                <div class="mb-3 form-check">
                                    <input type="checkbox" class="form-check-input" id="edit_kiem_tra">
                                    <label for="edit_kiem_tra" class="form-check-label">Kiểm tra</label>
                                    <input type="hidden" id="edit_kiem_tra_hidden" name="kiem_tra" value="0">
                                </div>

                                <!-- Bài tập -->
                                <div class="mb-3 form-check">
                                    <input type="checkbox" class="form-check-input" id="edit_bai_tap">
                                    <label for="edit_bai_tap" class="form-check-label">Bài tập</label>
                                    <input type="hidden" id="edit_bai_tap_hidden" name="bai_tap" value="0">
                                </div>

                                <button type="submit" class="btn btn-primary w-100">Cập nhật bài giảng</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Danh sách bài giảng -->
            @if(session('success'))
                <div class="alert alert-success mt-4">
                    {{ session('success') }}
                </div>
            @endif

            <div class="mt-4">
                <ul class="list-group">
                    @foreach($dsBaiGiang as $baiGiang)
                        @if(session('ma_quyen') == 2 || ($baiGiang->trang_thai != 1 && session('ma_quyen') == 3))
                            <li class="list-group-item p-4"
                                style="border: 1px solid #ddd; border-radius: 0; margin-bottom: 0; background: {{ $baiGiang->trang_thai == 1 && session('ma_quyen') == 2 ? '#f5f5f5' : '#fff' }};">

                                <div class="d-flex flex-column position-relative">
                                    @if(session('ma_nguoi_dung') == $chiTietLHP->giang_vien)
                                        <!-- Dropdown menu -->
                                        <div class="dropdown ms-auto position-absolute top-0 end-0"
                                             style="z-index: 10;">
                                            <button class="btn btn-link text-dark dropdown-toggle" type="button"
                                                    id="dropdownMenuButton{{ $baiGiang->ma_bai_giang }}"
                                                    data-bs-toggle="dropdown" aria-expanded="false"></button>
                                            <ul class="dropdown-menu"
                                                aria-labelledby="dropdownMenuButton{{ $baiGiang->ma_bai_giang }}">
                                                <li>
                                                    <a class="dropdown-item editItem" href="javascript:void(0);"
                                                       data-id="{{ $baiGiang->ma_bai_giang }}">Chỉnh sửa</a>
                                                </li>
                                                @if($baiGiang->trang_thai == 1)
                                                    <li><a class="dropdown-item"
                                                           href="{{ route('bai-giang.hien', ['id' => $baiGiang->ma_bai_giang]) }}">Hiện</a>
                                                    </li>
                                                @else
                                                    <li><a class="dropdown-item"
                                                           href="{{ route('bai-giang.an', ['id' => $baiGiang->ma_bai_giang]) }}">Ẩn</a>
                                                    </li>
                                                @endif
                                                <li>
                                                    <a class="dropdown-item deleteItem"
                                                       data-id="{{ $baiGiang->ma_bai_giang }}"
                                                       href="javascript:void(0);">Xóa</a>
                                                </li>
                                            </ul>
                                        </div>
                                    @endif

                                    <!-- Tiêu đề bài giảng -->
                                    <h3 class="fw-bold mb-3 text-primary" style="font-size: 1.5rem;">
                                        <i class="bi bi-book-fill me-2"></i>{{ $baiGiang->ten_bai_giang }}
                                    </h3>

                                    <!-- Mô tả ngắn -->
                                    <p class="text-dark small mb-4" style="line-height: 1.6;">
                                        {{ $baiGiang->noi_dung_bai_giang }}
                                    </p>

                                    <!-- Tài liệu -->
                                    @if($baiGiang->files && $baiGiang->files->count() > 0)
                                        <div class="mb-3">
                                            <h5 class="fw-bold mb-1 d-flex align-items-center">
                                                <i class="bi bi-file-earmark-text-fill me-2"
                                                   style="font-size: 1.2rem; color: #17a2b8;"></i>
                                                <button class="btn btn-link text-decoration-none p-0 text-dark"
                                                        data-bs-toggle="collapse"
                                                        data-bs-target="#files-{{ $baiGiang->ma_bai_giang }}"
                                                        aria-expanded="false"
                                                        aria-controls="files-{{ $baiGiang->ma_bai_giang }}">
                                                    Tài liệu đính kèm ({{ $baiGiang->files->count() }})
                                                </button>
                                            </h5>
                                            <div class="collapse mt-2" id="files-{{ $baiGiang->ma_bai_giang }}">
                                                <ul class="list-group">
                                                    @foreach($baiGiang->files as $file)
                                                        <li class="list-group-item">
                                                            <a href="{{ asset('file_bai_giang/' . $file->file) }}"
                                                               target="_blank" class="text-decoration-none">
                                                                {{ $file->file }}
                                                            </a>
                                                        </li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        </div>
                                    @endif

                                    <!-- Video -->
                                    @if($baiGiang->video_path)
                                        <div>
                                            <h5 class="fw-bold mb-1 d-flex align-items-center">
                                                <i class="bi bi-camera-video me-2"
                                                   style="font-size: 1.2rem; color: #9628a7;"></i>
                                                Video bài giảng:
                                            </h5>
                                            <p class="text-dark ms-4">
                                                <a href="{{ $baiGiang->video_path }}" target="_blank"
                                                   class="text-decoration-none">
                                                    {{ $baiGiang->video_path }}
                                                </a>
                                            </p>
                                        </div>
                                    @endif

                                    <!-- Link học trực tuyến -->
                                    @if($baiGiang->link)
                                        <div>
                                            <h5 class="fw-bold mb-1 d-flex align-items-center">
                                                <i class="bi bi-box-arrow-up-right me-2"
                                                   style="font-size: 1.2rem; color: #28a745;"></i>
                                                Link học trực tuyến:
                                            </h5>
                                            <p class="text-dark ms-4">
                                                <a href="{{ $baiGiang->link }}" target="_blank"
                                                   class="text-decoration-none">
                                                    {{ $baiGiang->link }}
                                                </a>
                                            </p>
                                        </div>
                                    @endif

                                    <!-- Bài tập -->
                                    @if($baiGiang->bai_tap == 1)
                                        <div class="">
                                            <h5 class="fw-bold mb-1 d-flex align-items-center">
                                                <i class="bi bi-pencil-square me-2"
                                                   style="font-size: 1.2rem; color: #007bff;"></i>
                                                Bài tập:
                                            </h5>
                                            <p class="text-dark ms-4">
                                                <a href="{{ route('bai-tap', ['id' => $chiTietLHP->id_lop_hoc_phan, 'ma_bai_giang' => $baiGiang->ma_bai_giang]) }}"
                                                   class="text-decoration-none">
                                                    Xem bài tập
                                                </a>
                                            </p>
                                        </div>
                                    @endif

                                    <!-- Kiểm tra -->
                                    @if($baiGiang->kiem_tra == 1)
                                        <div class="">
                                            <h5 class="fw-bold mb-1 d-flex align-items-center">
                                                <i class="bi bi-file-earmark-check-fill me-2"
                                                   style="font-size: 1.2rem; color: #dc3545;"></i>
                                                Bài kiểm tra:
                                            </h5>
                                            <p class="text-dark ms-4">
                                                <a href="{{ route('trac-nghiem', ['id' => $chiTietLHP->id_lop_hoc_phan, 'ma_bai_giang' => $baiGiang->ma_bai_giang]) }}"
                                                   class="text-decoration-none">
                                                    Xem bài kiểm tra
                                                </a>
                                            </p>
                                        </div>
                                    @endif
                                </div>
                            </li>
                        @endif
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- JavaScript -->
        <script>
            $(document).ready(function () {
                /**
                 * Xử lý sự kiện xóa bài giảng.
                 */
                $('.deleteItem').click(function (e) {
                    e.preventDefault(); // Ngừng hành động mặc định của thẻ <a>

                    var itemId = $(this).data('id'); // Lấy ID từ thuộc tính data-id

                    Swal.fire({
                        title: 'Bạn có chắc chắn?',
                        text: "Bạn có muốn xóa bài giảng này không?",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Vâng, xóa nó!'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            $.ajax({
                                url: '/chi-tiet-hoc-phan/delete/' + itemId, // URL chứa ID bài giảng
                                type: 'DELETE', // Đảm bảo phương thức là DELETE
                                data: {
                                    _token: '{{ csrf_token() }}' // Thêm CSRF token
                                },
                                success: function (response) {
                                    if (response.success) {
                                        toastr.success(response.message, "Đã xóa thành công");
                                        setTimeout(function () {
                                            location.reload(); // Tự động tải lại trang
                                        }, 500);
                                    } else {
                                        toastr.error("Không thể xóa bài giảng.", "Thất bại");
                                    }
                                },
                                error: function (xhr) {
                                    toastr.error("Đã xảy ra lỗi trong quá trình xóa.", "Thất bại");
                                }
                            });
                        }
                    });
                });

                // Mảng để lưu trữ các ID của tệp tin cần xóa
                const filesToDelete = [];

                // Hàm đánh dấu tệp tin cần xóa và cập nhật trường ẩn
                function markFileForDeletion(fileId) {
                    if (!filesToDelete.includes(fileId)) {
                        filesToDelete.push(fileId);
                        $('#filesToDelete').val(filesToDelete.join(','));
                    }
                }

                /**
                 * Xử lý khi người dùng nhấn vào nút "Chỉnh sửa".
                 */
                $('.editItem').on('click', function () {
                    var baiGiangId = $(this).data('id');

                    // Gọi AJAX để lấy dữ liệu bài giảng
                    $.ajax({
                        url: '/chi-tiet-hoc-phan/edit/' + baiGiangId,
                        type: 'GET',
                        success: function (response) {
                            // Gán dữ liệu vào các trường trong modal
                            $('#edit_ten_bai_giang').val(response.baiGiang.ten_bai_giang);
                            $('#edit_noi_dung_bai_giang').val(response.baiGiang.noi_dung_bai_giang);
                            $('#edit_video_path').val(response.baiGiang.video_path);
                            $('#edit_link').val(response.baiGiang.link);

                            // Thiết lập checkbox Kiểm tra
                            if (response.baiGiang.kiem_tra == 1) {
                                $('#edit_kiem_tra').prop('checked', true);
                                $('#edit_kiem_tra_hidden').val(1);
                            } else {
                                $('#edit_kiem_tra').prop('checked', false);
                                $('#edit_kiem_tra_hidden').val(0);
                            }

                            // Thiết lập checkbox Bài tập
                            if (response.baiGiang.bai_tap == 1) {
                                $('#edit_bai_tap').prop('checked', true);
                                $('#edit_bai_tap_hidden').val(1);
                            } else {
                                $('#edit_bai_tap').prop('checked', false);
                                $('#edit_bai_tap_hidden').val(0);
                            }

                            // Gán ID bài giảng vào trường ẩn
                            $('#bai_giang_id').val(response.baiGiang.ma_bai_giang);

                            // Reset mảng filesToDelete
                            filesToDelete.length = 0;
                            $('#filesToDelete').val('');

                            // Hiển thị danh sách tệp tin hiện có
                            var existingFileList = $('#existingFileList');
                            existingFileList.empty();
                            if (response.baiGiang.files && response.baiGiang.files.length > 0) {
                                response.baiGiang.files.forEach(function (file) {
                                    var listItem = $('<li class="list-group-item d-flex justify-content-between align-items-center"></li>');
                                    var fileLink = $('<a></a>')
                                        .attr('href', '/file_bai_giang/' + file.file)
                                        .attr('target', '_blank')
                                        .text(file.file);
                                    var removeButton = $('<button class="btn btn-danger btn-sm">Remove</button>');

                                    // Thêm sự kiện khi nhấn nút Remove
                                    removeButton.on('click', function (e) {
                                        e.preventDefault();
                                        $(this).parent().remove();
                                        markFileForDeletion(file.id);
                                    });

                                    listItem.append(fileLink);
                                    listItem.append(removeButton);
                                    existingFileList.append(listItem);
                                });
                            }

                            // Mở modal sửa
                            $('#modalEditBaiGiang').modal('show');
                        },
                        error: function () {
                            alert('Có lỗi xảy ra. Vui lòng thử lại.');
                        }
                    });
                });

                /**
                 * Xử lý form thêm bài giảng.
                 */
                $('#formAddBaiGiang').submit(function (e) {
                    e.preventDefault();

                    // Kiểm tra checkbox "Kiểm tra"
                    if ($('#kiem_tra').is(':checked')) {
                        $('#kiem_tra_hidden').val(1);
                    } else {
                        $('#kiem_tra_hidden').val(0);
                    }

                    // Kiểm tra checkbox "Bài tập"
                    if ($('#bai_tap').is(':checked')) {
                        $('#bai_tap_hidden').val(1);
                    } else {
                        $('#bai_tap_hidden').val(0);
                    }

                    var formData = new FormData(this);

                    $.ajax({
                        url: '{{ route('add-bai-giang') }}',
                        method: 'POST',
                        data: formData,
                        contentType: false,
                        processData: false,
                        success: function (response) {
                            if (response.success) {
                                $('#modalAddBaiGiang').modal('hide');
                                toastr.success(response.message, "Thành công");
                                setTimeout(function () {
                                    location.reload();
                                }, 500);
                            } else {
                                toastr.error(response.message, "Lỗi");
                            }
                        },
                        error: function (xhr) {
                            if (xhr.status === 400 || xhr.status === 422) {
                                var response = xhr.responseJSON;
                                toastr.error(response.message || "Lỗi xác thực", "Lỗi");
                            } else {
                                toastr.error("Đã xảy ra lỗi không mong muốn", "Lỗi");
                            }
                        }
                    });
                });

                /**
                 * Quản lý tệp tin thêm mới trong form thêm bài giảng.
                 */
                const fileArray = [];
                const input = document.getElementById('file');

                input.addEventListener('change', function (event) {
                    for (let i = 0; i < input.files.length; i++) {
                        fileArray.push(input.files[i]);
                    }
                    updateFileList();
                });

                function updateFileList() {
                    const dataTransfer = new DataTransfer();
                    fileArray.forEach(file => dataTransfer.items.add(file));
                    input.files = dataTransfer.files;

                    const fileList = document.getElementById('fileList');
                    fileList.innerHTML = '';
                    fileArray.forEach((file, index) => {
                        const li = document.createElement('li');
                        li.className = 'mb-3 d-flex justify-content-between align-items-center text-truncate file-list-item';
                        let displayName = file.name;
                        const extension = displayName.split('.').pop();
                        const baseName = displayName.substring(0, displayName.lastIndexOf('.'));

                        if (baseName.length > 30) {
                            displayName = baseName.substring(0, 25) + '...' + '.' + extension;
                        } else {
                            displayName = baseName + '.' + extension;
                        }

                        li.textContent = displayName + ' ';

                        const removeBtn = document.createElement('button');
                        removeBtn.textContent = 'Remove';
                        removeBtn.className = 'text-right btn btn-danger btn-sm ms-2';
                        removeBtn.onclick = function () {
                            fileArray.splice(index, 1);
                            updateFileList();
                        };

                        li.appendChild(removeBtn);
                        fileList.appendChild(li);
                    });
                }

                /**
                 * Quản lý tệp tin thêm mới trong form sửa bài giảng.
                 */
                const EditfileArray = [];
                const editInput = document.getElementById('edit_files');

                editInput.addEventListener('change', function (event) {
                    for (let i = 0; i < editInput.files.length; i++) {
                        EditfileArray.push(editInput.files[i]);
                    }
                    updateEditFileList();
                });

                function updateEditFileList() {
                    const fileList = document.getElementById('editFileList');
                    fileList.innerHTML = '';

                    EditfileArray.forEach((file, index) => {
                        const listItem = document.createElement('li');
                        listItem.className = 'mb-3 d-flex justify-content-between align-items-center text-truncate';
                        listItem.textContent = file.name;
                        const removeButton = document.createElement('button');
                        removeButton.textContent = 'Remove';
                        removeButton.classList.add('btn', 'btn-danger', 'btn-sm', 'ms-2');
                        removeButton.onclick = () => {
                            EditfileArray.splice(index, 1);
                            updateEditFileList();
                        };
                        listItem.appendChild(removeButton);
                        fileList.appendChild(listItem);
                    });
                }

                /**
                 * Xử lý form sửa bài giảng.
                 */
                $('#formEditBaiGiang').submit(function (e) {
                    e.preventDefault();

                    // Kiểm tra checkbox "Kiểm tra"
                    if ($('#edit_kiem_tra').is(':checked')) {
                        $('#edit_kiem_tra_hidden').val(1);
                    } else {
                        $('#edit_kiem_tra_hidden').val(0);
                    }

                    // Kiểm tra checkbox "Bài tập"
                    if ($('#edit_bai_tap').is(':checked')) {
                        $('#edit_bai_tap_hidden').val(1);
                    } else {
                        $('#edit_bai_tap_hidden').val(0);
                    }

                    var baiGiangId = $('#bai_giang_id').val(); // Lấy ID bài giảng từ trường ẩn
                    var formData = new FormData(this);

                    // Thêm các tệp tin mới từ EditfileArray vào FormData
                    EditfileArray.forEach(file => {
                        formData.append('files[]', file);
                    });

                    $.ajax({
                        url: '/chi-tiet-hoc-phan/update/' + baiGiangId,
                        method: 'POST',
                        data: formData,
                        contentType: false,
                        processData: false,
                        success: function (response) {
                            if (response.success) {
                                $('#modalEditBaiGiang').modal('hide');
                                toastr.success(response.message, "Cập nhật thành công");
                                setTimeout(function () {
                                    location.reload();
                                }, 500);
                            } else {
                                toastr.error(response.message, "Lỗi");
                            }
                        },
                        error: function (xhr) {
                            if (xhr.status === 400 || xhr.status === 422) {
                                var response = xhr.responseJSON;
                                // Hiển thị lỗi xác thực từ từng trường
                                if (response.errors) {
                                    $.each(response.errors, function (key, errors) {
                                        toastr.error(errors[0], "Lỗi " + key);
                                    });
                                } else {
                                    toastr.error(response.message || "Lỗi xác thực", "Lỗi");
                                }
                            } else {
                                toastr.error("Đã xảy ra lỗi không mong muốn", "Lỗi");
                            }
                        }
                    });
                });
            });
        </script>
        <script>
            // Xử lý ghi danh vào lớp
            document.querySelector('.thamGiaLHP')?.addEventListener('click', function () {
                Swal.fire({
                    title: 'Bạn có chắc muốn ghi danh vào lớp này?',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Có, ghi danh!',
                    cancelButtonText: 'Hủy'
                }).then((result) => {
                    if (result.isConfirmed) {
                        fetch('{{ route('thamGiaLop') }}', {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                                'X-CSRF-TOKEN': '{{ csrf_token() }}'
                            },
                            body: JSON.stringify({
                                ma_hoc_phan: {{ $chiTietLHP->id_lop_hoc_phan }}
                            })
                        })
                            .then(response => response.json())
                            .then(data => {
                                if (data.success) {
                                    Swal.fire(
                                        'Thành công!',
                                        data.message,
                                        'success'
                                    ).then(() => {
                                        location.reload();
                                    });
                                } else {
                                    Swal.fire(
                                        'Lỗi!',
                                        'Có lỗi xảy ra, vui lòng thử lại.',
                                        'error'
                                    );
                                }
                            })
                            .catch(error => {
                                Swal.fire(
                                    'Lỗi!',
                                    'Không thể kết nối đến server.',
                                    'error'
                                );
                            });
                    }
                });
            });
        </script>

@endsection
