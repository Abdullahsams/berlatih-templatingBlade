<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommentsQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments_questions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('isi', 255);
            $table->date('tanggal_dibuat');
            $table->unsignedBigInteger('pertanyaan_id');
            $table->foreign('pertanyaan_id')->references('id')->on('questions');
            $table->unsignedBigInteger('profiles_id');
            $table->foreign('profiles_id')->references('id')->on('profiles');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('comments_questions');
    }
}