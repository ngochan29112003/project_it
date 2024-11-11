<?php

namespace App\Http\Controllers;

use App\Models\NguoiDungModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class SuaThongTinController extends Controller
{
   public function getviewThongTin()
   {
        $thongtin = new NguoiDungModel();
        $user = $thongtin->getNguoiDung();
        return view('thong-tin-tai-khoan', compact('user'));
   }
}
