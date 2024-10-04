<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Lop10ConTroller extends Controller
{
    public function getLop10()
    {
        return view('hoc_sinh.lophoc.lop-10');
    }
}