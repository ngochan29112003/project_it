<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashBoardController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [LoginController::class, 'getView'])->name('index-login');
Route::get('/dashboard',[DashBoardController::class,'getView'])->name('index-dasboard');
