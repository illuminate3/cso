<?php
namespace App\Lib;

use SleepingOwl\Admin\FormItems\NamedFormItem;
use \Illuminate\Support\Facades;
use Session;
use Input;
class FormFiles extends NamedFormItem
{

	public function render()
	{
		$params = $this->getParams();
		$instance = $params['instance'];
		//dd($instance->get());
		return view('admin.formFiles', compact('params'));
    }



}