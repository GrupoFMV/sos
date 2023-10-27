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
    .table-wrapper {
  max-height: 300px;
  overflow: auto;
  display:inline-block;
  width: 100%;
}
</style>
<div id="ok"></div>







<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0">Equipamentos</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Equipamentos</a></li>
                    <li class="breadcrumb-item active">Listar</li>
                </ol>
            </div>

        </div>
    </div>
</div>
<!-- end row -->



<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title mb-0">Listando Equipamentos</h4>
            </div><!-- end card header -->

            <div class="card-body">
                <div id="customerList">
                    <div class="row g-4 mb-3">
                        <div class="col-sm-auto">
                            <div>

                            </div>
                        </div>
                        <div class="col-sm">
                            <div class="d-flex justify-content-sm-end">
                                <div class="search-box ms-2">
                                    <input type="text" class="form-control search" placeholder="Localizar clientes">
                                    <i class="ri-search-line search-icon"></i>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="table-responsive table-card mt-3 mb-1 table-wrapper">
                        <table class="table align-middle table-nowrap" id="customerTable">
                            <thead class="table-light">
                                <tr> 
                                    <th scope="col" style="width: 50px;">
                                        ID
                                    </th>
                                    <th class="sort" data-sort="customer_name">Cliente</th>
                                    <th class="sort" data-sort="email">Nome</th>
                                    <th class="sort" data-sort="phone">Modelo</th>
                                    <th class="sort" data-sort="date">Paradas</th>
                                    <th class="sort" data-sort="status">Porta</th>
                                    <th class="sort" data-sort="status">Status</th>

                                </tr>
                            </thead>
                            <tbody class="list form-check-all">

                                <?php
                                $sql = "SELECT * FROM equipamentos e INNER JOIN clientes c ON e.equipamento_id_cliente = c.cliente_id  WHERE equipamento_lixeira = '1'" ;
                                // Executando $sql e verificando se tudo ocorreu certo.
                                $resultado = mysqli_query($conn, $sql);
                                //Realizando um loop para exibi&ccedil;&atilde;o de todos os dados 
                                while ($linha = mysqli_fetch_array($resultado)) {
                                ?>
                                    <tr>
                                        <th scope="row">
                                            <?php echo $linha['equipamento_id'] ?>
                                        </th>

                                        <td class="customer_name"><?php echo $linha['cliente_razao'] ?></td>
                                        <td class="email"><?php echo $linha['equipamento_nome'] ?></td>
                                        <td class="phone"><?php echo $linha['equipamento_modelo'] ?></td>
                                        <td class="phone"><?php echo $linha['equipamentos_paradas'] ?></td>
                                        <td class="phone"><?php echo $linha['equipamentos_porta'] ?></td>
                                        <td class="date"><i class="ri-checkbox-circle-line fs-17 align-middle"></i> Ativo</td>
                                        <td class="status">
                                            <span class="badge badge-soft-success text-uppercase"> 
                                           
                                            <a href="javascript:void(0);" data-bs-toggle="modal" data-bs-target=".bs-example-modal-center<?php echo $linha['equipamento_id'] ?>" class="link-info fs-15"><i class="ri-image-line"></i></a>
                                                <a href="editar_equipamentos/<?php echo $linha['equipamento_id'] ?>" class="link-success fs-15"><i class="ri-edit-2-line"></i></a>
                                                <a href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#firstmodal<?php echo $linha['equipamento_id'] ?>" class="link-danger fs-15"><i class="ri-delete-bin-line"></i></a></span></td>

                                    </tr>





                                    <!--  modal deletar -->
                                    <div class="modal fade" id="firstmodal<?php echo $linha['equipamento_id'] ?>" aria-hidden="true" tabindex="-1">
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


                                                            <form action="deletar_equipamento" method="post" id="sa-departamento">


                                                                <script>
                                                                    function sendForm() {
                                                                        $("#sa-departamento").click();
                                                                    }
                                                                </script> <input type="submit" class="btn btn-danger" value="Estou ciente quero Deletar"> <input type="hidden" value="<?php echo $linha['equipamento_id'] ?>" name="id">

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

                <script>
                    function $(id) {
                        return document.getElementById(id);
                    }
                    window.click = function() {
                        window.open = "http://www.google.com.br";
                    }
                </script>
                <!-- /.INICIO MODAL FOTO OPÇÃO -->

                <div class="modal fade bs-example-modal-center<?php echo $linha['equipamento_id'] ?>" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered<?php echo $linha['equipamento_id'] ?>">
                        <div class="modal-content">
                            <div class="modal-body text-center p-5">
                                <lord-icon src="https://cdn.lordicon.com/dklbhvrt.json" trigger="loop" style="width:150px;height:150px" colors="primary:#121331,secondary:#08a88a">
                                </lord-icon>

                                <div class="mt-4">
                                    <h4 class="mb-3">Adicionar Foto!</h4>
                                    <p class="text-muted mb-4"> Escolha uma opção abaixo</p>
                                    <div class="hstack gap-2 justify-content-center">
                                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Fechar</button>
                                        <a href="javascript:void(0);" class="btn btn-danger" data-bs-toggle="modal" data-bs-target=".bs-example-modal-center_foto<?php echo $linha['equipamento_id'] ?>">Tirar Foto</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>c
                </div><!-- /.modal -->


                <!-- /.INICIO MODAL TIRAR FOTO -->

                <div class="modal fade bs-example-modal-center_foto<?php echo $linha['equipamento_id'] ?>" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered<?php echo $linha['equipamento_id'] ?>">
                        <div class="modal-content">
                            <div class="modal-body text-center p-5">


                                <div class="mt-4">



                                    <div class="area">
                                        <div>
                                            <video id="video" autoplay></video>
                                            <button id="snap" class="btn btn-success">Tirar Foto</button>
                                            <div class="text-center"><canvas id="canvas" class="text-center" width="320" height="240"></canvas> </div> <br>
                                            <script>
                                                // Grab elements, create settings, etc.
                                                var video = document.getElementById('video');

                                                // Get access to the camera!
                                                if (navigator.mediaDevices && navigator.mediaDevices.getUserMedia) {
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
                                                document.getElementById("snap").addEventListener("click", function() {
                                                    context.drawImage(video, 0, 0, 320, 240);
                                                });
                                            </script>


                                            <div class="hstack gap-2 justify-content-center">
                                                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Fechar</button>
                                                <a href="javascript:void(0);" class="btn btn-info">Salvar Foto</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div><!-- /.modal -->



                        <!-- /.INICIO MODAL FOTO -->

                        <div class="modal fade bs-example-modal-center-deletar<?php echo $linha['equipamento_id'] ?>" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered<?php echo $linha['equipamento_id'] ?>">
                                <div class="modal-content">
                                    <div class="modal-body text-center p-5">
                                        <lord-icon src="https://cdn.lordicon.com/dklbhvrt.json" trigger="loop" style="width:150px;height:150px" colors="primary:#121331,secondary:#08a88a">
                                        </lord-icon>

                                        <div class="mt-4">
                                            <h4 class="mb-3">Adicionar Foto!</h4>
                                            <p class="text-muted mb-4"> Escolha uma opção abaixo</p>
                                            <div class="hstack gap-2 justify-content-center">
                                                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                                                <a href="javascript:void(0);" class="btn btn-danger" data-bs-toggle="modal" data-bs-target=".bs-example-modal-center_foto<?php echo $linha['cliente_celular'] ?>">Tirar Foto</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>c
                        </div><!-- /.modal -->










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
                        <div class="pagination-wrap hstack gap-2">

                            <ul class="pagination listjs-pagination mb-0"></ul>


                            </a>
                        </div>
                    </div>
                </div>
            </div><!-- end card -->
        </div>
        <!-- end col -->
    </div>
    <!-- end col -->
</div>
<!-- end row -->







<!-- ------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------->
<!-- MARCAS -->
<!-- start page title -->
<div class="row">
<div class="col-6">
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0">Marcas</h4>
        </div>
    </div>
</div>
<!-- end row -->

<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title mb-0">Listando Marcas</h4>
            </div><!-- end card header -->

            <div class="card-body">
                <div id="customerList">
                    <div class="row g-4 mb-3">
                        <div class="col-sm-auto">
                            <div>

                            </div>
                        </div>
                        <div class="col-sm">
                            <div class="d-flex justify-content-sm-end">
                                <div class="search-box ms-2">
                                    <input type="text" class="form-control search" placeholder="Localizar clientes">
                                    <i class="ri-search-line search-icon"></i>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="table-responsive table-card mt-3 mb-1 table-wrapper">
                        <table class="table align-middle table-nowrap" id="customerTable">
                            <thead class="table-light">
                                <tr> 
                                    <th scope="col" style="width: 50px;">
                                        ID
                                    </th>
                                    <th class="sort" data-sort="customer_name">Nome</th>
                                    <th class="sort" data-sort="status">Status</th>

                                </tr>
                            </thead>
                            <tbody class="list form-check-all">
                            <?php
                                $sql5 = "SELECT * FROM marcas WHERE marca_lixeira = '1' ORDER BY marca_id ";
                                // Executando $sql e verificando se tudo ocorreu certo.
                                $resultado5 = mysqli_query($conn, $sql5);
                                //Realizando um loop para exibi&ccedil;&atilde;o de todos os dados 
                                while ($linha = mysqli_fetch_array($resultado5)) {
                                ?>
                                <tr>
                                        <th scope="row">
                                            <?php echo $linha['marca_id'] ?>
                                        </th>

                                        <td class="customer_name"><?php echo $linha['marca_nome'] ?></td>
                                        <td class="date"><i class="ri-checkbox-circle-line fs-17 align-middle"></i> Ativo</td>
                                        <td class="status">
                                            <span class="badge badge-soft-success text-uppercase"> 
                                            <a href="javascript:void(0);" data-bs-toggle="modal" data-bs-target=".bs-example-modal-center<?php echo $linha['marca_id'] ?>" class="link-info fs-15"><i class="ri-image-line"></i></a>
                                                <a href="editar_marcas/<?php echo $linha['marca_id'] ?>" class="link-success fs-15"><i class="ri-edit-2-line"></i></a>
                                                <a href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#firstmodal<?php echo $linha['marca_id'] ?>" class="link-danger fs-15"><i class="ri-delete-bin-line"></i></a></span></td>

                                    </tr>

                                     <!--  modal deletar -->
                                     <div class="modal fade" id="firstmodal<?php echo $linha['marca_id'] ?>" aria-hidden="true" tabindex="-1">
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


                                                            <form action="deletar_marcas" method="post" id="sa-departamento1">


                                                                <script>
                                                                    function sendForm() {
                                                                        $("#sa-departamento1").click();
                                                                    }
                                                                </script> <input type="submit" class="btn btn-danger" value="Estou ciente quero Deletar"> <input type="hidden" value="<?php echo $linha['marca_id'] ?>" name="id">

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

                <script>
                    function $(id) {
                        return document.getElementById(id);
                    }
                    window.click = function() {
                        window.open = "http://www.google.com.br";
                    }
                </script>
                <!-- /.INICIO MODAL FOTO OPÇÃO -->

                <div class="modal fade bs-example-modal-center<?php echo $linha['marca_id'] ?>" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered<?php echo $linha['marca_id'] ?>">
                        <div class="modal-content">
                            <div class="modal-body text-center p-5">
                                <lord-icon src="https://cdn.lordicon.com/dklbhvrt.json" trigger="loop" style="width:150px;height:150px" colors="primary:#121331,secondary:#08a88a">
                                </lord-icon>

                                <div class="mt-4">
                                    <h4 class="mb-3">Adicionar Foto!</h4>
                                    <p class="text-muted mb-4"> Escolha uma opção abaixo</p>
                                    <div class="hstack gap-2 justify-content-center">
                                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Fechar</button>
                                        <a href="javascript:void(0);" class="btn btn-danger" data-bs-toggle="modal" data-bs-target=".bs-example-modal-center_foto<?php echo $linha['marca_id'] ?>">Tirar Foto</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>c
                </div><!-- /.modal -->


                <!-- /.INICIO MODAL TIRAR FOTO -->

                <div class="modal fade bs-example-modal-center_foto<?php echo $linha['marca_id'] ?>" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered<?php echo $linha['marca_id'] ?>">
                        <div class="modal-content">
                            <div class="modal-body text-center p-5">


                                <div class="mt-4">



                                    <div class="area">
                                        <div>
                                            <video id="video" autoplay></video>
                                            <button id="snap" class="btn btn-success">Tirar Foto</button>
                                            <div class="text-center"><canvas id="canvas" class="text-center" width="320" height="240"></canvas> </div> <br>
                                            <script>
                                                // Grab elements, create settings, etc.
                                                var video = document.getElementById('video');

                                                // Get access to the camera!
                                                if (navigator.mediaDevices && navigator.mediaDevices.getUserMedia) {
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
                                                document.getElementById("snap").addEventListener("click", function() {
                                                    context.drawImage(video, 0, 0, 320, 240);
                                                });
                                            </script>


                                            <div class="hstack gap-2 justify-content-center">
                                                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Fechar</button>
                                                <a href="javascript:void(0);" class="btn btn-info">Salvar Foto</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div><!-- /.modal -->



                        <!-- /.INICIO MODAL FOTO -->

                        <div class="modal fade bs-example-modal-center-deletar<?php echo $linha['marca_id'] ?>" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered<?php echo $linha['marca_id'] ?>">
                                <div class="modal-content">
                                    <div class="modal-body text-center p-5">
                                        <lord-icon src="https://cdn.lordicon.com/dklbhvrt.json" trigger="loop" style="width:150px;height:150px" colors="primary:#121331,secondary:#08a88a">
                                        </lord-icon>

                                        <div class="mt-4">
                                            <h4 class="mb-3">Adicionar Foto!</h4>
                                            <p class="text-muted mb-4"> Escolha uma opção abaixo</p>
                                            <div class="hstack gap-2 justify-content-center">
                                                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                                                <a href="javascript:void(0);" class="btn btn-danger" data-bs-toggle="modal" data-bs-target=".bs-example-modal-center_foto<?php echo $linha['cliente_celular'] ?>">Tirar Foto</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>c
                        </div><!-- /.modal -->

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
                        <div class="pagination-wrap hstack gap-2">

                            <ul class="pagination listjs-pagination mb-0"></ul>


                            </a>
                        </div>
                    </div>
                </div>
            </div><!-- end card -->
        </div>
        <!-- end col -->
    </div>
    <!-- end col -->
</div>
</div>
<!-- end row -->


<!-- ------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------->
<!-- Anotações -->

<!-- start page title -->

<div class="col-6">
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0">Anotações</h4>
        </div>
    </div>
</div>
<!-- end row -->

<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title mb-0">Listando Anotações</h4>
            </div><!-- end card header -->

            <div class="card-body">
                <div id="customerList">
                    <div class="row g-4 mb-3">
                        <div class="col-sm-auto">
                            <div>

                            </div>
                        </div>
                        <div class="col-sm">
                            <div class="d-flex justify-content-sm-end">
                                <div class="search-box ms-2">
                                    <input type="text" class="form-control search" placeholder="Localizar clientes">
                                    <i class="ri-search-line search-icon"></i>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="table-responsive table-card mt-3 mb-1 table-wrapper">
                        <table class="table align-middle table-nowrap" id="customerTable">
                            <thead class="table-light">
                                <tr> 
                                    <th scope="col" style="width: 50px;">
                                        ID
                                    </th>
                                    <th class="sort" data-sort="customer_name">Cliente</th>
                                    <th class="sort" data-sort="customer_name">Data</th>
                                    <th class="sort" data-sort="status">Status</th>

                                </tr>
                            </thead>
                            <tbody class="list form-check-all">
                            <?php
                                $sql6 = "SELECT * FROM anotacoes_clientes e INNER JOIN clientes c ON e.anotacoes_clientes_id_cliente = c.cliente_id WHERE anotacoes_lixeira = '1'";
                                // Executando $sql e verificando se tudo ocorreu certo.
                                $resultado6 = mysqli_query($conn, $sql6);
                                //Realizando um loop para exibi&ccedil;&atilde;o de todos os dados 
                                while ($linha = mysqli_fetch_array($resultado6)) {
                                ?>
                                <tr>
                                        <th scope="row">
                                            <?php echo $linha['anotacoes_clientes_id'] ?>
                                        </th>

                                        <td class="customer_name"><?php echo $linha['cliente_razao'] ?></td>
                                        <td class="customer_name"><?php echo $linha['anotacoes_clientes_data'] ?></td>
                                        <td class="date"><i class="ri-checkbox-circle-line fs-17 align-middle"></i> Ativo</td>
                                        <td class="status">
                                            <span class="badge badge-soft-success text-uppercase"> 
                                            <a href="javascript:void(0);" data-bs-toggle="modal" data-bs-target=".bs-example-modal-center<?php echo $linha['anotacoes_clientes_id'] ?>" class="link-info fs-15"><i class="ri-image-line"></i></a>
                                                <a href="editar_anotacoes/<?php echo $linha['anotacoes_clientes_id'] ?>" class="link-success fs-15"><i class="ri-edit-2-line"></i></a>
                                                <a href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#firstmodal<?php echo $linha['anotacoes_clientes_id'] ?>" class="link-danger fs-15"><i class="ri-delete-bin-line"></i></a></span></td>

                                    </tr>

                                     <!--  modal deletar -->
                                     <div class="modal fade" id="firstmodal<?php echo $linha['anotacoes_clientes_id'] ?>" aria-hidden="true" tabindex="-1">
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


                                                            <form action="deletar_anotacoes" method="post" id="sa-departamento">


                                                                <script>
                                                                    function sendForm() {
                                                                        $("#sa-departamento").click();
                                                                    }
                                                                </script> <input type="submit" class="btn btn-danger" value="Estou ciente quero Deletar"> <input type="hidden" value="<?php echo $linha['anotacoes_clientes_id'] ?>" name="id">

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

                <script>
                    function $(id) {
                        return document.getElementById(id);
                    }
                    window.click = function() {
                        window.open = "http://www.google.com.br";
                    }
                </script>
                <!-- /.INICIO MODAL FOTO OPÇÃO -->

                <div class="modal fade bs-example-modal-center<?php echo $linha['anotacoes_clientes_id'] ?>" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered<?php echo $linha['anotacoes_clientes_id'] ?>">
                        <div class="modal-content">
                            <div class="modal-body text-center p-5">
                                <lord-icon src="https://cdn.lordicon.com/dklbhvrt.json" trigger="loop" style="width:150px;height:150px" colors="primary:#121331,secondary:#08a88a">
                                </lord-icon>

                                <div class="mt-4">
                                    <h4 class="mb-3">Adicionar Foto!</h4>
                                    <p class="text-muted mb-4"> Escolha uma opção abaixo</p>
                                    <div class="hstack gap-2 justify-content-center">
                                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Fechar</button>
                                        <a href="javascript:void(0);" class="btn btn-danger" data-bs-toggle="modal" data-bs-target=".bs-example-modal-center_foto<?php echo $linha['anotacoes_clientes_id'] ?>">Tirar Foto</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>c
                </div><!-- /.modal -->


                <!-- /.INICIO MODAL TIRAR FOTO -->

                <div class="modal fade bs-example-modal-center_foto<?php echo $linha['anotacoes_clientes_id'] ?>" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered<?php echo $linha['anotacoes_clientes_id'] ?>">
                        <div class="modal-content">
                            <div class="modal-body text-center p-5">


                                <div class="mt-4">



                                    <div class="area">
                                        <div>
                                            <video id="video" autoplay></video>
                                            <button id="snap" class="btn btn-success">Tirar Foto</button>
                                            <div class="text-center"><canvas id="canvas" class="text-center" width="320" height="240"></canvas> </div> <br>
                                            <script>
                                                // Grab elements, create settings, etc.
                                                var video = document.getElementById('video');

                                                // Get access to the camera!
                                                if (navigator.mediaDevices && navigator.mediaDevices.getUserMedia) {
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
                                                document.getElementById("snap").addEventListener("click", function() {
                                                    context.drawImage(video, 0, 0, 320, 240);
                                                });
                                            </script>


                                            <div class="hstack gap-2 justify-content-center">
                                                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Fechar</button>
                                                <a href="javascript:void(0);" class="btn btn-info">Salvar Foto</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div><!-- /.modal -->



                        <!-- /.INICIO MODAL FOTO -->

                        <div class="modal fade bs-example-modal-center-deletar<?php echo $linha['anotacoes_clientes_id'] ?>" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered<?php echo $linha['anotacoes_clientes_id'] ?>">
                                <div class="modal-content">
                                    <div class="modal-body text-center p-5">
                                        <lord-icon src="https://cdn.lordicon.com/dklbhvrt.json" trigger="loop" style="width:150px;height:150px" colors="primary:#121331,secondary:#08a88a">
                                        </lord-icon>

                                        <div class="mt-4">
                                            <h4 class="mb-3">Adicionar Foto!</h4>
                                            <p class="text-muted mb-4"> Escolha uma opção abaixo</p>
                                            <div class="hstack gap-2 justify-content-center">
                                                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                                                <a href="javascript:void(0);" class="btn btn-danger" data-bs-toggle="modal" data-bs-target=".bs-example-modal-center_foto<?php echo $linha['cliente_celular'] ?>">Tirar Foto</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>c
                        </div><!-- /.modal -->

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
                        <div class="pagination-wrap hstack gap-2">

                            <ul class="pagination listjs-pagination mb-0"></ul>


                            </a>
                        </div>
                    </div>
                </div>
            </div><!-- end card -->
        </div>
        <!-- end col -->
    </div>
    <!-- end col -->
</div>
</div>
<!-- end row -->
</div>












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
        </script>


        <script src="assets/libs/list.js/list.min.js"></script>
        <script src="assets/libs/list.pagination.js/list.pagination.min.js"></script>

        <!-- listjs init -->
        <script src="assets/js/pages/listjs.init.js"></script>

        <!-- App js -->
        <script src="assets/js/app.js"></script>