<?php

namespace App\Http\Controllers\sinh_vien;

use App\Http\Controllers\Controller;
use App\Models\TimKiemMoDel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SinhVienController extends Controller
{
    public function getViewTrangChu()
    {
        return view('sinh_vien.trang-chu');
    }
    public function getViewTimKiemSv(Request $request)
    {
//        dd($request->input('query'));
        // Lấy từ khóa tìm kiếm từ form
        $keyword = $request->input('query');

        // Kiểm tra nếu có từ khóa, thực hiện tìm kiếm
        if ($keyword) {
            // Tìm kiếm theo tên lớp học phần hoặc mã học phần
            $lop_hoc_phan = TimKiemMoDel::where('ten_lop_hoc_phan', 'LIKE', "%{$keyword}%")
                ->orderBy('ten_lop_hoc_phan', 'asc') // Sắp xếp theo tên lớp học phần
                ->get();
        } else {
            // Nếu không có từ khóa, trả về tất cả lớp học phần
            $lop_hoc_phan = TimKiemMoDel::all();
        }

        // Trả kết quả về view với thông tin giảng viên và kết quả tìm kiếm
        return view('sinh_vien.lop_hoc_phan.kq_tim_kiem', compact('lop_hoc_phan'));
    }
}
