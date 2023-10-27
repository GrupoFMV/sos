<?php 
@session_start();
if(!empty($_SESSION['id'])){

	
}else{
	header("Location: logar.php");	
}

$datainicio = date('Y-m-d H:i:s');


if($id4 <> '') {
@$conn->query("update os_eventos set status ='4', evento_fim = '$datainicio' where id = '$id4' ");
}
/// INICIANDO ATENDIMENTO
$conn->query($insert = "INSERT INTO atendimentos (atendimento_chamado, atendimento_tecnico) VALUES ('$id','$user[user_id]')");

/// REGISTRANDO INTERACAO
$conn->query($insert = "INSERT INTO interacoes_os (interacao_os,interacao_chamado,interacao_status1, interacao_status2,interacao_usuario,interacao_observacoes) 
VALUES ('$id2','$id','$id3','7','$user[user_id]','Iniciou atendimento')");

/// ATUALIZANDO O
@$conn->query("update os set os_status ='7 where os_id = '$id2' ");

/// ATUALIZANDO CHAMADO
@$conn->query("update chamados set chamado_status ='7', chamado_hora_inicio = '$datainicio' where chamado_id = '$id' ");
?>

<script>
window.location.href = "tratar_chamado/<?php echo $id ?>";
</script>
