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

 	public function getCountRows($conditions)
 	{
 		$conditions = $conditions ?? '';
 		$this->db->query("SELECT COUNT(*) AS total FROM santri WHERE status_santri='santri' $conditions;");
 		return $this->db->resultSet();
 	}

 	public function getAllSantri($kolom, $offset)
 	{
 		$kolom = implode(',', $kolom);
 		$this->db->query("SELECT $kolom FROM $this->table WHERE status_santri= 'santri' ORDER BY nama ASC LIMIT 24 OFFSET $offset;");
 		return $this->db->resultSet();
 	}

 	public function searchSantri($kolom, $params, $offset)
 	{
 		$kolom = implode(',', $kolom);
 		$this->db->query("SELECT $kolom FROM santri WHERE status_santri='santri' AND nama LIKE :keyword ORDER BY nama ASC LIMIT 24 OFFSET $offset;");
 		$this->db->bind('keyword', "%$params%");
 		return $this->db->resultSet();
 	}

 	public function getDetail($kolom, $uid)
 	{
 		$kolom = implode(',', $kolom);
 		$this->db->query("SELECT $kolom from santri WHERE uid= :uid;");
 		$this->db->bind('uid', "$uid");
 		return $this->db->resultSet();
 	}
 }
