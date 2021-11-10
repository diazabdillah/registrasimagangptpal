<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInterviewSmkTabel extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('interview_smk', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->string('fileinterview');
            $table->string('tipe_kepribadian');
            $table->integer('ekstrovet');
            $table->integer('introvet');
            $table->integer('visioner');
            $table->integer('realistik');
            $table->integer('emosional');
            $table->integer('rasional');
            $table->integer('perencanaan');
            $table->integer('improvisasi');
            $table->integer('tegas');
            $table->integer('waspada');
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
        Schema::dropIfExists('interview_smk');
    }
}
