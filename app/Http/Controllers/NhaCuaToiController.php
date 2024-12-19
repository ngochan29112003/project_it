<?php

namespace App\Http\Controllers;

use App\Models\GhiDanhModel;
use App\Models\HocPhanModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class NhaCuaToiController extends Controller
{
    public function GetViewNhaCuaToi()
    {
        // Lấy thông tin người dùng
        $nguoidung = DB::table('nguoi_dung')
            ->join('quyen', 'nguoi_dung.ma_quyen', '=', 'quyen.ma_quyen')
            ->where('ma_nguoi_dung', '=', session('ma_nguoi_dung'))
            ->first();

        // Lấy danh sách học phần đã ghi danh với thông tin lớp học phần và giảng viên
        $hocphandaghi = DB::table('ghi_danh')
            ->join('lop_hoc_phan', 'ghi_danh.ma_hoc_phan', '=', 'lop_hoc_phan.id_lop_hoc_phan')
            ->join('hoc_phan', 'lop_hoc_phan.id_hoc_phan', '=', 'hoc_phan.id_hoc_phan')
            ->join('nguoi_dung', 'lop_hoc_phan.giang_vien', '=', 'nguoi_dung.ma_nguoi_dung')
            ->select(
                'ghi_danh.ma_ghi_danh',
                'hoc_phan.ten_hoc_phan',
                'hoc_phan.ma_hoc_phan',
                'lop_hoc_phan.ten_lop_hoc_phan',
                'lop_hoc_phan.id_lop_hoc_phan',
                'nguoi_dung.ten_nguoi_dung as ten_giang_vien',// Lấy tên giảng viên
            )
            ->where('ghi_danh.ma_nguoi_dung', '=', session('ma_nguoi_dung'))
            ->get();

//        $idNguoiDung = session('ma_nguoi_dung');
//        $khoaHocTruyCap = DB::table('lich_su_truy_cap')
//            ->join('hoc_phan', 'lich_su_truy_cap.ma_hoc_phan', '=', 'hoc_phan.ma_hoc_phan') // Kết nối với bảng học phần
//            ->leftJoin('ghi_danh', 'hoc_phan.ma_hoc_phan', '=', 'ghi_danh.ma_hoc_phan') // Liên kết để đếm số sinh viên
//            ->select(
//                'hoc_phan.ten_hoc_phan',
//                'hoc_phan.ma_hoc_phan',
//            )
//            ->where('lich_su_truy_cap.ma_nguoi_dung', $idNguoiDung)
//            ->groupBy( 'hoc_phan.ten_hoc_phan', 'hoc_phan.ma_hoc_phan')
//            ->orderBy('lich_su_truy_cap.id_lich_su', 'desc')
//            ->limit(6)
//            ->get();

        return view('nha-cua-toi', compact('nguoidung', 'hocphandaghi'));
    }

    function deleteHocPhan($id)
    {
        $ghidanh = GhiDanhModel::findOrFail($id); // Sử dụng id được truyền từ route

        // Xóa ghi danh
        $ghidanh->delete();

        return response()->json([
            'success' => true,
            'message' => 'Xóa thành công'
        ]);
    }
}
