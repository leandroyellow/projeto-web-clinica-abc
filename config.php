<?php 
	
	include_once "NotORM.php";

	$pdo = new PDO("mysql:host=localhost;dbname=clinica-abc", "root", "");
	$db = new NotORM($pdo);

 ?>