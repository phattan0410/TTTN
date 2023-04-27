<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBienlailephiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bienlailephi', function (Blueprint $table) {
            $table->string('MaBL', 10);
            $table->dateTime('NgayDong');
            $table->string('SoTien', 11);
            $table->string('GhiChu', 100);
            $table->string('MaNV', 10);
            $table->string('MaHS', 10);
            $table->primary('MaBL');
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
        Schema::dropIfExists('bienlailephi');
    }
}
