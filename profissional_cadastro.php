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
$senha = $_SESSION['senha'];
$id = $_SESSION['id'];

$sql = "SELECT profissional.id, profissional.nome FROM profissional WHERE profissional.usuario_id = $id";

$resultado = $conexao->query($sql);
    
$row = mysqli_fetch_assoc($resultado);

$nome = $row['nome'];


include("header_administrador.php");
?>





    <div class="cor">
        <h2 class="text-center sucesso">Cadastro do Profissional</h2>
        <div class="container tamanhoContainer">
            
            <form class="formulario" action="profissional_cadastro2.php" method="post" enctype="multipart/form-data">
                
            <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="campoEmail">Email:</label>
                        <input type="email" class="form-control" name="email" id="campoEmail" placeholder="Digite seu email" autocomplete="off" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="campoSenha">Senha:</label>
                        <input type="password" class="form-control"  name="senha" id="campoSenha" placeholder="Digite uma senha" autocomplete="off" required>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="campoEmail2">Repetir email:</label>
                        <input type="email" class="form-control" name="email" id="campoEmail2" placeholder="Repetir seu email" autocomplete="off" required oninput="validaEmail(this)">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="campoSenha2">Repetir senha:</label>
                        <input type="password" class="form-control"  name="senha" id="campoSenha2" placeholder="Repita sua senha" autocomplete="off" required oninput="validaSenha(this)">
                    </div>
                </div>

                <div class="custom-control custom-radio">
                    <input type="radio" id="radioAdm" name="tipo" class="custom-control-input" value="1" required>
                    <label class="custom-control-label" for="radioAdm">Administração</label>
                </div>
                <div class="custom-control custom-radio">
                    <input type="radio" id="radioMedico" name="tipo" class="custom-control-input" value="2" required>
                    <label class="custom-control-label" for="radioMedico">Médico</label>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="campoNome">Nome:</label>
                        <input type="text" class="form-control" id="campoNome" name="nome" placeholder="Digite seu nome" autocomplete="off" required>
                    </div>

                    <div class="form-group col-md-6">
                        <label for="campoCelular">Celular:</label>
                        <input  class="form-control" id="campoCelular" name="celular" placeholder="Digite seu celular" autocomplete="off" required>
                    </div>

                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="campoEspecialidade">Especialidade:</label>
                        

                        <select class="form-control" name="especialidade" id="campoEspecialidade" autocomplete="off" required>
                        <option selected>Selecione a especialidade</option>
                        <?php 
                            $select = "SELECT * FROM especialidades ORDER BY especialidade";
                            $resultado = $conexao->query($select);

                            foreach($resultado as $especialidades){
                                echo '<option value="'. $especialidades['id'].'">'.utf8_encode($especialidades['especialidade']).'</option>';
                            }
                            
                        ?>
                        
                        </select>

                    </div>

                    <div class="form-group col-md-6">
                        <label for="campoRegistro">Registro:</label>
                        <input type="number" class="form-control" id="campoRegistro" name="registro" placeholder="Digite seu Registro ou CPF" autocomplete="off" required >
                    </div>

                </div>

                <div class="form-group">
                    <label for="fotoMedico">Selecione a foto do médico:</label>
                    <input type="file" class="form-control-file btn botao" id="fotoMedico" name="arquivo" required>
                </div>

                <div class="text-right">
                    <a href="clinica.php" class="btn" id="botao">Voltar</a>
                    <button type="submit" class="btn" id="botao">Cadastar</button>

                </div>
                
            </form>
        </div>
    </div><!--cor-->

<?php include("footer.php"); ?>

<script>
    $(document).ready(function(){
        $('#campoCep').on('blur', function(){
            var cep = $(this).val().replace(/\D/g, '');
            if (cep != '') {
                var validaCEP = /^[0-9]{8}$/;
                if (validaCEP.test(cep)) {
                    $(":input.cep").val("...");
                    $.getJSON("https://viacep.com.br/ws/"+ cep +"/json/?callback=?", function(data){
                        $(":input.cep").val("");
                        if (!("erro" in data)) {
                            $("#campoEndereco").val(data.logradouro);
                            $("#campoBairro").val(data.bairro);
                            $("#campoCidade").val(data.localidade);
                            $("#campoEstado").val(data.uf);
                        } else {
                            alert("CEP não encontrado");
                        }
                    });
                }
            }
        });
        $("#campoCep").mask("00000-000", {placeholder: "_____-___"});
        $("#campoTelefone").mask("(00) 0000-0000", {placeholder: "(__) ____-____"});
        $("#campoCelular").mask("(00) 00000-0000", {placeholder: "(__) _____-____"});
        $("#campoCpf").mask("000.000.000-00", {placeholder: "___.___.___-__"});
    });
</script>

<script>
    

    function validaSenha (input){ 
	    if (input.value != document.getElementById('campoSenha').value) {
            input.setCustomValidity('Repita a senha corretamente');
        } else {
            input.setCustomValidity('');
        }
    } 

    function validaEmail (input){ 
	    if (input.value != document.getElementById('campoEmail').value) {
            input.setCustomValidity('Repita o email corretamente');
        } else {
            input.setCustomValidity('');
        }
    } 

    
    
</script>