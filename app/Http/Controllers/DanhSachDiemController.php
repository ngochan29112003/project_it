<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use function Laravel\Prompts\select;

class DanhSachDiemController extends Controller
{
    function getView($id_bai_kiem_tra)
    {
        $ten_bai_kiem_tra = DB::table('bai_kiem_tra')
            ->where('id_bai_kiem_tra',$id_bai_kiem_tra)
            ->select('ten_bai_kiem_tra')
            ->first()->ten_bai_kiem_tra;

        $dsDiemSV = DB::table('ket_qua_kiem_tra')
            ->join('nguoi_dung','nguoi_dung.ma_nguoi_dung','=','ket_qua_kiem_tra.ma_nguoi_dung')
            ->select('nguoi_dung.ten_nguoi_dung', 'ket_qua_kiem_tra.diem', 'ket_qua_kiem_tra.so_cau_dung')
            ->where('bai_kiem_tra',$id_bai_kiem_tra)
            ->get();
//        dd($dsDiemSV->toArray());
        return view('danh-sach-diem', ['ten_bai_kiem_tra' => $ten_bai_kiem_tra, 'dsDiemSV' => $dsDiemSV]);
    }
}
