@extends('master')
@section("contents")
    <div class="container-fluid mt-4">
        <div class="d-flex justify-content-between mb-4 p-3 border rounded position-relative">
            <div class="d-flex flex-column">
                <h2 class="text-danger fw-bold mb-0 me-3">
                    {{ $chiTietLHP->ten_lop_hoc_phan }} - {{ $chiTietLHP->ten_hoc_phan }} ({{ $chiTietLHP->so_chi_ly_thuyet }}.{{ $chiTietLHP->so_chi_thuc_hanh }}) - GV: {{ $chiTietLHP->ten_nguoi_dung }}
                </h2>
                <nav class="breadcrumb p-0 mb-0 mt-2">
                    <a href="" class="breadcrumb-item">Nhà của tôi</a>
                    <a href="#" class="breadcrumb-item">Khóa học</a>
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
            <p>Bạn cần ghi danh để xem thông tin của lớp <span class="text-danger">{{ $chiTietLHP->ten_lop_hoc_phan }}</span></p>
        @else
            <div class="d-flex justify-content-between align-items-center mb-4">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalAddBaiGiang">
                    Thêm bài giảng
                </button>
            </div>

{{--            <!-- Modal thêm bài giảng -->--}}
{{--            <div class="modal fade" id="modalAddBaiGiang" tabindex="-1" aria-labelledby="modalAddBaiGiangLabel" aria-hidden="true">--}}
{{--                <div class="modal-dialog">--}}
{{--                    <div class="modal-content">--}}
{{--                        <div class="modal-header">--}}
{{--                            <h5 class="modal-title" id="modalAddBaiGiangLabel">Thêm Bài Giảng</h5>--}}
{{--                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>--}}
{{--                        </div>--}}
{{--                        <div class="modal-body">--}}
{{--                            <form id="formAddBaiGiang" action="{{ route('add-bai-giang') }}" method="POST" enctype="multipart/form-data">--}}
{{--                                @csrf--}}
{{--                                <input type="hidden" name="ma_hoc_phan" value="{{ $dsBaiGiang->id_hoc_phan }}">--}}
{{--                                <input type="hidden" name="id_lop_hoc_phan" value="{{ $dsBaiGiang->id_lop_hoc_phan }}">--}}
{{--                                <div class="mb-3">--}}
{{--                                    <label for="ten_bai_giang" class="form-label">Tên bài giảng</label>--}}
{{--                                    <input type="text" class="form-control" id="ten_bai_giang" name="ten_bai_giang" placeholder="Nhập tên bài giảng" required>--}}
{{--                                </div>--}}
{{--                                <div class="mb-3">--}}
{{--                                    <label for="noi_dung_bai_giang" class="form-label">Nội dung bài giảng</label>--}}
{{--                                    <textarea class="form-control" id="noi_dung_bai_giang" name="noi_dung_bai_giang" rows="3" placeholder="Nhập nội dung bài giảng"></textarea>--}}
{{--                                </div>--}}
{{--                                <div class="mb-3">--}}
{{--                                    <label for="file" class="form-label">Tải lên file</label>--}}
{{--                                    <input type="file" class="form-control" id="file" name="file" accept=".doc,.docx,.pdf,.xlsx,.xls">--}}
{{--                                </div>--}}
{{--                                <div class="mb-3">--}}
{{--                                    <label for="video" class="form-label">Tải lên video</label>--}}
{{--                                    <input type="file" class="form-control" id="video" name="video" accept="video/*">--}}
{{--                                </div>--}}
{{--                                <div class="mb-3">--}}
{{--                                    <label for="link" class="form-label">Link bài giảng</label>--}}
{{--                                    <input type="url" class="form-control" id="link" name="link" placeholder="Nhập link bài giảng (nếu có)">--}}
{{--                                </div>--}}
{{--                                <button type="submit" class="btn btn-primary w-100">Thêm bài giảng</button>--}}
{{--                            </form>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
            <!-- Modal thêm bài giảng -->
            <div class="modal fade" id="modalAddBaiGiang" tabindex="-1" aria-labelledby="modalAddBaiGiangLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="modalAddBaiGiangLabel">Thêm Bài Giảng</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form id="formAddBaiGiang" enctype="multipart/form-data">
                                @csrf
                                <input name="id_lop_hoc_phan"  value="{{$chiTietLHP->id_lop_hoc_phan}}">
                                <!-- Tên bài giảng -->
                                <div class="mb-3">
                                    <label for="ten_bai_giang" class="form-label">Tên bài giảng</label>
                                    <input type="text" class="form-control" id="ten_bai_giang" name="ten_bai_giang" placeholder="Nhập tên bài giảng" required>
                                </div>

                                <!-- Nội dung bài giảng -->
                                <div class="mb-3">
                                    <label for="noi_dung_bai_giang" class="form-label">Nội dung bài giảng</label>
                                    <textarea class="form-control" id="noi_dung_bai_giang" name="noi_dung_bai_giang" rows="3" placeholder="Nhập nội dung bài giảng"></textarea>
                                </div>

                                <!-- Tải lên file -->
                                <div class="mb-3">
                                    <label for="file" class="form-label">Tải lên tài liệu</label>
                                    <input type="file" class="form-control" id="file" name="file" accept=".doc,.docx,.pdf,.xls,.xlsx">
                                </div>

                                <!-- Tải lên video -->
                                <div class="mb-3">
                                    <label for="video" class="form-label">Tải lên video</label>
                                    <input type="file" class="form-control" id="video" name="video" accept="video/*">
                                </div>

                                <!-- Link bài giảng -->
                                <div class="mb-3">
                                    <label for="link" class="form-label">Link bài giảng</label>
                                    <input type="url" class="form-control" id="link" name="link" placeholder="Nhập link bài giảng (nếu có)">
                                </div>

                                <!-- Kiểm tra -->
                                <div class="mb-3">
                                    <label for="kiem_tra" class="form-label">Kiểm tra</label>
                                    <input type="text" class="form-control" id="kiem_tra" name="kiem_tra" placeholder="Nhập link hoặc thông tin kiểm tra">
                                </div>

                                <!-- Bài tập -->
                                <div class="mb-3">
                                    <label for="bai_tap" class="form-label">Bài tập</label>
                                    <input type="text" class="form-control" id="bai_tap" name="bai_tap" placeholder="Nhập link hoặc thông tin bài tập">
                                </div>

                                <button type="submit" class="btn btn-primary w-100">Thêm bài giảng</button>
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
                        <li class="list-group-item p-4" style="border: 1px solid #ddd; border-radius: 0; margin-bottom: 0; background: #fff;">
                            <div class="d-flex flex-column position-relative">
                                <div class="dropdown ms-auto position-absolute top-0 end-0" style="z-index: 10;">
                                    <button class="btn btn-link text-dark dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false"></button>
                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        <li><a class="dropdown-item" href="#">Chỉnh sửa bài giảng</a></li>
                                    </ul>
                                </div>

                                <!-- Tiêu đề bài giảng -->
                                <h3 class="fw-bold mb-3 text-primary" style="font-size: 1.5rem;">
                                    <i class="bi bi-book-fill me-2"></i>{{ $baiGiang->ten_bai_giang }}
                                </h3>
                                <!-- Mô tả ngắn -->
                                <p class="text-dark small mb-4" style="line-height: 1.6;">
                                    {{ $baiGiang->noi_dung_bai_giang }}
                                </p>

                                <!-- Tài liệu -->
                                @if($baiGiang->file_path)
                                    <div class="mb-3">
                                        <h5 class="fw-bold mb-1 d-flex align-items-center">
                                            <i class="bi bi-file-earmark-text-fill me-2" style="font-size: 1.2rem; color: #17a2b8;"></i>
                                            Tài liệu:
                                        </h5>
                                        <p class="text-dark ms-4">
                                            <a href="#" data-bs-toggle="modal" data-bs-target="#fileModal"
                                               class="text-decoration-none">
                                                Xem tài liệu
                                            </a>
                                        </p>
                                    </div>

                                    <!-- Modal Tài liệu -->
                                    <div class="modal fade" id="fileModal" tabindex="-1" aria-labelledby="fileModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-lg">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="fileModalLabel">Tài liệu</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <h5 class="bi bi-file-earmark-pdf-fill text-dark ms-4">
                                                        <a href="{{ asset('storage/' . $baiGiang->file_path) }}"
                                                           target="_blank"
                                                           class="text-decoration-none">
                                                            {{ asset('storage/' . $baiGiang->file_path) }}
                                                        </a>
                                                    </h5>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endif

                                <!-- Video -->
                                @if($baiGiang->video_path)
                                    <div class="mb-3">
                                        <h5 class="fw-bold mb-1 d-flex align-items-center">
                                            <i class="bi bi-play-circle-fill me-2" style="font-size: 1.2rem; color: #ffc107;"></i>
                                            Link video:
                                        </h5>
                                        <p class="text-dark ms-4">
                                            <a href="#" data-bs-toggle="modal" data-bs-target="#videoModal"
                                               class="text-decoration-none">
                                                Xem video
                                            </a>
                                        </p>
                                    </div>

                                    <!-- Modal Video -->
                                    <div class="modal fade" id="videoModal" tabindex="-1" aria-labelledby="videoModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-lg">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="videoModalLabel">Video</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <h5 class="text-dark ms-4">
                                                        <a href="{{ asset('storage/' . $baiGiang->video_path) }}"
                                                           target="_blank"
                                                           class="bi bi-play-circle-fill text-decoration-none">
                                                            {{ asset('storage/' . $baiGiang->video_path) }}
                                                        </a>
                                                    </h5>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endif

                                <!-- Link học trực tuyến -->
                                @if($baiGiang->link)
                                    <div>
                                        <h5 class="fw-bold mb-1 d-flex align-items-center">
                                            <i class="bi bi-box-arrow-up-right me-2" style="font-size: 1.2rem; color: #28a745;"></i>
                                            Link học trực tuyến:
                                        </h5>
                                        <p class="text-dark ms-4">
                                            <a href="{{ $baiGiang->link }}"
                                               target="_blank"
                                               class="text-decoration-none">
                                                {{ $baiGiang->link }}
                                            </a>
                                        </p>
                                    </div>
                                @endif

                                <!-- Bài tập -->
                                @if($baiGiang->bai_tap)
                                    <div class="mb-3">
                                        <h5 class="fw-bold mb-1 d-flex align-items-center">
                                            <i class="bi bi-pencil-square me-2" style="font-size: 1.2rem; color: #007bff;"></i>
                                            Bài tập:
                                        </h5>
                                        <p class="text-dark ms-4">
                                            <a href="{{ route('bai-tap', ['id' => $baiGiang->ma_bai_giang]) }}"
                                               class="text-decoration-none">
                                                Xem bài tập
                                            </a>
                                        </p>
                                    </div>
                                @endif

                                <!-- Kiểm tra -->
                                @if($baiGiang->kiem_tra)
                                    <div class="mb-3">
                                        <h5 class="fw-bold mb-1 d-flex align-items-center">
                                            <i class="bi bi-file-earmark-check-fill me-2" style="font-size: 1.2rem; color: #dc3545;"></i>
                                            Bài kiểm tra:
                                        </h5>
                                        <p class="text-dark ms-4">
                                            <a href="{{ route('bai-tap', ['id' => $baiGiang->ma_bai_giang]) }}"
                                               class="text-decoration-none">
                                                Xem bài kiểm tra
                                            </a>
                                        </p>
                                    </div>
                                @endif
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>
        @endif
    </div>

    <script>
        document.querySelector('.thamGiaLHP').addEventListener('click', function() {
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
                                Swal.fire('Thành công!', data.message, 'success').then(() => location.reload());
                            } else {
                                Swal.fire('Lỗi!', 'Có lỗi xảy ra, vui lòng thử lại.', 'error');
                            }
                        })
                        .catch(error => Swal.fire('Lỗi!', 'Không thể kết nối đến server.', 'error'));
                }
            });
        });
    </script>
    <script>
        $('#formAddBaiGiang').submit(function (e) {
            e.preventDefault();

            var formData = new FormData(this);

            $.ajax({
                url: '{{ route('add-bai-giang') }}',
                method: 'POST',
                data: formData,
                contentType: false,
                processData: false,
                success: function (response) {
                    console.log('AJAX Success:', response);
                    if (response.success) {
                        console.log('Message:', response.message);
                        $('#modalAddBaiGiang').modal('hide');
                        toastr.success(response.message, "Successful");
                        setTimeout(function () {
                            location.reload();
                        }, 500);
                    } else {
                        console.log('Response is not successful:', response);
                        toastr.error(response.message, "Error");
                    }
                },
                error: function (xhr) {
                    console.error('AJAX Error:', xhr);
                    if (xhr.status === 400 || xhr.status === 422) {
                        var response = xhr.responseJSON;
                        toastr.error(response.message || "Validation Error", "Error");
                    } else {
                        toastr.error("An unexpected error occurred", "Error");
                    }
                }


            });
        });
    </script>
@endsection

