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
  
  $idMedico = filter_input(INPUT_GET, "medico");
  $especialidadeMedica_id = filter_input(INPUT_GET, "especialidade");
  $dia = filter_input(INPUT_GET, "dia");
  $idpaciente = filter_input(INPUT_GET, "paciente");
  $timestamp = date('Y-m-d',  strtotime(str_replace("/", "-", $dia)));
  

$consulta_nome_profissional = "SELECT profissional.id, profissional.nome FROM profissional WHERE profissional.usuario_id = $id";
$resultado_nome_profissional = $conexao->query($consulta_nome_profissional);
$row_nome_profissional = mysqli_fetch_assoc($resultado_nome_profissional);
$nome = $row_nome_profissional['nome'];



$consulta_especialidade = "SELECT DISTINCT especialidades.id, especialidades.especialidade FROM especialidades INNER JOIN profissional ON profissional.especialidade = especialidades.id INNER JOIN usuario ON usuario.id = profissional.usuario_id WHERE usuario.tipo = 2 ORDER BY especialidade";
$resultado_especialidade = $conexao->query($consulta_especialidade);

$consulta_agenda = "SELECT agenda.id, agenda.hora, profissional.nome AS medico, profissional.especialidade AS id_especialidade, especialidades.especialidade, paciente.nome AS paciente FROM agenda INNER JOIN profissional ON profissional.id = agenda.profissional_id INNER JOIN paciente ON paciente.id = agenda.paciente_id INNER JOIN especialidades ON profissional.especialidade = especialidades.id WHERE agenda.dia = '$timestamp' AND profissional.id = $idMedico UNION SELECT '' AS id, intervalo.hora, 'Livre' AS nome, '' AS especialidade, '' AS especialidade, '' AS nome FROM intervalo WHERE intervalo.hora NOT IN (SELECT agenda.hora FROM agenda INNER JOIN profissional ON profissional.id = agenda.profissional_id INNER JOIN paciente ON paciente.id = agenda.paciente_id WHERE agenda.dia = '$timestamp' AND profissional.id = $idMedico) ORDER BY hora";
$resultado_agenda = $conexao->query($consulta_agenda);


include("header_administrador.php");

