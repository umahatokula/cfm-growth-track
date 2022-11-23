<?php namespace Umaha\Courses\Updates;

use Schema;
use October\Rain\Database\Schema\Blueprint;
use October\Rain\Database\Updates\Migration;

/**
 * CreateUsersQuestionAnswersTable Migration
 */
class CreateUsersQuestionAnswersTable extends Migration
{
    public function up()
    {
        Schema::create('umaha_courses_users_question_answers', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->nullable()->unsigned();
            $table->integer('question_id')->nullable()->unsigned();
            $table->integer('course_id')->nullable()->unsigned();
            $table->string('correct_answer')->nullable();
            $table->string('chosen_option')->nullable();
            $table->boolean('correctly_answered')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('umaha_courses_users_question_answers');
    }
}
