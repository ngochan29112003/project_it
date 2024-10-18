<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\HocKyModel;
use Illuminate\Support\Facades\Http;

class QuanLyHocKyController extends Controller
{
    public function getViewDsHocKy()
    {
        $hocKyModel = new HocKyModel();
        $list_hoc_ky = $hocKyModel->getHocKy();
        return view('admin.ql_hoc_ky.danh-sach',
        compact('list_hoc_ky'));
    }

    public function getAPIHocKy()
    {
        $response = Http::get('https://ems.vlute.edu.vn/api/danhmuc/getdshocky');
//        dd($response->json());
        if ($response->successful()){
            $data = $response->json();
            foreach($data as $i){
                HocKyModel::updateOrCreate(
                    ['ma_hoc_ky'=>$i['maHK']],
                    [
                        'ten_hoc_ky'=>$i['tenHK'],
                        'ngay_bd'=>$i['ngayBD'],
                        'ngay_ht'=>$i['ngayHT'],
                        'nam_hoc'=>$i['namHoc'],
                        'tuan_bat_dau'=>$i['tuanBD'],
                        'so_tuan'=>$i['soTuan'],
                        'loai_hoc_ky'=>$i['loaiHK'],
                    ]
                );
            }
            return response()->json([
                'success' => true,
                'status' => 200,
                'message' => 'Đồng bộ thành công!',
            ]);
        }else{
            return response()->json([
                'success' => true,
                'status' => 400,
                'message' => 'Đồng bộ thất bại!',
            ]);
        }
    }
}
