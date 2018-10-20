<?php
//session_start();
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
					$_SESSION['email']=$key['email'];
					header("localhost:createpass.php");
					
				}
				else if($key['status']=="active"){
					if($key['role']==1){
						$_SESSION['email']=$key['email'];
						$_SESSION['pass']=$key['pass'];
						header("location:admin/index.php");

					}
					else{
						$_SESSION['email']=$key['email'];
						$_SESSION['pass']=$key['pass'];
						$_SESSION['ge']=$key['gender'];
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

	public function getAllPatien(){
		$pat=$this->pdo->prepare("SELECT * FROM patien");
		$pat->execute();
		return $pat;
	}

	public function getPatien($file){
		$pat=$this->pdo->prepare("SELECT * FROM patien WHERE file_on=?");
		$pat->execute(array($file));
		return $pat;
	}

	public function getPatienHostroy($file){
		$pat=$this->pdo->prepare("SELECT * FROM history LEFT JOIN info ON history.email_emp=info.email WHERE history.file_on=?");
		$pat->execute(array($file));
		return $pat;
	}

	public function getemplo($eml){
		$pat=$this->pdo->prepare("SELECT * FROM info WHERE file_on=?");
		$pat->execute(array($eml));
		return $pat;
	}

	public function getpathen($eml){
		$pat=$this->pdo->prepare("SELECT * FROM history Right JOIN info ON history.email_emp=info.email WHERE info.email=?");
		$pat->execute(array($eml));
		return $pat;
	}

	public function getNmaePatien($file){
		$pat=$this->pdo->prepare("SELECT name FROM patien WHERE file_on=?");
		$pat->execute(array($file));
		$s='';
		foreach ($pat as $key ) {
			$s=$key['name'];
		}
		return $s;
	}

	public function getNmaeemplo($eml){
		$pat=$this->pdo->prepare("SELECT name FROM info WHERE email=?");
		$pat->execute(array($eml));
		$s='';
		foreach ($pat as $key ) {
			$s=$key['name'];
		}
		return $s;
	}

	public function addPate($name,$file,$age,$country,$gender,$fil,$date){
	   $pat=$this->pdo->prepare("INSERT INTO patien(name,file_on,Nation,age,gender,fil,create_at) VALUES(?,?,?,?,?,?,?)");
		if ($pat->execute(array($name,$file,$age,$country,$gender,$fil,$date))) {
			header("location:index.php");
		}

	}

	public function addappoyt($fil,$date,$crea){
		 $pat=$this->pdo->prepare("INSERT INTO appointment(file_on,appo_at,status,createat) VALUES(?,?,?,?)");
		if ($pat->execute(array($fil,$date,"new",$crea))) {
			header("location:index.php");
		}
	}

	public function allPatienSame($day){
		$gen=$_SESSION['ge'];
		$sql=$this->pdo->prepare("SELECT * FROM appointment LEFT JOIN patien ON appointment.file_on=patien.file_on where appointment.appo_at=? AND appointment.status=? AND appointment.gender=?");
		if($sql->execute(array($day,"new",$gen))){
			return $sql;

		}
		else{
			return "Not petion ";
		}
	}

	public function addhos($file,$email,$dig,$plan,$recom,$note,$crea){
		 $pat=$this->pdo->prepare("INSERT INTO history(file_on,email_emp,diagnosis,plan,recomand,note,create_at) VALUES(?,?,?,?,?,?,?)");
		if ($pat->execute(array($file,$email,$dig,$plan,$recom,$note,$crea))) {
			$stu=$this->pdo->prepare("UPDATE appointment SET status=? WHERE file_on=?");
			if ($stu->execute(array("Done",$file))) {
				header("location:index.php");
			}

			
		}
	}
}

