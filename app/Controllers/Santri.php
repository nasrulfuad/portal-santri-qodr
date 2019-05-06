<?php

class Santri extends Controller
{
	/*
	* Mengambil semua data santri
	*/
	public function index($offset = 0)
	{
		echo json_encode($this->model('santriModel')->getAllSantri(['nama', 'cabang_sekarang', 'kota_asal', 'status_santri'], $offset));
	}

	/*
	* Menghitung total rows yang status santrinya adalah santri
	*/
	public function rows()
	{
		echo count($this->model('santriModel')->getTotalRows('status_santri'));
	}

	/*
	* Menghitung total row berdasarkan
	* parameter yang dicari
	*/
	public function searchRows($params)
	{
		echo count($this->model('santriModel')->getTotalRows('status_santri'));		
	}

	/*
	* Mengambil data berdasarkan nama yang user input
	* dan di limit 9 rows tiap halaman 
	*/
	public function search($params = '', $offset = 0)
	{
		if ( $params ) {
			$response = $this->model('santriModel')->searchSantri(['nama', 'cabang_sekarang', 'kota_asal', 'status_santri'], $params, $offset);
			echo ( !$response ) ?  header("HTTP/1.0 404 Not Found") :  json_encode($response);
		} else {
			header("HTTP/1.0 404 Not Found");
		}
	}
}
