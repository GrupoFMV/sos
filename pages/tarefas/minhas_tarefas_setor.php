<?php // CODIGO DA SESSION
if (!empty($_SESSION['user_id'])) {
} else {
    $_SESSION['msg'] = "Área restrita";
    header("Location: ../../login.php");
}
$sqlss = "SELECT * FROM setores_tarefas WHERE setor_terefa_id = '$_POST[setor]'  ";	
$resultadouss = mysqli_query($conn, $sqlss);
$linhauss=mysqli_fetch_array($resultadouss);
?>
<script src="//code.jquery.com/jquery-1.11.0.min.js"></script>
<style>
        video { border: 1px solid #ccc; display: block; margin: 0 0 20px 0; }
        #canvas { margin-top: 20px; border: 1px solid #ccc; display: block; }
	

	
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
t
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
hr {
  margin: 40px 0;
}

.hr1 {
  border: 0;
  border-top: 1px solid #fff;
	padding: 0px;
}

.hr2 {
  border: 0;
  border-top: 1px dashed #CCC;
}

.hr3 {
  border: 0;
  height: 2px;
  background-image: linear-gradient(to right, transparent, #CCC, transparent);  
}

.hr4 {
  border: 0;
  border-top: 1px dashed #CCC;
  border-bottom: 2px solid #CCC;
  height: 3px;
}

.hr5 {
  border: 0;
  border-top: medium double #CCC;
  height: 1px;
  overflow: visible;
  padding: 0;
  color: #CCC;
  text-align: center;
}

.hr5::after {
  content: "¶";
  display: inline-block;
  position: relative;
  top: -0.7em;
  font-size: 1.4em;
  padding: 0 0.3em;
  background: white;
}
.colunas-status {
  display: flex;
  overflow-x: auto;
}	
</style>
<div id="ok"></div>
<!-- start page title -->
                        <div class="row">
                            <div class="col-12">
								
                                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                    <h4 class="mb-sm-0">Minhas Tarefas <?php echo $linhauss['setor_tarefa_nome'] ?></h4>
									
									

                                    <div class="page-title-right">
										
										
										
											<form action="minhas_tarefas_setor" method="post" id="setor" >
											
											<select class="form-control" name="setor"  required onchange="this.form.submit()">
											  <option value="">Listar Tarefas por setor</option>
												
												<?php 
$sqlus = "SELECT * FROM user_setores us INNER JOIN setores_tarefas st ON st.setor_terefa_id = us.user_setor_setor   WHERE us.id_user_usuario = '$iduser' and us.id_user_status = 1  ";	
$resultadous = mysqli_query($conn, $sqlus);
while ($linhaus=mysqli_fetch_array($resultadous)) {
	?>
											  <option value="<?php echo $linhaus['setor_terefa_id'] ?>"> - <?php echo $linhaus['setor_tarefa_nome'] ?></option>
												
												<?php } ?>
												
												
												
												
                                            </select>
										
										</form>
										
										
                                        <ol class="breadcrumb m-0">
											
											
											
                                        </ol>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <!-- end page title -->

 
		<div class="row">
			<div class="colunas-status">
<?php
			
$sql = "SELECT * FROM status_tarefas WHERE status_tarefas_setor = $_POST[setor] or status_tarefas_padrao ='1' order by status_tarefas_posicao asc  ";
$resultado = mysqli_query($conn, $sql);
while ($linha=mysqli_fetch_array($resultado)) {


	
//$prazo = $linha['tarefa_prazo']	;
//date_default_timezone_set('America/Sao_Paulo');
//$date = date('Y-m-d H:i');	
	
	
	?>
			    

	 <div class="col-xxl-2" style="padding: 2px">
		 
		  <div class="card card-white" style="padding: 5px">  
			  
			  <div align="center"> 
		<strong> <i class=" bx bxs-user" ></i>

 <?php echo $linha['status_tarefas_titulo']  ?>  </strong> <br><br> </div>
			  
			  
			  <?php
$sqlt = "SELECT * FROM tarefas WHERE tarefa_status <>'2' and tarefa_lixeira ='1' and tarefa_para = '$iduser' and tarefa_status = $linha[id_status_tarefas] and 	tarefa_setor = $_POST[setor]  ORDER BY tarefa_prazo asc ";	
$resultadot = mysqli_query($conn, $sqlt);
while ($linhat=mysqli_fetch_array($resultadot)) {
	
// PEGANDO CRIADOR DA TAREFA
$sqlct = "SELECT * FROM users WHERE user_id  = '$linhat[tarefa_quem]'   ";	
$resultadoct = mysqli_query($conn, $sqlct);
$linhact=mysqli_fetch_array($resultadoct);
	

$partest = explode(' ', $linhact['user_nome']);
$primeiroNomec = array_shift($partest);
$ultimoNomec = array_pop($partest);		
	
	
date_default_timezone_set('America/Sao_Paulo');
$date = date('Y-m-d');		

$dt_local = new DateTime($date);
$prazo = date('Y-m-d', strtotime($linhat['tarefa_prazo']));	
$dt_remoto = new DateTime($prazo);
$horatarefa = date('H:i', strtotime($linhat['tarefa_prazo']));	

	?>
			  
<?php if ($linhat['tarefa_status'] =='4')	{ ?>
		<Style>
			  
	.buttondia<?php echo $linhat['tarefa_id'] ?>  {
  background-color: red;
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
			
			
.buttoncriada<?php echo $linhat['tarefa_id'] ?> {
  background-color:red;
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
			
			
.button<?php echo $linhat['tarefa_id'] ?> {
  background-color: red;
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
			
					
			  
			  </Style>
			
<?php } ?>	
			  
<?php if ($linhat['tarefa_status'] =='3')	{ ?>
		<Style>
			  
.buttondia<?php echo $linhat['tarefa_id'] ?> {
  background-color:#13C56B;
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
			
.buttoncriada<?php echo $linhat['tarefa_id'] ?> {
  background-color:#13C56B;
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
			
			
.button<?php echo $linhat['tarefa_id'] ?> {
  background-color: #13C56B;
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
			
			
			
	
			  
			  </Style>
			
<?php } ?>
			  
<?php if (($linhat['tarefa_status'] <>'3') and ($linhat['tarefa_status'] <>'4')) 	{ ?>
		<Style>
			  
.buttondia<?php echo $linhat['tarefa_id'] ?> {
  background-color:gold;
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
			
.buttoncriada<?php echo $linhat['tarefa_id'] ?> {
  background-color:#6691E7;
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
	
.button<?php echo $linhat['tarefa_id'] ?> {
  background-color: red;
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

.button<?php echo $linhat['tarefa_id'] ?>  {
  -webkit-animation: glowing 1500ms infinite;
  -moz-animation: glowing 1500ms infinite;
  -o-animation: glowing 1500ms infinite;
  animation: glowing 1500ms infinite;
}			
			
			
			  </Style>
			
<?php } ?>			  
			  
						  
			  
 <!-- Modal flip --><form action="atualizar_tarefa2" method="post"> 
			
                                                <div id="flipModal<?php echo $linhat['tarefa_id'] ?>" class="modal  fade flip" tabindex="-1" aria-labelledby="flipModalLabel" aria-hidden="true" style="display: none;">
                                                    <div class="modal-dialog modal-dialog-centered modal-lg">
                                                        <div class="modal-content">
                                                            <div class="modal-header ">
																
																
																
																	
																	
																	
                                                                
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
															 

															 
															 <div class="modal-header"> 
																 <div class="col-4 text-muted "><i class=" las la-clock"> </i> Prazo: <?php echo date('d/m/Y H:i:s', strtotime($linhat['tarefa_prazo'])); ?></div>
																  <div class="col-4 text-secondary"><i class=" las la-user-plus"> </i> Criada por: <?php echo $primeiroNomec ?> <?php echo $ultimoNomec ?> </div>
																 <div class="col-4"><i class="bx bx-refresh"> </i> Situação: 
																	 <?php if ($linhat['tarefa_status'] =='1') { ?><span class="badge bg-secondary">Em aberto</span> <?php } ?>
																	 <?php if ($linhat['tarefa_status'] =='3') { ?><span class="badge bg-success">Concluída</span> <?php } ?> 
																	 <?php if ($linhat['tarefa_status'] =='5') { ?><span class="badge bg-info">Em Execução</span> <?php } ?> 
																	 <?php if ($linhat['tarefa_status'] =='4') { ?><span class="badge bg-danger">Cancelada</span> <?php } ?> 
																 
																 <?php if (((($linhat['tarefa_status'] <> '1') and ($linhat['tarefa_status'] <> '3') and($linhat['tarefa_status'] <> '4') and($linhat['tarefa_status'] <> '5'))))    { ?><span class="badge bg-dark"><?php echo $linha['status_tarefas_titulo'] ?></span> <?php } ?> 
																 
																 </div>
																 
																
																</div>
														
															
                                                            <div class="modal-body">
                                                                <span class="text-opacity-75" style="font-size: 15px;">
                                                                  <i class="  bx bx-copy-alt"> </i>  <?php echo $linhat['tarefa_titulo'] ?> <i class="bx bxs-edit"> </i>
                                                                </span><hr>
																
																
																<span class="text-opacity-75" style="font-size: 15px;">
                                                                  <i class=" bx bx-message-rounded-error"> </i>  Observações <i class="bx bxs-edit"> </i>
                                                                </span>
																
																
                                                                <p class="text-muted"><?php echo $linhat['tarefa_observacoes'] ?></p>
                                                               <hr>
																<span class="text-opacity-75" style="font-size: 15px;">
                                                                  <i class=" bx bx-list-ol"> </i>  Atualizações
																</span>
                                                               <br>
																<?php 
$sqlat = "SELECT * FROM atualizacao_tarefas WHERE atualizacao_tarefa = '$linhat[tarefa_id]'   ORDER BY atualizacao_data desc";
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
																
																       
																	<textarea class="form-control" id="VertimeassageInput" rows="3" name="texto" required placeholder="Nova atualização"></textarea>
																	 <br>
																	<div class="row">
																	<div class="col-6">
            <label>Situação:</label>
												
					<select class="form-control" name="status" required>
						
						<?php
	
	$sqlt1 = "SELECT * FROM status_tarefas  WHERE id_status_tarefas   = '$linhat[tarefa_status]' ";
$resultadot1 = mysqli_query($conn, $sqlt1);
$linhat1=mysqli_fetch_array($resultadot1);
	?>
						
					  <option value="<?php echo $linhat1['id_status_tarefas'] ?>"><?php echo $linhat1['status_tarefas_titulo'] ?></option>
						
						<?php // LISTANDO STATUS DO USUARIO
	
	

	
	
$sqlat = "SELECT * FROM status_tarefas  WHERE status_tarefas_user = $iduser or status_tarefas_padrao = '1' and status_tarefas_status ='1' and id_status_tarefas <> $linhat1[id_status_tarefas]     ORDER BY status_tarefas_titulo ";
$resultadoat = mysqli_query($conn, $sqlat);
while ($linhaat=mysqli_fetch_array($resultadoat)) {
				?>		
					  <option value="<?php echo $linhaat['id_status_tarefas'] ?>"><?php echo $linhaat['status_tarefas_titulo'] ?></option>
						<?php } ?>
						
						
					</select>													
																		
						
			
        </div>
																	
		 <div class="col-6">
            
        </div>
		</div>															
																	
</form>
																
																
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Fechar</button>
																 <a href="deletar_tarefas/<?php echo $linhat['tarefa_id'] ?>/<?php echo $id ?>" onclick="return confirm('Deseja realmente remover essa tarefa?');">
 <button type="button" class="btn btn-danger" >Remover</button></a>
                                                                <button type="submit" class="btn btn-primary ">Salvar Atualizações</button>
																
																<input type="hidden" value="<?php   echo 'https://'.$_SERVER['SERVER_NAME'].$_SERVER["REQUEST_URI"]; ?>" name="url">
																<input type="hidden" value="<?php echo $linhat['tarefa_id']; ?>" name="tarefa">
                                                               
																
                                                            </div>
        
                                                        </div><!-- /.modal-content -->
                                                    </div><!-- /.modal-dialog -->
                                                </div><!-- /.modal -->
</form>					  
			  
			  
		
			  
		 
		 
		 
		 
			  
			  <?php // TAREFA ATRASADA
	if ($dt_local > $dt_remoto)  { ?>
	<div class="card button<?php echo $linhat['tarefa_id'] ?>" style="cursor: pointer"  data-bs-toggle="modal" data-bs-target="#flipModal<?php echo $linhat['tarefa_id'] ?>"> <button type="submit" style="border-bottom-color: aliceblue; border-bottom-style:solid; border-bottom-width: 1px " class="button<?php echo $linhat['tarefa_id'] ?>" data-bs-toggle="modal" data-bs-target="#flipModal<?php echo $linhat['tarefa_id'] ?>"><?php echo date('d/m/Y', strtotime($linhat['tarefa_prazo'])); ?> - <?php echo $horatarefa ?> </button>
		
			  <p class="card-text"> <span class="fw-medium" style="padding: 5px"><?php echo $linhat['tarefa_titulo'] ?></span> </p>
		
				  </div>		  
<?php // TAREFA CRIADA
} else if ($dt_local < $dt_remoto) {  ?>
			  
			  <div class="card buttoncriada<?php echo $linhat['tarefa_id'] ?>" style="cursor: pointer; "  data-bs-toggle="modal" data-bs-target="#flipModal<?php echo $linhat['tarefa_id'] ?>"> <button type="submit"  class="buttoncriada<?php echo $linhat['tarefa_id'] ?>" style="border-bottom-color: aliceblue; border-bottom-style:solid; border-bottom-width: 1px " data-bs-toggle="modal" data-bs-target="#flipModal<?php echo $linhat['tarefa_id'] ?>"><?php echo date('d/m/Y', strtotime($linhat['tarefa_prazo'])); ?> - <?php echo $horatarefa ?> </button>
				    <div id="linha-vertical"></div>
				  
			  <p class="card-text"> <span class="fw-medium" style="padding: 5px; "><?php echo $linhat['tarefa_titulo'] ?></span> </p>
				  </div>  
			  
			  <?php // TAREFA DIA
   
} else { ?>
			  
			  <div class="card buttondia<?php echo $linhat['tarefa_id'] ?>" style="cursor: pointer"  data-bs-toggle="modal" data-bs-target="#flipModal<?php echo $linhat['tarefa_id'] ?>"> <button type="submit" style="border-bottom-color: aliceblue; border-bottom-style:solid; border-bottom-width: 1px; color: black " class="buttondia<?php echo $linhat['tarefa_id'] ?>" data-bs-toggle="modal" data-bs-target="#flipModal<?php echo $linhat['tarefa_id'] ?>"><?php echo date('d/m/Y', strtotime($linhat['tarefa_prazo'])); ?> - <?php echo $horatarefa ?> </button>
			  <p class="card-text"> <span class="fw-medium" style="padding: 5px; color: black"><?php echo $linhat['tarefa_titulo'] ?></span> </p>
				  </div>
			  <?php
   
}
	
	?>
			 
			  
			  
			  
			    <?php } ?>
			  
			  
			  
			  
			 
		 </div></div>
			
			
	 
				
			
			
			  <?php } ?>
			
		<!--
			<div class="col-xxl-2" style="padding: 2px">
		 
		  <div class="card card-white" style="padding: 5px">  
			  
			  <div align="center"> 
		<strong> <i class=" bx bxs-plus-circle" ></i>

 Adicionar Coluna </strong> <br><br> </div>
			
			  </div> 
		  </div>
		
		 
		  
		 -->
		 
		 
		 
		
		 
												
												
                                                
			