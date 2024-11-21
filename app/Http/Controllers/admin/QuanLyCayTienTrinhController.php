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

    public function editCTT($id)
    {
        $ctt = CayTienTrinhModel::findOrFail($id);
        return response()->json([
            'ctt' => $ctt
        ]);
    }

    public function updateCTT(Request $request, $id)
{
    // Xác thực dữ liệu từ form
    $validated = $request->validate([
        'ma_khoa' => 'required|string',
        'khoa_hoc' => 'required|string',
    ]);

    // Lấy thông tin cây tiến trình từ database
    $ctt = CayTienTrinhModel::findOrFail($id);

    // Kiểm tra và xử lý file ảnh
    if ($request->hasFile('cay_tien_trinh') && $request->file('cay_tien_trinh')->isValid()) {
        // Lấy tệp ảnh và lưu vào thư mục public/assets/img_tientrinh
        $file = $request->file('cay_tien_trinh');
        $fileName = $file->getClientOriginalName(); // Lấy tên gốc của file
        $file->move(public_path('assets/img_tientrinh'), $fileName);

        // Cập nhật tên file vào database
        $ctt->cay_tien_trinh = $fileName;
    }

    // Cập nhật các thông tin khác
    $ctt->update([
        'ma_khoa' => $validated['ma_khoa'],
        'khoa_hoc' => $validated['khoa_hoc'],
    ]);

    // Trả về phản hồi JSON
    return response()->json([
        'success' => true,
        'ctt' => $ctt,
        'message' => 'Cập nhật cây tiến trình thành công!',
    ]);
}
}
