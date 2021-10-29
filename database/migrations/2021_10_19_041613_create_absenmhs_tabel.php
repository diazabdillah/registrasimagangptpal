<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAbsenmhsTabel extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('absenmhs', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id');
            $table->datetime('waktu_awal');
            $table->datetime('waktu_akhir');
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
        Schema::dropIfExists('absenmhs_tabel');
    }
}