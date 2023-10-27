<?php include "../../database/conexao.php";

 // VERIFICANDO SE JÁ EXISTE O LOGIN CADASTRADO
$cmd = "select * from users where user_login = '$_POST[login]'   ";
$clientes = mysqli_query($conn, $cmd);
$total = mysqli_num_rows($clientes);



?>	

<?php // SE NÃO EXISTIR O CADASTRO LIBERA BOTAO AVANÇAR

if ($total =='0') { ?>

 <div class="col-12" align="right"> <br>
<button class="btn btn-primary" type="submit">Avançar</button>
 </div>	



<?php } else { 
// SE  EXISTIR O CADASTRO NÃO LIBERA BOTAO AVANÇAR
?>

 <div class="alert alert-danger alert-dismissible alert-label-icon label-arrow fade show mb-0" role="alert">
<i class="ri-refresh-line label-icon"></i><strong>Ops!</strong>
- Já existe um colaborador utlizando este login, escolha outro.
<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
 </div>

<?php } ?>