<?php
	$DB_host = "localhost";
	$DB_user = "root";
	$DB_pass = "";
	$DB_name = "bado";
	try
	{
  		$bdd = new PDO("mysql:host={$DB_host};dbname={$DB_name}",$DB_user,$DB_pass);
	}
	catch (Exception $e)
	{
 	 	die('Erreur : ' . $e->getMessage());
	}
?>