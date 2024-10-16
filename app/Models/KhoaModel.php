<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class KhoaModel extends Model
{
    use HasFactory;
    protected $table = 'khoa';
    protected $primaryKey = 'ma_khoa';
    protected $fillable =[
        'ten_khoa',
        'truong_khoa'
    ];
    public $timestamps = false;

    function getKhoa()
    {
        return DB::table('khoa')->get();
    }

}
