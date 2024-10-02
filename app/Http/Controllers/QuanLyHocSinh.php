<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class QuanLyHocSinh extends Controller
{
    public function getDSHocSinh()
    {
        return view('admin.ql_hs.danhsach');
    }
}
