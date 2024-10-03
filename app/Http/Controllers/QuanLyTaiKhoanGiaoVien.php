<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class QuanLyTaiKhoanGiaoVien extends Controller
{
    public function getTaiKhoanGiaoVien()
    {
        return view('admin.ql_tk.tk-gv');
    }
}
