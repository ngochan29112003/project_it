<?php

use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\admin\QuanLyDeXuatController;
use App\Http\Controllers\admin\QuanLyGiangVienController;
use App\Http\Controllers\admin\QuanLyHocKyController;
use App\Http\Controllers\admin\QuanLyHocPhanController;
use App\Http\Controllers\admin\QuanLyKhoaController;
use App\Http\Controllers\admin\QuanLyLopController;
use App\Http\Controllers\admin\QuanLySinhVienController;
use App\Http\Controllers\admin\QuanLyTaiKhoanController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\sinh_vien\SinhVienController;
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

//Xử lý các route đã đăng nhập
Route::group(['prefix' => '/', 'middleware' => 'isLogin'], function () {

    //Admin
    Route::group(['prefix' => '/admin'], function () {
        //Trang chủ
        Route::get('/trang-chu',[AdminController::class,'getViewTrangChu'])->name('trang-chu-admin');

        //QL Tài Khoản
        Route::get('/tai-khoan',[QuanLyTaiKhoanController::class,'getViewDsTaiKhoan'])->name('tai-khoan');
        Route::post('/tai-khoan/add',[QuanLyTaiKhoanController::class,'addTaiKhoan'])->name('add-tai-khoan');

        //QL Sinh Viên
        Route::get('/sinh-vien',[QuanLySinhVienController::class,'getViewDsSinhVien'])->name('sinh-vien');
        Route::post('/sinh-vien/add',[QuanLySinhVienController::class,'addSinhVien'])->name('add-sinh-vien');

        //QL Giảng Viên
        Route::get('/giang-vien',[QuanLyGiangVienController::class,'getViewDsGiangVien'])->name('giang-vien');

        //QL Đề xuất
        Route::get('/de-xuat',[QuanLyDeXuatController::class,'getViewDsDeXuat'])->name('de-xuat');

        //QL Học phần
        Route::get('/hoc-phan',[QuanLyHocPhanController::class,'getViewDsHocPhan'])->name('hoc-phan');
        Route::post('/hoc-phan/add',[QuanLyHocPhanController::class,'addHocPhan'])->name('add-hoc-phan');

        //QL Lớp
        Route::get('/lop',[QuanLyLopController::class,'getViewDsLop'])->name('lop');
        Route::post('/lop/add',[QuanLyLopController::class,'addLop'])->name('add-lop');

        //QL Khoa
        Route::get('/khoa',[QuanLyKhoaController::class,'getViewDsKhoa'])->name('khoa');
        Route::post('/khoa/add',[QuanLyKhoaController::class,'addKhoa'])->name('add-khoa');
        Route::delete('/khoa/delete/{id}',[QuanLyKhoaController::class,'deleteKhoa'])->name('delete-khoa');

        //QL Học kỳ
        Route::get('/hoc-ky',[QuanLyHocKyController::class,'getViewDsHocKy'])->name('hoc-ky');
    });

    //Sinh vien
    Route::group(['prefix' => '/sinh-vien'], function () {
        //Trang chủ
        Route::get('/trang-chu',[SinhVienController::class,'getViewTrangChu'])->name('trang-chu-sinh-vien');

    });

    //Giang vien
    Route::group(['prefix' => '/giang-vien'], function () {

    });

    //API
    Route::get('/hoc-ky/api',[QuanLyHocKyController::class,'getAPIHocKy'])->name('api-hoc-ky');
});
