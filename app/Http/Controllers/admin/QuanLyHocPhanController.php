<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\HocPhanModel;
use App\Models\NguoiDungModel;
use Illuminate\Http\Request;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Style\Border;

class QuanLyHocPhanController extends Controller
{
    public function getViewDsHocPhan()
    {
        $list_hp = HocPhanModel::all();
        return view('admin.ql_hoc_phan.danh-sach',
        compact('list_hp'));
    }

    function addHocPhan(Request $request)
    {
//        dd($request);
        $validate = $request->validate([
            'ma_hoc_phan' =>'string',
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
            'ma_hoc_phan' =>'string',
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
