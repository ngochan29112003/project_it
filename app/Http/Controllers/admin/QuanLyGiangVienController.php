<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\NguoiDungModel;
use Illuminate\Http\Request;

class QuanLyGiangVienController extends Controller
{
    public function getViewDsGiangVien()
    {
        $modelGiangVien = new NguoiDungModel();
        $list_gv = $modelGiangVien->getGiangVien();
        $list_khoa = $modelGiangVien->getKhoa();
//        dd($list_gv->toArray());
        return view('admin.ql_gv.danh-sach',
        compact('list_gv','list_khoa'));
    }
}
