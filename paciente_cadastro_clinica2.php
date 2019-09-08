<?php


    require_once('config.php');
    require_once('conexao.php');

    $email = $_POST['email'];
    $senha = $_POST['senha'];
    $tipo = "3";
    
    
    $nome = $_POST['nome'];
    $cpf = $_POST['cpf'];
    $sexo = $_POST['sexo'];
    $nascimento = $_POST['nascimento'];
    $telefone = $_POST['telefone'];
    $celular = $_POST['celular'];
    $endereco = $_POST['endereco'];
    $numero = $_POST['numero'];
    $bairro = $_POST['bairro'];
    $cidade = $_POST['cidade'];
    $estado = $_POST['estado'];
    $cep = $_POST['cep'];

    $sqlEmail = "SELECT email FROM usuario WHERE email = '$email'";
    $resultadoEmail = $conexao->query($sqlEmail);

    
    $sql = "SELECT cpf FROM paciente WHERE cpf = '$cpf'";
    $resultado = $conexao->query($sql);

    if($resultado->num_rows > 0 || $resultadoEmail->num_rows > 0){

        include("header_paciente.php"); ?>

        <div class="cor">
            <div class="container text-center cadastro">
                <img class="cadastro" src="imagens/aviso.png" alt="">
                <h1 class="sucesso">Paciente já cadastrado!</h1>
                <a href="clinica.php" class="btn" id="botao">Voltar</a>
                <a href="paciente_cadastro_clinica.php" class="btn" id="botao">Fazer outro cadastro</a>
            </div>
        </div>

        <?php include("footer.php"); 

    }
    else{

        if(isset($_POST['email']) && isset($_POST['senha']) && isset($_POST['nome']) && isset($_POST['cpf']) && isset($_POST['sexo']) && isset($_POST['nascimento']) && isset($_POST['telefone']) && isset($_POST['celular']) && isset($_POST['endereco']) && isset($_POST['numero']) && isset($_POST['bairro']) && isset($_POST['cidade']) && isset($_POST['estado']) && isset($_POST['cep'])) {
        
            $usuario = $db->usuario()->insert(array('email'=>$email, 'senha'=>$senha, 'tipo'=>$tipo));
        
            $db->paciente()->insert(array('nome'=>$nome, 'cpf'=>$cpf, 'sexo'=>$sexo, 'nascimento'=>$nascimento, 'telefone'=>$telefone, 'celular'=>$celular, 'endereco'=>$endereco, 'numero'=>$numero, 'bairro'=>$bairro, 'cidade'=>$cidade, 'estado'=>$estado, 'cep'=>$cep, 'usuario_id'=>$usuario ));
            

            include("header_paciente.php"); ?>

            <div class="cor">
                <div class="container text-center cadastro">
                    <img class="cadastro" src="imagens/cadastro.png" alt="">
                    <h1 class="sucesso">Cadastro realizado com sucesso!</h1>
                    <a href="clinica.php" class="btn" id="botao">Voltar</a>
                    <a href="paciente_cadastro_clinica.php" class="btn" id="botao">Fazer outro cadastro</a>
                </div>
            </div>

            <?php include("footer.php"); 
        }
        else{
            echo "error";
        }


    }

    


?>



