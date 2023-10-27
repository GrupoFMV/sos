<?php // CODIGO DA SESSION
session_start();
if (!empty($_SESSION['user_id'])) {
} else {
    $_SESSION['msg'] = "Área restrita";
    header("Location: ../../login.php");
}
$sql = "SELECT * FROM anotacoes_clientes WHERE anotacoes_clientes_id ='$id' ";
$resultado = mysqli_query($conn, $sql);
$linha=mysqli_fetch_array($resultado);
?>
<!-- Sweet Alert css-->
<link href="assets/libs/sweetalert2/sweetalert2.min.css" rel="stylesheet" type="text/css" />


<!-- INICIO DADOS INICIAIS -->

<div id="dvConteudo2" style="display: block">
    <div class="row">
        <!-- INICIO DADOS contrato -->
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">

                    <div class="row">
                        <div class="col-md-6">
                            <h4>Anotações</h4>
                        </div>
                        <div class="col-md-6 d-flex flex-row-reverse">
                            <button class="btn btn-danger " id="deleteRow">Deletar</button>
                            <button class="btn btn-success mx-3" id="addRow">Adicionar</button>
                        </div>
                 

                    <form method="post" action="inseriranotacoes2">
                    <div class="row my-4">

                
                    <div class="row">
                        <div class="col-lg-12">
                            <h6>Informe o Equipamento:</6><br>
                            <?php // listando em um box os instrutores

echo "<SELECT NAME='equipamentos[]' SIZE='1' class='form-control' required>

<OPTION VALUE='' SELECTED> Informe o Equipamento ";
// Selecionando os dados da tabela em ordem decrescente
$sql = "SELECT * FROM equipamentos where equipamento_id_cliente = $id  ORDER BY equipamento_nome";
// Executando $sql e verificando se tudo ocorreu certo.
$resultado = mysqli_query($conn, $sql);
//Realizando um loop para exibi&ccedil;&atilde;o de todos os dados 
while ($linha=mysqli_fetch_array($resultado)) {
echo "<OPTION VALUE='".$linha['equipamento_id']."'>".($linha['equipamento_nome']);
}
echo "</SELECT>";

?>
                        </div>
                    </div>

                    <!-- Add block -->
                    <div id="dataAdd">
                        <div class="add">
                            <div class="rowblock">
                                <div class="row">
                                    <div class="col-lg-12 gy-3">
                                   
                                        <h6>ART(ANOTAÇÂO DE RESPONSABILIDADE TÉCNICA)</h6>

                                    </div>

                                    <div class="col-md-6">
                                        <label class="form-label mb-0">Data:</label>
                                        <input name="data[]" type="date" class="form-control" id="data" >
                                    </div>
                                </div>


                                <div class="row">
                                    <div class="col-lg-12 gy-3">
                                        <h6>TROCA DE ÓLEO</h6>
                                    </div>

                                    <div class="col-lg-6">
                                        <label class="form-label mb-0">Data:</label>
                                        <input name="data_troca[]" type="date" class="form-control" id="data_troca">
                                    </div>

                                    <div class="col-lg-6">
                                        <label class="form-label mb-0">Tempo de Troca:</label>
                                        <select name="troca_mes[]" class="form-control" id="troca_mes">
                                            <option value="nao">NÂO TEM</option>
                                            <option value="12">12 MESES</option>
                                            <option value="24">24 MESES</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="row ">
                                    <div class="col-lg-12 gy-3">
                                        <h6>TROCA DE BATERIA</h6>
                                    </div>

                                    <div class="col-lg-6">
                                        <label class="form-label mb-0">Data:</label>
                                        <input name="data_bateria[]" type="date" class="form-control" id="data_bateria">
                                    </div>

                                    <div class="col-lg-6">
                                        <label class="form-label mb-0">Modelo da Bateria:</label>
                                        <select name="bateria[]" class="form-control" id="bateria">
                                            <option value="nao">NÂO TEM</option>
                                            <option value="12V 7A">12V 7A</option>
                                            <option value="12V 12A">12V 12A</option>
                                        </select>
                                    </div>

                                </div>
                                <hr>
                            </div><input name="clientes" type="hidden" class="form-control" id="clientes" value="<?php echo $id ?>">

                        </div>

                    </div>


                    <!-- FIM DADOS contrato -->

                    <button class="btn btn-primary"> Cadastrar </button>

                    </form>

                </div>
            </div>
        </div>
    </div>
</div>


