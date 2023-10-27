<?php 
@session_start();
if(!empty($_SESSION['id'])){
	
}else{
	header("Location: logar.php");	
}

$cmdt = "select * from chamados where chamado_id = $_POST[chamado]  ";
$tarefas = mysqli_query($conn, $cmdt);
$totaltarefas = mysqli_num_rows($tarefas);
$tarefa = mysqli_fetch_array($tarefas);

$cmde = "SELECT * FROM equipamentos e inner join modelos m on e.equipamento_modelo = m.modelo_id inner join marcas ma on e.equipamento_id_marca = ma.marca_id  where e.equipamento_id = $_POST[equipamento] ";
$equipamentos = mysqli_query($conn, $cmde);
$equipamento = mysqli_fetch_array($equipamentos);

?>



 <div class="col-12 mb-4">

 <h3><span class="font-weight-light small">Chamado </span><b>#<?php echo $_POST[chamado] ?></b> OS </span><b>#<?php echo $_POST[os] ?></b></h1> <br>




 <form action="tratar_chamado2" method="POST">
                        <div class="card">
                            <div class="card-body">
                            <span class="text-uppercase font-weight-bold text-primary"> Dados do Equipamento: </span> <br><br>

                            <span class="text font-weight-bold text-black"> Nome: <?php echo $equipamento[equipamento_nome] ?>  </span> <br>
                            <span class="text font-weight-bold text-black"> Marca: <?php echo $equipamento[marca_nome] ?>  </span> <br>
                            <span class="text font-weight-bold text-black"> Modelo: <?php echo $equipamento[modelo_nome] ?>  </span> <br>
                            <span class="text font-weight-bold text-black"> Porta: <?php echo $equipamento[equipamentos_porta] ?>  </span> <br>
                            <span class="text font-weight-bold text-black"> Paradas: <?php echo $equipamento[equipamentos_paradas] ?>  </span> <br>




                            </div>
                        </div>  </div>

</form>
<div class="col-12 mb-4 text-center">


<div align="center">
<form method="post" action="finalizar_chamado"> 
<button class="btn btn-success rounded"> Finalizar </button>
<input name="equipamento" type="hidden" value="<?php echo $_POST[equipamento] ?>">
<input name="os" type="hidden" value="<?php echo $_POST[os] ?>">
<input name="status" type="hidden" value="<?php echo $tarefa[chamado_status] ?>">
<input name="fim" type="hidden" value="<?php echo $tarefa[chamado_id] ?>">
<input name="descricao" type="hidden" value="<?php echo $tarefa[descricao] ?>">
<input name="chamado" type="hidden" value="<?php echo $_POST[chamado] ?>">


</form> 

</div></div>
<!--
<form action="solicitar_orcamento" method="POST">

<div class="col-auto  text-center">
<button class="btn btn-warning rounded"> Solicitar Orçamento </button>
</div>

</div>
<input name="equipamento" type="hidden" value="<?php echo $_POST[equipamento] ?>">
<input name="os" type="hidden" value="<?php echo $_POST[os] ?>">
<input name="status" type="hidden" value="<?php echo $tarefa[chamado_status] ?>">
<input name="chamado" type="hidden" value="<?php echo $tarefa[chamado_id] ?>">
</form>
</div>
-->