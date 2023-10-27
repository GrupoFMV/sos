<?php

//cCODIGO DA SESSION
if (!empty($_SESSION['user_id'])) {
} else {
    $_SESSION['msg'] = "Área restrita";
    header("Location: ../../login.php");
}

include "database/conexao.php";

 ?>
<script src="assets/js/jquery.js"></script>
<script src="//code.jquery.com/jquery-3.2.1.min.js"></script>



	<?php

// verificando cadastro
$sql = "SELECT * FROM status_tarefas WHERE status_tarefas_setor = '$_POST[setor]' order by status_tarefas_posicao ";	
$resultado = mysqli_query($conn, $sql);
$linha=mysqli_fetch_array($resultado);


if ($linha['status_tarefas_posicao'] < '4' ) {
	
$posicao = 5 ;	
} else {
$posicao1 = $linha['status_tarefas_posicao'] ;
$posicao = $posicao1 + 1;
 }



date_default_timezone_set('America/Sao_Paulo');
$date = date('Y-m-d H:i');

$conn->query($insert = "INSERT INTO status_tarefas (status_tarefas_titulo, status_tarefas_setor,status_tarefas_posicao) VALUES ('$_POST[titulo]','$_POST[setor]','$posicao')");


?>

 <style>

.button {     
    background-color: Transparent;
    background-repeat:no-repeat;
    border: none;
    cursor:pointer;
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
                                                                <lord-icon
                                                                    src="https://cdn.lordicon.com/lupuorrc.json"
                                                                    trigger="loop"
                                                                    colors="primary:#121331,secondary:#08a88a"
                                                                    style="width:120px;height:120px">
                                                                </lord-icon>
                                                                
                                                                <div class="mt-4">
                                                                    <h4 class="mb-3">Tudo certo!</h4>
                                                                    <p class="text-muted mb-4"> Coluna cadastrada com sucesso.</p>
                                                                    <div class="hstack gap-2 justify-content-center">
                                                                        
                                                                        <a href="formulario_coluna"  class="btn btn-success">Fechar</a>
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