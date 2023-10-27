<?php
    include_once("database/conexao.php");

    if (!$conn) {
        die("Falha na conexão: " . mysqli_connect_error());
    }
    $data = json_decode(file_get_contents('php://input'), true);
    $event_id = $data['event_id'];
    $event_start = $data['event_start'];
    $event_idTecnico = $data['event_idTecnico'];
    $event_dataAbertura = $data['event_dataAbertura'];
    $codigo_cliente = $data['codigo_cliente'];
    $observacoes = $data['observacoes'];
    $tipo = $data['tipo'];
    $user = $data['user'];
    $os_id = $data['os_id'];

    $checkSql = "SELECT * FROM chamados WHERE chamado_os = '$os_id'";
    $checkResult = mysqli_query($conn, $checkSql);
    if (mysqli_num_rows($checkResult) > 0) {
        // Atualizar a linha existente
        $updateSql = "UPDATE chamados SET
            chamado_tecnico = '$event_idTecnico',
            chamado_data_os = '$event_dataAbertura',
            chamado_cliente = '$codigo_cliente',
            chamado_usuario = '$user',
            chamado_observacoes = '$observacoes',
            chamado_status = '2',
            chamado_hora_inicial_esperada = '$event_start',
            chamado_tipo = '$tipo'
        WHERE chamado_os = '$os_id'";
        if (mysqli_query($conn, $updateSql)) {
            echo "Atualização realizada com sucesso.";
        } else {
            echo "Erro na atualização: " . mysqli_error($conn);
        }
    } else {
        $insertSql = "INSERT INTO chamados
        (
            `chamado_os`, 
            `chamado_tecnico`, 
            `chamado_data_os`, 
            `chamado_cliente`, 
            `chamado_usuario`, 
            `chamado_observacoes`,
            `chamado_status`, 
            `chamado_hora_inicial_esperada`, 
            `chamado_tipo`
        ) VALUES (
            '$event_id', 
            '$event_idTecnico', 
            '$event_dataAbertura', 
            '$codigo_cliente', 
            '$user', 
            '$observacoes', 
            '2', 
            '$event_start', 
            '$tipo'
        )";
        if (mysqli_query($conn, $insertSql)) {
            echo "Inserção realizada com sucesso.";
            
            $updateOsSql = "UPDATE os SET os_status = 2 WHERE os_id = '$event_id'";
            if (mysqli_query($conn, $updateOsSql)) {
                echo "Tabela os atualizada com sucesso.";
            } else {
                echo "Erro na atualização da tabela os: " . mysqli_error($conn);
            }
        } else {
            echo "Erro na inserção: " . mysqli_error($conn);
        }
    }


    mysqli_close($conn);


?>
