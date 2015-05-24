<?php
use \Illuminate\Support\Facades;
use App\Http\Requests\Request;
use HtmlObject\Input;

Route::get('', [
	'as' => 'admin.home',
	function ()
	{
		$content = 'Главный раздел';
		return Admin::view($content, 'Административная панель');
	}
]);

Route::post('article/upload',function(\Illuminate\Http\Request $request){
	
	return 'ok';
});
