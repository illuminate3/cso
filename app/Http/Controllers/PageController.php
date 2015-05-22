<?php namespace App\Http\Controllers;

use App\Model\Category;
use App\Model\Article;

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
		return view('pages.index');
	}

	public function show(Category $category){

		$article = $category->articles()->first();

		return view('pages.article.show',compact('article'));
	}

}
