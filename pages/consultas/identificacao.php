<?php include "../../database/conexao.php";

 // VERIFICANDO SE JÁ EXISTE O CNPJ OU CPF CADASTRADO
$cmd = "select * from clientes where  cliente_cpf ='$_POST[cpf]'   ";
$clientes = mysqli_query($conn, $cmd);
$total = mysqli_num_rows($clientes);



?>	

<?php // SE NÃO EXISTIR O CADASTRO LIBERA BOTAO AVANÇAR

if ($total =='0') { ?>

 <div class="col-12" align="right"><BR>
<button class="btn btn-primary" onclick="ValidaCPF();" type="submit" >Avançar</button>
 </div>	



<?php } else { 
// SE  EXISTIR O CADASTRO NÃO LIBERA BOTAO AVANÇAR
?>

 <div class="alert alert-danger alert-dismissible alert-label-icon label-arrow fade show mb-0" role="alert">
<i class="ri-refresh-line label-icon"></i><strong>Ops!</strong>
- Já existe um cadastro com esse CPF <?PHP echo $_POST['cpf'] ?>
<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
 </div>

<?php } ?>