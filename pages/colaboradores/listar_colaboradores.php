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
                                    <h4 class="mb-sm-0">Colaboradores</h4>

                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Colaboradores</a></li>
                                            <li class="breadcrumb-item active">Listar</li>
                                        </ol>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <!-- end row -->

<script>

function clickDiv(div) {
    div.style.display="none";
    document.getElementById("updateDinamico2").style.display = "inline";
    document.getElementById("inputText").focus();
}
function blurInput(input) {
    var div = input.parentNode;
    div.style.display = "none";
    document.getElementById("updateDinamico1").style.display = "inline";
	document.getElementById("updateDinamico1").innerHTML = input.value;

}


</script>

<td width="500">
  <div id="updateDinamico1" onclick='clickDiv(this)'>
    Texto que pode ser alterado
  </div>
  <div id="updateDinamico2" style="display:none">
    <input type="text" id="inputText" name="nome" onBlur='blurInput(this)' />
  </div>
</td>

<div class="row">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="card-title mb-0">Listando Colaboradores</h4>
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
                                                            <input type="text" class="form-control search" placeholder="Localizar colaborador">
                                                            <i class="ri-search-line search-icon"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div class="table-responsive table-card mt-3 mb-1">
                                                <table class="table align-middle table-nowrap" id="customerTable">
                                                    <thead class="table-light">
                                                        <tr>
                                                         
                                                            <th class="sort" data-sort="customer_name">Nome</th>
                                                            <th class="sort" data-sort="email">E-mail</th>
                                                            <th class="sort" data-sort="phone">Telefone</th>
                                                            <th class="sort" data-sort="type">Tipo</th>
                                                            <th class="sort" data-sort="date">Login</th>
                                                           <th class="sort" data-sort="date">Ações</th>
                                                           
                                                      </tr>
                                                    </thead>
                                                    <tbody class="list form-check-all">
														
														<?php
