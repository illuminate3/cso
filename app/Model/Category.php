<?php namespace App\Model;

use Illuminate\Database\Eloquent\Model;


class Category extends \Kalnoy\Nestedset\Node {

	public function Articles(){
		return $this->hasMany('App\Model\Article');
	}

}
