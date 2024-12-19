<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MasterContoller extends Controller
{
    public function getViewMaster(){
        $nguoidung = DB::table('nguoi_dung')
            ->join('quyen', 'nguoi_dung.ma_quyen', '=', 'quyen.ma_quyen')
            ->where('ma_nguoi_dung', '=', session('ma_nguoi_dung'))
            ->first();
        return view('admin.master', compact('nguoidung'));
    }
}
