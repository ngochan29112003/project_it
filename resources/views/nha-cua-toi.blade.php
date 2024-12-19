@php use Illuminate\Support\Facades\DB; @endphp
@extends('master')
@section('contents')
    <style>
        .text-truncate {
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
            display: block;
        }

        .border-bottom {
            border-bottom: 1px solid #dee2e6; /* Đường gạch ngang màu nhạt */
        }

        .pb-2 {
            padding-bottom: 0.5rem; /* Khoảng cách dưới văn bản */
        }

        .mb-2 {
            margin-bottom: 0.5rem; /* Khoảng cách giữa các mục */
        }

    </style>

    <div class="container-fluid">
        <!-- Header Section -->
        <header id="page-header" class="row py-4">
            <div class="col-12">
                <div class="card shadow-sm border-0">
                    <div class="card-body d-flex align-items-center">
                        <div class="d-flex align-items-center me-auto">
                            <div class="page-header-image">
                                <a href="{{route('thong-tin-tai-khoan')}}">
                                    <img src="{{ asset('assets/img_user/' . ($nguoidung->hinh_anh)) }}" alt="Profile"
                                         class="rounded-circle border" style="width: 100px; height: 100px; object-fit: cover;">
                                </a>
                            </div>
                            <div class="ms-3">
                                <h1 class="h5 fw-bold mb-1">{{ $nguoidung->ten_nguoi_dung }}</h1>
                                <p class="text-muted mb-0">{{ $nguoidung->ten_quyen }} - Khoa Công Nghệ Thông Tin</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
    </div>

