<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterPageTableAgain extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('pages', function (Blueprint $table)
        {
            $table->string('career_open_position_text');
            $table->string('career_open_position_url');
            $table->string('career_content_image');
            $table->string('equal_opportunity_background');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('pages', function(Blueprint $table)
        {
            $table->dropColumn('career_open_position_text');
            $table->dropColumn('career_open_position_url');
            $table->dropColumn('career_content_image');
            $table->dropColumn('equal_opportunity_background');
        });
    }
}
