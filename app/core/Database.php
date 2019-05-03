<?php

class Database
{
	private $host = HOST;
	private $wonge = WONGE;
	private $gembok = GEMBOKE;
	private $jenegeAreke = JENENGE_AREKE;

	private $dbh;
	private $stmt;

 	public function __construct()
 	{
 		//data soure name
 		$dsn = "mysql:host=$this->host;dbname=$this->jenegeAreke";

 		$option = [
 			PDO::ATTR_PERSISTENT => true,
 			PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
 		];

 		try {
 			$this->dbh = new PDO($dsn, $this->wonge, $this->gembok, $option);
 		} catch(PDOException $error) {
 			die($error->getMessage());
 		}

 	}

 	public function query($query)
 	{
 		$this->stmt = $this->dbh->prepare($query);
 	}

 	public function bind($param, $value, $type = null)
 	{
 		if ( is_null($type) ) {
 			switch ( true ) {
 				case is_int( $value ):
 					$type = PDO::PARAM_INT;
 					break;

 				case is_bool( $value ):
 					$type = PDO::PARAM_BOOL;
 					break;

 				case is_null( $value ):
 					$type = PDO::PARAM_NULL;
 					break;

 				default:
 					$type = PDO::PARAM_STR;
 			}
 		}

 		$this->stmt->bindValue($param, $value, $type);

 	}

 	public function execute()
 	{
 		$this->stmt->execute();
 	}

 	public function resultSet()
 	{
 		$this->execute();
 		return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
 	}

 	public function single()
 	{
 		$this->execute();
 		return $this->stmt->fetch(PDO::FETCH_ASSOC);
 	}

}










