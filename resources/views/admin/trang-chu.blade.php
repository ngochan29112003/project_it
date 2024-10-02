@extends('admin.master')
@section('contents')
    <div class="page-header d-print-none">
        <div class="container-xl">
            <div class="row g-2 align-items-center">
                <div class="col">
                    <!-- Page pre-title -->
                    <div class="page-pretitle">
                        Tổng quan
                    </div>
                    <h2 class="page-title">
                        TRANG TỔNG QUAN
                    </h2>
                </div>
            </div>
        </div>
    </div>

    <div class="page-body">
        <div class="container-xl">
            <div class="row row-deck row-cards">
                <div class="col-sm-6 col-lg-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div class="subheader">Số lượng giáo viên </div>
                            </div>
                            <div class="h1 mb-3">"lấy dữ liệu từ db"</div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div class="subheader">Số lượng học sinh </div>
                            </div>
                            <div class="h1 mb-3">"lấy dữ liệu từ db"</div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div class="subheader">Số lượng lớp</div>
                            </div>
                            <div class="h1 mb-3">"lấy dữ liệu từ db"</div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div class="subheader">Số lượng đề xuất </div>
                            </div>
                            <div class="h1 mb-3">"lấy dữ liệu từ db"</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

