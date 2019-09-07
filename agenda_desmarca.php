<?php

require_once('config.php');
require_once('conexao.php');



if (isset($_GET['paciente'])&&isset($_GET['medico'])&&isset($_GET['dia'])&&isset($_GET['hora'])&&isset($_GET['id'])) {
    $paciente = $_GET['paciente'];
    $medico = $_GET['medico'];
    $dia = $_GET['dia'];
    $hora = $_GET['hora'];
    $especialidade = $_GET['especialidade'];
    $id = $_GET['id'];
    $timestamp = date('Y-m-d',  strtotime(str_replace("/", "-", $dia))); 
     
    
    
$sql = "DELETE FROM agenda WHERE agenda.id = $id";
echo $sql;
	if ($conexao->query($sql) == true ) {
        echo "Dado inserido com sucesso";
        header("Location: clinica.php?especialidade=$especialidade&medico=$medico&paciente=$paciente&dia=$dia"  );
echo $especialidade;
        
	}
	else{
		echo "Erro " . $conexao->error;
	}

	$conexao->close();

}




?>