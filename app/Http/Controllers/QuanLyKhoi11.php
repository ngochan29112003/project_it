<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class QuanLyKhoi11 extends Controller
{
    public function getKhoi11()
    {
        return view('admin.ql_khoi.ds-khoi-11');
    }
}
