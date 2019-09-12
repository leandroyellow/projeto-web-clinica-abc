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
      <!--<h2 class="text-center sucesso">Agenda</h2>-->
        <form action="">
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
        </form>
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
              $dia = filter_input(INPUT_GET, "dia");
              $timestamp = date('Y-m-d',  strtotime(str_replace("/", "-", $dia))); 
              
              if($dia){
                $sqlAgenda = "SELECT agenda.id, agenda.hora, profissional.nome AS medico, profissional.especialidade AS id_especialidade, especialidades.especialidade, paciente.nome AS paciente 
                FROM agenda 
                INNER JOIN profissional ON profissional.id = agenda.profissional_id 
                INNER JOIN paciente ON paciente.id = agenda.paciente_id 
                INNER JOIN especialidades ON profissional.especialidade = especialidades.id
                WHERE agenda.dia = '$timestamp' AND profissional.id = $idMedico ORDER BY hora";
              $busca = $conexao->query($sqlAgenda);
              
              if($busca->num_rows > 0){
                            while ($leitor = $busca->fetch_assoc()){
                                $hora = $leitor['hora'];
                                $paciente = $leitor['paciente'];


                        
                    ?>
                    <tr>
                        <td><?php echo $hora ?> </td>
                        <td><?php echo $paciente ?> </td>

                        

                        <td class="text-center"><a class="btn btn-success btn-sm" style="color:#fff" href="agenda.php?<?php echo "medico=$idMedico&paciente=$idpaciente&dia=$dia&hora=$hora&especialidade=$especialidadeMedica"?>"  role="button"><i class="fas fa-plus-circle"></i>&nbsp;Adicionar</a> 
                        </td>
                        
                    </tr>
                            
<?php
                        }}}
                    ?>
                   
      </table>
  </div>
</div>

<?php
include("footer.php");
?>