<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class HocKyModel extends Model
{
    use HasFactory;
    protected $table = 'hoc_ky';
    protected $primaryKey = 'ma_hoc_ky';
    protected $fillable = [
        'ma_hoc_ky', 'ten_hoc_ky', 'ngay_bd', 'ngay_ht',
        'nam_hoc', 'tuan_bat_dau', 'so_tuan', 'loai_hoc_ky'
    ];
    public $timestamps = false;

    public function getHocKy()
    {
        return DB::table('hoc_ky')->get();
    }
}
