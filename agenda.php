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
                            $especialidade = "SELECT DISTINCT especialidade FROM profissional ORDER BY especialidade";
                            $resultado = $conexao->query($especialidade);

                            while($esp = $resultado->fetch_assoc()){
                                $especial = $esp['especialidade'];

                            
                        ?>
                        <option value="<?php $especial; ?>" ><?php echo $especial; ?></option>
                        <?php } ?>
                    </select>
                    
                </div>
                <div class="form-group col-md-8">
                    <label for="campoMedico">Médico:</label>
                    <select class="form-control" name="medico" id="campoMedico" autocomplete="off" required>
                        <option value="">Escolha o médico</option>
                    </select>
                </div>
            </div>

            <div class="form-group col-md-4">
                    <label for="campoCpf">CPF:</label>
                    <input type="number" class="form-control"  name="cpf" id="campoCpf" placeholder="Digite seu CPF" autocomplete="off" required>
            </div>

            <div class="form-group col-md-4">
                <label for="campoHorario">Horário:</label>
                <input type="text" class="form-control" name="horario" id="campoHorario" placeholder="Digite data e hora" autocomplete="off" required>
            </div>
            
            <button type="submit" class="btn" id="botao">Agendar</button>
        
        </form>  

        <script type="text/javascript" src="https://www.google.com/jsapi" ></script>   
        <script type="text/javascript" >
            
            google.load("jquery", "1.4.2");
            
        </script>

        <script type="text/javascript">
        $(function(){
            $('#campoMedico').change(function){
                if($(this).val()){

                    $('#campoMedico').hide();
                    $.getJSON('medico_options.php?search=',{campoEspecialidade: $(this).val(), ajax: 'true'}, function(j){
                        var options = '<option value="">Escolha o médico</option>';
                        for (var i = 0; i < j.length; i++){
                            options += '<option value="' + j[i].id + '">' + j[i].campoMedico + '</option>';
                        }
                        $('#campoMedico').html(options).show();
                        
                    });
                } else{
                    $('#campoMedico').html('<option value="">- Escolha a especialidade -</option>');
                }
            });
        });
        </script>
    </div>
</div>
<?php include("footer.php"); ?>