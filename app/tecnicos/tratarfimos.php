<?php
session_start();
include_once "database/conexao.php";
$iduser = $_SESSION['user_id'];
$sqluser = "SELECT * FROM usuarios WHERE id_user = '$iduser'";
$exeuser = mysqli_query($conn, $sqluser);
$user = mysqli_fetch_array($exeuser);
?>
<div class="card">
<div class="card-body">

<?php if($_POST['fim'] == 'sim') { ?>
<span class="text-uppercase font-weight-bold text-primary"> OS Concluída por completo  </span> <br><br>
<form action="fecharoscompleta" method="POST">
 <label for="w3review">Observações Gerais</label>
<textarea id="w3review" class="form-control" name="desc" rows="3" cols="50">
</textarea>

<label for="w3review">Deseja Adicionar Fotos?</label>
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

<button class="btn btn-success rounded"> Avançar </button>
<input name="equipamento" type="hidden" value="<?php echo $_POST['equipamento'] ?>">
<input name="os" type="hidden" value="<?php echo $_POST['os'] ?>">
<input name="status" type="hidden" value="<?php echo $_POST['status'] ?>">
<input name="chamado" type="hidden" value="<?php echo $_POST['chamado'] ?>">
<input name="completa" type="hidden" value="<?php echo $_POST['fim'] ?>">
</form>


<?php } ?>


<?php if($_POST['fim'] == 'nao') { ?>
    
    <span class="text-uppercase font-weight-bold text-primary"> OS Não Concluída por completo  </span> <br><br>
<form action="fecharosnaocompleta" method="POST">
 <label for="w3review">Observações Gerais</label>
<textarea id="w3review" class="form-control" name="desc" rows="3" cols="50">
</textarea>

<label for="w3review">Solicitar orçamento?</label>
<div class="row">
<div class="col-auto">
<input type="radio" id="sim" name="orcamento" value="sim">
<label for="sim">SIM</label><br>
</div>

<div class="col-auto">
<input type="radio" id="nao" name="orcamento" value="nao">
<label for="nao">NÃO</label><br>
</div>
</div>

<button class="btn btn-success rounded"> Avançar </button>
<input name="equipamento" type="hidden" value="<?php echo $_POST['equipamento'] ?>">
<input name="os" type="hidden" value="<?php echo $_POST['os'] ?>">
<input name="status" type="hidden" value="<?php echo $_POST['status'] ?>">
<input name="chamado" type="hidden" value="<?php echo $_POST['chamado'] ?>">
<input name="completa" type="hidden" value="<?php echo $_POST['fim'] ?>">
</form>  

<?php } ?>

</div></div>