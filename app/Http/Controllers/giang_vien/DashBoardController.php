<?php

namespace App\Http\Controllers\giang_vien;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashBoardController extends Controller
{
    public function getViewDashBoard()
    {
        $ttSinhVien = DB::table('nguoi_dung')
            ->join('quyen','nguoi_dung.ma_quyen','=','quyen.ma_quyen')
            ->where('ma_nguoi_dung','=',session('ma_nguoi_dung'))
            ->first();
        return view('giang_vien.dashboard.nha-cua-toi',compact('ttSinhVien'));
    }
}