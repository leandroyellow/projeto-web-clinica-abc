<?php 
    require_once('conexao.php');

    if(isset($_GET['id'])){
        $id = $_GET['id'];

        $deletarEspecialidade = "DELETE FROM especialidades WHERE id = $id";
        $delete = mysqli_query($conexao, $deletarEspecialidade);

        if($delete == true ){
            header("location: especialidade_cadastro.php");
        }

        echo "não pode ser apagado esta especialidade pois está sendo usada";

       

        
    }

?>