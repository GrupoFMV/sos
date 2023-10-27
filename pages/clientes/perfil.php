 <?php 
@session_start();
if(!empty($_SESSION['id'])){
	
}else{
	header("Location: login.php");	
}

$cmd = "select * from clientes where cliente_id ='$id'   ";
$clientes = mysqli_query($conn, $cmd);
$cliente = mysqli_fetch_array($clientes);

?>

<link rel="stylesheet" href="assets/libs/swiper/swiper-bundle.min.css">

<link href="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/css/select2.min.css" rel="stylesheet" />
<script src="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/js/select2.min.js"></script>


          
                <div class="container-fluid">
                    <div class="profile-foreground position-relative mx-n4 mt-n4">
                        <div class="profile-wid-bg">
                            <img src="assets/images/profile-bg.jpg" alt="" class="profile-wid-img" />
                        </div>
                    </div>
                    <div class="pt-4 mb-4 mb-lg-3 pb-lg-4">
                        <div class="row g-4">
                            <div class="col-auto">
                                <div class="avatar-lg">
                                    <img src="assets/images/users/avatar-1.jpg" alt="user-img"
                                        class="img-thumbnail rounded-circle" />
                                </div>
                            </div>
                            <!--end col-->
                            <div class="col">
                                <div class="p-2">
                                    <h3 class="text-white mb-1"><?php echo $cliente['cliente_fantasia'] ?></h3>
                                    <p class="text-white-75">Cliente desde: -- </p>
                                    <div class="hstack text-white-50 gap-1">
<div class="me-2"><i class="ri-map-pin-user-line me-1 text-white-75 fs-16 align-middle"></i><?php echo $cliente['cliente_logradouro'] ?>,
<?php echo $cliente['cliente_numero'] ?> - <?php echo $cliente['cliente_bairro'] ?>
 <?php echo $cliente['cliente_cep'] ?> <?php echo $cliente['cliente_cidade'] ?> <?php echo $cliente['cliente_estado'] ?></div>
<div><i class=" ri-article-line me-1 text-white-75 fs-16 align-middle"></i><?php echo $cliente['cliente_cpf'] ?></div>
                                        <br>
                                    </div>
                                    <div class="hstack text-white-50 gap-1">
                                    <i class=" ri-user-line me-1 text-white-75 fs-16 align-middle"></i><Strong> Sindico:</Strong> <?php echo $cliente['cliente_sindico'] ?>
                                    <i class=" ri-phone-line me-1 text-white-75 fs-16 align-middle"></i> <?php echo $cliente['cliente_telefone'] ?>

                                   </div>

                                </div>
                            </div>
                            <!--end col-->
                            <div class="col-12 col-lg-auto order-last order-lg-0">
                                <div class="row text text-white-50 text-center">
                                    <div class="col-lg-12 col-4">
                                        <div class="p-2">
                                        <a href="#" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModalemergencia"> <i
                                                class="ri-edit-box-line align-bottom"></i> Emergência</a>
                                            
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <!--end col-->

                        </div>
                        <!--end row-->
                    </div>




 <!-- Modal Emergencia -->
 <div class="modal  fade" id="exampleModalemergencia" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog bg-danger ">
    <div class="modal-content bg-danger ">
      <div class="modal-header">
        <h5 class="modal-title text-light" id="exampleModalLabel">Abrir  OS Emergência</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">


        <form action="inserir_os" method="POST">
       
        <label class="text-light" >Tipo OS</label>
    

<select name="tipo" id="cliente-select" required class="form-control meuselect">
    <?php
$sqlt = "SELECT * FROM os_tipos WHERE os_tipo_id ='4'  ORDER BY os_tipo_nome";
$resultadot = mysqli_query($conn, $sqlt);
while ($linhat = mysqli_fetch_array($resultadot)) { ?>
    <option value="<?php echo $linhat[os_tipo_id] ?>"><?php echo $linhat[os_tipo_nome] ?></option>
    <?php } ?>
</select>
<label class="text-light">Nome do Solicitante</label>
   
   <input class="form-control" name="solicitante" required></textarea>

        <label class="text-light">Informações Adicionais </label>
   
        <textarea class="form-control" id="story" name="consideracoes" rows="5" cols="33"></textarea>

      </div>
      <input name="cliente" type="hidden" value="<?php echo $id ?>" > 
      <div class="modal-footer">
      <button type="submit" class="btn btn-success">Salvar</button>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
      </div>
</form>
    </div>
  </div>
</div>




                    <div class="row">
                        <div class="col-lg-12">
                            <div>
                                <div class="d-flex">
                                    <!-- Nav tabs -->
                                    <ul class="nav nav-pills animation-nav profile-nav gap-2 gap-lg-3 flex-grow-1"
                                        role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link fs-14 active" data-bs-toggle="tab" href="#overview-tab"
                                                role="tab">
                                                <i class="ri-airplay-fill d-inline-block d-md-none"></i> <span
                                                    class="d-none d-md-inline-block">Principal</span>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                           <!-- <a class="nav-link fs-14" data-bs-toggle="tab" href="#activities"
                                                role="tab">
                                                <i class="ri-list-unordered d-inline-block d-md-none"></i> <span
                                                    class="d-none d-md-inline-block">Atividades</span>
                                            </a>
                                        </li> -->
                                       <!-- <li class="nav-item">
                                            <a class="nav-link fs-14" data-bs-toggle="tab" href="#projects" role="tab">
                                                <i class="ri-price-tag-line d-inline-block d-md-none"></i> <span
                                                    class="d-none d-md-inline-block">Aulas</span>
                                            </a>
                                        </li> -->
                                    <!--    <li class="nav-item">
                                            <a class="nav-link fs-14" data-bs-toggle="tab" href="#documents" role="tab">
                                                <i class="ri-folder-4-line d-inline-block d-md-none"></i> <span
                                                    class="d-none d-md-inline-block">Taxas</span>
                                            </a>
                                        </li>
-->
										 <li class="nav-item">
                                            <a class="nav-link fs-14" data-bs-toggle="tab" href="#documents" role="tab">
                                                <i class="ri-folder-4-line d-inline-block d-md-none"></i> <span
                                                    class="d-none d-md-inline-block">Chamados</span>
                                            </a>
                                        </li>
										
										
										
                                    </ul>
                                    <div class="flex-shrink-0">
                                        <a href="editar_cliente/<?php echo $id ?>" class="btn btn-success"><i
                                                class="ri-edit-box-line align-bottom"></i> Editar Cadastro</a>
                                    </div>
                                </div>
                                <!-- Tab panes -->
                                <div class="tab-content pt-4 text-muted">
                                    <div class="tab-pane active" id="overview-tab" role="tabpanel">
                                        <div class="row">
                                            <div class="col-xxl-3">
                                                <div class="card">
                                                    <div class="card-body">
                                                        <h5 class="card-title mb-5">Qual opção colocar?</h5>
                                                        <div
                                                            class="progress animated-progress custom-progress progress-label">
                                                            <div class="progress-bar bg-danger" role="progressbar"
                                                                style="width: 30%" aria-valuenow="30" aria-valuemin="0"
                                                                aria-valuemax="100">
                                                                <div class="label">30%</div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="card">
                                                    <div class="card-body">
                                                        <h5 class="card-title mb-3">Info</h5>
                                                        <div class="table-responsive">
                                                            <table class="table table-borderless mb-0">
                                                                <tbody>
                                                                    <tr>
                                                                        <th class="ps-0" scope="row">Nome:</th>
                                                                        <td class="text-muted"><?php echo $aluno['aluno_nome'] ?></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th class="ps-0" scope="row">Telefone:</th>
                                                                        <td class="text-muted"><?php echo $aluno['aluno_cel'] ?></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th class="ps-0" scope="row">E-mail :</th>
                                                                        <td class="text-muted"><?php echo $aluno['aluno_email'] ?></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th class="ps-0" scope="row">CPF: :</th>
                                                                        <td class="text-muted"><?php echo $aluno['aluno_cpf'] ?>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th class="ps-0" scope="row">Endereço</th>
                                                                        <td class="text-muted"><?php echo $aluno['aluno_rua'] ?> , <?php echo $aluno['aluno_numero'] ?> <?php echo $aluno['aluno_complemento'] ?> <?php echo $aluno['aluno_bairro'] ?> <?php echo $aluno['aluno_cidade'] ?>, <?php echo $aluno['aluno_uf'] ?></td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div><!-- end card body -->
                                                </div><!-- end card -->

                                               <!-- <div class="card">
                                                    <div class="card-body">
                                                        <h5 class="card-title mb-4">Portfolio</h5>
                                                        <div class="d-flex flex-wrap gap-2">
                                                            <div>
                                                                <a href="javascript:void(0);" class="avatar-xs d-block">
                                                                    <span
                                                                        class="avatar-title rounded-circle fs-16 bg-dark text-light">
                                                                        <i class="ri-github-fill"></i>
                                                                    </span>
                                                                </a>
                                                            </div>
                                                            <div>
                                                                <a href="javascript:void(0);" class="avatar-xs d-block">
                                                                    <span
                                                                        class="avatar-title rounded-circle fs-16 bg-primary">
                                                                        <i class="ri-global-fill"></i>
                                                                    </span>
                                                                </a>
                                                            </div>
                                                            <div>
                                                                <a href="javascript:void(0);" class="avatar-xs d-block">
                                                                    <span
                                                                        class="avatar-title rounded-circle fs-16 bg-success">
                                                                        <i class="ri-dribbble-fill"></i>
                                                                    </span>
                                                                </a>
                                                            </div>
                                                            <div>
                                                                <a href="javascript:void(0);" class="avatar-xs d-block">
                                                                    <span
                                                                        class="avatar-title rounded-circle fs-16 bg-danger">
                                                                        <i class="ri-pinterest-fill"></i>
                                                                    </span>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div> -->
