<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="stylesheet" href="css/estilo.css">
    <link rel="stylesheet" href="css/all.css">
    <link href="https://fonts.googleapis.com/css?family=Crimson+Text&display=swap" rel="stylesheet"> 
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Clínica ABC</title>
</head>
<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-light container">
            <a class="navbar-brand" href="#"><img src="imagens/logopq2.png" alt=""> <span class="ml-2">Clinica ABC</span></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav ml-auto">
                    <a class="nav-item nav-link active" href="#">Home <span class="sr-only">(current)</span></a>
                    <a class="nav-item nav-link" href="#">Planos</a>
                    <a class="nav-item nav-link" href="#">Contato</a>
                    <a class="nav-item nav-link" href="#">Entrar</a>
                </div>
            </div>
        </nav>
    </header>

    <section class="agenda">
        <div class="overlay"></div><!--overlay-->
        <div class="center">
            <form>
                <h2>Agende sua consulta online</h2>
                <input type="email" name="email" require>
                <input type="submit" name="acao" value="Agendar">
            </form>
        </div><!--center-->
    </section><!--agenda-->

    <section class="servicos-container">
        <div class="container">
            <h2 class="servicos">Serviços Oferecidos</h2>
            <div class="row">
                <div class="col-4 text-center icone"><i class="fas fa-user-md"></i><br>Médicos especializados</div>
                <div class="col-4 text-center icone"><i class="fas fa-ambulance"></i><br>Serviço leva e traz</div>
                <div class="col-4 text-center icone"><i class="fas fa-book-medical"></i><br>Agendamento online</div>
            </div>
            <div class="row">
                <div class="col-4 text-center icone"><i class="fas fa-briefcase-medical"></i><br>Serviço de urgência e emergência </div>
                <div class="col-4 text-center icone"><i class="fab fa-accessible-icon"></i><br>Acessibilidade</div>
                <div class="col-4 text-center icone"><i class="fas fa-user-nurse"></i><br>Enfermagem a domicílio</div>
            </div>
        </div>
    </section><!--servicos-container-->

    <section class="quem-somos">
        
    </section><!--quem_somos-->

    <section class="medicos-container">
        <div class="center">
            <h2 class="equipe">Equipe Médica</h2>
            <div class="row">
                <div class="col-4 text center medicos"><img class="img-medico img-fluid" src="imagens/medico1.png"><h3 class="nome">Dr. Grey</h3><p class="esp">Cardiologista</p></div>
                <div class="col-4 text center medicos"><img class="img-medico img-fluid" src="imagens/medico2.png"><h3 class="nome">Dra.2</h3><p class="esp">Pediatra</p></div>
                <div class="col-4 text center medicos"><img class="img-medico img-fluid" src="imagens/medico3.png"><h3 class="nome">Dr.3</h3><p class="esp">Neurologista</p></div>
            </div>
        </div>
    </section>
    
    
    <footer>

    <div class="center">
            <div class="row">
                <div class="col-4 text center footer"><h3 class="sobre">Sobre Nós</h3><p class="sobre">ddddd</p></div>
                <div class="col-4 text center footer">d</div>
                <div class="col-4 text center footer">dd</div>
            </div>
        </div>
        
        <div class="sobre">
            <div class="logo">logo</div>
            <p class="telefone"><i class="fas fa-phone-square"></i>(16) 3454-3456</p>
            <p class="email"><i class="fas fa-envelope-square"></i>clinicaabc@abc.com.br</p>
            <h3><i class="fab fa-facebook"></i></h3>
            <h3><i class="fab fa-twitter-square"></i></h3>
            <h3><i class="fab fa-instagram"></i></h3>
        </div><!--sobre-->
        <div class="facebook">
            <h3>Convênios</h3>
            <h3>icone1</h3>
            <h3>icone2</h3>
            <h3>icone3</h3>
            <h3>icone4</h3>
        </div><!--facebook-->
        <div class="endereco">
            <h3>Endereço</h3>
            <p class="endereco">Rua rua numero 1</p>
            <p class="endereco">Bairro vila</p>
            <p class="endereco">Cidade São Carlos</p>
            <p class="endereco">CEP 12344-456</p>
        </div><!--endereco-->
        <div class="fale-conosco">
            fale conosco
        </div><!--face-conosco-->
        
    </footer>
</body>
</html>