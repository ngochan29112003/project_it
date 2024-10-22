<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\KhoaModel;
use Illuminate\Http\Request;

class QuanLyKhoaController extends Controller
{
    public function getViewDsKhoa()
    {
        $modelKhoa = new KhoaModel();
        $list_khoa = $modelKhoa->getKhoa();
//        dd($list_khoa);
        return view('admin.ql_khoa.danh-sach',
            compact('list_khoa'));
    }

    function addKhoa(Request $request)
    {
//        dd($request);
        $validate = $request->validate([
            'ten_khoa'=> 'string',
            'truong_khoa' => 'string'
        ]);


        KhoaModel::create($validate);
        return response()->json([
            'success' => true,
            'status' => 200,
            'message' => 'Thêm thành công!',
        ]);
    }

    function deleteKhoa($id)
    {
        $khoa = KhoaModel::findOrFail($id);

        $khoa->delete();

        return response()->json([
            'success' => true,
            'message' => 'Xóa thành công'
        ]);
    }

    public function editKhoa($id)
    {
        $khoa = KhoaModel::findOrFail($id);
        return response()->json([
            'khoa' => $khoa
        ]);
    }

    public function updateKhoa(Request $request, $id)
    {
        $validated = $request->validate([
            'ten_khoa'=> 'string',
            'truong_khoa' => 'string'
        ]);

        $khoa = KhoaModel::findOrFail($id);
        $khoa->update($validated);

        return response()->json([
            'success' => true,
            'khoa' => $khoa,
        ]);
    }
}
