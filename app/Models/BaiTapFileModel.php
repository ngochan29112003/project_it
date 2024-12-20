<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BaiTapFileModel extends Model
{
    use HasFactory;

    protected $table = 'bai_tap_files';
    protected $primaryKey = 'id';

    protected $fillable = [
        'ten_file',
        'ma_bai_giang',
        'ma_nguoi_dung',
        'ma_bai_tap',
    ];

    public $timestamps = false;

    /**
     * Quan hệ với model User.
     */
    public function user()
    {
        return $this->belongsTo(NguoiDungModel::class, 'ma_nguoi_dung');
    }
}
