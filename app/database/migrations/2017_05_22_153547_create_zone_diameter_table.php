<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateZoneDiameterTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		// todo: call the table, organism_break_points
		Schema::create('zone_diameters', function($table)
		{
			$table->increments('id');
			$table->integer('drug_id')->unsigned();
			$table->integer('organism_id')->unsigned();
			$table->decimal('resistant_max', 4, 1)->nullable();
			$table->decimal('intermediate_min', 4, 1)->nullable();
			$table->decimal('intermediate_max', 4, 1)->nullable();
			$table->decimal('sensitive_min', 4, 1)->nullable();

			$table->foreign('drug_id')->references('id')->on('drugs');
			$table->foreign('organism_id')->references('id')->on('organisms');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('zone_diameters');
	}

}
