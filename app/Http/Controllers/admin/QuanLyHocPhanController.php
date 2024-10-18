<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\HocPhanModel;
use App\Models\NguoiDungModel;
use Illuminate\Http\Request;

class QuanLyHocPhanController extends Controller
{
    public function getViewDsHocPhan()
    {
        $HocPhanModel = new HocPhanModel();
        $list_hp = $HocPhanModel->getHocPhan();
//        dd($list_hp->toArray());
        return view('admin.ql_hoc_phan.danh-sach',
        compact('list_hp'));
    }

    function addHocPhan(Request $request)
    {
//        dd($request);
        $validate = $request->validate([
            'ten_hoc_phan' => 'string',
            'so_chi_ly_thuyet' => 'int',
            'so_chi_thuc_hanh' => 'int',
            'hoc_ky' => 'string'
        ]);

        HocPhanModel::create($validate);
        return response()->json([
            'success' => true,
            'status' => 200,
            'message' => 'Thêm thành công!',
        ]);
    }
}
