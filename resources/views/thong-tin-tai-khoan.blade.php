@extends('master')
@section("contents")
    <div class="pagetitle">
        <h1>Hồ Sơ</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Trang chủ</a></li>
                <li class="breadcrumb-item">Người dùng</li>
                <li class="breadcrumb-item active">Thông tin tài khoản</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section profile">
        <div class="row">
            <div class="col-xl-4">
                <div class="card">
                    <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">
                        <img src="{{asset('assets/img_user/user.png')}}" alt="Thông tin tài khoản" class="rounded-circle">
                        <h2>{{ $user->ten_nguoi_dung }}</h2>
                        <h3>{{ $user->ten_quyen }}</h3>
                        <div class="social-links mt-2">
                            <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
                            <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
                            <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
                            <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-8">
                <div class="card">
                    <div class="card-body pt-3">
                        <!-- Bordered Tabs -->
                        <ul class="nav nav-tabs nav-tabs-bordered" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview" aria-selected="true" role="tab">Tổng Quan</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-edit" aria-selected="false" tabindex="-1" role="tab">Chỉnh Sửa Hồ Sơ</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-change-password" aria-selected="false" tabindex="-1" role="tab">Đổi Mật Khẩu</button>
                            </li>
                        </ul>
                        <div class="tab-content pt-2">
                            <div class="tab-pane fade show active profile-overview" id="profile-overview" role="tabpanel">
                                <h5 class="card-title" style="font-family: 'Arial', sans-serif;"><b>Chi Tiết Hồ Sơ</b></h5>
                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Họ và Tên</div>
                                    <div class="col-lg-9 col-md-8">{{$user->ten_nguoi_dung}}</div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Giới Tính</div>
                                    <div class="col-lg-9 col-md-8">{{$user->gioi_tinh}}</div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Ngày Sinh</div>
                                    <div class="col-lg-9 col-md-8">{{$user->ngay_sinh}}</div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Nơi Sinh</div>
                                    <div class="col-lg-9 col-md-8">{{$user->ngay_sinh}}</div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Địa Chỉ</div>
                                    <div class="col-lg-9 col-md-8">{{$user->ho_khau_thuong_tru}}</div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Số Điện Thoại</div>
                                    <div class="col-lg-9 col-md-8">{{$user->sdt}}</div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Email</div>
                                    <div class="col-lg-9 col-md-8">{{$user->email}}</div>
                                </div>
                            </div>

                            <div class="tab-pane fade profile-edit pt-3" id="profile-edit" role="tabpanel">
                                <h5 class="card-title" style="font-family: 'Arial', sans-serif;"><b>Chỉnh Sửa Hồ Sơ</b></h5>
                                <form>
                                    <div class="row mb-3">
                                        <label for="profileImage" class="col-md-4 col-lg-3 col-form-label">Ảnh Đại Diện</label>
                                        <div class="col-md-8 col-lg-9">
                                            <img src="{{asset('assets/img_user/user.png')}}" alt="Profile">
                                            <div class="pt-2">
                                                <a href="#" class="btn btn-primary btn-sm" title="Tải ảnh đại diện mới"><i class="bi bi-upload"></i></a>
                                                <a href="#" class="btn btn-danger btn-sm" title="Xóa ảnh đại diện"><i class="bi bi-trash"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label class="col-lg-3 col-md-4 col-form-label">Họ và Tên</label>
                                        <div class="col-lg-9 col-md-8">
                                            <input type="text" class="form-control" value="Kevin Anderson" name="fullName">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label class="col-lg-3 col-md-4 col-form-label">Giới Tính</label>
                                        <div class="col-lg-9 col-md-8">
                                            <select class="form-select" name="gender">
                                                <option value="Nam" selected>Nam</option>
                                                <option value="Nữ">Nữ</option>
                                                <option value="Khác">Khác</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label class="col-lg-3 col-md-4 col-form-label">Ngày Sinh</label>
                                        <div class="col-lg-9 col-md-8">
                                            <input type="date" class="form-control" value="1990-01-01" name="dob">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label class="col-lg-3 col-md-4 col-form-label">Nơi Sinh</label>
                                        <div class="col-lg-9 col-md-8">
                                            <input type="text" class="form-control" value="New York, USA" name="birthPlace">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label class="col-lg-3 col-md-4 col-form-label">Địa Chỉ</label>
                                        <div class="col-lg-9 col-md-8">
                                            <input type="text" class="form-control" value="A108 Adam Street, New York, NY 535022" name="address">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label class="col-lg-3 col-md-4 col-form-label">Số Điện Thoại</label>
                                        <div class="col-lg-9 col-md-8">
                                            <input type="tel" class="form-control" value="(436) 486-3538 x29071" name="phone">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label class="col-lg-3 col-md-4 col-form-label">Email</label>
                                        <div class="col-lg-9 col-md-8">
                                            <input type="email" class="form-control" value="k.anderson@example.com" name="email">
                                        </div>
                                    </div>
                                </form>
                            </div>

                            <div class="tab-pane fade profile-change-password pt-3" id="profile-change-password" role="tabpanel">
                                <h5 class="card-title" style="font-family: 'Arial', sans-serif;"><b>Đổi Mật Khẩu</b></h5>
                                <!-- Change Password Form -->
                                <form>
                                    <div class="row mb-3">
                                        <label for="currentPassword" class="col-md-4 col-lg-3 col-form-label">Mật Khẩu Cũ</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="currentPassword" type="password" class="form-control" id="currentPassword">
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="newPassword" class="col-md-4 col-lg-3 col-form-label">Mật Khẩu Mới</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="newPassword" type="password" class="form-control" id="newPassword">
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="confirmPassword" class="col-md-4 col-lg-3 col-form-label">Xác Nhận Mật Khẩu Mới</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="confirmPassword" type="password" class="form-control" id="confirmPassword">
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <div class="col-md-8 col-lg-9 offset-md-4 offset-lg-3">
                                            <button type="submit" class="btn btn-primary">Cập Nhật Mật Khẩu</button>
                                        </div>
                                    </div>
                                </form><!-- End Change Password Form -->
                            </div>
                        </div><!-- End Bordered Tabs -->
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