{{--    <h5 class="text-primary fw-bold border-bottom pb-2 mb-3">Các khóa học truy cập gần đây</h5>--}}
{{--    <div class="row row-cols-1 row-cols-md-2">--}}
{{--        @if ($khoaHocTruyCap->isEmpty())--}}
{{--            <p class="text-muted">Không có học phần nào được truy cập gần đây.</p>--}}
{{--        @else--}}
{{--            @foreach ($khoaHocTruyCap as $khoaHoc)--}}
{{--                <div class="col">--}}
{{--                    <div class="d-flex align-items-center border-bottom pb-2 mb-2">--}}
{{--                    <span class="text-truncate w-100">--}}
{{--                        <a href="{{ route('chi-tiet-lop-hoc-phan', ['id' => $khoaHoc->id_hoc_phan]) }}"--}}
{{--                           class="text-decoration-none text-dark d-block p-2 bg-light-hover">--}}
{{--                            {{ $khoaHoc->ma_hoc_phan }} - {{ $khoaHoc->ten_hoc_phan }}--}}
{{--                            ({{ $khoaHoc->so_luong_sinh_vien }} sv)--}}
{{--                        </a>--}}
{{--                    </span>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            @endforeach--}}
{{--        @endif--}}
{{--    </div>--}}

    <div class="col-12 mb-4">
        <div class="card shadow-sm border-0">
            <div class="card-body">
                <h5 class="text-primary fw-bold border-bottom pb-2 mb-3">Các khóa học truy cập gần đây</h5>
                <div class="row row-cols-1 row-cols-md-2">
                    <div class="col">
                        <div class="d-flex align-items-center border-bottom pb-2 mb-2">
                        <span class="text-truncate w-100">
                            <a href="#" class="text-decoration-none text-dark d-block p-2 bg-light-hover">241_1TH1314_(BT)_KS2A_04_tructiep (27 sv) TH1314_(BT) - Lập trình mạng (2.1)</a>
                        </span>
                        </div>
                    </div>
                    <div class="col">
                        <div class="d-flex align-items-center border-bottom pb-2 mb-2">
                        <span class="text-truncate w-100">
                            <a href="#" class="text-decoration-none text-dark d-block p-2 bg-light-hover">241_1TH1314_KS2A_02_tructiep (63 sv) TH1314 - Lập trình mạng (2.1)</a>
                        </span>
                        </div>
                    </div>
                    <div class="col">
                        <div class="d-flex align-items-center border-bottom pb-2 mb-2">
                        <span class="text-truncate w-100">
                            <a href="#" class="text-decoration-none text-dark d-block p-2 bg-light-hover">241_1TH1606_KS2A (42 sv) TH1606 - Thương mại điện tử (2.1)</a>
                        </span>
                        </div>
                    </div>
                    <div class="col">
                        <div class="d-flex align-items-center border-bottom pb-2 mb-2">
                        <span class="text-truncate w-100">
                            <a href="#" class="text-decoration-none text-dark d-block p-2 bg-light-hover">211_1TH1203_02 (59 sv) TH1203 - Toán rời rạc (2.0) GV: Lê Hoàng An</a>
                        </span>
                        </div>
                    </div>
                    <div class="col">
                        <div class="d-flex align-items-center border-bottom pb-2 mb-2">
                        <span class="text-truncate w-100">
                            <a href="#" class="text-decoration-none text-dark d-block p-2 bg-light-hover">241_1TH1370_KS2A_02_tructiep (52 sv) TH1370 - Triển khai hệ thống mạng</a>
                        </span>
                        </div>
                    </div>
                    <div class="col">
                        <div class="d-flex align-items-center border-bottom pb-2 mb-2">
                        <span class="text-truncate w-100">
                            <a href="#" class="text-decoration-none text-dark d-block p-2 bg-light-hover">211_1TH1201_02 (59 sv) TH1201 - Tin học cơ sở (2.0) GV: Trần Thu Mai</a>
                        </span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Các học phần đã ghi danh -->
            <div class="col-12 mb-4">
                <div class="card shadow border-0">
                    <div class="card-header bg-primary text-white">
                        <h5 class="mb-0">Các học phần đã ghi danh</h5>
                    </div>
                    <div class="card-body">
                        @if ($hocphandaghi->isEmpty())
                            <div class="alert alert-warning text-center" role="alert">
                                Bạn chưa ghi danh vào học phần nào.
                            </div>
                        @else
                            <div class="list-group">
                                @foreach ($hocphandaghi as $hocphan)
                                    <div class="list-group-item list-group-item-action d-flex flex-column flex-md-row justify-content-between align-items-start">
                                        <div>
                                            <h6 class="fw-bold text-primary">{{ $hocphan->ten_hoc_phan }} <span class="badge bg-secondary">Mã: {{ $hocphan->ma_hoc_phan }}</span></h6>
                                            <p class="mb-1 text-muted small">Lớp học phần: <span class="fw-bold">{{ $hocphan->ten_lop_hoc_phan }}</span></p>
                                            <p class="mb-0 text-muted small">Giảng viên: <span class="fw-bold">{{ $hocphan->ten_giang_vien }}</span></p>
                                        </div>
                                        <div class="mt-3 mt-md-0">
                                            <a href="{{route('chi-tiet-lop-hoc-phan',['id'=>$hocphan->id_lop_hoc_phan])}}" class="btn btn-sm btn-outline-primary">Xem chi tiết</a>
                                            <button class="btn btn-sm btn-outline-danger" data-id="{{ $hocphan->ma_ghi_danh }}">Rút học phần</button>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        $('.btn-outline-danger').on('click', function () {
            var ma_ghidanh = $(this).data('id'); // Lấy ma_ghi_danh từ thuộc tính data-id của nút
            var row = $(this).closest('.list-group-item'); // Lấy dòng chứa học phần

            // Hiển thị confirm box
            Swal.fire({
                title: 'Bạn có chắc chắn?',
                text: "Bạn muốn rút học phần này?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Vâng, rút học phần!'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Gửi yêu cầu AJAX đến server để xóa ghi danh
                    $.ajax({
                        url: '{{ url("nha-cua-toi/delete") }}/' + ma_ghidanh, // Sử dụng id trong URL
                        type: 'DELETE', // Đảm bảo sử dụng phương thức DELETE
                        data: {
                            _token: '{{ csrf_token() }}',
                        },
                        success: function(response) {
                            if (response.success) {
                                toastr.success(response.message, "Thành công");
                                row.remove(); // Xóa dòng học phần khỏi danh sách
                            } else {
                                toastr.error(response.message, "Lỗi");
                            }
                        },
                        error: function(xhr) {
                            toastr.error("Có lỗi xảy ra, vui lòng thử lại!", "Thất bại");
                        }
                    });
                }
            });
        });

    </script>

@endsection
