<?php namespace Umaha\Courses\Updates;

use Schema;
use October\Rain\Database\Schema\Blueprint;
use October\Rain\Database\Updates\Migration;

class CreateCourseVideoTable extends Migration
{
    public function up()
    {
        Schema::create('umaha_courses_course_video', function (Blueprint $table) {
          $table->integer('course_id')->unsigned();
          $table->integer('video_id')->unsigned();
          $table->primary(['course_id', 'video_id']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('umaha_courses_course_video');
    }
}
