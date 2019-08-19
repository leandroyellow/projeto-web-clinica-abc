<?php
    require_once('config.php'); 

    
?>

<?php include("header_paciente.php"); ?>


    <div class="cor">

        
        <div class="container" id="tamanhoContainer">
            <h3 class="titulo">Login</h3>
            <form action="validacao.php" method="post">
                <div class="form-group row">
                    <label for="campoEmail" class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-10">
                        <input type="email" id="campoEmail" class="form-control" placeholder="Digite seu email" name="email" autocomplete="off" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="campoSenha" class="col-sm-2 col-form-label">Senha</label>
                    <div class="col-sm-10">
                        <input type="password" id="campoSenha" class="form-control" placeholder="Digite sua senha" name="senha" autocomplete="off" required>
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