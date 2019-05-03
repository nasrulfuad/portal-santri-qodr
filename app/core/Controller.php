<?php 

class Controller
{
	public function view($view, $datas = [])
	{
		require_once '../app/Views/' . $view  . '.php';
	}	

	public function model($model)
	{
		require_once '../app/Models/' . $model  . '.php';		
		return new $model;
	}
}
