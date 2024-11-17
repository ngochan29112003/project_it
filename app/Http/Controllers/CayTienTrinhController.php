<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\TaiKhoanModel;
use App\Models\CayTienTrinhModel;

class CayTienTrinhController extends Controller
{
    public function getViewCayTienTrinh(Request $request)
{
    // Lấy từ khóa tìm kiếm từ request
    $search = $request->input('search');

    // Lọc danh sách tiến trình dựa trên từ khóa tìm kiếm
    $caytientrinhmodel = new CayTienTrinhModel();
    $list_tien_trinh = $caytientrinhmodel->getTienTrinh();

    if ($search) {
        // Lọc theo tên tiến trình nếu có từ khóa tìm kiếm
        $list_tien_trinh = $list_tien_trinh->filter(function ($item) use ($search) {
            return str_contains(strtolower($item->ten_khoa), strtolower($search));
        });
    }

    // Lấy danh sách khoa (vẫn giữ nguyên chức năng lọc khoa)
    $list_khoa = $this->groupkhoa($request);

    // Trả về view với dữ liệu đã lọc
    return view('cay-tien-trinh', compact('list_tien_trinh', 'list_khoa'));
}

    public function groupkhoa(Request $request)
    {
        // Lấy giá trị ma_khoa từ request
        $ma_khoa = $request->input('ma_khoa');
        
        // Nếu có chọn khoa, lọc tiến trình theo ma_khoa
        if ($ma_khoa) {
            $list_tien_trinh = DB::table('cay_tien_trinh')
                ->where('ma_khoa', $ma_khoa)
                ->get();
        } else {
            // Nếu không chọn khoa, hiển thị tất cả tiến trình
            $list_tien_trinh = DB::table('cay_tien_trinh')->get();
        }

        // Lấy danh sách các khoa
        $list_loc_khoa = DB::table('khoa')->get(); 
        
        // Trả về danh sách các khoa
        return $list_loc_khoa;
    }
}