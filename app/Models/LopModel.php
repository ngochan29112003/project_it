<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class LopModel extends Model
{
    use HasFactory;
    protected $table = 'lop';
    protected $primaryKey = 'ma_lop';
    protected $fillable =[
        'ma_khoa',
        'ten_lop',
        'nam_hoc'
    ];
    public $timestamps = false;

    public function getLop()
    {
        return DB::table('lop')
            ->join('khoa','khoa.ma_khoa','=','lop.ma_khoa')
            ->get();
    }
    public function getKhoa()
    {
        return DB::table('khoa')->get();
    }

}
