<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class QuanLyGiangVienController extends Controller
{
    public function getViewDsGiangVien()
    {
        return view('admin.ql_gv.danh-sach');
    }
}
