<?php
 class alumniModel
 {

 	private $table = 'santri';
 	private $db;

 	public function __construct()
 	{
 		$this->db = new Database;
 	}

 	public function getAlumni()
 	{
 		return $this->alumni;
 	}

 	public function getAllAlumni()
 	{
 		$this->db->query('SELECT * FROM ' . $this->table);
 		return $this->db->resultSet();
 	}
 }
