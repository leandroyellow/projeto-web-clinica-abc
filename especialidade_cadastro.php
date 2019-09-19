<?php session_start();
require('conexao.php');
require('config.php');

if((!isset ($_SESSION['email']) == true) && (!isset ($_SESSION['senha']) == true) && (!isset ($_SESSION['id']) == true) || $_SESSION['tipo'] != 1 )
{
  unset($_SESSION['email']);
  unset($_SESSION['senha']);
  unset ($_SESSION['id']);
  unset ($_SESSION['tipo']);
  header('location:index.php');
  }
 
$logado = $_SESSION['email'];

$id = $_SESSION['id'];

$sql = "SELECT profissional.id, profissional.nome FROM profissional WHERE profissional.usuario_id = $id";

$resultado = $conexao->query($sql);
    
$row = mysqli_fetch_assoc($resultado);

$nome = $row['nome'];
$mensagemAlerta = '';
if(isset($_GET['msg'])){
if ($_GET['msg'] == 'entrou') {
    $mensagemAlerta = 'Especialidade já cadastrada';
}}

include("header_administrador.php");
?>





    <div class="cor">
        <h2 class="text-center sucesso">Cadastro Categoria Profissional</h2>
        <div class="container">
            
            <form class="formulario" action="especialidade_cadastro2.php" method="post" enctype="multipart/form-data">
                
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <label for="campoEspecialidade">Categoria:</label>
                        <input type="text" class="form-control" name="especialidade" id="campoEspecialidade" placeholder="Digite uma especialidade" autocomplete="off" required>
                    </div>
                </div>

                <div class="text-right">
                    <a href="clinica.php" class="btn" id="botao">Voltar</a>
                    <button type="submit" class="btn" id="botao">Cadastar</button>

                </div>
            </form>
            <div><?=$mensagemAlerta?></div>

            <table class="table" style=margin-top:50px;>
                <thead>
                    <tr>
                        <th scope="col">Especialidade</th>
                        <th scope="col" class="text-center">Ação</th>
                    </tr>
                </thead>

                <?php
                    
                    $sql2 = "SELECT * FROM especialidades ORDER BY especialidade";
                    $Resutado2 = $conexao->query($sql2);
                    while ($leitor = $Resutado2->fetch_assoc()){
                        $id_especialidade = $leitor['id'];
                        $especialidade = $leitor['especialidade'];
                        

                        
                ?>

                <tr>
                    <td><?php echo  $especialidade ?> </td>
                    <td class="text-center">
                        <a class="btn btn-danger btn-sm" style="color:#fff" href="especialidade_deletar.php?id=<?php echo $id_especialidade ?>" role="button"><i class="far fa-trash-alt"></i>&nbsp;Apagar</a>
                    </td>

                </tr>

                <?php } ?>
                
                    
                
            </table>

        </div>
    </div><!--cor-->

<?php include("footer.php"); ?>

<?php
    
?>