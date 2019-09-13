<?php
include_once ("conexao.php");

$id = $_POST['id'];
$prontuario = $_POST['prontuario'];

$sql = "UPDATE paciente SET paciente.prontuario='$prontuario' WHERE paciente.id = $id";
$resultado = $conexao->query($sql);

header('Location: medico.php');

?>