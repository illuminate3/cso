<?php

Admin::model('App\Model\Category')->title('')->display(function ()
{
	$display = AdminDisplay::datatables();
	$display->with();
	$display->filters([

	]);
	$display->columns([
		Column::string('id')->label('Id'),
		Column::string('name')->label('Название'),
		Column::string('slug')->label('Код'),
		Column::string('activeWord')->label('Активность'),
		Column::datetime('created_at')->label('Дата содания')->format('d.m.Y H:i'),
	]);
	return $display;
})->createAndEdit(function ()
{
	$form = AdminForm::form();
	$form->items([
		FormItem::text('slug', 'Код'),
		FormItem::text('name', 'Названия'),
		FormItem::checkbox('active', 'Активность'),
		FormItem::select('parent_id', 'Раздел')->model('APp\Model\Category')->display('name'),
	]);
	return $form;
});