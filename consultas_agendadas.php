<?php session_start();
require('conexao.php');
require('config.php');
$tipo = $_SESSION['tipo'];
$email = $_SESSION['email'];
$senha = $_SESSION['senha'];
$id = $_SESSION['id'];
$atual = date("Y-m-d"); 

$sql = "SELECT paciente.id, paciente.nome FROM paciente WHERE paciente.usuario_id = $id";

$resultado = $conexao->query($sql);
    
$row = mysqli_fetch_assoc($resultado);

$nome = $row['nome'];



if($tipo == 3){
    if((!isset ($_SESSION['email']) == true) && (!isset ($_SESSION['senha']) == true) && (!isset ($_SESSION['id']) == true) || $_SESSION['tipo'] != 3 ){
      unset($_SESSION['email']);
      unset($_SESSION['senha']);
      unset ($_SESSION['id']);
      unset ($_SESSION['tipo']);
      header('location:index.php');
    }
    $botaoVoltar = 'site.php';
    
    include("header_paciente.php");
    
?>

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
                        <th scope="col" >Data</th>
                        <th scope="col">Hora</th>
                        <th scope="col">Especialidade</th>
                        <th scope="col">Nome do Médico</th>
                        <th scope="col" class="text-center">Ação</th>
                    </tr>
                </thead>

                <?php
                    
                    $sql2 = "SELECT agenda.dia, agenda.hora, paciente.nome AS 'nomePaciente', especialidades.especialidade, profissional.nome AS 'nomeMedico' FROM agenda INNER JOIN paciente ON paciente.id = agenda.paciente_id INNER JOIN profissional ON profissional.id = agenda.profissional_id INNER JOIN especialidades ON especialidades.id = profissional.especialidade WHERE paciente.usuario_id = $id AND dia >= $atual";
                    $Resutado2 = $conexao->query($sql2);
                    while ($leitor = $Resutado2->fetch_assoc()){
                        $dia = $leitor['dia'];
                        $timestamp = date('d-m-Y',  strtotime(str_replace("/", "-", $dia))); 
                        $nomePaciente = $leitor['nomePaciente'];
                        $nomeMedico = $leitor['nomeMedico'];
                        $especialidade = $leitor['especialidade'];
                        $hora = $leitor['hora'];
                        

                        
                ?>

                <tr>
                    <td><?php echo  $timestamp ?> </td>
                    <td><?php echo $hora ?> </td>
                    <td class="text-center"><?php echo $especialidade ?> </td>
                    <td class="text-center"><?= utf8_encode ($nomeMedico) ?> </td>
                    <td class="text-center">
                        <a class="btn btn-danger btn-sm" style="color:#fff" href="#" role="button"><i class="far fa-trash-alt"></i>&nbsp;Cancelar</a>
                    </td>

                </tr>

                <?php } ?>
                
                    
                
            </table>
        </div>
    </div>
    

    <?php


    include("footer.php");

                    }else{
    unset($_SESSION['email']);
    unset($_SESSION['senha']);
    unset ($_SESSION['id']);
    unset ($_SESSION['tipo']);
    header('location:index.php');
}
?>