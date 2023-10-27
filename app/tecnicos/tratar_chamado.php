<?php 
@session_start();
if(!empty($_SESSION['id'])){
	
}else{
	header("Location: logar.php");	
}

$cmdt = "select * from chamados where chamado_id = $id  ";
$tarefas = mysqli_query($conn, $cmdt);
$totaltarefas = mysqli_num_rows($tarefas);
$tarefa = mysqli_fetch_array($tarefas);
?>



 <div class="col-12 mb-4">
 <h3><span class="font-weight-light small">Chamado </span><b>#<?php echo $id ?></b> OS </span><b>#<?php echo $tarefa[chamado_os] ?></b></h1> <br>


 <form action="tratar_chamado2" method="POST">
                        <div class="card">
                            <div class="card-body">
                            <span class="text-uppercase font-weight-bold text-primary"> Tratar Chamado: </span> <br>

                                <label>Escolha o Equipamento </label>

<select name="equipamento"  class="form-control">
<option value="0">Não informar modelo</option>
<?php 
$sqlchi = "SELECT * FROM equipamentos e inner join modelos m on e.equipamento_modelo = m.modelo_id inner join marcas ma on e.equipamento_id_marca = ma.marca_id  where e.equipamento_id_cliente = $tarefa[chamado_cliente] ";
$resultadochi = mysqli_query($conn, $sqlchi);
while ($linhachi = mysqli_fetch_array($resultadochi)) { ?> 
?>

    <option value="<?php echo $linhachi[equipamento_id] ?>"><?php echo $linhachi[marca_nome] ?> - <?php echo $linhachi[modelo_nome] ?> - <?php echo $linhachi[equipamento_nome] ?>   </option>
<?php } ?>
</select>
<input type="hidden" value="<?php  echo $tarefa[chamado_os] ?>" name="os">
<input type="hidden" value="<?php echo $id ?>" name="chamado">




                            </p> <br>
                            <div class="col-12 mb-4 text-center">
<button class="btn btn-primary rounded"> Avançar </button>
                            </div>
                            </div>
                        </div>  </div>

</form>