<!--
                                                <div class="card">
                                                    <div class="card-body">
                                                        <h5 class="card-title mb-4">Skills</h5>
                                                        <div class="d-flex flex-wrap gap-2 fs-15">
                                                            <a href="javascript:void(0);"
                                                                class="badge badge-soft-primary">Photoshop</a>
                                                            <a href="javascript:void(0);"
                                                                class="badge badge-soft-primary">illustrator</a>
                                                            <a href="javascript:void(0);"
                                                                class="badge badge-soft-primary">HTML</a>
                                                            <a href="javascript:void(0);"
                                                                class="badge badge-soft-primary">CSS</a>
                                                            <a href="javascript:void(0);"
                                                                class="badge badge-soft-primary">Javascript</a>
                                                            <a href="javascript:void(0);"
                                                                class="badge badge-soft-primary">Php</a>
                                                            <a href="javascript:void(0);"
                                                                class="badge badge-soft-primary">Python</a>
                                                        </div>
                                                    </div>
                                                </div> -->
<!--
                                                <div class="card">
                                                    <div class="card-body">
                                                        <div class="d-flex align-items-center mb-4">
                                                            <div class="flex-grow-1">
                                                                <h5 class="card-title mb-0">Suggestions</h5>
                                                            </div>
                                                            <div class="flex-shrink-0">
                                                                <div class="dropdown">
                                                                    <a href="#" role="button" id="dropdownMenuLink2"
                                                                        data-bs-toggle="dropdown" aria-expanded="false">
                                                                        <i class="ri-more-2-fill fs-14"></i>
                                                                    </a>

                                                                    <ul class="dropdown-menu dropdown-menu-end"
                                                                        aria-labelledby="dropdownMenuLink2">
                                                                        <li><a class="dropdown-item" href="#">View</a>
                                                                        </li>
                                                                        <li><a class="dropdown-item" href="#">Edit</a>
                                                                        </li>
                                                                        <li><a class="dropdown-item" href="#">Delete</a>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div>
                                                            <div class="d-flex align-items-center py-3">
                                                                <div class="avatar-xs flex-shrink-0 me-3">
                                                                    <img src="assets/images/users/avatar-3.jpg" alt=""
                                                                        class="img-fluid rounded-circle" />
                                                                </div>
                                                                <div class="flex-grow-1">
                                                                    <div>
                                                                        <h5 class="fs-13 mb-1">Esther James</h5>
                                                                        <p class="fs-13 text-muted mb-0">Frontend
                                                                            Developer</p>
                                                                    </div>
                                                                </div>
                                                                <div class="flex-shrink-0 ms-2">
                                                                    <button type="button"
                                                                        class="btn btn-sm btn-outline-success"><i
                                                                            class="ri-user-add-line align-middle"></i></button>
                                                                </div>
                                                            </div>
                                                            <div class="d-flex align-items-center py-3">
                                                                <div class="avatar-xs flex-shrink-0 me-3">
                                                                    <img src="assets/images/users/avatar-4.jpg" alt=""
                                                                        class="img-fluid rounded-circle" />
                                                                </div>
                                                                <div class="flex-grow-1">
                                                                    <div>
                                                                        <h5 class="fs-13 mb-1">Jacqueline Steve</h5>
                                                                        <p class="fs-13 text-muted mb-0">UI/UX Designer
                                                                        </p>
                                                                    </div>
                                                                </div>
                                                                <div class="flex-shrink-0 ms-2">
                                                                    <button type="button"
                                                                        class="btn btn-sm btn-outline-success"><i
                                                                            class="ri-user-add-line align-middle"></i></button>
                                                                </div>
                                                            </div>
                                                            <div class="d-flex align-items-center py-3">
                                                                <div class="avatar-xs flex-shrink-0 me-3">
                                                                    <img src="assets/images/users/avatar-5.jpg" alt=""
                                                                        class="img-fluid rounded-circle" />
                                                                </div>
                                                                <div class="flex-grow-1">
                                                                    <div>
                                                                        <h5 class="fs-13 mb-1">George Whalen</h5>
                                                                        <p class="fs-13 text-muted mb-0">Backend
                                                                            Developer</p>
                                                                    </div>
                                                                </div>
                                                                <div class="flex-shrink-0 ms-2">
                                                                    <button type="button"
                                                                        class="btn btn-sm btn-outline-success"><i
                                                                            class="ri-user-add-line align-middle"></i></button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                               -->
<!--
                                                <div class="card">
                                                    <div class="card-body">
                                                        <div class="d-flex align-items-center mb-4">
                                                            <div class="flex-grow-1">
                                                                <h5 class="card-title mb-0">Popular Posts</h5>
                                                            </div>
                                                            <div class="flex-shrink-0">
                                                                <div class="dropdown">
                                                                    <a href="#" role="button" id="dropdownMenuLink1"
                                                                        data-bs-toggle="dropdown" aria-expanded="false">
                                                                        <i class="ri-more-2-fill fs-14"></i>
                                                                    </a>

                                                                    <ul class="dropdown-menu dropdown-menu-end"
                                                                        aria-labelledby="dropdownMenuLink1">
                                                                        <li><a class="dropdown-item" href="#">View</a>
                                                                        </li>
                                                                        <li><a class="dropdown-item" href="#">Edit</a>
                                                                        </li>
                                                                        <li><a class="dropdown-item" href="#">Delete</a>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="d-flex mb-4">
                                                            <div class="flex-shrink-0">
                                                                <img src="assets/images/small/img-4.jpg" alt=""
                                                                    height="50" class="rounded" />
                                                            </div>
                                                            <div class="flex-grow-1 ms-3 overflow-hidden">
                                                                <a href="javascript:void(0);">
                                                                    <h6 class="text-truncate fs-13">Design your apps in
                                                                        your own way</h6>
                                                                </a>
                                                                <p class="text-muted mb-0">15 Dec 2021</p>
                                                            </div>
                                                        </div>
                                                        <div class="d-flex mb-4">
                                                            <div class="flex-shrink-0">
                                                                <img src="assets/images/small/img-5.jpg" alt=""
                                                                    height="50" class="rounded" />
                                                            </div>
                                                            <div class="flex-grow-1 ms-3 overflow-hidden">
                                                                <a href="javascript:void(0);">
                                                                    <h6 class="text-truncate fs-13">Smartest
                                                                        Applications for Business</h6>
                                                                </a>
                                                                <p class="text-muted mb-0">28 Nov 2021</p>
                                                            </div>
                                                        </div>
                                                        <div class="d-flex">
                                                            <div class="flex-shrink-0">
                                                                <img src="assets/images/small/img-6.jpg" alt=""
                                                                    height="50" class="rounded" />
                                                            </div>
                                                            <div class="flex-grow-1 ms-3 overflow-hidden">
                                                                <a href="javascript:void(0);">
                                                                    <h6 class="text-truncate fs-13">How to get creative
                                                                        in your work</h6>
                                                                </a>
                                                                <p class="text-muted mb-0">21 Nov 2021</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                  
                                                </div>
                                             -->
                                            </div>
                                            <!--end col-->
                                            <div class="col-xxl-9">
                                                <div class="card">
                                                    <div class="card-body">
                                                        <h5 class="card-title mb-3">Observações</h5>
                                                       sa
                                                       
                                                          
                                                    </div>
                                                    <!--end card-body-->
                                                </div><!-- end card -->

                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <div class="card">
                                                            <div class="card-header align-items-center d-flex">
                                                                <h4 class="card-title mb-0  me-2">Últimos Chamados </h4>
                                                                <div class="flex-shrink-0 ms-auto">
                                                            
                                                                </div>
                                                            </div>
                                                            <div class="card-body">
                                                                <div class="tab-content text-muted">
                                                                    <div class="tab-pane active" id="today"
                                                                        role="tabpanel">
                                                                        <div class="profile-timeline">
                                                                            <div class="accordion accordion-flush"
                                                                                id="todayExample">
																				
																				
												 <div class="live-preview">
                                            <div >

                                            <?php 

