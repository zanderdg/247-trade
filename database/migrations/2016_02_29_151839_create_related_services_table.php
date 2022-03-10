<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRelatedServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('related_services', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->integer('business_unit_id')->default(0);
            $table->integer('capability_id')->default(0);
            $table->string('other_url')->nullable();
            $table->integer('status')->default(0);
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
        Schema::drop('related_services');
    }
}
