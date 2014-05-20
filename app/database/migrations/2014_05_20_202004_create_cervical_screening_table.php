<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCervicalScreeningTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('cervical_screening', function(Blueprint $table)
		{
			$table->increments('id');
            $table->integer("patient_id");
            $table->string("status");
            $table->string("last_test");
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
		Schema::drop('cervical_screening');
	}

}
