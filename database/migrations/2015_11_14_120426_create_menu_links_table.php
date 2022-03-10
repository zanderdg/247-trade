<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMenuLinksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('menu_links', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->integer('page_id')->default(0);
            $table->integer('parent_id')->default(0);
            $table->string('other_url')->nullable();
            $table->integer('footer_display')->default(0);
            $table->integer('status')->default(0);
            $table->integer('order')->default(0);
            $table->unsignedInteger('created_by');
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
        Schema::drop('menu_links');
    }
}
