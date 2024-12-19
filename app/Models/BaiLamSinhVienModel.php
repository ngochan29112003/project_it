<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BaiLamSinhVienModel extends Model
{
    use HasFactory;
    protected $table = 'bai_lam_sinh_vien';
    protected $primaryKey = 'id';

    protected $fillable = [
        'ma_nguoi_dung',
        'id_cau_hoi',
        'cau_tra_loi',
        'id_lhp',
        'bai_kiem_tra',
        'ma_bai_giang',
    ];

    public $timestamps = false;
}
