<?php 

    session_start();

    require('conexao.php');

    // Verifica se houve POST e se o usuário ou a senha é(são) vazio(s)
    if (!empty($_POST) AND (empty($_POST['email']) OR empty($_POST['senha']))) {
        header("Location: index.php"); 
        exit();
    }

    $email = mysqli_real_escape_string($conexao, $_POST['email']);
    $senha = mysqli_real_escape_string($conexao, $_POST['senha']);

    $sql = "SELECT * FROM usuario WHERE email =  '$email'  AND senha =  '$senha'" ;

    $resultado = $conexao->query($sql);

    

    if($resultado->num_rows > 0){
        $row = mysqli_fetch_assoc($resultado);
    
        if($row['tipo'] == 1){
            $_SESSION['email'] = $email;
            $_SESSION['senha'] = $senha;
            $_SESSION['id'] = $row['id'];
            $_SESSION['tipo'] = $row['tipo'];
            header('Location: clinica.php'); 
        }
        elseif($row['tipo'] == 2){
            $_SESSION['email'] = $email;
            $_SESSION['senha'] = $senha;
            $_SESSION['id'] = $row['id'];
            $_SESSION['tipo'] = $row['tipo'];
            header('Location: medico.php'); 
        }
        elseif($row['tipo'] == 3 ){
            $_SESSION['email'] = $email;
            $_SESSION['senha'] = $senha;
            $_SESSION['id'] = $row['id'];
            $_SESSION['tipo'] = $row['tipo'];
            header('location:site.php');
            
        }
        
    
    }
    else{
        unset ($_SESSION['email']);
        unset ($_SESSION['senha']);
        unset ($_SESSION['id']);
        
        ?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://fonts.googleapis.com/css?family=Crimson+Text&display=swap" rel="stylesheet"> 
    
    <link rel="stylesheet" href="css/estilo.css">
    <link rel="stylesheet" href="css/all.css">
    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>Clínica ABC</title>
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-light fixed-top">
            <div class="container">
                <a class="navbar-brand" href="index.php"><img src="imagens/logopq2.png" alt=""> <span class="ml-2">Clínica ABC</span></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                    <div class="navbar-nav ml-auto">
                        <a class="nav-item nav-link active" href="index.php">Home <span class="sr-only">(current)</span></a>
                        <a class="nav-item nav-link" href="#planos">Planos</a>
                        <a class="nav-item nav-link" href="#contato">Contato</a>
                        <a class="nav-item nav-link" href="login.php">Entrar</a>
                    </div>
                </div>
            </div>
        </nav>
    </header>
    <div class="cor">
        <div class="container text-center">
            <img class="erro img-fluid" src="imagens/erro.png" alt="">
            <h1 class="sucesso">Senha inválida</h1>
            <a href="index.php" class="btn" id="botao">Voltar</a>
            <a href="login.php" class="btn" id="botao">Tentar novamente</a>
        </div>
    </div>



<?php include("footer.php");
    }

   
    
?>

