<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSurveyQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('survey_questions', function (Blueprint $table) {
            $table->id();
            $table->mediumText('question');
            $table->string('answer')->nullable();
            $table->string('ans_two')->nullable();
            $table->string('ans_three')->nullable();
            $table->string('ans_four')->nullable();
            $table->string('ans_five')->nullable();
            $table->string('ans_six')->nullable();
            $table->string('ans_seven')->nullable();
            $table->string('ans_eight')->nullable();
            $table->string('ans_nine')->nullable();
            $table->string('ans_ten')->nullable();
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
        Schema::dropIfExists('survey_questions');
    }
}
