<?php 
include("header_paciente.php"); 
require_once('config.php');
require_once('conexao.php');

$diretorio = "upload/";

$sql = "SELECT profissional.arquivo, profissional.nome, profissional.especialidade FROM profissional  ";
$consulta = $conexao->query($sql);
?>

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
                            <div class="text-center icone"><i class="fas fa-procedures"></i><br>Internação</div>
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
                                    <div class="col-sm-4 text center medicos"><img class="img-medico img-fluid" src="<?php echo $diretorio . $arr[$arr_index]["arquivo"] ?>" alt="1"><h3 class="nome"><?php echo $arr[$arr_index]["nome"] ?></h3><p class="esp"><?php echo $arr[$arr_index]["especialidade"] ?></p></div>
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

    <?php include("footer.php"); ?>