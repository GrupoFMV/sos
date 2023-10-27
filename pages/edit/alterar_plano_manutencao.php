<?php

//cCODIGO DA SESSION
if (!empty($_SESSION['user_id'])) {
} else {
    $_SESSION['msg'] = "Área restrita";
    header("Location: ../../login.php");
}

include "database/conexao.php";

 ?>
<script src="assets/js/jquery.js"></script>
<script src="//code.jquery.com/jquery-3.2.1.min.js"></script>
	<?php

@$conn->query("update plano_manutencao set tarefa_plano ='$_POST[nome]',foto_plano = '$_POST[foto]',01_plano = '$_POST[janeiro]',02_plano = '$_POST[fevereiro]' 
,03_plano = '$_POST[marco]',04_plano = '$_POST[abril]',05_plano = '$_POST[maio]',06_plano = '$_POST[junho]',07_plano = '$_POST[julho]' ,08_plano = '$_POST[agosto]' 
,09_plano = '$_POST[setembro]',10_plano = '$_POST[outubro]',11_plano = '$_POST[novembro]',12_plano = '$_POST[dezembro]' ,	observacoes_plano = '$_POST[observacoes]'                             
where id_plano = '$_POST[id]' ");


?>
<script>
window.location.href = "plano_manutencao";
alert("Editado com sucesso!");
</script>