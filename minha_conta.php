<?php session_start();
require('conexao.php');
require('config.php');
$tipo = $_SESSION['tipo'];
$email = $_SESSION['email'];
$senha = $_SESSION['senha'];
$id = $_SESSION['id'];

$sql = "SELECT profissional.id AS 'id_profissional', profissional.nome, profissional.celular, profissional.registro, especialidades.id AS 'id_especialidade', especialidades.especialidade FROM profissional INNER JOIN especialidades ON especialidades.id = profissional.especialidade WHERE profissional.usuario_id = $id";
$Resutado = $conexao->query($sql);

$row = mysqli_fetch_assoc($Resutado);

$id_profissional = $row['id_profissional'];
$nome = $row['nome'];
$celular = $row['celular'];
$registro = $row['registro'];
$id_especialidade = $row['id_especialidade'];
$especialidade = $row['especialidade'];

function selected( $value, $especialidade ){
    return $value==$especialidade ? ' selected="selected"' : '';
}

if($tipo == 1){
    if((!isset ($_SESSION['email']) == true) && (!isset ($_SESSION['senha']) == true) && (!isset ($_SESSION['id']) == true) || $_SESSION['tipo'] != 1 ){
        unset($_SESSION['email']);
        unset($_SESSION['senha']);
        unset ($_SESSION['id']);
        unset ($_SESSION['tipo']);
        header('location:index.php');
    }
    $botaoVoltar = 'clinica.php';

    include("header_administrador.php");
}
elseif($tipo == 2){
    if((!isset ($_SESSION['email']) == true) && (!isset ($_SESSION['senha']) == true) && (!isset ($_SESSION['id']) == true) || $_SESSION['tipo'] != 2 ){
      unset($_SESSION['email']);
      unset($_SESSION['senha']);
      unset ($_SESSION['id']);
      unset ($_SESSION['tipo']);
      header('location:index.php');
    }
      $botaoVoltar = 'medico.php';
    
    include("header_medico.php");
}
elseif($tipo == 3){
    if((!isset ($_SESSION['email']) == true) && (!isset ($_SESSION['senha']) == true) && (!isset ($_SESSION['id']) == true) || $_SESSION['tipo'] != 3 ){
      unset($_SESSION['email']);
      unset($_SESSION['senha']);
      unset ($_SESSION['id']);
      unset ($_SESSION['tipo']);
      header('location:index.php');
    }
    
    $botaoVoltar = 'site.php';
    
    $sql = "SELECT paciente.id, paciente.nome, paciente.cpf, paciente.sexo, paciente.nascimento, paciente.telefone, paciente.celular, paciente.endereco, paciente.numero, paciente.bairro, paciente.cidade, paciente.estado, paciente.cep FROM paciente WHERE paciente.usuario_id = $id";
    $resultado = $conexao->query($sql);
    $row = mysqli_fetch_assoc($resultado);

    $id_paciente = $row['id'];
    $nome = $row['nome'];
    $cpf = $row['cpf'];
    $sexo = $row['sexo'];
    $nascimento = $row['nascimento'];
    $nascimentoBR = date('d-m-Y', strtotime(str_replace("/", "-", $nascimento)));
    $telefone = $row['telefone'];
    $celular = $row['celular'];
    $endereco = $row['endereco'];
    $numero = $row['numero'];
    $bairro = $row['bairro'];
    $cidade = $row['cidade'];
    $estado = $row['estado'];
    $cep = $row['cep'];
        
    include("header_paciente.php");
}
else{
    unset($_SESSION['email']);
    unset($_SESSION['senha']);
    unset ($_SESSION['id']);
    unset ($_SESSION['tipo']);
    header('location:index.php');
}

