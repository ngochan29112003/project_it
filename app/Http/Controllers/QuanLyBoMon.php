<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class QuanLyBoMon extends Controller
{
    public function getBoMon()
    {
        return view('admin.ql_bomon.ds-bo-mon');
    }
}
