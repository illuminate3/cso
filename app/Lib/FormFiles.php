<?php
namespace App\Lib;

use SleepingOwl\Admin\FormItems\NamedFormItem;

class FormFiles extends NamedFormItem
{

	public function render()
	{
		$params = $this->getParams();
		//var_dump($params);
		return view('admin.formFiles', compact('params'));
    }

}