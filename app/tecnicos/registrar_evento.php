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


$cmde = "select * from os_eventos  where id_tecnico = '$iduser' and  status = '7'   ";
$eventos = mysqli_query($conn, $cmde);
$totaleventos = mysqli_num_rows($eventos);
$evento2 = mysqli_fetch_assoc($eventos);


?>
<div class="col-12  mt-3 mb-4">

<p class="text-uppercase font-weight-bold text-primary">Bem-vindo, <?php echo $user[user_nome] ?></p>


    <?php if($totaleventos >= '1') { ?>
<h4><span class="font-weight-light small">Você tem eventos a finalizar </span> </h4>

<h3><?php if($evento2['tipo'] == '1') { ?>descanso<?php } ?> <?php if($evento2['tipo'] == '2') { ?>deslocamento<?php } ?> </h3>


<form action="salvar_evento"  method="POST">
    <input type="hidden" value="<?php echo $evento2['id'] ?>" name="evento">
    
    
     <button class="btn btn-info">Finalizar </button>
</form>


<?php } else { ?>

<h4><span class="font-weight-light small">Qual evento deseja registrar? </span> </h4>
</div>

<div class="col-12  mt-3 mb-4">
<form action="registrando_evento" method="post">
<select name="tipo" class="form-control" required>
<option value=""> Escolha</option>

<?php
$cmdl = "select * from os_tipo_eventos ";
$arl = mysqli_query($conn, $cmdl);
while($evento = mysqli_fetch_assoc($arl)) {
?>
 <option value="<?php echo $evento['id_evento'] ?>"> <?php echo $evento['nome_evento'] ?></option>

<?php } ?>

</select> <br>
    <button class="btn btn-info">Registrar </button>

    
</form>
<?php } ?>
</div>

                  
                    <div class="col-12 mb-4 ">
                        <ul class="list-group ">

<?php while($tarefa = mysqli_fetch_array($tarefas)) { ?> 



                            <li class="list-group-item py-4 ">

                            <?php if($tarefa['os_tipo']  == '4') { ?>
                            <div class="alert alert-danger" role="alert">
  EMÈRGENCIA - EMÈRGENCIA - EMÈRGENCIA
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
                        <a href="ver_chamado/<?php echo $tarefa['chamado_id'] ?>" class="btn btn-primary rounded">Acessar</a>
                        <?php }?>
                    </div>
                            
                            </li>
                           
                           <?php } ?>


                        </ul>
                    </div>