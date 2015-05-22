<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;


class ArticleSeeder extends Seeder{

	public function run(){

		DB::table('Articles')->delete();

		$data = [
			[
				"slug"=>"test1",
				"category_id"=>"1",
				"name"=>"test1",
				"title"=>"test1",
				"keywords"=>"test1",
				"text"=>"test1",
				"active"=>1
			],
			[
				"slug"=>"test2",
				"category_id"=>"2",
				"name"=>"test2",
				"title"=>"test2",
				"keywords"=>"test2",
				"text"=>"test1",
				"active"=>1
			],
		];
		DB::table('Articles')->insert($data);
	}
}

