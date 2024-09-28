<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashBoardController extends Controller
{
    function getView()
    {
        return view('dashboard');
    }
}
