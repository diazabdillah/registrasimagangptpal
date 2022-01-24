<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLaporanPenelitianTabel extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('laporan_penelitian', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('judul');
            $table->string('path');
            $table->string('path_revisi')->nullable();
            $table->string('nama_pembimbing_lapangan')->nullable();
            $table->string('nama_pembimbing_hcd')->nullable();
            $table->string('revisi')->nullable();
            $table->string('revisi_divisi')->nullable();
            $table->string('divisi');
            $table->string('jurusan');
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
        Schema::dropIfExists('laporan_penelitian');
    }
}