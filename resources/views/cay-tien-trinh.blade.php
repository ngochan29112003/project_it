@extends('master')
@section("contents")
    <div class="page-header d-print-none">
        <div class="container-xl">
            <div class="row g-2 align-items-center">
                <div class="col">
                    <h2 class="page-title">
                        CÂY TIẾN TRÌNH CÁC KHOA
                    </h2>
                </div>
            </div>
        </div>
    </div>

    <div class="page-body">
        <div class="container-xl">
            <div class="row row-deck row-cards">
                <div class="col-12">
                    <!-- Form tìm kiếm -->
                    <form method="GET" action="{{ route('view-cay-tien-trinh') }}">
                        <input type="text" name="search" class="form-control" placeholder="Tìm kiếm tiến trình..." value="{{ request()->input('search') }}">
                        <button type="submit" class="btn btn-primary mt-2">Tìm kiếm</button>
                    </form>

                    <!-- Nhóm các tiến trình theo `ma_khoa` và `khoa_hoc` -->
                    @php
                        $groupedTienTrinh = $list_tien_trinh->groupBy(function ($item) {
                            return $item->ma_khoa . '-' . $item->khoa_hoc;
                        });
                    @endphp

                    <!-- Lặp qua từng nhóm `ma_khoa` và `khoa_hoc` -->
                    @foreach ($groupedTienTrinh as $key => $tienTrinhGroup)
                        <div class="card bg-white p-4 rounded shadow mb-4">
                            <h5 class="khoa-title">
                                {{ $tienTrinhGroup->first()->ten_khoa }} - Khóa học: {{ $tienTrinhGroup->first()->khoa_hoc }}
                            </h5>

                            <!-- Hiển thị ảnh của từng tiến trình trong nhóm -->
                            @foreach ($tienTrinhGroup as $tientrinh)
                                <div class="carousel-item active mb-3">
                                    <img src="{{ asset('assets/img_tientrinh/' . $tientrinh->cay_tien_trinh) }}" class="d-block w-100 rounded" alt="Ảnh chủ đề">
                                </div>
                            @endforeach
                        </div>
                    @endforeach
                    
                </div>
            </div>
        </div>
    </div>
@endsection