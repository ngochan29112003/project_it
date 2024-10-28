<?php

namespace App\Http\Controllers\sinh_vien;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ThongTinSVController extends Controller
{
    public function getViewThongTinSV()
    {
        return view('sinh_vien.thong_tin_sv.thong-tin');
    }
}
