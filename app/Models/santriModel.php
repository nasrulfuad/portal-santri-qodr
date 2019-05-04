<?php
 class santriModel
 {

 	private $table = 'santri';
 	private $db;

 	public function __construct()
 	{
 		$this->db = new Database;
 	}

 	public function getSantri()
 	{
 		return $this->alumni;
 	}

 	public function getAllSantri($kolom, $offset)
 	{
 		$kolom = implode(',', $kolom);
 		$this->db->query("SELECT $kolom FROM $this->table WHERE status_santri= 'santri' LIMIT 9 OFFSET $offset;");
 		return $this->db->resultSet();
 	}
 }
