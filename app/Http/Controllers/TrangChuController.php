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
            $lop_hoc_phan = TimKiemMoDel::where('ten_lop_hoc_phan', 'LIKE', "%{$keyword}%")
                ->orderBy('ten_lop_hoc_phan', 'asc') // Sắp xếp theo tên lớp học phần
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
}
