<?php // CODIGO DA SESSION

if (!empty($_SESSION['user_id'])) {
} else {
    $_SESSION['msg'] = "Área restrita";
    header("Location: ../../login.php");
}

// PEGANDO DADOS DOS PRODUTOS
$sql = "SELECT * FROM produtos WHERE produto_id ='$id' ";
$resultado = mysqli_query($conn, $sql);
$linha = mysqli_fetch_array($resultado);
?>
<!-- Sweet Alert css-->
<link href="assets/libs/sweetalert2/sweetalert2.min.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.css" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.bundle.min.js"></script>
<script src="assets/js/bootstrap-select.min.js"></script>

<!-- Sweet Alert css-->
<link href="assets/libs/sweetalert2/sweetalert2.min.css" rel="stylesheet" type="text/css" />

<!-- INICIO DADOS INICIAIS -->

<form method="post" action="alterar_produtos" id="formeditar">

    <div id="dvConteudo2" style="display: block">


        <div class="row">

            <!--Inicio Formulario-->
            <div class="row">

                <h4 class="mb-sm-0">Produtos / Editar</h4>
                <div class="row gy-3">
                    <div class="card">
                        <div class="card-body">

                            <div class="row">

                                <div class="row gy-3">

                                    <div class="col-lg-12">
                                        <div>

                                            <label class="form-label mb-0">Nome</label>
                                            <input name="nome" type="text" class="form-control" id="razao" value="<?php echo $linha['produto_nome'] ?>">
                                        </div>
                                    </div>

                                    <div class="row gy-3">

                                    </div>

                                    <div class="col-lg-6">
                                        <div>
                                            <label class="form-label mb-0">Fornecedores</label>


                                            <select class="selectpicker form-control" name="fornecedor[]" multiple data-live-search="true">
                                                <?php
                                                $sqlaca = "SELECT * FROM marcas m INNER JOIN modelos mo ON m.marca_id = mo.modelo_marca ORDER BY mo.modelo_marca";
                                                $sqlaca = "SELECT * FROM fornecedores WHERE fornecedor_lixeira = '1'";
                                                $exeaca = mysqli_query($conn, $sqlaca);

                                                while ($categoria = mysqli_fetch_array($exeaca)) {
                                                    $sqlaca2 = "SELECT * FROM produtos_fornecedores WHERE produto_f_produto = $id AND produto_f_fornecedor = $categoria[fornecedor_id]";
                                                    $exeaca2 = mysqli_query($conn, $sqlaca2);
                                                    $categoria2 = mysqli_fetch_array($exeaca2);
                                                    $totalap = mysqli_num_rows($exeaca2);
                                                    $fornecedorId = $categoria['fornecedor_id'];
                                                    $fornecedorNome = $categoria['fornecedor_nome'];

                                                    if ($fornecedorId == 12) {
                                                        // Fornecedor desejado (oculto)
                                                        echo "<option value='$fornecedorId' selected style='display: none;'>$fornecedorNome</option>";
                                                    } else {
                                                        // Outros fornecedores
                                                        if ($totalap >= '1') {
                                                            echo "<option value='$fornecedorId' selected>$fornecedorNome</option>";
                                                        } else {
                                                            echo "<option value='$fornecedorId'>$fornecedorNome</option>";
                                                        }
                                                    }
                                                }
                                                ?>
                                            </select>




                                        </div>

                                    </div>

                                    <div class="col-lg-6">
    <div>
        <label class="form-label mb-0">Aplicações</label><br>
        <select class="selectpicker form-control" multiple data-live-search="true" name="aplicacao[]" data-style="btn-outline-warning" multiple data-actions-box="true">
            <?php
            $sqlaca = "SELECT * FROM marcas m INNER JOIN modelos mo ON m.marca_id = mo.modelo_marca ORDER BY mo.modelo_marca";
            $exeaca = mysqli_query($conn, $sqlaca);

            while ($categoria = mysqli_fetch_array($exeaca)) {
                $modeloId = $categoria['modelo_id'];
                $marcaNome = $categoria['marca_nome'];
                $modeloNome = $categoria['modelo_nome'];

                $sqlaca2 = "SELECT * FROM produtos_aplicacoes WHERE produto_ap_produto = $id AND produto_ap_modelo = $modeloId";
                $exeaca2 = mysqli_query($conn, $sqlaca2);
                $categoria2 = mysqli_fetch_array($exeaca2);
                $totalap = mysqli_num_rows($exeaca2);

                if ($totalap >= '1' || $modeloId == 55) {
                    echo "<option value='$modeloId' selected>$marcaNome - $modeloNome</option>";
                } else {
                    echo "<option value='$modeloId'>$marcaNome - $modeloNome</option>";
                }
            }
            ?>
        </select>
    </div>
</div>





                                    <div class="col-lg-6">
                                        <div>
                                            <label class="form-label mb-0">Tipo2</label>

                                            <?php
                                            echo "<SELECT NAME='tipo' SIZE='1' class='form-control'>
