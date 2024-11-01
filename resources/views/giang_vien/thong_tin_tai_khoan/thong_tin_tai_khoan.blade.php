@extends('giang_vien.master')
@section('contents')
    <div class="page-body">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
                <img src="{{asset('assets/img_user/'.$GiangVien->hinh_anh)}}" class="rounded-circle" style="height: 100px; object-fit: contain;">

                <span class="d-none d-md-block dropdown-toggle ps-2">{{$GiangVien->ten_nguoi_dung}}</span>
            </a>
        </div>
        <div class="breadcrumb">Nhà của tôi / My frofile</div>

        <div class="container-xl d-flex justify-content-center">
            <div class="card w-75">
                <div class="card-body">
                    <form id="Formthongtintk" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="hinh_anh" class="form-label">Ảnh đại diện</label>
                                <input type="file" class="form-control" name="hinh_anh" id="edit_hinh_anh" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="ten_nguoi_dung" class="form-label">Họ tên</label>
                                <input type="test" class="form-control" name="ten_nguoi_dung" id="edit_ten_nguoi_dung" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="ngay_sinh" class="form-label">Ngày sinh</label>
                                <input type="test" class="form-control" name="ngay_sinh" id="edit_ngay_sinh" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="gioi_tinh" class="form-label">Giới tính</label>
                                <input type="test" class="form-control" name="gioi_tinh" id="edit_gioi_tinh" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="ma_khoa" class="form-label">Mã khoa</label>
                                <input type="test" class="form-control" name="ma_khoa" id="edit_ma_khoa" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="ma_lop" class="form-label">Mã lớp</label>
                                <input type="test" class="form-control" name="ma_lop" id="edit_ma_lop" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="email" class="form-label">Thư điện tử</label>
                                <input type="test" class="form-control" name="email" id="edit_email" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="cccd" class="form-label">Căn cước công dân</label>
                                <input type="test" class="form-control" name="cccd" id="edit_cccd" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="sdt" class="form-label">Số điện thoại</label>
                                <input type="test" class="form-control" name="sdt" id="edit_sdt" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="ho_khau_thuong_tru" class="form-label">Hộ khẩu thường trú</label>
                                <input type="test" class="form-control" name="ho_khau_thuong_tru" id="edit_ho_khau_thuong_tru" required>
                            </div>
                        </div>
                        <div class="text-end">
                            <button type="submit" class="btn btn-primary">Cập nhật</button>
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Hủy</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')

@endsection
