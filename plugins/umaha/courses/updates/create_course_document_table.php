<?php namespace Umaha\Courses\Updates;

use Schema;
use October\Rain\Database\Schema\Blueprint;
use October\Rain\Database\Updates\Migration;

class CreateCourseDocumentTable extends Migration
{
    public function up()
    {
        Schema::create('umaha_courses_course_document', function (Blueprint $table) {
          $table->integer('document_id')->unsigned();
          $table->integer('course_id')->unsigned();
          $table->primary(['document_id', 'course_id']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('umaha_courses_course_document');
    }
}
