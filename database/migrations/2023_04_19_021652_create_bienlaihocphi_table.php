<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBienlaihocphiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('bienlaihocphi', function (Blueprint $table) {
            //
            $table->string('MaBL', 10);
            $table->dateTime('NgayDong');
            $table->string('SoTien', 11);
            $table->string('GhiChu', 100);
            $table->string('MaLop', 10);
            $table->string('MaHS', 10);
            $table->primary('MaBL');
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
        Schema::table('bienlaihocphi', function (Blueprint $table) {
            //
        });
    }
}
