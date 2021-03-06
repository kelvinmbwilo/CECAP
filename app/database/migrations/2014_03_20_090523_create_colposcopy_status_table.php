<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateColposcopyStatusTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('colposcopy_status', function(Blueprint $table)
		{
			$table->increments('id');
            $table->integer("patient_id");
            $table->integer("visit_id");
            $table->string("status");
            $table->integer("result_id");
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
		Schema::drop('colposcopy_status');
	}

}
