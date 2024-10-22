<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class NguoiDungModel extends Model
{
    use HasFactory;
    protected $table = 'nguoi_dung';
    protected $primaryKey = 'ma_nguoi_dung';
    protected $fillable =[
        'ten_nguoi_dung',
        'ma_khoa',
        'ma_lop',
        'ma_hoc_phan',
        'hinh_anh',
        'gioi_tinh',
        'ngay_sinh',
        'noi_sinh',
        'ho_khau_thuong_tru',
        'cccd',
        'sdt',
        'email',
        'ma_quyen'
    ];
    public $timestamps = false;


    public function getNguoiDung()
    {
        return DB::table('nguoi_dung')
            ->join('quyen','nguoi_dung.ma_quyen','=','quyen.ma_quyen')
            ->leftJoin('tai_khoan','tai_khoan.ma_nguoi_dung','=','nguoi_dung.ma_nguoi_dung')
            ->whereNull('tai_khoan.ma_nguoi_dung')
            ->select('nguoi_dung.ma_nguoi_dung','nguoi_dung.ten_nguoi_dung','quyen.ten_quyen')
            ->get();
    }

    public function getGiangVien()
    {
        return DB::table('nguoi_dung')
            ->join('quyen','nguoi_dung.ma_quyen','=','quyen.ma_quyen')
            ->join('khoa','khoa.ma_khoa','=','nguoi_dung.ma_khoa')
            ->where('nguoi_dung.ma_quyen','=',2)
            ->select('nguoi_dung.ma_nguoi_dung','nguoi_dung.ten_nguoi_dung','quyen.ten_quyen','khoa.ten_khoa','nguoi_dung.email','nguoi_dung.ngay_sinh')
            ->get();
    }

    public function getSinhVien()
    {
        return DB::table('nguoi_dung')
            ->join('quyen','nguoi_dung.ma_quyen','=','quyen.ma_quyen')
            ->join('khoa','khoa.ma_khoa','=','nguoi_dung.ma_khoa')
            ->join('lop','lop.ma_lop','=','nguoi_dung.ma_lop')
            ->where('nguoi_dung.ma_quyen','=',3)
            ->select('nguoi_dung.ma_nguoi_dung','nguoi_dung.ten_nguoi_dung', 'quyen.ten_quyen','lop.ten_lop','khoa.ten_khoa','nguoi_dung.email',
                'nguoi_dung.sdt','nguoi_dung.ngay_sinh')
            ->get();
    }

    public function getLop()
    {
        return DB::table('lop')->get();
    }

    public function getKhoa()
    {
        return DB::table('khoa')->get();
    }

}