$sql = "SELECT * FROM users WHERE user_lixeira ='1' ORDER BY user_nome";
// Executando $sql e verificando se tudo ocorreu certo.
$resultado = mysqli_query($conn, $sql);
//Realizando um loop para exibi&ccedil;&atilde;o de todos os dados 
while ($linha=mysqli_fetch_array($resultado)) {
    $sql_tipo = "SELECT * from tipo_colaborador where id_tipo_colaborador = '".$linha['user_tipo']."'";
    $resultado_tipo = mysqli_query($conn, $sql_tipo);
    $linha_tipo = mysqli_fetch_array($resultado_tipo);
	?>
                                                        <tr>
                                                         
                                                           
                                                            <td class="customer_name"><?php echo $linha['user_nome'] ?></td>
                                                            <td class="email"><?php echo $linha['user_email'] ?></td>
                                                            <td class="phone"><?php echo $linha['user_telefone'] ?></td>
                                                            <td class="type"><?php echo $linha_tipo['nome_tipo_colaborador'] ?></td>
                                                            <td class="date"><i class="ri-checkbox-circle-line fs-17 align-middle"></i> Ativo</td>
                                                            <td class="status"><span class="badge badge-soft-success text-uppercase"> <!-- <a href="javascript:void(0);"  data-bs-toggle="modal" data-bs-target=".bs-example-modal-center<?php echo $linha['user_id'] ?>" class="link-info fs-15" ><i class="ri-image-line"></i></a> -->
                                                                             
																
																<a href="edit_colaboradores/<?php echo $linha['user_id'] ?>" class="link-success fs-15"><i class="ri-edit-2-line"></i></a>
																
																 <a href="javascript:void(0);"   data-bs-toggle="modal" data-bs-target="#firstmodalp<?php echo $linha['user_id'] ?>" class="link-info fs-15" ><i class="bx bx-dialpad-alt
"></i></a>
																
                                                                <a href="javascript:void(0);"   data-bs-toggle="modal" data-bs-target="#firstmodal<?php echo $linha['user_id'] ?>" class="link-danger fs-15" ><i class="ri-delete-bin-line"></i></a></span>
															
															
															</td>
                                                            
                                                        </tr>
														
														
														
												<!--  modal permissoes  -->
                                                <div class="modal fade" id="firstmodalp<?php echo $linha['user_id'] ?>" aria-hidden="true" tabindex="-1">
                                                    <div class="modal-dialog modal-dialog-centered">
                                                        <div class="modal-content">
                                                            <div class="modal-body text-center p-3">
                                                              
                                                                <div class="mt-4 pt-4">
                                                                    <h4>Permissões Acesso a setores!!</h4>
                                                                    <h4 class="text-muted"> Setores</h4>
																	
																	
																	<?php
$sqls = "SELECT * FROM setores_tarefas where setor_terefa_lixeira = '1'  ORDER BY setor_tarefa_nome";
$resultados = mysqli_query($conn, $sqls);
while ($linhas=mysqli_fetch_array($resultados)) {
	
$sqls1 = "SELECT * FROM user_setores where  user_setor_setor = $linhas[setor_terefa_id] and id_user_usuario = $linha[user_id]	 ";
$resultados1 = mysqli_query($conn, $sqls1);
$total1 = mysqli_num_rows($resultados1);
$linhas1=mysqli_fetch_array($resultados1);	
	?>
																	<div class="row"> 
																	<div class="col-10" align="left"> 	
																	<?php echo $linhas['setor_tarefa_nome'] ?>
																	</div>
																		
																	<div class="col-2"> 
																		
																		<?php if ($total1 =='1') { ?>
																		

																		
																		<a href="permissao_setor/<?php echo $linhas1['id_user_setor'] ?>/d/<?php echo $linhas['setor_terefa_id'] ?>" onclick="return confirm('Deseja realmente remover permissão de acesso?');">  <i class="bx bx-toggle-left" style="font-size: 30px; color: darkseagreen"></i> </a>	
		
	<?php } else { ?>
																			<a href="permissao_setor/<?php echo $linha['user_id'] ?>/l/<?php echo $linhas['setor_terefa_id'] ?>" onclick="return confirm('Deseja realmente liberar permissão de acesso?');">  <i class="bx bx-toggle-right" style="font-size: 30px; color:brown"></i></a>	
																		<?php } ?> 
																		
																	
																		
																		
																	</div>	
																		<hr>
																	</div>
																	
																	<?php } ?>
																	
																	   <br>
                                                                    <!-- Toogle to second dialog -->
                                                                    
																	 <button class="btn btn-info" data-bs-dismiss="modal"  data-bs-toggle="modal" data-bs-dismiss="modal">
                                                                        FECHAR
                                                                    </button>
																	
																	
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>		
														
														
														
														
														
														
														
												<!--  modal deletar -->
                                                <div class="modal fade" id="firstmodal<?php echo $linha['user_id'] ?>" aria-hidden="true" tabindex="-1">
                                                    <div class="modal-dialog modal-dialog-centered">
                                                        <div class="modal-content">
                                                            <div class="modal-body text-center p-5">
                                                                <lord-icon
                                                                    src="https://cdn.lordicon.com/tdrtiskw.json"
                                                                    trigger="loop"
                                                                    colors="primary:#f7b84b,secondary:#405189"
                                                                    style="width:130px;height:130px">
                                                                </lord-icon>
                                                                <div class="mt-4 pt-4">
                                                                    <h4>Atenção!!</h4>
                                                                    <p class="text-muted"> Deseja mesmo deletar este Colaborador?</p>
                                                                    <!-- Toogle to second dialog -->
                                                                    
																	 <button class="btn btn-danger" data-bs-dismiss="modal"  data-bs-toggle="modal" data-bs-dismiss="modal">
                                                                        Não
                                                                    </button>
																	<button class="btn btn-warning" data-bs-target="#secondmodal<?php echo $linha['user_id'] ?>" data-bs-toggle="modal" data-bs-dismiss="modal">
                                                                        Sim
                                                                    </button>
																	
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- Second modal deletar -->
                                                <div class="modal fade" id="secondmodal<?php echo $linha['user_id'] ?>" aria-hidden="true" tabindex="-1">
                                                    <div class="modal-dialog modal-dialog-centered">
                                                        <div class="modal-content">
                                                            <div class="modal-body text-center p-5">
																
																
																<lord-icon
    src="https://cdn.lordicon.com/gsqxdxog.json"
    trigger="loop"
    style="width:120px;height:120px"  colors="primary:#405189,secondary:#0ab39c">
</lord-icon>
																
                                                                
                                                                <div class="mt-4 pt-3">
                                                                    <h4 class="mb-3">Atenção!</h4>
                                                                    <p class="text-muted mb-4">Essa opção é irreversível</p>
                                                                    <div class="hstack gap-2 justify-content-center">
                                                                        <!-- Toogle to first dialog, `data-bs-dismiss` attribute can be omitted - clicking on link will close dialog anyway -->
                                                                    
                                                                        
																																		<form action="deletar_colaboradores" method="post" id="sa-departamento"> 
																
																
																<script>
	function sendForm() {
        $("#sa-departamento").click();
      } 	
		
		</script> <input type="submit" class="btn btn-danger" value="Estou ciente quero Deletar"> <input type="hidden" value="<?php echo $linha['user_id'] ?>" name="id">
																
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
            function $(id){
                return document.getElementById(id);
            }
            window.click=function(){                
                    window.open="http://www.google.com.br";                
            }
        </script>
											<!-- /.INICIO MODAL FOTO OPÇÃO -->
											
											<div class="modal fade bs-example-modal-center<?php echo $linha['user_id'] ?>" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-centered<?php echo $linha['user_id'] ?>">
                                                        <div class="modal-content">
                                                            <div class="modal-body text-center p-5">
																<lord-icon
    src="https://cdn.lordicon.com/dklbhvrt.json"
    trigger="loop"
    style="width:150px;height:150px" colors="primary:#121331,secondary:#08a88a" >
</lord-icon>
                                                               
                                                                <div class="mt-4">
                                                                    <h4 class="mb-3">Adicionar Foto!</h4>
                                                                    <p class="text-muted mb-4"> Escolha uma opção abaixo</p>
                                                                    <div class="hstack gap-2 justify-content-center">
                                                                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Fechar</button>
                                                                        <a href="javascript:void(0);" class="btn btn-danger"  data-bs-toggle="modal" data-bs-target=".bs-example-modal-center_foto<?php echo $linha['user_id'] ?>" >Tirar Foto</a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>c
                                                </div><!-- /.modal -->
											
											
											<!-- /.INICIO MODAL TIRAR FOTO -->
											
											<div class="modal fade bs-example-modal-center_foto<?php echo $linha['user_id'] ?>" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-centered<?php echo $linha['user_id'] ?>">
                                                        <div class="modal-content">
                                                            <div class="modal-body text-center p-5">
																
                                                               
                                                                <div class="mt-4">
                                                                    
                                                                   
																	
																	
																	
																	
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
											
											<div class="modal fade bs-example-modal-center-deletar<?php echo $linha['user_id'] ?>" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-centered<?php echo $linha['user_id'] ?>">
                                                        <div class="modal-content">
                                                            <div class="modal-body text-center p-5">
																<lord-icon
    src="https://cdn.lordicon.com/dklbhvrt.json"
    trigger="loop"
    style="width:150px;height:150px" colors="primary:#121331,secondary:#08a88a" >
</lord-icon>
                                                               
                                                                <div class="mt-4">
                                                                    <h4 class="mb-3">Adicionar Foto!</h4>
                                                                    <p class="text-muted mb-4"> Escolha uma opção abaixo</p>
                                                                    <div class="hstack gap-2 justify-content-center">
                                                                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                                                                        <a href="javascript:void(0);" class="btn btn-danger"  data-bs-toggle="modal" data-bs-target=".bs-example-modal-center_foto<?php echo $linha['cliente_celular'] ?>" >Tirar Foto</a>
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
                                                        <lord-icon src="https://cdn.lordicon.com/msoeawqm.json" trigger="loop"
                                                            colors="primary:#121331,secondary:#08a88a" style="width:75px;height:75px">
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






                                   <div class="row">
                            <div class="col-lg-12">
<script>

/// DELETAR CLIENTE
		
 $(document).ready(function() {
 
	 $("#deletar").submit(function(){
		 
		 

		 var dados = jQuery( this ).serialize();
		 
		$.ajax({
			url: 'pages/del/colaboradores.php',
			cache: false,
			data: dados,
			type: "POST",  

			success: function(msg){
				
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