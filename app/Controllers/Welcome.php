<?php

class Welcome extends Controller
{
	public function index($name = 'Nasrul Fuad', $job = 'Frontend Developer')
	{
		$datas['title'] = 'QODR | Santri';
		$datas['santriLink'] = 'active';
		$datas['js'] = 'santri.js';

		$this->view('layouts/header', $datas);
		$this->view('Welcome');
		$this->view('layouts/footer', $datas);
	}
}
