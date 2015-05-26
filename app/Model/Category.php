<?php namespace App\Model;

use Illuminate\Database\Eloquent\Model;


class Category extends \Kalnoy\Nestedset\Node {

	protected $guarded = [];
	public function articles(){
		return $this->hasMany('App\Model\Article');
	}
	
	
	public function getActiveWordAttribute()
	{
		return  ($this->active)?'активно':'не активно';
	}

}
