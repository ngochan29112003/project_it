<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DiemDanhController extends Controller
{
    public function getViewDiemDanh(){
        return view('diem-danh');
    }
}
