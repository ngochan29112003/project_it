<?php

namespace App\Http\Controllers\hoc_sinh;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HocSinhController extends Controller
{
    function getViewTrangChu()
    {
        return view('hoc_sinh.homehs');
    }

    public function getLop10()
    {
        return view('hoc_sinh.lophoc.lop-10');
    }

    public function getLop11()
    {
        return view('hoc_sinh.lophoc.lop-11');
    }

    public function getLop12()
    {
        return view('hoc_sinh.lophoc.lop-12');
    }

    public function getBaiTapThemLop10()
    {
        return view('hoc_sinh.baitapthem.baitap10');
    }

    public function getBaiTapThemLop11()
    {
        return view('hoc_sinh.baitapthem.baitap11');
    }

    public function getBaiTapThemLop12()
    {
        return view('hoc_sinh.baitapthem.baitap12');
    }

    public function getGioiThieu()
    {
        return view('hoc_sinh.gioithieu.gioithieu');
    }
}
