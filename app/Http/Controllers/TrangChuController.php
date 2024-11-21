<?php

namespace App\Http\Controllers;

use App\Models\NguoiDungModel;
use App\Models\TimKiemMoDel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

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

        $thongtin = new NguoiDungModel();
        $user = $thongtin->getthongtin();
//        dd($user);
        return view('thong-tin-tai-khoan', compact('nguoiDung','nguoi_dung', 'user'));
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

    public function updateTTTK(Request $request)
    {
        dd($request);
        $validated = $request->validate([
            'ma_nguoi_dung'=> 'int',
            'hinh_anh' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Kiểm tra file ảnh
            'ten_nguoi_dung' => 'required|string|max:255',
            'gioi_tinh' => 'required|string',
            'ngay_sinh' => 'required|date',
            'noi_sinh' => 'nullable|string|max:255',
            'ho_khau_thuong_tru' => 'nullable|string|max:255',
            'email' => 'required|email',
            'sdt' => 'required|string|max:15',
        ]);


        $thongtintk = NguoiDungModel::findOrFail($validated['ma_nguoi_dung']);

        // Xử lý file upload
        if ($request->hasFile('hinh_anh')) {
            $file = $request->file('hinh_anh');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('assets/img_user'), $fileName);
            $validated['hinh_anh'] = $fileName;

            // Xóa ảnh cũ nếu có
            if ($request->input('delete_image') === "true") {
                if ($thongtintk->hinh_anh && file_exists(public_path('assets/img_user/' . $thongtintk->hinh_anh))) {
                    unlink(public_path('assets/img_user/' . $thongtintk->hinh_anh));
                }
                $validated['hinh_anh'] = null; // Xóa ảnh khỏi DB
            }
        }

        $thongtintk->update($validated);

        return response()->json([
            'success' => true,
            'thongtintk' => $thongtintk,
        ]);
    }


}
