<?php // CODIGO DA SESSION
if (!empty($_SESSION['user_id'])) {
} else {
    $_SESSION['msg'] = "Área restrita";
    header("Location: ../../login.php");
}


?>


<script src="//code.jquery.com/jquery-1.11.0.min.js"></script>
<style>
    video {
        border: 1px solid #ccc;
        display: block;
        margin: 0 0 20px 0;
    }

    #canvas {
        margin-top: 20px;
        border: 1px solid #ccc;
        display: block;
    }
</style>
<style>
    area {
        margin: 10px auto;
        box-shadow: 0 10px 100px #ccc;
        padding: 20px;
        box-sizing: border-box;
        max-width: 500px;
    }

    .area video {
        width: 100%;
        height: auto;
        background-color: whitesmoke;
    }

    .area textarea {
        width: 100%;
        margin-top: 10px;
        height: 80px;
        box-sizing: border-box;
    }


    .area img {
        max-width: 100%;
        height: auto;
    }

    .area .caminho-imagem {
        padding: 5px 10px;
        border-radius: 3px;
        background-color: #068c84;
        text-align: center;
    }

    .area .caminho-imagem a {
        color: white;
        text-decoration: none;
    }

    .area .caminho-imagem a:hover {
        color: yellow;
    }

    
</style>
<div id="ok"></div>







<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0">ORÇAMENTOS A REALIZAR</h4>

           

        </div>
    </div>
</div>
<!-- end row -->



<div class="row">
    <div class="col-lg-12">
        <div class="card">
            

            <div class="card-body">
                <div id="customerList">
                    <div class="row g-4 mb-3">
                        <div class="col-sm-auto">
                            <div>

                            </div>
                        </div>
                        <div class="col-sm">
                            <div class="d-flex justify-content-sm-end">
                                <form method="POST" id="form_busca" action="listar_unico">
                                <div class="search-box ms-2">
                                    <input type="text" class="form-control" id="busca" name="cliente" placeholder="Localizar clientes">
                                    <i class="ri-search-line search-icon"></i>
                                </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <div class="table-responsive table-card mt-3 mb-1">
                        <table class="table align-middle table-nowrap" id="customerTable">
                            <thead class="table-light">
                                <tr>
                                    <th scope="col" style="width: 50px;">
                                        #
                                    </th>

                                    <th class="sort" data-sort="customer_name">Data</th>
                                    <th class="sort" data-sort="customer_name">Cliente</th>
                                    <th class="sort" data-sort="email">Técnico</th>
                                    <th class="sort" data-sort="date">Status</th>
                                    <th class="sort" data-sort="status">Ações</th>

                                </tr>
                            </thead>
                            <tbody class="list form-check-all">

                                <?php
$sqlos = "SELECT * FROM os s inner join clientes c on s.os_cliente = c.cliente_id 
inner join chamados ch on ch.chamado_os = s.os_id
inner join users us on ch.chamado_usuario = us.user_id