?>
    <div class="cor">
        <div class="container">
        <h2 class="text-center sucesso">Agenda</h2>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>">
            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="campoEspecialidade">Especialidade:</label>
                    <select class="form-control" name="especialidade" id="campoEspecialidade" autocomplete="off" required>
                        <option selected>Selecione a especialidade</option>
                        <?php 
                            

                            foreach($resultado_especialidade as $especialidades){
                                //echo '<option value="'.$especialidades['id'].'">'. utf8_encode ($especialidades['especialidade']).'</option>';
                              ?>

                                <option value="<?= $especialidades['id'] ?>" <?= $especialidadeMedica_id == $especialidades['id'] ? "selected='selected'" : "" ?>><?= $especialidades['especialidade'] ?></option>
                              <?php  
                            }

                            
                        ?>
                        
                    </select>
                    
                </div>
                <div class="form-group col-md-8">
                    <label for="campoMedico">Médico:</label>
                    <select class="form-control" name="medico" id="campoMedico" autocomplete="off" required disabled="disabled">
                        <option selected>Selecione o médico</option>
                    </select>
                </div>
            </div>
            <div class="form-row">           
                <div class="form-group col-md-4">
                    <label for="campoCpf">CPF:</label>
                    <input class="form-control"  name="cpf" id="campoCpf" placeholder="Digite seu CPF" autocomplete="off"  required>
                </div>
                <div class="form-group col-md-8">
                    <label for="campoNome">Nome:</label>
                    <select class="form-control"  name="paciente" id="campoNome" autocomplete="off" required >

                    </select>
                    
                </div>
            </div>
            <a href="paciente_cadastro_clinica.php" id="novoCadastro" class="btn botao" style="display:none">Paciente não cadastrado</a>

            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="campoDia">Data:</label>
                    <input class="form-control"  name="dia" id="campoDia" placeholder="Digite uma data" autocomplete="off" required value="<?=$dia?>">
                </div>
                <div class="form-group col-md-8">
                    <label>Clique para verificar a agenda do médico selecionado:</label>
                    <button type="submit" class="btn botao form-control" id="verificaAgenda">Verificar</button>
                    
                </div>
            </div>
        </form>
        <?php
            if($idMedico && $especialidadeMedica_id && $dia){
                $consulta_nome_medico = "SELECT nome FROM profissional WHERE id = $idMedico";
                $resultado_nome_medico = $conexao->query($consulta_nome_medico);
                $row_nome_medico = mysqli_fetch_assoc($resultado_nome_medico);
                $nomeMedico = $row_nome_medico['nome'];
                ?>

            <h2 class="text-center sucesso">Agenda <?=$nomeMedico?> dia: <?=$dia?> </h2>
            <div style="overflow-x: auto;">
                <table class="table">
                    <caption></caption>
                    <thead>
                        <tr>
                            <th>Horário</th>
                            <th>Médico</th>
                            <th>Especialidade</th>
                            <th>Paciente</th>
                            <th class="text-center">Situação</th>
                        </tr>        
                    </thead>

                    <tbody>
                        
                                
                                
                        <?php      
                            
                            
                            if($resultado_agenda->num_rows > 0){
                                while ($leitor = $resultado_agenda->fetch_assoc()){
                                    $hora = $leitor['hora'];
                                    $medico = $leitor['medico'];
                                    $especialidade = $leitor['especialidade'];
                                    $paciente = $leitor['paciente'];
                                    $id = $leitor['id'];
                                    $idEspecialidade = $leitor['id_especialidade'];


                            
                        ?>
                        <tr>
                            <td><?php echo $hora ?> </td>
                            <td><?php echo $medico ?></td>
                            <td><?php echo $especialidade ?> </td>
                            <td><?php echo $paciente ?> </td>

                            <?php
                            if($paciente == ""){

                            
                            ?>

                            <td class="text-center"><a class="btn btn-success btn-sm" style="color:#fff" href="agenda.php?<?php echo "medico=$idMedico&paciente=$idpaciente&dia=$dia&hora=$hora&especialidade=$especialidadeMedica_id"?>"  role="button"><i class="fas fa-plus-circle"></i>&nbsp;Adicionar</a> 
                            </td>
                            <?php
                            }else{
                            ?>
                            <td class="text-center"><a class="btn btn-danger btn-sm" style="color:#fff" href="agenda_desmarca.php?<?php echo "medico=$idMedico&paciente=$idpaciente&dia=$dia&hora=$hora&especialidade=$especialidadeMedica_id&id=$id"?>" role="button"><i class="far fa-trash-alt"></i>&nbsp;Desmarcar</a> 
                        </tr>
                                <?php }}
                                }
                            }else{

                            }
                        ?>
                        
                    
                    </tbody>  
                
                </table>
            </div> 
        </div>
    </div>         


<?php include("footer.php"); ?>

<script>
$("#campoEspecialidade").on("change", function(){
    var especialidadeSelecionada = $("#campoEspecialidade").val();
    
    $.ajax({
        url: 'medico_options.php',
        type: 'POST',
        data:{especialidade:especialidadeSelecionada},
        
        beforeSend: function(){
            
            $("#campoMedico").html("Carregando....");
        },
        success: function(data){
            $("#campoMedico").prop("disabled",false);
            $("#campoMedico").html(data);
        },
        error: function(data){
            
            $("#campoMedico").html("Houve erro ao carregar!!!");
        }
    })
})
</script>

<script>
    $(document).ready(function(){
        $('#campoCpf').on('blur', function(){
            var cpfDigitado = $(this).val();
            if (cpfDigitado.length == 14){
                $.ajax({
                    url: 'paciente_consulta_cadastro.php',
                    type: 'POST',
                    data:{cpf:cpfDigitado},
                    beforeSend: function(){
                    
                        $("#campoNome").html("Carregando....");
                    },
                    success: function(data){
                        
                        $("#campoNome").html(data);
                    },
                    error: function(data){
                        $("#novoCadastro").css({'display':'block'});
                        $("#campoNome").html("Houve erro ao carregar!!!");
                    }
                })
            }
        })
        $("#campoCpf").mask("000.000.000-00", {placeholder: "___.___.___-__"});
        $("#campoDia").mask("00/00/0000", {placeholder: "__/__/____"});
    })
</script>

