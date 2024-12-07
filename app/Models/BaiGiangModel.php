<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BaiGiangModel extends Model
{
    use HasFactory;

    protected $table = 'bai_giang';
    protected $primaryKey = 'ma_bai_giang';
    public $timestamps = false;

    protected $fillable = [
        'id_lop_hoc_phan',
        'ten_bai_giang',
        'noi_dung_bai_giang',
        'video_path',
        'link',
        'kiem_tra',
        'bai_tap',
        'diem_danh',
        'trang_thai',
        // Đảm bảo không có dòng văn bản nào không thuộc mảng
    ];

    /**
     * Một bài giảng có nhiều file.
     */
    public function files()
    {
        return $this->hasMany(FileBaiGiangModel::class, 'ma_bai_giang', 'ma_bai_giang');
    }
}
