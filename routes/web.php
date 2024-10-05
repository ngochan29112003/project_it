<?php

use App\Http\Controllers\admin\AdminController;
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
use App\Http\Controllers\HomeHocSinhController;
use App\Http\Controllers\Lop10ConTroller;
use App\Http\Controllers\hoc_sinh\HocSinhController;

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
Route::get('/admin',[AdminController::class,'getView'])->name('index-dasboard');
Route::get('/admin/trang-chu',[AdminController::class,'getViewTrangChu'])->name('index.trang-chu');
Route::get('/admin/qlgv',[AdminController::class,'getViewDSGiaoVien'])->name('index.ds-giao-vien');
Route::get('/admin/qlhs',[AdminController::class,'getViewDSHocSinh'])->name('index.ds-hoc-sinh');
Route::get('/admin/ql-bo-mon',[AdminController::class,'getViewDSBoMon'])->name('index.ds-bo-mon');
Route::get('/admin/ql-khoi-10',[AdminController::class,'getViewDSKhoi10'])->name('index.ds-khoi-10');
Route::get('/admin/ql-khoi-11',[AdminController::class,'getViewDSKhoi11'])->name('index.ds-khoi-11');
Route::get('/admin/ql-khoi-12',[AdminController::class,'getViewDSKhoi12'])->name('index.ds-khoi-12');
Route::get('/admin/ql-de-xuat',[AdminController::class,'getViewDeXuat'])->name('index.ds-de-xuat');
Route::get('/admin/ql-tk-gv',[AdminController::class,'getViewTKGiaoVien'])->name('index.ds-tk-gv');
Route::get('/admin/ql-tk-hs',[AdminController::class,'getViewTKHocSinh'])->name('index.ds-tk-hs');
Route::get('/admin/ql-tk-ql',[AdminController::class,'getViewTKQuanLy'])->name('index.ds-tk-ql');
Route::get('/hs/homehs',[HocSinhController::class,'getViewTrangChu'])->name('index.homehs');
Route::get('/hs/lop10',[HocSinhController::class,'getLop10'])->name('index.lop-10');
Route::get('/hs/lop11',[HocSinhController::class,'getLop11'])->name('index.lop-11');
Route::get('/hs/lop12',[HocSinhController::class,'getLop12'])->name('index.lop-12');
Route::get('/hs/baitapthem10',[HocSinhController::class,'getBaiTapThemLop10'])->name('index.baitapthem10');
Route::get('/hs/baitapthem11',[HocSinhController::class,'getBaiTapThemLop11'])->name('index.baitapthem11');
Route::get('/hs/baitapthem12',[HocSinhController::class,'getBaiTapThemLop12'])->name('index.baitapthem12');
Route::get('/hs/gioithieu',[HocSinhController::class,'getGioiThieu'])->name('index.gioithieu');

