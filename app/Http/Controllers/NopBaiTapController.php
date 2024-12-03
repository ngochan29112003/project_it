<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NopBaiTapController extends Controller
{
    public function getView(){
        return view('nop-bai-tap');
    }
}
