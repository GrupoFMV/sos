<?php 
@session_start();
if(!empty($_SESSION['id'])){
	
}else{
	header("Location: logar.php");	
}
/// INICIANDO ATENDIMENTO
$conn->query($insert = "INSERT INTO orcamentos (orcamento_equipamento, orcamento_tecnico, orcamento_os, orcamento_chamado, orcamento_cliente, orcamento_observacoes) 
VALUES ('$_POST[equipamento]','$user[user_id]','$_POST[os]','$_POST[chamado]','$_POST[cliente]','$_POST[observacoes]')");

$ultimo_id = $conn->insert_id;
//echo $conn;


foreach($_POST["produto"] as $valor){
    $conn->query($insert = "INSERT INTO produtos_orcamentos (produto_or_orcamento,produto_or_produto, produto_or_os, produto_or_cliente, produto_or_usuario,
    produto_or_equipamento)
    VALUES ('$ultimo_id','$valor','$_POST[os]','$_POST[cliente]','$user[user_id]','$_POST[equipamento]')");
  //echo  $insert;
}


/// REGISTRANDO INTERACAO
$conn->query($insert = "INSERT INTO interacoes_os (interacao_os,interacao_chamado,interacao_status1, interacao_status2,interacao_usuario,interacao_observacoes) 
VALUES ('$_POST[os]','$_POST[chamado]','7','6','$user[user_id]','Solicitação Orçamento')");

/// ATUALIZANDO O
@$conn->query("update os set os_status ='6' where os_id = '$_POST[os]' ");

/// ATUALIZANDO CHAMADO
@$conn->query("update chamados set chamado_status ='6' where chamado_id = '$_POST[chamado]' ");
?>

<script>
window.location.href = "solicitacao_orcamento_ok/<?php echo $_POST[os] ?>";
</script>
