<?php

if(DB::table('categories')->exists()){
	
	Menu::handler('main')->add('/','Главная');
	
	Menu::handler('main')->hydrate(function()
	  {
	    return App\Model\Category::all();
	  },
	  function($children, $item)
	  {
	  	if($item->isRoot())
	   	 $children->add('/page/'.$item->slug, $item->name, Menu::items($item->as));
	  });
	
	
			
}


