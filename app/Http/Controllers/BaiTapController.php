<?php

namespace App\Http\Controllers;

use App\Models\BaiTapModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BaiTapController extends Controller
{
    public function getViewBaitap()
    {
        $ttSinhVien = DB::table('nguoi_dung')
            ->join('quyen','nguoi_dung.ma_quyen','=','quyen.ma_quyen')
            ->where('ma_nguoi_dung','=',session('ma_nguoi_dung'))
            ->first();

        $nop_bai= new BaiTapModel();
        $list_nop_bai = $nop_bai->getBaiTap();
        return view("bai-tap",
            compact("ttSinhVien", 'nop_bai','list_nop_bai'));
    }
}