$sqlo = "SELECT * FROM os o inner join os_tipos ost on o.os_tipo = ost.os_tipo_id inner join os_status oss ON o.os_status = oss.os_status_id 
inner join users us on  o.os_usuario = us.user_id 

where o.os_cliente = $id ";
$resultadoo = mysqli_query($conn, $sqlo);
while ($linhao = mysqli_fetch_array($resultadoo)) { 
    
$sqlch = "SELECT * FROM interacoes_os where interacao_os = $linhao[os_id] order by interacao_data desc ";
$resultadoch = mysqli_query($conn, $sqlch);
$linhach = mysqli_fetch_array($resultadoch);
$totalch = mysqli_num_rows($resultadoch);
    
    ?>    
    
    
<!-- Inicio Modal Visualizar Resumo -->
<div class="modal fade" id="staticBackdrop3<?php echo $linhao[os_id] ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" 
aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog 	modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Dados do Chamado #<?php echo $linhao[os_id] ?> - Status: <?php echo $linhao[os_status_nome] ?> </h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">


       <strong> Cliente: </strong><?php echo $cliente[cliente_fantasia] ?><br>
       <strong>Solicitante:</strong> <?php echo $linhao[os_solicitante] ?> <br>
       <strong> Responsável pelo abertura OS: </strong><?php echo $linhao[user_nome] ?> <br>
       <strong> Data Abertura: </strong><?php echo date('d/m/Y H:i:s', strtotime($linhao[os_data_abertura])); ?> <br>
       <strong> Interaçãoes até momento: </strong> <?php echo $totalch ?> <br>
       <?php if ($totalch == '0') { } else { ?>  <strong> Última interação: </strong> <?php echo date('d/m/Y H:i:s', strtotime($linhach[interacao_data])); ?> <br> <?php } ?>
      <strong> Informações iniciais: </strong> <br> 
       <span class="text-danger"> <?php echo $linhao[os_consideracoes] ?> </span>
       <br>
       <br>

       <form action="salvar_interacao_os" method ="POST">

<label> <strong> Interações  </strong></label> 
<br>
    <?php
$sqlchi = "SELECT * FROM interacoes_os c  inner join users us on c.interacao_usuario = us.user_id  
inner join os_status ost on c.interacao_status2 =  ost.os_status_id
WHERE c.interacao_os ='$linhao[os_id]'  ORDER BY c.interacao_data desc";
$resultadochi = mysqli_query($conn, $sqlchi);
while ($linhachi = mysqli_fetch_array($resultadochi)) { ?> 

<strong> Registro:</strong> #<?php echo $linhachi[interacao_id] ?> <br>
<strong> Data:</strong> <?php echo date('d/m/Y H:i:s', strtotime($linhachi[interacao_data])); ?> <br>
<strong> Usuário:</strong> <?php echo $linhachi[user_nome] ?>  <br>
<strong> Status: </strong><?php echo $linhachi[os_status_nome] ?> <br>
<strong> Observações: </strong> <br><?php echo $linhachi[interacao_observacoes] ?> <br>


<hr>
    <?php } ?>



      </div>
      <div class="modal-footer">

        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
      </div>
    </div>
  </div>
</div>
</form>
<!-- Fim Modal Visualizar -->






<a href="#" class="list-group-item list-group-item-action"  data-bs-toggle="modal" data-bs-target="#staticBackdrop3<?php echo $linhao[os_id] ?>">
<i class="ri-download-2-fill align-middle me-2"></i><?php echo date('d/m/Y', strtotime($linhao[os_data_abertura])); ?> -  <strong class="text-info"> Solicitante: </strong>  <?php echo $linhao[os_solicitante] ?> - <strong class="text-warning"> Tipo: </strong> <?php echo $linhao[os_tipo_nome] ?> - <strong class="text-secondary"> Status: </strong> <?php echo $linhao[os_status_nome] ?></a>
   <?php } ?>                                            
                                            </div>
                                        </div>
																				
																				
																				
																			
                                                                        </div>    </div>    </div>
                                                                   
                                                                </div>
                                                            </div><!-- end card body -->
                                                        </div><!-- end card -->
                                                    </div><!-- end col -->
                                                </div><!-- end row -->

<div class="row">
                                                    <div class="col-lg-12">
                                                        <div class="card">
                                                            <div class="card-header align-items-center d-flex">
                                                                <h4 class="card-title mb-0  me-2">Últimos Orçamentos </h4>
                                                                <div class="flex-shrink-0 ms-auto">
                                                            
                                                                </div>
                                                            </div>
                                                            <div class="card-body">
                                                                <div class="tab-content text-muted">
                                                                    <div class="tab-pane active" id="today"
                                                                        role="tabpanel">
                                                                        <div class="profile-timeline">
                                                                            <div class="accordion accordion-flush"
                                                                                id="todayExample">
																				
																				
												 <div class="live-preview">
                                            <div class="list-group list-group-fill-success">
                                            <?php 

$sqlor = "SELECT * FROM orcamentos 

