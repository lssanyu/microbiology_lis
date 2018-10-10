<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateDrugSusceptibility extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('drug_susceptibility', function($table) {
			$table->integer('isolate_id')->unsigned()->after('drug_id')->nullable();
			//foreign keys
			$table->foreign('isolate_id')->references('id')->on('unhls_isolates');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		//
	}

}
