<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class LopHocPhanModel extends Model
{
    use HasFactory;

    protected $table = 'lop_hoc_phan';
    protected $primaryKey = 'id_lop_hoc_phan';
    protected $fillable = [
        'ten_hoc_phan',
    ];

    public $timestamps = false;
    public function getLopHP($id)
    {
        return DB::table('ghi_danh')
            ->join('nguoi_dung', 'nguoi_dung.ma_nguoi_dung', '=', 'ghi_danh.ma_nguoi_dung')
            ->join('lop_hoc_phan', 'lop_hoc_phan.id_lop_hoc_phan', '=', 'ghi_danh.ma_hoc_phan')
            ->where('lop_hoc_phan.id_lop_hoc_phan', '=', $id)
            ->where('nguoi_dung.ma_quyen', '=', 3) // Lọc theo sinh viên (ma_quyen = 3)
            ->select('nguoi_dung.ten_nguoi_dung', 'nguoi_dung.email')
            ->get();
    }
}
