<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterCapabilitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('capabilities', function(Blueprint $table)
        {
            $table->dropColumn('related_service_left');
            $table->dropColumn('related_service_right');
            $table->text('related_service');
            $table->string('video');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('capabilities', function(Blueprint $table)
        {
            $table->text('related_service_left');
            $table->text('related_service_right');
            $table->dropColumn('related_service');
            $table->dropColumn('video');
        });
    }
}
