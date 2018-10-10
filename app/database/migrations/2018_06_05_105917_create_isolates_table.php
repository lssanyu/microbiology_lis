<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIsolatesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('test_reasons', function($table){
			$table->increments('id');
			$table->string('name');

		});


		Schema::create('unhls_isolates', function($table)

		{			
			$table->increments('id');	
			$table->string('gender');
			$table->integer('age');			
			$table->string('lab_id');
			$table->integer('organism_id')->unsigned();
			$table->integer('specimen_type_id')->unsigned();
			$table->integer('test_reason_id')->unsigned();
			$table->integer('facility_id')->unsigned();
			$table->integer('district_id')->unsigned();
			$table->string('received_by');
			$table->string('dispatched_by');
			$table->date('preparation_date');
			$table->date('received_date');
			$table->date('dispatch_date');	
			
			//referenced columns
			$table->foreign('organism_id')->references('id')->on('organisms');	
			$table->foreign('specimen_type_id')->references('id')->on('specimen_types');			
			$table->foreign('facility_id')->references('id')->on('unhls_facilities');
			$table->foreign('district_id')->references('id')->on('unhls_districts');
			$table->foreign('test_reason_id')->references('id')->on('test_reasons');
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
		Schema::drop('unhls_isolates');
		Schema::drop('test_reasons');
	}

}
