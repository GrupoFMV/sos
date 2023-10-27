<?php // CODIGO DA SESSION

if (!empty($_SESSION['user_id'])) {
} else {
    $_SESSION['msg'] = "Área restrita";
    header("Location: ../../login.php");
}
?> 
 <!-- Sweet Alert css-->
        <link href="assets/libs/sweetalert2/sweetalert2.min.css" rel="stylesheet" type="text/css" />

<!-- INICIO DADOS INICIAIS -->

<form method="post" action="inserirsetor" id="formcadastro2a"> 
	
	<div id="dvConteudo2" style="display: block">	
		
		
 <div class="row">
	 
	 
	 

	 
	<!-- INICIO DADOS SETOR -->
    <div class="col-lg-12">
                                <div class="card">
									 <div class="card-body">
                               
										 <div class="row">
											 <h4>CADASTRAR SETOR</h4>
											
											 
											 <div class="row gy-3">
												 
                                               
												 <div class="col-lg-12	">
                                                   <div>
                                                     <label class="form-label mb-0">Titulo:</label>
                                                       <input name="titulo" type="text" required="required" class="form-control" id="titulo"  >
                                                    </div>
                                                </div>
<div class="col-lg-12">
			<button class="btn btn-primary"> Cadastrar </button>
						<input type="hidden" value="<?php   echo 'https://'.$_SERVER['SERVER_NAME'].$_SERVER["REQUEST_URI"]; ?>" name="url">		
			</form>			
                                                
												
												
												  </div> </div> </div> </div> </div>  </div>  </div> 
		
		  <div class="col-lg-12">
                                <div class="card">
									 <div class="card-body">
                               
										 <div class="row">
											 <h4>SETORES CADASTRADOS</h4>
											
											 
											 <div class="row gy-3">
												 
                                               
												 <div class="col-lg-12	">
												   <table class="table align-middle table-nowrap" id="customerTable">
												     <thead class="table-light">
												       <tr>
												         <th class="sort" data-sort="customer_name">Titulo</th>
												        
												         
												         <th class="sort" data-sort="date">Ações</th>
											           </tr>
											         </thead>
												     <tbody class="list form-check-all">
												       <?php
$sqls = "SELECT * FROM setores_tarefas where  setor_terefa_lixeira = '1'  ORDER BY setor_tarefa_nome";
// Executando $sql e verificando se tudo ocorreu certo.
$resultados = mysqli_query($conn, $sqls);
//Realizando um loop para exibi&ccedil;&atilde;o de todos os dados 
while ($linhas=mysqli_fetch_array($resultados)) {
	?>
												       <tr>
												         <td class="customer_name"><?php echo $linhas['setor_tarefa_nome'] ?></td>
												         
												         
												         <td class="status"><span class="badge badge-soft-success text-uppercase">
												           <!-- <a href="javascript:void(0);"  data-bs-toggle="modal" data-bs-target=".bs-example-modal-center<?php echo $linhas['setor_terefa_id'] ?>" class="link-info fs-15" ><i class="ri-image-line"></i></a> -->
												           <a href="edit_setor/<?php echo $linhas['setor_terefa_id'] ?>" class="link-success fs-15"><i class="ri-edit-2-line"></i></a> <a href="javascript:void(0);"   data-bs-toggle="modal" data-bs-target="#firstmodal<?php echo $linhas['setor_terefa_id'] ?>" class="link-danger fs-15" ><i class="ri-delete-bin-line"></i></a></span></td>
											           </tr>
												       <!--  modal deletar -->
											         <div class="modal fade" id="firstmodal<?php echo $linhas['setor_terefa_id'] ?>" aria-hidden="true" tabindex="-1">
												         <div class="modal-dialog modal-dialog-centered">
												           <div class="modal-content">
												             <div class="modal-body text-center p-5">
												               <lord-icon
                                                                    src="https://cdn.lordicon.com/tdrtiskw.json"
                                                                    trigger="loop"
                                                                    colors="primary:#f7b84b,secondary:#405189"
                                                                    style="width:130px;height:130px"> </lord-icon>
												               <div class="mt-4 pt-4">
												                 <h4>Atenção!!</h4>
												                 <p class="text-muted"> Deseja mesmo deletar este Setor? </p>
												                 <!-- Toogle to second dialog -->
												                 <button class="btn btn-danger" data-bs-dismiss="modal"  data-bs-toggle="modal" data-bs-dismiss="modal">
												                   
												                 Não
												                 </button>
												                   
												                 <button class="btn btn-warning" data-bs-target="#secondmodal<?php echo $linhas['setor_terefa_id'] ?>" data-bs-toggle="modal" data-bs-dismiss="modal"> Sim </button>
											                   </div>
											                 </div>
											               </div>
											           </div>
											         </div>
												     <!-- Second modal deletar -->
												     <div class="modal fade" id="secondmodal<?php echo $linhas['setor_terefa_id'] ?>" aria-hidden="true" tabindex="-1">
												       <div class="modal-dialog modal-dialog-centered">
												         <div class="modal-content">
												           <div class="modal-body text-center p-5">
												             <lord-icon
    src="https://cdn.lordicon.com/gsqxdxog.json"
    trigger="loop"
    style="width:120px;height:120px"  colors="primary:#405189,secondary:#0ab39c"> </lord-icon>
												             <div class="mt-4 pt-3">
												               <h4 class="mb-3">Atenção!</h4>
												               <p class="text-muted mb-4">Essa opção é irreversível</p>
												               <div class="hstack gap-2 justify-content-center">
												                 <!-- Toogle to first dialog, `data-bs-dismiss` attribute can be omitted - clicking on link will close dialog anyway -->
												                 <form action="deletar_setor" method="post" id="sa-departamento">
												                   <script>
	function sendForm() {
        $("#sa-departamento").click();
      } 	
		
		                                           </script>
												                   <input type="submit" class="btn btn-danger" value="Estou ciente quero Deletar">
												                   <input type="hidden" value="<?php echo $linhas['setor_terefa_id'] ?>" name="id">
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
												 </div> 
										   </div> </div> </div> 
								
								

     
      