<?php 
@session_start();
if(!empty($_SESSION['id'])){

	
}else{
	header("Location: logar.php");	
}

$datainicio = date('Y-m-d H:i:s');

/// INICIANDO ATENDIMENTO
$conn->query($insert = "INSERT INTO os_eventos (id_tecnico, evento_inicio, tipo, status) VALUES ('$user[user_id]','$datainicio','$_POST[tipo]','7')");

?>

<script>
window.location.href = "home";
</script>
