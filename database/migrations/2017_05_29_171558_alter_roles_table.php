<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterRolesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('roles', function(Blueprint $table) {
            
            $table->integer('created_by')->unsigned();
            $table->integer('updated_by')->unsigned();
            $table->boolean('is_active')->default(0);
            $table->string('title', 60);
            $table->text('description')->nullable();
            $table->string('slug', 60)->change();
            $table->dropColumn('name');
            $table->dropColumn('permissions');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
       Schema::table('roles', function(Blueprint $table) {
            
            $table->dropColumn('created_by');
            $table->dropColumn('updated_by');
            $table->dropColumn('is_active');
            $table->dropColumn('title');
            $table->dropColumn('description');
            $table->dropColumn('slug');
            
        });
    }
}
