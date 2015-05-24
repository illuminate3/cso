<?php

Admin::model('App\Model\Personal')->title('')->display(function ()
{
	$display = AdminDisplay::datatables();
	$display->with();
	$display->filters([

	]);
	$display->columns([
		Column::string('name')->label('Name'),
		Column::string('eduction')->label('Eduction'),
		Column::string('exp')->label('Exp'),
		Column::string('course')->label('Course'),
	]);
	return $display;
})->createAndEdit(function ()
{
	$form = AdminForm::form();
	$form->items([
		FormItem::text('name', 'Фио'),
		FormItem::text('eduction', 'Образование'),
		FormItem::text('exp', 'Опыт'),
		FormItem::text('course', 'Доп образование, курсы'),
	]);
	return $form;
});