<?php 
/**
* 
*/
class DBconnection
{
	protected $db;
	function __construct()
	{
		try {
			$this->db=new PDO("mysql:host=localhost;dbname=psua","root","") ;
					$this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
					//$this->db=new PDO("mysql:host=localhost;dbname=psua","root","") or die("errror");
		} catch (Exception $e) {
			
		}

	}

	public function getDb(){
			$d=$this->db->prepare("SELECT * FROM user");
    	$s=$d->execute();
    	foreach ($d as $key ) {
    		echo $key['email'];
    	}
	}
}

