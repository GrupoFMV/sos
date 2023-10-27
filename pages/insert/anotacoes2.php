<?php
//cCODIGO DA SESSION
if (!empty($_SESSION['user_id'])) {
} else {
    $_SESSION['msg'] = "Área restrita";
    header("Location: ../../login.php");
}

error_reporting(E_ALL);
 
/* Habilita a exibição de erros */
ini_set("display_errors", 1);

include "database/conexao.php";

?>
<script src="assets/js/jquery.js"></script>
<script src="//code.jquery.com/jquery-3.2.1.min.js"></script>

<script src="assets/js/jquery.js"></script>
<script src="//code.jquery.com/jquery-3.2.1.min.js"></script>
	<?php

 $qtd_inserta = count($_POST['equipamentos']);
for ($e = 0; $e < $qtd_inserta; $e++) {
    $data3 = $_POST['data'][$e];
    $trocaoleo = $_POST['data_troca'][$e];
    $databateria = $_POST['data_bateria'][$e];
    $bateria = $_POST['bateria'][$e];
    $equipamento = $_POST['equipamentos'][$e];
    $doleo = $_POST['troca_mes'][$e];
    $dbateria = $_POST['data_bateria'][$e];
   
    
    
    if ($doleo =='12') {
         $voleo = date('Y-m-d', strtotime('+365 days', strtotime($trocaoleo)));
    }
    
     if ($doleo =='24') {
         
         $voleo = date('Y-m-d', strtotime('+730 days', strtotime($trocaoleo)));

    }
    
    
    $vbateria = date('Y-m-d', strtotime('+547 days', strtotime($dbateria)));

    $vart = date('Y-m-d', strtotime('+365 days', strtotime($data3)));





    $conn->query($inserta = "INSERT INTO anotacoes_clientes (anotacoes_clientes_id_cliente,anotacoes_equipamentos,anotacoes_data,anotacoes_data_troca, anotacao_validade_oleo,  anotacao_validade_bateria, anotacao_validade_art, anotacoes_oleo,anotacoes_data_bateria,anotacoes_modelo_bateria) VALUES ('$_POST[clientes]','$equipamento','$data3','$trocaoleo','$voleo', '$vbateria' , '$vart', '$doleo','$dbateria','$bateria')");


} 
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

                        <p class="text-muted mb-4"> Cadastro realizado com sucesso.</p>

                        <div class="hstack gap-2 justify-content-center">



                            <a href="listar_clientes" class="btn btn-success">Fechar</a>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

    </div>

    </div>



    <script>

        function sendForm() {

            $("#sa-departamento").click();

        }

    </script>

    <!-- $qtd_inserta = count($_POST['data_troca']);

for ($e = 0; $e < $qtd_inserta; $e++) {

    $data = $_POST['data_data'][$e];

    $trocaoleo = $_POST['data_troca'][$e];

    $oleo = $_POST['oleo'][$e];

    $databateria = $_POST['data_bateria'][$e];

    $bateria = $_POST['bateria'][$e];

    



    





    $conn->query($inserta = "INSERT INTO anotacoes_clientes(anotacoes_clientes_id_cliente,anotacoes_equipamentos,anotacoes_data,anotacoes_data_troca,anotacoes_oleo) VALUES ('$_POST[clientes]','$_POST[equipamentos]','$data','$trocaoleo','$oleo')");;

} --> 
