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
        $modelNguoiDung = new NguoiDungModel();
        $list_nguoi_dung = $modelNguoiDung->getNguoiDung();

//        dd( $list_nguoi_dung->toArray());

        return view('admin.ql_tk.ds-tk',
        compact( 'list_nguoi_dung'));

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

        $matkhaubam = Hash::make($request->mat_khau);

        $taikhoanmoi = new TaiKhoanModel();
        $taikhoanmoi->ten_tai_khoan = $request->ten_tai_khoan;
        $taikhoanmoi->ma_nguoi_dung = $request->ma_nguoi_dung;
        $taikhoanmoi->mat_khau = $matkhaubam;
        if($taikhoanmoi->save()){
            return response()->json([
                'success' => true,
                'status' => 200,
                'message' => 'Tạo tài khoản thành công!',
            ]);
        }else{
            return response()->json([
                'success' => false,
                'status' => 400,
                'message' => 'Có lỗi xảy ra khi tạo tài khoản',
            ]);
        }

    }
}
