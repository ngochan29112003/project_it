<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class QuanLyLopHocPhanController extends Controller
{
    public function viewLopHocPhan($id)
    {
        $ttHocPhan = DB::table('hoc_phan')
            ->where('id_hoc_phan','=',$id)
            ->first();
        $hocKy = DB::table('hoc_ky')->orderByDesc('ma_hoc_ky')->get();
        $giangVien = DB::table('nguoi_dung')
            ->where('ma_quyen','=',2)
            ->get();
        $list_lhp = DB::table('lop_hoc_phan')
            ->join('nguoi_dung','lop_hoc_phan.giang_vien','=','nguoi_dung.ma_nguoi_dung')
            ->where('id_hoc_phan','=',$id)
            ->get();
        return
            view('admin.ql_lop_hoc_phan.danh-sach',
                compact('ttHocPhan', 'hocKy', 'giangVien','list_lhp'));
    }

    public function addLopHocPhan(Request $request)
    {
        // Validate the request
        $validate = $request->validate([
            'ma_hoc_phan' => 'required|string',
            'id_hoc_phan' => 'required|integer',
            'maHK' => 'required|string',
            'giang_vien' => 'required|integer',
            'dot' => 'required|integer',
            'loai_lop' => 'required|string',
            'soluonglop' => 'nullable|integer',
        ]);

        $maHK = $request->maHK;
        $id_hoc_phan = $request->id_hoc_phan;
        $dot = $request->dot;
        $ma_hoc_phan = $request->ma_hoc_phan;
        $loai_lop = $request->loai_lop;
        $giang_vien = $request->giang_vien;
        $soluonglop = $request->soluonglop ?? 1; // Nếu không có `soluonglop` thì mặc định là 1
        $hoc_ki = $request->maHK;

        // Lấy số thứ tự lớn nhất của lớp có cùng `maHK`, `dot`, `ma_hoc_phan` từ DB
        $lastClass = DB::table('lop_hoc_phan')
            ->where('id_hoc_phan', $ma_hoc_phan)
            ->where('dot', $dot)
            ->where('loai_lop', $loai_lop)
            ->orderBy('ten_lop_hoc_phan', 'desc')
            ->first();

        // Xác định số thứ tự tiếp theo
        $nextClassNumber = 1;
        if ($lastClass) {
            // Lấy số thứ tự từ tên lớp cuối cùng
            preg_match('/_(\d{2})_tructiep$/', $lastClass->ten_lop_hoc_phan, $matches);
            if (!empty($matches)) {
                $nextClassNumber = intval($matches[1]) + 1;
            }
        }

        // Tạo các lớp theo số lượng yêu cầu
        for ($i = 0; $i < $soluonglop; $i++) {
            $classNumber = str_pad($nextClassNumber + $i, 2, '0', STR_PAD_LEFT);

            // Tạo chuỗi `ten_lop_hoc_phan` dựa trên `loai_lop`
            if ($loai_lop === 'LT') {
                $ten_lop_hoc_phan = "{$maHK}_{$dot}{$ma_hoc_phan}_KS2A_{$classNumber}_tructiep";
            } elseif ($loai_lop === 'BT') {
                $ten_lop_hoc_phan = "{$maHK}_{$dot}{$ma_hoc_phan}_(BT)_KS2A_{$classNumber}_tructiep";
            } else {
                continue; // Bỏ qua nếu `loai_lop` không hợp lệ
            }

            // Lưu thông tin lớp học phần vào cơ sở dữ liệu
            DB::table('lop_hoc_phan')->insert([
                'ten_lop_hoc_phan' => $ten_lop_hoc_phan,
                'so_luong_sinh_vien' => 0, // Giá trị mặc định, bạn có thể cập nhật sau nếu cần
                'giang_vien' => $giang_vien,
                'id_hoc_phan' => $id_hoc_phan,
                'dot' => $dot,
                'loai_lop' => $loai_lop,
                'ngay_tao' => now(),
                'hoc_ki' => $hoc_ki
            ]);
        }

        return response()->json([
            'success' => true,
            'status' => 200,
            'message' => 'Thêm thành công!',
        ]);
    }


}
