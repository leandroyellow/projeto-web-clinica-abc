<?php 
include_once ("conexao.php");

if(isset($_POST['id'])&&isset($_POST['especialidade'])){
    $id = $_POST['id'];
    $especialidade = $_POST['especialidade'];

    $sql = "UPDATE especialidades SET especialidade = '$especialidade' WHERE id = $id";
    $resultado = $conexao->query($sql);
    if($resultado == true){
        header('location: especialidade_cadastro.php');
    }
    else{
        echo "erro";
    }
}

?>