<?php

class Alumni extends Controller
{
	public function index()
	{

		echo json_encode($this->model('alumniModel')->getAllAlumni());

		// $datas['title'] = 'QODR | Alumni';
		// $datas['alumni'] = $this->model('alumniModel')->getAllAlumni();
		// $datas['alumniLink'] = 'active';

		// $this->view('layouts/header', $datas);
		// $this->view('Alumni', $datas);
		// $this->view('layouts/footer');
	}
}
