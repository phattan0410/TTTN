<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePhuhuynhTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('phuhuynh', function (Blueprint $table) {
            $table->string('MaPH',10);
            $table->string('HoTenCha',100);
            $table->string('HoTenMe',100);
            $table->string('DiaChiLienLac',100);
            $table->string('SoDTBa',11);
            $table->string('SoDTMe',11);
            $table->string('MaHS',10);
            $table->primary('MaPH');
            $table->foreign('MaHS')->references('MaHS')->on('hocsinh');
            $table->timestamps();
            $table->engine = 'InnoDB';
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('phuhuynh');
    }
}
