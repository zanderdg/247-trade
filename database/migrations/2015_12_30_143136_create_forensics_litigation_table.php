<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateForensicsLitigationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('forensics_litigation', function (Blueprint $table) {
            $table->increments('id');
            $table->string('featured_image');
            $table->string('featured_title');
            $table->string('featured_link');
            $table->text('capability_text');
            $table->text('case_study_text');
            $table->string('brochure');
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
       Schema::drop('forensics_litigation');
    }
}
