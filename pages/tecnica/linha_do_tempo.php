<?php // CODIGO DA SESSION
session_start();
if (!empty($_SESSION['user_id'])) {
} else {
    $_SESSION['msg'] = "Área restrita";
    header("Location: ../../login.php");
}
global $dataFiltroGlobal;

$dataAtual = new DateTime();
$dataAtualFormat = $dataAtual->format('Y-m-d');
echo "<script>console.log('batman', '$dataAtualFormat');</script>";

if (isset($dataFiltro)) {
    $dataFiltro = $dataFiltro;
    $dataFiltroGlobal = $dataFiltro;
}

global $resultadoConsulta;
global $resultadoConsultaTecnicos;
global $resultadoConsultaOrdensDirecionadas;

$resultadoConsulta = buscarOrdensEmAberto($conn, $filtragem);
$resultadoConsultaTecnicos = buscarUsers($conn);
$resultadoConsultaOrdensDirecionadas = buscarOrdensDirecionadas($conn, $dataAtualFormat);

function buscarOrdensEmAberto($conn)
{

    $query1 = "SELECT os.*, clientes.cliente_fantasia, os_tipos.os_tipos_tempo, os_tipos.os_tipo_nome, os_status.os_status_nome
    FROM os
    JOIN clientes ON os.os_cliente = clientes.cliente_id
    JOIN os_status ON os.os_status = os_status.os_status_id
    JOIN os_tipos ON os.os_tipo = os_tipos.os_tipo_id
    WHERE os_status = 1
    ";
    $result1 = mysqli_query($conn, $query1);
    if (!$result1) {
        die("Erro na consulta: " . mysqli_error($conn));
    }


    $data1 = array();
    while ($row = mysqli_fetch_assoc($result1)) {
        $data1[] = $row;
    }

    $resultadoJson = json_encode($data1);

    return $resultadoJson;
}

function buscarOrdensDirecionadas($conn, $dataAtualFormat)
{

    $OsPorTecnico = array();
    // $query0 = '';

    // if ($dataFiltro) {
    //     echo "<script>console.log('Pula');</script>";

    //     $query0 = "SELECT os.*, clientes.cliente_fantasia, os_tipos.os_tipo_nome, os_tipos.os_tipos_tempo, os_status.os_status_nome
    //     FROM historico_eventos_os AS os
    //     JOIN clientes ON os.os_cliente = clientes.cliente_id
    //     JOIN os_tipos ON os.os_tipo = os_tipos.os_tipo_id
    //     JOIN os_status ON os.os_status = os_status.os_status_id
    //     WHERE os.dia_finalizado = '$dataFiltro';

    //     "; 
    // } else {
    //     echo "<script>console.log('meu');</script>";
    //      $query0 = "SELECT os.*, clientes.cliente_fantasia, os_tipos.os_tipo_nome, os_tipos.os_tipos_tempo, os_status.os_status_nome
    //     FROM os
    //     JOIN clientes ON os.os_cliente = clientes.cliente_id
    //     JOIN os_status ON os.os_status = os_status.os_status_id
    //     JOIN os_tipos ON os.os_tipo = os_tipos.os_tipo_id
    //     WHERE os.os_status != 1
    //     "; 
    // }

    $query0 = "SELECT chamados.*, clientes.cliente_fantasia, os_tipos.os_tipo_nome, os_tipos.os_tipos_tempo, os_status.os_status_nome
    FROM chamados
    JOIN clientes ON chamado_cliente = clientes.cliente_id
    JOIN os_status ON chamado_status = os_status.os_status_id
    JOIN os_tipos ON chamado_tipo = os_tipos.os_tipo_id
    WHERE DATE(chamado_data_referencia) = '$dataAtualFormat'
    ";


    $result0 = mysqli_query($conn, $query0);
    if (!$result0) {
        die("Erro na consulta: " . mysqli_error($conn));
    }

    $data0 = array();
    while ($row = mysqli_fetch_assoc($result0)) {
        $data0[] = $row;
    }



    // $query1 = '';   

    // if ($dataFiltro) {

    //     $query0 = "SELECT os.*, clientes.cliente_fantasia, os_tipos.os_tipo_nome, os_tipos.os_tipos_tempo, os_status.os_status_nome
    //     FROM historico_eventos_os AS os
    //     JOIN clientes ON os.os_cliente = clientes.cliente_id
    //     JOIN os_tipos ON os.os_tipo = os_tipos.os_tipo_id
    //     JOIN os_status ON os.os_status = os_status.os_status_id
    //     WHERE os.dia_finalizado = '$dataFiltro';

    //     "; 
    // } else {
    //      $query1 = "SELECT os.*, clientes.cliente_fantasia, os_tipos.os_tipo_nome, os_tipos.os_tipos_tempo, os_status.os_status_nome
    //     FROM os
    //     JOIN clientes ON os.os_cliente = clientes.cliente_id
    //     JOIN os_status ON os.os_status = os_status.os_status_id
    //     JOIN os_tipos ON os.os_tipo = os_tipos.os_tipo_id
    //     WHERE os.os_status != 1
    //     "; 
    // }

    $query1 = "SELECT os_eventos.*, id_tecnico AS os_usuario, os_status.os_status_nome AS statusName, os_tipo_eventos.nome_evento
    FROM os_eventos
    JOIN os_status ON os_eventos.status = os_status.os_status_id
    JOIN os_tipo_eventos ON os_eventos.tipo = os_tipo_eventos.id_evento
    WHERE DATE(evento_data_referencia) = '$dataAtualFormat'
    ";
    $result1 = mysqli_query($conn, $query1);
    if (!$result1) {
        die("Erro na consulta: " . mysqli_error($conn));
    }

    $data1 = array();
    while ($row = mysqli_fetch_assoc($result1)) {
        $data1[] = $row;
    }


    $query2 = "SELECT * from users where user_tipo = 2";

    $result2 = mysqli_query($conn, $query2);
    if (!$result2) {
        die("Erro na consulta: " . mysqli_error($conn));
    }

    $data2 = array();
    while ($row = mysqli_fetch_assoc($result2)) {
        $data2[] = array(
            "id" => count($data2) + 1,
            "idTecnico" => $row["user_id"],
            "name" => $row["user_nome"]
        );
    }

    $juncaoEventosOs = array_merge($data0, $data1);

    foreach ($juncaoEventosOs as &$order) {
        // Busca o técnico correspondente em $locations2 com base no os_usuario
        $technician = null;
        foreach ($data2 as $tech) {
            if ($tech['idTecnico'] === $order['chamado_tecnico'] || $tech['idTecnico'] === $order['id_tecnico']) {
                $technician = $tech;
                break;
            }
        }

        // Se encontrou o técnico, adiciona a propriedade "location" no resultado
        if ($technician) {
            $order['location'] = $technician['id'];
        }

        $statusToClassNameMap = array(
            'Em atendimento' => 'atendimento',
            'Direcionado' => 'direcionado',
            'Cancelado' => 'cancelado',
            'Concluido' => 'concluido',
            'Orçamento' => 'orcamento',
            'Impedido' => 'impedido'
        );

        $statusToClassNameMapEvent = array(
            'deslocamento' => 'deslocamento',
            'descanso' => 'descanso'
        );

        // $order['className'] = $statusToClassNameMap[$order['os_status_nome'] || $order['statusName']];
        $order['className'] = $statusToClassNameMap[$order['os_status_nome']];
        // $order['className'] = $statusToClassNameMap[$order['os_status_nome']] ?? $statusToClassNameMap[$order['statusName']] ?? '';
        if ($order['nome_evento']) {
            $order['className'] = $statusToClassNameMapEvent[$order['nome_evento']];
        }
        // $order['userData'] = array(
        //     'id_os' => $order['chamado_id'] || $order['id'],
        //     'locations' => $data2,
        //     'cliente' => $order['cliente_fantasia'] || $order['nome_evento'],
        //     'event_dataAbertura' => $order['chamado_data_referencia'] || $order['evento_data_referencia'],
        //     'codigo_cliente' => $order['chamado_cliente'] || $order['id'],
        //     'observacoes' => $order['chamado_observacoes'] || $order['nome_evento'],
        //     'tipo' => $order['chamado_tipo'] || $order['tipo'],
        //     'os_id' => $order['chamado_os'] || $order['id'] //este "ou", não faz referencia a uma ordem
        // );

        $order['userData'] = array(
            'id_os' => $order['chamado_id'] ?: $order['id'],
            'locations' => $data2,
            'cliente' => $order['cliente_fantasia'] ?: $order['nome_evento'],
            'event_dataAbertura' => $order['chamado_data_referencia'] ?: $order['evento_data_referencia'],
            'codigo_cliente' => $order['chamado_cliente'] ?: $order['id'],
            'observacoes' => $order['chamado_observacoes'] ?: $order['nome_evento'],
            'tipo' => $order['chamado_tipo'] ?: $order['tipo'],
            'os_id' => $order['chamado_os'] ?: $order['id'] // este "ou" não faz referência a uma ordem
        );

        $tecnicoIndex = array_search($technician['idTecnico'], array_column($OsPorTecnico, 'idTecnico'));
        if ($tecnicoIndex !== false) {
            array_push($OsPorTecnico[$tecnicoIndex]['ordens'], $order);
        } else {
            array_push(
                $OsPorTecnico,
                array(
                    'idTecnico' => $technician['idTecnico'],
                    'ordens' => array($order)
                )
            );
        }
    }

    $teste = gerarHoraInicio($OsPorTecnico);
    $resultadoFinal = json_encode($teste);


    echo "<script>console.log('osss resultadoJsonOrdens',$resultadoFinal);</script>";

    return $resultadoFinal;
}

