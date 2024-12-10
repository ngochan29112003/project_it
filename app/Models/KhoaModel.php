<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class KhoaModel extends Model
{
    use HasFactory;
    protected $table = 'khoa';
    protected $primaryKey = 'ma_khoa';
    protected $fillable =[
        'ten_khoa',
        'truong_khoa'
    ];
    public $timestamps = false;

    function getKhoa()
    {
        return DB::table('khoa')
        ->join('nguoi_dung','nguoi_dung.ma_nguoi_dung','=','khoa.truong_khoa')
        ->where('nguoi_dung.ma_quyen','=',2)
        ->select('khoa.*', 'nguoi_dung.ten_nguoi_dung as truong_khoa_ten') // Lấy tên trưởng khoa
        ->get();
    }

}