if($tipo == 1 || $tipo == 2){
?>
<div class="cor">
    <h2 class="text-center sucesso">Minha conta</h2>
    <div class="container">
        <form class="formulario" action="minha_conta2.php" method="post" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?=$id;?>">
            <input type="hidden" name="nome" value="<?=$nome?>">
            <input type="hidden" name="tipo" value="<?=$tipo?>">
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="campoEmail">Email:</label>
                    <input type="email" class="form-control" name="email" id="campoEmail" placeholder="Digite seu email" autocomplete="off" required value="<?=$email?>">
                </div>
                <div class="form-group col-md-6">
                    <label for="campoEmail2">Repetir email:</label>
                    <input type="email" class="form-control" name="email" id="campoEmail2" placeholder="Repetir seu email" autocomplete="off" required oninput="validaEmail(this)">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="campoNome">Nome:</label>
                    <input type="text" class="form-control" id="campoNome" name="nomeAtual" placeholder="Digite seu nome" autocomplete="off" required value="<?=$nome?>">
                </div>
                <div class="form-group col-md-6">
                    <label for="campoCelular">Celular:</label>
                    <input  class="form-control" id="campoCelular" name="celular" placeholder="Digite seu celular" autocomplete="off" required value="<?=$celular?>">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="campoEspecialidade">Especialidade:</label>
                    <select class="form-control" name="especialidade" id="campoEspecialidade" autocomplete="off" required >
                        <option selected>Selecione a especialidade</option>
                        <?php 
                            $select = "SELECT * FROM especialidades ORDER BY especialidade";
                            $resultado = $conexao->query($select);
                            foreach($resultado as $especialidades){
                                $cod = $especialidades['id'];
                                $nomeEspecialidade = $especialidades['especialidade'];
                                //echo '<option value="'. $especialidades['id'].'">'.utf8_encode($especialidades['especialidade']).'</option>';
                                
                            
                        ?>
                        <option value="<?=$cod?>" <?php echo selected('$nomeEspecialidade', '$especialidade'); ?> ><?=utf8_encode($nomeEspecialidade)?></option>
                        <?php } ?>

                    </select>
                </div>
                <div class="form-group col-md-6">
                    <label for="campoRegistro">Registro:</label>
                    <input type="number" class="form-control" id="campoRegistro" name="cpf" placeholder="Digite seu Registro ou CPF" autocomplete="off" required value="<?=$registro?>">
                </div>
            </div>
            <div class="text-right">
                <a href="<?=$botaoVoltar?>" class="btn" id="botao">Voltar</a>
                <button type="submit" class="btn" id="botao">Salvar</button>
            </div>
        </form>
    </div>
</div><!--cor-->

<?php include("footer.php"); ?>

<script>
    $(document).ready(function(){
        $("#campoCelular").mask("(00) 00000-0000", {placeholder: "(__) _____-____"});
    });
</script>
<script>
    function validaEmail (input){ 
	    if (input.value != document.getElementById('campoEmail').value) {
            input.setCustomValidity('Repita o email corretamente');
        } else {
            input.setCustomValidity('');
        }
    } 
</script>

<?php }
elseif($tipo == 3){
  echo  $tipo;
  echo  $email;
  echo  $senha;
  echo  $id;
  echo  $id_paciente;
  echo  $nome;
  echo  $cpf;
  echo  $sexo;
  echo  $nascimentoBR;
  echo  $telefone;
  echo  $celular;
  echo  $endereco;
  echo  $numero;
  echo  $bairro;
  echo  $cidade;
  echo  $estado;
  echo  $cep;
?>
  <div class="cor">
        <div class="container">
            <h2 class="text-center sucesso">Cadastro</h2>
            <form class="formulario" action="minha_conta2.php" method="post">
                <input type="hidden" name="id" value="<?=$id;?>">
                <input type="hidden" name="nome" value="<?=$nome?>">
                <input type="hidden" name="tipo" value="<?=$tipo?>">
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="campoEmail">Email:</label>
                        <input type="email" class="form-control" name="email" id="campoEmail" placeholder="Digite seu email" autocomplete="off" required value="<?=$email?>">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="campoEmail">Repitir email:</label>
                        <input type="email" class="form-control" name="email" id="campoEmail" placeholder="Repita seu email" autocomplete="off" required oninput="validaEmail(this)">
                    </div>
                </div>
                
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="campoNome">Nome:</label>
                        <input type="text" class="form-control" name="nomeAtual" id="campoNome" placeholder="Digite seu nome" autocomplete="off" required value="<?=$nome?>">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="campoCpf">CPF:</label>
                        <input class="form-control"  name="cpf" id="campoCpf" placeholder="Digite seu CPF" autocomplete="off" required value="<?=$cpf?>">
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
                        <input class="form-control" name="nascimento" id="campoNascimento" placeholder="Digite seu nascimento" autocomplete="off" required value="<?=$nascimentoBR?>">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="campoTelefone">Telefone:</label>
                        <input class="form-control"  name="telefone" id="campoTelefone" placeholder="Digite seu telefone" autocomplete="off" required value="<?=$telefone?>">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="campoCelular">Celular:</label>
                        <input class="form-control"  name="celular" id="campoCelular" placeholder="Digite seu celular" autocomplete="off" required value="<?=$celular?>">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-2">
                        <label for="campoCep">CEP:</label>
                        <input class="form-control" id="campoCep" name="cep" autocomplete="off" required value="<?=$cep?>">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="campoCidade">Cidade:</label>
                        <input type="text" class="form-control cep" id="campoCidade" name="cidade" id="campoCidade" placeholder="Digite sua cidade" autocomplete="off" required value="<?=$cidade?>">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="campoEstado">Estado:</label>
                        <select id="campoEstado" class="form-control cep" name="estado" autocomplete="off" required value="<?=$estado?>">
                            <option selected>Selecione o estado</option>
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
                        <input type="text" class="form-control cep" name="endereco" id="campoEndereco" placeholder="Digite seu endereço" autocomplete="off" required value="<?=$endereco?>">
                    </div>
                    <div class="form-group col-md-2">
                        <label for="campoNumero">Número:</label>
                        <input type="number" class="form-control cep"  name="numero" id="campoNumero" autocomplete="off" required value="<?=$numero?>">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="campoBairro">Bairro:</label>
                        <input type="text" class="form-control cep"  name="bairro" id="campoBairro" placeholder="Digite seu bairro" autocomplete="off" required value="<?=$bairro?>">
                    </div>
                </div>
                <div class="text-right">
                <a href="<?=$botaoVoltar?>" id="botao" class="btn" >Voltar</a>
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
<?php
}?>