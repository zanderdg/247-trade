<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterForensicsLitigationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('forensics_litigation', function(Blueprint $table)
        {
            $table->string('brochure_link')->after('brochure');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('forensics_litigation', function(Blueprint $table)
        {
            $table->dropColumn('brochure_link');
        });
    }
}
