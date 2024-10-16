<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class TaiKhoanModel extends Model
{
    use HasFactory;
    protected $table = 'tai_khoan';
    protected $primaryKey = 'ma_tai_khoan';
    public $timestamps = false;


    function getTaikhoan()
    {
        return DB::table('tai_khoan')
            ->join('nguoi_dung','nguoi_dung.ma_nguoi_dung','=','tai_khoan.ma_nguoi_dung')
            ->join('quyen','quyen.ma_quyen','=','nguoi_dung.ma_quyen')
            ->get();
    }
}
