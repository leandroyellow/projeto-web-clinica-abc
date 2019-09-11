<?php 
//BUSCANDO A CLASSE
require_once 'PHPMailer/Funcoes.class.php';
//ESTANCIANDO A CLASSE
$objFc = new Funcoes();
if(isset($_POST['btEnviar'])){
	$objFc->enviarEmail($_POST);
}
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
                <a class="navbar-brand" href="index.php"><img src="imagens/logopq2.png" alt=""> <span class="ml-2">Clinica ABC</span></a>
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
        <div class="container">
            <h2 class="text-center sucesso">Faça sua Cotação</h2>
            <form action="" method="post">
                <div class="form-group col-md-12">
                    <label for="campoEmail">Email:</label>
                    <input type="email" class="form-control" name="email" id="campoEmail" placeholder="Digite seu email" autocomplete="off" required>
                </div>
                <div class="form-group col-md-12">
                    <label for="campoDescricao">Descrição:</label>
                    <textarea class="form-control" id="campoDescricao" rows="5" name="descricao" required></textarea>
                </div>
                <div class="text-right form-group col-md-12">
                    <a href="index.php" id="botao" class="btn" >Voltar</a>
                    <button type="submit" class="btn" id="botao" name="btEnviar">Enviar</button>
                </div>
            </form>
        </div>
    </div>

<?php include("footer.php"); ?>