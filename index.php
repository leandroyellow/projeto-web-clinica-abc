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

    <title>Clínica ABC (Cadastro)</title>
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
                        <a class="nav-item nav-link" href="login.php">Entrar</a>
                    </div>
                </div>
            </div>
        </nav>
    </header>
    <section class="agenda">
        <div class="overlay"></div><!--overlay-->
        <div class="center">
            <form>
                <h2>Agende sua consulta online</h2>
                <div class="form-group">
                    <label for="exampleFormControlSelect1"></label>
                    <select class="form-control" id="exampleFormControlSelect1">
                        <option>Escolha uma especialidade</option>
                        <option>Clínico Geral</option>
                        <option>Giicologista</option>
                        <option>Pediatra</option>
                        <option>Nutricionista</option>
                        <option>Dentista</option>
                    </select>
                </div>
                <button type="button" class="btn btn-block">Agendar</button>
            </form>
        </div><!--center-->
    </section><!--agenda-->

    <section class="servicos-container">
        <div class="container">
            <h2 class="servicos">Serviços Oferecidos</h2>
            <div class="row">
                <div class="col-sm-4 text-center icone"><i class="fas fa-user-md"></i><br>Médicos especializados</div>
                <div class="col-sm-4 text-center icone"><i class="fas fa-ambulance"></i><br>Serviço leva e traz</div>
                <div class="col-sm-4 text-center icone"><i class="fas fa-book-medical"></i><br>Agendamento online</div>
            </div>
            <div class="row">
                <div class="col-sm-4 text-center icone"><i class="fas fa-briefcase-medical"></i><br>Serviço de urgência e emergência </div>
                <div class="col-sm-4 text-center icone"><i class="fab fa-accessible-icon"></i><br>Acessibilidade</div>
                <div class="col-sm-4 text-center icone"><i class="fas fa-user-nurse"></i><br>Enfermagem a domicílio</div>
            </div>
        </div>
    </section><!--servicos-container-->

    <section class="quem-somos">
        
    </section><!--quem_somos-->

    <section class="medicos-container">
        <div class="center">
            <h2 class="equipe">Equipe Médica</h2>
            <div class="row">
                <div class="col-sm-4 text center medicos"><img class="img-medico img-fluid" src="imagens/medico1.png"><h3 class="nome">Dr. Grey</h3><p class="esp">Cardiologista</p></div>
                <div class="col-sm-4 text center medicos"><img class="img-medico img-fluid" src="imagens/medico2.png"><h3 class="nome">Dra.2</h3><p class="esp">Pediatra</p></div>
                <div class="col-sm-4 text center medicos"><img class="img-medico img-fluid" src="imagens/medico3.png"><h3 class="nome">Dr.3</h3><p class="esp">Neurologista</p></div>
            </div>
        </div>
    </section>
    
    <section class="planos-container">
        <div class="container">
            <h2 class="planos">Nossos Planos</h2>
            <div class="row">
                <div class="col-sm-4 text center icone">
                    <i class="fas fa-users"></i><br>Familiar/Individual<br>
                    <p>A partir de R$ 79,90</p>
                    <button type="button" class="btn btn-success btn-md">Faça sua cotação</button>
                </div>
                <div class="col-sm-4 text center icone">
                    <i class="fas fa-building"></i><br>Empresarial<br>
                    <p>A partir de R$ 39,90</p>
                    <button type="button" class="btn btn-success btn-md">Faça sua cotação</button>
                </div>
                <div class="col-sm-4 text center icone">
                    <i class="fas fa-tooth"></i><br>Odontológicos<br>
                    <p>A partir de R$ 59,90</p>
                    <button type="button" class="btn btn-success btn-md">Faça sua cotação</button>
                </div>
            </div>
        </div>
    </section>

    <?php include("footer.php"); ?>