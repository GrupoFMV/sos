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

$conn->query($insert = "INSERT INTO clientes (cliente_razao,cliente_cpf,cliente_fantasia,cliente_retem,cliente_datainicio,cliente_datatermino,cliente_valor,cliente_reajuste,cliente_sindico,cliente_telefone,cliente_email,cliente_mandato,administradora,nome,responsavel,email,cliente_cep,cliente_logradouro,cliente_numero,cliente_complemento,cliente_bairro,cliente_estado,cliente_cidade,cliente_observacoes)
                                VALUES ('$_POST[razao]','$_POST[cpf]','$_POST[fantasia]','$_POST[retem]','$_POST[inicio]','$_POST[termino]','$_POST[valor]','$_POST[reajuste]','$_POST[sindico]','$_POST[telefone]','$_POST[email]','$_POST[mandato]','$_POST[administradora]','$_POST[nome_outroscontato]','$_POST[responsavel]','$_POST[email_outroscontato]','$_POST[cep]','$_POST[rua]','$_POST[numero]','$_POST[complemento]','$_POST[bairro]','$_POST[uf]','$_POST[cidade]','$_POST[observacoes]')");


	$ultimo_id = $conn->insert_id;
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
                                                                    <p class="text-muted mb-4"> Cadastro realizado com sucesso. <br><br> Agora vamos cadastrar os equipamentos.</nt></nt></p>
                                                                    <div class="hstack gap-2 justify-content-center">
                                                                        
                                                                        <a href="formulario_equipamentos2/<?php echo $ultimo_id ?>"class="btn btn-success">Fechar</a>
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