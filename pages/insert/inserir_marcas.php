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
                                $sql = "SELECT * FROM marcas WHERE marca_nome = '$_POST[nomee]' ";
                                $resultado = mysqli_query($conn, $sql);
                                $totalmarcas = mysqli_num_rows($resultado);

                            
                                ?>

<?php 

if ($totalmarcas >= '1') {

    ?>
<script>
alert("Ops, já existe uma marca cadastrada com esse nome");
window.location.href = "formulario_marcas";

</script>

<?php  exit;} else { ?>


	<?php
$nome1 = $_POST['nomee'];
$conn->query($insert = "INSERT INTO marcas (marca_nome)
                                VALUES ('$nome1')");
 $ultimo_id = $conn->insert_id;
?>



<?php
$qtd_insert = count($_POST['nome']);
for($i = 0; $i <$qtd_insert; $i++) {
    $nome = $_POST['nome'][$i];
    $modelo = $_POST['modelo'][$i];
    $paradas = $_POST['paradas'][$i];
    $porta = $_POST['porta'][$i];	

    $conn->query($insert = "INSERT INTO modelos (modelo_marca,modelo_nome) VALUES ('$ultimo_id','$nome')");;
}

	//$ultimo_id = $conn->insert_id;
//echo $conn;

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
                                                                    <p class="text-muted mb-4"> Cadastro realizado com sucesso.</p>
                                                                    <div class="hstack gap-2 justify-content-center">
                                                                        
                                                                        <a href="listar_marcas" class="btn btn-success">Fechar</a>
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

        <?php } ?>