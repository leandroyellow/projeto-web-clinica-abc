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
                    $sql = "SELECT paciente.usuario_id, paciente.nome, usuario.email, usuario.tipo FROM paciente, usuario WHERE usuario.id = paciente.usuario_id UNION SELECT profissional.usuario_id, profissional.nome, usuario.email, usuario.tipo FROM profissional, usuario WHERE usuario.id = profissional.usuario_id";
                    $busca = $conexao->query($sql);

                    while ($leitor = $busca->fetch_assoc()){
                        $nome = $leitor['nome'];
                        $email = $leitor['email'];
                        $tipo = $leitor['tipo'];
                        $id = $leitor['usuario_id'];
                    

                ?>

                <tr>
                    <td><?php echo  $nome ?> </td>
                    <td><?php echo $email ?> </td>
                    <td class="text-center"><?php echo $tipo ?> </td>
                    <td class="text-center"><a class="btn btn-warning btn-sm" style="color:#fff" href="editar_pagina.php?id=<?php echo $id ?>" role="button"><i class="far fa-edit"></i>&nbsp;Editar</a> 
                    <a class="btn btn-danger btn-sm" style="color:#fff" href="delete_usuario.php?id=<?php echo $id ?>" role="button"><i class="far fa-trash-alt"></i>&nbsp;Excluir</a></td>

                </tr>

                    <?php } ?>
            
                    
                
            </table>
        </div>
    </div>








<?php include("footer.php");  ?>