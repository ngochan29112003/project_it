<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class CayTienTrinhModel extends Model
{
    use HasFactory;

    protected $table = 'cay_tien_trinh';
    protected $primaryKey = 'ma_tien_trinh';

    protected $fillable = [
        'ma_khoa',
        'cay_tien_trinh',
        'khoa_hoc'
    ];

    public $timestamps = false;
    public function getTienTrinh()
    {
        return DB::table('cay_tien_trinh')
        ->join('khoa','khoa.ma_khoa','=','cay_tien_trinh.ma_khoa')
        ->get();
    }

    public function getKhoa()
    {
        return DB::table('khoa')->get();
    }
}