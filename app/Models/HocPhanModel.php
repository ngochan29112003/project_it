<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class HocPhanModel extends Model
{
    use HasFactory;
    protected $table = 'lop_hoc_phan';
    protected $primaryKey = 'ma_hoc_phan';
   //chua dung toi
    protected $fillable =[
        'ten_hoc_phan',
        'so_chi_ly_thuyet',
        'so_chi_thuc_hanh',
        'hoc_ky'
    ];
    public $timestamps = false;

    public function getHocPhan()
    {
        return DB::table('lop_hoc_phan')->get();

    }
}
