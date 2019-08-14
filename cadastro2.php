<?php


    require_once('config.php');


    

    if(isset($_POST['email']) && isset($_POST['senha']) && isset($_POST['tipo']) && isset($_POST['nome']) && isset($_POST['celular']) && isset($_POST['registro']) && isset($_POST['especialidade'])) {
        $email = $_POST['email'];
        $senha = $_POST['senha'];
        $tipo = $_POST['tipo'];
        $usuario = $db->usuario()->insert(array('email'=>$email, 'senha'=>$senha, 'tipo'=>$tipo));
        
        $nome = $_POST['nome'];
        $celular = $_POST['celular'];
        $registro = $_POST['registro'];
        $especialidade = $_POST['especialidade'];
        $db->profissional()->insert(array('nome'=>$nome, 'celular'=>$celular, 'registro'=>$registro, 'especialidade'=>$especialidade, 'login_id'=>$usuario));
        header("location: clinica.php");
    }


?>

<?php include("header.php"); ?>

    <div class="cor">
        <div class="container">
            <form class="formulario"  method="post">
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="campoNome">Nome</label>
                        <input type="text" class="form-control" id="campoNome" name="nome" placeholder="Digite seu nome completo">
                    </div>

                    <div class="form-group col-md-6">
                        <label for="campoCelular">Celular</label>
                        <input type="number" class="form-control" id="campoCelular" name="celular" placeholder="Digite seu celular">
                    </div>

                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="campoEspecialidade">Especialidade</label>
                        <input type="text" class="form-control" id="campoEspecialidade" name="especialidade" placeholder="Digite sua especialidade">
                    </div>

                    <div class="form-group col-md-6">
                        <label for="campoRegistro">Registro</label>
                        <input type="number" class="form-control" id="campoRegistro" name="registro" placeholder="Digite seu Registro ou CPF">
                    </div>

                </div>


                <div id="rigth">
                    <button type="submit" id="botao" class="btn">Cadastrar</button>
                </div>
                
            </form>
        </div>
    </div>











<?php include("footer.php"); ?>