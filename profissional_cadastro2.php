<?php


    require_once('config.php');
    require_once('conexao.php');

    $email = $_POST['email'];
    $senha = $_POST['senha'];
    $tipo = $_POST['tipo'];
    $nome = $_POST['name'];
    $nomeProfissional = $_POST['nome'];
    $celular = $_POST['celular'];
    $registro = $_POST['registro'];
    $especialidade = $_POST['especialidade'];

    

    $sqlEmail = "SELECT email FROM usuario WHERE email = '$email'";
    $resultadoEmail = $conexao->query($sqlEmail);


    $sql = "SELECT registro FROM profissional WHERE registro = $registro";
    $resultado = $conexao->query($sql);

    if($resultado->num_rows > 0 || $resultadoEmail->num_rows > 0){

        include("header_administrador.php"); ?>

            <div class="cor">
                <div class="container text-center cadastro">
                    <img src="imagens/aviso.png" alt="">
                    <h1 class="sucesso">Profissional já cadastrado</h1>
                    <a href="clinica.php" class="btn" id="botao">Voltar</a>
                    <a href="profissional_cadastro.php" class="btn" id="botao">Cadastrar outro profissional</a>
                </div>
            </div>



            <?php include("footer.php"); 

    }
    else{

        if(isset($_POST['email']) && isset($_POST['senha']) && isset($_POST['tipo']) && isset($_POST['nome']) && isset($_POST['celular']) && isset($_POST['registro']) && isset($_POST['especialidade']) && isset($_FILES['arquivo'])) {
            $extensao = strtolower(substr($_FILES['arquivo']['name'], -4)); //pega a extensao do arquivo
            $novo_nome = md5(time()) . $extensao; //define o nome do arquivo
            $diretorio = "upload/"; //define o diretorio para onde enviaremos o arquivo
            move_uploaded_file($_FILES['arquivo']['tmp_name'], $diretorio.$novo_nome); //efetua o upload
            
            $usuario = $db->usuario()->insert(array('email'=>$email, 'senha'=>sha1($senha), 'tipo'=>$tipo));
                
                
            $db->profissional()->insert(array('nome'=>$nomeProfissional, 'celular'=>$celular, 'registro'=>$registro, 'especialidade'=>$especialidade, 'usuario_id'=>$usuario, 'arquivo'=>$novo_nome));

            include("header_administrador.php"); ?>

            <div class="cor">
                <div class="container text-center cadastro">
                    <img class="cadastro" src="imagens/cadastro.png" alt="">
                    <h1 class="sucesso">Cadastro realizado com sucesso</h1>
                    <a href="clinica.php" class="btn" id="botao">Voltar</a>
                    <a href="profissional_cadastro.php" class="btn" id="botao">Cadastrar outro profissional</a>
                </div>
            </div>



            <?php include("footer.php"); 
                
            
        }
        else {
            
            echo "Não cadastrou";

        }
    }
        


?>

