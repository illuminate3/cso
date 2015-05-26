<?php

if(DB::table('categories')->exists()){
	
	Menu::handler('main')->add('/','Главная');
	
	Menu::handler('main')->hydrate(function()
	  {
      $cache = Cache::remember('category.menu',Config::get('cache.stores.file.time'),function(){
        return App\Model\Category::where('active','=',1)->get();
      });
	    return $cache;
	  },
	  function($children, $item)
	  {
	  	if($item->isRoot())
	   	 $children->add('/page/'.$item->slug, $item->name, Menu::items($item->as));
	  });
	
	
			
}


