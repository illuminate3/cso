<?php namespace App\Http\Controllers;

use App\Model\Category;
use App\Model\Article;
use App\Model\Personal;
use \Illuminate\Http\Request;
use \Illuminate\Http\Response;
use Excel;
use Illuminate\Support\Facades\Facade;
use Cache;

class PageController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Welcome Controller
	|--------------------------------------------------------------------------
	|
	| This controller renders the "marketing page" for the application and
	| is configured to only allow guests. Like most of the other sample
	| controllers, you are free to modify or remove it as you desire.
	|
	*/

	/**
	 * Show the application welcome screen to the user.
	 *
	 * @return Response
	 */
	public function index()
	{

		$section_name = 'Главная';
		
		return  view('pages.index',compact('section_name'));
	}

	public function show(Category $category){
		
		$articles = Cache::remember('page.category',\Config::get('cache.stores.file.time'),function() use($category){
			return $category->articles()->first();
		});

		//$files = $category->files()->get();
		
		if($category->hasChildren()){
			$button= Cache::remember('personal.category.children',\Config::get('cache.stores.file.time'),function() use($category){
				return $category->children()->get();	
			});	 
		}
		
		if(!$category->isRoot()){
			$button= Cache::remember('personal.category.root',\Config::get('cache.stores.file.time'),function() use($category){
				return $category->siblings()->get();
			});	 
		}

		
		
		$section_name = $category->name;
		if($articles){
			$files = Cache::remember('personal.file',\Config::get('cache.stores.file.time'),function() use($articles){
				return $articles->files()->get();
			});	 

		}
		
		return view('pages.article.show',compact('category','articles','button','section_name','files'));
	}
	
	/*
	 * return response
	 */
	
	public function personal(Personal $personal,Category $category,Request $request){
		
		/*this is shame need's for count in table first column with paginator */
		
		$pageCount = 30;
		$i = $request->query('page')*$pageCount;
		if($request->query('page')==1)
			$i=0;
		/******************************/
	
		$category = Cache::remember('personal.category',\Config::get('cache.stores.file.time'),function() use($category){
			
			return $category->where('slug','=','personal')->first();
		});

		

		$articles = Cache::remember('personal.page_'.$request->query('page'),\Config::get('cache.stores.file.time'),function() use ($personal,$pageCount){
		
			return $personal->paginate($pageCount);
		});
		//$files = $category->files()->get();
		
		if($category->hasChildren()){
			$button= Cache::remember('personal.category.children',\Config::get('cache.stores.file.time'),function() use($category){
				
				return $category->children()->get();	
			});

			 
		}	
		
		if(!$category->isRoot()){
			$button= Cache::remember('personal.category.root',\Config::get('cache.stores.file.time'),function() use($category){
				
				return $category->siblings()->get();
			});	 
		}
		
		$section_name = $category->name;
		
		return view('pages.article.personal',compact('category','articles','files','button','section_name','i'));
	}

}
