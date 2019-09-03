<?php

    require('conexao.php');

    // Verifica se houve POST e se o usuário ou a senha é(são) vazio(s)
    if (!empty($_POST) AND (empty($_POST['email']) OR empty($_POST['senha']))) {
        header("Location: index.php"); 
        exit();
    }

    $email = mysqli_real_escape_string($conexao, $_POST['email']);
    $senha = mysqli_real_escape_string($conexao, $_POST['senha']);

    $sql = "SELECT * FROM usuario WHERE email =  '$email'  AND senha =  $senha" ;

    $resultado = $conexao->query($sql);

    

    if($resultado->num_rows > 0){
        $row = mysqli_fetch_assoc($resultado);
    
        if($row['tipo'] == 1){
            header('Location: clinica.php'); 
        }
        elseif($row['tipo'] == 2){
            header('Location: profissional_cadastro.php'); 
        }
        elseif($row['tipo'] == 3 ){
            header('Location: index.php'); 
        }
        
    
    }

    echo "senha invalida";
?>