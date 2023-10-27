<?php // CODIGO DA SESSION
session_start();
if (!empty($_SESSION['user_id'])) {
} else {
    $_SESSION['msg'] = "Área restrita";
    header("Location: ../../login.php");
}


?> 
 <!-- Sweet Alert css-->
<link href="assets/libs/sweetalert2/sweetalert2.min.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.css" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.bundle.min.js"></script>
<script src="assets/js/bootstrap-select.min.js"></script>
<!-- INICIO DADOS INICIAIS -->
 <style>
    .container {
      max-width: 450px;
    }
    .imgGallery img {
      padding: 8px;
      max-width: 100px;
    }    
  </style>

	
		
		
 <div class="row">
	 

	 
<!--Inicio Formulario-->
                            <div class="row">
                               
                                    <h4 class="mb-sm-0">Técnica /  Controle de OS</h4>
                                    <div class="row gy-3">  

                                     <div align="right">  <a href="listar_clientes"> <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
  Abrir Nova OS
</button> </a>   </div>       

                                <div class="card">
									 <div class="card-body"> 
                               
										 <div class="row">

											 <h4>OS Abertas</h4>
											
											 <table class="table table-borderless align-middle mb-0">
                                                                <thead class="table-light">
                                                                    <tr>
                                                                        <th scope="col">#</th>
                                                                        <th scope="col">Data</th>
                                                                        <th scope="col">Cliente</th>
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
inner join users us on  o.os_usuario = us.user_id inner join clientes cl on o.os_cliente  = cl.cliente_id order by o.os_data_abertura desc";
$resultadoo = mysqli_query($conn, $sqlo);
while ($linhao = mysqli_fetch_array($resultadoo)) { 
    
$sqlch = "SELECT * FROM interacoes_os where interacao_os = $linhao[os_id] order by interacao_data desc ";
$resultadoch = mysqli_query($conn, $sqlch);
$linhach = mysqli_fetch_array($resultadoch);
$totalch = mysqli_num_rows($resultadoch);
    
    ?>		
<tr>



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


       <strong> Cliente: </strong><?php echo $linhao[cliente_fantasia] ?><br>
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
$sqlte = "SELECT * FROM users WHERE user_tipo ='2'  ORDER BY user_nome";
$resultadote = mysqli_query($conn, $sqlte);
while ($linhate = mysqli_fetch_array($resultadote)) { ?>
    <option value="<?php echo $linhate[user_id] ?>"><?php echo $linhate[user_nome] ?></option>
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


       <strong> Cliente: </strong><?php echo $linhao[cliente_fantasia] ?><br>
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


<td><?php echo $linhao[os_id] ?> </td>
<td>
<div class="d-flex align-items-center">
<?php echo date('d/m/Y H:i:s', strtotime($linhao[os_data_abertura])); ?>
</div>
</td>
<td><?php echo $linhao[cliente_fantasia] ?></td>

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
<ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuLink15">
<li><a class="dropdown-item" href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#staticBackdrop2<?php echo $linhao[os_id] ?>"><i class="ri-eye-fill me-2 align-middle text-muted"></i>Visualizar</a>
 
</li>

<?php if($linhao[os_status] == '6')  { ?>
  <li><a class="dropdown-item" href="orcamento_solicitado/<?php echo $linhao[os_id] ?>">
    <i class="ri-eye-line me-2 align-middle text-muted"></i>Ver Orçamento</a>
                                                                                    </li>
                                                                                    <?php } ?>

<?php if((($linhao[os_status] == '4') or ($linhao[os_status] == '7') or ($linhao[os_status] == '6'))) { } else { ?>
<li><a class="dropdown-item" href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#staticBackdrop<?php echo $linhao[os_id] ?>">
    <i class="ri-download-2-fill me-2 align-middle text-muted"></i>Interagir</a>
                                                                                    </li>
                                                                                    <?php } ?>
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

							 
                                                

												  </div> </div> 
				
				
		
		
		