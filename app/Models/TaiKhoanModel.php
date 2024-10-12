<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class TaiKhoanModel extends Model
{
    use HasFactory;
    protected $table = 'tai_khoan';
    protected $primaryKey = 'ma_tai_khoan';
    public $timestamps = false;
}
