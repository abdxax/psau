<?php
require "connection.php";

/**
* 
*/
class DB 
{
	private $pdo;
	function __construct()
	{ 
		$connection=new DBconnection("psua","root","");

		//parent::__construct("psua","root","");
		//$this->pdo=new PDO("mysql:host=localhost;dbname=psua","root","") or die("errror");
		$this->pdo=$connection->getDb();

	}
    
    public function getAlluser(){
    	$d=$this->pdo->prepare("SELECT * FROM info");
    	$d->execute();
    	return $d;
        
    }
	
}

$d=new DB();
print_r($d->getAlluser());