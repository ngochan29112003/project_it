<?php

namespace App\Http\Controllers;

use App\Models\TaiKhoanModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use function Laravel\Prompts\select;

class LoginController extends Controller
{
   public function getViewLogin()
   {
       return view('login');
   }

    public function loginAction(Request $request)
    {
        // Lấy lại tk và mk được gửi từ Form qua
        $request->validate([
            'ten_tai_khoan' => 'required|string',
            'mat_khau' => 'required|string',
        ]);

        // Gọi model
        $account = TaiKhoanModel::where('ten_tai_khoan', $request->ten_tai_khoan)->first();

        // Tài khoản không tồn tại
        if (!$account) {
            return response()->json([
                'success' => false,
                'status' => 400,
                'message' => 'Sai tên đăng nhập hoặc mật khẩu',
            ]);
        }


        // Kiểm tra password
        if (!Hash::check($request->mat_khau, $account->mat_khau)) {
            return response()->json([
                'success' => false,
                'status' => 400,
                'message' => 'Sai tên đăng nhập hoặc mật khẩu'
            ]);
        }

        // Lưu MaTK và VaiTro lên session để còn tái sử dụng
        session(['ma_nguoi_dung' => $account->ma_nguoi_dung]);


        $ma_quyen = DB::table('nguoi_dung')
            ->where('ma_nguoi_dung','=',$account->ma_nguoi_dung)
            ->select('ma_quyen')
            ->first();

        // Kiểm tra quyền người dùng và chuyển hướng
        if ($ma_quyen->ma_quyen == 1) {
            return response()->json([
                'success' => true,
                'status' => 200,
                'redirect' => route('trang-chu-admin'),
            ]);
        } elseif ($ma_quyen->ma_quyen == 2) {
            return response()->json([
                'success' => true,
                'status' => 200,
                'redirect' => route('trang-chu-giang-vien'),
            ]);
        } elseif($ma_quyen->ma_quyen == 3) {
            return response()->json([
                'success'  => true,
                'status'   => 200,
                'redirect' => route('trang-chu-sinh-vien'),
            ]);
        } else {
            return response()->json([
                'success'  => false,
                'status'   => 400,
            ]);
        }
    }


    public function logoutAction(Request $request)
    {
        //Xoá session
        $request->session()->flush();

        //Chuyển hướng về Login
        return redirect()->route('index.login');
    }
}
