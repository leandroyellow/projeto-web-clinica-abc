



<?php include("header_administrador.php"); ?>

    <div class="cor">
        <h3 class="titulo">Cadastro do Profissional</h3>
        <div class="container tamanhoContainer">
            
            <form class="formulario" action="profissional_cadastro2.php" method="post">
                
            <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="campoEmail">Email</label>
                        <input type="email" class="form-control" name="email" id="campoEmail" placeholder="Digite seu email" autocomplete="off" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="campoSenha">Senha</label>
                        <input type="password" class="form-control"  name="senha" id="campoSenha" placeholder="Digite uma senha" autocomplete="off" required>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="campoEmail2">Repetir email</label>
                        <input type="email" class="form-control" name="email" id="campoEmail2" placeholder="Repetir seu email" autocomplete="off" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="campoSenha2">Repetir senha</label>
                        <input type="password" class="form-control"  name="senha" id="campoSenha2" placeholder="Repita sua senha" autocomplete="off" required>
                    </div>
                </div>

                <div class="custom-control custom-radio">
                    <input type="radio" id="radioAdm" name="tipo" class="custom-control-input" value="1" required>
                    <label class="custom-control-label" for="radioAdm">Administração</label>
                </div>
                <div class="custom-control custom-radio">
                    <input type="radio" id="radioMedico" name="tipo" class="custom-control-input" value="2" required>
                    <label class="custom-control-label" for="radioMedico">Médico</label>
                </div>
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
                <div class="text-right">
                    <button type="submit" class="btn" id="botao">Próximo</button>
                </div>
                
            </form>
        </div>
    </div><!--cor-->

<?php include("footer.php"); ?>