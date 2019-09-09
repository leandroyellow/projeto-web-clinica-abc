<?php include("header_administrador.php"); ?>

    <div class="cor">
        <div class="container">
            <h2 class="text-center sucesso">Cadastros</h2>
            <form class="form-inline" method="POST">
              <input class="form-control mr-sm-2" name="pesquisa" type="search" placeholder="Pesquisa por nome" aria-label="Pesquisa">
              <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Pesquisa</button>
            </form>
            <table class="table" style=margin-top:50px;>
                <thead>
                    <tr>
                        <th scope="col" >Nome Usuário</th>
                        <th scope="col">Email</th>
                        <th scope="col" class="text-center">Permissão</th>
                        <th scope="col" class="text-center">Ação</th>
                    </tr>
                </thead>

                <?php
                    require ('conexao.php');
                    $sql = "SELECT usuario.id, usuario.email, usuario.tipo, profissional.nome AS profissional, especialidades.especialidade, especialidades.id AS id_especialidade,  profissional.celular AS celularProfissional, profissional.registro, profissional.arquivo, paciente.nome AS paciente, paciente.cpf, paciente.sexo, paciente.nascimento, paciente.telefone, paciente.celular AS celularPaciente, paciente.endereco, paciente.numero, paciente.bairro, paciente.cidade, paciente.estado, paciente.cep FROM usuario LEFT JOIN profissional ON usuario.id = profissional.usuario_id LEFT JOIN paciente ON paciente.usuario_id = usuario.id LEFT JOIN especialidades ON especialidades.id = profissional.especialidade ORDER BY profissional.nome, paciente.nome";

                    if (array_key_exists('pesquisa', $_POST) && $_POST['pesquisa'] != '') {
                      $pesquisa = $_POST['pesquisa'];
                      $sql = "SELECT usuario.id, usuario.email, usuario.tipo, profissional.nome AS profissional, especialidades.especialidade, especialidades.id AS is_especialidade, profissional.celular AS celularProfissional, profissional.registro, profissional.arquivo, paciente.nome AS paciente, paciente.cpf, paciente.sexo, paciente.nascimento, paciente.telefone, paciente.celular AS celularPaciente, paciente.endereco, paciente.numero, paciente.bairro, paciente.cidade, paciente.estado, paciente.cep FROM usuario LEFT JOIN profissional ON usuario.id = profissional.usuario_id LEFT JOIN paciente ON paciente.usuario_id = usuario.id LEFT JOIN especialidades ON especialidades.id = profissional.especialidade WHERE paciente.nome LIKE '%$pesquisa%' OR profissional.nome LIKE '%$pesquisa%' ORDER BY profissional.nome, paciente.nome";
                    }

                    $busca = $conexao->query($sql);
                    $diretorio = "upload/";
                    while ($leitor = $busca->fetch_assoc()){
                        $id = $leitor['id'];
                        $nomePaciente = $leitor['paciente'];
                        $nomeProfissional = $leitor['profissional'];
                        $email = $leitor['email'];
                        $tipo = $leitor['tipo'];
                        $cpf = $leitor['cpf'];
                        $registro = $leitor['registro'];
                        $sexo = $leitor['sexo'];
                        $nascimento = $leitor['nascimento'];
                        $telefone = $leitor['telefone'];
                        $celularProfissional = $leitor['celularProfissional'];
                        $celularPaciente = $leitor['celularPaciente'];
                        $endereco = $leitor['endereco'];
                        $numero = $leitor['numero'];
                        $bairro = $leitor['bairro'];
                        $cidade = $leitor['cidade'];
                        $estado = $leitor['estado'];
                        $cep = $leitor['cep'];
                        $especialidade = $leitor['id_especialidade'];

                        $arquivo = $diretorio . $leitor['arquivo'];
                        $timestamp = date('d-m-Y',  strtotime(str_replace("/", "-", $nascimento)));

                        if($tipo == 3){
                ?>

                <tr>
                    <td><?php echo  $nomePaciente ?> </td>
                    <td><?php echo $email ?> </td>
                    <td class="text-center"><?php echo $tipo ?> </td>
                    <td class="text-center">
                    
                    <a class="btn btn-danger btn-sm" style="color:#fff" href="delete_usuario.php?id=<?php echo $id ?>" role="button"><i class="far fa-trash-alt"></i>&nbsp;Excluir</a>
                    
                    <a type="button" class="btn btn-warning btn-sm" style="color:#fff" data-toggle="modal" data-target="#pacienteModal" data-id="<?php echo $id; ?>" data-nome="<?php echo $nomePaciente; ?>" data-email="<?php echo $email; ?>" data-tipo="<?php echo $tipo; ?>" data-cpf="<?php echo $cpf; ?>" data-sexo="<?php echo $sexo; ?>" data-nascimento="<?php echo $timestamp; ?>" data-telefone="<?php echo $telefone; ?>" data-celular="<?php echo $celularPaciente; ?>" data-endereco="<?php echo $endereco; ?>" data-numero="<?php echo $numero; ?>" data-bairro="<?php echo $bairro; ?>" data-cidade="<?php echo $cidade; ?>" data-estado="<?php echo $estado; ?>" data-cep="<?php echo $cep; ?>"><i class="far fa-edit"></i>&nbsp;Editar</a> 
                    
                    </td>

                </tr>

                <?php }else{ ?>
                <tr>
                  <td><?php echo  $nomeProfissional ?> </td>
                  <td><?php echo $email ?> </td>
                  <td class="text-center"><?php echo $tipo; ?> </td>
                  <td class="text-center">
                                    
                  <a class="btn btn-danger btn-sm" style="color:#fff" href="delete_usuario.php?id=<?php echo $id ?>" role="button"><i class="far fa-trash-alt"></i>&nbsp;Excluir</a>
                  
                  <a type="button" class="btn btn-warning btn-sm" style="color:#fff" data-toggle="modal" data-target="#profissionalModal" data-id="<?php echo $id; ?>" data-nome="<?php echo $nomeProfissional; ?>" data-email="<?php echo $email; ?>" data-tipo="<?php echo $tipo; ?>" data-cpf="<?php echo $registro; ?>" data-sexo="<?php echo $sexo; ?>" data-nascimento="<?php echo $timestamp; ?>" data-telefone="<?php echo $telefone; ?>" data-celular="<?php echo $celularProfissional; ?>" data-endereco="<?php echo $endereco; ?>" data-numero="<?php echo $numero; ?>" data-bairro="<?php echo $bairro; ?>" data-cidade="<?php echo $cidade; ?>" data-estado="<?php echo $estado; ?>" data-cep="<?php echo $cep; ?>" data-especialidade="<?php  echo $especialidade; ?>" data-arquivo="<?php echo $arquivo; ?>"><i class="far fa-edit"></i>&nbsp;Editar</a> 
                  
                  </td>
                </tr>
                <?php } 
                }//while ?>
                    
                
            </table>
        </div>
    </div>
    



    

