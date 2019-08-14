<?php


    require_once('config.php');


    

    if(isset($_POST['email']) && isset($_POST['senha']) && isset($_POST['tipo']) && isset($_POST['nome']) && isset($_POST['celular']) && isset($_POST['registro']) && isset($_POST['especialidade'])) {
        $email = $_POST['email'];
        $senha = $_POST['senha'];
        $tipo = $_POST['tipo'];
        $usuario = $db->usuario()->insert(array('email'=>$email, 'senha'=>$senha, 'tipo'=>$tipo));
        
        $nome = $_POST['nome'];
        $celular = $_POST['celular'];
        $registro = $_POST['registro'];
        $especialidade = $_POST['especialidade'];
        $db->profissional()->insert(array('nome'=>$nome, 'celular'=>$celular, 'registro'=>$registro, 'especialidade'=>$especialidade, 'login_id'=>$usuario));
        header("location: clinica.php");
    }


?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/estilo.css">
    <link rel="stylesheet" href="css/all.css">
    <link href="https://fonts.googleapis.com/css?family=Crimson+Text&display=swap" rel="stylesheet"> 
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>Document</title>
</head>
<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-light fixed-top">
            <div class="container">
                <a class="navbar-brand" href="#"><img src="imagens/logopq2.png" alt=""> <span class="ml-2">Clinica ABC</span></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                    <div class="navbar-nav ml-auto">
                        <a class="nav-item nav-link active" href="#">Home <span class="sr-only">(current)</span></a>
                        <a class="nav-item nav-link" href="#">Planos</a>
                        <a class="nav-item nav-link" href="#">Contato</a>
                        <a class="nav-item nav-link" href="cadastro.php">Cadastro</a>
                    </div>
                </div>
            </div>
        </nav>
    </header>

    <div class="cor">
        <div class="container">
            <form class="formulario"  method="post">
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="campoNome">Nome</label>
                        <input type="text" class="form-control" id="campoNome" name="nome" placeholder="Digite seu nome completo">
                    </div>

                    <div class="form-group col-md-6">
                        <label for="campoCelular">Celular</label>
                        <input type="number" class="form-control" id="campoCelular" name="celular" placeholder="Digite seu celular">
                    </div>

                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="campoEspecialidade">Especialidade</label>
                        <input type="text" class="form-control" id="campoEspecialidade" name="especialidade" placeholder="Digite sua especialidade">
                    </div>

                    <div class="form-group col-md-6">
                        <label for="campoRegistro">Registro</label>
                        <input type="number" class="form-control" id="campoRegistro" name="registro" placeholder="Digite seu Registro ou CPF">
                    </div>

                </div>


                <div id="rigth">
                    <button type="submit" id="botao" class="btn">Cadastrar</button>
                </div>
                
            </form>
        </div>
    </div>











    <footer>
        <div class="container">
            <div class="row">
                <div class="col-sm-4 text center footer">
                    <h3 class="sobre">Sobre Nós</h3>
                    <p class="sobre">Nossa clínica criada para atender as necessidades específicas na área de saúde, com soluções inovadoras, práticas e ofertando o melhor custo/benefício do mercado para nossos clientes.</p>
                </div>
                <div class="col-sm-4 text center footer">
                    <h3>Clínica ABC</h3>
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1467.8128232850986!2d-47.89236099469048!3d-22.02446608013968!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94b87722afe006bb%3A0x4a8b254e7543696!2sSenac+S%C3%A3o+Carlos!5e0!3m2!1spt-BR!2sbr!4v1565271751253!5m2!1spt-BR!2sbr" width="100%" height="auto" frameborder="0" style="border:0" allowfullscreen></iframe>
                </div>
                <div class="col-sm-4 text center footer"><h3>Endereço</h3>
                    <p class="endereco"> R. Episcopal, 700 </p>
                    <p class="endereco">Centro</p>
                    <p class="endereco">São Carlos</p>
                    <p class="endereco">CEP: 13560-570</p>
                    <p class="endereco">Telefone: (16) 2107-1055</p>
                </div>
            </div>
            <div class="row icone">
                <a href="https://www.facebook.com/senacsaopaulo" target="_blank"><span><i class="fab fa-facebook rede"></i></span></a>
                <a href="https://twitter.com/intent/follow?source=followbutton&variant=1.0&screen_name=senacsaopaulo" target="_blank"><span><i class="fab fa-twitter-square rede"></i></span></a>
                <a href="https://www.instagram.com/senacsaopaulo/" target="_blank"><span><i class="fab fa-instagram rede"></i></span></a>
            </div>
        </div>
    </footer>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>