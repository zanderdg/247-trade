<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterSubmitAnAssignmentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('submit_assignment', function(Blueprint $table)
        {
            $table->dropColumn('fileclaim');
            $table->string('file_number');
            $table->string('claim_number');
            $table->string('vehicle_information');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('submit_assignment', function(Blueprint $table)
        {
            $table->string('fileclaim');
            $table->dropColumn('file_number');
            $table->dropColumn('claim_number');
            $table->dropColumn('vehicle_information');
        });
    }
}
