<?php // CODIGO DA SESSION
session_start();
if (!empty($_SESSION['user_id'])) {
} else {
    $_SESSION['msg'] = "Área restrita";
    header("Location: ../../login.php");
}

$sql = "SELECT * FROM marcas WHERE marca_id ='$id'  ";
$resultado = mysqli_query($conn, $sql);
$linha=mysqli_fetch_array($resultado);
?>
<!-- Sweet Alert css-->
<link href="assets/libs/sweetalert2/sweetalert2.min.css" rel="stylesheet" type="text/css" />
<style type="text/css">
#canvas {
    margin-top: 20px;
    border: 1px solid #ccc;
    display: block;
}
</style>

<!-- INICIO DADOS INICIAIS -->



<div id="dvConteudo2" style="display: block">


    <div class="row">




        <!-- INICIO DADOS Modelos -->

        <div class="col-md-6">
            <h4 style="color: #000">Adicionar modelos a marca - <?php echo $linha['marca_nome'] ?></h4>
        </div>

        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">

                    <div class="row">
                        <div class="col-md-6">
                            <h4>Modelos</h4>
                        </div>
                        <div class="col-md-6 d-flex flex-row-reverse">
                            <button class="btn btn-danger " id="deleteRow">Deletar</button>
                            <button class="btn btn-success mx-3" id="addRow">Adicionar</button>

                        </div>
                        <form method="post" action="inserir_modelo2" id="formcadastro2a">
                            <div>
                                <label class="form-label mb-0"></label>
                                <input name="modelo[]" type="hidden" class="form-control" id="clientes"
                                    value="<?php echo $id ?>">
                            </div>
                            <div id="dataAdd">
                                <div class="add">

                                    <div class="row my-4 linha">
                                        <div class="col-lg-12">

                                            <label class="form-label mb-0">Nome:</label>
                                            <input name="nome[]" required="required" type="text" class="form-control"
                                                id="nome">

                                            <!--Type Radio Troca de Oleo-->

                                            <div class="row gy-4">
                                                <div class="col-lg-6">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <P>Troca de Oleo:</P>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="radio"
                                                                    name="oleo[]" id="oleo1" value="SIM" checked>
                                                                <label class="form-check-label" for="exampleRadios1">
                                                                    SIM
                                                                </label>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="radio"
                                                                    name="oleo[]" id="oleo2" value="NAO" checked>
                                                                <label class="form-check-label" for="exampleRadios1">
                                                                    NÂO
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>


                                                <!--Type Radio Troca de Bateria-->

                                                <div class="col-lg-6">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <P>Troca de Bateria</P>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="radio"
                                                                    name="bateria[]" id="bateria1" value="SIM" checked>
                                                                <label class="form-check-label" for="exampleRadios1">
                                                                    SIM
                                                                </label>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="radio"
                                                                    name="bateria[]" id="bateria2" value="NAO" checked>
                                                                <label class="form-check-label" for="exampleRadios1">
                                                                    NÂO
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>



                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                </div>


                            </div>
                            <button class="btn btn-primary"> Cadastrar </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- FIM DADOS contrato -->

        <div id="ok">



            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">

                        <div class="row">
                            <div class="col-md-12">
                                <h4>Modelos Cadastros</h4>
                                <table class="table align-middle table-nowrap" id="customerTable">
                                    <thead class="table-light">
                                        <tr>
                                            <th scope="col" style="width: 50px;"> ID </th>
                                            <th class="sort" data-sort="customer_name">Marca</th>
                                            <th class="sort" data-sort="customer_name">Troca de Oleo</th>
                                            <th class="sort" data-sort="customer_name">Troca de Bateria</th>
                                            <th class="sort" data-sort="customer_name">Ações</th>
                                        </tr>
                                    </thead>
                                    <tbody class="list form-check-all">
                                        <?php
                                $sql = "SELECT * FROM modelos where modelo_marca = $id ORDER BY modelo_nome ";
                                // Executando $sql e verificando se tudo ocorreu certo.
                                $resultado = mysqli_query($conn, $sql);
                                //Realizando um loop para exibi&ccedil;&atilde;o de todos os dados 
                                while ($linha = mysqli_fetch_array($resultado)) {
                                ?>
                                        <tr>
                                            <th scope="row"> <?php echo $linha['modelo_id'] ?> </th>
                                            <td class="customer_name"><?php echo $linha['modelo_nome'] ?></td>
                                            <td class="customer_name"><?php echo $linha['modelo_oleo'] ?></td>
                                            <td class="customer_name"><?php echo $linha['modelo_bateria'] ?>
                                            </td>
                                            <td class="status"><span class="badge badge-soft-success text-uppercase"> <a
                                                        href="#" class="link-secundary fs-15"></a> <a
                                                        href="editar_modelo/<?php echo $linha['modelo_id'] ?>"
                                                        class="link-success fs-15"><i class="ri-edit-2-line"></i></a> <a
                                                        href="javascript:void(0);" data-bs-toggle="modal"
                                                        data-bs-target="#firstmodal<?php echo $linha['modelo_id'] ?>"
                                                        class="link-danger fs-15"><i
                                                            class="ri-delete-bin-line"></i></a></span></td>
                                        </tr>
                                        <!--  modal deletar -->
                                        <div class="modal fade" id="firstmodal<?php echo $linha['modelo_id'] ?>"
                                            aria-hidden="true" tabindex="-1">
                                            <div class="modal-dialog modal-dialog-centered">
                                                <div class="modal-content">
                                                    <div class="modal-body text-center p-5">
                                                        <lord-icon src="https://cdn.lordicon.com/tdrtiskw.json"
                                                            trigger="loop" colors="primary:#f7b84b,secondary:#405189"
                                                            style="width:130px;height:130px"> </lord-icon>
                                                        <div class="mt-4 pt-4">
                                                            <h4>Atenção!!</h4>
                                                            <p class="text-muted"> Deseja mesmo deletar esta
                                                                marca?
                                                            </p>
                                                            <!-- Toogle to second dialog -->
                                                            <button class="btn btn-danger" data-bs-dismiss="modal"
                                                                data-bs-toggle="modal" data-bs-dismiss="modal">

                                                                Não
                                                            </button>

                                                            <button class="btn btn-warning"
                                                                data-bs-target="#secondmodal" data-bs-toggle="modal"
                                                                data-bs-dismiss="modal">
                                                                Sim </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Second modal deletar -->
                                        <div class="modal fade" id="secondmodal" aria-hidden="true" tabindex="-1">
                                            <div class="modal-dialog modal-dialog-centered">
                                                <div class="modal-content">
                                                    <div class="modal-body text-center p-5">
                                                        <lord-icon src="https://cdn.lordicon.com/gsqxdxog.json"
                                                            trigger="loop" style="width:120px;height:120px"
                                                            colors="primary:#405189,secondary:#0ab39c">
                                                        </lord-icon>
                                                        <div class="mt-4 pt-3">
                                                            <h4 class="mb-3">Atenção!</h4>
                                                            <p class="text-muted mb-4">Essa opção é irreversível
                                                            </p>
                                                            <div class="hstack gap-2 justify-content-center">
                                                                <!-- Toogle to first dialog, `data-bs-dismiss` attribute can be omitted - clicking on link will close dialog anyway -->
                                                                <form
                                                                    action="deletar_modelos/<?php echo $linha['modelo_id'] ?>"
                                                                    method="post" id="sa-departamento">
                                                                    <script>
                                                                    function sendForm() {
                                                                        $("#sa-departamento").click();
                                                                    }
                                                                    </script>
                                                                    <input type="submit" class="btn btn-danger"
                                                                        value="Estou ciente quero Deletar">
                                                                    <input type="hidden"
                                                                        value="<?php echo $linha['modelo_id'] ?>"
                                                                        name="id">
                                                                </form>
                                                                <button type="button" class="btn btn-warning"
                                                                    data-bs-dismiss="modal">Não quero
                                                                    Deletar</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                            </div>

                        </div>

                        <script>
                        function $(id) {
                            return document.getElementById(id);
                        }
                        window.click = function() {
                            window.open = "http://www.google.com.br";
                        }
                        </script>
                        <!-- /.INICIO MODAL FOTO OPÇÃO -->
                        <div class="modal fade bs-example-modal-center<?php echo $linha['modelo_id'] ?>" tabindex="-1"
                            role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered<?php echo $linha['modelo_id'] ?>">
                                <div class="modal-content">
                                    <div class="modal-body text-center p-5">
                                        <lord-icon src="https://cdn.lordicon.com/dklbhvrt.json" trigger="loop"
                                            style="width:150px;height:150px" colors="primary:#121331,secondary:#08a88a">
                                        </lord-icon>
                                        <div class="mt-4">
                                            <h4 class="mb-3">Adicionar Foto!</h4>
                                            <p class="text-muted mb-4"> Escolha uma opção abaixo</p>
                                            <div class="hstack gap-2 justify-content-center">
                                                <button type="button" class="btn btn-light"
                                                    data-bs-dismiss="modal">Fechar</button>
                                                <a href="javascript:void(0);" class="btn btn-danger"
                                                    data-bs-toggle="modal"
                                                    data-bs-target=".bs-example-modal-center_foto<?php echo $linha['modelo_id'] ?>">Tirar
                                                    Foto</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            c
                        </div>
                        <!-- /.modal -->
                        <!-- /.INICIO MODAL TIRAR FOTO -->
                        <div class="modal fade bs-example-modal-center_foto<?php echo $linha['modelo_id'] ?>"
                            tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">

                            <div class="modal-dialog modal-dialog-centered<?php echo $linha['modelo_id'] ?>">

                                <div class="modal-content">
                                    <div class="modal-body text-center p-5">
                                        <div class="mt-4">
                                            <div class="area">
                                                <div>
                                                    <video id="video" autoplay></video>
                                                    <button id="snap" class="btn btn-success">Tirar
                                                        Foto</button>
                                                    <div class="text-center">
                                                        <canvas id="canvas" class="text-center" width="320"
                                                            height="240"></canvas>
                                                    </div>
                                                    <br>
                                                    <script>
                                                    // Grab elements, create settings, etc.
                                                    var video = document.getElementById('video');

                                                    // Get access to the camera!
                                                    if (navigator.mediaDevices && navigator.mediaDevices
                                                        .getUserMedia) {
                                                        // Not adding `{ audio: true }` since we only want video now
                                                        navigator.mediaDevices.getUserMedia({
                                                            video: true
                                                        }).then(function(stream) {
                                                            //video.src = window.URL.createObjectURL(stream);
                                                            video.srcObject = stream;
                                                            video.play();
                                                        });
                                                    }

                                                    // Elements for taking the snapshot
                                                    var canvas = document.getElementById('canvas');
                                                    var context = canvas.getContext('2d');
                                                    var video = document.getElementById('video');

                                                    // Trigger photo take
                                                    document.getElementById("snap").addEventListener("click",
                                                        function() {
                                                            context.drawImage(video, 0, 0, 320, 240);
                                                        });
                                                    </script>
                                                    <div class="hstack gap-2 justify-content-center">
                                                        <button type="button" class="btn btn-light"
                                                            data-bs-dismiss="modal">Fechar</button>
                                                        <a href="javascript:void(0);" class="btn btn-info">Salvar
                                                            Foto</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.modal -->
                                <!-- /.INICIO MODAL FOTO -->
                                <div class="modal fade bs-example-modal-center-deletar<?php echo $linha['modelo_id'] ?>"
                                    tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered<?php echo $linha['modelo_id'] ?>">
                                        <div class="modal-content">
                                            <div class="modal-body text-center p-5">
                                                <lord-icon src="https://cdn.lordicon.com/dklbhvrt.json" trigger="loop"
                                                    style="width:150px;height:150px"
                                                    colors="primary:#121331,secondary:#08a88a"> </lord-icon>
                                                <div class="mt-4">
                                                    <h4 class="mb-3">Adicionar Foto!</h4>
                                                    <p class="text-muted mb-4"> Escolha uma opção abaixo</p>
                                                    <div class="hstack gap-2 justify-content-center">
                                                        <button type="button" class="btn btn-light"
                                                            data-bs-dismiss="modal">Close</button>
                                                        <a href="javascript:void(0);" class="btn btn-danger"
                                                            data-bs-toggle="modal"
                                                            data-bs-target=".bs-example-modal-center_foto<?php echo $linha['cliente_celular'] ?>">Tirar
                                                            Foto</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    c
                                </div>
                                <!-- /.modal -->
                                <?php } ?>
                                </tbody>

                                </table>



                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <script src="https://code.jquery.com/jquery-3.6.0.min.js"
                integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous">
            </script>
            <script type="text/javascript">
            $(document).ready(function() {

                $("#addRow").click(function() {

                    var len = $('#dataAdd .add .linha').length + 1;

                    //if(len>1)

                    $("#dataAdd .add:last").append(
                        '<div class="row my-4 linha">' +
                        '<div class="col-lg-12">' +

                        '<label class="form-label mb-0">Nome:</label>' +
                        '<input name="nome[]" required="required" type="text" class="form-control" id="nome' +
                        len + '"  >' +
                        '<input name="modelo[]" type="hidden" class="form-control" value= "<?php echo $id ?>" id="nome' +
                        len + '"  >' +

                        // Type Radio Troca de Oleo

                        '<div class="row gy-4">' +
                        '<div class="col-lg-6">' +
                        '<div class="row">' +
                        '<div class="col-md-12">' +
                        '<P>Troca de Oleo:</P>' +
                        '</div>' +
                        '<div class="col-md-3">' +
                        '<div class="form-check">' +
                        '<input class="form-check-input" type="radio" name="oleo[]' +
                        len + '" id="oleo' +
                        len + '" value="SIM" checked>' +
                        '<label class="form-check-label" for="exampleRadios1">' +
                        'SIM' +
                        '</label>' +
                        '</div>' +
                        '</div>' +
                        '<div class="col-md-3">' +
                        '<div class="form-check">' +
                        '<input class="form-check-input" type="radio" name="oleo[]' +
                        len + '" id="oleo' +
                        len + '" value="NAO" checked>' +
                        '<label class="form-check-label" for="exampleRadios1">' +
                        'NÂO' +
                        '</label>' +
                        '</div>' +
                        '</div>' +
                        '</div>' +
                        '</div>' +


                        // Type Radio Troca de Bateria

                        '<div class="col-lg-6">' +
                        '<div class="row">' +
                        '<div class="col-md-12">' +
                        '<P>Troca de Bateria</P>' +
                        '</div>' +
                        '<div class="col-md-3">' +
                        '<div class="form-check">' +
                        '<input class="form-check-input" type="radio" name="bateria[]' +
                        len + '" id="bateria' +
                        len + '" value="SIM" checked>' +
                        '<label class="form-check-label" for="exampleRadios1">' +
                        'SIM' +
                        '</label>' +
                        '</div>' +
                        '</div>' +
                        '<div class="col-md-3">' +
                        '<div class="form-check">' +
                        '<input class="form-check-input" type="radio" name="bateria[]' +
                        len + '" id="bateria' +
                        len + '" value="NAO" checked>' +
                        '<label class="form-check-label" for="exampleRadios1">' +
                        'NÂO' +
                        '</label>' +
                        '</div>' +
                        '</div>' +
                        '</div>' +




                        '</div>' +
                        '</div>' +
                        '</div>' +
                        '</div></div>');

                });
            });
            // '<input name="porta[' + len + ']" type="radio"  id="radio' + len + '" value="eixovertical"><label for="porta' + len + '">Eixo Vertical </label>' +
            // '<input name="porta[' + len + ']" type="radio"  id="radio' + len + '" value="automatica"><label for="porta' + len + '">Automatica </label>' +

            $("#deleteRow").click(function() {
                var len = $('#dataAdd .add .linha').length;
                if (len > 1) {
                    $("#dataAdd .add .linha").last().remove();
                } else {
                    alert('Not able to Delete');
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
                            $.getJSON("//viacep.com.br/ws/" + cep + "/json/?callback=?",
                                function(
                                    dados) {

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
                            document.getElementById("dvConteudo2").style.display =
                                "none";





                        }

                    });

                    return false;
                });

            });
            </script>