<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTestingDesignTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('testing_design', function (Blueprint $table) {
            $table->increments('id');
            $table->string('featured_image');
            $table->string('featured_title');
            $table->string('featured_link');
            $table->string('box_image');
            $table->string('box_text');
            $table->string('box_link');
            $table->integer('box_order')->default(0);
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
       Schema::drop('testing_design');
    }
}