where orcamento_cliente = $id ";
$resultadoor = mysqli_query($conn, $sqlor);
while ($orcamento = mysqli_fetch_array($resultadoor)) { 
    
    
    ?>       
    
    
<!-- Inicio Modal Visualizar Resumo -->
<div class="modal fade" id="staticBackdrop4<?php echo $linhao[os_id] ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" 
aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog 	modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Dados do Orcamento #<?php echo $orcamento[orcamento_id] ?>  </h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">


       <strong> Cliente: </strong><?php echo $cliente[cliente_fantasia] ?><br>
       <strong>Solicitante:</strong> <?php echo $linhao[os_solicitante] ?> <br>
       <strong> Responsável pelo abertura OS: </strong><?php echo $linhao[user_nome] ?> <br>
       <strong> Data Abertura: </strong><?php echo date('d/m/Y H:i:s', strtotime($linhao[os_data_abertura])); ?> <br>
       <strong> Interaçãoes até momento: </strong> <?php echo $totalch ?> <br>
       <?php if ($totalch == '0') { } else { ?>  <strong> Última interação: </strong> <?php echo date('d/m/Y H:i:s', strtotime($linhach[interacao_data])); ?> <br> <?php } ?>
      <strong> Informações iniciais: </strong> <br> 
       <span class="text-danger"> <?php echo $linhao[os_consideracoes] ?> </span>
       <br>
       <br>

       <form action="salvar_interacao_os" method ="POST">

<label> <strong> Interações  </strong></label> 
<br>
    <?php
$sqlchi = "SELECT * FROM interacoes_os c  inner join users us on c.interacao_usuario = us.user_id  
inner join os_status ost on c.interacao_status2 =  ost.os_status_id
WHERE c.interacao_os ='$linhao[os_id]'  ORDER BY c.interacao_data desc";
$resultadochi = mysqli_query($conn, $sqlchi);
while ($linhachi = mysqli_fetch_array($resultadochi)) { ?> 

<strong> Registro:</strong> #<?php echo $linhachi[interacao_id] ?> <br>
<strong> Data:</strong> <?php echo date('d/m/Y H:i:s', strtotime($linhachi[interacao_data])); ?> <br>
<strong> Usuário:</strong> <?php echo $linhachi[user_nome] ?>  <br>
<strong> Status: </strong><?php echo $linhachi[os_status_nome] ?> <br>
<strong> Observações: </strong> <br><?php echo $linhachi[interacao_observacoes] ?> <br>


<hr>
    <?php } ?>



      </div>
      <div class="modal-footer">

        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
      </div>
    </div>
  </div>
</div>
</form>
<!-- Fim Modal Visualizar -->



<a href="#" class="list-group-item list-group-item-action"  data-bs-toggle="modal" data-bs-target="#staticBackdrop4<?php echo $linhao[os_id] ?>">

<i class="ri-download-2-fill align-middle me-2"></i><?php echo date('d/m/Y', strtotime($orcamento[orcamento_data_solicitado])); ?></a>
     <?php } ?>                                          
                                            </div>
                                        </div>
																				
																				
																				
																			
                                                                        </div>    </div>    </div>
                                                                   
                                                                </div>
                                                            </div><!-- end card body -->
                                                        </div><!-- end card -->
                                                    </div><!-- end col -->
                                                </div><!-- end row -->


                                              

                                            </div>
                                            <!--end col-->
                                        </div>
                                        <!--end row-->
                                    </div>




                                    <div class="tab-pane fade" id="activities" role="tabpanel">
                                        <div class="card">
                                            <div class="card-body">
                                                <h5 class="card-title mb-3">Activities</h5>
                                                <div class="acitivity-timeline">
                                                    <div class="acitivity-item d-flex">
                                                        <div class="flex-shrink-0">
                                                            <img src="assets/images/users/avatar-1.jpg" alt=""
                                                                class="avatar-xs rounded-circle acitivity-avatar" />
                                                        </div>
                                                        <div class="flex-grow-1 ms-3">
                                                            <h6 class="mb-1">Oliver Phillips <span
                                                                    class="badge bg-soft-primary text-primary align-middle">New</span>
                                                            </h6>
                                                            <p class="text-muted mb-2">We talked about a project on
                                                                linkedin.</p>
                                                            <small class="mb-0 text-muted">Today</small>
                                                        </div>
                                                    </div>
                                                    <div class="acitivity-item py-3 d-flex">
                                                        <div class="flex-shrink-0 avatar-xs acitivity-avatar">
                                                            <div
                                                                class="avatar-title bg-soft-success text-success rounded-circle">
                                                                N
                                                            </div>
                                                        </div>
                                                        <div class="flex-grow-1 ms-3">
                                                            <h6 class="mb-1">Nancy Martino <span
                                                                    class="badge bg-soft-secondary text-secondary align-middle">In
                                                                    Progress</span></h6>
                                                            <p class="text-muted mb-2"><i
                                                                    class="ri-file-text-line align-middle ms-2"></i>
                                                                Create new project Buildng product</p>
                                                            <div class="avatar-group mb-2">
                                                                <a href="javascript: void(0);" class="avatar-group-item"
                                                                    data-bs-toggle="tooltip" data-bs-placement="top"
                                                                    title="" data-bs-original-title="Christi">
                                                                    <img src="assets/images/users/avatar-4.jpg" alt=""
                                                                        class="rounded-circle avatar-xs" />
                                                                </a>
                                                                <a href="javascript: void(0);" class="avatar-group-item"
                                                                    data-bs-toggle="tooltip" data-bs-placement="top"
                                                                    title="" data-bs-original-title="Frank Hook">
                                                                    <img src="assets/images/users/avatar-3.jpg" alt=""
                                                                        class="rounded-circle avatar-xs" />
                                                                </a>
                                                                <a href="javascript: void(0);" class="avatar-group-item"
                                                                    data-bs-toggle="tooltip" data-bs-placement="top"
                                                                    title="" data-bs-original-title=" Ruby">
                                                                    <div class="avatar-xs">
                                                                        <div
                                                                            class="avatar-title rounded-circle bg-light text-primary">
                                                                            R
                                                                        </div>
                                                                    </div>
                                                                </a>
                                                                <a href="javascript: void(0);" class="avatar-group-item"
                                                                    data-bs-toggle="tooltip" data-bs-placement="top"
                                                                    title="" data-bs-original-title="more">
                                                                    <div class="avatar-xs">
                                                                        <div class="avatar-title rounded-circle">
                                                                            2+
                                                                        </div>
                                                                    </div>
                                                                </a>
                                                            </div>
                                                            <small class="mb-0 text-muted">Yesterday</small>
                                                        </div>
                                                    </div>
                                                    <div class="acitivity-item py-3 d-flex">
                                                        <div class="flex-shrink-0">
                                                            <img src="assets/images/users/avatar-2.jpg" alt=""
                                                                class="avatar-xs rounded-circle acitivity-avatar" />
                                                        </div>
                                                        <div class="flex-grow-1 ms-3">
                                                            <h6 class="mb-1">Natasha Carey <span
                                                                    class="badge bg-soft-success text-success align-middle">Completed</span>
                                                            </h6>
                                                            <p class="text-muted mb-2">Adding a new event with
                                                                attachments</p>
                                                            <div class="row">
                                                                <div class="col-xxl-4">
                                                                    <div class="row border border-dashed gx-2 p-2 mb-2">
                                                                        <div class="col-4">
                                                                            <img src="assets/images/small/img-2.jpg"
                                                                                alt="" class="img-fluid rounded" />
                                                                        </div>
                                                                        <!--end col-->
                                                                        <div class="col-4">
                                                                            <img src="assets/images/small/img-3.jpg"
                                                                                alt="" class="img-fluid rounded" />
                                                                        </div>
                                                                        <!--end col-->
                                                                        <div class="col-4">
                                                                            <img src="assets/images/small/img-4.jpg"
                                                                                alt="" class="img-fluid rounded" />
                                                                        </div>
                                                                        <!--end col-->
                                                                    </div>
                                                                    <!--end row-->
                                                                </div>
                                                            </div>
                                                            <small class="mb-0 text-muted">25 Nov</small>
                                                        </div>
                                                    </div>
                                                    <div class="acitivity-item py-3 d-flex">
                                                        <div class="flex-shrink-0">
                                                            <img src="assets/images/users/avatar-6.jpg" alt=""
                                                                class="avatar-xs rounded-circle acitivity-avatar" />
                                                        </div>
                                                        <div class="flex-grow-1 ms-3">
                                                            <h6 class="mb-1">Bethany Johnson</h6>
                                                            <p class="text-muted mb-2">added a new member to velzon
                                                                dashboard</p>
                                                            <small class="mb-0 text-muted">19 Nov</small>
                                                        </div>
                                                    </div>
                                                    <div class="acitivity-item py-3 d-flex">
                                                        <div class="flex-shrink-0">
                                                            <div class="avatar-xs acitivity-avatar">
                                                                <div
                                                                    class="avatar-title rounded-circle bg-soft-danger text-danger">
                                                                    <i class="ri-shopping-bag-line"></i>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="flex-grow-1 ms-3">
                                                            <h6 class="mb-1">Your order is placed <span
                                                                    class="badge bg-soft-danger text-danger align-middle ms-1">Out
                                                                    of Delivery</span></h6>
                                                            <p class="text-muted mb-2">These customers can rest assured
                                                                their order has been placed.</p>
                                                            <small class="mb-0 text-muted">16 Nov</small>
                                                        </div>
                                                    </div>
                                                    <div class="acitivity-item py-3 d-flex">
                                                        <div class="flex-shrink-0">
                                                            <img src="assets/images/users/avatar-7.jpg" alt=""
                                                                class="avatar-xs rounded-circle acitivity-avatar" />
                                                        </div>
                                                        <div class="flex-grow-1 ms-3">
                                                            <h6 class="mb-1">Lewis Pratt</h6>
                                                            <p class="text-muted mb-2">They all have something to say
                                                                beyond the words on the page. They can come across as
                                                                casual or neutral, exotic or graphic. </p>
                                                            <small class="mb-0 text-muted">22 Oct</small>
                                                        </div>
                                                    </div>
                                                    <div class="acitivity-item py-3 d-flex">
                                                        <div class="flex-shrink-0">
                                                            <div class="avatar-xs acitivity-avatar">
                                                                <div
                                                                    class="avatar-title rounded-circle bg-soft-info text-info">
                                                                    <i class="ri-line-chart-line"></i>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="flex-grow-1 ms-3">
                                                            <h6 class="mb-1">Monthly sales report</h6>
                                                            <p class="text-muted mb-2"><span class="text-danger">2 days
                                                                    left</span> notification to submit the monthly sales
                                                                report. <a href="javascript:void(0);"
                                                                    class="link-warning text-decoration-underline">Reports
                                                                    Builder</a></p>
                                                            <small class="mb-0 text-muted">15 Oct</small>
                                                        </div>
                                                    </div>
                                                    <div class="acitivity-item d-flex">
                                                        <div class="flex-shrink-0">
                                                            <img src="assets/images/users/avatar-8.jpg" alt=""
                                                                class="avatar-xs rounded-circle acitivity-avatar" />
                                                        </div>
                                                        <div class="flex-grow-1 ms-3">
                                                            <h6 class="mb-1">New ticket received <span
                                                                    class="badge bg-soft-success text-success align-middle">Completed</span>
                                                            </h6>
                                                            <p class="text-muted mb-2">User <span
                                                                    class="text-secondary">Erica245</span> submitted a
                                                                ticket.</p>
                                                            <small class="mb-0 text-muted">26 Aug</small>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--end card-body-->
                                        </div>
                                        <!--end card-->
                                    </div>
                                    <!--end tab-pane-->
                                    <div class="tab-pane fade" id="projects" role="tabpanel">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-xxl-3 col-sm-6">
                                                        <div
                                                            class="card profile-project-card shadow-none profile-project-warning">
                                                            <div class="card-body p-4">
                                                                <div class="d-flex">
                                                                    <div class="flex-grow-1 text-muted overflow-hidden">
                                                                        <h5 class="fs-14 text-truncate"><a href="#"
                                                                                class="text-dark">Chat App Update</a>
                                                                        </h5>
                                                                        <p class="text-muted text-truncate mb-0">Last
                                                                            Update : <span
                                                                                class="fw-semibold text-dark">2 year
                                                                                Ago</span></p>
                                                                    </div>
                                                                    <div class="flex-shrink-0 ms-2">
                                                                        <div class="badge badge-soft-warning fs-10">
                                                                            Inprogress</div>
                                                                    </div>
                                                                </div>

                                                                <div class="d-flex mt-4">
                                                                    <div class="flex-grow-1">
                                                                        <div class="d-flex align-items-center gap-2">
                                                                            <div>
                                                                                <h5 class="fs-12 text-muted mb-0">
                                                                                    Members :</h5>
                                                                            </div>
                                                                            <div class="avatar-group">
                                                                                <div class="avatar-group-item">
                                                                                    <div class="avatar-xs">
                                                                                        <img src="assets/images/users/avatar-1.jpg"
                                                                                            alt=""
                                                                                            class="rounded-circle img-fluid" />
                                                                                    </div>
                                                                                </div>
                                                                                <div class="avatar-group-item">
                                                                                    <div class="avatar-xs">
                                                                                        <img src="assets/images/users/avatar-3.jpg"
                                                                                            alt=""
                                                                                            class="rounded-circle img-fluid" />
                                                                                    </div>
                                                                                </div>
                                                                                <div class="avatar-group-item">
                                                                                    <div class="avatar-xs">
                                                                                        <div
                                                                                            class="avatar-title rounded-circle bg-light text-primary">
                                                                                            J
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!-- end card body -->
                                                        </div>
                                                        <!-- end card -->
                                                    </div>
                                                    <!--end col-->
                                                    <div class="col-xxl-3 col-sm-6">
                                                        <div
                                                            class="card profile-project-card shadow-none profile-project-success">
                                                            <div class="card-body p-4">
                                                                <div class="d-flex">
                                                                    <div class="flex-grow-1 text-muted overflow-hidden">
                                                                        <h5 class="fs-14 text-truncate"><a href="#"
                                                                                class="text-dark">ABC Project
                                                                                Customization</a></h5>
                                                                        <p class="text-muted text-truncate mb-0">Last
                                                                            Update : <span
                                                                                class="fw-semibold text-dark">2 month
                                                                                Ago</span></p>
                                                                    </div>
                                                                    <div class="flex-shrink-0 ms-2">
                                                                        <div class="badge badge-soft-primary fs-10">
                                                                            Progress</div>
                                                                    </div>
                                                                </div>

                                                                <div class="d-flex mt-4">
                                                                    <div class="flex-grow-1">
                                                                        <div class="d-flex align-items-center gap-2">
                                                                            <div>
                                                                                <h5 class="fs-12 text-muted mb-0">
                                                                                    Members :</h5>
                                                                            </div>
                                                                            <div class="avatar-group">
                                                                                <div class="avatar-group-item">
                                                                                    <div class="avatar-xs">
                                                                                        <img src="assets/images/users/avatar-8.jpg"
                                                                                            alt=""
                                                                                            class="rounded-circle img-fluid" />
                                                                                    </div>
                                                                                </div>
                                                                                <div class="avatar-group-item">
                                                                                    <div class="avatar-xs">
                                                                                        <img src="assets/images/users/avatar-7.jpg"
                                                                                            alt=""
                                                                                            class="rounded-circle img-fluid" />
                                                                                    </div>
                                                                                </div>
                                                                                <div class="avatar-group-item">
                                                                                    <div class="avatar-xs">
                                                                                        <img src="assets/images/users/avatar-6.jpg"
                                                                                            alt=""
                                                                                            class="rounded-circle img-fluid" />
                                                                                    </div>
                                                                                </div>
                                                                                <div class="avatar-group-item">
                                                                                    <div class="avatar-xs">
                                                                                        <div
                                                                                            class="avatar-title rounded-circle bg-primary">
                                                                                            2+
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!-- end card body -->
                                                        </div>
                                                        <!-- end card -->
                                                    </div>
                                                    <!--end col-->
                                                    <div class="col-xxl-3 col-sm-6">
                                                        <div
                                                            class="card profile-project-card shadow-none profile-project-info">
                                                            <div class="card-body p-4">
                                                                <div class="d-flex">
                                                                    <div class="flex-grow-1 text-muted overflow-hidden">
                                                                        <h5 class="fs-14 text-truncate"><a href="#"
                                                                                class="text-dark">Client - Frank
                                                                                Hook</a></h5>
                                                                        <p class="text-muted text-truncate mb-0">Last
                                                                            Update : <span
                                                                                class="fw-semibold text-dark">1 hr
                                                                                Ago</span></p>
                                                                    </div>
                                                                    <div class="flex-shrink-0 ms-2">
                                                                        <div class="badge badge-soft-info fs-10">New
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="d-flex mt-4">
                                                                    <div class="flex-grow-1">
                                                                        <div class="d-flex align-items-center gap-2">
                                                                            <div>
                                                                                <h5 class="fs-12 text-muted mb-0">
                                                                                    Members :</h5>
                                                                            </div>
                                                                            <div class="avatar-group">
                                                                                <div class="avatar-group-item">
                                                                                    <div class="avatar-xs">
                                                                                        <img src="assets/images/users/avatar-4.jpg"
                                                                                            alt=""
                                                                                            class="rounded-circle img-fluid" />
                                                                                    </div>
                                                                                </div>
                                                                                <div class="avatar-group-item">
                                                                                    <div class="avatar-xs">
                                                                                        <div
                                                                                            class="avatar-title rounded-circle bg-light text-primary">
                                                                                            M
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="avatar-group-item">
                                                                                    <div class="avatar-xs">
                                                                                        <img src="assets/images/users/avatar-3.jpg"
                                                                                            alt=""
                                                                                            class="rounded-circle img-fluid" />
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!-- end card body -->
                                                        </div>
                                                        <!-- end card -->
                                                    </div>
                                                    <!--end col-->
                                                    <div class="col-xxl-3 col-sm-6">
                                                        <div
                                                            class="card profile-project-card shadow-none profile-project-primary">
                                                            <div class="card-body p-4">
                                                                <div class="d-flex">
                                                                    <div class="flex-grow-1 text-muted overflow-hidden">
                                                                        <h5 class="fs-14 text-truncate"><a href="#"
                                                                                class="text-dark">Velzon Project</a>
                                                                        </h5>
                                                                        <p class="text-muted text-truncate mb-0">Last
                                                                            Update : <span
                                                                                class="fw-semibold text-dark">11 hr
                                                                                Ago</span></p>
                                                                    </div>
                                                                    <div class="flex-shrink-0 ms-2">
                                                                        <div class="badge badge-soft-success fs-10">
                                                                            Completed</div>
                                                                    </div>
                                                                </div>

                                                                <div class="d-flex mt-4">
                                                                    <div class="flex-grow-1">
                                                                        <div class="d-flex align-items-center gap-2">
                                                                            <div>
                                                                                <h5 class="fs-12 text-muted mb-0">
                                                                                    Members :</h5>
                                                                            </div>
                                                                            <div class="avatar-group">
                                                                                <div class="avatar-group-item">
                                                                                    <div class="avatar-xs">
                                                                                        <img src="assets/images/users/avatar-7.jpg"
                                                                                            alt=""
                                                                                            class="rounded-circle img-fluid" />
                                                                                    </div>
                                                                                </div>
                                                                                <div class="avatar-group-item">
                                                                                    <div class="avatar-xs">
                                                                                        <img src="assets/images/users/avatar-5.jpg"
                                                                                            alt=""
                                                                                            class="rounded-circle img-fluid" />
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!-- end card body -->
                                                        </div>
                                                        <!-- end card -->
                                                    </div>
                                                    <!--end col-->
                                                    <div class="col-xxl-3 col-sm-6">
                                                        <div
                                                            class="card profile-project-card shadow-none profile-project-danger">
                                                            <div class="card-body p-4">
                                                                <div class="d-flex">
                                                                    <div class="flex-grow-1 text-muted overflow-hidden">
                                                                        <h5 class="fs-14 text-truncate"><a href="#"
                                                                                class="text-dark">Brand Logo Design</a>
                                                                        </h5>
                                                                        <p class="text-muted text-truncate mb-0">Last
                                                                            Update : <span
                                                                                class="fw-semibold text-dark">10 min
                                                                                Ago</span></p>
                                                                    </div>
                                                                    <div class="flex-shrink-0 ms-2">
                                                                        <div class="badge badge-soft-info fs-10">New
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="d-flex mt-4">
                                                                    <div class="flex-grow-1">
                                                                        <div class="d-flex align-items-center gap-2">
                                                                            <div>
                                                                                <h5 class="fs-12 text-muted mb-0">
                                                                                    Members :</h5>
                                                                            </div>
                                                                            <div class="avatar-group">
                                                                                <div class="avatar-group-item">
                                                                                    <div class="avatar-xs">
                                                                                        <img src="assets/images/users/avatar-7.jpg"
                                                                                            alt=""
                                                                                            class="rounded-circle img-fluid" />
                                                                                    </div>
                                                                                </div>
                                                                                <div class="avatar-group-item">
                                                                                    <div class="avatar-xs">
                                                                                        <img src="assets/images/users/avatar-6.jpg"
                                                                                            alt=""
                                                                                            class="rounded-circle img-fluid" />
                                                                                    </div>
                                                                                </div>
                                                                                <div class="avatar-group-item">
                                                                                    <div class="avatar-xs">
                                                                                        <div
                                                                                            class="avatar-title rounded-circle bg-light text-primary">
                                                                                            E
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!-- end card body -->
                                                        </div>
                                                        <!-- end card -->
                                                    </div>
                                                    <!--end col-->
                                                    <div class="col-xxl-3 col-sm-6">
                                                        <div
                                                            class="card profile-project-card shadow-none profile-project-primary">
                                                            <div class="card-body p-4">
                                                                <div class="d-flex">
                                                                    <div class="flex-grow-1 text-muted overflow-hidden">
                                                                        <h5 class="fs-14 text-truncate"><a href="#"
                                                                                class="text-dark">Chat App</a></h5>
                                                                        <p class="text-muted text-truncate mb-0">Last
                                                                            Update : <span
                                                                                class="fw-semibold text-dark">8 hr
                                                                                Ago</span></p>
                                                                    </div>
                                                                    <div class="flex-shrink-0 ms-2">
                                                                        <div class="badge badge-soft-warning fs-10">
                                                                            Inprogress</div>
                                                                    </div>
                                                                </div>

                                                                <div class="d-flex mt-4">
                                                                    <div class="flex-grow-1">
                                                                        <div class="d-flex align-items-center gap-2">
                                                                            <div>
                                                                                <h5 class="fs-12 text-muted mb-0">
                                                                                    Members :</h5>
                                                                            </div>
                                                                            <div class="avatar-group">
                                                                                <div class="avatar-group-item">
                                                                                    <div class="avatar-xs">
                                                                                        <div
                                                                                            class="avatar-title rounded-circle bg-light text-primary">
                                                                                            R
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="avatar-group-item">
                                                                                    <div class="avatar-xs">
                                                                                        <img src="assets/images/users/avatar-3.jpg"
                                                                                            alt=""
                                                                                            class="rounded-circle img-fluid" />
                                                                                    </div>
                                                                                </div>
                                                                                <div class="avatar-group-item">
                                                                                    <div class="avatar-xs">
                                                                                        <img src="assets/images/users/avatar-8.jpg"
                                                                                            alt=""
                                                                                            class="rounded-circle img-fluid" />
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!-- end card body -->
                                                        </div>
                                                        <!-- end card -->
                                                    </div>
                                                    <!--end col-->
                                                    <div class="col-xxl-3 col-sm-6">
                                                        <div
                                                            class="card profile-project-card shadow-none profile-project-warning">
                                                            <div class="card-body p-4">
                                                                <div class="d-flex">
                                                                    <div class="flex-grow-1 text-muted overflow-hidden">
                                                                        <h5 class="fs-14 text-truncate"><a href="#"
                                                                                class="text-dark">Project Update</a>
                                                                        </h5>
                                                                        <p class="text-muted text-truncate mb-0">Last
                                                                            Update : <span
                                                                                class="fw-semibold text-dark">48 min
                                                                                Ago</span></p>
                                                                    </div>
                                                                    <div class="flex-shrink-0 ms-2">
                                                                        <div class="badge badge-soft-warning fs-10">
                                                                            Inprogress</div>
                                                                    </div>
                                                                </div>

                                                                <div class="d-flex mt-4">
                                                                    <div class="flex-grow-1">
                                                                        <div class="d-flex align-items-center gap-2">
                                                                            <div>
                                                                                <h5 class="fs-12 text-muted mb-0">
                                                                                    Members :</h5>
                                                                            </div>
                                                                            <div class="avatar-group">
                                                                                <div class="avatar-group-item">
                                                                                    <div class="avatar-xs">
                                                                                        <img src="assets/images/users/avatar-6.jpg"
                                                                                            alt=""
                                                                                            class="rounded-circle img-fluid" />
                                                                                    </div>
                                                                                </div>
                                                                                <div class="avatar-group-item">
                                                                                    <div class="avatar-xs">
                                                                                        <img src="assets/images/users/avatar-5.jpg"
                                                                                            alt=""
                                                                                            class="rounded-circle img-fluid" />
                                                                                    </div>
                                                                                </div>
                                                                                <div class="avatar-group-item">
                                                                                    <div class="avatar-xs">
                                                                                        <img src="assets/images/users/avatar-4.jpg"
                                                                                            alt=""
                                                                                            class="rounded-circle img-fluid" />
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!-- end card body -->
                                                        </div>
                                                        <!-- end card -->
                                                    </div>
                                                    <!--end col-->
                                                    <div class="col-xxl-3 col-sm-6">
                                                        <div
                                                            class="card profile-project-card shadow-none profile-project-success">
                                                            <div class="card-body p-4">
                                                                <div class="d-flex">
                                                                    <div class="flex-grow-1 text-muted overflow-hidden">
                                                                        <h5 class="fs-14 text-truncate"><a href="#"
                                                                                class="text-dark">Client - Jennifer</a>
                                                                        </h5>
                                                                        <p class="text-muted text-truncate mb-0">Last
                                                                            Update : <span
                                                                                class="fw-semibold text-dark">30 min
                                                                                Ago</span></p>
                                                                    </div>
                                                                    <div class="flex-shrink-0 ms-2">
                                                                        <div class="badge badge-soft-primary fs-10">
                                                                            Process</div>
                                                                    </div>
                                                                </div>

                                                                <div class="d-flex mt-4">
                                                                    <div class="flex-grow-1">
                                                                        <div class="d-flex align-items-center gap-2">
                                                                            <div>
                                                                                <h5 class="fs-12 text-muted mb-0">
                                                                                    Members :</h5>
                                                                            </div>
                                                                            <div class="avatar-group">
                                                                                <div class="avatar-group-item">
                                                                                    <div class="avatar-xs">
                                                                                        <img src="assets/images/users/avatar-1.jpg"
                                                                                            alt=""
                                                                                            class="rounded-circle img-fluid" />
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!-- end card body -->
                                                        </div>
                                                        <!-- end card -->
                                                    </div>
                                                    <!--end col-->
                                                    <div class="col-xxl-3 col-sm-6">
                                                        <div
                                                            class="card profile-project-card shadow-none mb-xxl-0   profile-project-info">
                                                            <div class="card-body p-4">
                                                                <div class="d-flex">
                                                                    <div class="flex-grow-1 text-muted overflow-hidden">
                                                                        <h5 class="fs-14 text-truncate"><a href="#"
                                                                                class="text-dark">Bsuiness Template -
                                                                                UI/UX design</a></h5>
                                                                        <p class="text-muted text-truncate mb-0">Last
                                                                            Update : <span
                                                                                class="fw-semibold text-dark">7 month
                                                                                Ago</span></p>
                                                                    </div>
                                                                    <div class="flex-shrink-0 ms-2">
                                                                        <div class="badge badge-soft-success fs-10">
                                                                            Completed</div>
                                                                    </div>
                                                                </div>
                                                                <div class="d-flex mt-4">
                                                                    <div class="flex-grow-1">
                                                                        <div class="d-flex align-items-center gap-2">
                                                                            <div>
                                                                                <h5 class="fs-12 text-muted mb-0">
                                                                                    Members :</h5>
                                                                            </div>
                                                                            <div class="avatar-group">
                                                                                <div class="avatar-group-item">
                                                                                    <div class="avatar-xs">
                                                                                        <img src="assets/images/users/avatar-2.jpg"
                                                                                            alt=""
                                                                                            class="rounded-circle img-fluid" />
                                                                                    </div>
                                                                                </div>
                                                                                <div class="avatar-group-item">
                                                                                    <div class="avatar-xs">
                                                                                        <img src="assets/images/users/avatar-3.jpg"
                                                                                            alt=""
                                                                                            class="rounded-circle img-fluid" />
                                                                                    </div>
                                                                                </div>
                                                                                <div class="avatar-group-item">
                                                                                    <div class="avatar-xs">
                                                                                        <img src="assets/images/users/avatar-4.jpg"
                                                                                            alt=""
                                                                                            class="rounded-circle img-fluid" />
                                                                                    </div>
                                                                                </div>
                                                                                <div class="avatar-group-item">
                                                                                    <div class="avatar-xs">
                                                                                        <div
                                                                                            class="avatar-title rounded-circle bg-primary">
                                                                                            2+
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!-- end card body -->
                                                        </div>
                                                        <!-- end card -->
                                                    </div>
                                                    <!--end col-->
                                                    <div class="col-xxl-3 col-sm-6">
                                                        <div
                                                            class="card profile-project-card shadow-none mb-xxl-0  profile-project-success">
                                                            <div class="card-body p-4">
                                                                <div class="d-flex">
                                                                    <div class="flex-grow-1 text-muted overflow-hidden">
                                                                        <h5 class="fs-14 text-truncate"><a href="#"
                                                                                class="text-dark">Update Project</a>
                                                                        </h5>
                                                                        <p class="text-muted text-truncate mb-0">Last
                                                                            Update : <span
                                                                                class="fw-semibold text-dark">1 month
                                                                                Ago</span></p>
                                                                    </div>
                                                                    <div class="flex-shrink-0 ms-2">
                                                                        <div class="badge badge-soft-info fs-10">New
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="d-flex mt-4">
                                                                    <div class="flex-grow-1">
                                                                        <div class="d-flex align-items-center gap-2">
                                                                            <div>
                                                                                <h5 class="fs-12 text-muted mb-0">
                                                                                    Members :</h5>
                                                                            </div>
                                                                            <div class="avatar-group">
                                                                                <div class="avatar-group-item">
                                                                                    <div class="avatar-xs">
                                                                                        <img src="assets/images/users/avatar-7.jpg"
                                                                                            alt=""
                                                                                            class="rounded-circle img-fluid">
                                                                                    </div>
                                                                                </div>
                                                                                <div class="avatar-group-item">
                                                                                    <div class="avatar-xs">
                                                                                        <div
                                                                                            class="avatar-title rounded-circle bg-light text-primary">
                                                                                            A
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div><!-- end card body -->
                                                        </div><!-- end card -->
                                                    </div>
                                                    <!--end col-->
                                                    <div class="col-xxl-3 col-sm-6">
                                                        <div
                                                            class="card profile-project-card shadow-none mb-sm-0  profile-project-danger">
                                                            <div class="card-body p-4">
                                                                <div class="d-flex">
                                                                    <div class="flex-grow-1 text-muted overflow-hidden">
                                                                        <h5 class="fs-14 text-truncate"><a href="#"
                                                                                class="text-dark">Bank Management
                                                                                System</a></h5>
                                                                        <p class="text-muted text-truncate mb-0">Last
                                                                            Update : <span
                                                                                class="fw-semibold text-dark">10 month
                                                                                Ago</span></p>
                                                                    </div>
                                                                    <div class="flex-shrink-0 ms-2">
                                                                        <div class="badge badge-soft-success fs-10">
                                                                            Completed</div>
                                                                    </div>
                                                                </div>
                                                                <div class="d-flex mt-4">
                                                                    <div class="flex-grow-1">
                                                                        <div class="d-flex align-items-center gap-2">
                                                                            <div>
                                                                                <h5 class="fs-12 text-muted mb-0">
                                                                                    Members :</h5>
                                                                            </div>
                                                                            <div class="avatar-group">
                                                                                <div class="avatar-group-item">
                                                                                    <div class="avatar-xs">
                                                                                        <img src="assets/images/users/avatar-7.jpg"
                                                                                            alt=""
                                                                                            class="rounded-circle img-fluid" />
                                                                                    </div>
                                                                                </div>
                                                                                <div class="avatar-group-item">
                                                                                    <div class="avatar-xs">
                                                                                        <img src="assets/images/users/avatar-6.jpg"
                                                                                            alt=""
                                                                                            class="rounded-circle img-fluid" />
                                                                                    </div>
                                                                                </div>
                                                                                <div class="avatar-group-item">
                                                                                    <div class="avatar-xs">
                                                                                        <img src="assets/images/users/avatar-5.jpg"
                                                                                            alt=""
                                                                                            class="rounded-circle img-fluid" />
                                                                                    </div>
                                                                                </div>
                                                                                <div class="avatar-group-item">
                                                                                    <div class="avatar-xs">
                                                                                        <div
                                                                                            class="avatar-title rounded-circle bg-primary">
                                                                                            2+
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div><!-- end card body -->
                                                        </div><!-- end card -->
                                                    </div>
                                                    <!--end col-->
                                                    <div class="col-xxl-3 col-sm-6">
                                                        <div
                                                            class="card profile-project-card shadow-none mb-0  profile-project-primary">
                                                            <div class="card-body p-4">
                                                                <div class="d-flex">
                                                                    <div class="flex-grow-1 text-muted overflow-hidden">
                                                                        <h5 class="fs-14 text-truncate"><a href="#"
                                                                                class="text-dark">PSD to HTML
                                                                                Convert</a></h5>
                                                                        <p class="text-muted text-truncate mb-0">Last
                                                                            Update : <span
                                                                                class="fw-semibold text-dark">29 min
                                                                                Ago</span></p>
                                                                    </div>
                                                                    <div class="flex-shrink-0 ms-2">
                                                                        <div class="badge badge-soft-info fs-10">New
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="d-flex mt-4">
                                                                    <div class="flex-grow-1">
                                                                        <div class="d-flex align-items-center gap-2">
                                                                            <div>
                                                                                <h5 class="fs-12 text-muted mb-0">
                                                                                    Members :</h5>
                                                                            </div>
                                                                            <div class="avatar-group">
                                                                                <div class="avatar-group-item">
                                                                                    <div class="avatar-xs">
                                                                                        <img src="assets/images/users/avatar-7.jpg"
                                                                                            alt=""
                                                                                            class="rounded-circle img-fluid" />
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div><!-- end card body -->
                                                        </div><!-- end card -->
                                                    </div>
                                                    <!--end col-->
                                                    <div class="col-lg-12">
                                                        <div class="mt-4">
                                                            <ul
                                                                class="pagination pagination-separated justify-content-center mb-0">
                                                                <li class="page-item disabled">
                                                                    <a href="javascript:void(0);" class="page-link"><i
                                                                            class="mdi mdi-chevron-left"></i></a>
                                                                </li>
                                                                <li class="page-item active">
                                                                    <a href="javascript:void(0);"
                                                                        class="page-link">1</a>
                                                                </li>
                                                                <li class="page-item">
                                                                    <a href="javascript:void(0);"
                                                                        class="page-link">2</a>
                                                                </li>
                                                                <li class="page-item">
                                                                    <a href="javascript:void(0);"
                                                                        class="page-link">3</a>
                                                                </li>
                                                                <li class="page-item">
                                                                    <a href="javascript:void(0);"
                                                                        class="page-link">4</a>
                                                                </li>
                                                                <li class="page-item">
                                                                    <a href="javascript:void(0);"
                                                                        class="page-link">5</a>
                                                                </li>
                                                                <li class="page-item">
                                                                    <a href="javascript:void(0);" class="page-link"><i
                                                                            class="mdi mdi-chevron-right"></i></a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!--end row-->
                                            </div>
                                            <!--end card-body-->
                                        </div>
                                        <!--end card-->
                                    </div>
                                    <!--end tab-pane-->
                                    <div class="tab-pane fade" id="documents" role="tabpanel">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="d-flex align-items-center mb-4">
                                                    <h5 class="card-title flex-grow-1 mb-0">Chamados</h5>
                                                    <div class="flex-shrink-0">
                                                      
                                                        <label for="formFile" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal"> + Cadastrar Nova OS</label>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <div class="table-responsive">
                                                            <table class="table table-borderless align-middle mb-0">
                                                                <thead class="table-light">
                                                                    <tr>
                                                                        <th scope="col">#</th>
                                                                        <th scope="col">Data</th>
                                                                        <th scope="col">Solicitante</th>
                                                                        <th scope="col">Tipo</th>
                                                                        <th scope="col">Status</th>
                                                                        <th scope="col">Última Atualização</th>
                                                                        <th scope="col">Ação</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>

