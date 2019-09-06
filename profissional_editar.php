<?php
include_once ("conexao.php");

$id = $_POST['id'];
$email = $_POST['email'];
//$senha = $_POST['senha'];
$tipo = "tipo";
$nome = $_POST['nome'];
$registro = $_POST['registro'];
$celular = $_POST['celular'];
$especialidade = $_POST['especialidade'];
//$arquivo = $_POST['arquivo'];

$extensao = strtolower(substr($_FILES['arquivo']['name'], -4)); //pega a extensao do arquivo
$novo_nome = md5(time()) . $extensao; //define o nome do arquivo
$diretorio = "upload/"; //define o diretorio para onde enviaremos o arquivo
move_uploaded_file($_FILES['arquivo']['tmp_name'], $diretorio.$novo_nome); //efetua o upload

$sql = "UPDATE usuario SET usuario.email='$email'   WHERE usuario.id = '$id'";
$resultado = $conexao->query($sql);

$sql2 = "UPDATE profissional SET profissional.nome='$nome', profissional.especialidade='$especialidade', profissional.celular='$celular', profissional.registro='$registro', profissional.arquivo='$novo_nome' WHERE profissional.usuario_id = $id";
$resultado2 = $conexao->query($sql2);

header('Location: listar_cadastro.php');
 
?>