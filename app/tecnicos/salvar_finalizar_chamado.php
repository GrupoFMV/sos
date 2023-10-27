<?php 
@session_start();
if(!empty($_SESSION['user_id'])){
	
}else{
	header("Location: logar.php");	
}
$datafinalizado = date("Y-m-d H:i:s");               

/// REGISTRANDO INTERACAO
$conn->query($insert = "INSERT INTO interacoes_os (interacao_os,interacao_chamado,interacao_status1, interacao_status2,interacao_usuario,interacao_observacoes) 
VALUES ('$_POST[os]','$_POST[chamado]','$_POST[status]','4','$user[user_id]','$_POST[desc]')");

/// ATUALIZANDO OS
@$conn->query("update os set os_status ='4' where os_id = '$_POST[os]' ");

/// ATUALIZANDO CHAMADO
@$conn->query("update chamados set chamado_status ='4' , chamado_hora_final = '$datafinalizado' where chamado_id = '$_POST[chamado]' ");

/// ATUALIZANDO ATENDIMENTO
@$conn->query("update atendimentos set atendimento_fim ='$datafinalizado' , atendimento_status = '2' where atendimento_chamado = '$_POST[chamado]' ");

?>

<script>
window.location.href = "chamado_finalizado";
</script>
