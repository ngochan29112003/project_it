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
        'ten_hoc_phan',
        'ma_hoc_phan',
        'so_chi_ly_thuyet',
        'so_chi_thuc_hanh',
    ];
    public $timestamps = false;

    public function getLopHocPhan()
    {
        return DB::table('lop_hoc_phan')
            ->get();
    }


}
