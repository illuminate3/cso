<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class FileSeeder extends Seeder{
	
	public function run(){
		if(DB::table('files')->exists())
			DB::table('files')->delete();
		
		$data = [
			[
				'name'=>'tesnig name',
				'url'=>'/upload/doc/test.pdf',
			],
			[
				'name'=>'tesnig name2',
				'url'=>'/upload/doc/test2.pdf',
			]	
		];
		DB::table('files')->insert($data);
	}
}
