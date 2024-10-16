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
    public $timestamps = false;

    public function getHocPhan()
    {
        return DB::table('lop_hoc_phan')
            ->join('nguoi_dung','nguoi_dung.ma_nguoi_dung','=','lop_hoc_phan.ma_nguoi_dung')
            ->get();
    }
}
