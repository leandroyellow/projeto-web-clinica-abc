<?php include("header_administrador.php"); ?>

    <div class="cor">
        <div class="container">
            <h2 class="text-center sucesso">Agenda</h2>
            <table class="table">
                <caption></caption>
                <thead>
                    <tr>
                        <th>Data</th>
                        <th>Horário</th>
                        <th>Paciente</th>
                        <th>Médico</th>
                        <th class="text-center">Situação</th>
                    </tr>        
                </thead>

                <tbody>
                    <?php 
                        for($j=0 ; $j<10 ; $j++){
                    ?>
                        <tr>
                            <td>23/08/2019</td>
                            <td><?php echo $j+8?>:00</td>
                            <td>Teste</td>
                            <td>Dr.Teste</td>
                            <td class="text-center"><a class="btn btn-success btn-sm" style="color:#fff" href="agenda.php" role="button"><i class="fas fa-plus-circle"></i>&nbsp;Adicionar</a> 
                            </td>
                        </tr>
                     <?php 
                      }
                    ?>
                
                </tbody>  
            
            </table>
         </div>
    </div>         


<?php include("footer.php"); ?>