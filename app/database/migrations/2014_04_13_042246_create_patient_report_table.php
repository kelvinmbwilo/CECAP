<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePatientReportTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('patient_report', function(Blueprint $table)
		{
			$table->increments('id');
            $table->integer("patient_id");
            $table->string("bitrh_date");
            $table->string("region");
            $table->string("district");
            $table->string("parity");
            $table->string("number_of_pregnancy");
            $table->string("marital_status");
            $table->string("first_marriage");
            $table->string("partners");
            $table->string("partners_partner");
            $table->string("contraceptive_status");
            $table->string("contraceptive_type");
            $table->string("HIV_status");
            $table->integer("menarche");
            $table->integer("age_at_sexual_debut");
            $table->integer("cd4_count");
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('patient_report');
	}

}
