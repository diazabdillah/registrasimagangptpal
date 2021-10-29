<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAbsenIndivsTabel extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('absen_indivs_tabel', function (Blueprint $table) {
            $table->integer('id_absen');
            $table->integer('id_individu');
            $table->datetime('waktu_absen')->nullable();
            $table->string('status_absen');
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
        Schema::dropIfExists('absen_indivs_tabel');
    }
}
