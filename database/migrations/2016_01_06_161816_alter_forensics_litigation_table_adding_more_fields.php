<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterForensicsLitigationTableAddingMoreFields extends Migration
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
            $table->text('capability_more')->after('capability_text');
            $table->text('case_study_more')->after('case_study_text');
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
            $table->dropColumn('capability_more');
            $table->dropColumn('case_study_more');
        });
    }
}
