<?php

class Santri extends Controller
{

	/*
	* Mengambil semua data santri
	*/
	public function index()
	{
		return $this->view('errors/404');
	}

	/*
	* Mengambil semua data santri
	*/
	public function get($offset = 0)
	{

		if ( is_numeric($offset) ) {
			echo json_encode($this->model('santriModel')->getAllSantri(['cabang_sekarang', 'panggilan', 'kota_asal', 'status_santri'], $offset));
		} else {
			header("HTTP/1.0 404 Not Found");
			return $this->view('errors/404');
		}
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
	public function searchRows($params = 0)
	{
		if ( !$params ) {
			header("HTTP/1.0 404 Not Found");
			return $this->view('errors/404');
		} else {
			echo count($this->model('santriModel')->getTotalRows('status_santri'));
		}
	}

	/*
	* Mengambil data berdasarkan nama yang user input
	* dan di limit 9 rows tiap halaman 
	*/
	public function search($params = NULL, $offset = 0)
	{
		if ( !$params ) {
			header("HTTP/1.0 404 Not Found");
			return $this->view('errors/404');
		} else if ( is_numeric($offset) ) {
			$prevOffset = $offset - 9;
			( ($prevOffset) < 0 ) ? $prevOffset = 0 : $prevOffset;
			$response = $this->model('santriModel')->searchSantri(['panggilan', 'cabang_sekarang', 'kota_asal', 'status_santri'], $params, $offset);
			$totalRow = $this->model('santriModel')->getCountRows("AND panggilan LIKE '%$params%'")[0]['total'];
			$nextOffset = $offset + 9;
			( ($nextOffset > ($totalRow + 9)) || (count($response) < 9) || ($totalRow <= 9)) ? $nextPage = '' : $nextPage = BASEURL . "/santri/search/$params/$nextOffset";
			( $offset != 0 ) ? $prevPage = BASEURL . "/santri/search/$params/$prevOffset" : $prevPage = ''; 
			echo ( !$response ) ?  header("HTTP/1.0 404 Not Found") :  json_encode([
				'data' => $response, 
				'totalRow' => $totalRow,
				'nextPage' => $nextPage,
				'prevPage' => $prevPage,
			], JSON_UNESCAPED_SLASHES);
		} else {
			echo 'offset harus berupa angka';
		}
	}
}
