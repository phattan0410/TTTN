<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HocSinh extends Model
{
    use HasFactory;
    protected $table = "hocsinh";
    public function lopnangkhieu()
    {
        return $this->belongsToMany(LopNangKhieu::class, 'lopnangkhieu_hocsinh', 'MaHS', 'MaLop');
    }
}
