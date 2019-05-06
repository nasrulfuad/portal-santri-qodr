<?php
 class santriModel
 {

 	private $table = 'santri';
 	private $db;

 	public function __construct()
 	{
 		$this->db = new Database;
 	}

 	public function getTotalRows($kolom)
 	{
 		$this->db->query("SELECT $kolom FROM santri WHERE status_santri='santri' ORDER BY nama ASC;");
 		return $this->db->resultSet();
 	}

 	public function getAllSantri($kolom, $offset)
 	{
 		$kolom = implode(',', $kolom);
 		$this->db->query("SELECT $kolom FROM $this->table WHERE status_santri= 'santri' ORDER BY nama ASC LIMIT 9 OFFSET $offset;");
 		return $this->db->resultSet();
 	}

 	public function searchSantri($kolom, $params, $offset)
 	{
 		$kolom = implode(',', $kolom);
 		$this->db->query("SELECT $kolom FROM santri WHERE status_santri='santri' AND nama LIKE :keyword ORDER BY nama ASC LIMIT 9 OFFSET $offset;");
 		$this->db->bind('keyword', "%$params%");
 		return $this->db->resultSet();
 	}
 }
