<?php
require "DB_Connect.php";
/**
* 
*/


class DB extends DbConnect
{
     private $db;
	function __construct()
	{
		$this->db=$this->pdo;
	}

	 public function getAlluser(){
    	$d=$this->pdo->prepare("SELECT * FROM info");
    	$s=$d->execute();
    	print_r($s);
        
    }
}

$d=new DB();
$d->getAlluser();