<?php
include_once ("conexao.php");

$id = $_POST['id'];
$email = $_POST['email'];
//$senha = $_POST['senha'];
$tipo = "tipo";
$nome = $_POST['nome'];
$cpf = $_POST['cpf'];
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

$sql = "UPDATE usuario SET usuario.email='$email'   WHERE usuario.id = '$id'";
$resultado = $conexao->query($sql);

$sql2 = "UPDATE paciente SET paciente.nome='$nome', paciente.cpf='$cpf', paciente.sexo='$sexo', paciente.nascimento='$timestamp', paciente.telefone='$telefone', paciente.celular='$celular', paciente.endereco='$endereco', paciente.numero='$numero', paciente.bairro='$bairro', paciente.cidade='$cidade', paciente.estado='$estado', paciente.cep='$cep' WHERE paciente.usuario_id = '$id'";
$resultado2 = $conexao->query($sql2);

header('Location: listar_cadastro.php');
 
?>