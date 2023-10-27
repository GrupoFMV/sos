<?php // CODIGO DA SESSION

if (!empty($_SESSION['user_id'])) {
} else {
    $_SESSION['msg'] = "Área restrita";
    header("Location: ../../login.php");
}

$sqlss = "SELECT * FROM setores_tarefas WHERE setor_terefa_id = '$id'  ";	
$resultadouss = mysqli_query($conn, $sqlss);
$linhauss=mysqli_fetch_array($resultadouss);
?> 
 <!-- Sweet Alert css-->
        <link href="assets/libs/sweetalert2/sweetalert2.min.css" rel="stylesheet" type="text/css" />

<!-- INICIO DADOS INICIAIS -->

<form method="post" action="alterarsetor" id="formcadastro2a"> 
	
	<div id="dvConteudo2" style="display: block">	
		
		
 <div class="row">
	 
	 
	 

	 
	<!-- INICIO DADOS SETOR -->
    <div class="col-lg-12">
                                <div class="card">
									 <div class="card-body">
                               
										 <div class="row">
											 <h4>EDITAR SETOR</h4>
											
											 
											 <div class="row gy-3">
												 
                                               
												 <div class="col-lg-12	">
                                                   <div>
                                                     <label class="form-label mb-0">Titulo:</label>
                                                       <input name="nome" type="text" required="required" value="<?php echo $linhauss['setor_tarefa_nome'] ?>" class="form-control" id="titulo"  >
                                                    </div>
                                                </div>
<div class="col-lg-12">
			<button class="btn btn-primary"> Salvar </button>
						<input type="hidden" value="<?php echo $linhauss['setor_terefa_id'] ?>" name="id">		
			</form>			
                                                
												
												
												  </div> </div> </div> </div> </div>  </div>  </div> 
		
		  

     
      