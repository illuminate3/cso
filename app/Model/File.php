<?php namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class File extends Model {

	protected $guarded = [];

		public function scopeId($query)
	{
		return $query->orderBy('id','desc')->take(1)->id;
	}

		public function articles(){

			return $this->belongsTo('App\Model\Article');
		}
		

	
}
