<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class BaiGiangModel extends Model
{
    use HasFactory;
    protected $table = 'bai_giang';
    protected $primaryKey ='ma_bai_giang';

    protected $fillable = [
        'id_lop_hoc_phan',
        'ten_bai_giang',
        'noi_dung_bai_giang',
        'file_path',
        'video_path',
        'link',
        'kiem_tra',
        'bai_tap',
    ];

    public $timestamps = false;


}
