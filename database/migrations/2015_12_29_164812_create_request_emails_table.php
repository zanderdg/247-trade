<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRequestEmailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('request_emails', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('professional_id')->default(0);
            $table->string('name');
            $table->string('company');
            $table->string('email');
            $table->string('phone', 24)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('request_emails');
    }
}
