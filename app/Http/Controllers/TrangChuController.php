<?php

namespace App\Http\Controllers;

use App\Models\TimKiemMoDel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TrangChuController extends Controller
{
    public function viewTrangChu()
    {
        return view('trang-chu');
    }
    public function viewTimKiem(Request $request)
    {
        $keyword = $request->input('query');
        if ($keyword) {
            $lop_hoc_phan = DB::table('lop_hoc_phan')
                ->join('hoc_phan', 'hoc_phan.id_hoc_phan', '=', 'lop_hoc_phan.id_hoc_phan')
                ->join('nguoi_dung', 'nguoi_dung.ma_nguoi_dung', '=', 'lop_hoc_phan.giang_vien')
                ->join('hoc_ky', 'hoc_ky.ma_hoc_ky', '=', 'lop_hoc_phan.hoc_ki')
                ->where('lop_hoc_phan.ten_lop_hoc_phan', 'LIKE', "%{$keyword}%")
                ->orderBy('ten_lop_hoc_phan', 'ASC') // Sắp xếp theo tên lớp học phần
                ->get();
        }
        // Trả kết quả về view với thông tin giảng viên và kết quả tìm kiếm
        return view('tim-kiem', compact('lop_hoc_phan'));
    }

    public function ViewTTTK()
    {
        $nguoiDung = DB::table('nguoi_dung')
            ->join('quyen', 'nguoi_dung.ma_quyen', '=', 'quyen.ma_quyen')
            ->join('khoa','nguoi_dung.ma_khoa','=','khoa.ma_khoa')
            ->join('lop','nguoi_dung.ma_lop','=','lop.ma_lop')
            ->where('ma_nguoi_dung', '=', session('ma_nguoi_dung'))
            ->first();
        $nguoi_dung = DB::table('nguoi_dung')

            ->get();
        return view('thong-tin-tai-khoan', compact('nguoiDung','nguoi_dung'));
    }

    public function thamGiaLop(Request $request)
    {
        // Lấy mã người dùng từ session
        $maNguoiDung = session('ma_nguoi_dung');

        // Validate dữ liệu gửi đến
        $request->validate([
            'ma_hoc_phan' => 'required|integer',
        ]);

        // Thêm dữ liệu vào bảng ghi_danh
        DB::table('ghi_danh')->insert([
            'ma_hoc_phan' => $request->ma_hoc_phan,
            'ma_nguoi_dung' => $maNguoiDung,
        ]);

        return response()->json(['success' => true, 'message' => 'Bạn đã ghi danh thành công!']);
    }


}
