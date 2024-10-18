<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\NguoiDungModel;
use Illuminate\Http\Request;

class QuanLySinhVienController extends Controller
{
    public function getViewDsSinhVien()
    {
        $modelSinhVien = new NguoiDungModel();
        $list_sv = $modelSinhVien->getSinhVien();
        $list_khoa = $modelSinhVien->getKhoa();
        $list_lop = $modelSinhVien->getLop();
//        dd($list_sv->toArray());
        return view('admin.ql_sv.danh-sach',
        compact('list_sv','list_khoa','list_lop'));
    }

    function addSinhVien(Request $request)
    {
        $validate = $request->validate([
            'ten_nguoi_dung'=>'string',
            'ma_khoa'=>'int',
            'ma_lop'=>'int',
            'gioi_tinh'=>'string',
            'noi_sinh'=>'string',
            'ngay_sinh'=>'date',
            'ho_khau_thuong_tru'=>'string',
            'cccd'=>'string',
            'sdt'=>'string',
            'email'=>'string',
        ]);

        // Thêm ma_quyen với giá trị mặc định là 3
        $validate['ma_quyen'] = 3;
        $validate['hinh_anh'] = "user.png";

        // Tạo mới sinh viên với dữ liệu đã validate
        NguoiDungModel::create($validate);

        return response()->json([
            'success' => true,
            'status' => 200,
            'message' => 'Thêm thành công!',
        ]);
    }
}
