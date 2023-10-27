<?php

session_start(); // Inicia a sessão

// Verifica se o usuário está logado
if (empty($_SESSION['user_id'])) {
    $_SESSION['msg'] = "Área restrita";
    header("Location: ../../login.php");
    exit();
}

include "database/conexao.php";

// Obtém os valores do formulário
$id = $_POST['id'];
$nome = $_POST['nome'];
$modelo = $_POST['modelo'];
$paradas = $_POST['paradas'];
$marca2 = $_POST['marca2'];
$porta = $_POST['porta'];
$status = $_POST['status'];

// Atualiza os dados do equipamento na tabela equipamentos
$sqlUpdateEquipamento = "UPDATE equipamentos SET equipamento_nome = '$nome', equipamento_modelo = '$modelo', equipamentos_paradas = '$paradas', equipamento_id_marca = '$marca2', equipamentos_porta = '$porta', equipamento_status = '$status' WHERE equipamento_id = '$id'";
$resultadoUpdateEquipamento = mysqli_query($conn, $sqlUpdateEquipamento);

// Atualiza as anotações do equipamento na tabela anotacoes_clientes
$dataTroca = $_POST['data_troca'][0];
$trocaMes = $_POST['troca_mes'][0];
$dataBateria = $_POST['data_bateria'][0];
$modeloBateria = $_POST['bateria'][0];

$sqlUpdateAnotacoes = "UPDATE anotacoes_clientes SET anotacoes_data_troca = '$dataTroca', anotacao_validade_oleo = '$trocaMes', anotacoes_data_bateria = '$dataBateria', anotacoes_modelo_bateria = '$modeloBateria' WHERE anotacoes_equipamentos = '$id'";
$resultadoUpdateAnotacoes = mysqli_query($conn, $sqlUpdateAnotacoes);

?>

<style>
    .button {
        background-color: Transparent;
        background-repeat: no-repeat;
        border: none;
        cursor: pointer;
        overflow: hidden;
    }
</style>

<body onload="sendForm();">

    <button type="button" class="button" data-bs-toggle="modal" data-bs-target="#staticBackdrop" id="sa-departamento"></button>


    <!-- staticBackdrop Modal -->
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-body text-center p-5">
                    <lord-icon src="https://cdn.lordicon.com/lupuorrc.json" trigger="loop" colors="primary:#121331,secondary:#08a88a" style="width:120px;height:120px">
                    </lord-icon>

                    <div class="mt-4">
                        <h4 class="mb-3">Tudo certo!</h4>
                        <p class="text-muted mb-4"> Equipamento atualizado com sucesso.</p>
                        <div class="hstack gap-2 justify-content-center">

                            <a href="listar_equipamentos/<?php echo $_POST['cliente'] ?>" class="btn btn-success">Fechar</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>

    <script src="assets/js/jquery.js"></script>
    <script src="//code.jquery.com/jquery-3.2.1.min.js"></script>
    <script>
        function sendForm() {
            $("#sa-departamento").click();
        }
    </script>
</body>