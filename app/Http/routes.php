<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'PageController@index');
Route::get('page/personal','PageController@personal');
Route::get('page/{category}', ['as'=>'article.show','uses'=>'PageController@show']);

Route::bind('category',function($slug){
	
	return App\Model\Category::where('slug','=',$slug)->firstOrFail();

});


/*
Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);
*/