<?php
use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\admin\QuanLyDeXuatController;
use App\Http\Controllers\admin\QuanLyGiangVienController;
use App\Http\Controllers\admin\QuanLyHocPhanController;
use App\Http\Controllers\admin\QuanLyKhoaController;
use App\Http\Controllers\admin\QuanLyLopController;
use App\Http\Controllers\admin\QuanLySinhVienController;
use App\Http\Controllers\admin\QuanLyTaiKhoanController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\sinh_vien\HomePageController;

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


//Admin
Route::get('/', [LoginController::class, 'getViewLogin'])->name('index-login');
Route::get('/admin',[AdminController::class,'getView'])->name('index-dasboard');
Route::get('/admin/trang-chu',[AdminController::class,'getViewTrangChu'])->name('index.trang-chu');
Route::get('/admin/ql-giang-vien',[QuanLyGiangVienController::class,'getViewDsGiangVien'])->name('ds-giang-vien');
Route::get('/admin/ql-sinh-vien',[QuanLySinhVienController::class,'getViewDsSinhVien'])->name('ds-sinh-vien');
Route::get('/admin/ql-de-xuat',[QuanLyDeXuatController::class,'getViewDsDeXuat'])->name('ds-de-xuat');
Route::get('/admin/ql-khoa',[QuanLyKhoaController::class,'getViewDsKhoa'])->name('ds-khoa');
Route::get('/admin/ql-lop',[QuanLyLopController::class,'getViewDsLop'])->name('ds-lop');
Route::get('/admin/ql-hoc-phan',[QuanLyHocPhanController::class,'getViewDsHocPhan'])->name('ds-hoc-phan');
Route::get('/admin/ds-tai-khoan',[QuanLyTaiKhoanController::class,'getViewDsTaiKhoan'])->name('ds-tai-khoan');
Route::post('/admin/ds-tai-khoan/add',[QuanLyTaiKhoanController::class,'addTaiKhoan'])->name('add-tai-khoan');

//Sinh Viên
Route::get('/home-page',[HomePageController::class,'getViewHomePageSv'])->name('index-home-page');

//Khoa
Route::post('/admin/ds-khoa/add',[QuanLyKhoaController::class,'addKhoa'])->name('add-khoa');


