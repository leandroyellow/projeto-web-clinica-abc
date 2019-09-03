<?php include("header_administrador.php"); ?>

    <div class="cor">
        <div class="container">
            <h2 class="text-center sucesso">Cadastros</h2>
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
                    $sql = "SELECT paciente.usuario_id, paciente.nome, usuario.email, usuario.tipo, paciente.cpf, paciente.sexo, paciente.nascimento, paciente.telefone, paciente.celular, paciente.endereco, paciente.numero, paciente.bairro, paciente.cidade, paciente.estado, paciente.cep FROM paciente, usuario WHERE usuario.id = paciente.usuario_id UNION SELECT profissional.usuario_id, profissional.nome, usuario.email, usuario.tipo, profissional.registro AS cpf, '' AS sexo, '' AS nascimento, '' AS telefone, profissional.celular, '' AS endereco, '' AS numero, '' AS bairro, '' AS cidade, '' AS estado, '' AS cep FROM profissional, usuario WHERE usuario.id = profissional.usuario_id";
                    $busca = $conexao->query($sql);

                    while ($leitor = $busca->fetch_assoc()){
                        $id = $leitor['usuario_id'];
                        $nome = $leitor['nome'];
                        $email = $leitor['email'];
                        $tipo = $leitor['tipo'];
                        $cpf = $leitor['cpf'];
                        $sexo = $leitor['sexo'];
                        $nascimento = $leitor['nascimento'];
                        $telefone = $leitor['telefone'];
                        $celular = $leitor['celular'];
                        $endereco = $leitor['endereco'];
                        $numero = $leitor['numero'];
                        $bairro = $leitor['bairro'];
                        $cidade = $leitor['cidade'];
                        $estado = $leitor['estado'];
                        $cep = $leitor['cep'];
                ?>

                <tr>
                    <td><?php echo  $nome ?> </td>
                    <td><?php echo $email ?> </td>
                    <td class="text-center"><?php echo $tipo ?> </td>
                    <td class="text-center"><a class="btn btn-warning btn-sm" style="color:#fff" href="editar_pagina.php?id=<?php echo $id ?>" role="button"><i class="far fa-edit"></i>&nbsp;Editar</a> 
                    <a class="btn btn-danger btn-sm" style="color:#fff" href="delete_usuario.php?id=<?php echo $id ?>" role="button"><i class="far fa-trash-alt"></i>&nbsp;Excluir</a>
                    
                    <a type="button" class="btn btn-warning btn-sm" style="color:#fff" data-toggle="modal" data-target="#exampleModal" data-id="<?php echo $id; ?>" data-nome="<?php echo $nome; ?>" data-email="<?php echo $email; ?>" data-tipo="<?php echo $tipo; ?>" data-cpf="<?php echo $cpf; ?>" data-sexo="<?php echo $sexo; ?>" data-nascimento="<?php echo $nascimento; ?>" data-telefone="<?php echo $telefone; ?>" data-celular="<?php echo $celular; ?>" data-endereco="<?php echo $endereco; ?>" data-numero="<?php echo $numero; ?>" data-bairro="<?php echo $bairro; ?>" data-cidade="<?php echo $cidade; ?>" data-estado="<?php echo $estado; ?>" data-cep="<?php echo $cep; ?>"><i class="far fa-edit"></i>&nbsp;Editar</a> 
                    
                    </td>

                </tr>

                    <?php } ?>
            
                    
                
            </table>
        </div>
    </div>




    

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Nova mensagem</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Destinatário:</label>
            <input type="text" class="form-control" id="recipient-name">
          </div>
          <div class="form-group">
            <label for="message-text" class="col-form-label">Mensagem:</label>
            <textarea class="form-control" id="message-text"></textarea>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
        <button type="button" class="btn btn-primary">Enviar</button>
      </div>
    </div>
  </div>
</div>



<?php include("footer.php");  ?>
<script type="text/javascript">
$('#exampleModal').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) // Botão que acionou o modal
  var recipient = button.data('id') // Extrai informação dos atributos data-*
  // Se necessário, você pode iniciar uma requisição AJAX aqui e, então, fazer a atualização em um callback.
  // Atualiza o conteúdo do modal. Nós vamos usar jQuery, aqui. No entanto, você poderia usar uma biblioteca de data binding ou outros métodos.
  var modal = $(this)
  modal.find('.modal-title').text('Nova mensagem para ' + recipient)
  modal.find('.modal-body input').val(recipient)
})</script>