<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class QuanLyDeXuatController extends Controller
{
    public function getViewDsDeXuat()
    {
        return view('admin.ql_de_xuat.danh-sach');
    }
}
