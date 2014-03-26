<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContraceptiveHistoryTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('contraceptive_history', function(Blueprint $table)
		{
			$table->increments('id');
            $table->integer("patient_id");
            $table->integer("visit_id");
            $table->string("previous_status");
            $table->integer("previous_contraceptive_id");
            $table->string("current_status");
            $table->integer("current_contraceptive_id");
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
		Schema::drop('contraceptive_history');
	}

}
