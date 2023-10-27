<?php
include "database/conexao.php";
@session_start();
if (!empty($_SESSION['user_id'])) {
} else {
    $_SESSION['msg'] = "Área restrita";
    header("Location: ../../login.php");
}

// PEGANDO DADOS DO USUARIO
$iduser = $_SESSION['user_id'];
$sqluser = "SELECT * FROM users WHERE user_id = '$iduser'";
$exeuser = mysqli_query($conn, $sqluser);
$user = mysqli_fetch_array($exeuser);



$conn->query($insert = "INSERT INTO fornecedores (fornecedor_nome, fornecedor_cpf, fornecedor_telefone, fornecedor_email, fornecedor_cep, fornecedor_numero, fornecedor_bairro, fornecedor_cidade, fornecedor_complemento, fornecedor_estado, fornecedor_pais, fornecedor_observacoes, fornecedor_ie, fornecedor_quem, fornecedor_emp) VALUES ('$_POST[nome]','$_POST[cpf]','$_POST[telefone]','$_POST[email]','$_POST[cep]','$_POST[numero]','$_POST[bairro]','$_POST[cidade]','$_POST[complemento]','$_POST[estado]','$_POST[pais]','$_POST[observacoes]','$_POST[ie]','$iduser','1')");



	
	//$ultimo_id = $conn->insert_id;


?>
<script src="assets/js/jquery.js"></script>
<script src="//code.jquery.com/jquery-3.2.1.min.js"></script>
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
                                                    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
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
                                                                     
																		
                                                                        <a href="listar_fornecedores"class="btn btn-danger">Fechar</a>
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
