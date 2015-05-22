<?php
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

Menu::breadcrumbs(function($itemLists)
    {
      
      return $itemLists[0]; // returns first match
    })
    ->setElement('ol')
    ->addClass('breadcrumb');