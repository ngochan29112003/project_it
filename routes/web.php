<?php

use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\admin\QuanLyLopHocPhanController;
use App\Http\Controllers\admin\QuanLyDeXuatController;
use App\Http\Controllers\admin\QuanLyGiangVienController;
use App\Http\Controllers\admin\QuanLyHocKyController;
use App\Http\Controllers\admin\QuanLyHocPhanController;
use App\Http\Controllers\admin\QuanLyKhoaController;
use App\Http\Controllers\admin\QuanLyLopController;
use App\Http\Controllers\admin\QuanLySinhVienController;
use App\Http\Controllers\admin\QuanLyTaiKhoanController;
use App\Http\Controllers\admin\QuanLyCayTienTrinhController;
use App\Http\Controllers\ChiTietLopHocPhanController;
use App\Http\Controllers\giang_vien\DashBoardGVController;
use App\Http\Controllers\giang_vien\GiangVienController;
use App\Http\Controllers\giang_vien\TimKiemHPController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\sinh_vien\DashBoardController;
use App\Http\Controllers\sinh_vien\SinhVienController;

use App\Http\Controllers\sinh_vien\ThongTinSVController;

use App\Http\Controllers\sinh_vien\LopHocPhanSVController;
use App\Http\Controllers\sinh_vien\EnrollSVController;
use App\Http\Controllers\sinh_vien\NopBaiController;
use App\Http\Controllers\sinh_vien\ThongTinTaiKhoanSVController;
use App\Http\Controllers\giang_vien\LopHocPhanGVController;
use App\Http\Controllers\giang_vien\EnrollGVController;
use App\Http\Controllers\giang_vien\ThongTinTaiKhoanGVController;

use App\Http\Controllers\SuaThongTinController;
use App\Http\Controllers\TrangChuController;
use App\Http\Controllers\CayTienTrinhController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

//Xử lý các route chưa đăng nhập
Route::get('/', [LoginController::class, 'getViewLogin'])->name('index.login');
Route::post('/login',[LoginController::class,'loginAction'])->name('login');
Route::get('/logout', [LoginController::class, 'logoutAction'])->name('logout');

//Chỉnh sửa thông tin
Route::get('/nguoi-dung/profile', [SuaThongTinController::class, 'getviewThongTin']);
Route::post('/nguoi-dung/{id}/update-profile', [SuaThongTinController::class, 'updateThongTin']);
Route::post('/nguoi-dung/{id}/change-password', [SuaThongTinController::class, 'changePassword']);

//Cây tiến trình
Route::get('/cay-tien-trinh', [CayTienTrinhController::class, 'getViewCayTienTrinh'])->name('view-cay-tien-trinh');


