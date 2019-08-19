<?php


    require_once('config.php');


    

    if(isset($_POST['email']) && isset($_POST['senha']) && isset($_POST['nome']) && isset($_POST['cpf']) && isset($_POST['sexo']) && isset($_POST['nascimento']) && isset($_POST['telefone']) && isset($_POST['celular']) && isset($_POST['endereco']) && isset($_POST['numero']) && isset($_POST['bairro']) && isset($_POST['cidade']) && isset($_POST['estado']) && isset($_POST['cep'])) {
        $email = $_POST['email'];
        $senha = $_POST['senha'];
        $tipo = "3";
        $usuario = $db->usuario()->insert(array('email'=>$email, 'senha'=>$senha, 'tipo'=>$tipo));
        
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
        
        $db->paciente()->insert(array('nome'=>$nome, 'cpf'=>$cpf, 'sexo'=>$sexo, 'nascimento'=>$nascimento, 'telefone'=>$telefone, 'celular'=>$celular, 'endereco'=>$endereco, 'numero'=>$numero, 'bairro'=>$bairro, 'cidade'=>$cidade, 'estado'=>$estado, 'cep'=>$cep, 'usuario_id'=>$usuario ));
        header("location: index.php");
    }


?>