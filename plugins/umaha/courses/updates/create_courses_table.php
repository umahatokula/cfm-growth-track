<?php namespace Umaha\Courses\Updates;

use Schema;
use October\Rain\Database\Schema\Blueprint;
use October\Rain\Database\Updates\Migration;

class CreateCoursesTable extends Migration
{
    public function up()
    {
        Schema::create('umaha_courses_courses', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug');
            $table->string('code', 180)->index()->nullable();
            $table->string('slogan')>nullable();
            $table->text('description')->nullable();
            $table->boolean('is_published')->default(true);
            $table->double('price', 15,2)->default(0.00);
            $table->decimal('old_price', 10, 2)->nullable()->default(0.00);
            $table->string('currency', 10);
            $table->integer('product_id')->nullable()->comment('Corresponsding product in shop');
            $table->text('things_to_be_learnt')->nullable();
            $table->boolean('open_quiz')->default(1)->nullable();
            $table->foreignId('prerequisite')->default(0)->nullable();
            $table->string('pass_mark')->default(0)->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('umaha_courses_courses');
    }
}
