<?php 

class Controller
{
	public static function view($view, $datas = [])
	{
		require_once '../app/Views/' . $view  . '.php';
	}	
}
