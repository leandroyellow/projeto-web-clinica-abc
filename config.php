<?php 
	
	include_once "NotORM.php";

	$pdo = new PDO("mysql:host=localhost;dbname=clinica-abc", "leandro", "mysqlolivia29");
	$db = new NotORM($pdo);

 ?>