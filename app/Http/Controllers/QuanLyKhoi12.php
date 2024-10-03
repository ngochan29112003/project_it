<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class QuanLyKhoi12 extends Controller
{
    public function getKhoi12()
    {
        return view('admin.ql_khoi.ds-khoi-12');
    }
}
