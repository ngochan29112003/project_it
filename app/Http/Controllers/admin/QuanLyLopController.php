<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class QuanLyLopController extends Controller
{
    public function getViewDsLop()
    {
        return view('admin.ql_lop.danh-sach');
    }
}
