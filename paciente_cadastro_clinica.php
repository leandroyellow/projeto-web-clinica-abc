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


include("header_administrador.php");
?>
    
    <div class="cor">
        <div class="container">
            <h2 class="text-center sucesso">Cadastro do Paciente</h2>
            <form class="formulario" action="paciente_cadastro_clinica2.php" method="post">
                <input type="hidden" value="<?= $nome?>" name="name">   
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
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="campoNome">Nome:</label>
                        <input type="text" class="form-control" name="nome" id="campoNome" placeholder="Digite seu nome" autocomplete="off" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="campoCpf">CPF:</label>
                        <input class="form-control"  name="cpf" id="campoCpf" placeholder="Digite seu CPF" autocomplete="off" required>
                    </div>
                </div>
                <div class="custom-control custom-radio">
                    <input class="custom-control-input" type="radio" name="sexo" id="campoSexoM" value="M" required>
                    <label class="custom-control-label" for="campoSexoM">Masculino</label>
                </div>
                <div class="custom-control custom-radio">
                    <input class="custom-control-input" type="radio" name="sexo" id="campoSexoF" value="F" required>
                    <label class="custom-control-label" for="campoSexoF">Feminino</label>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="campoNascimento">Nascimento:</label>
                        <input  class="form-control" name="nascimento" id="campoNascimento" placeholder="Digite seu nascimento" autocomplete="off" required>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="campoTelefone">Telefone:</label>
                        <input class="form-control"  name="telefone" id="campoTelefone" placeholder="Digite seu telefone" autocomplete="off" required>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="campoCelular">Celular:</label>
                        <input class="form-control"  name="celular" id="campoCelular" placeholder="Digite seu celular" autocomplete="off" required>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-2">
                        <label for="campoCep">CEP:</label>
                        <input class="form-control" id="campoCep" name="cep" autocomplete="off" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="campoCidade">Cidade:</label>
                        <input type="text" class="form-control cep" id="campoCidade" name="cidade" id="campoCidade" placeholder="Digite sua cidade" autocomplete="off" required>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="campoEstado">Estado:</label>
                        <select id="campoEstado" class="form-control cep" name="estado" autocomplete="off" required>
                            <option selected>Selecione o estado:</option>
                            <option>AC</option>
                            <option>AL</option>
                            <option>AP</option>
                            <option>AM</option>
                            <option>BA</option>
                            <option>CE</option>
                            <option>DF</option>
                            <option>ES</option>
                            <option>GO</option>
                            <option>MA</option>
                            <option>MT</option>
                            <option>MS</option>
                            <option>MG</option>
                            <option>PA</option>
                            <option>PB</option>
                            <option>PR</option>
                            <option>PE</option>
                            <option>PI</option>
                            <option>RJ</option>
                            <option>RN</option>
                            <option>RS</option>
                            <option>RO</option>
                            <option>RR</option>
                            <option>SC</option>
                            <option>SP</option>
                            <option>SE</option>
                            <option>TO</option>
                        </select>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="campoEndereco">Endereço:</label>
                        <input type="text" class="form-control cep" name="endereco" id="campoEndereco" placeholder="Digite seu endereço" autocomplete="off" required>
                    </div>
                    <div class="form-group col-md-2">
                        <label for="campoNumero">Número:</label>
                        <input type="number" class="form-control cep"  name="numero" id="campoNumero" autocomplete="off" required>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="campoBairro">Bairro:</label>
                        <input type="text" class="form-control cep"  name="bairro" id="campoBairro" placeholder="Digite seu bairro" autocomplete="off" required>
                    </div>
                </div>
                <div class="text-right">
                <a href="clinica.php" id="botao" class="btn" >Voltar</a>
                    <button type="submit" class="btn" id="botao">Cadastrar</button>
                </div>
            </form>
        </div>
    </div>

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
        $("#campoNascimento").mask("00/00/0000", {placeholder: "__/__/____"});
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