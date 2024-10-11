<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class QuanLyKhoaController extends Controller
{
    public function getViewDsKhoa()
    {
        return view('admin.ql_khoa.danh-sach');
    }
}
