<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\LopModel;
use Illuminate\Http\Request;

class QuanLyLopController extends Controller
{
    public function getViewDsLop()
    {
        $Lopmodel = new LopModel();
        $list_khoa = $Lopmodel->getKhoa();
        $list_lop = $Lopmodel->getLop();
        return view('admin.ql_lop.danh-sach',
        compact('list_khoa', 'list_lop'));
    }

    function addLop(Request $request)
    {
//        dd($request);
        $validate = $request->validate([
            'ma_khoa'=>'int',
            'ten_lop'=>'string',
            'nam_hoc'=>'string'
        ]);

        LopModel::create($validate);
        return response()->json([
            'success' => true,
            'status' => 200,
            'message' => 'Thêm thành công!',
        ]);
    }
}
