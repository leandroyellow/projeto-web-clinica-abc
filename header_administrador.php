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
                <a class="navbar-brand" href="clinica.php"><img src="imagens/logopq2.png" alt=""> <span class="ml-2">Clínica ABC</span></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                    <div class="navbar-nav ml-auto">
                        <a class="nav-item nav-link active" href="clinica.php">Home <span class="sr-only">(current)</span></a>
                        <a class="nav-item nav-link" href="listar_cadastro.php">Cadastros</a>
                        <a class="nav-item nav-link" href="paciente_cadastro_clinica.php">Cadastro do paciente</a>
                        <a class="nav-item nav-link" href="profissional_cadastro.php">Cadastro do profissional</a>
                        <div class="dropdown">
                            <a class="nav-item nav-link dropdown-toggle" href="#" id="submenu" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo $nome; ?></a>
                            <div class="dropdown-menu" aria-labelledby="submenu">
                                <a class="dropdown-item" href="minha_conta.php">Minha conta</a>
                                <a class="dropdown-item" href="muda_senha.php">Redefinir senha</a>
                                <a class="dropdown-item" href="logout.php">Sair</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </nav>
    </header>

