<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class QuanLySinhVienController extends Controller
{
    public function getViewDsSinhVien()
    {
        return view('admin.ql_sv.danh-sach');
    }
}
