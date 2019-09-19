<?php 
    require_once('conexao.php');

    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $nome = $_GET['nome'];

        $deletarEspecialidade = "DELETE FROM especialidades WHERE id = $id";
        $delete = mysqli_query($conexao, $deletarEspecialidade);

        
        if($delete == true ){
            header("location: especialidade_cadastro.php");
        }else{
            include("header_administrador.php"); ?>

            <div class="cor">
                <div class="container text-center cadastro">
                    <img src="imagens/aviso.png" alt="">
                    <h1 class="sucesso">Não foi possivel apagar</h1>
                    <a href="clinica.php" class="btn" id="botao">Voltar</a>
                    
                </div>
            </div>

            <?php include("footer.php"); 
        }
        
        
        
       

        
    }

?>