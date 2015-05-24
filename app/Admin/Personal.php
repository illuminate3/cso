<?php

Admin::model('App\Model\Personal')->title('')->display(function ()
{
	$display = AdminDisplay::datatables();
	$display->with();
	$display->filters([

	]);
	$display->columns([
		Column::string('soname')->label('Фамилия'),
		Column::string('name')->label('Имя'),
		Column::string('second_name')->label('Отчество'),
		Column::string('eduction')->label('Образование'),
		Column::string('post')->label('Должность'),
		Column::string('exp')->label('Дата приема'),

	]);
	return $display;
})->createAndEdit(function ()
{
	$form = AdminForm::form();
	$form->items([
		FormItem::text('soname', 'Фамилия'),
		FormItem::text('name', 'Имя'),
		FormItem::text('second_name', 'Отчество'),
		FormItem::text('eduction', 'Образование'),
		FormItem::text('post', 'Должность'),
		FormItem::date('exp', 'Дата приема'),

	]);
	return $form;
});
