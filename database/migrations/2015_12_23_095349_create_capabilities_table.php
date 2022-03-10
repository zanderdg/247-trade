<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCapabilitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('capabilities', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->integer('business_unit_id')->default(0);
            $table->text('content');
            $table->string('image');
            $table->text('related_service_left');
            $table->text('related_service_right');
            $table->text('brochure');
            $table->text('portfolio');
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
        Schema::drop('capabilities');
    }
}
