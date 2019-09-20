<?php
session_start();

require_once('conexao.php');
require_once('config.php');

if((!isset ($_SESSION['email']) == true) && (!isset($_SESSION['id']) == true) || $_SESSION['tipo'] != 3){
    unset($_SESSION['email']);
    unset($_SESSION['senha']);
    unset($_SESSION['id']);
    unset($_SESSION['tipo']);
    header('location:index.php');
}

$idUsuario = $_SESSION['id'];
$idEspecialidade = $_POST['especialidade'];

$sql = "SELECT id, nome FROM paciente WHERE usuario_id = $idUsuario";
$resultado = $conexao->query($sql);
$row = mysqli_fetch_assoc($resultado);
$nome = $row['nome'];
$idPaciente = $row['id'];

$sqlListaMedico = "SELECT id, nome FROM profissional WHERE especialidade = $idEspecialidade";
$resultadoListaMedico = $conexao->query($sqlListaMedico);

$idMedico = filter_input(INPUT_GET, "medico");
$dia = filter_input(INPUT_GET, "dia");
$timestamp = date('Y-m-d',  strtotime(str_replace("/", "-", $dia)));

$consulta_agenda = "SELECT  intervalo.hora FROM intervalo WHERE intervalo.hora NOT IN (SELECT agenda.hora FROM agenda INNER JOIN profissional ON profissional.id = agenda.profissional_id WHERE agenda.dia = '$timestamp' AND profissional.id = $idMedico) ORDER BY hora";
$resultado_agenda = $conexao->query($consulta_agenda);

include("header_paciente.php");


?>
<div class="cor">
    <div class="container">
        <h2 class="text-center sucesso">Agenda</h2>
        <form action="<?php echo $_SERVER['PHP_SELF'];?>">
            <div class="form-row">
                <div class="form-group col-md-8">
                    <label for="campoMedico">Escolha o médico</label>
                    <select class="form-control" name="medico" id="campoMedico" required>
                        <option selected>Selecione o médico</option>
                        <?php
                        foreach ($resultadoListaMedico as $medicos) {
                            echo '<option value="'.$medicos['id'].'">'.$medicos['nome'].'</option>';
                        }
                        ?>
                    </select>
                </div>
                <div class="form-group col-md-4">
                    <label for="campoDia">Data:</label>
                    <input class="form-control"  name="dia" id="campoDia" placeholder="Digite uma data" autocomplete="off" required>
                </div>
            </div>
            <button type="submit" class="btn botao form-control" id="verificaAgenda">Verificar</button>
        </form>

        <?php
            if($idMedico && $dia){
                $consulta_nome_medico = "SELECT nome FROM profissional WHERE id = $idMedico";
                $resultado_nome_medico = $conexao->query($consulta_nome_medico);
                $row_nome_medico = mysqli_fetch_assoc($resultado_nome_medico);
                $nomeMedico = $row_nome_medico['nome'];
                ?>

            <h2 class="text-center sucesso">Agenda <?=$nomeMedico?> dia: <?=$dia?> </h2>
            <table class="table">
                <caption></caption>
                <thead>
                    <tr>
                        <th>Horário</th>
                        <th class="text-center">Ação</th>
                    </tr>        
                </thead>

                <tbody>
                    
                            
                            
                      <?php      
                        
                        
                        if($resultado_agenda->num_rows > 0){
                            while ($leitor = $resultado_agenda->fetch_assoc()){
                                $hora = $leitor['hora'];
                                


                        
                    ?>
                    <tr>
                        <td><?php echo $hora ?> </td>
                        

                        

                        <td class="text-center"><a class="btn btn-success btn-sm" style="color:#fff" href="agenda.php?<?php echo "medico=$idMedico&paciente=$idPaciente&dia=$dia&hora=$hora"?>"  role="button"><i class="fas fa-plus-circle"></i>&nbsp;Adicionar</a> 
                        </td>
                        
                        
                    </tr>
                            <?php }
                            }
                        }else{

                        }
                        
                    ?>
                     
                
                </tbody>  
            
            </table>
        </div>
    </div>         



<?php include("footer.php");