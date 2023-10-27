<?php
//cCODIGO DA SESSION
if (!empty($_SESSION['user_id'])) {
} else {
    $_SESSION['msg'] = "Área restrita";
    header("Location: ../../login.php");
}


$today = date("Y-m-d H:i:s");                   


$conn->query($insert = "INSERT INTO os (os_tipo,os_cliente,os_usuario,os_consideracoes,os_solicitante)
VALUES ('$_POST[tipo]','$_POST[cliente]','$iduser','$_POST[consideracoes]','$_POST[solicitante]')");


$ultimo_id = $conn->insert_id;
//echo $insert;

if($_POST[tipo] == '4') {
$conn->query($insert = "INSERT INTO chamados (chamado_os,chamado_tecnico,chamado_data_os,chamado_cliente,chamado_usuario,chamado_observacoes	)
VALUES ('$ultimo_id','9999','$today','$_POST[cliente]','$iduser','$_POST[consideracoes]' )");
$ultimo_id2 = $conn->insert_id;

echo $insert;

$conn->query($insert = "INSERT INTO interacoes_os (interacao_os,interacao_chamado,interacao_status1, interacao_status2,interacao_usuario,interacao_observacoes) 
VALUES ('$ultimo_id','$ultimo_id2','1','2','$iduser','$_POST[consideracoes]')");

@$conn->query("update os set os_status ='2' where os_id = '$ultimo_id' ");

}


?>

<script>
alert("OS Aberta com sucesso!");
window.location.href = "tela_cliente/<?php echo $_POST[cliente] ?> ";

</script>