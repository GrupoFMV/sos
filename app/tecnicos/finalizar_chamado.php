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
<form id="finalizaros" method="POST" action="#">
<div class="card">
<div class="card-body">
<span class="text-uppercase font-weight-bold text-primary"> A OS foi finalizada por completo?  </span> <br><br>

<div class="row">
<div class="col-auto">
<input type="radio" id="sim" name="fim" value="sim">
<label for="sim">SIM</label><br>
</div>

<div class="col-auto">
<input type="radio" id="nao" name="fim" value="nao">
<label for="nao">NÃO</label><br>
</div>
</div>



<input name="equipamento" type="hidden" value="<?php echo $_POST[equipamento] ?>">
<input name="os" type="hidden" value="<?php echo $_POST[os] ?>">
<input name="status" type="hidden" value="<?php echo $_POST[status] ?>">
<input name="chamado" type="hidden" value="<?php echo $_POST[chamado] ?>">

</div>


                           
 <button class="btn btn-success rounded"> Avançar </button> </div>
 
</form>

</div>

<div id="r"></div>

<br>
 </div>
                        </div>  </div>

<script src="//code.jquery.com/jquery-3.2.1.min.js"></script>

<script>
$(document).ready(function() {
 $("#finalizaros").submit(function(){
var formData = new FormData(this);
  $.ajax({
    url: 'tratarfimos.php',
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