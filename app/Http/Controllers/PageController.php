<?php namespace App\Http\Controllers;

use App\Model\Category;
use App\Model\Article;
use App\Model\Personal;
use \Illuminate\Http\Request;
use Excel;
use Illuminate\Support\Facades\Facade;
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
		return view('pages.index',compact('section_name'));
	}

	public function show(Category $category){
		
		$articles = $category->articles()->first();
		//$files = $category->files()->get();
		
		if($category->hasChildren())
			$button = $category->children()->get();	
		
		if(!$category->isRoot())
			$button = $category->siblings()->get();
		
		$section_name = $category->name;
		$files = $category->files()->get();
		
		return view('pages.article.show',compact('category','articles','button','section_name','files'));
	}
	
	/*
	 * return response
	 */
	
	public function personal(Personal $personal,Category $category,Request $request){
		
		/*this is shame need's for count in table first column with paginator */
		$i = $request->query('page')*30;
		if($request->query('page')==1)
			$i=0;
		/******************************/
		
		$category = $category->where('slug','=','personal')->first();
		$articles = $personal->paginate(30);
		//$files = $category->files()->get();
		
		if($category->hasChildren())
			$button = $category->children()->get();	
		
		if(!$category->isRoot())
			$button = $category->siblings()->get();
		
		$section_name = $category->name;
		
		return view('pages.article.personal',compact('category','articles','files','button','section_name','i'));
	}

}
