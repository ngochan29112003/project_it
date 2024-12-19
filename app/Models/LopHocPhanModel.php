<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class LopHocPhanModel extends Model
{
    use HasFactory;

    protected $table = 'lop_hoc_phan';
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

    public $timestamps = false;
    public function getLopHP()
    {
        return DB::table('lop_hoc_phan')->get();
    }

    public function getFirstLHP($id){
        return DB::table('lop_hoc_phan')->where('id_lop_hoc_phan', $id)->first();
    }
}
