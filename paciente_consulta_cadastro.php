<?php
    require_once('config.php');
    require_once('conexao.php');

    $select = "SELECT  id, nome FROM paciente WHERE cpf = '".$_POST['cpf']."' ";
    $resultado = $conexao->query($select);

    if($resultado->num_rows > 0){

        foreach($resultado as $paciente){
            echo '<option value="'.$paciente['id'].'">'.$paciente['nome'].'</option>';
        }

    }
    else{
        echo 'teste';
        
    }

?>