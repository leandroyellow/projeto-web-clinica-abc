<?php
    $servername = "localhost";
    $database = "clinica-abc";
    $username = "leandro";
    $password = "  ";

    $conexao = mysqli_connect($servername, $username, $password, $database);

    if ($conexao->connect_error) {
		
		die("Falha ao conectar " . $conexao->connect_error);
	}
?>