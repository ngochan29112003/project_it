<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class QuanLyTaiKhoanHocSinh extends Controller
{
    public function getTaiKhoanHocSinh()
    {
        return view('admin.ql_tk.tk-hs');
    }
}
