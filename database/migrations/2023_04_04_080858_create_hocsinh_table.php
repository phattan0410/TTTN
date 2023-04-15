<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHocsinhTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hocsinh', function (Blueprint $table) {
            $table->string('MaHS',10);
            $table->string('TenHS',100);
            $table->boolean('GioiTinh');
            $table->string('DienThoai',11);
            $table->string('DiaChi',100);
            $table->string('TenDangNhap',100);
            $table->string('MatKhau',100);
            $table->primary('MaHS');
            $table->engine = 'InnoDB';
            $table->unique('TenDangNhap');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('hocsinh');
    }
}
