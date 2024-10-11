<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class QuanLyHocPhanController extends Controller
{
    public function getViewDsHocPhan()
    {
      return view('admin.ql_hoc_phan.danh-sach');
    }
}
