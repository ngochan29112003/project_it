<?php

namespace App\Http\Controllers\giang_vien;

use App\Http\Controllers\Controller;
use App\Models\NguoiDungModel;
use Illuminate\Support\Facades\DB;

class DashBoardGVController extends Controller
{
    public function GetViewTTGV()
    {
        $ttGiangVien = DB::table('nguoi_dung')
            ->join('quyen','nguoi_dung.ma_quyen','=','quyen.ma_quyen')
            ->where('ma_nguoi_dung','=',session('ma_nguoi_dung'))
            ->first();
        return view('giang_vien.dashboard.nha-cua-toi', compact('ttGiangVien'));
    }
}
