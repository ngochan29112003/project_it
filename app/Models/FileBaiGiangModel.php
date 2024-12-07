<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FileBaiGiangModel extends Model
{
    use HasFactory;

    protected $table = 'bai_giang_files';
    protected $primaryKey = 'id'; // Giả sử primary key là 'id'
    public $timestamps = false;

    protected $fillable = [
        'ma_bai_giang',
        'file',
    ];

    /**
     * Một file thuộc về một bài giảng.
     */
    public function baiGiang()
    {
        return $this->belongsTo(BaiGiangModel::class, 'ma_bai_giang', 'ma_bai_giang');
    }
}
