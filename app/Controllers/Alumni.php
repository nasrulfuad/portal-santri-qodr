<?php

class Alumni extends Controller
{
	public function index()
	{
		$datas['title'] = 'QODR | Alumni';
		$datas['alumni'] = $this->model('alumniModel')->getAllAlumni();

		$this->view('layouts/header', $datas);
		$this->view('Alumni', $datas);
		$this->view('layouts/footer');
	}
}
