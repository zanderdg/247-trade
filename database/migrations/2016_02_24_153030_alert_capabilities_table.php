<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlertCapabilitiesTable extends Migration
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
            $table->integer('case_study_id')->default(0)->after('business_unit_id');
            $table->string('meta_title')->after('slug');
            $table->text('meta_keywords')->after('slug');
            $table->text('meta_description')->after('slug');
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
            $table->dropColumn('case_study_id');
            $table->dropColumn('meta_title');
            $table->dropColumn('meta_keywords');
            $table->dropColumn('meta_description');
        });
    }
}
