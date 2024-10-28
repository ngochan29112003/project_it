<?php

namespace App\Http\Controllers\giang_vien;

use App\Http\Controllers\Controller;

use App\Models\LopHocPhanModel;
use DB;
use Illuminate\Http\Request;
class LopHocPhanGVController extends Controller
{
    public function getViewLopHP()
    {
        $ttSinhVien = DB::table('nguoi_dung')
            ->join('quyen','nguoi_dung.ma_quyen','=','quyen.ma_quyen')
            ->where('ma_nguoi_dung','=',session('ma_nguoi_dung'))
            ->first();
        return view("giang_vien.lop_hoc_phan.lop_hoc_phan", 
        compact("ttSinhVien"));
    }
}