function buscarUsers($conn)
{
    $query1 = "SELECT * from users where user_tipo = 2";
    $result1 = mysqli_query($conn, $query1);
    if (!$result1) {
        die("Erro na consulta: " . mysqli_error($conn));
    }

    $data1 = array();
    while ($row = mysqli_fetch_assoc($result1)) {
        $data1[] = array(
            "id" => count($data1) + 1,
            "idTecnico" => $row["user_id"],
            "name" => $row["user_nome"]
        );
    }

    $resultadoJson = json_encode($data1);
    return $resultadoJson;
}
function getCurrentTimeInBrazil()
{
    $currentTime = new DateTime();
    $currentTime->setTimezone(new DateTimeZone('America/Sao_Paulo'));
    return $currentTime;
}


function compareCurrentTime($timeString, $timezone = 'America/Sao_Paulo')
{
    $currentTime = getCurrentTimeInBrazil();
    $comparisonTime = new DateTime($timeString);
    $comparisonTime->setTimezone(new DateTimeZone($timezone));


    if ($currentTime > $comparisonTime) {
        return 1;
    } else if ($currentTime < $comparisonTime) {
        return 0;
    } else {
        return 2;
    }
}

function getCurrentTime()
{
    $currentDate = new DateTime();
    return $currentDate->format('Y-m-d H:i:s');
}

function addMinutesToTime($initialTime, $minutesToAdd)
{
    $updatedTime = new DateTime($initialTime);
    $updatedTime->modify("+{$minutesToAdd} minutes");
    return $updatedTime->format('Y-m-d H:i:s');
}


function addMinutesToJsDate($initialTime, $minutesToAdd)
{
    $phpDateTime = DateTime::createFromFormat('D M d Y H:i:s e+', $initialTime);
    $phpDateTime->modify("+{$minutesToAdd} minutes");
    return $phpDateTime->format('Y-m-d H:i:s');
}



function convertIsoStringToJsDate($isoString, $timezone = 'America/Sao_Paulo', $timezoneName = 'Horário Padrão de Brasília')
{
    $phpDateTime = new DateTime($isoString, new DateTimeZone('UTC'));
    $phpDateTime->setTimezone(new DateTimeZone($timezone));
    $formattedDate = $phpDateTime->format('D M d Y H:i:s \G\M\TP');
    return $formattedDate . ' (' . $timezoneName . ')';
}

function verifyOrdemAnterior($horaOrdemAnterior, $horaOrdemAtual)
{
    $datetime1 = new DateTime($horaOrdemAnterior);
    $datetime2 = new DateTime($horaOrdemAtual);
    if ($datetime1 > $datetime2) {
        return 1;
    } else {
        return 0;
    }
}

function add_minute($time)
{
    $datetime = new DateTime($time);
    $datetime->modify('+1 minute');
    return $datetime->format('Y-m-d H:i:s');
}

