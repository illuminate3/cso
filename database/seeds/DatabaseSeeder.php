<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Model::unguard();
		$this->call('CategorySeeder');
		$this->call('ArticleSeeder');
		$this->call('FileSeeder');
		$this->call('PersonalSeeder');
		// $this->call('UserTableSeeder');
	}

}
