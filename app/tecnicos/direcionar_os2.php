<?php 
@session_start();
if(!empty($_SESSION['id'])){

	
}else{
	header("Location: logar.php");	
}


/// ATUALIZANDO CHAMADO
@$conn->query("update chamados set chamado_tecnico = $id2  where chamado_id = $id ");
?>

<script>
alert("Direcionado com sucesso!");
window.location.href = "home";
</script>
