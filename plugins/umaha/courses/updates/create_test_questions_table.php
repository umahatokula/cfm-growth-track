<?php namespace Umaha\Courses\Updates;

use Schema;
use October\Rain\Database\Schema\Blueprint;
use October\Rain\Database\Updates\Migration;

/**
 * CreateTestQuestionsTable Migration
 */
class CreateTestQuestionsTable extends Migration
{
    public function up()
    {
        Schema::create('umaha_courses_test_questions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('course_id');
            $table->text('question');
            $table->text('answers');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('umaha_courses_test_questions');
    }
}
