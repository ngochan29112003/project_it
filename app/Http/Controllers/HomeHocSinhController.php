<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeHocSinhController extends Controller
{
    function getView()
    {
        return view('hoc_sinh.master');
    }

    function getViewTrangChu()
    {
        return view('hoc_sinh.trang-chu');
    }
}
