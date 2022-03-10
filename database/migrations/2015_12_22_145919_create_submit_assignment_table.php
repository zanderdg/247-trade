<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubmitAssignmentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('submit_assignment', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email');
            $table->string('company');
            $table->text('address')->nullable();
            $table->string('city', 45)->nullable();
            $table->string('state', 45)->nullable();
            $table->string('zip', 10)->nullable();
            $table->dateTime('date_of_loss')->nullable();
            $table->string('phone', 24)->nullable();
            $table->string('ext', 24)->nullable();
            $table->string('cell_phone', 24)->nullable();
            $table->string('fax', 24)->nullable();
            $table->string('fileclaim');
            $table->string('type_loss');
            $table->text('pi_address')->nullable();
            $table->string('pi_city', 45)->nullable();
            $table->string('pi_state', 45)->nullable();
            $table->string('pi_zip', 10)->nullable();
            $table->string('client_carrier');
            $table->string('carrier_claim');
            $table->string('insured');
            $table->string('insured_phone', 24)->nullable();
            $table->text('insured_address')->nullable();
            $table->string('insured_city', 45)->nullable();
            $table->string('ii_state', 45)->nullable();
            $table->string('insured_zip', 10)->nullable();
            $table->string('insured_contact');
            $table->string('insured_additional_phone', 24)->nullable();
            $table->string('other_party_phone', 24)->nullable();
            $table->string('other_party');
            $table->text('other_party_address')->nullable();
            $table->string('other_party_city', 45)->nullable();
            $table->string('other_party_state', 45)->nullable();
            $table->string('other_party_zip', 10)->nullable();
            $table->string('other_party_contact');
            $table->string('other_party_additional_phone', 24)->nullable();
            $table->text('other_party_additional_notes')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('submit_assignment');
    }
}
