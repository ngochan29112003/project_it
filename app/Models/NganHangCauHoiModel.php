<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NganHangCauHoiModel extends Model
{
    use HasFactory;
    protected $table = 'ngan_hang_cau_hoi';
    protected $primaryKey = 'id';
    protected $fillable =[
        'cau_hoi',
        'anh_cau_hoi',
        'dap_an_a',
        'dap_an_b',
        'dap_an_c',
        'dap_an_d',
        'dap_an_dung',
        'id_lop_hoc_phan',
    ];
    public $timestamps = false;


}
