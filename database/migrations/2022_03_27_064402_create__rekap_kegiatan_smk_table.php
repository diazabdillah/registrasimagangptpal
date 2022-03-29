<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRekapKegiatanSmkTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rekap_kegiatan_smk', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id')->nullable();
            $table->string('nama_kegiatan')->nullable();
            $table->string('deskripsi_kegiatan')->nullable();
            $table->string('nama_anggota')->nullable();
            $table->date('tanggal_kumpul')->nullable();
            $table->string('file_kegiatan')->nullable();
            $table->string('foto_kegiatan')->nullable();
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
        Schema::dropIfExists('_rekap_kegiatan_smk');
    }
}
