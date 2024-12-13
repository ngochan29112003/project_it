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
       'id_lop_hoc_phan',
       'ten_bai_tap',
       'noi_dung_bai_tap',
       'han_nop',
     ];

    public $timestamps = false;

    public function getLopHocPhan()
    {
        return DB::table('lop_hoc_phan')->get();
    }
    public function getBaiTap()
    {
        return DB::table('nop_bai_tap')
        ->join('bai_tap','bai_tap.ma_bai_tap','=','nop_bai_tap.ma_bai_tap')
        ->join('tai_khoan','tai_khoan.ma_tai_khoan','=','nop_bai_tap.ma_sinh_vien_nop')
        ->get();
    }
}
