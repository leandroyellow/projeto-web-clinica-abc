<?php include("header_administrador.php"); 
require_once('config.php');
require_once('conexao.php');

?>
<div class="cor">
    <div class="container">
        <h2 class="text-center sucesso">Agendar Consulta</h2>
        <form class="formulario" action="agenda2.php" method="post">
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
                    <select class="form-control" name="medico" id="campoMedico" autocomplete="off" required style="display:none">
                        
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
                    <select class="form-control"  name="cpf" id="campoNome" autocomplete="off" required style="display:none">

                    </select>
                    
                </div>
            </div>
            <a href="paciente_cadastro_clinica.php" id="novoCadastro" class="btn btn-warning btn-block" style="display:none">paciente naocadastrado</a>
            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="campoHorario">Horário:</label>
                    <input type="text" class="form-control" name="horario" id="campoHorario" placeholder="Digite data e hora" autocomplete="off" required>
                </div>
            </div>
            <div class="text-right">
                <button type="submit" class="btn" id="botao">Agendar</button>
            </div>
        </form>  

        
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
            $("#campoMedico").css({'display':'block'});
            $("#campoMedico").html("Carregando....");
        },
        success: function(data){
            $("#campoMedico").css({'display':'block'});
            $("#campoMedico").html(data);
        },
        error: function(data){
            $("#campoMedico").css({'display':'block'});
            $("#campoMedico").html("Houve erro ao carregar!!!");
        }
    })
})
</script>

<script>
    $(document).ready(function(){
        $('#campoCpf').on('blur', function(){
            var cpfDigitado = $(this).val();
            
            $.ajax({
                url: 'paciente_consulta_cadastro.php',
                type: 'POST',
                data:{cpf:cpfDigitado},
                beforeSend: function(){
                    $("#campoNome").css({'display':'block'});
                    $("#campoNome").html("Carregando....");
                },
                success: function(data){
                    $("#campoNome").css({'display':'block'});
                    $("#campoNome").html(data);
                },
                error: function(data){
                    $("#novoCadastro").css({'display':'block'});
                    $("#campoNome").html("Houve erro ao carregar!!!");
                }
            })
        })
        $("#campoCpf").mask("000.000.000-00", {placeholder: "___.___.___-__"});
    })
</script>