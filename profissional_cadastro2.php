<?php


    require_once('config.php');
    require_once('conexao.php');

    
    

    if(isset($_POST['email']) && isset($_POST['senha']) && isset($_POST['tipo']) && isset($_POST['nome']) && isset($_POST['celular']) && isset($_POST['registro']) && isset($_POST['especialidade'])) {
        $email = $_POST['email'];
        $senha = $_POST['senha'];
        $tipo = $_POST['tipo'];

        $nome = $_POST['nome'];
        $celular = $_POST['celular'];
        $registro = $_POST['registro'];
        $especialidade = $_POST['especialidade'];

        
        $sql = "SELECT COUNT(registro) AS existe FROM profissional WHERE registro = '$registro' LIMIT 1";
        $resultado = $conexao->query($sql);

        if($resultado->num_rows > 0){

        echo "$sql";


    

        }else{
            
            $usuario = $db->usuario()->insert(array('email'=>$email, 'senha'=>$senha, 'tipo'=>$tipo));
            
            
            $db->profissional()->insert(array('nome'=>$nome, 'celular'=>$celular, 'registro'=>$registro, 'especialidade'=>$especialidade, 'usuario_id'=>$usuario));

            // include("header_administrador.php"); ?>
<!--
            <div class="cor">
                <div class="container text-center cadastro">
                    <img class="cadastro" src="imagens/cadastro.png" alt="">
                    <h1 class="sucesso">Cadastro realizado com sucesso!</h1>
                    <a href="clinica.php" class="btn" id="botao">Voltar</a>
                    <a href="profissional_cadastro.php" class="btn" id="botao">Cadastrar outro profissional</a>
                </div>
            </div>

--> 

            <?php //include("footer.php"); 
            echo "cadastrou";
        }
    }
        


?>

