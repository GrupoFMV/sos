<?php // CODIGO DA SESSION
@session_start();
if (!empty($_SESSION['user_id'])) {
} else {
    $_SESSION['msg'] = "Área restrita";
    header("Location: ../../login.php");
}

// PEGANDO DADOS DO CLIENTE
$sql = "SELECT * FROM modelos WHERE modelo_id ='$id' ";
$resultado = mysqli_query($conn, $sql);
$linha=mysqli_fetch_array($resultado);
?>
<!-- Sweet Alert css-->
<link href="assets/libs/sweetalert2/sweetalert2.min.css" rel="stylesheet" type="text/css" />

<!-- INICIO DADOS INICIAIS -->

<form method="post" action="alterar_modelo" id="formeditar">

    <div id="dvConteudo2" style="display: block">


        <div class="row">



            <!-- INICIO DADOS PESSOAIS -->
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">

                        <div class="row">
                            <h4>Modelos</h4>

                            <input name="modelo" type="hidden" class="form-control" id="clientes"
                                value="<?php echo $linha['modelo_marca'] ?>">

                            <div class="row gy-3">


                                <div class="col-lg-12">
                                    <div>
                                        <label class="form-label mb-0">Nome:</label>
                                        <input name="nome" type="text" class="form-control" id="nome"
                                            value="<?php echo $linha['modelo_nome'] ?>">
                                    </div>
                                </div>

                                <?php $retem = $linha['modelo_oleo']; ?>


                                <div class="col-lg-6">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <P>Troca de Oleo:</P>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="oleo" id="oleo1"
                                                    value="SIM" <?php echo ($retem == 'SIM') ?  "checked" : "" ;  ?>>
                                                <label class="form-check-label" for="exampleRadios1">
                                                    SIM
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="oleo" id="oleo2"
                                                    value="NAO" <?php echo ($retem == 'NAO') ?  "checked" : "" ;  ?>>
                                                <label class="form-check-label" for="exampleRadios1">
                                                    NÂO
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <?php $retem = $linha['modelo_bateria']; ?>

                                <div class="col-lg-6">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <P>Troca de Bateria</P>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="bateria"
                                                    id="bateria1" value="SIM"
                                                    <?php echo ($retem == 'SIM') ?  "checked" : "" ;  ?>>
                                                <label class="form-check-label" for="exampleRadios1">
                                                    SIM
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="bateria"
                                                    id="bateria2" value="NAO"
                                                    <?php echo ($retem == 'NAO') ?  "checked" : "" ;  ?>>
                                                <label class="form-check-label" for="exampleRadios1">
                                                    NÂO
                                                </label>
                                            </div>
                                        </div>
                                    </div>



                                </div>

                                <!-- FIM DADOS PESSOAIS -->


                                <button class="btn btn-primary"> Editar </button>

                                <input type="hidden" name="id" value="<?php echo $linha['modelo_id'] ?>">

</form>

</div>
</div>
</div>
</div>
</div>


<div id="ok"> </div>

</div>
</div>
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


/			
</script>