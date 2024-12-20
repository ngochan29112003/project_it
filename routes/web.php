<?php

use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\admin\MasterContoller;
use App\Http\Controllers\admin\QuanLyLopHocPhanController;
use App\Http\Controllers\admin\QuanLyGiangVienController;
use App\Http\Controllers\admin\QuanLyHocKyController;
use App\Http\Controllers\admin\QuanLyHocPhanController;
use App\Http\Controllers\admin\QuanLyKhoaController;
use App\Http\Controllers\admin\QuanLyLopController;
use App\Http\Controllers\admin\QuanLySinhVienController;
use App\Http\Controllers\admin\QuanLyTaiKhoanController;
use App\Http\Controllers\BaiTapController;
use App\Http\Controllers\admin\QuanLyCayTienTrinhController;
use App\Http\Controllers\ChiTietLopHocPhanController;
use App\Http\Controllers\DiemDanhController;
use App\Http\Controllers\KiemTraTracNghiemController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\NganHangCauHoiController;
use App\Http\Controllers\NhaCuaToiController;
use App\Http\Controllers\NopBaiTapController;
use App\Http\Controllers\TracNghiemController;
use App\Http\Controllers\TrangChuController;
use App\Http\Controllers\CayTienTrinhController;
use App\Http\Controllers\DanhSachDiemController;
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
Route::post('/login', [LoginController::class, 'loginAction'])->name('login');
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
        Route::get('/trang-chu', [AdminController::class, 'getViewTrangChu'])->name('trang-chu-admin');

        Route::get('/Master',[MasterContoller::class,'getViewMaster'])->name('master');

        //QL Tài Khoản
        Route::get('/tai-khoan', [QuanLyTaiKhoanController::class, 'getViewDsTaiKhoan'])->name('tai-khoan');
        Route::post('/tai-khoan/add', [QuanLyTaiKhoanController::class, 'addTaiKhoan'])->name('add-tai-khoan');
        Route::delete('/tai-khoan/delete/{id}', [QuanLyTaiKhoanController::class, 'deleteTaiKhoan'])->name('delete-tai-khoan');

        //QL Sinh Viên
        Route::get('/sinh-vien', [QuanLySinhVienController::class, 'getViewDsSinhVien'])->name('sinh-vien');
        Route::post('/sinh-vien/add', [QuanLySinhVienController::class, 'addSinhVien'])->name('add-sinh-vien');
        Route::delete('/sinh-vien/delete/{id}', [QuanLySinhVienController::class, 'deleteSinhVien'])->name('delete-sinh-vien');
        Route::get('/sinh-vien/edit/{id}', [QuanLySinhVienController::class, 'editSinhVien'])->name('edit-sinh-vien');
        Route::post('/sinh-vien/update/{id}', [QuanLySinhVienController::class, 'updateSinhVien'])->name('update-sinh-vien');
        Route::get('/sinh-vien/export', [QuanLySinhVienController::class, 'exportSinhVien'])->name('export-sinh-vien');

        //QL Giảng Viên
        Route::get('/giang-vien', [QuanLyGiangVienController::class, 'getViewDsGiangVien'])->name('giang-vien');
        Route::post('/giang-vien/add', [QuanLyGiangVienController::class, 'addGiangVien'])->name('add-giang-vien');
        Route::delete('/giang-vien/delete/{id}', [QuanLyGiangVienController::class, 'deleteGiangVien'])->name('delete-giang-vien');
        Route::get('/giang-vien/edit/{id}', [QuanLyGiangVienController::class, 'editGiangVien'])->name('edit-giang-vien');
        Route::post('/giang-vien/update/{id}', [QuanLyGiangVienController::class, 'updateGiangVien'])->name('update-giang-vien');
        Route::get('/giang-vien/export', [QuanLyGiangVienController::class, 'exportGiangVien'])->name('export-giang-vien');


        //QL cây tiến trình
        Route::get('/danh-sach-cay-tien-trinh', [QuanLyCayTienTrinhController::class, 'getViewDsCTT'])->name('danh-sach-cay-tien-trinh');
        Route::post('/cay-tien-trinh/add', [QuanLyCayTienTrinhController::class, 'addCTT'])->name('add-cay-tien-trinh');
        Route::delete('/cay-tien-trinh/delete/{id}', [QuanLyCayTienTrinhController::class, 'deleteCTT'])->name('delete-cay-tien-trinh');
        Route::get('/cay-tien-trinh/edit/{id}', [QuanLyCayTienTrinhController::class, 'editCTT'])->name('edit-cay-tien-trinh');
        Route::post('/cay-tien-trinh/update/{id}', [QuanLyCayTienTrinhController::class, 'updateCTT'])->name('update-cay-tien-trinh');


        //QL Học phần
        Route::get('/hoc-phan', [QuanLyHocPhanController::class, 'getViewDsHocPhan'])->name('hoc-phan');
        Route::post('/hoc-phan/add', [QuanLyHocPhanController::class, 'addHocPhan'])->name('add-hoc-phan');
        Route::delete('/hoc-phan/delete/{id}', [QuanLyHocPhanController::class, 'deleteHocPhan'])->name('delete-hoc-phan');
        Route::get('/hoc-phan/edit/{id}', [QuanLyHocPhanController::class, 'editHocPhan'])->name('edit-hoc-phan');
        Route::post('/hoc-phan/update/{id}', [QuanLyHocPhanController::class, 'updateHocPhan'])->name('update-hoc-phan');
        Route::get('/export', [QuanLyHocPhanController::class, 'exportHocPhan'])->name('export-hoc-phan');

        //QL Lớp
        Route::get('/lop', [QuanLyLopController::class, 'getViewDsLop'])->name('lop');
        Route::post('/lop/add', [QuanLyLopController::class, 'addLop'])->name('add-lop');
        Route::delete('/lop/delete/{id}', [QuanLyLopController::class, 'deleteLop'])->name('delete-lop');
        Route::get('/lop/edit/{id}', [QuanLyLopController::class, 'editLop'])->name('edit-lop');
        Route::post('/lop/update/{id}', [QuanLyLopController::class, 'updateLop'])->name('update-lop');
        Route::get('/lop/export', [QuanLyLopController::class, 'exportLop'])->name('export-lop');

        //QL Khoa
        Route::get('/khoa', [QuanLyKhoaController::class, 'getViewDsKhoa'])->name('khoa');
        Route::post('/khoa/add', [QuanLyKhoaController::class, 'addKhoa'])->name('add-khoa');
        Route::delete('/khoa/delete/{id}', [QuanLyKhoaController::class, 'deleteKhoa'])->name('delete-khoa');
        Route::get('/khoa/edit/{id}', [QuanLyKhoaController::class, 'editKhoa'])->name('edit-khoa');
        Route::post('/khoa/update/{id}', [QuanLyKhoaController::class, 'updateKhoa'])->name('update-khoa');
        Route::get('/khoa/export', [QuanLyKhoaController::class, 'exportKhoa'])->name('export-khoa');

        //QL Lớp Học Phần
        Route::get('/lop-hoc-phan/{id}', [QuanLyLopHocPhanController::class, 'viewLopHocPhan'])->name('lop-hoc-phan');
        Route::post('/lop-hoc-phan/add', [QuanLyLopHocPhanController::class, 'addLopHocPhan'])->name('add-lop-hoc-phan');
        Route::get('/lop-hoc-phan/edit/{id}', [QuanLyLopHocPhanController::class, 'edit'])->name('edit-lop-hoc-phan');
        Route::post('/lop-hoc-phan/update/{id}', [QuanLyLopHocPhanController::class, 'update'])->name('update-lop-hoc-phan');
        Route::delete('/lop-hoc-phan/delete/{id}', [QuanLyLopHocPhanController::class, 'delete'])->name('delete-lop-hoc-phan');

        //QL Học kỳ (Kéo API nên không cần làm gì hết)
        Route::get('/hoc-ky', [QuanLyHocKyController::class, 'getViewDsHocKy'])->name('hoc-ky');
    });

    //Người dùng đã đăng nhập
    Route::get('/trang-chu', [TrangChuController::class, 'viewTrangChu'])->name('trang-chu');
    Route::get('/tim-kiem-hoc-phan', [TrangChuController::class, 'viewTimKiem'])->name('tim-kiem-hoc-phan');

    Route::get('/thong-tin-tai-khoan',[TrangChuController::class,'ViewTTTK'])->name('thong-tin-tai-khoan');
    Route::post('/change-password', [TrangChuController::class, 'changePassword'])->name('user-changePassword');


    Route::get('/chi-tiet-hoc-phan/{id}', [ChiTietLopHocPhanController::class, 'getViewChiTietLopHocPhan'])->name('chi-tiet-lop-hoc-phan');
    Route::post('/chi-tiet-hoc-phan/add', [ChiTietLopHocPhanController::class, 'addBaiGiang'])->name('add-bai-giang');
    Route::get('/chi-tiet-hoc-phan/hien/{id}', [ChiTietLopHocPhanController::class, 'hien'])->name('bai-giang.hien');
    Route::get('/chi-tiet-hoc-phan/an/{id}', [ChiTietLopHocPhanController::class, 'an'])->name('bai-giang.an');
    Route::delete('/chi-tiet-hoc-phan/delete/{id}', [ChiTietLopHocPhanController::class, 'deleteBaiGiang'])->name('delete-bai-giang');
    Route::get('/chi-tiet-hoc-phan/edit/{id}', [ChiTietLopHocPhanController::class, 'editBaiGiang'])->name('edit-bai-giang');
    Route::post('/chi-tiet-hoc-phan/update/{id}', [ChiTietLopHocPhanController::class, 'updateBaiGiang'])->name('update-bai-giang');
    Route::get('/export-danh-sach-sv/{id}', [ChiTietLopHocPhanController::class, 'exportDanhSachSVLHP'])->name('export-danh-sach-sv-lhp');

    //Bài tập
    Route::get('chi-tiet-hoc-phan/bai-tap/{id}/{ma_bai_giang}',[BaiTapController::class,'getView'])->name('bai-tap');
    Route::post('/chi-tiet-hoc-phan/bai-tap/add', [BaiTapController::class, 'add'])->name('add-bai-tap');
    Route::delete('/chi-tiet-hoc-phan/bai-tap/delete/{id}', [BaiTapController::class, 'deleteBaiTap'])->name('delete-bai-tap');
    //Chi tiết bài tập
    Route::get('chi-tiet-hoc-phan/chi-tiet-bai-tap/{id}',[BaiTapController::class,'getViewChiTietBaiTap'])->name('bai-tap-chi-tiet');
    Route::get('chi-tiet-hoc-phan/chi-tiet-bai-tap/edit/{id}', [BaiTapController::class, 'edit'])->name('bai-tap.edit');
    Route::post('chi-tiet-hoc-phan/chi-tiet-bai-tap/{id}', [BaiTapController::class, 'update'])->name('bai-tap.update');
    Route::post('chi-tiet-hoc-phan/chi-tiet-bai-tap/{id}/upload-file', [BaiTapController::class, 'uploadFile'])->name('bai-tap.upload-file');
    Route::delete('chi-tiet-hoc-phan/chi-tiet-bai-tap/file/{id}/delete', [BaiTapController::class, 'deleteFile'])->name('bai-tap.delete-file');

    // Route mới để lấy danh sách sinh viên đã nộp bài
    Route::get('chi-tiet-hoc-phan/chi-tiet-bai-tap/{ma_bai_tap}/list-nop-bt', [BaiTapController::class, 'showListNopBT'])->name('bai-tap.list-nop-bt');



    Route::post('/tham-gia-lop', [TrangChuController::class, 'thamGiaLop'])->name('thamGiaLop');

    Route::post('/update-thong-tin-tai-khoan', [TrangChuController::class, 'updateTTTK'])->name('update-thong-tin-tai-khoan');


    Route::get('/nha-cua-toi',[NhaCuaToiController::class,'GetViewNhaCuaToi'])->name('nha-cua-toi');
    Route::delete('nha-cua-toi/delete/{id}', [NhaCuaToiController::class, 'deleteHocPhan'])->name('delete-ghi-danh');


    //Trac nghiem
    Route::get('/trac-nghiem/{id}/{ma_bai_giang}', [TracNghiemController::class, 'getViewTracNghiem'])->name('trac-nghiem');
    Route::get('/bat-dau-kiem-tra/{id}', [TracNghiemController::class, 'batDauKiemTra'])->name('bat-dau-kiem-tra');

    //Ngân hàng kiểm tra
    Route::get('/ngan-hang-cau-hoi/{id}', [NganHangCauHoiController::class, 'getViewNganHangCauHoi'])->name('ngan-hang-cau-hoi');
    Route::post('/ngan-hang-cau-hoi/them', [NganHangCauHoiController::class, 'add'])->name('add-ngan-hang-cau-hoi');
    Route::delete('/ngan-hang-cau-hoi/xoa/{id}', [NganHangCauHoiController::class, 'delete'])->name('delete-ngan-hang-cau-hoi');
    Route::get('/ngan-hang-cau-hoi/sua/{id}', [NganHangCauHoiController::class, 'edit'])->name('edit-ngan-hang-cau-hoi');
    Route::post('/ngan-hang-cau-hoi/capnhat/{id}', [NganHangCauHoiController::class, 'update'])->name('update-ngan-hang-cau-hoi');
    Route::post('/ngan-hang-cau-hoi/import/{id}', [NganHangCauHoiController::class, 'import'])->name('import-ngan-hang-cau-hoi');

    //Tạo bài kiểm tra
    Route::post('/bai-kiem-tra/them', [TracNghiemController::class, 'add'])->name('add-bai-kiem-tra');
    Route::delete('/bai-kiem-tra/xoa/{id}', [TracNghiemController::class, 'delete'])->name('delete-bai-kiem-tra');
    Route::get('/bai-kiem-tra/sua/{id}', [TracNghiemController::class, 'edit'])->name('edit-bai-kiem-tra');
    Route::post('/bai-kiem-tra/capnhat/{id}', [TracNghiemController::class, 'update'])->name('update-bai-kiem-tra');

    //Bài làm
    Route::get('/kiem-tra-trac-nghiem/{id_bai_kiem_tra}/{id_bai_giang}', [KiemTraTracNghiemController::class, 'getViewKiemTraTracNghiem'])->name('kiem-tra-trac-nghiem');
    Route::post('/nop-bai/{id_bai_kiem_tra}/{id_bai_giang}', [KiemTraTracNghiemController::class, 'nopBai'])->name('nop-bai');

    //Danh sách diem
    Route::get('/danh-sach-diem/{id_bai_kiem_tra}', [DanhSachDiemController::class, 'getView'])->name('danh-sach-diem');

    //Điểm danh
    Route::get('/diem-danh/{ma_hoc_phan}/{ten_lop_hoc_phan}', [DiemDanhController::class, 'getViewDiemDanh'])->name('diem-danh');
    Route::post('/diem-danh/store', [DiemDanhController::class, 'storeDiemDanh'])->name('diem-danh.store');
    Route::get('/diem-danh/export/{ma_hoc_phan}/{ten_lop_hoc_phan}', [DiemDanhController::class, 'exportExcel'])->name('diem-danh.export');

    //API
    Route::get('/hoc-ky/api', [QuanLyHocKyController::class, 'getAPIHocKy'])->name('api-hoc-ky');
});






