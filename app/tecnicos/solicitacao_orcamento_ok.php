<?php 
@session_start();
if(!empty($_SESSION['id'])){
	
}else{
	header("Location: logar.php");	
}

$cmdt = "select * from chamados c INNER JOIN clientes cl ON c.chamado_cliente = cl.cliente_id where c.chamado_tecnico ='$user[user_id]' 
and c.chamado_status = '2' or c.chamado_status = '7'   ";
$tarefas = mysqli_query($conn, $cmdt);
$totaltarefas = mysqli_num_rows($tarefas);

?>
<div class="col-12  mt-3 mb-4">
<p class="text-uppercase font-weight-bold text-primary">Ok, <?php echo $user[user_nome] ?></p>
<h1><span class="font-weight-light small">Solicitação enviada com </span> <b class="text-primary">sucesso!</b></h1>
</div>


<a href="home" class="btn btn-primary rounded">Voltar</a>
