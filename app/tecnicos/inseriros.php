<?php
//cCODIGO DA SESSION
if (!empty($_SESSION['user_id'])) {
} else {
    $_SESSION['msg'] = "Área restrita";
    header("Location: ../../login.php");
}


$today = date("Y-m-d H:i:s");   

$dataAtual = new DateTime();

function adicionarMinutos($minutos) {
    $dataAtual = new DateTime();
    $dataAtual->modify("+$minutos minutes");
    return $dataAtual->format('Y-m-d H:i:s');
}

$esperada = adicionarMinutos(5);


$conn->query($insert = "INSERT INTO os (os_tipo,os_cliente,os_usuario,os_consideracoes,os_solicitante)
VALUES ('$_POST[tipo]','$_POST[cliente]','$iduser','$esperada','$_POST[solicitante]')");
$ultimo_id = $conn->insert_id;
//echo $insert;

if($_POST[tecnico] == '') { 
$conn->query($insert = "INSERT INTO os (os_tipo,os_cliente,os_usuario,os_consideracoes,os_solicitante)
VALUES ('$_POST[tipo]','$_POST[cliente]','$iduser','$esperada','$_POST[solicitante]')");
$ultimo_id = $conn->insert_id;



$conn->query($insert = "INSERT INTO interacoes_os (interacao_os,interacao_chamado,interacao_status1, interacao_status2,interacao_usuario,interacao_observacoes) 
VALUES ('$ultimo_id','$ultimo_id2','1','2','$iduser','$_POST[consideracoes]')");

@$conn->query("update os set os_status ='2' where os_id = '$ultimo_id' ");

?>

<script>
alert("OS Aberta com sucesso!");
</script>

<?php

}

if($_POST[tecnico] <> '') { 
$conn->query($insert = "INSERT INTO chamados (chamado_os,chamado_tecnico,chamado_data_os,chamado_cliente,chamado_usuario,chamado_observacoes,chamado_status, chamado_hora_inicial_esperada, chamado_tipo)
VALUES ('$ultimo_id','$_POST[tecnico]','$today','$_POST[cliente]','$iduser','$_POST[consideracoes]','2','$esperada','$_POST[tipo]' )");
    $ultimo_id2 = $conn->insert_id;
    
    //echo $insert;
    
    $conn->query($insert = "INSERT INTO interacoes_os (interacao_os,interacao_chamado,interacao_status1, interacao_status2,interacao_usuario,interacao_observacoes) 
    VALUES ('$ultimo_id','$ultimo_id2','1','2','$iduser','$_POST[consideracoes]')");
    
    @$conn->query("update os set os_status ='2' where os_id = '$ultimo_id' ");
    
    }



    

?>

<script>
alert("OS Aberta com sucesso!");
</script>