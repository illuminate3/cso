<?php namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Article extends Model {

	public function files(){
		
		return $this->hasMany('App\Model\File','article_id','id');
	}
	
	public function category(){
		return $this->belongsTo('App\Model\Category');
	}
	

}
