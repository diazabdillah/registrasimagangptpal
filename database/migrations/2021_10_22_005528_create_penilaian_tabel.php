<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePenilaianTabel extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('penilaians', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->string('pembimbing')->nullable();
            $table->integer('Kerjasama');
            $table->integer('MotivasiPercayaDiri');
            $table->integer('InisiatifTanggungJawabKerja');
            $table->integer('Loyalitas');
            $table->integer('EtikaSopanSantun');
            $table->integer('Disiplin');
            $table->integer('PemahamanKemampuan');
            $table->integer('KesehatanKeselamatanKerja');
            $table->integer('laporankerja');
            $table->integer('kehadiran');
            $table->integer('average');
            $table->string('nilai_huruf')->nullable();
            $table->string('status_penilaian')->nullable();
            $table->string('keterangan')->nullable();
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
        Schema::dropIfExists('penilaian_tabel');
    }
}