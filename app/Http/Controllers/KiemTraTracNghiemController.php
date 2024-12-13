<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KiemTraTracNghiemController extends Controller
{
    public function getViewKiemTraTracNghiem(){
        return view('kiem-tra-trac-nghiem');
    }
}
