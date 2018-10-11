<?php
require "connection.php";

/**
* 
*/
class DB extends  DBconnection
{
	private $pdo;
	function __construct()
	{ 
		
	
		try {
				parent::__construct();
	//	$this->pdo=new PDO("mysql:host=localhost;dbname=psua","root","") or die("errror");
				$this->pdo=$this->db;
		} catch (Exception $e) {
			
		}
		
	}
    
    public function getAlluser(){
    	$d=$this->pdo->prepare("SELECT * FROM info");
    	$s=$d->execute();
    	return $d;
        
    }

    public function addUser($name,$phone,$email,$gender,$job,$creat){
    	$sql=$d=$this->pdo->prepare("INSERT INTO user (email,pass,role,status,create_at)VALUES(?,?,?,?,?)";
    		if ($sql->execute(array($email,"12345", 2,"new",$creat))) {
    			# code...
    		}
    }
	
}

