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
    	$sql=$this->pdo->prepare("INSERT INTO user(email,pass,role,status,create_at)VALUES(?,?,?,?,?)");
    		if ($sql->execute(array($email,"12345",2,"new",$creat))) {
    			$info=$this->pdo->prepare("INSERT INTO info(email,name,phone,job,gender,create_at)VALUES(?,?,?,?,?,?)");
    			if ($info->execute(array($email,$name,$phone,$job,$gender,$creat))) {
    				header("location:employee.php");
    			    			}
    		}
    }
	
	public function login($user,$pass){
		$log=$this->pdo->prepare("SELECT * FROM user WHERE email=? AND pass=?");
		$log->execute(array($user,$pass));
		if($log->rowCount()==1){
			foreach ($log as $key ) {
				if($key['status']=="new"){
					header("localhost:createpass.php");
					
				}
				else if($key['status']=="active"){
					if($key['role']==1){
						header("location:admin/index.php");

					}
					else{
						header("location:stafe/index.php");
						//echo "2";
					}
				}
			}
		}
		else{
			header("location:login.php?msg=false");
			//echo "ERROR";

		}
	}
}

