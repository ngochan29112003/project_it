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

    // protected $fillable = [
    //   'MaTK',
    //   'MaSP',
    //   'TenBD',
    //   'AnhBD',
    //   'NoiDungBD',
    //   'NgayTaoBD',
    //   'TrangThaiBD'
    // ];

    public $timestamps = false;
    public function getLopHP()
    {
        return DB::table('lop_hoc_phan')->get();
    }
}