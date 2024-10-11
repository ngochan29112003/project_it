<?php

namespace App\Http\Controllers\sinh_vien;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomePageController extends Controller
{
    public function getViewHomePageSv()
    {
        return view('sinh_vien.master');
    }

}
