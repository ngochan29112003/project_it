<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\NguoiDungModel;
use Illuminate\Http\Request;

class QuanLySinhVienController extends Controller
{
    public function getViewDsSinhVien()
    {
        $modelSinhVien = new NguoiDungModel();
        $list_sv = $modelSinhVien->getSinhVien();
//        dd($list_sv->toArray());
        return view('admin.ql_sv.danh-sach',
        compact('list_sv'));
    }
}
