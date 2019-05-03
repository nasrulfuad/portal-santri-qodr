<?php
 class alumniModel
 {

 	private $dbh; //database ahndler
 	private $stmt;

 	public function __construct()
 	{
 		//data soure name
 		$dsn = 'mysql:host=localhost;dbname=portal_qodr';

 		try {
 			$this->dbh = new PDO($dsn, 'root', '`');
 		} catch(PDOException $error) {
 			die($error->getMessage());
 		}

 	}

 	public function getAlumni()
 	{
 		return $this->alumni;
 	}

 	public function getAllAlumni()
 	{
 		$this->stmt = $this->dbh->prepare('SELECT * FROM santri WHERE status = 2');
 		$this->stmt->execute();
 		return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
 	}
 }
