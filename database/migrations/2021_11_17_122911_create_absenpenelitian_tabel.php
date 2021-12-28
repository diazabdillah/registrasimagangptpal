<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAbsenpenelitianTabel extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('absenpenelitian', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_individu');
            $table->datetime('waktu_absen');
            $table->string('jenis_absen');
            $table->string('keterangan');
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
        Schema::dropIfExists('absenpenelitian_tabel');
    }
}
