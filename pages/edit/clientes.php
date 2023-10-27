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

@$conn->query("update clientes set cliente_razao =  '$_POST[razao]',cliente_cpf = '$_POST[cpf]',cliente_fantasia = '$_POST[fantasia]',cliente_retem = '$_POST[retem]',cliente_datainicio = '$_POST[inicio]',cliente_datatermino = '$_POST[termino]',cliente_valor = '$_POST[valor]',cliente_reajuste = '$_POST[reajuste]',cliente_sindico = '$_POST[sindico]',cliente_telefone = '$_POST[telefone]',cliente_email = '$_POST[email]',cliente_mandato = '$_POST[mandato]',administradora = '$_POST[administradora]',nome = '$_POST[nome_outroscontato]',responsavel = '$_POST[responsavel]',email = '$_POST[email_outroscontato]',cliente_cep = '$_POST[cep]',cliente_logradouro = '$_POST[rua]',cliente_numero = '$_POST[numero]',cliente_complemento = '$_POST[complemento]',cliente_bairro = '$_POST[bairro]',cliente_estado = '$_POST[uf]',cliente_cidade = '$_POST[cidade]',cliente_observacoes = '$_POST[observacoes]'
                                   
where cliente_id = '$_POST[id]' ");


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
                                                                    <p class="text-muted mb-4"> Cliente atualizado com sucesso.</p>
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