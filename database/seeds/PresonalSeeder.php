<?php

use illuminate\Database\Seeder;
use Maatwebsite\Excel\Facades\Excel;

class PersonalSeeder extends Seeder{
	
	/*
	 * void
	 */
	public function run(){
		
		Excel::load(storage_path('files').'/personal.xls', function($reader) {
		
			$data = $reader->get()->toArray();
			DB::table('personals')->insert($data);
		});
		
		
	}
}
