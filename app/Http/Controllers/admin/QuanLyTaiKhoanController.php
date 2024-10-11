<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class QuanLyTaiKhoanController extends Controller
{
    public function getViewDsTaiKhoan()
    {
        return view('admin.ql_tk.ds-tk');
    }
}
