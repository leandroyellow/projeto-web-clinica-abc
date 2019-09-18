<?php
    require_once('config.php');
    require_once('conexao.php');

    $select = "SELECT  id, nome FROM profissional WHERE especialidade = '".$_POST['especialidade']."' ORDER BY nome";
    $resultado = $conexao->query($select);

    foreach($resultado as $medicos){
        echo '<option value="'.$medicos['id'].'">'.$medicos['nome'].'</option>';
        //echo "<option value=" $medicos['id'] "  $_POST['medico'] == $medicos['id'] ? "selected='selected'" : "" > $medicos['nome']</option>";
    }
/*
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
    */
?>