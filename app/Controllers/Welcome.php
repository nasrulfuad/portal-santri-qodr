<?php

class Welcome extends Controller
{
	public static function index($name = 'Nasrul Fuad', $job = 'Frontend Developer')
	{
		$datas['name'] = $name;
		$datas['job'] = $job;
		$datas['title'] = 'Welcome to my world!';

		$this->view('layouts/header', $datas);
		$this->view('Welcome', $datas);
		$this->view('layouts/footer');
	}
}
