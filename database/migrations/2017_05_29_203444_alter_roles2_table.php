<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterRoles2Table extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('roles', function(Blueprint $table) {
            
            
            
            $table->string('name', 255)->after('id');
            $table->text('permissions')->nullable()->after('slug');
            $table->string('slug', 255)->change()->after('name');

            $table->dropColumn('title');
            $table->dropColumn('description');
            $table->dropColumn('created_by');
            $table->dropColumn('updated_by');
            $table->dropColumn('is_active');
            
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
            
             $table->dropColumn('name');
            $table->dropColumn('permissions');
            $table->dropColumn('slug');
            
        });
    }
}
