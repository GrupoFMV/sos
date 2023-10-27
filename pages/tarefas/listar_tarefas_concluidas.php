<?php // CODIGO DA SESSION
if (!empty($_SESSION['user_id'])) {
} else {
    $_SESSION['msg'] = "Área restrita";
    header("Location: ../../login.php");
}
?>
<script src="//code.jquery.com/jquery-1.11.0.min.js"></script>
<style>
        video { border: 1px solid #ccc; display: block; margin: 0 0 20px 0; }
        #canvas { margin-top: 20px; border: 1px solid #ccc; display: block; }
	
	
	.button {
  background-color: #35b084;
  -webkit-border-radius: 5px;
  border-radius: 5px;
  border: none;
  color: #FFFFFF;
  cursor: pointer;
  display: inline-block;
  font-family: Arial;
  font-size: 14px;
  padding: 5px 10px;
  text-align: center;
  text-decoration: none;
}
@-webkit-keyframes glowing {
  0% { background-color: #ED5E5E; -webkit-box-shadow: 0 0 3px #ED5E5E; }
  50% { background-color: #990000; -webkit-box-shadow: 0 0 3px #990000; }
  100% { background-color: #ED5E5E; -webkit-box-shadow: 0 0 3px #ED5E5E; }
}

@-moz-keyframes glowing {
  0% { background-color: #ED5E5E; -moz-box-shadow: 0 0 3px #ED5E5E; }
  50% { background-color: #EF6E6E; -moz-box-shadow: 0 0 3px #EF6E6E; }
  100% { background-color: #ED5E5E; -moz-box-shadow: 0 0 3px #ED5E5E; }
}

@-o-keyframes glowing {
  0% { background-color: #ED5E5E; box-shadow: 0 0 3px #ED5E5E; }
  50% { background-color: #990000; box-shadow: 0 0 3px #990000; }
  100% { background-color: #ED5E5E; box-shadow: 0 0 3px #35b084; }
}

@keyframes glowing {
  0% { background-color: #ED5E5E; box-shadow: 0 0 3px #ED5E5E; }
  50% { background-color: #990000; box-shadow: 0 0 3px #990000; }
  100% { background-color: #ED5E5E; box-shadow: 0 0 3px #ED5E5E; }
}

.button {
  -webkit-animation: glowing 1500ms infinite;
  -moz-animation: glowing 1500ms infinite;
  -o-animation: glowing 1500ms infinite;
  animation: glowing 1500ms infinite;
}
	
</style>
<style>

area{
	margin: 10px auto;
	box-shadow: 0 10px 100px #ccc;
	padding: 20px;
	box-sizing: border-box;
	max-width: 500px;
}

.area video{
	width: 100%;
	height: auto;
	background-color: whitesmoke;
}

.area textarea{
	width: 100%;
	margin-top: 10px;
	height: 80px;
	box-sizing: border-box;
}


.area img{
	max-width: 100%;
	height: auto;
}

.area .caminho-imagem{
	padding: 5px 10px;
	border-radius: 3px;
	background-color: #068c84;
	text-align: center;
}

.area .caminho-imagem a{
	color: white;
	text-decoration: none;
}

.area .caminho-imagem a:hover{
	color: yellow;
}

</style>
<div id="ok"></div>
<!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                    <h4 class="mb-sm-0">Tarefas Concluídas</h4>

                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                           <?php if ($_POST['ver'] =='') {	?>
                                           <form action="listar_tarefas" method="post"> <input type="hidden" name="ver" value="sim"><button class="btn btn-info">Ver somentes minhas tarefas</button>  </form>
											<?php } else {  ?>
											
											 <form action="listar_tarefas" method="post"> <input type="hidden" name="" value="sim"><button class="btn btn-warning">Ver todas tarefas</button>  </form>
											
											<?php } ?>
                                        </ol>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <!-- end page title -->

 
		<div class="row">
			
<?php
			
if ($_POST['ver'] =='') {			
$sql = "SELECT * FROM tarefas WHERE tarefa_status ='2'  ORDER BY tarefa_prazo ";
} else { 
$sql = "SELECT * FROM tarefas WHERE tarefa_status ='2' and tarefa_para = $iduser   ORDER BY tarefa_prazo ";
}			
$resultado = mysqli_query($conn, $sql);
while ($linha=mysqli_fetch_array($resultado)) {

 $sql1 = "SELECT * FROM users where user_id = '$linha[tarefa_para]' ";
// Executando $sql e verificando se tudo ocorreu certo.
$resultado1 = mysqli_query($conn, $sql1);
//Realizando um loop para exibi&ccedil;&atilde;o de todos os dados 
 $linha1 = mysqli_fetch_array($resultado1);

$partes = explode(' ', $linha1['user_nome']);
$primeiroNome = array_shift($partes);
$ultimoNome = array_pop($partes);	
	
	
$prazo = $linha['tarefa_prazo']	;
date_default_timezone_set('America/Sao_Paulo');
$date = date('Y-m-d H:i');	
	
	
	?>
		
	
	
		
			
			
			
			
	 <div class="col-xxl-3">
	
	<div class="card card-<?php echo $linha['tarefa_etiqueta'] ?>">
  
												
												
                                                <div class="card-body">
													 <div class="card-header" align="center">
														 
														 
														
														 
														 <img src="assets/images/users/avatar-1.jpg" alt="" class="avatar-sm rounded-circle"> 
													
														
														<?php echo $primeiroNome  ?> <?php echo $ultimoNome  ?> 
													
														 
													
													</div>
													<Br>
													                                                    <div class="d-flex align-items-center">
														
														
														
                                                        
                                                        <div class="flex-grow-1 ms-3">
                                                            <p class="card-text"> <span class="fw-medium"><?php echo $linha['tarefa_titulo'] ?></span> </p>
                                                        </div>
                                                    </div>
                                                </div>
													
													<div align="center"> 
													<div class="col-11" style="background: #FCF9F9 ; height: 30px; padding-top: 5px; border-radius: 5px">
                                                   
                                                    <p class="text-muted mb-0"><i class=" las la-clock
" aria-hidden="true"></i>
 <?php echo date('d/m/Y H:i:s', strtotime($linha['tarefa_prazo'])); ?> </p>
                                                </div></div>
													<br>
													
                                                <div class="card-footer">
                                                    <div class="text-center">
                                                        <a href="javascript:void(0);" class="link-light" data-bs-toggle="modal" data-bs-target="#flipModal<?php echo $linha['tarefa_id'] ?>">Mais Detalhes<i class="ri-arrow-right-s-line align-middle lh-1"></i></a>
                                                    </div>
                                                </div>
                                            </div>	  </div>		
			
		
                                                          
                                                       <?php } ?>     
														
                                                        	 </div>			    
                
			<?php 
			
	if ($_POST['ver'] =='') {			
$sql = "SELECT * FROM tarefas WHERE tarefa_status ='2'  ORDER BY tarefa_prazo ";
} else { 
$sql = "SELECT * FROM tarefas WHERE tarefa_status ='2' and tarefa_para = $iduser   ORDER BY tarefa_prazo ";
}		
$resultado = mysqli_query($conn, $sql);
while ($linha=mysqli_fetch_array($resultado)) {

	 $sql1 = "SELECT * FROM users where user_id = '$linha[tarefa_para]' ";
// Executando $sql e verificando se tudo ocorreu certo.
$resultado1 = mysqli_query($conn, $sql1);
//Realizando um loop para exibi&ccedil;&atilde;o de todos os dados 
 $linha1 = mysqli_fetch_array($resultado1);

$partes = explode(' ', $linha1['user_nome']);
$primeiroNome = array_shift($partes);
$ultimoNome = array_pop($partes);
	
$sql1q = "SELECT * FROM users where user_id = '$linha[tarefa_quem]' ";
$resultado1q = mysqli_query($conn, $sql1q);
 $linha1q = mysqli_fetch_array($resultado1q);

$partesq = explode(' ', $linha1q['user_nome']);
$primeiroNomeq = array_shift($partesq);
$ultimoNomeq = array_pop($partesq);
	
	

			 ?>
			  <!-- Modal flip --><form action="atualizar_tarefa2" method="post"> 
			
                                                <div id="flipModal<?php echo $linha['tarefa_id'] ?>" class="modal  fade flip" tabindex="-1" aria-labelledby="flipModalLabel" aria-hidden="true" style="display: none;">
                                                    <div class="modal-dialog modal-dialog-centered modal-lg">
                                                        <div class="modal-content">
                                                            <div class="modal-header ">
																
																
																
																	
																	
																	
                                                                <h5 class="modal-title " id="flipModalLabel">Tarefa para: <?php echo $linha1['user_nome'] ?> </h5>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
															 

															 
															 <div class="modal-header"> 
																 <div class="col-4 text-muted "><i class=" las la-clock"> </i> Prazo: <?php echo date('d/m/Y H:i:s', strtotime($linha['tarefa_prazo'])); ?></div>
																  <div class="col-4 text-secondary"><i class=" las la-user-plus"> </i> Criada por: <?php echo $primeiroNomeq ?> <?php echo $ultimoNomeq ?> </div>
																 <div class="col-4"><i class="bx bx-refresh"> </i> Situação: <?php if ($linha['tarefa_status'] =='1') { ?><span class="badge bg-secondary">Aberta</span> <?php } ?><?php if ($linha['tarefa_status'] =='2') { ?><span class="badge bg-success">Concluída</span> <?php } ?> <?php if ($linha['tarefa_status'] =='3') { ?><span class="badge bg-success">Cancelada</span> <?php } ?> <?php if ($linha['tarefa_status'] =='4') { ?><span class="badge bg-warning">Adiada</span> <?php } ?> </div>
																 
																
																</div>
														
															
                                                            <div class="modal-body">
                                                                <span class="text-opacity-75" style="font-size: 15px;">
                                                                  <i class="  bx bx-copy-alt"> </i>  <?php echo $linha['tarefa_titulo'] ?> <i class="bx bxs-edit"> </i>
                                                                </span><hr>
																
																
																<span class="text-opacity-75" style="font-size: 15px;">
                                                                  <i class=" bx bx-message-rounded-error"> </i>  Observações <i class="bx bxs-edit"> </i>
                                                                </span>
																
																
                                                                <p class="text-muted"><?php echo $linha['tarefa_observacoes'] ?></p>
                                                               <hr>
																<span class="text-opacity-75" style="font-size: 15px;">
                                                                  <i class=" bx bx-list-ol"> </i>  Atualizações
																</span>
                                                               <br>
																<?php 
$sqlat = "SELECT * FROM atualizacao_tarefas WHERE atualizacao_tarefa = '$linha[tarefa_id]'  ORDER BY atualizacao_data desc";
$resultadoat = mysqli_query($conn, $sqlat);
while ($linhaat=mysqli_fetch_array($resultadoat)) {
	
$sql1at = "SELECT * FROM users where user_id = '$linhaat[atualizacao_quem]' ";
$resultado1at = mysqli_query($conn, $sql1at);
$linha1at = mysqli_fetch_array($resultado1at);

$partesat = explode(' ', $linha1at['user_nome']);
$primeiroNomeat = array_shift($partesat);
$ultimoNomeat = array_pop($partesat);	
	
	?>
																
	<div class="d-flex">
                                                <div class="flex-shrink-0">
                                                    <i class="ri-checkbox-circle-fill text-success"></i>
                                                </div>
                                                <div class="flex-grow-1 ms-2 text-muted">
                                                    <?php echo date('d/m/y H:i', strtotime($linhaat['atualizacao_data'])); ?> - <span class="text-primary"> <?php echo $linhaat['atualizacao_atualizacao'] ?></span> - Por:  <small><?php echo $primeiroNomeat ?> <?php echo $ultimoNomeat  ?></small> 
                                                </div>
                                            </div>
																<?php } ?>
																
																       
																	
																	 <br>
																	<div class="row">
																	<div class="col-6">
            <label>Situação:</label>
            <select disabled class="form-select" name="status" id="inlineFormSelectPref">
               
				<?php if ($linha['tarefa_status'] =='1') { ?>
				 <option value="1">Aberta</option>
				<?php } ?>
				<?php if ($linha['tarefa_status'] =='2') { ?>
				 <option value="2">Concluída</option>
				<?php } ?>
				<?php if ($linha['tarefa_status'] =='3') { ?>
				 <option value="1">Cancelada</option>
				<?php } ?>
				<?php if ($linha['tarefa_status'] =='4') { ?>
				 <option value="1">Adiada</option>
				<?php } ?>
				
				
                <option value="1">Aberta</option>
                <option value="2">Concluída</option>
                <option value="3">Cancelada</option>
				<option value="4">Adiada</option>
				
            </select>
        </div>
																	
		 <div class="col-6">
            
        </div>
		</div>															
																	
</form>
																
																
                                                            </div>
                                                            <div class="modal-footer">
																
																  <button type="button" class="btn btn-light" data-bs-dismiss="modal">Fechar</button>
																
                                                              
                                                                
																
																<input type="hidden" value="<?php   echo 'https://'.$_SERVER['SERVER_NAME'].$_SERVER["REQUEST_URI"]; ?>" name="url">
																<input type="hidden" value="<?php echo $linha['tarefa_id']; ?>" name="tarefa">
                                                               
																
                                                            </div>
        
                                                        </div><!-- /.modal-content -->
                                                    </div><!-- /.modal-dialog -->
                                                </div><!-- /.modal -->
</form>
			<?php }  ?>