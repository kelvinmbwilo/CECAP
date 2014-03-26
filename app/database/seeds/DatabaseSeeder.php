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

		$this->call('UserTableSeeder');
        $this->call('PapsmearSeeder');
        $this->call('ColposcopyResultSeeder');
        $this->call('ContraceptiveResultSeeder');
        $this->call('HistologyResultSeeder');
        $this->call('InterventionIndicatorSeeder');
        $this->call('InterventionResultSeeder');
        $this->call('CancerTypeSeeder');
	}

}