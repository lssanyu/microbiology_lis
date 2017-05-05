<?php

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();
		$this->call('MicrobiologyProductionSeeder');
		// $this->call('DeploymentSeeder');
		// $this->call('TestDataSeeder');
		$this->call('ConfigSettingSeeder');
	}

}