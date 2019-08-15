<?php
    require_once('config.php'); 

    
?>

<?php include("header_paciente.php"); ?>


    <div class="cor">
        <h3 class="titulo">Cadastre seu email e senha para continuar</h3>
        <div class="container" id="tamanhoContainer">
            <form>
                <div class="form-group row">
                    <label for="campoemail" class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-10">
                        <input type="email" id="campoemail" class="form-control" placeholder="Digite seu email" autocomplete="off" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="camposenha" class="col-sm-2 col-form-label">Senha</label>
                    <div class="col-sm-10">
                        <input type="password" id="camposenha" class="form-control" placeholder="Digite sua senha" autocomplete="off" required>
                    </div>
                </div>
                <div class="text-right">
                    <a href="paciente_cadastro.php" id="botao" class="btn" >Quero me cadastrar</a>
                    <button type="submit" class="btn" id="botao">Entrar</button>
                </div>            
            </form>
        </div>
    </div>

    

<?php include("footer.php"); ?>