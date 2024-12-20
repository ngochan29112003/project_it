<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class BaiTapModel extends Model
{
    use HasFactory;

    protected $table = 'bai_tap';
    protected $primaryKey = 'ma_bai_tap';

     protected $fillable = [
       'tieu_de',
       'noi_dung_bai_tap',
       'han_nop',
       'id_lop_hoc_phan',
       'ma_bai_giang',
     ];

    public $timestamps = false;
    protected $casts = [
        'han_nop' => 'datetime',
    ];
}
