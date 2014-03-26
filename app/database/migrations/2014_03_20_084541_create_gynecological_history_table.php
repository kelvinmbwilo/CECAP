<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGynecologicalHistoryTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('gynecological_history', function(Blueprint $table)
		{
			$table->increments('id');
            $table->integer("patient_id");
            $table->integer("visit_id");
            $table->integer("parity");
            $table->integer("number_of_pregnancy");
            $table->string("menarche");
            $table->string("age_at_sexual_debut");
            $table->string("marital_status");
            $table->string("age_at_first_marriage");
            $table->integer("sexual_partner");
            $table->integer("partner_sexual_partner");

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
		Schema::drop('gynecological_history');
	}

}
