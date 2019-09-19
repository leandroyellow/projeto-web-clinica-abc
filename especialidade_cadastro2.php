<?php


    require_once('config.php');
    require_once('conexao.php');

    
    $especialidade = $_POST['especialidade'];

    $sql = "SELECT * FROM especialidades WHERE especialidade = '$especialidade'";
    $resultado = $conexao->query($sql);

    $vars = "";
    if($resultado->num_rows > 0){
        
        $vars = "?msg=entrou";
    }
    else{
        $db->especialidades()->insert(array('especialidade'=>$especialidade));
    }
    header("location: especialidade_cadastro.php$vars");
    

?>

