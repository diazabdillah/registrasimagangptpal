<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDataMhsIndivsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('data_mhs_indivs', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id');
            $table->string('nama');
            $table->string('univ');
            $table->string('jurusan');
            $table->string('strata');
            $table->string('alamat_rumah');
            $table->string('no_hp');
            $table->string('divisi')->nullable();
            $table->string('departemen')->nullable();
            $table->string('nim');
            $table->string('status_penerimaan')->nullable();
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
        Schema::dropIfExists('data_mhs_indivs');
    }
}