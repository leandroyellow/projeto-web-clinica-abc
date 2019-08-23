<?php include("header_administrador.php"); ?>
<div class="cor">
    <div class="container">
        <h2 class="text-center sucesso">Agendamentos</h2>
        <form class="formulario" action="agenda2.php" method="post">
            <div class="form-group col-md-4">
                <label for="campoNome">Nome:</label>
                <input type="text" class="form-control" name="nome" id="campoNome" placeholder="Digite seu nome" autocomplete="off" required>
            </div>

            <div class="form-group col-md-4">
                    <label for="campoCpf">CPF:</label>
                    <input type="number" class="form-control"  name="cpf" id="campoCpf" placeholder="Digite seu CPF" autocomplete="off" required>
            </div>

            <div class="form-group col-md-4">
                <label for="campoHorario">Horário:</label>
                <input type="text" class="form-control" name="horario" id="campoHorario" placeholder="Digite data e hora" autocomplete="off" required>
            </div>
            
            <button type="submit" class="btn" id="botao">Agendar</button>
        
        </form>     
    </div>
</div>
<?php include("footer.php"); ?>