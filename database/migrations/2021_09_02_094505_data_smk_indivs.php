<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DataSmkIndivs extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('data_smk_indivs', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id');
            $table->string('nama');
            $table->string('sekolah');
            $table->string('jurusan');
            $table->string('alamat_rumah');
            $table->string('no_hp');
            $table->string('divisi');
            $table->string('departemen');
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
        Schema::dropIfExists('data_smk_indivs');
    }
}
