<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DiemDanhmodel extends Model
{
    use HasFactory;
    protected $table = 'diem_danh';
    protected $primaryKey = 'ma_diem_danh';
    protected $fillable = [
        'ma_nguoi_dung',
        'ma_hoc_phan',
        'id_lop_hoc_phan',
        'trang_thai',
        'ma_bai_giang',
        'ngay_diem_danh',
    ];
    public $timestamps = false;
}
