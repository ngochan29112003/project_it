<?php

namespace App\Http\Controllers;

use App\Models\BaiTapFileModel;
use App\Models\BaiTapModel;
use App\Models\LopHocPhanModel;
use App\Models\NguoiDungModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BaiTapController extends Controller
{
    public function getView($id, $ma_bai_giang)
    {

        $baiTaps = BaiTapModel::where('id_lop_hoc_phan', $id)->get();
        return view('bai-tap', compact('id', 'ma_bai_giang', 'baiTaps'));
    }

    public function getViewChiTietBaiTap($id)
    {
        // Lấy thông tin bài tập
        $baiTap = BaiTapModel::where('ma_bai_tap', $id)->first();

        if (!$baiTap) {
            return redirect()->back()->with('error', 'Bài tập không tồn tại.');
        }

        // Hoặc sử dụng Session
        $ma_nguoi_dung = session('ma_nguoi_dung');

        // Kiểm tra xem người dùng đã đăng nhập và có mã người dùng hay không
        if (!$ma_nguoi_dung) {
            return redirect()->back()->with('error', 'Vui lòng đăng nhập để xem chi tiết bài tập.');
        }

        // Lấy danh sách file đã nộp bởi người dùng hiện tại cho bài tập này
        $listFiles = BaiTapFileModel::where('ma_bai_tap', $id)
            ->where('ma_nguoi_dung', $ma_nguoi_dung)
            ->get();

        return view('nop-bai-tap', compact('id', 'baiTap', 'listFiles'));
    }



    public function add(Request $request)
    {
        // Validate dữ liệu
        $validatedData = $request->validate([
            'tieu_de' => 'required|string|max:255',
            'noi_dung_bai_tap' => 'string',
            'han_nop' => 'required|date',
            'id_lop_hoc_phan' => 'required|integer',
            'ma_bai_giang' => 'required|string|max:255',
        ]);

        // Lưu vào database
        BaiTapModel::create([
            'tieu_de' => $validatedData['tieu_de'],
            'noi_dung_bai_tap' => $validatedData['noi_dung_bai_tap'],
            'han_nop' => $validatedData['han_nop'],
            'id_lop_hoc_phan' => $validatedData['id_lop_hoc_phan'],
            'ma_bai_giang' => $validatedData['ma_bai_giang'],
        ]);

        // Trả về phản hồi
        return response()->json(['status' => 'success', 'message' => 'Bài tập đã được thêm thành công!']);
    }

    public function edit($id)
    {
        $baiTap = BaiTapModel::find($id);

        if (!$baiTap) {
            return response()->json(['status' => 'error', 'message' => 'Bài tập không tồn tại.']);
        }

        return response()->json(['status' => 'success', 'data' => $baiTap]);
    }

    public function update(Request $request, $id)
    {
        // Validate dữ liệu
        $validatedData = $request->validate([
            'tieu_de' => 'required|string|max:255',
            'noi_dung_bai_tap' => 'string',
            'han_nop' => 'required|date',
        ]);

        $baiTap = BaiTapModel::find($id);

        if (!$baiTap) {
            return response()->json(['status' => 'error', 'message' => 'Bài tập không tồn tại.']);
        }

        // Cập nhật bài tập
        $baiTap->update([
            'tieu_de' => $validatedData['tieu_de'],
            'noi_dung_bai_tap' => $validatedData['noi_dung_bai_tap'],
            'han_nop' => $validatedData['han_nop'],
        ]);

        return response()->json(['status' => 'success', 'message' => 'Bài tập đã được cập nhật thành công!']);
    }

    public function uploadFile(Request $request, $id)
    {
        // Lấy bài tập theo ID
        $baiTap = BaiTapModel::find($id);

        if (!$baiTap) {
            return response()->json(['status' => 'error', 'message' => 'Bài tập không tồn tại.'], 404);
        }

        // Kiểm tra hạn nộp
        $now = now();
        if ($now->greaterThan($baiTap->han_nop)) {
            return response()->json(['status' => 'error', 'message' => 'Hạn nộp đã kết thúc. Không thể nộp bài nữa.'], 403);
        }

        // Tiếp tục xử lý upload file nếu chưa quá hạn

        // Validate file
        $request->validate([
            'file' => 'required|file'
        ]);

        $file = $request->file('file');
        $originalName = $file->getClientOriginalName();

        // Đổi tên file để tránh trùng lặp, có thể gắn timestamp hoặc unique_id
        $filename = time() . '_' . $originalName;

        // Lưu file vào thư mục public/file_bai_tap
        $file->move(public_path('file_bai_tap'), $filename);

        // Lưu vào database
        $ma_nguoi_dung = session('ma_nguoi_dung');

        BaiTapFileModel::create([
            'ten_file' => $filename,
            'ma_bai_tap' => $id,
            'ma_nguoi_dung' => $ma_nguoi_dung,
            // 'ma_bai_giang' => ... // nếu cần
        ]);

        return response()->json(['status' => 'success', 'message' => 'File đã được nộp thành công!']);
    }

    public function deleteFile($id)
    {
        // Lấy mã người dùng từ session
        $ma_nguoi_dung = session('ma_nguoi_dung');

        // Tìm file theo ID
        $file = BaiTapFileModel::find($id);

        if (!$file) {
            return response()->json(['status' => 'error', 'message' => 'File không tồn tại.'], 404);
        }

        // Kiểm tra quyền: người dùng chỉ được xóa file của mình hoặc người quản trị (ma_quyen == 2)
        if ($file->ma_nguoi_dung != $ma_nguoi_dung && session('ma_quyen') != 2) {
            return response()->json(['status' => 'error', 'message' => 'Bạn không có quyền xóa file này.'], 403);
        }

        // Xóa file khỏi thư mục
        $filePath = public_path('file_bai_tap/' . $file->ten_file);
        if (file_exists($filePath)) {
            unlink($filePath);
        }

        // Xóa bản ghi trong database
        $file->delete();

        return response()->json(['status' => 'success', 'message' => 'File đã được xóa thành công!']);
    }

    public function showListNopBT($ma_bai_tap)
    {
        // Lấy tất cả các bản ghi nộp bài cho bài tập này
        $submissions = BaiTapFileModel::where('ma_bai_tap', $ma_bai_tap)
            ->with('user') // Tải thông tin sinh viên
            ->get();

        // Nhóm các bản ghi theo mã người dùng
        $grouped = $submissions->groupBy('ma_nguoi_dung');

        $list = [];
        $stt = 1;
        foreach ($grouped as $ma_nguoi_dung => $files) {
            $user = NguoiDungModel::find($ma_nguoi_dung);
            if ($user) {
                $list[] = [
                    'stt' => $stt++,
                    'ten_sinh_vien' => $user->ten_nguoi_dung, // Hoặc trường tên phù hợp
                    'files' => $files
                ];
            }
        }

        return response()->json(['status' => 'success', 'data' => $list]);
    }
}