//Xử lý các route đã đăng nhập
Route::group(['prefix' => '/', 'middleware' => 'isLogin'], function () {

    //Admin
    Route::group(['prefix' => '/admin'], function () {
        //Trang chủ
        Route::get('/trang-chu',[AdminController::class,'getViewTrangChu'])->name('trang-chu-admin');

        //QL Tài Khoản
        Route::get('/tai-khoan',[QuanLyTaiKhoanController::class,'getViewDsTaiKhoan'])->name('tai-khoan');
        Route::post('/tai-khoan/add',[QuanLyTaiKhoanController::class,'addTaiKhoan'])->name('add-tai-khoan');
        Route::delete('/tai-khoan/delete/{id}',[QuanLyTaiKhoanController::class,'deleteTaiKhoan'])->name('delete-tai-khoan');

        //QL Sinh Viên
        Route::get('/sinh-vien',[QuanLySinhVienController::class,'getViewDsSinhVien'])->name('sinh-vien');
        Route::post('/sinh-vien/add',[QuanLySinhVienController::class,'addSinhVien'])->name('add-sinh-vien');
        Route::delete('/sinh-vien/delete/{id}',[QuanLySinhVienController::class,'deleteSinhVien'])->name('delete-sinh-vien');
        Route::get('/sinh-vien/edit/{id}', [QuanLySinhVienController::class, 'editSinhVien'])->name('edit-sinh-vien');
        Route::post('/sinh-vien/update/{id}', [QuanLySinhVienController::class, 'updateSinhVien'])->name('update-sinh-vien');
        Route::get('/sinh-vien/export', [QuanLySinhVienController::class, 'exportSinhVien'])->name('export-sinh-vien');

        //QL Giảng Viên
        Route::get('/giang-vien',[QuanLyGiangVienController::class,'getViewDsGiangVien'])->name('giang-vien');
        Route::post('/giang-vien/add',[QuanLyGiangVienController::class,'addGiangVien'])->name('add-giang-vien');
        Route::delete('/giang-vien/delete/{id}',[QuanLyGiangVienController::class,'deleteGiangVien'])->name('delete-giang-vien');
        Route::get('/giang-vien/edit/{id}', [QuanLyGiangVienController::class, 'editGiangVien'])->name('edit-giang-vien');
        Route::post('/giang-vien/update/{id}', [QuanLyGiangVienController::class, 'updateGiangVien'])->name('update-giang-vien');
        Route::get('/giang-vien/export', [QuanLyGiangVienController::class, 'exportGiangVien'])->name('export-giang-vien');

        //QL cây tiến trình
        Route::get('/danh-sach-cay-tien-trinh',[QuanLyCayTienTrinhController::class,'getViewDsCTT'])->name('danh-sach-cay-tien-trinh');
        Route::post('/cay-tien-trinh/add',[QuanLyCayTienTrinhController::class,'addCTT'])->name('add-cay-tien-trinh');
        Route::delete('/cay-tien-trinh/delete/{id}',[QuanLyCayTienTrinhController::class,'deleteCTT'])->name('delete-cay-tien-trinh');
        Route::get('/cay-tien-trinh/edit/{id}', [QuanLyCayTienTrinhController::class, 'editCTT'])->name('edit-cay-tien-trinh');
        Route::post('/cay-tien-trinh/update/{id}', [QuanLyCayTienTrinhController::class, 'updateCTT'])->name('update-cay-tien-trinh');

        //QL Học phần
        Route::get('/hoc-phan',[QuanLyHocPhanController::class,'getViewDsHocPhan'])->name('hoc-phan');
        Route::post('/hoc-phan/add',[QuanLyHocPhanController::class,'addHocPhan'])->name('add-hoc-phan');
        Route::delete('/hoc-phan/delete/{id}',[QuanLyHocPhanController::class,'deleteHocPhan'])->name('delete-hoc-phan');
        Route::get('/hoc-phan/edit/{id}', [QuanLyHocPhanController::class, 'editHocPhan'])->name('edit-hoc-phan');
        Route::post('/hoc-phan/update/{id}', [QuanLyHocPhanController::class, 'updateHocPhan'])->name('update-hoc-phan');
        Route::get('/export', [QuanLyHocPhanController::class, 'exportHocPhan'])->name('export-hoc-phan');

        //QL Lớp
        Route::get('/lop',[QuanLyLopController::class,'getViewDsLop'])->name('lop');
        Route::post('/lop/add',[QuanLyLopController::class,'addLop'])->name('add-lop');
        Route::delete('/lop/delete/{id}',[QuanLyLopController::class,'deleteLop'])->name('delete-lop');
        Route::get('/lop/edit/{id}', [QuanLyLopController::class, 'editLop'])->name('edit-lop');
        Route::post('/lop/update/{id}', [QuanLyLopController::class, 'updateLop'])->name('update-lop');
        Route::get('/lop/export', [QuanLyLopController::class, 'exportLop'])->name('export-lop');

        //QL Khoa
        Route::get('/khoa',[QuanLyKhoaController::class,'getViewDsKhoa'])->name('khoa');
        Route::post('/khoa/add',[QuanLyKhoaController::class,'addKhoa'])->name('add-khoa');
        Route::delete('/khoa/delete/{id}',[QuanLyKhoaController::class,'deleteKhoa'])->name('delete-khoa');
        Route::get('/khoa/edit/{id}', [QuanLyKhoaController::class, 'editKhoa'])->name('edit-khoa');
        Route::post('/khoa/update/{id}', [QuanLyKhoaController::class, 'updateKhoa'])->name('update-khoa');
        Route::get('/khoa/export', [QuanLyKhoaController::class, 'exportKhoa'])->name('export-khoa');

        //QL Lớp Học Phần
        Route::get('/lop-hoc-phan/{id}',[QuanLyLopHocPhanController::class,'viewLopHocPhan'])->name('lop-hoc-phan');
        Route::post('/lop-hoc-phan/add',[QuanLyLopHocPhanController::class,'addLopHocPhan'])->name('add-lop-hoc-phan');

        //QL Học kỳ (Kéo API nên không cần làm gì hết)
        Route::get('/hoc-ky',[QuanLyHocKyController::class,'getViewDsHocKy'])->name('hoc-ky');
    });

    //Người dùng đã đăng nhập
    Route::get('/trang-chu',[TrangChuController::class,'viewTrangChu'])->name('trang-chu');
    Route::get('/tim-kiem-hoc-phan', [TrangChuController::class, 'viewTimKiem'])->name('tim-kiem-hoc-phan');
    Route::get('/thong-tin-tai-khoan',[TrangChuController::class,'ViewTTTK'])->name('thong-tin-tai-khoan');
    Route::get('/chi-tiet-hoc-phan/{id}',[ChiTietLopHocPhanController::class,'getViewChiTietLopHocPhan'])->name('chi-tiet-lop-hoc-phan');
    Route::post('/tham-gia-lop', [TrangChuController::class, 'thamGiaLop'])->name('thamGiaLop');
    Route::post('/update-thong-tin-tai-khoan', [TrangChuController::class, 'updateTTTK'])->name('update-thong-tin-tai-khoan');

    //API
    Route::get('/hoc-ky/api',[QuanLyHocKyController::class,'getAPIHocKy'])->name('api-hoc-ky');
});


