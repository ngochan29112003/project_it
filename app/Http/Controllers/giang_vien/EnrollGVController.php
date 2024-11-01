<?php

namespace App\Http\Controllers\giang_vien;

use App\Http\Controllers\Controller;

use App\Models\LopHocPhanModel;
use App\Models\NguoiDungModel;
use DB;
use Illuminate\Http\Request;
class EnrollGVController extends Controller
{
    public function getViewEnroll()
    {
        return view("giang_vien.lop_hoc_phan.enroll");
    }
}
