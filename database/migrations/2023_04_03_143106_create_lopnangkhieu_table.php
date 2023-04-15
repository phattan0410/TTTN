<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLopnangkhieuTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lopnangkhieu', function (Blueprint $table) {
            $table->string('MaLop',10);
            $table->string('TenLop',100);
            $table->string('SoBuoiHoc',100);
            $table->string('SoLuongHS',100);
            $table->string('HocPhi',100);
            $table->dateTime('ThoiGianHoc');
            $table->string('MaNV',10);
            $table->primary('MaLop');
            $table->foreign('MaNV')->references('MaNV')->on('nhanvien');
            $table->engine = 'InnoDB';
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
        Schema::dropIfExists('lopnangkhieu');
    }
}
