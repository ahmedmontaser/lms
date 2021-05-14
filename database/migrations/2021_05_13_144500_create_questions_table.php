<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('questions', function (Blueprint $table) {
			$table->bigIncrements('id');
			$table->string('question', 500);
			$table->string('right_answer');
			$table->string('option_1');
			$table->string('option_2');
			$table->string('option_3');
			$table->integer('score');

			$table->bigInteger('quiz_id')->unsigned();

			$table->foreign('quiz_id')->references('id')->on('quizzes')->onDelete('cascade');

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
        Schema::dropIfExists('questions');
    }
}
