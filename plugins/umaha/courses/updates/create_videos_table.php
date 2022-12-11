<?php namespace Umaha\Courses\Updates;

use Schema;
use October\Rain\Database\Schema\Blueprint;
use October\Rain\Database\Updates\Migration;

class CreateVideosTable extends Migration
{
    public function up()
    {
        Schema::create('umaha_courses_videos', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug');
            $table->string('source');
            $table->string('youtube_video_id');
            $table->string('track_number');
            $table->string('is_published');
            $table->text('description')->nullable();
            $table->string('thumbnail')->nullable();
            $table->string('duration')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('umaha_courses_videos');
    }
}
