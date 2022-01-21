<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKuotaTabel extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kuota', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->date('tanggal_buka');
            $table->date('tanggal_tutup');
            $table->integer('kuota');
            $table->string('divisi');
            $table->string('jenis_kuota');
            $table->string('status_kuota');
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
        Schema::dropIfExists('kuota_tabel');
    }
}