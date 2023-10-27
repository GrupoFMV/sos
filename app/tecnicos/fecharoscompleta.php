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


    <?php if($_POST[fim] == 'sim') { ?> 
<span class="text-uppercase font-weight-bold text-primary"> Adicionar fotos  </span> <br><br>

<form action="" id="enviarfotos" method="post" enctype="multipart/form-data">
      <input type="file" style="form-control" name="upfile[]" multiple required>
      <Br>      <Br> 
<input type="submit" style="form-control" value="Enviar">
<input name="equipamento" type="hidden" value="<?php echo $_POST[equipamento] ?>">
<input name="os" type="hidden" value="<?php echo $_POST[os] ?>">
<input name="status" type="hidden" value="<?php echo $_POST[status] ?>">
<input name="chamado" type="hidden" value="<?php echo $_POST[chamado] ?>">
<input name="desc" type="hidden" value="<?php echo $_POST[desc] ?>">
</div>
</form>

<?php } ?>

<?php if($_POST[fim] == 'nao') { ?> 
  <span class="text-uppercase font-weight-bold text-primary">Deseja mesmo finalizar sem fotos?  </span> <br><br>
  <form action="salvar_finalizar_chamado" method="post">

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