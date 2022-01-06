<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRekapabsensmkTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('RekapAbsensmk', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_individu');
            $table->datetime('waktu_absen');
            $table->string('jenis_absen');
            $table->string('keterangan');
            $table->string('file_absen')->nullable();
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
        Schema::dropIfExists('rekapabsensmk');
    }
}