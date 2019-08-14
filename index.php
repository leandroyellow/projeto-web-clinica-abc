<?php include("header.php"); ?>

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