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


 <form action="salvar_solicitacao_orcamento" method="POST">
<div class="card">
<div class="card-body">
<span class="text-uppercase font-weight-bold text-primary"> Informe itens a serem orçados: </span> <br><br>

<?php
$cmpa = "select * from produtos_aplicacoes where produto_ap_modelo = $equipamento[equipamento_modelo]  ";
$aplicacoes = mysqli_query($conn, $cmpa);
while($aplicacao = mysqli_fetch_array($aplicacoes)) {

$cmp = "select * from produtos where produto_id = $aplicacao[produto_ap_produto]  ";
$produtos = mysqli_query($conn, $cmp);
$produto = mysqli_fetch_array($produtos);


?>




<input type="checkbox" id="scales<?php echo $produto[produto_id] ?>" name="produto[]" value="<?php echo $produto[produto_id] ?>">
<label for="scales<?php echo $produto[produto_id] ?>"><?php echo $produto[produto_nome] ?></label>




 <br>

<?php } ?>

<label> Observações </label>

<textarea required name="observacoes" class="form-control" rows="4" cols="50">
</textarea>

</div>

<input name="equipamento" type="hidden" value="<?php echo $_POST[equipamento] ?>">
<input name="os" type="hidden" value="<?php echo $_POST[os] ?>">
<input name="chamado" type="hidden" value="<?php echo $tarefa[chamado_id] ?>">
<input name="cliente" type="hidden" value="<?php echo $tarefa[chamado_cliente] ?>">



<button class="btn btn-success rounded"> Salvar </button>

</form>
 </div>
                        </div>  </div>