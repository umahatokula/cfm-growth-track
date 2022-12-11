<?php namespace Umaha\Courses\Updates;

use Schema;
use October\Rain\Database\Schema\Blueprint;
use October\Rain\Database\Updates\Migration;

/**
 * CreateCentersTable Migration
 */
class CreateCentersTable extends Migration
{
    public function up()
    {
        Schema::create('umaha_courses_centers', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('location')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('umaha_courses_centers');
    }
}
