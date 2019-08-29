<?php include("header_administrador.php");
require_once('config.php');
require_once('conexao.php');
?>

    <div class="cor">
        <div class="container">
            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="campoEspecialidade">Especialidade:</label>
                    <select class="form-control" name="especialidade" id="campoEspecialidade" autocomplete="off" required>
                        <option selected>Selecione a especialidade</option>
                        <?php 
                            $select = "SELECT DISTINCT especialidade FROM profissional ORDER BY especialidade";
                            $resultado = $conexao->query($select);

                            foreach($resultado as $especialidades){
                                echo '<option value="'.$especialidades['especialidade'].'">'.$especialidades['especialidade'].'</option>';
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
                    <input class="form-control"  name="cpf" id="campoCpf" placeholder="Digite seu CPF" autocomplete="off" required>
                </div>
                <div class="form-group col-md-8">
                    <label for="campoNome">Nome:</label>
                    <select class="form-control"  name="cpf" id="campoNome" autocomplete="off" required disabled="disabled">

                    </select>
                    
                </div>
            </div>
            <a href="paciente_cadastro_clinica.php" id="novoCadastro" class="btn botao" style="display:none">paciente naocadastrado</a>

            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="campoDia">Data:</label>
                    <input class="form-control"  name="cpf" id="campoDia" placeholder="Digite uma data" autocomplete="off" required>
                </div>
            </div>



            <h2 class="text-center sucesso">Agenda</h2>
            <table class="table">
                <caption></caption>
                <thead>
                    <tr>
                        <th>Data</th>
                        <th>Horário</th>
                        <th>Paciente</th>
                        <th>Médico</th>
                        <th class="text-center">Situação</th>
                    </tr>        
                </thead>

                <tbody>
                    <?php 
                        for($j=0 ; $j<10 ; $j++){
                    ?>
                        <tr>
                            <td>23/08/2019</td>
                            <td><?php echo $j+8?>:00</td>
                            <td>Teste</td>
                            <td>Dr.Teste</td>
                            <td class="text-center"><a class="btn btn-success btn-sm" style="color:#fff" href="agenda.php" role="button"><i class="fas fa-plus-circle"></i>&nbsp;Adicionar</a> 
                            </td>
                        </tr>
                     <?php 
                      }
                    ?>
                
                </tbody>  
            
            </table>
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