<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChitietlophocTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chitietlophoc', function (Blueprint $table) {
            $table->string('MaCT', 10);
            $table->string('MaLop', 10);
            $table->string('MaHS', 10);
            $table->primary('MaCT');
            $table->foreign('MaHS')->references('MaHS')->on('hocsinh');
            $table->foreign('MaLop')->references('MaLop')->on('lopnangkhieu');

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
        Schema::dropIfExists('chitietlophoc');
    }
}
