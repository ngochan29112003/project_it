<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class HocPhanModel extends Model
{
    use HasFactory;
    protected $table = 'hoc_phan';
    protected $primaryKey = 'id_hoc_phan';

    protected $fillable =[
        'ten_lop_hoc_phan',
        'ten_hoc_phan',
        'so_chi_ly_thuyet',
        'so_chi_thuc_hanh',
        'id_lop_hoc_phan',
    ];
    public $timestamps = false;

    public function getHocPhan()
    {
        return DB::table('hoc_phan')
            ->join('lop_hoc_phan','lop_hoc_phan.id_lop_hoc_phan','=','hoc_phan.id_lop_hoc_phan')
            ->get();
    }

    public function getLopHocPhan()
    {
        return DB::table('lop_hoc_phan')->get();
    }
}
