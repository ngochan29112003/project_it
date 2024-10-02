<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class QuanLyGiaoVien extends Controller
{
    public function getDanhSach(){
        return view('admin.ql_gv.danh-sach');
    }
}
