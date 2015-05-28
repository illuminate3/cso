<?php namespace App\Commands;

use App\Commands\Command;

use Illuminate\Contracts\Bus\SelfHandling;
use \Illuminate\Http\Request;
use Illuminate\Support\Facades\Facade;
use Cache;

class ArticleShowCommands extends Command implements SelfHandling {

	/**
	 * Create a new command instance.
	 *
	 * @return void
	 */
	public $category;
	public $request;

	public function __construct(\App\Model\Category $category, Request $request)
	{
		$this->category = $category;
		$this->request = $request;
	}

	/**
	 * Execute the command.
	 *
	 * @return array();
	 */
	public function handle()
	{
		
		$result = Cache::remember('category.show'.$this->category->slug,\Config::get('cache.stores.file.time'),function(){

			$result = [];

			$articles = $this->category->articles()->first();
			
			if($this->category->hasChildren()){
				$button= $this->category->children()->get();	 
			}
			
			if(!$this->category->isRoot()){
				$button = $this->category->siblings()->get();	
			}	


			if($articles){
				$files =  $articles->files()->get();	
			}else{
				$files = null;
			}

			$result = [
				'category'=>$this->category,
				'articles'=>$articles,
				'button'=>$button,
				'section_name'=>$this->category->name,
				'files'=>$files,
				];
			
			return $result;
		});
			
		return $result;
	}

}