//Sinh vien
//    Route::group(['prefix' => '/sinh-vien'], function () {
//        //Trang chủ
//        Route::get('/trang-chu',[SinhVienController::class,'getViewTrangChu'])->name('trang-chu-sinh-vien');
//        Route::get('/nha-cua-toi',[DashBoardController::class,'getViewDashBoard'])->name('dash-board-sinh-vien');
//        Route::get('/thong-tin',[ThongTinSVController::class,'getViewThongTinSV'])->name('thong-tin-sinh-vien');
//
//        //Lop hoc phan
//        Route::get('/lop-hoc-phan',[LopHocPhanSVController::class,'getViewLopHP'])->name('sinh-vien-lop-hp');
//        Route::get('/lop-hoc-phan-enroll',[EnrollSVController::class,'getViewEnroll'])->name('sinh-vien-lop-hp-enroll');
//        Route::get('/tim-kiem', [SinhVienController::class, 'getViewTimKiemSv'])->name('sinh-vien-lop-hp-enroll');
//
//        //Thông tin tài khoản
//        Route::get('/thong-tin-tai-khoan',[ThongTinTaiKhoanSVController::class,'getViewTTTK'])->name('thong-tin-tai-khoan');
//
//        //Nộp bài
//        Route::get('/nop-bai',[NopBaiController::class,'getViewNopBai'])->name('nop-bai');
//
//    });

//    //Giang vien
//    Route::group(['prefix' => '/giang-vien'], function () {
//        //Trang chủ
//        Route::get('/trang-chu',[GiangVienController::class,'getViewTrangChuGV'])->name('trang-chu-giang-vien');
//        Route::get('/nha-cua-toi',[DashBoardGVController::class,'GetViewTTGV'])->name('dash-board-giang-vien');
//
//        //Lớp học phần
//        Route::get('/lop-hoc-phan',[LopHocPhanGVController::class,'getViewLopHP'])->name('giang-vien-lop-hp');
//        Route::get('/lop-hoc-phan-enroll',[EnrollGVController::class,'getViewEnroll'])->name('giang-vien-lop-hp-enroll');
//        Route::get('/tim-kiem', [GiangVienController::class, 'getViewTimKiem'])->name('lop-hoc-phan-enroll');
//
//        //Thông tin tài khoản
//        Route::get('/thong-tin-tai-khoan',[ThongTinTaiKhoanGVController::class,'getViewTTTK'])->name('thong-tin-tai-khoan');
//    });



