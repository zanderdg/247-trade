<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterNewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('news', function(Blueprint $table)
        {
            $table->dropColumn('news_category_id');
            $table->dropColumn('views');
            $table->integer('business_unit_id')->after('user_id')->default(0);
            $table->string('video')->after('image')->nullable();
            $table->integer('order')->after('slug')->default(0);
            $table->string('type')->after('user_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('news', function(Blueprint $table)
        {
            $table->unsignedInteger('news_category_id');
            $table->integer('views')->default(0);
            $table->dropColumn('business_unit_id');
            $table->dropColumn('video');
            $table->dropColumn('order');
            $table->dropColumn('type');
        });
    }
}
