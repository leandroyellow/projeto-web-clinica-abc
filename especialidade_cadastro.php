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
$mensagemAlerta = '';
if(isset($_GET['msg'])){
if ($_GET['msg'] == 'entrou') {
    $mensagemAlerta = 'Especialidade já cadastrada';
}}


include("header_administrador.php");
?>





    <div class="cor">
        <h2 class="text-center sucesso">Cadastrar Nova Especialidade</h2>
        <div class="container">
            
            <form class="formulario" action="especialidade_cadastro2.php" method="post" enctype="multipart/form-data">
                
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <label for="campoEspecialidade">Categoria:</label>
                        <input type="text" class="form-control" name="especialidade" id="campoEspecialidade" placeholder="Digite uma especialidade" autocomplete="off" required>
                    </div>
                </div>

                <div class="alerta"><?=$mensagemAlerta?></div>
                
                <div class="text-right">
                    <a href="clinica.php" class="btn" id="botao">Voltar</a>
                    <button type="submit" class="btn" id="botao">Cadastar</button>

                </div>
            </form>
            

            <table class="table" style=margin-top:50px;>
                <thead>
                    <tr>
                        <th scope="col">Especialidade</th>
                        <th scope="col" class="text-center">Ação</th>
                    </tr>
                </thead>

                <?php
                    
                    $sql2 = "SELECT DISTINCT profissional.especialidade AS 'cod', especialidades.id, especialidades.especialidade FROM profissional RIGHT JOIN especialidades ON especialidades.id = profissional.especialidade ORDER BY especialidades.especialidade";
                    $Resutado2 = $conexao->query($sql2);
                    while ($leitor = $Resutado2->fetch_assoc()){
                        $id_especialidade = $leitor['id'];
                        $especialidade = $leitor['especialidade'];
                        $cod = $leitor['cod'];
                        
                        if($cod == ''){
                            ?>
                            <tr>
                                <td><?php echo  $especialidade ?> </td>
                                <td class="text-center">
                                    <a class="btn btn-danger btn-sm" style="color:#fff" href="especialidade_deletar.php?id=<?php echo $id_especialidade ?>&nome=<?=$nome?>" role="button"><i class="far fa-trash-alt"></i>&nbsp;Apagar</a>
                                </td>
                            </tr>
                            <?php
                        }else{
                        ?>

                <tr>
                    <td><?php echo  $especialidade ?> </td>
                    <td class="text-center">
                        
                        
                        <a type="button" class="btn btn-warning btn-sm" style="color:#fff" data-toggle="modal" data-target="#especialidadeEditar" data-id="<?php echo $id_especialidade; ?>" data-especialidade="<?php echo $especialidade; ?>"><i class="far fa-edit"></i>&nbsp;Editar</a> 

                    </td>

                </tr>

                <?php }} ?>
                
                    
                
            </table>

        </div>
    </div><!--cor-->

<div class="modal fade" id="especialidadeEditar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Nova mensagem</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form class="formulario" action="especialidade_editar.php" method="post" enctype="multipart/form-data">
          <input type="hidden" name="id" id="id">
          <div class="form-row">
            <div class="form-group col-md-12">
              <label for="campoEspecialidade">Especialidade</label>
              <input type="text" class="form-control" name="especialidade" id="campoEspecialidade" autocomplete="off" required>
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

<?php include("footer.php"); ?>

<script type="text/javascript">
$('#especialidadeEditar').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) // Botão que acionou o modal
  var recipient_id = button.data('id') // Extrai informação dos atributos data-*
  var recipient_especialidade = button.data('especialidade')
  // Se necessário, você pode iniciar uma requisição AJAX aqui e, então, fazer a atualização em um callback.
  // Atualiza o conteúdo do modal. Nós vamos usar jQuery, aqui. No entanto, você poderia usar uma biblioteca de data binding ou outros métodos.
  var modal = $(this)
  modal.find('.modal-title').text('ID: ' + recipient_id)
  modal.find('#id').val(recipient_id)
  modal.find('#campoEspecialidade').val(recipient_especialidade)
  
})</script>