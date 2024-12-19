<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GhiDanhModel extends Model
{
    use HasFactory;
    protected $table = 'ghi_danh';
    protected $primaryKey = 'ma_ghi_danh';
    public $timestamps = false;
}