<div class="modal fade" id="pacienteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Nova mensagem</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form class="formulario" action="paciente_editar.php" method="post" enctype="multipart/form-data">
          <input type="hidden" name="id" id="id">
          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="campoEmail">Email</label>
              <input type="email" class="form-control" name="email" id="campoEmail" placeholder="Digite seu email" autocomplete="off" required>
            </div>
            <div class="form-group col-md-6">
              <label for="campoEmail2">Repetir email</label>
              <input type="email" class="form-control" name="email" id="campoEmail2" placeholder="Repetir seu email" autocomplete="off" required oninput="validaEmail(this, 'campoEmail')">
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="campoNome">Nome</label>
              <input type="text" class="form-control" name="nome" id="campoNome" placeholder="Digite seu nome" autocomplete="off" required>
            </div>
            <div class="form-group col-md-6">
              <label for="campoCpf">CPF</label>
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
              <label for="campoNascimento">Nascimento</label>
              <input  class="form-control" name="nascimento" id="campoNascimento" placeholder="Digite seu nascimento" autocomplete="off" required>
            </div>
            <div class="form-group col-md-4">
              <label for="campoTelefone">Telefone</label>
              <input class="form-control"  name="telefone" id="campoTelefone" placeholder="Digite seu telefone" autocomplete="off" required>
            </div>
            <div class="form-group col-md-4">
              <label for="campoCelular">Celular</label>
              <input class="form-control"  name="celular" id="campoCelular" placeholder="Digite seu celular" autocomplete="off" required>
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-md-2">
              <label for="campoCep">CEP</label>
              <input class="form-control" id="campoCep" name="cep" autocomplete="off" required>
            </div>
            <div class="form-group col-md-6">
              <label for="campoCidade">Cidade</label>
              <input type="text" class="form-control cep" id="campoCidade" name="cidade" id="campoCidade" placeholder="Digite sua cidade" autocomplete="off" required>
            </div>
            <div class="form-group col-md-4">
              <label for="campoEstado">Estado</label>
              <select id="campoEstado" class="form-control cep" name="estado" autocomplete="off" required>
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
              <label for="campoEndereco">Endereço</label>
              <input type="text" class="form-control cep" name="endereco" id="campoEndereco" placeholder="Digite seu endereço" autocomplete="off" required>
            </div>
            <div class="form-group col-md-2">
              <label for="campoNumero">Número</label>
              <input type="number" class="form-control cep"  name="numero" id="campoNumero" autocomplete="off" required>
            </div>
            <div class="form-group col-md-4">
              <label for="campoBairro">Bairro</label>
              <input type="text" class="form-control cep"  name="bairro" id="campoBairro" placeholder="Digite seu bairro" autocomplete="off" required>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
            <button type="submit" class="btn" id="botao">Salvar</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="profissionalModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Nova mensagem</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form class="formulario" action="profissional_editar.php" method="post" enctype="multipart/form-data">
          <input type="hidden" name="id" id="id">
          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="campoEmail">Email</label>
              <input type="email" class="form-control" name="email" id="campoEmailMedico" placeholder="Digite seu email" autocomplete="off" required>
            </div>
            <div class="form-group col-md-6">
              <label for="campoEmail2">Repetir email</label>
              <input type="email" class="form-control" name="email" id="campoEmailMedico2" placeholder="Repetir seu email" autocomplete="off" required oninput="validaEmail(this, 'campoEmailMedico')">
            </div>
          </div>
          <div class="custom-control custom-radio">
            <input type="radio" id="radio1" name="tipo" class="custom-control-input" value="1" required>
            <label class="custom-control-label" for="radioAdm">Administração</label>
          </div>
          <div class="custom-control custom-radio">
            <input type="radio" id="radio2" name="tipo" class="custom-control-input" value="2" required>
            <label class="custom-control-label" for="radioMedico">Médico</label>
          </div>
          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="campoNome">Nome</label>
              <input type="text" class="form-control" id="campoNome" name="nome" placeholder="Digite seu nome" autocomplete="off" required>
            </div>
            <div class="form-group col-md-6">
              <label for="campoCelular">Celular</label>
              <input  class="form-control" id="campoCelular" name="celular" placeholder="Digite seu celular" autocomplete="off" required>
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="campoEspecialidade">Especialidade</label>
              <select class="form-control" name="especialidade" id="campoEspecialidade" autocomplete="off" required>
                <option selected>Selecione a especialidade</option>
                <?php 
                  $select = "SELECT DISTINCT * FROM especialidades ORDER BY especialidade";
                  $resultado = $conexao->query($select);

                  foreach($resultado as $especialidades){
                      echo '<option value="'.$especialidades['id'].'">'. utf8_encode ($especialidades['especialidade']) .'</option>';
                  }
                    
                ?>
                
              </select>
            </div>
            <div class="form-group col-md-6">
              <label for="campoRegistro">Registro</label>
              <input type="number" class="form-control" id="campoRegistro" name="registro" placeholder="Digite seu Registro ou CPF" autocomplete="off" required >
            </div>
          </div>
          <div class="form-row">
            <div class="form-goup col-md-6">
              <img  id="foto">
            </div>
            <div class="form-group col-md-6">
              <label for="fotoMedico">Selecione a foto do médico</label>
              <input type="file" class="form-control-file btn botao" id="fotoMedico" name="arquivo" required>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
            <button type="submit" class="btn" id="botao">Salvar</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>


