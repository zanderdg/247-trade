<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pages', function (Blueprint $table) {
            $table->increments('id');
            $table->string('template');
            $table->string('title');
            $table->string('short_title');
            $table->text('content');
            $table->string('image');
            $table->string('meta_title');
            $table->text('meta_keywords');
            $table->text('meta_description');
            $table->string('slug')->nullable();
            $table->integer('status')->default(0);
            $table->integer('order')->default(0);
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
        Schema::drop('pages');
    }
}
