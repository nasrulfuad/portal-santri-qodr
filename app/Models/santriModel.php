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

 	public function getAllSantri()
 	{
 		$this->db->query('SELECT * FROM ' . $this->table . ' WHERE status=1;');
 		return $this->db->resultSet();
 	}
 }
