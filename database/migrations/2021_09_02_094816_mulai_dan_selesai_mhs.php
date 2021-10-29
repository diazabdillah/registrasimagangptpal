<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class MulaiDanSelesaiMhs extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mulai_dan_selesai_mhs', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id');
            $table->date('mulai');
            $table->date('selesai');
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
        Schema::dropIfExists('mulai_dan_selesai_mhs');
    }
}
