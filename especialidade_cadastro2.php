<?php


    require_once('config.php');
    require_once('conexao.php');

    
    $especialidade = $_POST['especialidade'];

    
    
    $db->especialidades()->insert(array('especialidade'=>$especialidade));

        
    header("location: especialidade_cadastro.php");

?>

