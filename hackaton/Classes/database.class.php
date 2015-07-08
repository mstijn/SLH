<?php

/**
* Database Class
* MijnLucas - Broodjes configurator
*/

require('../Config/database.conf.php');

class database
{

	public function __construct()
	{
		global $strHostname, $strDatabasename, $strUsername, $strPassword;
		$this->createCon($strHostname, $strDatabasename, $strUsername, $strPassword);
	}

	private function createCon($strHostname, $strDatabasename, $strUsername, $strPassword)
	{
		$this->objPdo = new PDO('mysql:host=' . $strHostname . ';dbname=' . $strDatabasename, $strUsername, $strPassword);
	}

	public function getBroodjes()
	{
		$strSql = 'SELECT * 
				   FROM broodjes';
			   
		$objStmt = $this->objPdo->prepare($strSql);
		$objStmt->execute();
		
		$objResult = $objStmt->fetch('PDO::FETCH_OBJ');
		
		return $objResult;
	}
}

?>