<?php include("footer.php");  ?>
<script type="text/javascript">
$('#pacienteModal').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) // Botão que acionou o modal
  var recipient_id = button.data('id') // Extrai informação dos atributos data-*
  var recipient_nome = button.data('nome')
  var recipient_email = button.data('email')
  var recipient_tipo = button.data('tipo')
  var recipient_cpf = button.data('cpf')
  var recipient_sexo = button.data('sexo')
  var recipient_nascimento = button.data('nascimento')
  var recipient_telefone = button.data('telefone')
  var recipient_celular = button.data('celular')
  var recipient_endereco = button.data('endereco')
  var recipient_numero = button.data('numero')
  var recipient_bairro = button.data('bairro')
  var recipient_cidade = button.data('cidade')
  var recipient_estado = button.data('estado')
  var recipient_cep = button.data('cep')
  // Se necessário, você pode iniciar uma requisição AJAX aqui e, então, fazer a atualização em um callback.
  // Atualiza o conteúdo do modal. Nós vamos usar jQuery, aqui. No entanto, você poderia usar uma biblioteca de data binding ou outros métodos.
  var modal = $(this)
  modal.find('.modal-title').text('ID: ' + recipient_id)
  modal.find('#id').val(recipient_id)
  modal.find('#campoNome').val(recipient_nome)
  modal.find('#campoEmail').val(recipient_email)
  modal.find('#campoTipo').val(recipient_tipo)
  modal.find('#campoCpf').val(recipient_cpf)
  modal.find('#campoSexo' + recipient_sexo).prop('checked', true)
  modal.find('#campoNascimento').val(recipient_nascimento)
  modal.find('#campoTelefone').val(recipient_telefone)
  modal.find('#campoCelular').val(recipient_celular)
  modal.find('#campoEndereco').val(recipient_endereco)
  modal.find('#campoNumero').val(recipient_numero)
  modal.find('#campoBairro').val(recipient_bairro)
  modal.find('#campoCidade').val(recipient_cidade)
  modal.find('#campoEstado').val(recipient_estado)
  modal.find('#campoCep').val(recipient_cep)
})</script>

