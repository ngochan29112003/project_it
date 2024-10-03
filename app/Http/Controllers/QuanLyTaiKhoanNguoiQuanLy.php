<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class QuanLyTaiKhoanNguoiQuanLy extends Controller
{
    public function getTaiKhoanNguoiQuanLy()
    {
        return view('admin.ql_tk.tk-nguoi-quan-ly');
    }
}
