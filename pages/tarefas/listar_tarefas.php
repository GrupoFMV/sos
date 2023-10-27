<?php // CODIGO DA SESSION
if (!empty($_SESSION['user_id'])) {
} else {
    $_SESSION['msg'] = "Área restrita";
    header("Location: ../../login.php");
}

$sqlts = "SELECT * FROM setores_tarefas WHERE setor_terefa_id = $id ";	
$resultadots = mysqli_query($conn, $sqlts);
$linhats=mysqli_fetch_array($resultadots);
	
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

.buttondia {
  background-color: gold;
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

.buttoncriada {
  background-color:cornflowerblue;
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
                                    <h4 class="mb-sm-0">Tarefas - <?php echo $linhats['setor_tarefa_nome'] ?></h4>
									
									

                                    <div class="page-title-right">
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
			
$sql = "SELECT * FROM users WHERE user_lixeira ='1' order by user_nome asc  ";
			
$resultado = mysqli_query($conn, $sql);
while ($linha=mysqli_fetch_array($resultado)) {


	
//$prazo = $linha['tarefa_prazo']	;
//date_default_timezone_set('America/Sao_Paulo');
//$date = date('Y-m-d H:i');	
	
$partes = explode(' ', $linha['user_nome']);
$primeiroNome = array_shift($partes);
$ultimoNome = array_pop($partes);		
	?>
			    

	 <div class="col-xxl-2" style="padding: 2px">
		 
		  <div class="card card-white" style="padding: 5px">  
			  
			  <div align="center"> 
		<strong> <i class=" bx bxs-user" ></i>

 <?php echo $primeiroNome  ?> <?php echo $ultimoNome  ?></strong> <br><br> </div>
			  
			  
			  <?php
$sqlt = "SELECT * FROM tarefas WHERE tarefa_status <>'2' and tarefa_lixeira ='1' and tarefa_para = $linha[user_id] and tarefa_setor = $id  ORDER BY tarefa_prazo asc ";	
$resultadot = mysqli_query($conn, $sqlt);
while ($linhat=mysqli_fetch_array($resultadot)) {
	

date_default_timezone_set('America/Sao_Paulo');
$date = date('Y-m-d');		

	
	
	
$dt_local = new DateTime($date);
$prazo = date('Y-m-d', strtotime($linhat['tarefa_prazo']));	
$dt_remoto = new DateTime($prazo);
$horatarefa = date('H:i', strtotime($linhat['tarefa_prazo']));	


	
	
	
	?>
			  
 <!-- Modal flip --><form action="atualizar_tarefa2" method="post"> 
			
                                                <div id="flipModal<?php echo $linhat['tarefa_id'] ?>" class="modal  fade flip" tabindex="-1" aria-labelledby="flipModalLabel" aria-hidden="true" style="display: none;">
                                                    <div class="modal-dialog modal-dialog-centered modal-lg">
                                                        <div class="modal-content">
                                                            <div class="modal-header ">
																
																
																
																	
																	
																	
                                                                <h5 class="modal-title " id="flipModalLabel">Tarefa para: <?php echo $linha['user_nome'] ?> </h5>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
															 

															 
															 <div class="modal-header"> 
																 <div class="col-4 text-muted "><i class=" las la-clock"> </i> Prazo: <?php echo date('d/m/Y H:i:s', strtotime($linhat['tarefa_prazo'])); ?></div>
																  <div class="col-4 text-secondary"><i class=" las la-user-plus"> </i> Criada por: <?php echo $primeiroNome ?> <?php echo $ultimoNome ?> </div>
																 <div class="col-4"><i class="bx bx-refresh"> </i> Situação: <?php if ($linhat['tarefa_status'] =='1') { ?><span class="badge bg-secondary">Aberta</span> <?php } ?><?php if ($linhat['tarefa_status'] =='2') { ?><span class="badge bg-success">Concluída</span> <?php } ?> <?php if ($linhat['tarefa_status'] =='3') { ?><span class="badge bg-success">Cancelada</span> <?php } ?> <?php if ($linhat['tarefa_status'] =='4') { ?><span class="badge bg-warning">Adiada</span> <?php } ?> </div>
																 
																
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
$sqlat = "SELECT * FROM atualizacao_tarefas WHERE atualizacao_tarefa = '$linhat[tarefa_id]'  ORDER BY atualizacao_data desc";
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
            <select class="form-select" name="status" id="inlineFormSelectPref">
               
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
	if ($dt_local > $dt_remoto) { ?>
	<div class="card card-danger" style="cursor: pointer"  data-bs-toggle="modal" data-bs-target="#flipModal<?php echo $linhat['tarefa_id'] ?>"> <button type="submit" style="border-bottom-color: aliceblue; border-bottom-style:solid; border-bottom-width: 1px " class="button" data-bs-toggle="modal" data-bs-target="#flipModal<?php echo $linhat['tarefa_id'] ?>"><?php echo date('d/m/Y', strtotime($linhat['tarefa_prazo'])); ?> - <?php echo $horatarefa ?> </button>
		
		    


		
			  <p class="card-text"> <span class="fw-medium" style="padding: 5px"><?php echo $linhat['tarefa_titulo'] ?></span> </p>
		
				  </div>		  
<?php // TAREFA DO DIA
} else if ($dt_local < $dt_remoto) {  ?>
			  
			  <div class="card buttoncriada" style="cursor: pointer; "  data-bs-toggle="modal" data-bs-target="#flipModal<?php echo $linhat['tarefa_id'] ?>"> <button type="submit"  class="buttoncriada" style="border-bottom-color: aliceblue; border-bottom-style:solid; border-bottom-width: 1px " data-bs-toggle="modal" data-bs-target="#flipModal<?php echo $linhat['tarefa_id'] ?>"><?php echo date('d/m/Y', strtotime($linhat['tarefa_prazo'])); ?> - <?php echo $horatarefa ?> </button>
				    <div id="linha-vertical"></div>
				  
			  <p class="card-text"> <span class="fw-medium" style="padding: 5px; "><?php echo $linhat['tarefa_titulo'] ?></span> </p>
				  </div>  
			  
			  <?php // TAREFA RESENTES
   
} else { ?>
			  
			  <div class="card buttondia" style="cursor: pointer"  data-bs-toggle="modal" data-bs-target="#flipModal<?php echo $linhat['tarefa_id'] ?>"> <button type="submit" style="border-bottom-color: aliceblue; border-bottom-style:solid; border-bottom-width: 1px; color: black " class="buttondia" data-bs-toggle="modal" data-bs-target="#flipModal<?php echo $linhat['tarefa_id'] ?>"><?php echo date('d/m/Y', strtotime($linhat['tarefa_prazo'])); ?> - <?php echo $horatarefa ?> </button>
			  <p class="card-text"> <span class="fw-medium" style="padding: 5px; color: black"><?php echo $linhat['tarefa_titulo'] ?></span> </p>
				  </div>
			  <?php
   
}
	
	?>
			 
			  
			  
			  
			    <?php } ?>
			  
			  
			  
			  
			 
		 </div></div>
			
			
	 
			
			
			  <?php } ?>
			  
		  </div>
		
		 
		  
		 
		 
		 
		 
		
		 
												
												
                                                
			