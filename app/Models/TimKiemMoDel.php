<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TimKiemMoDel extends Model
{
    use HasFactory;
    protected $table='lop_hoc_phan';
    protected $primaryKey = 'id_lop_hoc_phan';
    protected $fillable = [
        'ten_hoc_phan',
        'so_luong_sinh_vien',
        'giang_vien',
        'id_hoc_phan',
        'dot',
        'loai_lop',
        'ngay_tao',
        'hoc_ki',
    ];
}
