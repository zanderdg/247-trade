<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterMenuLinksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('menu_links', function(Blueprint $table)
        {
            $table->dropColumn('footer_display');
            $table->string('menu_location')->after('other_url');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('menu_links', function(Blueprint $table)
        {
            $table->integer('footer_display')->default(0);
            $table->dropColumn('menu_location');
        });
    }
}
