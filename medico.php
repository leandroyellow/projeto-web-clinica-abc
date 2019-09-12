<?php 
/* esse bloco de código em php verifica se existe a sessão, pois o usuário pode
 simplesmente não fazer o login e digitar na barra de endereço do seu navegador 
o caminho para a página principal do site (sistema), burlando assim a obrigação de 
fazer um login, com isso se ele não estiver feito o login não será criado a session, 
então ao verificar que a session não existe a página redireciona o mesmo
 para a index.php.*/
session_start();
require('conexao.php');


if((!isset ($_SESSION['email']) == true) && (!isset ($_SESSION['senha']) == true) && (!isset ($_SESSION['id']) == true) || $_SESSION['tipo'] != 2 )
{
  unset($_SESSION['email']);
  unset($_SESSION['senha']);
  unset ($_SESSION['id']);
  unset ($_SESSION['tipo']);
  header('location:index.php');
  }

$logado = $_SESSION['email'];
$senha = $_SESSION['senha'];
$id = $_SESSION['id'];

$sql = "SELECT profissional.id, profissional.nome FROM profissional WHERE profissional.usuario_id = $id";

$resultado = $conexao->query($sql);
    
$row = mysqli_fetch_assoc($resultado);

$nome = $row['nome'];


include("header_medico.php");
?>
<div class="cor">
  <div class="container">
      <!--<h2 class="text-center sucesso">Agenda</h2>-->
        <div class="form-row">
          <div class="form-group col-md-4">
            <label for="campoDia">Data:</label>
            <input class="form-control"  name="dia" id="campoDia" placeholder="Digite uma data" autocomplete="off" required>
          </div>
          <div class="form-group col-md-8">
            <label>Clique para verificar a agenda do dia:</label>
            <button type="submit" class="btn botao form-control" id="verificaAgenda">Verificar</button>
          </div>
        </div>
      <table class="table">
            <caption></caption>
              <thead>
                <tr>
                  <th>Horário</th>
                  <th class="text-center">Paciente</th>
                  <th class="text-center">Situação</th>
                </tr>        
              </thead>
      </table>
  </div>
</div>

<?php
include("footer.php");
?>