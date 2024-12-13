<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    function getViewTrangChu()
    {
        $nguoidung = DB::table('nguoi_dung')
            ->join('quyen','nguoi_dung.ma_quyen','=','quyen.ma_quyen')
            ->join('khoa','nguoi_dung.ma_khoa','=','khoa.ma_khoa')
            ->get();
        $countGiangVien = DB::table('nguoi_dung')
            ->where('ma_quyen', 2)
            ->count();

        $countSinhVien = DB::table('nguoi_dung')
            ->where('ma_quyen', 3)
            ->count();

        $countNguoiDung = DB::table('nguoi_dung')->count();
        $countLop = DB::table('lop')->count();
        $countKhoa = DB::table('khoa')->count();
        $countHocPhan = DB::table('hoc_phan')->count();


        return view('admin.trang-chu', compact(
            'countGiangVien',
            'countSinhVien',
            'countNguoiDung',
            'countLop',
            'countKhoa',
            'countHocPhan',
        'nguoidung'));
    }
}
