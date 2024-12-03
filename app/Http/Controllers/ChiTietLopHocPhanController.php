<?php

namespace App\Http\Controllers;

use App\Models\BaiGiangModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use function Laravel\Prompts\select;

class ChiTietLopHocPhanController extends Controller
{
    public function getViewChiTietLopHocPhan($id)
    {
        $chiTietLHP  = DB::table('lop_hoc_phan')
            ->join('hoc_phan', 'hoc_phan.id_hoc_phan', '=', 'lop_hoc_phan.id_hoc_phan')
            ->join('nguoi_dung', 'nguoi_dung.ma_nguoi_dung', '=', 'lop_hoc_phan.giang_vien')
            ->join('hoc_ky', 'hoc_ky.ma_hoc_ky', '=', 'lop_hoc_phan.hoc_ki')
            ->where('lop_hoc_phan.id_lop_hoc_phan', '=', $id)
            ->first();

        // Lấy ID người dùng từ session (hoặc phương thức phù hợp)
        $maNguoiDung = session('ma_nguoi_dung'); // Giả sử mã người dùng lưu trong session

        // Kiểm tra xem người dùng đã ghi danh vào lớp học phần chưa
        $daGhiDanh = DB::table('ghi_danh')
            ->where('ma_hoc_phan', $chiTietLHP->id_lop_hoc_phan)
            ->where('ma_nguoi_dung', $maNguoiDung)
            ->exists();

        $dsBaiGiang = DB::table('bai_giang')
            ->where('id_lop_hoc_phan', $chiTietLHP->id_lop_hoc_phan)
            ->get();
//        dd($dsBaiGiang);
        return view('lop_hoc_phan',
            compact('chiTietLHP', 'daGhiDanh','dsBaiGiang'));
    }

    public function addBaiGiang(Request $request)
    {
//        dd($request);
        // Validate các trường dữ liệu
        $validate = $request->validate([
            'id_lop_hoc_phan'=>'int',
            'ten_bai_giang' => 'required|string|max:255',
            'noi_dung_bai_giang' => 'nullable|string',
            'file_path' => 'nullable|mimes:jpg,jpeg,png,pdf,doc,docx,ppt,pptx,txt|max:10000', // 20MB
            'video_path' => 'nullable|url', // 50MB
            'link' => 'nullable|url',
            'kiem_tra' => 'nullable|string',
            'bai_tap' => 'nullable|string',
        ]);

        // Khởi tạo biến lưu đường dẫn file và video
        $file_path = null;

        // Kiểm tra và lưu file nếu có
        if ($request->hasFile('file')) {
            $file_path = $request->file('file')->move(public_path('file'), $request->file('file')->getClientOriginalName());
        }


        BaiGiangModel::create($validate);
        // Trả về phản hồi JSON với dữ liệu bài giảng
        return response()->json([
            'success' => true,
            'status' => 200,
            'message' => 'Thêm thành công!',
        ]);

    }



}
