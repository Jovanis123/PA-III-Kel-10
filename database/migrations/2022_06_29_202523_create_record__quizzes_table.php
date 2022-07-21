<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRecordQuizzesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('record_quizzes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('id_quiz')->unsigned();
            $table->foreign('id_quiz')->references('id')->on('quizzes')->onDelete('cascade');

            $table->bigInteger('id_soal')->unsigned();
            $table->foreign('id_soal')->references('id')->on('soals')->onDelete('cascade');
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
        Schema::dropIfExists('record_quizzes');
    }
}
