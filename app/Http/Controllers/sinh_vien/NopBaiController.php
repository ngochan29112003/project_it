<?php

namespace App\Http\Controllers\sinh_vien;

use App\Http\Controllers\Controller;

use App\Models\BaiTapModel;
use DB;
use Illuminate\Http\Request;
class NopBaiController extends Controller
{
    public function getViewNopBai()
    {
        $ttSinhVien = DB::table('nguoi_dung')
            ->join('quyen','nguoi_dung.ma_quyen','=','quyen.ma_quyen')
            ->where('ma_nguoi_dung','=',session('ma_nguoi_dung'))
            ->first();

        $nop_bai= new BaiTapModel();
        $list_nop_bai = $nop_bai->getBaiTap();
        return view("sinh_vien.bai_tap.bai_tap", 
        compact("ttSinhVien"));
    }
}