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

        $lop_hp = new BaiTapModel();
        $list_lop_hp = $lop_hp->getLopHocPhan();
        return view("bai-tap",
            compact("ttSinhVien", 'nop_bai','list_nop_bai','list_lop_hp'));
    }

    // BaiTapController.php
    public function createBaiTap(Request $request)
    {
        // Validate dữ liệu
        $request->validate([
            'tieu_de' => 'required|string|max:255',
            'mo_ta' => 'nullable|string',
            'han_chot' => 'required|date|after:today', // Hạn chót phải là ngày trong tương lai
            'id_lop_hoc_phan' => 'required|integer|exists:lop_hoc_phan,id_lop_hoc_phan', // Xác thực id lớp học phần
        ]);

        // Tạo bài tập mới
        $baiTap = new BaiTapModel();
        $baiTap->ten_bai_tap = $request->input('tieu_de');
        $baiTap->noi_dung_bai_tap = $request->input('mo_ta');
        $baiTap->han_nop = $request->input('han_chot');
        $baiTap->id_lop_hoc_phan = $request->input('id_lop_hoc_phan'); // Lưu id lớp học phần
        $baiTap->save();

    }

}
