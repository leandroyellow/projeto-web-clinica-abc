<?php

require_once('config.php');
require_once('conexao.php');



$db->agenda()->insert(array('data_hora'=>$data_hora, 'id_paciente'=>$paciente, 'id_profissional'=>$profissional));




?>