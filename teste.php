<?php


    require_once('config.php');
    require_once('conexao.php');

    
    
    
    $sql = "SELECT profissional.arquivo FROM profissional WHERE profissional.id = 10  ";
    $resultado = $conexao->query($sql);

    echo($sql);
    $diretorio = "upload/";
    $foto = $diretorio . $resultado['arquivo'];


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
    <img src="<?php echo($foto) ?>" alt="">
    
</body>
</html>

