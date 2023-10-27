<?php 
@session_start();
if(!empty($_SESSION['user_id'])){
	
}else{
	header("Location: logar.php");	
}

$cmdt = "select * from chamados where chamado_id = $_POST[os]  ";
$tarefas = mysqli_query($conn, $cmdt);
$totaltarefas = mysqli_num_rows($tarefas);
$tarefa = mysqli_fetch_array($tarefas);

$cmde = "SELECT * FROM equipamentos e inner join modelos m on e.equipamento_modelo = m.modelo_id inner join marcas ma on e.equipamento_id_marca = ma.marca_id  where e.equipamento_id = $_POST[equipamento] ";
$equipamentos = mysqli_query($conn, $cmde);
$equipamento = mysqli_fetch_array($equipamentos);

?>



 <div class="col-12 mb-4">
 <h3><span class="font-weight-light small">Chamado </span><b>#<?php echo $_POST[chamado] ?></b> OS </span><b>#<?php echo $_POST[os] ?></b></h1> <br>


 <div align="center" id="f1" style="display:block"> 
<div class="card">
<div class="card-body">


    <?php if($_POST[orcamento] == 'sim') { ?> 
<span class="text-uppercase font-weight-bold text-primary"> Solicitar Orçamento  </span> <br><br>



<form action="salvar_solicitacao_orcamento" method="POST">

<?php
$cmpa = "select * from produtos_aplicacoes where produto_ap_modelo = $equipamento[equipamento_modelo]  ";
$aplicacoes = mysqli_query($conn, $cmpa);
while($aplicacao = mysqli_fetch_array($aplicacoes)) {

$cmp = "select * from produtos where produto_id = $aplicacao[produto_ap_produto]  ";
$produtos = mysqli_query($conn, $cmp);
$produto = mysqli_fetch_array($produtos);

?>



<div align="left">
<input type="checkbox" id="scales<?php echo $produto[produto_id] ?>" name="produto[]" value="<?php echo $produto[produto_id] ?>">
<span for="scales<?php echo $produto[produto_id] ?>"><?php echo $produto[produto_nome] ?></label>

</div>


 <br>

<?php } ?>

<input name="equipamento" type="hidden" value="<?php echo $_POST[equipamento] ?>">
<input name="os" type="hidden" value="<?php echo $_POST[os] ?>">
<input name="status" type="hidden" value="<?php echo $_POST[status] ?>">
<input name="chamado" type="hidden" value="<?php echo $_POST[chamado] ?>">
<input name="desc" type="hidden" value="<?php echo $_POST[desc] ?>">

<button class="btn btn-success rounded"> Salvar </button>

</form>




<?php } ?>

<?php if($_POST[orcamento] == 'nao') { ?> 
<span class="text-uppercase font-weight-bold text-primary">Deseja mesmo finalizar sem solicitar orçamento?  </span> <br><br>
<form action="salvar_finalizar_chamado" method="post">

<input name="orcamento" type="hidden" value="n">
<input name="equipamento" type="hidden" value="<?php echo $_POST['equipamento'] ?>">
<input name="os" type="hidden" value="<?php echo $_POST['os'] ?>">
<input name="status" type="hidden" value="<?php echo $_POST['status'] ?>">
<input name="chamado" type="hidden" value="<?php echo $_POST['chamado'] ?>">
<input name="obs" type="hidden" value="<?php echo $_POST['desc'] ?>">

<button class="btn btn-success rounded"> Sim </button>   </div>
</div> 

</form>

<?php } ?>
                           
 </div>


</div>

<div id="r"></div>

<br>
 </div>
                        </div>  </div>

<script src="//code.jquery.com/jquery-3.2.1.min.js"></script>

<script>
$(document).ready(function() {
 $("#enviarfotos").submit(function(){
var formData = new FormData(this);
  $.ajax({
    url: 'upload.php',
    cache: false,
    data: formData,
    type: "POST",  
    enctype: 'multipart/form-data',
    processData: false, // impedir que o jQuery tranforma a "data" em querystring
    contentType: false, // desabilitar o cabeçalho "Content-Type"
    success: function(msg){
      $("#r").empty();
      $("#r").append(msg);
      document.getElementById("f1").style.display = "none";

    }
  });
   return false;
 });
});
</script>		                       