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
            $table->bigInteger('user_id');
            $table->string('pembimbing');
            $table->integer('Kerjasama');
            $table->integer('Motivasi');
            $table->integer('InisiatifKerja');
            $table->integer('Loyalitas');
            $table->integer('etika');
            $table->integer('Disiplin');
            $table->integer('PercayaDiri');
            $table->integer('TanggungJawab');
            $table->integer('PemahamanKemampuan');
            $table->integer('KesehatanKeselamatanKerja');
            $table->integer('laporankerja');
            $table->integer('kehadiran');
            $table->integer('sopansantun');
            $table->integer('average');
            $table->string('nilai_huruf');
            $table->string('status_penilaian');
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
