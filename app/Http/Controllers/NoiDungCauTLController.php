<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use function Laravel\Prompts\select;

class NoiDungCauTLController extends Controller
{
    function getView($id_diem)
    {
        $ten_nguoi_lam_bai = DB::table('ket_qua_kiem_tra')
        ->join('nguoi_dung', 'nguoi_dung.ma_nguoi_dung', '=', 'ket_qua_kiem_tra.ma_nguoi_dung')
        ->select('nguoi_dung.ten_nguoi_dung', 'ket_qua_kiem_tra.diem')
        ->where('ket_qua_kiem_tra.id', $id_diem) // Lọc theo id bài kiểm tra
        ->first();

        $ndcautl = DB::table('bai_lam_sinh_vien')
        ->join('ket_qua_kiem_tra', function ($join) {
            $join->on('bai_lam_sinh_vien.ma_nguoi_dung', '=', 'ket_qua_kiem_tra.ma_nguoi_dung')
                ->on('bai_lam_sinh_vien.bai_kiem_tra', '=', 'ket_qua_kiem_tra.bai_kiem_tra');
        })
        ->join('ngan_hang_cau_hoi', 'ngan_hang_cau_hoi.id', '=', 'bai_lam_sinh_vien.id_cau_hoi')
        ->where('ket_qua_kiem_tra.id', $id_diem)
        ->select('bai_lam_sinh_vien.id_cau_hoi', 'bai_lam_sinh_vien.cau_tra_loi', 'ngan_hang_cau_hoi.cau_hoi', 'ngan_hang_cau_hoi.dap_an_dung')
        ->get();

// dd($ndcautl);
        return view('noi-dung-cau-tl', ['ndcautl' => $ndcautl, 'ten_nguoi_lam_bai'=>$ten_nguoi_lam_bai]);
    }
}