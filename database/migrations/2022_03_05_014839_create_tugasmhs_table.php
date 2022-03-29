<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTugasmhsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tugasmhs', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id');

            $table->string('judul');
            $table->string('deskripsi_tugas');
            $table->string('nama_pembimbing');
            $table->string('status_kegiatan');
            $table->string('jenis_tugas');
            $table->string('file_tugas');
            $table->date('tanggal_selesai');
            $table->date('tanggal_mulai');
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
        Schema::dropIfExists('tugasmhs');
    }
}
