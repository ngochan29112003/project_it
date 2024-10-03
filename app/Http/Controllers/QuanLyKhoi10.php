<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class QuanLyKhoi10 extends Controller
{
    public function getKhoi10()
    {
        return view('admin.ql_khoi.ds-khoi-10');
    }
}
