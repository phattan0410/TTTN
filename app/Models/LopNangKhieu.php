<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class LopNangKhieu extends Model
{
    use HasFactory;
    protected $table = "lopnangkhieu";
    public function hocsinh()
    {
        return $this->belongsToMany(HocSinh::class, 'lopnangkhieu_hocsinh', 'MaLop', 'MaHS');
    }
}
