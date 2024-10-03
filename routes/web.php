<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashBoardController;
use App\Http\Controllers\QuanLyGiaoVien;
use App\Http\Controllers\QuanLyHocSinh;
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


