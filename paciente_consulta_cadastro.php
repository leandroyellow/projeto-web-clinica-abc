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
        header('Location: /paciente_cadastro_clinica.php');
        exit();
        
    }
   

        

    

    



include("header_paciente.php"); ?>

        <div class="cor">
            <div class="container text-center cadastro">
                <img class="cadastro" src="imagens/aviso.png" alt="">
                <h1 class="sucesso">Paciente já cadastrado!</h1>
                <a href="clinica.php" class="btn" id="botao">Voltar</a>
                <a href="paciente_cadastro_clinica.php" class="btn" id="botao">Fazer outro cadastro</a>
            </div>
        </div>

        <?php include("footer.php"); ?>
    