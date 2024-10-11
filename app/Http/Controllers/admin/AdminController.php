<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    function getView()
    {
        return view('admin.master');
    }

    function getViewTrangChu()
    {
        return view('admin.trang-chu');
    }
}
