<?php
    require_once('config.php');
    require_once('conexao.php');

    $categoria = $_REQUEST['especialidade'];

    $sql = "SELECT  id, nome FROM profissional WHERE especialidade = '$categoria' ORDER BY nome";
    $resultado = mysqli_query($conexao, $sql);

    while ($medico = mysqli_fetch_assoc ($resultado)){
        $medicos[] = array(
            'id'=>$medico['id']
            'nome'=>utf8_encode($medico['nome'])
        );
    }
    

    echo(json_encode($medicos));
?>