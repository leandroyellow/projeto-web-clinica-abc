<?php
require_once('config.php');
require_once('conexao.php');

$id = $_POST['id'];
$senhaAtual = $_POST['senhaAtual'];
$senhaNova = $_POST['senhaNova'];
$nome = $_POST['nome'];   

$sql = "SELECT * FROM usuario WHERE id = $id AND senha = '$senhaAtual'";
$resultado = $conexao->query($sql);
 
if($resultado->num_rows > 0){
    $sqlupdate = "UPDATE usuario SET usuario.senha='$senhaNova' WHERE usuario.id = '$id'";
    $resultadoupdate = $conexao->query($sqlupdate);
    
    include("header_administrador.php"); 
    
    ?>

    <div class="cor">
        <div class="container text-center cadastro">
            <img class="cadastro" src="imagens/cadastro.png" alt="">
            <h1 class="sucesso">Senha alterada com sucesso</h1>
            <a href="clinica.php" class="btn" id="botao">Voltar</a>
            
        </div>
    </div>
    
    <?php include("footer.php"); 

}else{


include("header_administrador.php"); ?>

<div class="cor">
    <div class="container text-center cadastro">
        <img class="cadastro" src="imagens/aviso.png" alt="">
        <h1 class="sucesso">Não foi possível alterar a senha</h1>
        <a href="clinica.php" class="btn" id="botao">Voltar</a>
        
    </div>
</div>

<?php include("footer.php"); 
}
?>