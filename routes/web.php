<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashBoardController;
use App\Http\Controllers\QuanLyBoMon;
use App\Http\Controllers\QuanLyDeXuat;
use App\Http\Controllers\QuanLyGiaoVien;
use App\Http\Controllers\QuanLyHocSinh;
use App\Http\Controllers\QuanLyKhoi10;
use App\Http\Controllers\QuanLyKhoi11;
use App\Http\Controllers\QuanLyKhoi12;
use App\Http\Controllers\QuanLyTaiKhoanGiaoVien;
use App\Http\Controllers\QuanLyTaiKhoanHocSinh;
use App\Http\Controllers\QuanLyTaiKhoanNguoiQuanLy;
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

Route::get('/', [LoginController::class, 'getView'])->name('index-login');
Route::get('/admin',[DashBoardController::class,'getView'])->name('index-dasboard');
Route::get('/admin/trang-chu',[DashBoardController::class,'getViewTrangChu'])->name('index.trang-chu');
Route::get('/admin/qlgv',[QuanLyGiaoVien::class,'getDanhSach'])->name('index.ds-giao-vien');
Route::get('/admin/qlhs',[QuanLyHocSinh::class,'getDSHocSinh'])->name('index.ds-hoc-sinh');
Route::get('/admin/ql-bo-mon',[QuanLyBoMon::class,'getBoMon'])->name('index.ds-bo-mon');
Route::get('/admin/ql-khoi-10',[QuanLyKhoi10::class,'getKhoi10'])->name('index.ds-khoi-10');
Route::get('/admin/ql-khoi-11',[QuanLyKhoi11::class,'getKhoi11'])->name('index.ds-khoi-11');
Route::get('/admin/ql-khoi-12',[QuanLyKhoi12::class,'getKhoi12'])->name('index.ds-khoi-12');
Route::get('/admin/ql-de-xuat',[QuanLyDeXuat::class,'getDeXuat'])->name('index.ds-de-xuat');
Route::get('/admin/ql-tk-gv',[QuanLytaiKhoanGiaoVien::class,'getTaiKhoanGiaoVien'])->name('index.ds-tk-gv');
Route::get('/admin/ql-tk-hs',[QuanLytaiKhoanHocSinh::class,'getTaiKhoanHocSinh'])->name('index.ds-tk-hs');
Route::get('/admin/ql-tk-ql',[QuanLytaiKhoanNguoiQuanLy::class,'getTaiKhoanNguoiQuanLy'])->name('index.ds-tk-ql');




