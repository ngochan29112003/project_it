@extends('sinh_vien.master')
@section("contents")
    <div class="container mt-4">
        <h3 class="text-danger fw-bold mb-4">241_1TH1370_KS2A_02_tructiep - TRIỂN KHAI HỆ THỐNG MẠNG VĂN PHÒNG (1.2) - GV: TRẦN THÁI BẢO</h3>
        <div class="breadcrumb">Nhà của tôi / Khoa học / Các khóa học / Học kỳ 2</div>

            <div class="coursebox card mb-4" data-courseid="3871" data-type="1">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h3 style="font-family: 'Roboto', sans-serif;" class="text-danger">
                            Tên bài tập
                        </h3>
                    </div>
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        nội dung bài tập tại đây
                    </div>

                    <h3 style="font-family: 'Roboto', sans-serif;" class="text-danger">Phần nộp bài</h3>

                    <div class="card mb-4">
                        <div class="card-body">
                            <div class="d-flex justify-content-between mb-2">
                                <span>Hạn nộp bài</span>
                                <span id="datetime_nop">advd</span>
                            </div>
                        </div>
                    </div>

                    <div class="card mb-4">
                        <div class="card-body">
                            <div class="d-flex justify-content-between mb-2">
                                <span>Thời gian thực nộp</span>
                                <span id="datetime_thuc">advd</span>
                            </div>
                        </div>
                    </div>

                    <div class="card mb-4">
                        <div class="card-body">
                            <div class="d-flex justify-content-between mb-2">
                                <span>Nộp bài bằng ảnh:</span>                         
                                <input type="file" class="file_anh" multiple>
                            </div>
                        </div>
                    </div>

                    <div class="card mb-4">
                        <div class="card-body">
                            <div class="d-flex justify-content-between mb-2">
                                <span>Nộp bài bằng file:</span>                            
                                <input type="file" class="file_anh">
                            </div>
                        </div>
                    </div> 
                    <div class="d-flex justify-content-center mt-3">
                        <button class="btn btn-primary">Nộp bài</button>
                    </div>
                </div>
            </div>
        </div>
    </div> 
@endsection