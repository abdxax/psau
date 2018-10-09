<?php

/**
* 
*/
class DbConnect 
{
	protected $pdo;
	function __construct()
	{
		try {
			$pdo=new PDO("mysql:host=localhost;dbname=psua","root","");
		} catch (Exception $e) {
			
		}
	}
}