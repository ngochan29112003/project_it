@extends('master')
@section("contents")
    <div id="page" class="container-fluid">
        <header id="page-header" class="row py-4 bg-light">
            <div class="col-12">
                <div class="card border-0 shadow-sm">
                    <div class="card-body">
                            <h1 class="text-danger fw-bold mb-3 border-bottom pb-2 pt-xl-4">Hệ thống LMS của VLUTE</h1>
                    </div>
                </div>
            </div>
        </header>

        <div id="page-content" class="row mt-4">
            <div id="region-main-box" class="col-12">
                <section id="region-main">
                    <div class="card border-0 shadow-sm">
                        <div class="card-body">
                            <span class="notifications" id="user-notifications"></span>
                            <div role="main">
                                <h2 class="h5 mb-3 pt-xl-4">Kết quả tìm kiếm: {{ $lop_hoc_phan ? count($lop_hoc_phan) : 0 }}</h2>

                                <div class="courses course-search-result">
                                    @if($lop_hoc_phan->isEmpty())
                                        <p>Không tìm thấy khóa học nào.</p>
                                    @else
                                        @foreach($lop_hoc_phan as $lop)
                                            <div class="coursebox card mb-3">
                                                <div class="card-body">
                                                    <h3 class="coursename h6 pt-xl-4">
                                                        <a href="#">
                                                            ({{ $lop->ten_lop_hoc_phan }}) - {{$lop->ten_hoc_phan}} ({{$lop->so_chi_ly_thuyet}}.{{$lop->so_chi_thuc_hanh}}) GV: {{$lop->ten_nguoi_dung}}
                                                        </a>
                                                    </h3>
                                                    <div class="text-muted mb-2">{{$lop->ten_hoc_ky}}
                                                    </div>
                                                    <a href="{{route('chi-tiet-lop-hoc-phan',['id'=>$lop->id_lop_hoc_phan])}}" class="btn btn-danger">Xem Chi Tiết</a>
                                                </div>
                                            </div>
                                        @endforeach
                                    @endif
                                </div>

                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>

@endsection
