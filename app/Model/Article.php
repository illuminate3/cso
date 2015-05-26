<?php namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use \Illuminate\Support\Facades;
use Session;
use \App\Model\File;
class Article extends Model {
	protected $fillabel= ['name', 'url', 'article_id'];
	
	public function files(){
		
		return $this->belongsToMany('App\Model\File');
	}
	
	public function category(){
		return $this->belongsTo('App\Model\Category');
	}
	
	public function setfilesAttribute($filesList)
	{

		 $this->files()->detach();
		  if ( ! $filesList) 
		  	return;
		  if ( ! $this->exists) 
		  	$this->save();

		  $this->files()->attach($filesList);
		/*
		$filesArray = \App\Model\File::whereIn('id',$filesList)->get();
		foreach($filesArray as $item){
			
			$item->article_id = $this->id;
			$item->update();
		}
		*/
		
	}
	
}