<OPTION VALUE='' SELECTED> Escolha ";
                                            $sqlt = "SELECT * FROM tipos_produtos ORDER BY nome_tipo_produtos";
                                            $resultadot = mysqli_query($conn, $sqlt);
                                            while ($linhat = mysqli_fetch_array($resultadot)) {
                                                echo "<OPTION VALUE='" . $linhat['id_tipo_produto'] . "' ";
                                                if ($linha['produto_tipo'] == $linhat['id_tipo_produto']) {
                                                    echo "SELECTED";
                                                }
                                                echo ">" . $linhat['nome_tipo_produtos'];
                                            }
                                            echo "</select>";
                                            ?>



                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <h4>Estoque</h4>
                                <div class="row gy-3">
                                    <div class="col-lg-6">

                                        <div>
                                            <label class="form-label mb-0">Estoque</label>
                                            <input name="estoque" type="text" class="form-control" id="fantasia" value="<?php echo $linha['produto_estoque'] ?>">
                                        </div>

                                    </div>

                                    <div class="col-lg-6">
                                        <div>
                                            <label class="form-label mb-0">NCM</label>
                                            <input name="ncm" type="text" class="form-control" id="fantasia" value="<?php echo $linha['produto_ncm'] ?>">
                                        </div>

                                    </div>


                                    <div class="col-lg-6">
                                        <div>
                                            <label class="form-label mb-0">Local estoque</label>


                                            <?php
                                            echo "<SELECT NAME='localestoque' SIZE='1' class='form-control'>
<OPTION VALUE='' SELECTED> Escolha ";
                                            $sqlt = "SELECT * FROM local_estoque ORDER BY nome_local_estoque";
                                            $resultadot = mysqli_query($conn, $sqlt);
                                            while ($linhat = mysqli_fetch_array($resultadot)) {
                                                echo "<OPTION VALUE='" . $linhat['id_local_estoque '] . "' ";
                                                if ($linha['produto_local_estoque'] == $linhat['id_local_estoque']) {
                                                    echo "SELECTED";
                                                }
                                                echo ">" . $linhat['nome_local_estoque'];
                                            }
                                            echo "</select>";
                                            ?>



                                        </div>

                                    </div>

                                    <div class="col-lg-6">
                                        <div>
                                            <label class="form-label mb-0">Estoque Mínimo</label>
                                            <input name="estoqueminimo" type="text" class="form-control" id="fantasia" value="<?php echo $linha['produto_estoque_minimo'] ?>">
                                        </div>

                                    </div>



                                    <div class="col-lg-6">
                                        <div>
                                            <label class="form-label mb-0">Valor venda</label>
                                            <input name="venda" type="text" class="form-control money" id="fantasia" value="<?php echo $linha['produto_valor_venda'] ?>">
                                        </div>

                                    </div>

                                    <div class="col-lg-6">
                                        <div>
                                            <label class="form-label mb-0">Valor Compra</label>
                                            <input name="compra" type="text" class="form-control money" id="fantasia" value="<?php echo $linha['produto_valor_compra'] ?>">
                                        </div>



                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Fim de Observações -->

        <button class="btn btn-primary"> Salvar </button>
        <input type="hidden" name="id" id="id" value="<?php echo $id ?>"> <input type="hidden" name="pagina" id="id" value="<?php echo $id2 ?>">

</form>

</div>
</div>
</div>
</div>
</div>


<div id="ok"> </div>


<!-- JAVASCRIPT -->
<script type="text/javascript">
    $(document).ready(function() {
        $('input').keypress(function(e) {
            var code = null;
            code = (e.keyCode ? e.keyCode : e.which);
            return (code == 13) ? false : true;
        });
    });

    $(document).ready(function() {

        function limpa_formulário_cep() {
            // Limpa valores do formulário de cep.
            $("#rua").val("");
            $("#bairro").val("");
            $("#cidade").val("");
            $("#uf").val("");
            $("#ibge").val("");
        }

        //Quando o campo cep perde o foco.
        $("#cep").blur(function() {

            //Nova variável "cep" somente com dígitos.
            var cep = $(this).val().replace(/\D/g, '');

            //Verifica se campo cep possui valor informado.
            if (cep != "") {

                //Expressão regular para validar o CEP.
                var validacep = /^[0-9]{8}$/;

                //Valida o formato do CEP.
                if (validacep.test(cep)) {

                    //Preenche os campos com "..." enquanto consulta webservice.
                    $("#rua").val("...");
                    $("#bairro").val("...");
                    $("#cidade").val("...");
                    $("#uf").val("...");
                    $("#ibge").val("...");

                    //Consulta o webservice viacep.com.br/
                    $.getJSON("//viacep.com.br/ws/" + cep + "/json/?callback=?", function(dados) {

                        if (!("erro" in dados)) {
                            //Atualiza os campos com os valores da consulta.
                            $("#rua").val(dados.logradouro);
                            $("#bairro").val(dados.bairro);
                            $("#cidade").val(dados.localidade);
                            $("#uf").val(dados.uf);
                            $("#ibge").val(dados.ibge);
                        } //end if.
                        else {
                            //CEP pesquisado não foi encontrado.
                            limpa_formulário_cep();
                            alert("CEP não encontrado.");
                        }
                    });
                } //end if.
                else {
                    //cep é inválido.
                    limpa_formulário_cep();
                    alert("Formato de CEP inválido.");
                }
            } //end if.
            else {
                //cep sem valor, limpa formulário.
                limpa_formulário_cep();
            }
        });
    });
</script>