<script type="text/javascript">
$('#profissionalModal').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) // Botão que acionou o modal
  var recipient_id = button.data('id') // Extrai informação dos atributos data-*
  var recipient_nome = button.data('nome')
  var recipient_email = button.data('email')
  var recipient_tipo = button.data('tipo')
  var recipient_cpf = button.data('cpf')
  var recipient_sexo = button.data('sexo')
  var recipient_nascimento = button.data('nascimento')
  var recipient_telefone = button.data('telefone')
  var recipient_celular = button.data('celular')
  var recipient_endereco = button.data('endereco')
  var recipient_numero = button.data('numero')
  var recipient_bairro = button.data('bairro')
  var recipient_cidade = button.data('cidade')
  var recipient_estado = button.data('estado')
  var recipient_cep = button.data('cep')
  var recipient_especialidade = button.data('especialidade')
  var recipient_arquivo = button.data('arquivo')
  // Se necessário, você pode iniciar uma requisição AJAX aqui e, então, fazer a atualização em um callback.
  // Atualiza o conteúdo do modal. Nós vamos usar jQuery, aqui. No entanto, você poderia usar uma biblioteca de data binding ou outros métodos.
  var modal = $(this)
  modal.find('.modal-title').text('ID: ' + recipient_id)
  modal.find('#id').val(recipient_id)
  modal.find('#campoNome').val(recipient_nome)
  modal.find('#campoEmailMedico').val(recipient_email)
  modal.find('#radio' + recipient_tipo).prop('checked', true)
  modal.find('#campoRegistro').val(recipient_cpf)
  modal.find("[name='campoSexo']").val(recipient_sexo)
  modal.find('#campoNascimento').val(recipient_nascimento)
  modal.find('#campoTelefone').val(recipient_telefone)
  modal.find('#campoCelular').val(recipient_celular)
  modal.find('#campoEndereco').val(recipient_endereco)
  modal.find('#campoNumero').val(recipient_numero)
  modal.find('#campoBairro').val(recipient_bairro)
  modal.find('#campoCidade').val(recipient_cidade)
  modal.find('#campoEstado').val(recipient_estado)
  modal.find('#campoCep').val(recipient_cep)
  //modal.find('#campoEspecialidade').val(["Administrador"]);
  modal.find('#campoEspecialidade').val([recipient_especialidade])
  modal.find('#foto').prop('src', recipient_arquivo)
})</script>

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
    function validaEmail (input, comp){ 
	    if (input.value != document.getElementById(comp).value) {
            input.setCustomValidity('Repita o email corretamente');
        } else {
            input.setCustomValidity('');
        }
    } 
</script>
