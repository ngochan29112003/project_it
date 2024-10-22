<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\NguoiDungModel;
use Illuminate\Http\Request;

class QuanLyGiangVienController extends Controller
{
    public function getViewDsGiangVien()
    {
        $modelGiangVien = new NguoiDungModel();
        $list_gv = $modelGiangVien->getGiangVien();
        $list_khoa = $modelGiangVien->getKhoa();
//        dd($list_gv->toArray());
        return view('admin.ql_gv.danh-sach',
        compact('list_gv','list_khoa'));
    }

    function addGiangVien(Request $request)
    {
        $validate = $request->validate([
            'ten_nguoi_dung'=>'string',
            'ma_khoa'=>'int',
            'gioi_tinh'=>'string',
            'noi_sinh'=>'string',
            'ngay_sinh'=>'date',
            'ho_khau_thuong_tru'=>'string',
            'cccd'=>'string',
            'sdt'=>'string',
            'email'=>'string',
        ]);

        // Thêm ma_quyen với giá trị mặc định là 2
        $validate['ma_quyen'] = 2;

        // Tạo mới sinh viên với dữ liệu đã validate
        NguoiDungModel::create($validate);
        return response()->json([
            'success' => true,
            'status' => 200,
            'message' => 'Thêm thành công!',
        ]);
    }
    function deleteGiangVien($id)
    {
        $giangvien = NguoiDungModel::findOrFail($id);

        $giangvien->delete();

        return response()->json([
            'success' => true,
            'message' => 'Xóa thành công'
        ]);
    }

    public function editGiangVien($id)
    {
        $giangvien = NguoiDungModel::findOrFail($id);
        return response()->json([
            'giangvien' => $giangvien
        ]);
    }

    public function updateGiangVien(Request $request, $id)
    {
        $validated = $request->validate([
            'ten_nguoi_dung'=>'string',
            'ma_khoa'=>'int',
            'gioi_tinh'=>'string',
            'noi_sinh'=>'string',
            'ngay_sinh'=>'date',
            'ho_khau_thuong_tru'=>'string',
            'cccd'=>'string',
            'sdt'=>'string',
            'email'=>'string',
        ]);

        $validated['ma_quyen'] = 2;

        $giangvien = NguoiDungModel::findOrFail($id);
        $giangvien->update($validated);

        return response()->json([
            'success' => true,
            'giangvien' => $giangvien,
        ]);
    }
}
