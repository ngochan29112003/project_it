<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\NguoiDungModel;
use App\Models\TaiKhoanModel;
use http\Env\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class QuanLyTaiKhoanController extends Controller
{
    public function getViewDsTaiKhoan()
    {
        $modelTaiKhoan = new TaiKhoanModel();
        $list_tai_khoan = $modelTaiKhoan->getTaikhoan();
        $modelNguoiDung = new NguoiDungModel();
        $list_nguoi_dung = $modelNguoiDung->getNguoiDung();

//        dd( $list_tai_khoan->toArray());

        return view('admin.ql_tk.ds-tk',
        compact( 'list_nguoi_dung', 'list_tai_khoan'));

    }

    public function addTaiKhoan(Request $request)
    {
//        dd($request);
        $request->validate([
            'ma_nguoi_dung' => 'int',
            'ten_tai_khoan' => 'string',
            'mat_khau' => 'string',
        ]);

        $kt_ten_tk = TaiKhoanModel::where('ten_tai_khoan', $request->ten_tai_khoan)->first();
        if($kt_ten_tk){
            return response()->json([
                'success' => false,
                'status' => 400,
                'message' => 'Tài khoản đã tồn tại, vui lòng chọn tài khoản khác',
            ]);
        }

//        $anhmacdinh = 'user.png';
        $matkhaubam = Hash::make($request->mat_khau);

        $taikhoanmoi = new TaiKhoanModel();
        $taikhoanmoi->ten_tai_khoan = $request->ten_tai_khoan;
        $taikhoanmoi->ma_nguoi_dung = $request->ma_nguoi_dung;
        $taikhoanmoi->mat_khau = $matkhaubam;

        // Lưu tài khoản
        if ($taikhoanmoi->save()) {
            // Cập nhật hình ảnh mặc định vào bảng nguoi_dung
            $anhmacdinh = 'user.png'; // Hình ảnh mặc định

            // Cập nhật hình ảnh vào bảng nguoi_dung
            $nguoiDung = NguoiDungModel::find($request->ma_nguoi_dung);
            if ($nguoiDung) {
                $nguoiDung->hinh_anh = $anhmacdinh;
                $nguoiDung->save();
            }

            return response()->json([
                'success' => true,
                'status' => 200,
                'message' => 'Tạo tài khoản thành công!',
            ]);
        } else {
            return response()->json([
                'success' => false,
                'status' => 400,
                'message' => 'Có lỗi xảy ra khi tạo tài khoản',
            ]);
        }
    }
    function deleteTaiKhoan($id)
    {
        $taikhoan = TaiKhoanModel::findOrFail($id);

        $taikhoan->delete();

        return response()->json([
            'success' => true,
            'message' => 'Xóa thành công'
        ]);
    }
}
