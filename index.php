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
            
                <img class="img-fluid" src="imagens/cardiologia2.png" alt="">
            
        </div>
        
    </section><!--quem_somos-->

    <section class="medicos-container">
        <div class="center">
            <h2 class="equipe">Equipe Médica</h2>
            <div class="carousel-inner" role="listbox">
                <div class="row">
                    <?php 
                        while($medico = $consulta->fetch_assoc()){
                            $nome = $medico['nome'];
                            $especialidade = $medico['especialidade'];
                            $foto = $medico['arquivo'];
                    ?>
                    <div class="col-sm-4 text center medicos"><img class="img-medico img-fluid" src="<?php echo $diretorio . $foto ?>"><h3 class="nome"><?php echo $nome ?></h3><p class="esp"><?php echo $especialidade ?></p></div>
                    <?php } ?>

                    <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img src="..." class="d-block w-100" alt="...">
                            </div>
                            <div class="carousel-item">
                                <img src="..." class="d-block w-100" alt="...">
                            </div>
                            <div class="carousel-item">
                                <img src="..." class="d-block w-100" alt="...">
                            </div>
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