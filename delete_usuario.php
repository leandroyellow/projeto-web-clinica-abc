<?php 
    require_once('conexao.php');

    if(isset($_GET['id'])){
        $id = $_GET['id'];

        $deletarProfissional = "DELETE FROM profissional WHERE usuario_id = $id";
        $profissional = mysqli_query($conexao, $deletarProfissional);

        $deletarPaciente = "DELETE FROM paciente WHERE usuario_id = $id";
        $paciente = mysqli_query($conexao, $deletarPaciente);

        $deletar = "DELETE FROM usuario WHERE id = $id";
        $sql = mysqli_query($conexao, $deletar);

        header("location: listar_cadastro.php");
    }

?>