function gerarHoraInicio($OsPorTecnicoFunction)
{
    $ordensAlteradas = [];
    foreach ($OsPorTecnicoFunction as &$tecnico) {
        $ordensDoTecnico = $tecnico['ordens'];
        usort($ordensDoTecnico, function ($a, $b) {
            $timeA = strtotime($a['chamado_hora_inicial_esperada'] ?: $a['evento_inicio']);
            $timeB = strtotime($b['chamado_hora_inicial_esperada'] ?: $b['evento_inicio']);

            return $timeA - $timeB;
        });

        for ($i = 0; $i < count($ordensDoTecnico); $i++) {
            $ordem = &$ordensDoTecnico[$i];

            if (compareCurrentTime($ordem['chamado_hora_inicial_esperada']) == 1 && $ordem['os_status_nome'] == "Direcionado") {
                if ($i === 0) {
                    $ordem['start'] = getCurrentTime();
                    $ordem['end'] = addMinutesToTime($ordem['start'], intval($ordem['os_tipos_tempo']));
                } else {
                    $ordemAnterior = $ordensDoTecnico[$i - 1];
                    if (verifyOrdemAnterior($ordemAnterior['end'], $ordem['chamado_hora_inicial_esperada']) == 1) {
                        //significa que a hora final da anterior é maior que a hora inicial esperada da atual
                        $ordem['start'] = add_minute($ordemAnterior['end']);
                        $ordem['end'] = addMinutesToTime($ordem['start'], intval($ordem['os_tipos_tempo']));
                    } elseif (verifyOrdemAnterior($ordemAnterior['end'], $ordem['chamado_hora_inicial_esperada']) == 0) {
                        //significa que a hora final da anterior é menor que a hora inicial esperada da atual
                        $ordem['start'] = $ordem['chamado_hora_inicial_esperada'];
                        $ordem['end'] = addMinutesToTime($ordem['start'], intval($ordem['os_tipos_tempo']));
                    }
                }
                $ordem['start'] = getCurrentTime();
                $ordem['end'] = addMinutesToTime($ordem['start'], intval($ordem['os_tipos_tempo']));
                $ordensAlteradas[] = $ordem;
                continue;
            }

            if (compareCurrentTime($ordem['chamado_hora_inicial_esperada']) == 0 && $ordem['os_status_nome'] == "Direcionado") {
                if ($i === 0) {
                    $ordem['start'] = $ordem['chamado_hora_inicial_esperada'];
                    $ordem['end'] = addMinutesToTime($ordem['start'], intval($ordem['os_tipos_tempo']));
                } else {
                    $ordemAnterior = $ordensDoTecnico[$i - 1];
                    if (verifyOrdemAnterior($ordemAnterior['end'], $ordem['chamado_hora_inicial_esperada']) == 1) {
                        //significa que a hora final da anterior é maior que a hora inicial esperada da atual
                        $ordem['start'] = add_minute($ordemAnterior['end']);
                        $ordem['end'] = addMinutesToTime($ordem['start'], intval($ordem['os_tipos_tempo']));
                    } elseif (verifyOrdemAnterior($ordemAnterior['end'], $ordem['chamado_hora_inicial_esperada']) == 0) {
                        //significa que a hora final da anterior é menor que a hora inicial esperada da atual
                        $ordem['start'] = $ordem['chamado_hora_inicial_esperada'];
                        $ordem['end'] = addMinutesToTime($ordem['start'], intval($ordem['os_tipos_tempo']));
                    }
                }

                $ordensAlteradas[] = $ordem;
                continue;
            }

            if (($ordem['os_status_nome'] == "Em atendimento") || ($ordem['statusName'] == "Em atendimento")) {
                $ordem['start'] = $ordem['chamado_hora_inicio'] ? $ordem['chamado_hora_inicio'] : $ordem['evento_inicio'];
                $ordem['end'] = getCurrentTime();
                $ordensAlteradas[] = $ordem;
                continue;
            }

            if ($ordem['os_status_nome'] || $ordem['statusName'] == "Concluido") {
                $ordem['start'] = $ordem['chamado_hora_inicio'] ? $ordem['chamado_hora_inicio'] : $ordem['evento_inicio'];
                $ordem['end'] = $ordem['chamado_hora_final'] ?: $ordem['evento_fim'];
                $ordensAlteradas[] = $ordem;
                continue;
            }

            if ($ordem['os_status_nome'] == "Orçamento") {
                $ordem['start'] = $ordem['chamado_hora_inicio'];
                $ordem['end'] = $ordem['chamado_hora_final'];
                $ordensAlteradas[] = $ordem;
                continue;
            }

            if ($ordem['os_status_nome'] == "Cancelado") {
                $ordem['start'] = $ordem['chamado_hora_inicial_esperada'];
                $ordem['end'] = $ordem['chamado_hora_inicial_esperada'];
                $ordensAlteradas[] = $ordem;
                continue;
            }

            if ($ordem['os_status_nome'] == "Impedido") {
                if ($ordem['chamado_hora_inicio']) {
                    $ordem['start'] = $ordem['chamado_hora_inicio'];
                    $ordem['end'] = $ordem['chamado_hora_final'];
                    $ordensAlteradas[] = $ordem;
                } else {
                    $ordem['start'] = $ordem['chamado_hora_inicial_esperada'];
                    $ordem['end'] = $ordem['chamado_hora_inicial_esperada'];
                    $ordensAlteradas[] = $ordem;
                }
                continue;
            }
        }
    }
    return $ordensAlteradas;
}

?>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script src="https://kit.fontawesome.com/eec0e0d660.js" crossorigin="anonymous"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
    integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
    crossorigin="anonymous"></script>
<script src="//stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"
    integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
    crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/solid.css"
    integrity="sha384-wnAC7ln+XN0UKdcPvJvtqIH3jOjs9pnKnq9qX68ImXvOGz2JuFoEiCjT8jyZQX2z" crossorigin="anonymous">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/fontawesome.css"
    integrity="sha384-HbmWTHay9psM8qyzEKPc8odH4DsOuzdejtnr+OFtDmOcIVnhgReQ4GZBH7uwcjf6" crossorigin="anonymous">
<script src="pages/tecnica/skedtape.js"></script>
<link rel=" stylesheet" href="pages/tecnica/skedtape.css">

