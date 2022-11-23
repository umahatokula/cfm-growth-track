<?php namespace Umaha\Courses\Updates;

use Schema;
use October\Rain\Database\Schema\Blueprint;
use October\Rain\Database\Updates\Migration;

/**
 * CreateUnlockedModulesTable Migration
 */
class CreateUnlockedModulesTable extends Migration
{
    public function up()
    {
        Schema::create('umaha_courses_unlocked_modules', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable();
            $table->foreignId('course_id')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('umaha_courses_unlocked_modules');
    }
}
