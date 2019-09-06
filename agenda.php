<?php //include("header_administrador.php"); 
require_once('config.php');
require_once('conexao.php');


if (isset($_GET['paciente'])&&isset($_GET['medico'])&&isset($_GET['dia'])&&isset($_GET['hora'])) {
    $paciente = $_GET['paciente'];
    $medico = $_GET['medico'];
    $dia = $_GET['dia'];
    $hora = $_GET['hora'];
    $especialidade = $_GET['especialidade'];

    $timestamp = date('Y-m-d',  strtotime(str_replace("/", "-", $dia))); 
     
    
    //$db->agenda()->insert(array('paciente_id'=>$paciente, 'profisional_id'=>$medico, 'dia'=>$timestamp, 'hora'=>$hora));

//echo $timestamp;
//echo $db;
$sql = "INSERT INTO agenda(paciente_id, profissional_id, dia, hora) VALUES ($paciente,$medico,'$timestamp','$hora')";
echo $sql;
	if ($conexao->query($sql) == true ) {
        echo "Dado inserido com sucesso";
        header("Location: clinica.php?especialidade=$especialidade&medico=$medico&paciente=$paciente&dia=$dia"  );
echo $especialidade;
        
	}
	else{
		echo "Erro " . $conexao->error;
	}

	$conexao->close();

}





?>
<?php //include("footer.php"); ?>

