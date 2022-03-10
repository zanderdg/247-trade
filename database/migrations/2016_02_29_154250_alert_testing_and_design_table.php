<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlertTestingAndDesignTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('testing_design', function(Blueprint $table)
        {
            $table->string('hover_color', 24)->after('meta_title');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('testing_design', function(Blueprint $table)
        {
            $table->dropColumn('hover_color');
        });
    }
}
