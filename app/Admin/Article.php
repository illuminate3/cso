<?php

Admin::model('App\Model\Article')->title('')->display(function ()
{
	$display = AdminDisplay::datatables();
	$display->with('category','files');
	$display->filters([

	]);
	$display->columns([
		Column::string('id')->label('Id'),
		Column::string('name')->label('Название'),
		Column::string('slug')->label('Код'),
		Column::string('activeWord')->label('Активность'),
		Column::string('category.name')->label('Раздел'),
		Column::lists('category.files.name')->label('Файлы'),
		Column::datetime('created_at')->label('Дата создания')->format('d.m.Y H:i'),			
	]);
	return $display;
})->create(function ()
{
	$form = AdminForm::form();
	$form->items([
		FormItem::text('slug', 'Код'),
		FormItem::select('category_id', 'Раздел')->model('App\Model\Category')->display('name'),
		FormItem::text('name', 'Название'),
		FormItem::text('title', 'Title'),
		FormItem::text('keywords', 'Keywords'),
		FormItem::view('admin.formFiles'),
		FormItem::text('active', 'Активность'),
		FormItem::ckeditor('text', 'Текст'),
	]);
	return $form;
})->edit(function ()
{
	$form = AdminForm::form();
	$form->items([
		FormItem::text('slug', 'Код'),
		FormItem::select('category_id', 'Раздел')->model('App\Model\Category')->display('name'),
		FormItem::text('name', 'Название'),
		FormItem::text('title', 'Title'),
		FormItem::text('keywords', 'Keywords'),
		FormItem::multiselect('files', 'Files')->model('App\Model\File')->display('name'),
		FormItem::text('active', 'Активность'),
		FormItem::ckeditor('text', 'Текст'),
	]);
	return $form;
});