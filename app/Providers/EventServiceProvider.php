<?php namespace App\Providers;

use Illuminate\Contracts\Events\Dispatcher as DispatcherContract;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use \App\Model\Article;
use \App\Model\File;
use \Illuminate\Support\Facades;
use Session;
 use Illuminate\Database\Eloquent\ModelNotFoundException;
class EventServiceProvider extends ServiceProvider {

	/**
	 * The event handler mappings for the application.
	 *
	 * @var array
	 */
	protected $listen = [
		'event.name' => [
			'EventListener',
		],
	];

	/**
	 * Register any other events for your application.
	 *
	 * @param  \Illuminate\Contracts\Events\Dispatcher  $events
	 * @return void
	 */
	public function boot(DispatcherContract $events)
	{
		parent::boot($events);

		    Article::saved(function($article)
		    {
		    	//dd($article);
		    	$value = Session::pull('article.files');
		    	if(!$value)
		    		return;

				foreach($value as $item){
					$fileArray = new File($item);
					 $article->files()->save($fileArray);
				}
       
		    });
		    
		//
	}

}
