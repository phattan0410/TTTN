<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNhanvienTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nhanvien', function (Blueprint $table) {
            $table->string('MaNV',10);
            $table->string('HoTenNV',100);
            $table->boolean('GioiTinh');
            $table->dateTime('NgaySinh');
            $table->string('SoDT',11);
            $table->string('DiaChi',100);
            $table->string('TenDangNhap',100);
            $table->string('MatKhau',100);
            $table->string('MaLoaiNV',10);
            $table->primary('MaNV');
            $table->foreign('MaLoaiNV')->references('MaLoaiNV')->on('loainhanvien');
            $table->engine = 'InnoDB';
            $table->unique('TenDangNhap');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('nhanvien');
    }
}
