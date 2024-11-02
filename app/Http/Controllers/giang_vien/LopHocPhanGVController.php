<?php

namespace App\Http\Controllers\giang_vien;

use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\DB;

class LopHocPhanGVController extends Controller
{
    public function getViewLopHP()
    {
        $GiangVien = DB::table('nguoi_dung')
            ->join('quyen', 'nguoi_dung.ma_quyen', '=', 'quyen.ma_quyen')
            ->where('ma_nguoi_dung', '=', session('ma_nguoi_dung'))
            ->first();
        return view("giang_vien.lop_hoc_phan.lop_hoc_phan", compact('GiangVien'));
    }
}
