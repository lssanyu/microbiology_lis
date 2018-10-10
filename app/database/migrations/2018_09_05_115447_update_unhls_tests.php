<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateUnhlsTests extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('unhls_tests', function($table) {
			$table->integer('isolate_id')->unsigned()->after('specimen_id');;

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
