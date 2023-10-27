<?php
//cCODIGO DA SESSION
if (!empty($_SESSION['user_id'])) {
} else {
    $_SESSION['msg'] = "Área restrita";
    header("Location: ../../login.php");
}

ini_set('display_errors',1);
ini_set('display_startup_erros',1);
error_reporting(E_ALL);


include "database/conexao.php";

 ?>
<script src="assets/js/jquery.js"></script>
<script src="//code.jquery.com/jquery-3.2.1.min.js"></script>
	<?php


$aplicacao = implode(",", $_POST['aplicacao']);
$fornecedor = implode(",", $_POST['fornecedor']);

$ap = '{"categoria":{"id":['.$aplicacao.']}}' ;
$fn = '{"fornecedor":{"id":['.$fornecedor.']}}' ;

$conn->query($insert = "INSERT INTO produtos (produto_nome,produto_valor_compra,produto_valor_venda,produto_fornecedores,produto_aplicacoes,produto_ncm,produto_tipo,produto_local_estoque,produto_estoque_minimo)  
VALUES ('$_POST[nome]','$_POST[compra]','$_POST[venda]','$fn','$ap','$_POST[ncm]','$_POST[tipo]','$_POST[localestoque]','$_POST[estoqueminimo]')");


$ultimo_id = $conn->insert_id;
//echo $conn;


foreach($_POST["aplicacao"] as $valor){
    $conn->query($insert = "INSERT INTO produtos_aplicacoes (produto_ap_produto,produto_ap_modelo)
    VALUES ('$ultimo_id','$valor')");
}


foreach($_POST["fornecedor"] as $valor2){
    $conn->query($insert = "INSERT INTO produtos_fornecedores (produto_f_produto,produto_f_fornecedor)
    VALUES ('$ultimo_id','$valor2')");
}



mkdir("./pages/produtos/fotos/$ultimo_id/", 0777, true);


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
                                                                        <a href="add_foto_produto/<?php echo $ultimo_id ?>"class="btn btn-success"><i class=" bx bx-image-add
																			"> </i> Adicionar Fotos</a>
																		
																		<a href="formulario_produtos/<?php echo $ultimo_id ?>"class="btn btn-info"><i class=" bx bx-image-add
																			"> </i> Adicionar Outro Produto</a>
																		
                                                                        <a href="listar_produtos"class="btn btn-danger">Fechar</a>
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
