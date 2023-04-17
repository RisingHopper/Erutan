<?php
	global $db;
	//Local
	$dbHost = 'localhost';
	$dbName = 'db_name';
	$dbUser = 'root';
	$dbPassword = '';
		
	try {
		$db = new PDO("mysql:host=$dbHost;dbname=$dbName;charset=utf8", $dbUser, $dbPassword);
		$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	  } catch (PDOException $e) {
		echo 'Error al conectarse a la base de datos: ' . $e->getMessage();
		exit;
	  }


?>