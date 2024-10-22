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
        $list_lop_hp = $HocPhanModel->getLopHocPhan();
//        dd($list_hp->toArray());
        return view('admin.ql_hoc_phan.danh-sach',
        compact('list_hp','list_lop_hp'));
    }

    function addHocPhan(Request $request)
    {
//        dd($request);
        $validate = $request->validate([
            'id_lop_hoc_phan' =>'int',
            'ten_hoc_phan' => 'string',
            'so_chi_ly_thuyet' => 'int',
            'so_chi_thuc_hanh' => 'int',
        ]);

        HocPhanModel::create($validate);
        return response()->json([
            'success' => true,
            'status' => 200,
            'message' => 'Thêm thành công!',
        ]);
    }

    function deleteHocPhan($id)
    {
        $hocphan = HocPhanModel::findOrFail($id);

        $hocphan->delete();

        return response()->json([
            'success' => true,
            'message' => 'Xóa thành công'
        ]);
    }

    public function editHocPhan($id)
    {
        $hocphan = HocPhanModel::findOrFail($id);
        return response()->json([
            'hocphan' => $hocphan
        ]);
    }

    public function updateHocPhan(Request $request, $id)
    {
        $validated = $request->validate([
            'id_lop_hoc_phan' =>'int',
            'ten_hoc_phan' => 'string',
            'so_chi_ly_thuyet' => 'int',
            'so_chi_thuc_hanh' => 'int',
        ]);

        $hocphan = HocPhanModel::findOrFail($id);
        $hocphan->update($validated);

        return response()->json([
            'success' => true,
            'hocphan' => $hocphan,
        ]);
    }


}
