<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class QuanLyDeXuat extends Controller
{
    public function getDeXuat()
    {
        return view('admin.ql_de_xuat.ds-de-xuat');
    }
}
