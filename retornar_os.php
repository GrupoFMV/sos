<?php
    include_once("database/conexao.php");

    if (!$conn) {
        die("Falha na conexão: " . mysqli_connect_error());
    }

    $data = json_decode(file_get_contents('php://input'), true);

    $os_id = $data['os_id'];

    $delete = "DELETE FROM chamados WHERE chamado_os = '$os_id'";

    $update = "UPDATE os SET os_status = '1' WHERE os_id = '$os_id'";

    mysqli_query($conn, $delete);
    mysqli_query($conn, $update);

    mysqli_close($conn);
?>
