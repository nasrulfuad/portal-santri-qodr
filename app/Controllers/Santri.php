<?php

class Santri extends Controller
{
	public function index($limit = 9,$offset = 0)
	{
		echo json_encode($this->model('santriModel')->getAllSantri(['nama', 'cabang_sekarang', 'kota_asal', 'status_santri'], $limit, $offset));
	}

	public function rows()
	{
		echo count($this->model('santriModel')->getTotalRows('status_santri'));
	}
}
