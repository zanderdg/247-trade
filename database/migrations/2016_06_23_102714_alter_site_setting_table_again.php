<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterSiteSettingTableAgain extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('site_settings', function (Blueprint $table)
        {
            $table->string('contact_from_email');
            $table->string('contact_to_email');
            $table->string('contact_body');
            $table->string('contact_automated');
            $table->string('assignment_from_email');
            $table->string('assignment_to_email');
            $table->string('assignment_body');
            $table->string('assignment_automated');
            $table->string('request_cv_from_email');
            $table->string('request_cv_to_email');
            $table->string('request_cv_body');
            $table->string('request_cv_automated');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('site_settings', function(Blueprint $table)
        {
            $table->dropColumn('contact_from_email');
            $table->dropColumn('contact_to_email');
            $table->dropColumn('contact_body');
            $table->dropColumn('contact_automated');
            $table->dropColumn('assignment_from_email');
            $table->dropColumn('assignment_to_email');
            $table->dropColumn('assignment_body');
            $table->dropColumn('assignment_automated');
            $table->dropColumn('request_cv_from_email');
            $table->dropColumn('request_cv_to_email');
            $table->dropColumn('request_cv_body');
            $table->dropColumn('request_cv_automated');
        });
    }
}
