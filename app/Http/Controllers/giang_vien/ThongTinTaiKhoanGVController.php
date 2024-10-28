<?php

namespace App\Http\Controllers\giang_vien;

use App\Http\Controllers\Controller;

use App\Models\NguoiDungModel;
use DB;
use Illuminate\Http\Request;
class ThongTinTaiKhoanGVController extends Controller
{
    public function getViewTTTK()
    {
        $ttSinhVien = DB::table('nguoi_dung')
            ->join('quyen','nguoi_dung.ma_quyen','=','quyen.ma_quyen')
            ->where('ma_nguoi_dung','=',session('ma_nguoi_dung'))
            ->first();
        return view("giang_vien.thong_tin_tai_khoan.thong_tin_tai_khoan", 
        compact("ttSinhVien"));
    }
}