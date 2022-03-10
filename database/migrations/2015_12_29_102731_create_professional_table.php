<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProfessionalTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('professional', function (Blueprint $table) {
            $table->increments('id');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('degree_title');
            $table->text('content');
            $table->integer('location_id')->default(0);
            $table->string('company');
            $table->string('city');
            $table->string('state', 45)->nullable();
            $table->string('zip', 10)->nullable();
            $table->string('country');
            $table->text('address');
            $table->string('email');
            $table->string('telephone');
            $table->string('toll_free');
            $table->string('fax');
            $table->string('facebook');
            $table->string('twitter');
            $table->string('linkedin');
            $table->string('profile_image');
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
        Schema::drop('professional');
    }
}
