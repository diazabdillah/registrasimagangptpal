<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRekapsmkTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Rekapsmk', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id');
            $table->string('nama');
            $table->string('sekolah');
            $table->string('jurusan');
            $table->string('alamat_rumah');
            $table->string('no_hp');
            $table->string('divisi')->nullable();
            $table->string('departemen')->nullable();
            $table->string('nis');
            $table->string('status_penerimaan')->nullable();
            $table->string('status_user')->nullable();
            $table->date('mulai')->nullable();
            $table->date('selesai')->nullable();
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
        Schema::dropIfExists('_rekapsmk');
    }
}