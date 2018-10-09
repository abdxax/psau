<?php 
/**
* 
*/
class DBconnection
{
	protected $db;
	function __construct($db,$user,$pass)
	{
		$this->$db=new PDO("mysql:host=localhost;dbname=".$db."",$user,$pass) or die("errror");
		
	}

	public function getDb(){
		return $this->db;
	}
}

