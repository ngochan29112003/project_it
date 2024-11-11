<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ChiTietLopHocPhanController extends Controller
{
    public function getViewChiTietLopHocPhan($id)
    {
        $chiTietLHP  = DB::table('lop_hoc_phan')
            ->join('hoc_phan', 'hoc_phan.id_hoc_phan', '=', 'lop_hoc_phan.id_hoc_phan')
            ->join('nguoi_dung', 'nguoi_dung.ma_nguoi_dung', '=', 'lop_hoc_phan.giang_vien')
            ->join('hoc_ky', 'hoc_ky.ma_hoc_ky', '=', 'lop_hoc_phan.hoc_ki')
            ->where('lop_hoc_phan.id_lop_hoc_phan', '=', $id)
            ->first();

        // Lấy ID người dùng từ session (hoặc phương thức phù hợp)
        $maNguoiDung = session('ma_nguoi_dung'); // Giả sử mã người dùng lưu trong session

        // Kiểm tra xem người dùng đã ghi danh vào lớp học phần chưa
        $daGhiDanh = DB::table('ghi_danh')
            ->where('ma_hoc_phan', $chiTietLHP->id_lop_hoc_phan)
            ->where('ma_nguoi_dung', $maNguoiDung)
            ->exists();

//        dd($chiTietLHP);
        return view('lop_hoc_phan', compact('chiTietLHP', 'daGhiDanh'));
    }
}
