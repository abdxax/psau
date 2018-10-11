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
		parent:: __construct();
		$this->db=$this->pdo;
	}

	 public function getAlluser(){
    	$d=$this->db->prepare("SELECT * FROM info");
    	$s=$d->execute();
    	print_r($s);
        
    }
}

$d=new DB();
$d->getAlluser();