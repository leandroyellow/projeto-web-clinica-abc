<?php
    
  if (!empty($_POST) AND (empty($_POST['email']) OR empty($_POST['senha']))) {
      header("Location: index.php"); exit;
  }

  require('conexao.php');

  $usuario = $_POST['email'];
  $senha = $_POST['senha'];

  // Validação do usuário/senha digitados
  $sql = "SELECT 'id', 'email', 'tipo' FROM 'usuario' WHERE ('usuario' = '".$usuario ."') AND ('senha' = '".$senha ."')";
  $resultado = $conexao->query($sql);
  if ($resultado->num_row > 0) {
      // Mensagem de erro quando os dados são inválidos e/ou o usuário não foi encontrado
      echo "Login inválido!"; 
      exit;
  } else {
      // Salva os dados encontados na variável $resultado
      //$resultado = mysql_fetch_assoc($query);

      echo "ddddddddddddd inválido!"; 
  }
    
?>