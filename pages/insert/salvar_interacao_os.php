<?php
//cCODIGO DA SESSION
if (!empty($_SESSION['user_id'])) {
} else {
    $_SESSION['msg'] = "Área restrita";
    header("Location: ../../login.php");
}


$conn->query($insert = "INSERT INTO interacoes_os (interacao_os,interacao_chamado,interacao_status1, interacao_status2,interacao_usuario,interacao_observacoes) 
VALUES ('$_POST[os]','0','1','2','$iduser','$_POST[observacoes]')");


$conn->query($insert = "INSERT INTO chamados (chamado_os,chamado_tecnico,chamado_data_os,chamado_cliente,chamado_usuario,chamado_observacoes	)
VALUES ('$_POST[os]','$_POST[tecnico]','$_POST[dataos]','$_POST[cliente]','$iduser','$_POST[observacoes]' )");


@$conn->query("update os set os_status ='2' where os_id = '$_POST[os]' ");

$ultimo_id = $conn->insert_id;
//echo $insert;

?>

<script>
alert("OS salva com sucesso!");
window.location.href = "tela_cliente/<?php echo $_POST[cliente] ?> ";

</script>