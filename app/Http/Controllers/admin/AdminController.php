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

    function getViewDSGiaoVien()
    {
        return view('admin.ql_gv.danh-sach');
    }

    function getViewDSHocSinh()
    {
        return view('admin.ql_hs.danh-sach');
    }

    function getViewDSBoMon()
    {
        return view('admin.ql_bo_mon.danh-sach');
    }

    function getViewDSKhoi10()
    {
        return view('admin.ql_khoi.ds-khoi-10');
    }
    function getViewDSKhoi11()
    {
        return view('admin.ql_khoi.ds-khoi-11');
    }
    function getViewDSKhoi12()
    {
        return view('admin.ql_khoi.ds-khoi-12');
    }

    function getViewDeXuat()
    {
        return view('admin.ql_de_xuat.ds-de-xuat');
    }

    function getViewTKGiaoVien()
    {
        return view('admin.ql_tk.tk-gv');
    }

    function getViewTKHocSinh()
    {
        return view('admin.ql_tk.tk-hs');
    }

    function getViewTKQuanLy()
    {
        return view('admin.ql_tk.tk-nguoi-quan-ly');
    }



}
