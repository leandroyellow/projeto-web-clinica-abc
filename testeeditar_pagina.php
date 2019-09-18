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
                    <input type="text" class="form-control" id="campoNome" name="nome" placeholder="Digite seu nome" autocomplete="off" required value="<?=$nome?>">
                </div>
                <div class="form-group col-md-6">
                    <label for="campoCelular">Celular:</label>
                    <input  class="form-control" id="campoCelular" name="celular" placeholder="Digite seu celular" autocomplete="off" required value="<?=$celular?>">
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
                                echo '<option value="'. $especialidades['id'].'">'.$especialidades['especialidade'].'</option>';
                            }
                        ?>
                    </select>
                </div>
                <div class="form-group col-md-6">
                    <label for="campoRegistro">Registro:</label>
                    <input type="number" class="form-control" id="campoRegistro" name="registro" placeholder="Digite seu Registro ou CPF" autocomplete="off" required >
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
    
}