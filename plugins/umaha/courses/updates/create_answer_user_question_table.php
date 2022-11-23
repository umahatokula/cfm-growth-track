<?php namespace Umaha\Courses\Updates;

use Schema;
use October\Rain\Database\Schema\Blueprint;
use October\Rain\Database\Updates\Migration;

class CreateAnswerUserQuestionTable extends Migration
{
    public function up()
    {
        Schema::create('umaha_answer_user_test_question', function (Blueprint $table) {
          $table->id();
          $table->integer('user_id')->nullable()->unsigned();
          $table->integer('question_id')->nullable()->unsigned();
          $table->string('chosen_option')->nullable();
        });
    }

    public function down()
    {
        Schema::dropIfExists('umaha_answer_user_test_question');
    }
}
