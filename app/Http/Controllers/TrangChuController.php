<?php

namespace App\Http\Controllers;

use App\Models\NguoiDungModel;
use App\Models\TaiKhoanModel;
use App\Models\TimKiemMoDel;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
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

        // Khởi tạo truy vấn cơ sở
        $query = DB::table('lop_hoc_phan')
            ->join('hoc_phan', 'hoc_phan.id_hoc_phan', '=', 'lop_hoc_phan.id_hoc_phan')
            ->join('nguoi_dung', 'nguoi_dung.ma_nguoi_dung', '=', 'lop_hoc_phan.giang_vien')
            ->join('hoc_ky', 'hoc_ky.ma_hoc_ky', '=', 'lop_hoc_phan.hoc_ki');

        // Nếu có từ khóa tìm kiếm
        if ($keyword) {
            $query->where(function($q) use ($keyword) {
                $q->where('lop_hoc_phan.ten_lop_hoc_phan', 'LIKE', "%{$keyword}%")
                    ->orWhere('hoc_phan.ten_hoc_phan', 'LIKE', "%{$keyword}%")
                    ->orWhere('lop_hoc_phan.id_lop_hoc_phan', 'LIKE', "%{$keyword}%")
                    ->orWhere('hoc_phan.id_hoc_phan', 'LIKE', "%{$keyword}%");
            });
        }

        // Lấy kết quả và sắp xếp theo tên lớp học phần
        $lop_hoc_phan = $query->orderBy('lop_hoc_phan.ten_lop_hoc_phan', 'ASC')->get();

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

            // Kiểm tra nếu người dùng yêu cầu xóa ảnh cũ và ảnh cũ không phải là 'user.png'
            if ($request->input('delete_image') === "true" && $thongtintk->hinh_anh && $thongtintk->hinh_anh !== 'user.png') {
                // Kiểm tra sự tồn tại của file ảnh cũ và xóa nó
                $oldImagePath = public_path('assets/img_user/' . $thongtintk->hinh_anh);
                if (file_exists($oldImagePath)) {
                    unlink($oldImagePath); // Xóa ảnh cũ
                }
            }
        }

        // Cập nhật thông tin người dùng với ảnh mới hoặc không có thay đổi ảnh
        $thongtintk->update($validated);

        return response()->json([
            'success' => true,
            'thongtintk' => $thongtintk,
        ]);
    }

    public function changePassword(Request $request)
    {
        // Validate the input data
        $request->validate([
            'currentPassword' => 'required|string',
            'newPassword' => 'required|string|min:8|confirmed',
        ]);

        // Lấy thông tin tài khoản người dùng
        $user = TaiKhoanModel::where('ma_tai_khoan', Auth::user()->ma_tai_khoan)->first();

        // Kiểm tra mật khẩu cũ
        if (!Hash::check($request->currentPassword, $user->mat_khau)) {
            return back()->withErrors(['currentPassword' => 'Mật khẩu cũ không đúng.']);
        }

        // Cập nhật mật khẩu mới, mã hóa mật khẩu trước khi lưu
        $user->update([
            'mat_khau' => Hash::make($request->newPassword),
        ]);

        // Đăng xuất người dùng sau khi cập nhật mật khẩu
        Auth::logout();

        // Xóa tất cả session để đảm bảo không còn phiên làm việc cũ
        session()->invalidate();
        session()->regenerateToken();

        return back()->with('success', 'Mật khẩu đã được cập nhật thành công! Vui lòng đăng nhập lại.');
    }

}
