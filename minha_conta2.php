<?php
require_once('config.php');
require_once('conexao.php');

$id = $_POST['id'];
$nome = $_POST['nome']; 
$tipo = $_POST['tipo'];
$email = $_POST['email'];
$nomeAtual = $_POST['nomeAtual'];
$celular = $_POST['celular'];
$cpf = $_POST['cpf'];



$sqlupdate = "UPDATE usuario SET usuario.email='$email' WHERE usuario.id = '$id'";
$resultadoupdate = $conexao->query($sqlupdate);

if($tipo == 1){
    $header = "header_administrador.php";
    $botaoVoltar = "clinica.php";
    $especialidade = $_POST['especialidade'];

    $sqlupdate2 = "UPDATE profissional SET profissional.especialidade='$especialidade', profissional.nome='$nomeAtual', profissional.celular='$celular', profissional.registro='$cpf' WHERE profissional.usuario_id = $id";
    $resultadoupdate2 = $conexao->query($sqlupdate2);
}
elseif($tipo == 2){
    $header = "header_medico.php";
    $botaoVoltar = "medico.php";
    $especialidade = $_POST['especialidade'];

    $sqlupdate2 = "UPDATE profissional SET profissional.especialidade='$especialidade', profissional.nome='$nomeAtual', profissional.celular='$celular', profissional.registro='$cpf' WHERE profissional.usuario_id = $id";
    $resultadoupdate2 = $conexao->query($sqlupdate2);
}
elseif($tipo == 3){
    $header = "header_paciente.php";
    $botaoVoltar = "site.php";
    $sexo = $_POST['sexo'];
    $nascimento = $_POST['nascimento'];
    $timestamp = date('Y-m-d',  strtotime(str_replace("/", "-", $nascimento))); 
    $telefone = $_POST['telefone'];
    $cep = $_POST['cep'];
    $cidade = $_POST['cidade'];
    $estado = $_POST['estado'];
    $endereco = $_POST['endereco'];
    $numero = $_POST['numero'];
    $bairro = $_POST['bairro'];
    

    $sqlupdate2 = "UPDATE paciente SET paciente.nome='$nomeAtual', paciente.cpf='$cpf', paciente.sexo='$sexo', paciente.nascimento='$timestamp', paciente.telefone='$telefone', paciente.celular='$celular', paciente.cep='$cep', paciente.cidade='$cidade', paciente.estado='$estado', paciente.endereco='$endereco', paciente.numero='$numero', paciente.bairro='$bairro' WHERE paciente.usuario_id = $id";
    $resultadoupdate2 = $conexao->query($sqlupdate2);
}


 
if($resultadoupdate == true && $resultadoupdate2 == true){
    
    
    include("$header"); 
    
    ?>

    <div class="cor">
        <div class="container text-center cadastro">
            <img class="cadastro" src="imagens/cadastro.png" alt="">
            <h1 class="sucesso">Senha alterada com sucesso</h1>
            <a href="<?=$botaoVoltar?>" class="btn" id="botao">Voltar</a>
            
        </div>
    </div>
    
    <?php include("footer.php"); 

}else{


include("$header"); ?>

<div class="cor">
    <div class="container text-center cadastro">
        <img class="cadastro" src="imagens/aviso.png" alt="">
        <h1 class="sucesso">Não foi possível alterar a senha</h1>
        <a href="clinica.php" class="btn" id="botao">Voltar</a>
        
    </div>
</div>

<?php include("footer.php"); 
}

$conexao->close();
?>