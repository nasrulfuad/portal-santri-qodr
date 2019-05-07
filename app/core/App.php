<?php 

class App 
{

	protected $controller = 'Welcome';
	protected $method = 'index';
	protected $params = [];

	public function __construct()
	{
		$url = $this->parseUrl();
		$url[0] = ucfirst($url[0]);

		if ( file_exists('../app/Controllers/'. $url[0] .'.php') ) {
			$this->controller = $url[0];
			unset($url[0]);
		}

		require_once '../app/Controllers/'. $this->controller .'.php';
		$this->controller = new $this->controller;

		/*
		* Cek Method
		*/

		if( isset($url[1]) ) {
			if ( method_exists($this->controller, $url[1]) ) {
				$this->method = $url[1];
				unset($url[1]);
			}
		}

		/*
		* Cek params, apabila params tidak kosong 
		* maka di inisialisasi sebagai property params
		*/
		( !empty($url) ) ? $this->params = array_values($url) : '';

		/*
		* Jalan controller dan method
		* serta kirimkan params apabila tidak kosong
		*/
		call_user_func_array([$this->controller, $this->method], $this->params);

	}

	/*
	* Parse url menjadi array
	*/
	public function parseUrl()
	{
		if ( isset($_GET['url'] ) )
		{
			$url = rtrim( $_GET['url'], '/' );
			$url = filter_var($url, FILTER_SANITIZE_URL);
			$url = explode('/', $url);
			return $url;
		}
	}
}
