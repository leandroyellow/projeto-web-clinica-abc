<?php


    require_once('config.php');
    require_once('conexao.php');

    
    
    
    $sql = "SELECT profissional.arquivo FROM profissional WHERE profissional.id > 9  ";
    $resultado = $conexao->query($sql);
    //$row = mysqli_fetch_assoc($resultado);

    
    
    //$foto = $diretorio . $row['arquivo'];
    
    $diretorio = "upload/";

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

<?php 
    while($fotos = $resultado->fetch_assoc()){
        $foto = $fotos['arquivo'];
    
        
    
    ?>
    <img src="<?php echo $diretorio . $foto ?>">
<?php }?>
    
</body>
</html>

