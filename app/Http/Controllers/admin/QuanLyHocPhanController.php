<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\HocPhanModel;
use Illuminate\Http\Request;

class QuanLyHocPhanController extends Controller
{
    public function getViewDsHocPhan()
    {
        $HocPhanModel = new HocPhanModel();
        $list_hp = $HocPhanModel->getHocPhan();
        return view('admin.ql_hoc_phan.danh-sach',
        compact('list_hp'));
    }
}
