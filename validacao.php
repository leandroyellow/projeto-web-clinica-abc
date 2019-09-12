<?php 

    session_start();

    require('conexao.php');

    // Verifica se houve POST e se o usuário ou a senha é(são) vazio(s)
    if (!empty($_POST) AND (empty($_POST['email']) OR empty($_POST['senha']))) {
        header("Location: index.php"); 
        exit();
    }

    $email = mysqli_real_escape_string($conexao, $_POST['email']);
    $senha = mysqli_real_escape_string($conexao, $_POST['senha']);

    $sql = "SELECT * FROM usuario WHERE email =  '$email'  AND senha =  '$senha'" ;

    $resultado = $conexao->query($sql);

    

    if($resultado->num_rows > 0){
        $row = mysqli_fetch_assoc($resultado);
    
        if($row['tipo'] == 1){
            $_SESSION['email'] = $email;
            $_SESSION['senha'] = $senha;
            $_SESSION['id'] = $row['id'];
            $_SESSION['tipo'] = $row['tipo'];
            header('Location: clinica.php'); 
        }
        elseif($row['tipo'] == 2){
            $_SESSION['email'] = $email;
            $_SESSION['senha'] = $senha;
            $_SESSION['id'] = $row['id'];
            $_SESSION['tipo'] = $row['tipo'];
            header('Location: medico.php'); 
        }
        elseif($row['tipo'] == 3 ){
            $_SESSION['email'] = $email;
            $_SESSION['senha'] = $senha;
            $_SESSION['id'] = $row['id'];
            $_SESSION['tipo'] = $row['tipo'];
            header('location:site.php');
            
        }
        
    
    }
    else{
        unset ($_SESSION['email']);
        unset ($_SESSION['senha']);
        unset ($_SESSION['id']);
        include("header_paciente.php");
        ?>


    <div class="cor">
        <div class="container text-center">
            <img class="erro img-fluid" src="imagens/erro.png" alt="">
            <h1 class="sucesso">Senha inválida</h1>
            <a href="index.php" class="btn" id="botao">Voltar</a>
            <a href="login.php" class="btn" id="botao">Tentar novamente</a>
        </div>
    </div>



<?php include("footer.php");
    }

   
    
?>

