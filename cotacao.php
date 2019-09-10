<?php include("header_paciente.php"); 
//BUSCANDO A CLASSE
require_once 'PHPMailer/Funcoes.class.php';
//ESTANCIANDO A CLASSE
$objFc = new Funcoes();
if(isset($_POST['btEnviar'])){
	$objFc->enviarEmail($_POST);
}
?>

<div class="cor">
    <div class="container">
        <h2 class="text-center sucesso">Faça sua Cotação</h2>
        <form action="" method="post">
            <div class="form-group col-md-12">
                <label for="campoEmail">Email:</label>
                <input type="email" class="form-control" name="email" id="campoEmail" placeholder="Digite seu email" autocomplete="off" required>
            </div>
            <div class="form-group col-md-12">
                <label for="campoDescricao">Descrição:</label>
                <textarea class="form-control" id="campoDescricao" rows="5" name="descricao" required></textarea>
            </div>
            <div class="text-right form-group col-md-12">
                <a href="index.php" id="botao" class="btn" >Voltar</a>
                <button type="submit" class="btn" id="botao" name="btEnviar">Enviar</button>
            </div>
        </form>
    </div>
</div>

<?php include("footer.php"); ?>