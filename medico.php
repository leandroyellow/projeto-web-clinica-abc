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
$idMedico = $row['id'];

include("header_medico.php");
?>
<div class="cor">
  <div class="container">
    <form action="">
      <div class="form-row">
        <div class="form-group col-md-4">
          <label for="campoDia">Data:</label>
          <input  class="form-control"  name="dia" id="campoDia" placeholder="Digite uma data" autocomplete="off" required value="<?php echo date("d/m/Y");?>">
        </div>
        <div class="form-group col-md-8">
          <label>Clique para verificar a agenda do dia:</label>
          <button type="submit" class="btn botao form-control" id="verificaAgenda">Verificar</button>
          <?php $dia = filter_input(INPUT_GET, "dia");?>
        </div>
      </div>
    </form>
    <h2 class="sucesso text-center">Agenda do dia: <?php echo $dia;?></h2>
    <table class="table">
      <caption></caption>
        <thead>
          <tr>
            <th>Horário</th>
            <th class="">Paciente</th>
            <th class="text-center">Situação</th>
          </tr>        
        </thead>
        <?php
        
        $timestamp = date('Y-m-d',  strtotime(str_replace("/", "-", $dia))); 
        
        
        $sqlAgenda = "SELECT agenda.hora, paciente.id, paciente.nome, paciente.prontuario FROM agenda INNER JOIN profissional ON profissional.id = agenda.profissional_id INNER JOIN paciente ON paciente.id = agenda.paciente_id WHERE agenda.dia = '$timestamp' AND profissional.id = $idMedico ORDER BY hora";

        

          $buscaAgenda = $conexao->query($sqlAgenda);
              
          
            while ($leitor = $buscaAgenda->fetch_assoc()){
              $hora = $leitor['hora'];
              $paciente = $leitor['nome'];
              $idpaciente = $leitor['id'];
              $prontuario = $leitor['prontuario'];
                        
              ?>
              <tr>
                <td><?php echo $hora ?> </td>
                <td><?php echo $paciente ?> </td>
                <td class="text-center">
                
                

                <a type="button" class="btn btn-warning btn-sm" style="color:#fff" data-toggle="modal" data-target="#prontuarioPaciente" data-idpaciente="<?php echo $idpaciente; ?>" data-nome="<?php echo $paciente; ?>" data-prontuario="<?php echo $prontuario; ?>"><i class="far fa-edit"></i>&nbsp;Editar Prontuário</a> 
                
                </td>
              </tr>
                            
        <?php
        }
        ?>
                   
    </table>
  </div>
</div>

<div class="modal fade" id="prontuarioPaciente" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Prontuário</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form class="formulario" action="editar_prontuario.php" method="post" enctype="multipart/form-data">
          <input type="hidden" name="id" id="id">
          <div class="form-row">
            <div class="form-group col-md-12">
              <label for="campoNome">Nome:</label>
              <input type="text" class="form-control" name="nome" id="campoNome">
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-md-12">

              <label for="campoProntuario">Prontuário</label>
              
              <textarea class="form-control" id="campoProntuario" name="prontuario" rows="10"></textarea>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
            <button type="submit" class="btn" id="botao">Salvar</button>
          </div>
        </form>
      </div>
    </div>
  </div>

</div>

<?php
include("footer.php");
?>
<script>
$(document).ready(function(){
  $("#campoDia").mask("00/00/0000",{placeholder:"__/__/____"});
});
</script>
<script type="text/javascript">
$('#prontuarioPaciente').on('show.bs.modal', function (event){
  var button = $(event.relatedTarget)
  var recipient_idpaciente = button.data('idpaciente')
  var recipient_nome = button.data('nome')
  var recipient_prontuario = button.data('prontuario')
  
  var modal = $(this)
  modal.find('.modal-title').text('Prontuário: ' + recipient_idpaciente)
  modal.find('#id').val(recipient_idpaciente)
  modal.find('#campoNome').val(recipient_nome)
  modal.find('#campoProntuario').val(recipient_prontuario)
  
})
</script>