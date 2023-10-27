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

@$conn->query("update plano_manutencao set status_plano ='2'                             
where id_plano = '$id' ");


?>
<script>
window.location.href = "plano_manutencao";
alert("Deletado com sucesso!");
</script>