<?php


    require_once('config.php');
    require_once('conexao.php');

    $nomeMedico = $_POST['medico'];
    $especialidade = $_POST['especialidade'];
    $dia = $_POST['dia'];
    
    
    $sql = "SELECT agenda.hora, profissional.nome, profissional.especialidade, paciente.nome 
    FROM agenda 
    INNER JOIN profissional ON profissional.id = agenda.profissional_id 
    INNER JOIN paciente ON paciente.id = agenda.paciente_id 
    WHERE agenda.dia = '$dia' AND profissional.id = $nomeMedico
    UNION 
    SELECT intervalo.hora, '$especialidade' AS nome, '$especialidade' AS especialidade, '' AS nome 
    FROM intervalo 
    WHERE intervalo.hora NOT IN (SELECT agenda.hora FROM agenda INNER JOIN profissional ON profissional.id = agenda.profissional_id INNER JOIN paciente ON paciente.id = agenda.paciente_id WHERE agenda.dia = '$dia' AND profissional.id = 1) 
    ORDER BY hora";
    $resultado = $conexao->query($sql);

    echo($sql);
    


?>
