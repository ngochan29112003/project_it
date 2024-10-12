<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class NguoiDungModel extends Model
{
    use HasFactory;
    protected $table = 'nguoi_dung';
    protected $primaryKey = 'ma_nguoi_dung';
    public $timestamps = false;

    public function getNguoiDung()
    {
        return DB::table('nguoi_dung')
            ->join('quyen','nguoi_dung.ma_quyen','=','quyen.ma_quyen')
            ->leftJoin('tai_khoan','tai_khoan.ma_nguoi_dung','=','nguoi_dung.ma_nguoi_dung')
            ->whereNull('tai_khoan.ma_nguoi_dung')
            ->select('nguoi_dung.ma_nguoi_dung','nguoi_dung.ten_nguoi_dung','quyen.ten_quyen')
            ->get();
    }
}