<?php 

$sqlo = "SELECT * FROM os o inner join os_tipos ost on o.os_tipo = ost.os_tipo_id inner join os_status oss ON o.os_status = oss.os_status_id 
inner join users us on  o.os_usuario = us.user_id 

where o.os_cliente = $id ";
$resultadoo = mysqli_query($conn, $sqlo);
while ($linhao = mysqli_fetch_array($resultadoo)) { 
    
$sqlch = "SELECT * FROM interacoes_os where interacao_os = $linhao[os_id] order by interacao_data desc ";
$resultadoch = mysqli_query($conn, $sqlch);
$linhach = mysqli_fetch_array($resultadoch);
$totalch = mysqli_num_rows($resultadoch);
    
    ?>


<!-- Inicio Modal Interagir -->
<div class="modal fade" id="staticBackdrop<?php echo $linhao[os_id] ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" 
aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog 	modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Chamado #<?php echo $linhao[os_id] ?> - Status: <?php echo $linhao[os_status_nome] ?> </h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">


       <strong> Cliente: </strong><?php echo $cliente[cliente_fantasia] ?><br>
       <strong>Solicitante:</strong> <?php echo $linhao[os_solicitante] ?> <br>
       <strong> Responsável pelo abertura OS: </strong><?php echo $linhao[user_nome] ?> <br>
       <strong> Data Abertura: </strong><?php echo date('d/m/Y H:i:s', strtotime($linhao[os_data_abertura])); ?> <br>
       <strong> Interaçãoes até momento: </strong> <?php echo $totalch ?> <br>
       <strong> Informações iniciais: </strong> <br>
       <span class="text-danger"> <?php echo $linhao[os_consideracoes] ?> </span>
       <br>
       <br>

       <form action="salvar_interacao_os" method ="POST">

<label> <strong> Direcionar para técnico  </strong></label> 

<select name="tecnico"  required class="form-control meuselect">
<option value="">Informe</option>
    <?php
$sqlte = "SELECT * FROM tecnicos WHERE tecnico_status ='1'  ORDER BY tecnico_nome";
$resultadote = mysqli_query($conn, $sqlte);
while ($linhate = mysqli_fetch_array($resultadote)) { ?>
    <option value="<?php echo $linhate[tecnico_id] ?>"><?php echo $linhate[tecnico_nome] ?></option>
    <?php } ?>
</select>



<label>Observações </label>
   
   <textarea class="form-control" id="story" name="observacoes" rows="5" cols="33"></textarea>


<input name="dataos" type="hidden" value="<?php echo $linhao[os_data_abertura] ?>">
<input name="cliente" type="hidden" value="<?php echo $linhao[os_cliente] ?>">
<input name="os" type="hidden" value="<?php echo $linhao[os_id] ?>">



      </div>
      <div class="modal-footer">
      <button type="submit" class="btn btn-success">Salvar</button>

        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
      </div>
    </div>
  </div>
</div>
</form>
<!-- Fim Modal Interagir -->




<!-- Inicio Modal Visualizar -->
<div class="modal fade" id="staticBackdrop2<?php echo $linhao[os_id] ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" 
aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog 	modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Dados do Chamado #<?php echo $linhao[os_id] ?> - Status: <?php echo $linhao[os_status_nome] ?> </h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">


       <strong> Cliente: </strong><?php echo $cliente[cliente_fantasia] ?><br>
       <strong>Solicitante:</strong> <?php echo $linhao[os_solicitante] ?> <br>
       <strong> Responsável pelo abertura OS: </strong><?php echo $linhao[user_nome] ?> <br>
       <strong> Data Abertura: </strong><?php echo date('d/m/Y H:i:s', strtotime($linhao[os_data_abertura])); ?> <br>
       <strong> Interaçãoes até momento: </strong> <?php echo $totalch ?> <br>
       <?php if ($totalch == '0') { } else { ?>  <strong> Última interação: </strong> <?php echo date('d/m/Y H:i:s', strtotime($linhach[chamado_data_aberto])); ?> <br> <?php } ?>
      <strong> Informações iniciais: </strong> <br> 
       <span class="text-danger"> <?php echo $linhao[os_consideracoes] ?> </span>
       <br>
       <br>

       <form action="salvar_interacao_os" method ="POST">

<label> <strong> Interações  </strong></label> 
<br>
    <?php
$sqlchi = "SELECT * FROM interacoes_os c  inner join users us on c.interacao_usuario = us.user_id  
inner join os_status ost on c.interacao_status2 =  ost.os_status_id
WHERE c.interacao_os ='$linhao[os_id]'  ORDER BY c.interacao_data desc";
$resultadochi = mysqli_query($conn, $sqlchi);
while ($linhachi = mysqli_fetch_array($resultadochi)) { ?> 

<strong> Registro:</strong> #<?php echo $linhachi[interacao_id] ?> <br>
<strong> Data:</strong> <?php echo date('d/m/Y H:i:s', strtotime($linhachi[interacao_data])); ?> <br>
<strong> Usuário:</strong> <?php echo $linhachi[user_nome] ?>  <br>
<strong> Status: </strong><?php echo $linhachi[os_status_nome] ?> <br>
<strong> Observações: </strong> <br><?php echo $linhachi[interacao_observacoes] ?> <br>


<hr>
    <?php } ?>



      </div>
      <div class="modal-footer">

        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
      </div>
    </div>
  </div>
</div>
</form>
<!-- Fim Modal Visualizar -->




                                                                    <tr>
<td><?php echo $linhao[os_id] ?> </td>
<td>
<div class="d-flex align-items-center">
<?php echo date('d/m/Y H:i:s', strtotime($linhao[os_data_abertura])); ?>
</div>
                                                                        </td>
                                                                        <td><?php echo $linhao[os_solicitante] ?></td>
                                                                        <td><?php echo $linhao[os_tipo_nome] ?></td>
                                                                        <td><?php echo $linhao[os_status_nome] ?></td>
                                                                        <td><?php if($totalch == '0') {  ?>Sem Registro <?php } else { ?>
                                                                        <?php echo date('d/m/Y H:i:s', strtotime($linhach[interacao_data])); ?>
 <?php } ?>
                                                                        
                                                                        </td>
                                                                        <td>




                                                                        
                                                                            <div class="dropdown">
                                                                                <a href="javascript:void(0);"
                                                                                    class="btn btn-light btn-icon"
                                                                                    id="dropdownMenuLink15"
                                                                                    data-bs-toggle="dropdown"
                                                                                    aria-expanded="true">
                                                                                    <i class="ri-equalizer-fill"></i>
                                                                                </a>
                                                                                <ul class="dropdown-menu dropdown-menu-end"
                                                                                    aria-labelledby="dropdownMenuLink15">
<li><a class="dropdown-item" href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#staticBackdrop2<?php echo $linhao[os_id] ?>"><i class="ri-eye-fill me-2 align-middle text-muted"></i>Visualizar</a>
                                                                                    </li>
<li><a class="dropdown-item" href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#staticBackdrop<?php echo $linhao[os_id] ?>">
    <i class="ri-download-2-fill me-2 align-middle text-muted"></i>Interagir</a>
                                                                                    </li>
                                                                                    <li class="dropdown-divider"></li>
                                                                                    <li><a class="dropdown-item"
                                                                                            href="javascript:void(0);"><i
                                                                                                class="ri-delete-bin-5-line me-2 align-middle text-muted"></i>Deletar</a>
                                                                                    </li>
                                                                                </ul>
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                   <?php } ?>
                                                                   
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                        
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--end tab-pane-->
                                </div>
                                <!--end tab-content-->
                            </div>
                        </div>
                        <!--end col-->
                    </div>
                    <!--end row-->

                </div><!-- container-fluid -->
            </div><!-- End Page-content -->






            
            <footer class="footer">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-sm-6">
                            <script>document.write(new Date().getFullYear())</script> © Velzon.
                        </div>
                        <div class="col-sm-6">
                            <div class="text-sm-end d-none d-sm-block">
                                Design & Develop by Themesbrand
                            </div>
                        </div>
                    </div>
                </div>
            </footer>
        </div><!-- end main content-->

    </div>
    <!-- END layout-wrapper -->



    <!--start back-to-top-->
    <button onclick="topFunction()" class="btn btn-danger btn-icon" id="back-to-top">
        <i class="ri-arrow-up-line"></i>
    </button>
    <!--end back-to-top-->



 <!-- Modal OS -->
 <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Abrir Nova OS</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">


        <form action="inserir_os" method="POST">
       
        <label>Tipo OS</label>
    

<select name="tipo" id="cliente-select" required class="form-control meuselect">
<option value="">Informe</option>
    <?php
$sqlt = "SELECT * FROM os_tipos WHERE os_tipo_status ='1'  ORDER BY os_tipo_nome";
$resultadot = mysqli_query($conn, $sqlt);
while ($linhat = mysqli_fetch_array($resultadot)) { ?>
    <option value="<?php echo $linhat[os_tipo_id] ?>"><?php echo $linhat[os_tipo_nome] ?></option>
    <?php } ?>
</select>
<label>Nome do Solicitante</label>
   
   <input class="form-control" name="solicitante" required></textarea>

        <label>Informações Adicionais </label>
   
        <textarea class="form-control" id="story" name="consideracoes" rows="5" cols="33"></textarea>

      </div>
      <input name="cliente" type="hidden" value="<?php echo $id ?>" > 
      <div class="modal-footer">
      <button type="submit" class="btn btn-success">Salvar</button>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
      </div>
</form>
    </div>
  </div>
</div>



   

