<?php


    require_once('config.php');
    require_once('conexao.php');

    
    

   
        

        
        $registro = 3333;
        
        
        $sql = "SELECT registro FROM profissional WHERE registro = $registro";
        $resultado = $conexao->query($sql);

        

        if($resultado->num_rows > 0){

        echo $sql;


    

        }else{
            
           
            echo "cadastrou";
        }
    
        


?>
