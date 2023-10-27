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
 <h1><span class="font-weight-light small">Chamado </span><b>#<?php echo $id ?></b></h1> <br>


                           

                        <div class="card">
                            <div class="card-body">
                            Técnico: <p class="text-uppercase font-weight-bold text-primary"><?php echo $tarefa[user_nome] ?> </p>
                              Cliente:  <p class="text-uppercase font-weight-bold text-primary"><?php echo $tarefa[cliente_fantasia] ?> </p>
                                <p class="mb-4"><?php echo $tarefa[cliente_logradouro] ?> , <?php echo $tarefa[cliente_numero] ?> <?php echo $tarefa[cliente_complemento] ?>
                                <?php echo $tarefa[cliente_bairro] ?> - Cep: <?php echo $tarefa[cliente_cep] ?> <?php echo $tarefa[cliente_cidade] ?> <?php echo $tarefa[cliente_estado] ?>
                                

                            
                            </p>
                               
                            </div>
                        </div>  </div>

                        <div class="col-12 mb-4">
                        <div class="card">
                            <div class="card-body">
                               
                                <p class="mb-4"><strong> Direcionar para: </strong>  
                            </p>
                               

<?php

$totalabertos = '';
$cmdus = "select * from users where user_tipo = '2'    ";
$tarefaus = mysqli_query($conn, $cmdus);
while($users2 = mysqli_fetch_array($tarefaus)) {

$cmdc = "select * from chamados c  
where c.chamado_tecnico = '$users2[user_id]' 
and c.chamado_status = '2' or c.chamado_status = '7' or c.chamado_tecnico ='9999' 
and c.chamado_status = '2' or c.chamado_status = '7'    ";  
$tarefasc= mysqli_query($conn, $cmdc);
$totalabertos = mysqli_num_rows($tarefasc);  
?>
<div class="row">
<div class="col-8">
<strong><?php echo $users2['user_nome'] ?></strong> <br>
Chamados abertos: <?php echo  $totalabertos  ?> <br>
</div>
<div class="col-4">
   <a href="direcionar_os2/<?php echo $id ?>/<?php echo $users2[user_id] ?>" onclick="return confirm('Tem certeza que deseja direcionar o chamado <?php echo $id ?> para o técnico <?php echo $users2['user_nome'] ?>')">Direcionar</a>
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

                            <a  href="iniciar_atendimento/<?php echo $id ?>/<?php echo $tarefa[chamado_os] ?>/<?php echo $tarefa[os_status] ?>/<?php echo $evento[id] ?>"> <button class="btn btn-success dropdown-toggle" type="button" >
                                   Iniciar Atendimento
                                </button></a>
<?php } else {  ?>



                                

                                <?php } ?>
                    </div>
                            