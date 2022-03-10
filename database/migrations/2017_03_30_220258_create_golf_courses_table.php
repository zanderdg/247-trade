<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGolfCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('golf_courses', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->string('name');
            $table->string('tag_line');
            $table->text('content');
            $table->string('banner_image');
            $table->string('image');
            $table->text('key_points');
            $table->integer('is_featured')->default(0);
            $table->text('featured_description')->nullable();
            $table->string('slug')->nullable();
            $table->integer('status')->default(0);
            $table->integer('order')->default(0);
            $table->string('meta_title');
            $table->text('meta_keywords');
            $table->text('meta_description');
            $table->unsignedInteger('created_by');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('golf_courses');
    }
}
