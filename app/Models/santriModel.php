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
 		$this->db->query("SELECT $kolom FROM santri WHERE status_santri='santri';");
 		return $this->db->resultSet();
 	}

 	public function getAllSantri($kolom, $offset)
 	{
 		$kolom = implode(',', $kolom);
 		$this->db->query("SELECT $kolom FROM $this->table WHERE status_santri= 'santri' LIMIT 9 OFFSET $offset;");
 		return $this->db->resultSet();
 	}
 }