<div id="ok"></div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script type="text/javascript">
    $(document).ready(function() {

        $("#addRow").click(function() {

            var len = $('#dataAdd .add .rowblock').length + 1;

            //if(len>1)


            $("#dataAdd .add:last").append('<div class="rowblock"><div class="row">' +
                
                '<div class="col-lg-12">' +

                '<h6>Informe o Equipamento:</6><br>' +

               '<?php echo "<SELECT NAME=equipamentos[] SIZE=1 class=form-control required>" ?>' +
               
               '<OPTION VALUE= SELECTED> Informe o Equipamento' +
              '<?php $sql = "SELECT * FROM equipamentos where equipamento_id_cliente = $id  ORDER BY equipamento_id"; ?>' +
               
               '<?php $resultado = mysqli_query($conn, $sql); while ($linha=mysqli_fetch_array($resultado)) { echo "<OPTION VALUE=".$linha[equipamento_id].">".($linha[equipamento_nome]); } ?>' +
               
               '<?php echo "</SELECT>"; ?>' +

                '</div>' +
                
                
                
                
                
                
                '<div class="col-lg-12 gy-3">' +

                '<h6>ART(ANOTAÇÂO DE RESPONSABILIDADE TÉCNICA)</h6>' +

                '</div>' +



                '<div class="col-md-6">' +
                '<label class="form-label mb-0">Data:</label>' +
                '<input name="data[]" type="date" class="form-control" id="data_anotacoes' + len + '" value="">' +
                '</div>' +
                '</div>' +


                '<div class="row">' +
                '<div class="col-lg-12 gy-3">' +
                '<h6>TROCA DE ÓLEO</h6>' +
                '</div>' +

                '<div class="col-lg-6">' +
                '<label class="form-label mb-0">Data:</label>' +
                '<input name="data_troca[]" type="date" class="form-control" id="data_troca' + len + '">' +
                '</div>' +

                '<div class="col-lg-6">' +
                '<label class="form-label mb-0">Tempo de Troca:</label>' +
                '<select name="troca_mes[]" class="form-control" id="troca_mes' + len + '">' +
                '<option value="nao">NÂO TEM</option>' +
                '<option value="12">12 MESES</option>' +
                '<option value="24">24 MESES</option>' +
                '</select>' +
                '</div>' +
                '</div>' +

                '<div class="row ">' +
                '<div class="col-lg-12 gy-3">' +
                '<h6>TROCA DE BATERIA</h6>' +
                '</div>' +

                '<div class="col-lg-6">' +
                '<label class="form-label mb-0">Data:</label>' +
                '<input name="data_bateria[]" type="date" class="form-control" id="data_bateria' + len + '">' +
                '</div>' +

                '<div class="col-lg-6">' +
                '<label class="form-label mb-0">Modelo da Bateria:</label>' +
                '<select name="bateria[]" class="form-control" id="bateria' + len + '">' +
                '<option value="nao">NÂO TEM</option>' +
                '<option value="12V 7A">12V 7A</option>' +
                '<option value="12V 12A">12V 12A</option>' +
                '</select>' +
                '</div>' +

                '</div><hr></div>');

        });
    });
    // '<input name="porta[' + len + ']" type="radio"  id="radio' + len + '" value="eixovertical"><label for="porta' + len + '">Eixo Vertical </label>' +
    // '<input name="porta[' + len + ']" type="radio"  id="radio' + len + '" value="automatica"><label for="porta' + len + '">Automatica </label>' +

    $("#deleteRow").click(function() {
        var len = $('#dataAdd .add .rowblock').length;
        if (len > 1) {
            $("#dataAdd .add .rowblock").last().remove();
        } else {
            alert('Não é permitido, deletar mais.');
        }
    });
</script>



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


    /// EXIBIR FORMULARIO DE CADASTRO

    $(document).ready(function() {

        $("#formcadastro2").submit(function() {



            var dados = jQuery(this).serialize();

            $.ajax({
                url: 'pages/insert/estabelecimento.php',
                cache: false,
                data: dados,
                type: "POST",

                success: function(msg) {

                    $("#ok").empty();
                    $("#ok").append(msg);
                    document.getElementById("dvConteudo2").style.display = "none";

                }

            });

            return false;
        });

    });
</script>
<!-- <div class="col-lg-6">
    <div>
        <label class="form-label mb-0">Data:</label>
        <input name="data[]" type="date" class="form-control" id="data" value="">
    </div>
</div>

<div class="col-lg-12">
    <div>
        <label class="form-label mb-0">Observações:</label>
        <textarea name="observacoes[]" class="form-control" id="valor"></textarea> -->