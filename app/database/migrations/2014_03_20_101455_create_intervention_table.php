<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInterventionTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('intervention', function(Blueprint $table)
		{
			$table->increments('id');
            $table->integer("patient_id");
            $table->integer("visit_id");
            $table->integer("type_id");
            $table->integer("indicator_id");
            $table->integer("histology_id");
            $table->integer("cancer_id");
            $table->string("differentiation");
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
		Schema::drop('intervention');
	}

}
