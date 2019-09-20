<?php 

require_once('config.php');
require_once('conexao.php');

$diretorio = "upload/";

$sql = "SELECT profissional.arquivo, profissional.nome, especialidades.especialidade FROM profissional INNER JOIN usuario ON usuario.id = profissional.usuario_id INNER JOIN especialidades ON especialidades.id = profissional.especialidade WHERE usuario.tipo = 2 ";
$consulta = $conexao->query($sql);
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
    <div class="parallax parallax1"></div>
    
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

    <div class="parallax parallax2 parallax-min"></div>
    <section class="quem-somos">
        <div class="container">
            <div class="teste">
                <h2 class="esp text-center">Especialidades</h2>
                <div id="carouselExampleFade" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">

                        <div class="carousel-item active">
                            <div class="text-center icone"><i class="far fa-eye"></i><br>Oftalmologia</div>
                        </div>
                        <div class="carousel-item">
                            <div class="text-center icone"><i class="fas fa-tooth"></i><br>Dentista</div>
                        </div>
                        <div class="carousel-item">
                            <div class="text-center icone"><i class="fas fa-heartbeat"></i><br>Cardiologia</div>
                        </div>
                        <div class="carousel-item">
                            <div class="text-center icone"><i class="fas fa-stethoscope"></i><br>Clínico Geral</div>
                        </div>
                        <div class="carousel-item">
                            <div class="text-center icone"><i class="fas fa-baby"></i><br>Pediatra</div>
                        </div>
                        <div class="carousel-item">
                            <div class="text-center icone"><i class="fas fa-apple-alt"></i><br>Nutricionista</div>
                        </div>
                        <div class="carousel-item">
                            <div class="text-center icone"><i class="fas fa-bone"></i><br>Ortopedia</div>
                        </div>
                        <div class="carousel-item">
                            <div class="text-center icone"><i class="fas fa-users"></i><br>Medicina de Família e Comunidade</div>
                        </div>
                        <div class="carousel-item">
                            <div class="text-center icone"><i class="fas fa-syringe"></i><br>Vacinas</div>
                        </div>
                        <div class="carousel-item">
                            <div class="text-center icone"><i class="fas fa-radiation"></i><br>Radiologia</div>
                        </div>
                        <div class="carousel-item">
                            <div class="text-center icone"><i class="fas fa-brain"></i><br>Neurologista</div>
                        </div>
                        <div class="carousel-item">
                            <div class="text-center icone"><i class="fas fa-procedures"></i><br>Internação</div>
                        </div>
                        <div class="carousel-item">
                            <div class="text-center icone"><i class="fas fa-female"></i><br>Ginecologista</div>
                        </div>
                        <div class="carousel-item">
                            <div class="text-center icone"><i class="fas fa-smile"></i><br>Dermatologia</div>
                        </div>
                        <div class="carousel-item">
                            <div class="text-center icone"><i class="fas fa-dna"></i><br>Exames</div>
                        </div>
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleFade" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleFade" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>
        </div>
    </section><!--quem_somos-->

    <div class="parallax parallax3 parallax-min"></div>
    <section class="medicos-container">
        <div class="container">
            <h2 class="equipe">Equipe Médica</h2>
            <div class="row">
                <div class="col-lg-12">
                    <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                        <div class="carousel-inner">
                            <?php 
                            $controle = 2;
                            $arr = array();

                            while($medico = $consulta->fetch_assoc()){
                                array_push($arr, $medico);
                            }
                            
                            $class = "";
                            for ($i = 0; $i < count($arr); $i = $i + 3){
                                if($controle == 2){ 
                                    $class = "active";
                                } else {
                                    $class = "";
                                } 
                            ?>
                            <div class="carousel-item <?= $class ?>">
                                <div class="row">
                                    <?php
                                    for ($u = 0; $u < 3; $u++){
                                        $arr_index = $i+$u;
                                        if (array_key_exists($arr_index, $arr)) {
                                    ?>

                                    <div class="col-sm-4 text center medicos"><img class="img-medico img-fluid" src="<?php echo $diretorio . $arr[$arr_index]["arquivo"] ?>" alt="1"><h3 class="nome"><?php echo "Dr(a). ". $arr[$arr_index]["nome"] ?></h3><p class="esp"><?php echo  $arr[$arr_index]["especialidade"]?></p></div>
                                    <?php
                                        }
                                    }
                                    ?>
                                </div>
                            </div>
                            <?php
                                $controle = 1;
                            }
                            ?>
                        </div>
                        <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                </div>
             </div>
        </div>
    </section>

    <div class="parallax parallax4 parallax-min"></div>
    <section class="planos-container">
        <a name="planos"></a>
        <div class="container">
            <h2 class="planos">Nossos Planos</h2>
            <div class="row">
                <div class="col-sm-4 text center icone">
                    <i class="fas fa-users"></i><br>Familiar/Individual<br>
                    <p>A partir de R$ 79,90</p>
                    <a href="cotacao.php" class="btn" id="botao">Faça sua cotação</a>
                </div>
                <div class="col-sm-4 text center icone">
                    <i class="fas fa-building"></i><br>Empresarial<br>
                    <p>A partir de R$ 39,90</p>
                    <a href="cotacao.php" class="btn" id="botao">Faça sua cotação</a>
                </div>
                <div class="col-sm-4 text center icone">
                    <i class="fas fa-tooth"></i><br>Odontológicos<br>
                    <p>A partir de R$ 59,90</p>
                    <a href="cotacao.php" class="btn" id="botao">Faça sua cotação</a>
                </div>
            </div>
        </div>
    </section>

    <div class="parallax parallax5 parallax-min"></div>
<?php include("footer.php"); ?>


<script type="text/javascript">
$(window).scroll(function () {
    $(".parallax").animate({
        "background-position-y": ($(window).scrollTop()/80) + "px"
    }, {
        queue: false, 
        duration: 0
    });
});
</script>
