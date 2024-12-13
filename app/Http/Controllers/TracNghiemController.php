<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TracNghiemController extends Controller
{
    public function getViewTracNghiem(){
        return view('trac-nghiem');
    }
}
