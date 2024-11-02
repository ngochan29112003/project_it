<?php

namespace App\Http\Controllers\giang_vien;

use App\Http\Controllers\Controller;

use App\Models\LopHocPhanModel;
use App\Models\NguoiDungModel;
use DB;
use Illuminate\Http\Request;
class EnrollGVController extends Controller
{
    public function getViewEnroll()
    {
        $GiangVien = \Illuminate\Support\Facades\DB::table('nguoi_dung')
            ->join('quyen','nguoi_dung.ma_quyen','=','quyen.ma_quyen')
            ->where('ma_nguoi_dung','=',session('ma_nguoi_dung'))
            ->first();
        return view("giang_vien.lop_hoc_phan.kq_tim_kiem",compact('GiangVien'));
    }
}
