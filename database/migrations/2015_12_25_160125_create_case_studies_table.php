<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCaseStudiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('case_studies', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('image');
            $table->integer('is_featured')->default(0);
            $table->integer('professional_id')->default(0);
            $table->text('content');
            $table->text('assigned_task');
            $table->text('assigned_task_2');
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
       Schema::drop('case_studies');
    }
}
