<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BaiKiemTraModel extends Model
{
    use HasFactory;
    protected $table = 'bai_kiem_tra';
    protected $primaryKey = 'id_bai_kiem_tra';

    protected $fillable = [
        'ten_bai_kiem_tra',
        'id_lop_hoc_phan',
        'thoi_gian',
        'so_cau',
        'han_chot',
        'ma_bai_giang',
    ];

    public $timestamps = false;
}
