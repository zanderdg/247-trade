<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlertForensicsLitigationTable extends Migration
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
            $table->string('meta_title')->after('brochure_link');
            $table->text('meta_keywords')->after('brochure_link');
            $table->text('meta_description')->after('brochure_link');
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
            $table->dropColumn('meta_title');
            $table->dropColumn('meta_keywords');
            $table->dropColumn('meta_description');
        });
    }
}
