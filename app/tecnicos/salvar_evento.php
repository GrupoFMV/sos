<?php 
@session_start();
if(!empty($_SESSION['id'])){

	
}else{
	header("Location: logar.php");	
}

$datafim = date('Y-m-d H:i:s');


/// ATUALIZANDO O
@$conn->query("update os_eventos set status ='4', evento_fim = '$datafim'  where id = '$_POST[evento]' ");

?>

<script>
window.location.href = "home";
</script>