<style>
    @import url("https://fonts.googleapis.com/css2?family=Poppins&display=swap");

    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: 'Poppins';
    }

    .expanded-container {
        width: 100%;
        margin: 0 auto;
        background-color: #0C1B38;
        height: 165px;
        border-radius: 10px;
        overflow-x: auto;
        white-space: nowrap;
        display: flex;
        justify-content: left;
        align-items: center;
    }

    .carousel {
        display: flex;
        padding: 5px;
    }

    .divCarrossel {
        display: inline-block;
        width: 175px;
        height: 120px;
        border-radius: 12px;
        background-color: #0C1B38;
        border: 1px solid #0446c2;
        margin: 10px 10px 0px;
        cursor: pointer;
        font-size: 0.8em;
        color: white;
        padding: 0 5px 0 15px;
        /* z-index: 1000 !important; */
    }

    .card-body {
        display: flex;
        flex-direction: row;
        align-items: center;
        height: 100%;
        white-space: pre-wrap;
        word-wrap: break-word;
        /* padding-right: 35px; */
    }

    .icon-section {
        flex-basis: 20%;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .info-section {
        /* flex-basis: 80%; */
        display: flex;
        flex-direction: column;
        justify-content: center;
        max-width: 100%;
        /* padding-left: 15px; */
    }

    .info-section p {
        margin: 0;
        padding-right: 10px;
    }

    .fa-solid.fa-folder {
        font-size: 1.2em;
        word-wrap: break-word;
        max-width: 100%;
    }

    .fas.fa-wrench {
        font-size: 1.2em;
        /* padding:5px; */
    }

    .fa-solid.fa-location-dot {
        font-size: 1.2em;
        position: relative;
    }

    .text-span {
        font-size: 11px;
        font-weight: 100;
    }

    .highlight-card {
        filter: brightness(200%);
        /* Aumenta o brilho em 20% */
        animation: pulse 1s ease-in-out infinite;
    }



    .timeline-container {
        max-height: 500px;
        overflow-y: auto;
    }


    .deslocamento {
        background-color: #CFD8DC;
        border: #CFD8DC;
        /* pointer-events: none; */
        /* height: 30px; */
    }

    .deslocamento:hover {
        background-color: #CFD8DC;
    }


    .cancelado {
        background-color: #D271B5;
        border: #D271B5;
    }

    .cancelado:hover {
        background-color: #D271B5;
    }

    .impedido {
        background-color: #F84547;
        border: #F84547;
    }

    .impedido:hover {
        background-color: #F84547;
    }


    .deslocamento-event:hover {
        background-color: #105BFB;
    }

    .deslocamento-event {
        background-color: #105BFB;
    }

    .atendimento {
        background-color: #E4771F;
        border: #E4771F;
        /* height: 30px; */
    }

    .atendimento:hover {
        background-color: #E4771F;
        /* height: 30px; */
    }

    .direcionado {
        background-color: #105BFB !important;
        border: #105BFB !important;

    }

    .direcionado:hover {
        background-color: #105BFB;

    }


    .concluido {
        background-color: #24B787;
        border: #24B787;
        /* pointer-events: none; */

    }

    .concluido:hover {
        background-color: #24B787;
    }

    .descanso {
        background-color: #ADD8E6;
        border: #ADD8E6;
    }

    .descanso:hover {
        background-color: #ADD8E6;
    }

    .orcamento {
        background-color: #FFD700;
        border: #FFD700;
    }

    .orcamento:hover {
        background-color: #FFD700;
    }

    .servico {
        background-color: #FF1493;
    }

    .aguardandoAtendimento {
        background-color: blue;
    }

    .icone {
        width: 30px;
        height: 30px;
        object-fit: cover;
        border-radius: 50%;

        /* margin: auto; */
    }

    .sked-tape__location {
        position: relative;
        padding: 0 15px;
        background-color: #0C1B38;
        color: #fff;
        line-height: 54px;
        height: 54px;

        /* display: flex; */
        /* justify-content: center; */
        /* align-items: center; */
    }

    .sked-tape__caption {
        display: block;
        background-color: #0C1B38;
        height: 24px;
        color: #fff;
        position: relative;
        top: 0;
        text-align: center;
        border-radius: 10px 0 0 0;
    }

    .sked-tape__indicator {
        position: absolute;
        z-index: 4;
        top: 0;
        bottom: 0;
        border-left: 1px solid #0C1B38;
    }

    .sked-tape__indicator--serifs::before {
        top: 0;
        border-bottom-width: 3px;
        border-top: 3px solid #0C1B38;
    }

    .sked-tape__indicator--serifs::after {
        bottom: 0;
        border-top-width: 3px;
        border-bottom: 3px solid #0C1B38;
    }

    .sked-tape__indicator--serifs::before,
    .sked-tape__indicator--serifs::after {
        content: '';
        display: block;
        position: absolute;
        left: -4px;
        width: 0;
        height: 0;
        border: 3px solid transparent;
    }

    .sked-tape__grid>li {
        display: block;
        margin: 0;
        padding: 0;
        background-image: linear-gradient(to right, #fff 1px, #fff 1px), linear-gradient(to right, #fff 1px, #fff 1px), linear-gradient(to right, #fff 1px, #fff 1px), linear-gradient(to right, #fff 1px, #fff 1px), linear-gradient(to right, #fff 1px, #fff 1px);
        background-size: 1px 100%, 1px 100%, 1px 100%, 1px 100%, 1px 100%;
        background-repeat: no-repeat;
        background-position: 0 0, 100% 0, 25% 0, 50% 0, 75% 0;
        min-width: 96px;
        width: 96px;
    }

    /* .sked-tape__date:nth-child(odd) {
            background: #751b1b;
        } */

    .sked-tape__dummy-event-time {
        position: absolute;
        display: block;
        top: 50%;
        transform: translateY(-50%);
        color: #fff;
        border: 1px solid #0C1B38;
        background: #0C1B38;
        padding: 3px 2px;
        line-height: 1;
        text-align: center;
    }

    .sked-tape__dummy-event {
        display: block;
        position: absolute;
        border: 2px dashed #0C1B38;
        top: 1px;
        bottom: 0;
        z-index: 4;
        white-space: nowrap;
        font-size: 12px;
        color: white;
    }

    @keyframes blink {
        0% {
            opacity: 1;
        }

        50% {
            opacity: 0.5;
        }

        100% {
            opacity: 1;
        }
    }

    .divCarrossel.blink {
        animation: blink 1s infinite;
    }

    @keyframes pulse {
        0% {
            transform: scale(1);
        }

        50% {
            transform: scale(1.1);
        }

        100% {
            transform: scale(1);
        }
    }

    .divCarrossel.pulse {
        animation: pulse 2s infinite;
    }

    .divCarrossel.yellow {
        background-color: #f9e076;
        border: #f9e076;
    }

    .divCarrossel.red {
        background-color: #822033;
        border: #822033;
    }

    .divCarrossel.pink {
        background-color: #FF80AB;
        border: #FF80AB;
    }

    .detalheButton {
        background-color: transparent;
        /* border-radius: 15px; */
        border: #fff;

    }

    /* .sked-tape__time-frame {
        display: block;
        width: 100%;
        overflow: auto;
        -webkit-overflow-scrolling: touch;
    } */
</style>

<body>
    <input id="userAuth" type="text" value="<?php echo $user[user_id] ?>" hidden>
    <div id="dateForm">

        <label for="dataSelecionada">Selecione uma data:</label>
        <input type="date" id="dataSelecionada">
    </div>
    <div class="expanded-container">
        <div class="carousel" id="carousel"></div>
    </div>
    <!-- right offcanvas -->
    <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
        <div class="offcanvas-header border-bottom">
            <h5 class="offcanvas-title" id="offcanvasRightLabel">Detalhamento da Ordem de Serviço</h5>
            <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body p-0 overflow-hidden">
            <div data-simplebar style="height: calc(100vh - 112px);">
                <div class="acitivity-timeline p-4">
                    <div class="acitivity-item d-flex">
                        <div class="flex-shrink-0">
                            <img src="assets/images/users/avatar-1.jpg" alt=""
                                class="avatar-xs rounded-circle acitivity-avatar">
                        </div>
                        <div class="flex-grow-1 ms-3">
                            <h6 id="numeroOS" class="mb-1"></h6>
                            <p id="tipoTextContent" class="text-muted mb-2"></p>
                            <p id="clienteTextContent" class="text-muted mb-2"></p>
                            <p id="dataAberturaTextContent" class="text-muted mb-2"></p>
                            <p id="observacoesTextContent" class="text-muted mb-2"></p>
                            <p id="statusTextContent" class="text-muted mb-2"></p>
                            <small id="solicitanteSmall" class="mb-0 text-muted"></small>
                            <hr />
                            <h6>Informações Adicionais:</h6>
                            <ul id="ulElementId">
                                <li></li>
                                <li></li>
                                <li></li>
                                <li></li>
                                <li></li>
                            </ul>
                            <hr />
                            <h6>Progresso:</h6>
                            <div class="progress mb-3" style="height: 7px;">
                                <div class="progress-bar bg-success" role="progressbar" style="width: 75%;"
                                    aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                            <hr />
                            <h6>Histórico:</h6>
                            <ul class="timeline">
                                <li><span>14/08/2023 11:20:04</span> Ordem de serviço criada por Gustavo Costa.</li>
                                <li><span>14/08/2023 13:00:00</span> Técnico João Silva designado para a ordem de
                                    serviço.</li>
                                <li><span>14/08/2023 14:30:00</span> João Silva iniciou o serviço.</li>
                                <!-- ... -->
                            </ul>
                            <hr />
                            <h6>Ações:</h6>
                            <div class="d-flex justify-content-between">
                                <button type="button" class="btn btn-primary btn-sm me-2">Iniciar Serviço</button>
                                <button type="button" class="btn btn-success btn-sm me-2">Concluir Serviço</button>
                                <button type="button" class="btn btn-danger btn-sm me-2">Cancelar Serviço</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="offcanvas-footer border p-3 text-center">
            <a href="controle_os" class="">Ver Todas as Ordens de Serviço<i class=""></i></a>
        </div>
    </div>
    <br>

    <div class="teste">

        <!-- <div class="container mt-4 timeline-container"> -->

        <div class="mb-4">

            <div class="mb-2" id="sked1"></div>

        </div>

        <!-- </div> -->
    </div>
</body>

<script>
    let osDirecionar = <?php echo $resultadoConsulta; ?>;
    let locations = <?php echo $resultadoConsultaTecnicos; ?>;
    let events = <?php echo $resultadoConsultaOrdensDirecionadas; ?>

    var carouselContainer = document.getElementById("carousel");

    window.addEventListener('DOMContentLoaded', function () {
        const elements = document.querySelectorAll('.concluido, .deslocamento, .cancelado, .impedido, .atendimento, .descanso, .orcamento');

        const elementsBalons = document.querySelectorAll('.concluido, .deslocamento, .cancelado, .impedido, .atendimento, .descanso, .orcamento, .direcionado');

        elements.forEach(function (elemento) {
            elemento.addEventListener("click", function (event) {
                event.stopPropagation();
            });
        });

        elementsBalons.forEach(function (elemento) {
            elemento.addEventListener('mouseover', function (event) {
                gerarBalao()
            });
        });

        const form = document.getElementById('dateForm');
        const dateInput = document.getElementById('dataSelecionada');

        dateInput.addEventListener('change', function () {
            const selectedDate = dateInput.value;
            console.log('data', selectedDate)
            const urlDestino = `linha_do_tempo/${selectedDate}`;

            window.location.href = urlDestino;
        });

        const pageTotal = document.querySelector('.page-content')

        pageTotal.addEventListener('click', function (event) {
            if (event.target === pageTotal) {
                if (selectedId) {
                    let ordem = null

                    for (let index = 0; index < osDirecionar.length; index++) {
                        if (selectedId == osDirecionar[index].os_id) {
                            ordem = osDirecionar[index]
                        }
                    }

                    var divsCarrossel = document.querySelectorAll('.divCarrossel');

                    var id = selectedId;

                    for (var i = 0; i < divsCarrossel.length; i++) {
                        var divCarrossel = divsCarrossel[i];

                        var cards = divCarrossel.querySelectorAll('.card-body');

                        for (var j = 0; j < cards.length; j++) {
                            var cardId = cards[j].id;

                            if (cardId === id) {
                                var selectedDiv = divCarrossel;

                                if (ordem.os_tipo_nome === "Emergência") {
                                    selectedDiv.classList.add("blink");
                                    selectedDiv.classList.add("red");
                                    selectedDiv.classList.remove('pulse');
                                } else if (ordem.os_tipo_nome === "Avançado") {
                                    selectedDiv.classList.add("yellow");
                                    selectedDiv.classList.remove('pulse');
                                } else {
                                    selectedDiv.classList.add("pink");
                                    selectedDiv.classList.remove('pulse');
                                }

                                selectedId = null

                            }
                        }
                    }

                }
            }
        });






    });

    osDirecionar.forEach(ordem => {
        const card = document.createElement("div");
        card.classList.add("divCarrossel");

        // let orderAtual = ordem
        var innerHTML = `
                    <div class="card-body" id="${ordem.os_id}">
                        <div class="info-section" data-order="${ordem}">
                            <p class="location"><i class="fa-solid fa-location-dot" style="color: #ffffff;"><span class="text-span"> ${ordem.cliente_fantasia}</span></i></p>

                            <p class="tech-name" ><i class="fas fa-wrench"></i> <span class="text-span">${ordem.os_tipo_nome}</span></p>

                            <p class="location"><i class="fa-solid fa-calendar-days" style="color: #ffffff;"></i> <span class="text-span">${converterDataHora(ordem.os_data_abertura)}</span></p>
                            
                            <button onclick="testeoff('${ordem.os_id}', 1)" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight" class="detalheButton" id="detalhamentoButon"><p ><i class="fa-solid fa-arrow-right" style="color: #ffffff;"></i> <span class="text-span" style="color: #ffffff;">Detalhamento</span></p></button>
                            
                        </div>
                    </div>
                `;

        card.innerHTML = innerHTML

        if (ordem.os_tipo_nome === "Emergência") {
            card.classList.add("blink");
            card.classList.add("red");
        } else if (ordem.os_tipo_nome === "Avançado") {
            // card.classList.add("blink");
            card.classList.add("yellow");
        } else {
            card.classList.add("pink");
        }

        card.addEventListener("click", () => {
            var lard = event.target.closest('.card-body');
            console.log(lard)
            if (lard) {
                var previousCard = carouselContainer.querySelector('.pulse');

                if (previousCard) {
                    var techNameSpan = previousCard.querySelector('.tech-name .text-span').textContent;
                    console.log('opa', techNameSpan)
                    previousCard.classList.remove('pulse');

                    if (techNameSpan === "Emergência") {
                        previousCard.classList.add("blink");
                        previousCard.classList.add("red");
                    }
                    if (techNameSpan === "Avançado") {
                        // previousCard.classList.add("blink");
                        previousCard.classList.add("yellow");
                    }
                    if (techNameSpan != "Avançado" && techNameSpan != "Emergência") {
                        previousCard.classList.add("pink");

                    }
                }
            }

            card.classList.remove("blink");
            card.classList.remove("yellow");
            card.classList.remove("pink");
            card.classList.remove("red");
            card.classList.add("pulse");
            selectedId = lard.id

        });

        carouselContainer.appendChild(card);
    })

    function converterDataHora(dataHoraString) {
        // Extrair as partes da data e hora
        var partes = dataHoraString.split(" ");
        var dataPartes = partes[0].split("-");
        var horaPartes = partes[1].split(":");

        // Criar uma instância de Date com as partes extraídas
        var dataHora = new Date(
            parseInt(dataPartes[0]),
            parseInt(dataPartes[1]) - 1,
            parseInt(dataPartes[2]),
            parseInt(horaPartes[0]),
            parseInt(horaPartes[1]),
            parseInt(horaPartes[2])
        );

        // Formatar a data e hora como string no formato desejado
        var dataFormatada = ("0" + dataHora.getDate()).slice(-2);
        var mesFormatado = ("0" + (dataHora.getMonth() + 1)).slice(-2);
        var anoFormatado = dataHora.getFullYear();
        var horaFormatada = ("0" + dataHora.getHours()).slice(-2);
        var minutosFormatados = ("0" + dataHora.getMinutes()).slice(-2);
        var segundosFormatados = ("0" + dataHora.getSeconds()).slice(-2);

        var dataHoraFormatada = dataFormatada + "/" + mesFormatado + "/" + anoFormatado + " " +
            horaFormatada + ":" + minutosFormatados + ":" + segundosFormatados;

        return dataHoraFormatada;
    }

    function converterData(dataJS) {
        const dataObj = new Date(dataJS);

        // Função auxiliar para adicionar zeros à esquerda
        function zeroEsquerda(num, tamanho) {
            return ('0' + num).slice(-tamanho);
        }

        const ano = dataObj.getFullYear();
        const mes = zeroEsquerda(dataObj.getMonth() + 1, 2);
        const dia = zeroEsquerda(dataObj.getDate(), 2);
        const hora = zeroEsquerda(dataObj.getHours(), 2);
        const minuto = zeroEsquerda(dataObj.getMinutes(), 2);
        const segundo = zeroEsquerda(dataObj.getSeconds(), 2);
        const milissegundos = zeroEsquerda(dataObj.getMilliseconds(), 3);

        const dataFormatada = `${ano}-${mes}-${dia} ${hora}:${minuto}:${segundo}.${milissegundos}`;
        return dataFormatada;
    }

    function obterInformacoes(ordem) {
        let opcoes = {
            year: 'numeric',
            month: '2-digit',
            day: '2-digit',
            hour: '2-digit',
            minute: '2-digit'
        };
        if (ordem.evento) {
            // Tipo evento
            if (ordem.status === 'Em atendimento') {
                return new Date(ordem.evento_inicio).toLocaleDateString('pt-BR', opcoes);
            } else if (ordem.status === 'Concluido') {
                return new Date(ordem.evento_inicio).toLocaleDateString('pt-BR', opcoes) + ' - ' + new Date(ordem.evento_fim).toLocaleDateString('pt-BR', opcoes);
            }
        } else {
            // Tipo ordem
            if (ordem.os_status_nome === 'Em atendimento') {
                return new Date(ordem.chamado_hora_inicio).toLocaleDateString('pt-BR', opcoes);
            } else if (ordem.os_status_nome === 'Direcionado') {
                return new Date(ordem.chamado_hora_inicial_esperada).toLocaleDateString('pt-BR', opcoes);
            } else if (ordem.os_status_nome === 'Cancelado') {
                return new Date(ordem.chamado_hora_inicial_esperada).toLocaleDateString('pt-BR', opcoes);
            } else if (ordem.os_status_nome === 'Concluido') {
                return new Date(ordem.chamado_hora_inicio).toLocaleDateString('pt-BR', opcoes) + ' - ' + new Date(ordem.os_hora_final).toLocaleDateString('pt-BR', opcoes);
            } else if (ordem.os_status_nome === 'Orçamento') {
                return new Date(ordem.chamado_hora_inicio).toLocaleDateString('pt-BR', opcoes) + ' - ' + new Date(ordem.os_hora_final).toLocaleDateString('pt-BR', opcoes);
            } else if (ordem.os_status_nome === 'Impedido') {
                return new Date(ordem.chamado_hora_inicial_esperada).toLocaleDateString('pt-BR', opcoes);
            }
        }
    }

    function gerarBalao() {
        const elements = document.querySelectorAll('.concluido,.deslocamento,.direcionado,.impedido,.cancelado,.atendimento,.orcamento,.descanso');
        const balloon = document.createElement('div');
        balloon.style.display = 'none';
        balloon.style.position = 'absolute';
        balloon.style.zIndex = '9999';
        balloon.style.width = '400px';
        balloon.style.height = '210px';
        balloon.style.backgroundColor = '#f9f9f9';
        balloon.style.border = '1px solid #e0e0e0';
        balloon.style.padding = '15px';
        balloon.style.borderRadius = '10px';
        document.body.appendChild(balloon);
        let hideTimeout;
        elements.forEach(function (element) {
            element.addEventListener('mouseover', () => {
                clearTimeout(hideTimeout);
                balloon.style.display = 'block';
                requestAnimationFrame(() => {
                    const rect = element.getBoundingClientRect();
                    balloon.style.top = rect.top + window.scrollY - balloon.offsetHeight - 10 + 'px';
                    balloon.style.left = rect.left + window.scrollX + 'px';
                    const input = element.querySelector('.sked-tape__center input');
                    let value = input.value;
                    let cliente = null;
                    let tipoDeManutencao = null;
                    let horario = null;
                    let endereco = null;
                    for (let index = 0; index < events.length; index++) {
                        if (events[index].chamado_id == value) {
                            cliente = events[index].cliente_fantasia;
                            tipoDeManutencao = events[index].os_tipo_nome;
                            horario = obterInformacoes(events[index]);
                            endereco = events[index].chamado_observacoes;
                        }
                        if (events[index].id == value) {
                            cliente = events[index].nome_evento;
                            tipoDeManutencao = 'Cotidiano';
                            horario = obterInformacoes(events[index]);
                            endereco = events[index].evento_inicio;
                        }
                    }
                    const classes = element.className.split(' ');
                    let corresponde = false;
                    classes.forEach(classe => {
                        if (classe == 'direcionado') {
                            corresponde = true;
                        }
                    });

                    const conditionalItem =  corresponde ? [
                        {
                            class: 'fas fa-arrow-left',
                            label: 'Retornar',
                            isButton: true,
                            isReturn: true
                        }
                    ] : [];

                    const icons = [{
                        class: 'fas fa-user',
                        label: cliente
                    },
                    {
                        class: 'fas fa-wrench',
                        label: tipoDeManutencao
                    },
                    {
                        class: 'far fa-clock',
                        label: horario
                    },
                    {
                        class: 'fas fa-map-marker-alt',
                        label: endereco
                    },
                    {
                        class: 'fas fa-arrow-right',
                        label: 'Detalhamento',
                        isButton: true,
                        isReturn: false
                    },
                    ...conditionalItem
                    ];
                    icons.forEach(icon => {
                        let iconElement = balloon.querySelector(`i.${icon.class.split(' ').join('.')}`);
                        if (!iconElement) {
                            iconElement = document.createElement('i');
                            iconElement.className = icon.class;
                            iconElement.style.color = '#333';
                            iconElement.style.marginRight = '5px';

                            // Altere a linha abaixo para criar um elemento button ou a, dependendo da propriedade isButton
                            const labelElement = icon.isButton ? document.createElement('button') : document.createElement('a');
                            labelElement.textContent = icon.label;
                            labelElement.style.color = '#333';
                            labelElement.style.fontFamily = 'Helvetica, Arial, sans-serif';
                            labelElement.style.fontSize = '14px';
                            labelElement.style.textDecoration = 'none';

                            // Adicione as propriedades desejadas ao elemento button
                            if (icon.isButton && !icon.isReturn) {
                                labelElement.setAttribute('data-bs-toggle', 'offcanvas');
                                labelElement.setAttribute('data-bs-target', '#offcanvasRight');
                                labelElement.setAttribute('aria-controls', 'offcanvasRight');
                                labelElement.setAttribute('class', 'btn btn-primary');
                                labelElement.setAttribute('onclick', `testeoff(${value}, 2)`)
                                // Adicione outras propriedades aqui, se necessário
                            }

                            if (icon.isButton && icon.isReturn) {
                                labelElement.setAttribute('class', 'btn btn-primary');
                                labelElement.setAttribute('onclick', `retornarOs(${value})`)
                                // Adicione outras propriedades aqui, se necessário
                            }

                            const containerElement = document.createElement('div');
                            containerElement.style.display = 'flex';
                            containerElement.style.alignItems = 'center';
                            containerElement.style.marginBottom = '5px';
                            containerElement.appendChild(iconElement);
                            containerElement.appendChild(labelElement);
                            balloon.appendChild(containerElement);
                        }
                    });
                });
            });
            element.addEventListener('mouseout', () => {
                hideTimeout = setTimeout(() => {
                    balloon.style.display = 'none';
                }, 300);
            });
        });
        balloon.addEventListener('mouseover', () => {
            clearTimeout(hideTimeout);
        });

        balloon.addEventListener('mouseout', () => {
            hideTimeout = setTimeout(() => {
                balloon.style.display = 'none';
            }, 300);
        });
    }

    function today(hours, minutes) {
        var date = new Date();
        date.setHours(hours, minutes, 0, 0);
        return date;
    }

    function direcionar(event) {
        console.log('hshshshs', event)
        // alert(event.start)
        const event_id = event.userData.id_os; // exemplo
        const os_id = event.userData.os_id;
        const event_start = event.start; // exemplo
        const event_idTecnico = event.userData.locations[event.location - 1].idTecnico
        const event_dataAbertura = event.userData.event_dataAbertura
        const codigo_cliente = event.userData.codigo_cliente
        const observacoes = event.userData.observacoes
        const tipo = event.userData.tipo
        const userAuth = document.getElementById('userAuth').value
        // Montar o objeto de dados a ser enviado no corpo da requisição
        const data = {
            event_id: event_id,
            event_start: event_start,
            event_idTecnico: event_idTecnico,
            event_dataAbertura: event_dataAbertura,
            codigo_cliente: codigo_cliente,
            observacoes: observacoes,
            tipo: tipo,
            user: userAuth,
            os_id: os_id
        };
        console.log('data', data)

        fetch(`direcionar_os/${event.userData.id_os}`, {
            method: 'POST', // ou 'PUT'
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify(data)
        })
            .then(function (response) {
                console.log('este aqui', response)
                if (response.ok) {
                    return response.text();
                } else {
                    throw new Error('Erro na requisição: ' + response.status);
                }
            })
            .then(function (data) {
                // Tratar a resposta do PHP, se necessário
                console.log(data);
            })
            .catch(function (error) {
                // Tratar qualquer erro ocorrido durante a requisição
                console.log('Erro: ' + error.message);
            });

        alert(`O.S Direcionada para o técnico ${event.userData.locations[event.location - 1].name}`)
        location.reload();
    }

    function retornarOs(id) {

        let ordermRetornar = null

        for (let index = 0; index < events.length; index++) {
            if (events[index].chamado_id == id) {
                ordermRetornar = events[index]
            }

        }

        // iterar e pegar o numero da os a partir do numero do chamado
        const data = {
            os_id: ordermRetornar.chamado_os
        };

        fetch(`retornar_os`, {
            method: 'POST', // ou 'PUT'
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify(data)
        })
            .then(function (response) {
                if (response.ok) {
                    return response.text();
                } else {
                    throw new Error('Erro na requisição: ' + response.status);
                }
            })
            .then(function (data) {
                console.log(data);
            })
            .catch(function (error) {
                console.log('Erro: ' + error.message);
            });

        location.reload();
    }

    function testeoff(idOs, type) {

        if (type == 1) {
            let os = null

            for (let index = 0; index < osDirecionar.length; index++) {
                if (osDirecionar[index].os_id == idOs) {
                    os = osDirecionar[index]
                }
            }

            const tipoTextContent = document.getElementById('tipoTextContent')
            const clienteTextContent = document.getElementById('clienteTextContent')
            const dataAberturaTextContent = document.getElementById('dataAberturaTextContent')
            const observacoesTextContent = document.getElementById('observacoesTextContent')
            const statusTextContent = document.getElementById('statusTextContent')
            const solicitanteSmall = document.getElementById('solicitanteSmall')
            const numeroOS = document.getElementById('numeroOS')

            tipoTextContent.textContent = `Tipo: ${os.os_tipo_nome}`
            clienteTextContent.textContent = `Cliente: ${os.cliente_fantasia}`
            dataAberturaTextContent.textContent = `Data de Abertura: ${os.os_data_abertura}`
            observacoesTextContent.textContent = `Considerações: ${os.os_consideracoes}`
            statusTextContent.textContent = `Status: ${os.os_status_nome}`
            solicitanteSmall.innerText = `Solicitante: ${os.os_solicitante}`
            numeroOS.innerText = `Ordem de Serviço #${os.os_id}`

            const ulElement = document.getElementById('ulElementId');

            // Array com os novos conteúdos dos itens
            const newItemsContent = [
                `Tempo estimado para conclusão: ${os.os_tipos_tempo} minutos`,
                `Previsão de início: ${'Não Direcionado'}`,
                `Previsão de término: ${'Não Direcionado'}`,
                `Hora de início real: ${'Não Direcionado'}`,
                `Hora de término real: ${'Não Direcionado'}`
            ];

            const liElements = ulElement.querySelectorAll('li');

            liElements.forEach((liElement, index) => {
                liElement.textContent = newItemsContent[index];
            });
        }

        if (type == 2) {
            let ordem = null

            for (let index = 0; index < events.length; index++) {
                if (events[index].chamado_id || events[index].id == idOs) {
                    ordem = events[index]
                }
            }

            const tipoTextContent = document.getElementById('tipoTextContent')
            const clienteTextContent = document.getElementById('clienteTextContent')
            const dataAberturaTextContent = document.getElementById('dataAberturaTextContent')
            const observacoesTextContent = document.getElementById('observacoesTextContent')
            const statusTextContent = document.getElementById('statusTextContent')
            const solicitanteSmall = document.getElementById('solicitanteSmall')
            const numeroOS = document.getElementById('numeroOS')

            tipoTextContent.textContent = `Tipo: ${ordem.os_tipo_nome || ordem.nome_evento}`
            clienteTextContent.textContent = `Cliente: ${ordem.cliente_fantasia || 'Evento Técnico'}`
            dataAberturaTextContent.textContent = `Data de Abertura: ${ordem.chamado_data_os || ordem.evento_data_referencia}`
            observacoesTextContent.textContent = `Considerações: ${ordem.chamado_observacoes || 'Evento Técnico'}`
            statusTextContent.textContent = `Status: ${ordem.os_status_nome || 'Evento Técnico'}`
            solicitanteSmall.innerText = `Solicitante: ${ordem.os_solicitante || 'Gustavo'}`
            numeroOS.innerText = `Ordem de Serviço #kk${ordem.chamado_os || 'Evento Técnico'}`

            const ulElement = document.getElementById('ulElementId');

            // Array com os novos conteúdos dos itens
            const newItemsContent = [
                `Tempo estimado para conclusão: ${ordem.os_tipos_tempo + 'minutos' || "Evento Técnico"}`,
                `Previsão de início: ${ordem.chamado_hora_inicial_esperada || 'Evento Técnico'}`,
                `Previsão de término: ${ordem.chamado_hora_inicial_esperada
                    ? addMinutesToDatetime(ordem.chamado_hora_inicial_esperada, ordem.os_tipos_tempo) || 'Evento Técnico'
                    : 'Evento Técnico'}`,
                `Hora de início real: ${ordem.chamado_hora_inicio || ordem.evento_inicio || 'Não Iniciada'}`,
                `Hora de término real: ${ordem.chamado_hora_final || ordem.evento_fim || 'Não Iniciada'}`
            ];

            const liElements = ulElement.querySelectorAll('li');

            liElements.forEach((liElement, index) => {
                liElement.textContent = newItemsContent[index];
            });
        }

    }

    function addMinutesToDatetime(datetimeString, minutes) {
        const datetime = new Date(datetimeString);
        datetime.setTime(datetime.getTime() + minutes * 60 * 1000);

        const year = datetime.getFullYear();
        const month = String(datetime.getMonth() + 1).padStart(2, '0');
        const day = String(datetime.getDate()).padStart(2, '0');
        const hours = String(datetime.getHours()).padStart(2, '0');
        const minutesFormatted = String(datetime.getMinutes()).padStart(2, '0');
        const seconds = String(datetime.getSeconds()).padStart(2, '0');
        const milliseconds = String(datetime.getMilliseconds()).padStart(3, '0');

        const newDatetimeString = `${year}-${month}-${day} ${hours}:${minutesFormatted}:${seconds}.${milliseconds}`;
        return newDatetimeString;
    }

    function mountUserDataFunction(idOs) {

        let os = null

        for (let index = 0; index < osDirecionar.length; index++) {
            if (osDirecionar[index].os_id == idOs) {
                os = osDirecionar[index]
            }
        }

        const cliente_fantasia = os.cliente_fantasia
        const event_dataAbertura = os.os_data_abertura
        const codigo_cliente = os.os_cliente
        const observacoes = os.os_consideracoes
        const tipo = os.os_tipo
        const duration = os.os_tipos_tempo

        return {
            locations: locations,
            id_os: idOs,
            cliente_fantasia: cliente_fantasia,
            event_dataAbertura: event_dataAbertura,
            codigo_cliente: codigo_cliente,
            observacoes: observacoes,
            tipo: tipo,
            duration: duration
        }
    }

    var $sked1 = $('#sked1').skedTape({
        caption: 'Técnicos',
        start: today(8, 0),
        end: today(24, 0),
        showEventTime: true,
        showEventDuration: true,
        scrollWithYWheel: true,
        locations: locations.slice(),
        events: events.slice(),
        maxTimeGapHi: 60 * 1000, // 1 minute
        minGapTimeBetween: 1 * 60 * 1000,
        snapToMins: 1,
        editMode: true,
        timeIndicatorSerifs: true,
        showIntermission: true,
        formatters: {
            date: function (date) {
                return $.fn.skedTape.format.date(date, 'l', '/');
            },
            duration: function (ms, opts) {
                return $.fn.skedTape.format.duration(ms, {
                    hrs: 'ч.',
                    min: 'мин.'
                });
            },
        },

        postRenderLocation: function ($el, location, canAdd) {
            this.constructor.prototype.postRenderLocation($el, location, canAdd);
            // $el.prepend('<img src="https://s3.amazonaws.com/attachments.fieldcontrol.com.br/accounts/6118/employees/9271b714-c5cb-4f75-bdd0-abc71276dfd0/518e.83c14040f.png?id=1bf9.cb7bee33a" alt="Imagem" class="icone"/>');
        }
    });
    $sked1.on('event:dragEnded.skedtape', function (e) {
        var event = e.detail.event;
        var startTime = converterData(event.start);
        event.status = true
        var current = new Date()
        var currentTime = converterData(current)
        if (startTime < currentTime) {
            event.start = new Date();
            $sked1.skedTape('updateEvent', event);
        }
        event.start = converterData(event.start);
        direcionar(event)
    });
    $sked1.on('event:click.skedtape', function (e) {
        $sked1.skedTape('removeEvent', e.detail.event.id);
    });
    $sked1.on('timeline:click.skedtape', function (e, api) {
        try {
            if (selectedId) {
                var startTime = e.detail.time;
                var currentTime = new Date();
                if (startTime < currentTime) {
                    startTime = currentTime;
                }
                const mountUserData = mountUserDataFunction(selectedId)
                $sked1.skedTape('startAdding', {
                    name: 'New meeting ' + selectedId,
                    id: selectedId,
                    start: startTime,
                    duration: parseInt(mountUserData.duration, 10) * 60 * 1000,
                    started: false,
                    className: 'deslocamento-event',
                    userData: mountUserData,
                });
                document.getElementById(selectedId).classList.remove('pulse');
                selectedId = null;
            }
        } catch (e) {
            if (e.name !== 'SkedTape.CollisionError') throw e;
            alert('Already exists');
        }
    });
</script>