<?php
include_once ("conexao.php");

$id = $_POST['id'];
$email = $_POST['email'];
//$senha = $_POST['senha'];
$tipo = "tipo";
$nome = $_POST['nome'];
$registro = $_POST['registro'];
$sexo = $_POST['sexo'];
$nascimento = $_POST['nascimento'];
$timestamp = date('Y-m-d',  strtotime(str_replace("/", "-", $nascimento)));
$telefone = $_POST['telefone'];
$celular = $_POST['celular'];
$endereco = $_POST['endereco'];
$numero = $_POST['numero'];
$bairro = $_POST['bairro'];
$cidade = $_POST['cidade'];
$estado = $_POST['estado'];
$cep = $_POST['cep'];
$especialidade = $_POST['especialidade'];
$arquivo = $_POST['arquivo'];

$sql = "UPDATE usuario SET usuario.email='$email'   WHERE usuario.id = '$id'";
$resultado = $conexao->query($sql);

$sql2 = "UPDATE profissional SET profissional.nome='$nome', profissional.especialidade='$especialidade', profissional.celular='$celular', profissional.registro='$registro', profissional.arquivo='$arquivo' WHERE profissional.usuario_id = '$id'";
$resultado2 = $conexao->query($sql2);

header('Location: listar_cadastro.php');
 
?>