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

/*upload article files*/
Route::post('article/upload',function(\Illuminate\Http\Request $request,\App\Model\File $Fmodel){
	
	$file = $request->file('file');
	$originName = trim($file->getClientOriginalName(),'.'.$file->getClientOriginalExtension());
	$filename = md5(time() . $originName) . '.' . $file->getClientOriginalExtension();
	$path = config('admin.imagesUploadDirectory');
	$fullpath = public_path($path);
	$file->move($fullpath, $filename);
	$url = $path . '/' . $filename;
	$files = ['name'=>$originName,'url'=>$url];
	Session::push('article.files', $files);
	
});
