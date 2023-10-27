<?php
//cCODIGO DA SESSION
if (!empty($_SESSION['user_id'])) {
} else {
    $_SESSION['msg'] = "Área restrita";
    header("Location: ../../login.php");
}


 ?>
<script src="assets/js/jquery.js"></script>
<script src="//code.jquery.com/jquery-3.2.1.min.js"></script>
	<?php

$conn->query($insert = "INSERT INTO plano_manutencao (tarefa_plano, foto_plano, 01_plano, 02_plano, 03_plano, 04_plano, 05_plano, 06_plano, 07_plano, 08_plano, 09_plano,
10_plano, 11_plano, 12_plano,quem_plano, observacoes_plano)
VALUES ('$_POST[nome]','$_POST[foto]','$_POST[janeiro]','$_POST[fevereiro]','$_POST[marco]','$_POST[abril]','$_POST[maio]','$_POST[junho]'
,'$_POST[julho]','$_POST[agosto]','$_POST[setembro]','$_POST[outubro]','$_POST[novembro]','$_POST[dezembro]','$iduser','$_POST[observacoes]')");


	
//echo $insert;

?>
<script>

alert("Cadastrado com sucesso");
window.location.href = "plano_manutencao";

</script>