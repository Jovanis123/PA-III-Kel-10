<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTugasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tugas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('mata_pelajaran_id');
            $table->unsignedBigInteger('kelas_id');
            $table->string('judul_tugas');
            $table->string('file_tugas');
            $table->integer('nilai_tugas')->nullable();
            $table->timestamps();

            $table->foreign('mata_pelajaran_id')->on('mata_pelajaran')->references('id')
                    ->onDelete('CASCADE')
                    ->onUpdate('CASCADE');

            $table->foreign('kelas_id')->on('kelas')->references('id')
                    ->onDelete('CASCADE')
                    ->onUpdate('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tugas');
    }
}
