<?php session_start();
require('conexao.php');
require('config.php');
$tipo = $_SESSION['tipo'];

if($tipo == 1){
    if((!isset ($_SESSION['email']) == true) && (!isset ($_SESSION['senha']) == true) && (!isset ($_SESSION['id']) == true) || $_SESSION['tipo'] != 1 ){
    unset($_SESSION['email']);
    unset($_SESSION['senha']);
    unset ($_SESSION['id']);
    unset ($_SESSION['tipo']);
    header('location:index.php');
    }
    
    $logado = $_SESSION['email'];
    
    $id = $_SESSION['id'];
    $botaoVoltar = 'clinica.php';

    $sql = "SELECT profissional.id, profissional.nome FROM profissional WHERE profissional.usuario_id = $id";
    $resultado = $conexao->query($sql);
    $row = mysqli_fetch_assoc($resultado);

    $nome = $row['nome'];



    include("header_administrador.php");
}
elseif($tipo == 2){
    if((!isset ($_SESSION['email']) == true) && (!isset ($_SESSION['senha']) == true) && (!isset ($_SESSION['id']) == true) || $_SESSION['tipo'] != 2 )
    {
      unset($_SESSION['email']);
      unset($_SESSION['senha']);
      unset ($_SESSION['id']);
      unset ($_SESSION['tipo']);
      header('location:index.php');
      }
    
    $logado = $_SESSION['email'];
    
    $id = $_SESSION['id'];
    $botaoVoltar = 'medico.php';
    
    $sql = "SELECT profissional.id, profissional.nome FROM profissional WHERE profissional.usuario_id = $id";
    
    $resultado = $conexao->query($sql);
        
    $row = mysqli_fetch_assoc($resultado);
    
    $nome = $row['nome'];
    $idMedico = $row['id'];
    
    include("header_medico.php");
}
elseif($tipo == 3){
    if((!isset ($_SESSION['email']) == true) && (!isset ($_SESSION['senha']) == true) && (!isset ($_SESSION['id']) == true) || $_SESSION['tipo'] != 3 )
    {
      unset($_SESSION['email']);
      unset($_SESSION['senha']);
      unset ($_SESSION['id']);
      unset ($_SESSION['tipo']);
      header('location:index.php');
      }
    
    $logado = $_SESSION['email'];
    
    $id = $_SESSION['id'];
    $botaoVoltar = 'site.php';
    
    $sql = "SELECT paciente.id, paciente.nome FROM paciente WHERE paciente.usuario_id = $id";
    
    $resultado = $conexao->query($sql);
        
    $row = mysqli_fetch_assoc($resultado);
    
    $nome = $row['nome'];
    
    
    include("header_paciente.php");
}
else{
    unset($_SESSION['email']);
    unset($_SESSION['senha']);
    unset ($_SESSION['id']);
    unset ($_SESSION['tipo']);
    header('location:index.php');
}
?>

<div class="cor">
    <div class="container login-center">
        <div class="login">
            <h2 class="text-center sucesso">Alterar Senha</h2>
            <form form class="formulario" action="muda_senha2.php" method="post">
                <input type="hidden" name="id" value="<?=$id;?>">
                <input type="hidden" name="nome" value="<?=$nome?>">
                <input type="hidden" name="tipo" value="<?=$tipo?>">
                <div class="form-group">
                    <div class="col-sm-12">
                        <label for="senhaAtual" class="col-form-label">Senha atual:</label>
                        <input type="password" id="senhaAtual" class="form-control" placeholder="Digite sua senha atual" name="senhaAtual" autocomplete="off" required>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-12">
                        <label for="senhaNova" class="col-form-label">Nova senha:</label>
                        <input type="password" id="senhaNova" class="form-control" placeholder="Digite sua nova senha" name="senhaNova" autocomplete="off" required>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-12">
                        <label for="senhaNova" class="col-form-label">Confirma senha:</label>
                        <input type="password" id="senhaNova2" class="form-control" placeholder="Confirma sua nova senha" name="senhaNova" autocomplete="off" required oninput="validaSenha(this)">
                    </div>
                </div>
                <div class="text-right">
                    <a href="<?=$botaoVoltar;?>" id="botao" class="btn" >Voltar</a>
                    <button type="submit" class="btn" id="botao">Alterar</button>
                </div>            
            </form>
        </div>
    </div>
</div>

<?php
include("footer.php");
?>
<script>
    function validaSenha (input){ 
	    if (input.value != document.getElementById('senhaNova').value) {
            input.setCustomValidity('Repita a senha corretamente');
        } else {
            input.setCustomValidity('');
        }
    } 
</script>