where ch.chamado_status = '6' ";
$resultadoos = mysqli_query($conn, $sqlos);
while ($linhaos = mysqli_fetch_array($resultadoos)) {
                                    ?>
                                    <tr>
                                        <th scope="row"><?php echo $linhaos[os_id] ?></th>
                                        <th scope="row"><?php echo date('d/m/Y H:i:s', strtotime($linhaos[chamado_data_referencia])); ?> </th>


                                        <td><?php echo $linhaos[cliente_fantasia] ?></td>
                                        <td><?php echo $linhaos[user_nome] ?></td>
                                        <td><i class="ri-checkbox-circle-line fs-17 align-middle"></i> Aguardando orçamento</td>
                                        <td class="status">
                                            <span class="badge badge-soft-success text-uppercase"> 
                                            <a href="orcamento_solicitado/<?php echo $linhaos[os_id] ?>" class="link-success fs-15"><i class="ri-information-line"></i></a>

</td>                                           
                                    </tr>


                                    <!--  modal deletar -->
                                    <div class="modal fade" id="firstmodal<?php echo $linha[0] ?>" aria-hidden="true" tabindex="-1">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-body text-center p-5">
                                                    <lord-icon src="https://cdn.lordicon.com/tdrtiskw.json" trigger="loop" colors="primary:#f7b84b,secondary:#405189" style="width:130px;height:130px">
                                                    </lord-icon>
                                                    <div class="mt-4 pt-4">
                                                        <h4>Atenção!!</h4>
                                                        <p class="text-muted"> Deseja mesmo deletar este cliente?</p>
                                                        <!-- Toogle to second dialog -->

                                                        <button class="btn btn-danger" data-bs-dismiss="modal" data-bs-toggle="modal" data-bs-dismiss="modal">
                                                            Não
                                                        </button>
                                                        <button class="btn btn-warning" data-bs-target="#secondmodal" data-bs-toggle="modal" data-bs-dismiss="modal">
                                                            Sim
                                                        </button>

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


                                                    <lord-icon src="https://cdn.lordicon.com/gsqxdxog.json" trigger="loop" style="width:120px;height:120px" colors="primary:#405189,secondary:#0ab39c">
                                                    </lord-icon>


                                                    <div class="mt-4 pt-3">
                                                        <h4 class="mb-3">Atenção!</h4>
                                                        <p class="text-muted mb-4">Essa opção é irreversível</p>
                                                        <div class="hstack gap-2 justify-content-center">
                                                            <!-- Toogle to first dialog, `data-bs-dismiss` attribute can be omitted - clicking on link will close dialog anyway -->


                                                            <form action="deletar_cliente" method="post" id="sa-departamento">


                                                                <script>
                                                                    function sendForm() {
                                                                        $("#sa-departamento").click();
                                                                    }
                                                                </script> <input type="submit" class="btn btn-danger" value="Estou ciente quero Deletar"> <input type="hidden" value="<?php echo $linha[1] ?>" name="id">

                                                            </form>


                                                            <button type="button" class="btn btn-warning" data-bs-dismiss="modal">Não quero Deletar</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                    </div>

                </div>

                


               












                    <?php } ?>






                    </tbody>
                    </table>
                    <div class="noresult" style="display: none">
                        <div class="text-center">
                            <lord-icon src="https://cdn.lordicon.com/msoeawqm.json" trigger="loop" colors="primary:#121331,secondary:#08a88a" style="width:75px;height:75px">
                            </lord-icon>
                            <h5 class="mt-2">Desculpe! Nenhum resultado encontrado</h5>

                        </div>
                    </div>
                    </div>

                    <div class="d-flex justify-content-end">
                        <a href="listar_clientes/<?php echo($counter - 1) ?>" class="page-link"><i class="ri-arrow-left-line"></i></a>
                        <a href="listar_clientes/<?php echo($counter + 1) ?>" class="page-link"><i class="ri-arrow-right-line"></i></a>
                    </div>
                </div>
            </div><!-- end card -->
        </div>
        <!-- end col -->
    </div>
    <!-- end col -->
</div>
<!-- end row -->






<div class="row">
    <div class="col-lg-12">
        <script>
            /// DELETAR CLIENTE

            $(document).ready(function() {

                $("#deletar").submit(function() {



                    var dados = jQuery(this).serialize();

                    $.ajax({
                        url: 'pages/del/clientes.php',
                        cache: false,
                        data: dados,
                        type: "POST",
                        

                        success: function(msg) {

                            $("#ok").empty();
                            $("#ok").append(msg);






                        }

                    });

                    return false;
                });

            });

            // LOCALIZAR CLIENTE

            $(document).ready(function() {
                form  = $("#form_busca")
                $("#busca").blur(function (){
                    form.submit();
                })
                
            })
        </script>


        <script src="assets/libs/list.js/list.min.js"></script>
        <script src="assets/libs/list.pagination.js/list.pagination.min.js"></script>

        <!-- listjs init -->
        <script src="assets/js/pages/listjs.init.js"></script>

        <!-- App js -->
        <script src="assets/js/app.js"></script>
        