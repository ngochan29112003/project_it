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

    public function updateTTTK(Request $request, $id)
{
    // Xác thực dữ liệu từ form
    $validated = $request->validate([
        'fullName' => 'required|string',
        'gender' => 'required|string',
        'dob' => 'required|date',
        'birthPlace' => 'required|string',
        'address' => 'required|string',
        'phone' => 'required|string',
        'email' => 'required|email',
    ]);

    // Lấy thông tin người dùng từ cơ sở dữ liệu
    $tttk = NguoiDungModel::findOrFail($id);
    // Kiểm tra xem có ảnh mới hay không
    if ($request->hasFile('profile_image') && $request->file('profile_image')->isValid()) {
        // Lấy tệp ảnh và lưu vào thư mục public/assets/img_user
        $file = $request->file('profile_image');
        $fileName = $file->getClientOriginalName();  // Lấy tên gốc của ảnh

        // Lưu ảnh vào thư mục public/assets/img_user
        $file->move(public_path('assets/img_user'), $fileName);

        // Cập nhật tên ảnh vào cơ sở dữ liệu
        $tttk->hinh_anh = $fileName;
    }

    // Cập nhật thông tin người dùng
    $tttk->update([
        'ten_nguoi_dung' => $validated['fullName'],
        'gioi_tinh' => $validated['gender'],
        'ngay_sinh' => $validated['dob'],
        'noi_sinh' => $validated['birthPlace'],
        'ho_khau_thuong_tru' => $validated['address'],
        'sdt' => $validated['phone'],
        'email' => $validated['email'],
    ]);

    // Trả về phản hồi JSON
    return redirect()->route('thong-tin-tai-khoan')->with('success', 'Cập nhật thông tin tài khoản thành công!');
}
}
