<?php 
@session_start();
if(!empty($_SESSION['id'])){
	
}else{
	header("Location: logar.php");	
}

$cmdt = "select * from chamados c INNER JOIN clientes cl ON c.chamado_cliente = cl.cliente_id
inner join os o ON c.chamado_os = o.os_id
where c.chamado_tecnico ='$user[user_id]' 
and c.chamado_status = '2' or c.chamado_status = '7' or c.chamado_tecnico ='9999' 
and c.chamado_status = '2' or c.chamado_status = '7'    ";
$tarefas = mysqli_query($conn, $cmdt);
$totaltarefas = mysqli_num_rows($tarefas);

$cmdo = "select * from os o 
INNER JOIN clientes cl ON o.os_cliente = cl.cliente_id
WHERE  os_status = 2  ";
$tarefaso = mysqli_query($conn, $cmdo);
$totaltarefaso = mysqli_num_rows($tarefaso);
//echo $totaltarefaso;

?>
 <?php if($user[user_especial] =='2') { ?>
<?php if($totaltarefaso >= '1') { ?> 
<div class="col-12  mt-3 mb-4">
<h1><span class="font-weight-light small"></span> <b class="text-primary"></b> <span class="font-weight-light small">chamado em aberto</span></h1>
</div>

<?PHP while($tarefao = mysqli_fetch_array($tarefaso)) {  ?>
<div class="col-12 mb-4">
<ul class="list-group ">
<li class="list-group-item py-4 ">
<?php echo $tarefao[cliente_fantasia] ?>

</div>

</li>



<?php } ?>

<?php } ?><?php } ?>

<div class="col-12  mt-3 mb-4">
<h1><span class="font-weight-light small">Você tem</span> <b class="text-primary"><?php echo $totaltarefas ?></b> <span class="font-weight-light small">chamados</span></h1>
</div>



<h2 class="block-title">Meus Chamados</h2>
<div class="col-12 mb-4">
<ul class="list-group ">
<?php while($tarefa = mysqli_fetch_array($tarefas)) { 

$cmdd = "select * from os_eventos  where evento_chamado = '$tarefa[chamado_id]' and status = '7'  ";
$tarefasd = mysqli_query($conn, $cmdd);
$totaleventos = mysqli_num_rows($tarefasd);  
?> 



<li class="list-group-item py-4 ">
<?php if($tarefa['os_tipo']  == '4') { ?>
<div class="alert alert-danger" role="alert">
  EMERGÊNCIA - EMERGÊNCIA - EMERGÊNCIA
</div>
<?php } ?>
                            
                                <h5><i class="material-icons text-warning vm mr-2">home</i><?php echo $tarefa['cliente_fantasia'] ?></h5>
                                <p class="mb-0"><strong> Aberto dia: </strong> <?php echo date('d/m/Y H:i:s', strtotime($tarefa[chamado_data_os])); ?> </p>
                                <p class="mb-0"><strong> Direcionado dia: </strong>  <?php echo date('d/m/Y H:i:s', strtotime($tarefa[chamado_data_referencia])); ?> </p>
                            <br>
                                <div class="col-12 mb-4 text-center">
                                    <?php if($tarefa['chamado_status'] == '7') { ?>
                                        <a href="tratar_chamado/<?php echo $tarefa['chamado_id'] ?>" class="btn btn-warning rounded">Em Atendimento</a>
                                        <?php }?>
                        <?php if($tarefa['chamado_status'] == '2') { ?>
                            <?php if($totaleventos >= '1') { ?>
                                <div class="alert alert-primary" role="alert">
                               Em deslocamento
                            </div>
<?php } ?>

                        <a href="ver_chamado/<?php echo $tarefa['chamado_id'] ?>" class="btn btn-primary rounded">Acessar</a>
                        <?php }?>
                    </div>
                            
                            </li>
                           
                           <?php } ?>


                        </ul>
                        
                        </div>
                        <?php if($user[user_especial] =='2') { ?> 

                        <h2 class="block-title">Todos Chamados</h2>

<?php 
$cmdt2 = "select * from chamados c 
INNER JOIN clientes cl ON c.chamado_cliente = cl.cliente_id
inner join os o ON c.chamado_os = o.os_id
inner join users u  ON c.chamado_tecnico = u.user_id

where c.chamado_tecnico <> '$user[user_id]' 
and c.chamado_status = '2' or c.chamado_status = '7' or c.chamado_tecnico ='9999' 
and c.chamado_status = '2' or c.chamado_status = '7' order by c.chamado_tecnico    ";
$tarefas2 = mysqli_query($conn, $cmdt2);
$totaltarefas2 = mysqli_num_rows($tarefas2);

while($tarefa2 = mysqli_fetch_array($tarefas2)) { 

    $cmdd2 = "select * from os_eventos  where evento_chamado = '$tarefa2[chamado_id]' and status = '7'  ";
    $tarefasd2 = mysqli_query($conn, $cmdd2);
    $totaleventos2 = mysqli_num_rows($tarefasd2);  
    ?> 

<div class="col-12 mb-4 ">
<ul class="list-group ">
<li class="list-group-item py-4 ">
<h6><?php echo $tarefa2['user_nome'] ?></h6>


<h6><i class="material-icons text-warning vm mr-2">home</i><?php echo $tarefa2['cliente_fantasia'] ?></h6>
<p class="mb-0"><strong> Aberto dia: </strong> <?php echo date('d/m/Y H:i:s', strtotime($tarefa2[chamado_data_os])); ?> </p>
<p class="mb-0"><strong> Direcionado dia: </strong>  <?php echo date('d/m/Y H:i:s', strtotime($tarefa2[chamado_data_referencia])); ?> </p>
<br>
<div align="center">
<a href="ver_chamado_plantonista/<?php echo $tarefa2['chamado_id'] ?>" class="btn btn-primary rounded">Acessar</a>
</div>
</li>
                            </ul>
</div>

<?php } ?>

                    </div>


                    <?php } ?>        