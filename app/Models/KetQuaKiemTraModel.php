<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KetQuaKiemTraModel extends Model
{
    use HasFactory;
    protected $table = 'ket_qua_kiem_tra';
    protected $primaryKey = 'id';
    protected $fillable =[
        'bai_kiem_tra',
        'ma_bai_giang',
        'ma_nguoi_dung',
        'so_cau_dung',
        'diem',
    ];
    public $timestamps = false;
}
