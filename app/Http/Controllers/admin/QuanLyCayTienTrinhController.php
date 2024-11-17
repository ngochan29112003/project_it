<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\CayTienTrinhModel;
use Illuminate\Http\Request;

class QuanLyCayTienTrinhController extends Controller
{
    public function getViewDsCTT()
    {
        $model=new CayTienTrinhModel();
        $list_ds=$model->getTienTrinh();
        $list_khoa=$model->getKhoa();
        return view('admin.ql_cay_tien_trinh.danh-sach',compact('list_ds','list_khoa'));
    }

    public function addCTT(Request $request)
    {
        // Xác thực dữ liệu
        $validated = $request->validate([
            'ma_khoa' => 'required|int',
            'cay_tien_trinh' => 'required|file|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
            'khoa_hoc' => 'required|string', // Chỉnh lại kiểu dữ liệu cho khóa học
        ]);

        // Lấy tên tệp ảnh
        if ($request->hasFile('cay_tien_trinh')) {
            $file = $request->file('cay_tien_trinh');
            if ($file->isValid()) {
                $fileName = time() . '.' . $file->getClientOriginalExtension();
                $file->move(public_path('assets/img_tientrinh'), $fileName);
            } else {
                return response()->json([
                    'success' => false,
                    'message' => 'File không hợp lệ!',
                ]);
            }
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Chưa chọn tệp!',
            ]);
        }

        // Tạo mới bản ghi trong cơ sở dữ liệu
        CayTienTrinhModel::create([
            'ma_khoa' => $validated['ma_khoa'],
            'cay_tien_trinh' => $fileName, // Lưu đường dẫn tương đối
            'khoa_hoc' => $validated['khoa_hoc'],
        ]);

        // Trả về phản hồi JSON
        return response()->json([
            'success' => true,
            'status' => 200,
            'message' => 'Thêm thành công!',
        ]);
    }

    function deleteCTT($id)
    {
        $hocphan = CayTienTrinhModel::findOrFail($id);

        $hocphan->delete();

        return response()->json([
            'success' => true,
            'message' => 'Xóa thành công'
        ]);
    }
}
