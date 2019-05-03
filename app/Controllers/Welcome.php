<?php

class Welcome extends Controller
{
	public function index($name = 'Nasrul Fuad', $job = 'Frontend Developer')
	{
		$datas['title'] = 'QODR | Santri';
		$datas['santri'] = $this->model('santriModel')->getAllSantri();

		$this->view('layouts/header', $datas);
		$this->view('Welcome', $datas);
		$this->view('layouts/footer');
	}
}
