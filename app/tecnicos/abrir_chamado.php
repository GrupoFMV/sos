<?php 
@session_start();
if(!empty($_SESSION['id'])){
	
}else{
	header("Location: logar.php");	
}

$cmdt = "select * from chamados c 
INNER JOIN clientes cl ON c.chamado_cliente = cl.cliente_id 
INNER JOIN os o ON c.chamado_os = o.os_id 
inner join users u  ON c.chamado_tecnico = u.user_id
where  c.chamado_status = '2' and c.chamado_id = $id    ";
$tarefas = mysqli_query($conn, $cmdt);
$totaltarefas = mysqli_num_rows($tarefas);
$tarefa = mysqli_fetch_array($tarefas);






?>



 <div class="col-12 mb-4">
 <h1><span class="font-weight-light small">Abrir novo chamado </span></h1> <br>


                           

                        <div class="card">
                            <div class="card-body">
                            
                            </div>
                        </div>  </div>

                        <div class="col-12 mb-4">
                        <div class="card">
                            <div class="card-body">
                               
                                <p class="mb-4"><strong> Informe o cliente: </strong>  
                            </p>
                               

<?php

$totalabertos = '';
$cmdus = "select * from clientes where cliente_lixeira = '1' order by cliente_fantasia    ";
$tarefaus = mysqli_query($conn, $cmdus);
while($users2 = mysqli_fetch_array($tarefaus)) {
 
?>
<div class="row">
<div class="col-9">
<strong><?php echo $users2['cliente_fantasia'] ?></strong> <br>
</div>
<div class="col-3">
   <a href="abrir_chamado2/<?php echo $users2[cliente_id] ?>">Abrir</a>
</div>

</div>

<hr>
<?php } ?>


                            </div>
                        </div>  </div>


                 

                        
                        <div class="col-12 mb-4 text-center">


                        <?php if($totaleventos >= '1') { ?>
                                <div class="alert alert-primary" role="alert">
                               Em deslocamento
                            </div>

                            <a  href="abrir_chamado2/<?php echo $tarefa[cliente_id] ?>/<?php echo $tarefa[os_status] ?>/<?php echo $evento[id] ?>"> <button class="btn btn-success dropdown-toggle" type="button" >
                                   Iniciar Atendimento
                                </button></a>
<?php } else {  ?>



                                

                                <?php } ?>
                    </div>
                            