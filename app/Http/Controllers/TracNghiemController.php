<?php
namespace App\Http\Controllers;

use App\Models\BaiKiemTraModel;
use App\Models\KetQuaKiemTraModel;
use App\Models\LopHocPhanModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
class TracNghiemController extends Controller
{
    public function getViewTracNghiem($id, $ma_bai_giang)
    {
        $modelLHP = new LopHocPhanModel();
        $lhp = $modelLHP->getFirstLHP($id);

        $baiKiemTra = DB::table('bai_kiem_tra')
            ->where('ma_bai_giang', $ma_bai_giang)
            ->first();

        // Lấy kết quả (nếu có) cho user hiện tại
        $ma_nguoi_dung = session('ma_nguoi_dung'); // Nếu bạn dùng Auth
        $ketQua = null;
        if($baiKiemTra && $ma_nguoi_dung) {
            $ketQua = KetQuaKiemTraModel::where('bai_kiem_tra', $baiKiemTra->id_bai_kiem_tra)
                ->where('ma_bai_giang', $ma_bai_giang)
                ->where('ma_nguoi_dung', $ma_nguoi_dung)
                ->first();
        }

        return view('trac-nghiem', compact('id', 'ma_bai_giang', 'lhp', 'baiKiemTra', 'ketQua'));
    }

    public function add(Request $request)
    {
        $data = $request->validate([
            'ten_bai_kiem_tra' => 'string|required',
            'id_lop_hoc_phan' => 'int',
            'thoi_gian' => 'int|required|min:1|max:120', // Ràng buộc thời gian làm bài
            'so_cau' => 'int|required|min:1|max:100',    // Ràng buộc số câu hỏi
            'han_chot' => 'date|required',
            'ma_bai_giang' => 'int|required',
        ]);

        $existingExam = BaiKiemTraModel::where('id_lop_hoc_phan', $data['id_lop_hoc_phan'])
            ->where('ma_bai_giang', $data['ma_bai_giang'])
            ->first();

        if ($existingExam && !$request->has('overwrite')) {
            return response()->json([
                'status' => 'exists',
                'message' => 'Bài kiểm tra đã tồn tại. Bạn có muốn ghi đè không?',
            ]);
        }

        if ($existingExam && $request->has('overwrite')) {
            $existingExam->update($data);
            return response()->json([
                'status' => 'success',
                'message' => 'Ghi đè bài kiểm tra thành công.',
            ]);
        }

        BaiKiemTraModel::create($data);

        return response()->json([
            'status' => 'success',
            'message' => 'Thêm bài kiểm tra thành công.',
        ]);
    }

    public function edit($id)
    {
        $baiKiemTra = BaiKiemTraModel::find($id);
        if (!$baiKiemTra) {
            return response()->json(['status' => 'error', 'message' => 'Bài kiểm tra không tồn tại'], 404);
        }

        return response()->json(['status' => 'success', 'data' => $baiKiemTra]);
    }

    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'ten_bai_kiem_tra' => 'string|required',
            'so_cau' => 'int|required|min:1|max:100',
            'thoi_gian' => 'int|required|min:1|max:120',
            'han_chot' => 'date|required',
        ]);

        $baiKiemTra = BaiKiemTraModel::find($id);
        if (!$baiKiemTra) {
            return response()->json(['status' => 'error', 'message' => 'Bài kiểm tra không tồn tại'], 404);
        }

        $baiKiemTra->update($data);

        return response()->json(['status' => 'success', 'message' => 'Cập nhật bài kiểm tra thành công.']);
    }

    public function delete($id)
    {
        $baiKiemTra = BaiKiemTraModel::find($id);
        if (!$baiKiemTra) {
            return response()->json(['status' => 'error', 'message' => 'Bài kiểm tra không tồn tại'], 404);
        }

        $baiKiemTra->delete();
        return response()->json(['status' => 'success', 'message' => 'Xóa bài kiểm tra thành công.']);
    }


    public function batDauKiemTra($id_bai_kiem_tra)
    {
        $baiKiemTra = BaiKiemTraModel::find($id_bai_kiem_tra);

        if (!$baiKiemTra) {
            return redirect()->back()->with('error', 'Bài kiểm tra không tồn tại.');
        }

        $currentTime = Carbon::now();
        $deadline = Carbon::parse($baiKiemTra->han_chot);

        if ($currentTime->greaterThan($deadline)) {
            return redirect()->back()->with('error', 'Bài kiểm tra đã hết hạn.');
        }

        // Chuyển hướng đến trang kiểm tra (cần điều chỉnh lại route 'kiem-tra' nếu có)
        return redirect()->route('kiem-tra', ['id' => $baiKiemTra->id_bai_kiem_tra]);
    }


}
